<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SortHandler
{
    private CI_Controller $CI;
    private $userdata;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->userdata = get_userdata(USER);
    }

    public function sortEmployeeRelevantJobposts($jobposts): array
    {
        $employee_skills = $this->CI->EmployeeSkills_model->getEmployeeSkills($this->userdata->ID, 'skill');
        $employee_skills = array_map(static function ($skill) {
            return get_object_vars($skill)['skill'];
        }, $employee_skills);

        $employee_location = $this->userdata->Address . ' ' . $this->userdata->Barangay . ' ' . $this->userdata->City;

        $relevantJobposts = array_map(function ($job) use ($employee_skills, $employee_location) {
            // Check if the job skills match the employee's skills
            if (!empty($job->skills_req)) {
                $skills_req = array_map('trim', explode(',', $job->skills_req));

                $job->relevant_skills = array_intersect($employee_skills, $skills_req);
                $job->relevant_skills_count = count($job->relevant_skills);
            } else {
                $job->relevant_skills = [];
                $job->relevant_skills_count = 0;
            }

            // Check if the job title matches the employee's title
            $job->relevant_title = stripos($job->title, $this->userdata->Title) !== FALSE;

            // Check if the job location matches the employee's location
            $job_location_words = array_map('strtolower', explode(' ', str_replace(',', ' ', $job->location)));
            $employee_location_words = array_map('strtolower', explode(' ', str_replace(',', ' ', $employee_location)));
            $common_words = array_intersect($job_location_words, $employee_location_words);

            $job->relevant_location = !empty($common_words);

            return $job;
        }, $jobposts);

        usort($relevantJobposts, static function ($a, $b) {
            // Sort by number of matching skills first
            if ($a->relevant_skills_count != $b->relevant_skills_count) {
                return $b->relevant_skills_count - $a->relevant_skills_count;
            }

            // If the number of matching skills is the same, sort by matching title
            if ($a->relevant_title != $b->relevant_title) {
                return $b->relevant_title - $a->relevant_title;
            }

            // If the title is also the same, sort by matching location
            return $b->relevant_location - $a->relevant_location;
        });

        return $relevantJobposts;
    }

    public function sortRelevantOtherEmployers($employers): array
    {
        $employer_business_type = $this->userdata->business_type;
        $employer_location = $this->userdata->address . ' ' . $this->userdata->barangay . ' ' . $this->userdata->city;

        $relevantEmployers = array_map(static function ($employer) use ($employer_business_type, $employer_location) {
            // Check if the employer's business type matches the employee's business type
            $employer->relevant_business_type = stripos($employer->business_type, $employer_business_type) !== FALSE;

            $other_location = $employer->address . ' ' . $employer->barangay . ' ' . $employer->city;

            // Check if the employer's location matches the employee's location
            $other_location_words = array_map('strtolower', explode(' ', str_replace(',', ' ', $other_location)));
            $employer_location_words = array_map('strtolower', explode(' ', str_replace(',', ' ', $employer_location)));
            $common_words = array_intersect($other_location_words, $employer_location_words);

            $employer->relevant_location = !empty($common_words);

            return $employer;
        }, $employers);

        usort($relevantEmployers, static function ($a, $b) {
            // Sort by matching business type first
            if ($a->relevant_business_type != $b->relevant_business_type) {
                return $b->relevant_business_type - $a->relevant_business_type;
            }

            // If the business type is the same, sort by matching location
            return $b->relevant_location - $a->relevant_location;
        });

        return $relevantEmployers;
    }
}