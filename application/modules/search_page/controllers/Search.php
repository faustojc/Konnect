<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
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
            'employeeskill/EmployeeSkill_model' => 'employee_skill_model',
        ];

        $this->load->model($model_list);
    }

    public function index()
    {
        // Get the search query from the user input
        $query = $this->input->get('query');

        if ($this->auth->user_type == 'EMPLOYEE') {
            // Get the employee's search criteria
            $criteria = array(
                'skills' => $this->employee_skill_model->getEmployeeSkills($this->userdata->ID),
                'title' => $this->userdata->Title,
                'city' => $this->userdata->City
            );

            // Search for relevant job posts
            $results = $this->search_job_posts($query, $criteria);

            $data['results'] = $results;
            $this->load->view('grid/employee_search_result', $data);
        } else {
            // Get the employer's search criteria
            $criteria = array(
                'tradename' => $this->userdata->tradename,
                'business_type' => $this->userdata->business_type
            );

            // Search for relevant employees
            $results = $this->search_employees_and_employers($query, $criteria);

            $data['results'] = $results;
            $this->load->view('grid/employer_search_result', $data);
        }
    }

    private function search_job_posts($query, $criteria): array
    {
        // Get all job posts
        $job_posts = $this->jobposting_model->get_all_job_posts();

        // Initialize an array to store the relevance scores
        $scores = array();

        // Calculate the relevance score for each job post
        foreach ($job_posts as $job) {
            // Initialize the relevance score to 0
            $score = 0;

            // Check if the job title matches the query
            if (stripos($job->title, $query) !== false) {
                $score += 5;
            }

            // Check if the job skills match the employee's skills
            if (in_array(strtolower($job->skills_req), array_map('strtolower', $criteria['skills']))) {
                ++$score;
            }

            // Store the relevance score for this job post
            $scores[$job->id] = $score;
        }

        // Sort the job posts by their relevance scores in descending order
        arsort($scores);

        // Get the sorted job posts
        return $this->jobposting_model->getAllJobpostsByIds($scores);
    }

    private function search_employees_and_employers($query, $criteria): array
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

        return array();
    }
}
