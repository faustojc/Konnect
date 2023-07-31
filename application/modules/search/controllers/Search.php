<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends MY_Controller
{
    private $userdata;
    private $auth;

    public function __construct()
    {
        parent::__construct();

        $this->userdata = get_userdata(USER);

        if (empty($this->userdata)) {
            redirect(base_url() . 'login');
        } else {
            $this->auth = get_userdata(AUTH);
        }

        $model_list = [
            'employee/Employee_model' => 'employee_model',
            'jobposting/Jobposting_model' => 'jobposting_model',
            'follow/Follow_model' => 'follow_model',
        ];

        $this->load->model($model_list);
        $this->load->driver('cache');
    }

    public function index(): void
    {
        // Get the search query from the user input
        $query = $this->input->get('query');

        if ($this->auth['user_type'] == 'EMPLOYEE') {
            // Get the employee's search criteria
            $skills = $this->EmployeeSkills_model->getEmployeeSkills($this->userdata->ID, 'skill');

            $skills = array_map(static function ($skill) {
                return get_object_vars($skill)['skill'];
            }, $skills);

            $criteria = [
                'skills' => $skills,
                'title' => $this->userdata->Title,
                'city' => $this->userdata->City,
            ];
        } else {
            // Get the employer's search criteria
            $criteria = [
                'business_type' => $this->userdata->business_type,
                'location' => $this->userdata->address . ' ' . $this->userdata->barangay . ' ' . $this->userdata->city,
            ];
        }

        // Search for relevant job posts, employees and employers
        $data['jobposts'] = $this->searchRelevantJobposts($query, $criteria);
        $data['employees'] = $this->searchRelevantEmployees($query, $criteria);
        $data['employers'] = $this->searchRelevantEmployers($query, $criteria);

        $data['results']['total_jobposts'] = count($data['jobposts']);
        $data['results']['total_employees'] = count($data['employees']);
        $data['results']['total_employers'] = count($data['employers']);
        $data['results']['total_overall'] = count($data['jobposts']) + count($data['employees']) + count($data['employers']);

        $data['searched_jobposts'] = $this->load->view('grid/search_results/searched_jobposts', $data, TRUE);
        $data['searched_employees'] = $this->load->view('grid/search_results/searched_employees', $data, TRUE);
        $data['searched_employers'] = $this->load->view('grid/search_results/searched_employers', $data, TRUE);

        $data['main_search_view'] = $this->load->view('grid/main_search_view', $data, TRUE);

        // Check if this is an AJAX request
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // Load only the search results view
            echo $data['main_search_view'];
        } else {
            // Load the full search page
            $this->load->view('index', $data);
        }
    }

    private function searchRelevantJobposts($query, $criteria): array
    {
        // Get all job posts that contain the query in their title
        $job_posts = $this->jobposting_model->getJobsLike('title', $query, 'tbl_jobposting.*, tbl_employer.id AS employer_id, tbl_employer.tradename AS employer_name, tbl_employer.image AS employer_logo');

        // Get following employers
        if ($this->auth['user_type'] == 'EMPLOYEE') {
            $followed_employers = $this->follow_model->get_following($this->userdata->ID);
        }
        // Initialize an array to store the relevance scores
        $scores = [];

        // Get all followed employers in one call
        if (!empty($followed_employers)) {
            $employer_ids = array_map(static function ($employer) {
                return $employer->employer_id;
            }, $followed_employers);

            $this->db->cache_on();
            $employers = $this->Employer_model->getEmployersWhereIn('id', $employer_ids, 'id, address, barangay, city');
            $this->db->cache_off();
        }

        // Calculate the relevance score for each job post
        foreach ($job_posts as $job) {
            // Initialize the relevance score to 0
            $score = 0;

            if (!empty($employers)) {
                foreach ($employers as $followed) {
                    $employer_location = $followed->address . ' ' . $followed->barangay . ' ' . $followed->city;

                    // Check if the job post is from a followed employer
                    if ($job->employer_id == $followed->id) {
                        $score += 12;
                    }

                    // Check if the job has same location as followed employer
                    if (stripos($job->location, $employer_location) !== FALSE) {
                        ++$score;
                    }
                }
            }

            // Check if the job title matches the query
            if (stripos($job->title, $query) !== FALSE) {
                $score += 8;
            }

            // Check if the employee's title matches the job title
            if ($this->auth['user_type'] == 'EMPLOYEE' && stripos($job->title, $this->userdata->Title) !== FALSE) {
                $score += 4;
            }

            // Check if the job skills match the employee's skills
            if ($this->auth['user_type'] == 'EMPLOYEE' && !empty($job->skills_req)) {
                $skills_req = array_map('trim', explode(',', $job->skills_req));
                $skills_criteria = array_map('trim', $criteria['skills']);

                foreach ($skills_req as $skill) {
                    if (in_array(strtolower($skill), array_map('strtolower', $skills_criteria))) {
                        $score += 4;
                    }
                }
            }

            // Store the relevance score for this job post
            $scores[$job->id] = $score;
        }

        // Sort the job posts by their relevance scores in descending order
        arsort($scores);

        // Get the sorted job ids
        $job_ids = array_keys($scores);

        // Get the sorted job posts with their scores in one call
        return array_map(static function ($job_id) use ($scores, $job_posts) {
            foreach ($job_posts as $job_post) {
                if ($job_post->id == $job_id) {
                    return (object)array_merge((array)$job_post, ['score' => $scores[$job_id]]);
                }
            }

            return $job_posts;
        }, $job_ids);
    }

    private function searchRelevantEmployees($query, $criteria): array
    {
        $employees_skills = []; // Only if the current user is employee

        // Get all employees
        if ($this->auth['user_type'] == 'EMPLOYEE') {
            $employees = $this->employee_model->getEmployeesLike(['Fname' => $query, 'Mname' => $query, 'Lname' => $query], $this->userdata->ID);
            $employees_skills = $this->EmployeeSkills_model->getOtherEmployeeSkills($this->userdata->ID, 'skill');
        } else {
            $employees = $this->employee_model->getEmployeesLike(['Fname' => $query, 'Mname' => $query, 'Lname' => $query], NULL);
        }

        // Initialize an array to store the relevance scores
        $scores = [];

        // Calculate the relevance score for each employee
        foreach ($employees as $employee) {
            // Initialize the relevance score to 0
            $score = 0;

            // Check if the employee's name matches the query
            if (stripos($employee->Fname, $query) !== FALSE) {
                $score += 8;
            } else if (stripos($employee->Lname, $query) !== FALSE) {
                $score += 8;
            }

            // Check if the employee's title matches the employer's business type
            if ($this->auth['user_type'] == 'EMPLOYEE' && stripos($employee->Title, $criteria['title']) !== FALSE) {
                $score += 4;
            }

            // Check if the employee's City matches the employer's location
            if ($this->auth['user_type'] == 'EMPLOYEE' && stripos($criteria['city'], $employee->City) !== FALSE) {
                $score += 2;
            } else if ($this->auth['user_type'] == 'EMPLOYER' && stripos($criteria['location'], $employee->City) !== FALSE) {
                $score += 2;
            }

            // Check if other employee's skills match the current employee's skills
            if ($this->auth['user_type'] == 'EMPLOYEE') {
                $other_employee_skills = array_map(static function ($employee_skill) {
                    return get_object_vars($employee_skill)['skill'];
                }, $employees_skills);
                $employee_skills = array_map('trim', $criteria['skills']);

                foreach ($other_employee_skills as $skill) {
                    if (in_array(strtolower($skill), array_map('strtolower', $employee_skills))) {
                        $score += 2;
                    }
                }
            }

            // Store the relevance score for this employee
            $scores[$employee->ID] = $score;
        }

        // Sort the employees by their relevance scores in descending order
        arsort($scores);

        // Get the sorted employee ids
        $employee_ids = array_keys($scores);

        // Get the sorted employees with their scores in one call
        return array_map(static function ($employee_id) use ($scores, $employees) {
            foreach ($employees as $employee) {
                if ($employee->ID == $employee_id) {
                    return (object)array_merge((array)$employee, ['score' => $scores[$employee_id]]);
                }
            }

            return $employees;
        }, $employee_ids);
    }

    private function searchRelevantEmployers($query, $criteria): array
    {
        // Get all the employers
        if ($this->auth['user_type'] == 'EMPLOYER') {
            $other_employers = $this->Employer_model->getEmployersLike(['tradename' => $query, 'business_type' => $query], $this->userdata->id);
        } else {
            $other_employers = $this->Employer_model->getEmployersLike(['tradename' => $query, 'business_type' => $query], NULL);
        }

        // Apply the scoring system to other employers using the defined criteria
        $scores = [];

        // Sort the employers by their relevance scores in descending order
        if (!empty($other_employers)) {
            foreach ($other_employers as $other) {
                $score = 0;

                $other_name = strtolower($other->tradename);
                if (stripos($other_name, $query) !== FALSE) {
                    $score += 12;
                }

                // Check if the employer's business type matches the current employer. EMPLOYER ONLY
                if ($this->auth['user_type'] == 'EMPLOYER' && stripos($other->business_type, $criteria['business_type']) !== FALSE) {
                    $score += 8;
                } else if (stripos($other->business_type, $query) !== FALSE) {
                    $score += 8;
                }

                $other_address = strtolower($other->address . ' ' . $other->barangay . ' ' . $other->city);
                // Check if the employer's location matches the query
                if ($this->auth['user_type'] == 'EMPLOYER' && stripos($other_address, $criteria['location']) !== FALSE) {
                    $score += 2;
                } else if ($this->auth['user_type'] == 'EMPLOYEE' && stripos($other->city, (string)$criteria['city']) !== FALSE) {
                    $score += 2;
                }

                // Store the relevance score for this employer
                $scores[$other->id] = $score;
            }
        }

        // Sort the other employers
        arsort($scores);

        // Get the other employer's ids
        $other_ids = array_keys($scores);

        // Get the sorted other employers with their scores in one call
        // Display the results in the search results view with sorted employees and employers
        return array_map(static function ($employer_id) use ($scores, $other_employers) {
            foreach ($other_employers as $other) {
                if ($other->id == $employer_id) {
                    return (object)array_merge((array)$other, ['score' => $scores[$employer_id]]);
                }
            }

            return $other_employers;
        }, $other_ids);
    }
}
