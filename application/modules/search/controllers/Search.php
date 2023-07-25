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
            'employer/Employer_model' => 'employer_model',
            'jobposting/Jobposting_model' => 'jobposting_model',
            'follow/Follow_model' => 'follow_model',
            'employeeskills/EmployeeSkills_model' => 'employee_skill_model',
        ];

        $this->load->model($model_list);
    }

    public function index()
    {
        // Get the search query from the user input
        $query = $this->input->get('query');

        if ($this->auth['user_type'] == 'EMPLOYEE') {
            // Get the employee's search criteria
            $skills = $this->employee_skill_model->getEmployeeSkills($this->userdata->ID, 'skill');

            $skills = array_map(function ($skill) {
                return get_object_vars($skill)['skill'];
            }, $skills);

            $criteria = array(
                'skills' => $skills,
                'title' => $this->userdata->Title,
                'city' => $this->userdata->City
            );

            // Search for relevant job posts
            $results = $this->searchRelevantJobposts($query, $criteria);

            $data['results'] = $results;
            $data['search_view_results'] = $this->load->view('grid/employee_search_view', $data, true);

        } else {
            // Get the employer's search criteria
            $criteria = array(
                'tradename' => $this->userdata->tradename,
                'business_type' => $this->userdata->business_type
            );

            // Search for relevant employees
            $results = $this->searchEmployeesEmployers($query, $criteria);

            $data['results'] = $results;
            $data['search_view_results'] = $this->load->view('grid/employer_search_view', $data, true);
        }

        // Check if this is an AJAX request
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // Load only the search results view
            echo $data['search_view_results'];
        } else {
            // Load the full search page
            $this->load->view('index', $data);
        }
    }

    private function searchRelevantJobposts($query, $criteria): array
    {
        // Get all job posts that contain the query in their title
        $job_posts = $this->jobposting_model->getJobLike('title', $query, 'tbl_jobposting.*, tbl_employer.id AS employer_id, tbl_employer.tradename AS employer_name, tbl_employer.image AS employer_logo');

        // Get following employers
        $followed_employers = $this->follow_model->get_following($this->userdata->ID);
        // Initialize an array to store the relevance scores
        $scores = array();

        // Get all followed employers in one call
        if (!empty($followed_employers)) {
            $employer_ids = array_map(function ($employer) {
                return $employer->employer_id;
            }, $followed_employers);
            $employers = $this->employer_model->getEmployersWhereIn('id', $employer_ids, 'id, address, barangay, city');
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
                    if (stripos($job->location, $employer_location) !== false) {
                        ++$score;
                    }
                }
            }

            // Check if the job title matches the query
            if (stripos($job->title, $query) !== false) {
                $score += 8;
            }

            // Check if the employee's title matches the job title
            if (stripos($job->title, $this->userdata->Title) !== false) {
                $score += 4;
            }

            // Check if the job skills match the employee's skills
            if (!empty($job->skills_req)) {
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
        return array_map(function ($job_id) use ($scores, &$job_posts) {
            foreach ($job_posts as $job_post) {
                if ($job_post->id == $job_id) {
                    return (object)array_merge((array)$job_post, ['score' => $scores[$job_id]]);
                }
            }
        }, $job_ids);
    }


    private function searchEmployeesEmployers($query, $criteria): array
    {
        // Get all employees
        // Apply the scoring system to each employee using the search input only as criteria
        // Sort the employees by their relevance scores in descending order
        // Get the sorted employees

        // Get all the employers
        // Apply the scoring system to other employers using the defined criteria
        // Sort the employers by their relevance scores in descending order
        // Get the sorted employers

        // Display the results in the search results view with sorted employees and employers

        $other_employers = array();

        foreach ($criteria as $key => $value) {
            $other_employers[$key] = $this->employer_model->getOtherEmployerLike($this->userdata->id, $value, $query, 'id, tradename, business_type, city, image');
        }

        return array_unique($other_employers, SORT_REGULAR);
    }
}
