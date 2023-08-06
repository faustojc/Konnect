<?php
if (!function_exists('jobpost_all_display')) {
    /**
     * Jobpostings Display Component
     *
     * A component that displays all the jobposts.
     *
     * USAGE: jobpost_display($data);
     *
     * @param array|array[] $data The array of jobposts.
     */
    function jobpost_all_display(array $data)
    {
        $jobpostings = [
            'jobpostings' => $data,
        ];

        $CI = &get_instance();
        $CI->load->view('components/jobpost_all_display', $jobpostings);
    }
}

if (!function_exists('displayJobpost')) {
    /**
     * Jobpost Display Component
     *
     * A component that displays a jobpost.
     *
     * USAGE: displayJobpost($data);
     *
     * @var object $data The data of jobpost must contain the same keys as the database table.
     */
    function displayJobpost(object $data)
    {
        $jobpost = [
            'jobpost' => $data,
            'auth' => get_userdata(AUTH),
        ];

        $CI = &get_instance();
        $CI->load->view('components/load_jobpost', $jobpost);
    }
}

if (!function_exists('jobpost_update_modal')) {
    /**
     * Modal for Jobpost Editing Component
     *
     * A component that creates a modal for jobpost editing.
     *
     * USAGE: jobpost_update_modal($data, $modalId);
     *
     * @param object $data The data of jobpost must contain the same keys as the database table.
     * @param string $modalId The id of the modal.
     */
    function jobpost_update_modal(object $data, string $modalId)
    {
        $jobpost = $data;

        $data = [
            'jobpost' => $jobpost,
            'modalId' => $modalId,
        ];

        $CI = &get_instance();
        $CI->load->view('components/jobpost_update_modal', $data);
    }
}

if (!function_exists('displayNotifications')) {
    /**
     * Display Notifications Component
     *
     * A component that displays all notifications.
     *
     * USAGE: displayNotifications($notifications);
     *
     * @param array $notifications The array of data of notifications.
     */
    function displayNotifications(array $notifications)
    {
        $data = [
            'notifications' => $notifications,
        ];

        $CI = &get_instance();
        $CI->load->view('components/display_notifications', $data);
    }
}

if (!function_exists('load_employees')) {
    /**
     * Load Employees Component
     *
     * A component that loads employees.
     *
     * USAGE: load_employees($employees);
     *
     * @param array $employees The array of employees.
     */
    function load_employees(array $employees)
    {
        $data = [
            'employees' => $employees,
        ];

        $CI = &get_instance();
        $CI->load->view('components/load_employees', $data);
    }
}

if (!function_exists('load_employers')) {
    /**
     * Load Employers Component
     *
     * A component that loads employers.
     *
     * USAGE: load_employers($employers);
     *
     * @param array $employers The array of employers.
     * @param array $following OPTIONAL: The array of employee's followed employers.
     */
    function load_employers(array $employers, array $following = [])
    {
        $user_type = get_userdata(AUTH)['user_type'];
        $data = [
            'employers' => $employers,
            'user_type' => $user_type,
        ];

        if (!empty($following) && $user_type == 'EMPLOYEE') {
            $data['following'] = $following;
        }

        $CI = &get_instance();
        $CI->load->view('components/load_employers', $data);
    }
}

if (!function_exists('load_followers')) {
    /**
     * Load Followers Component
     *
     * A component that loads followers.
     *
     * USAGE: load_followers($followers);
     *
     * @param array $followers The array of followers.
     */
    function load_followers(array $followers)
    {
        $data = [
            'followers' => $followers,
        ];

        $CI = &get_instance();
        $CI->load->view('components/load_followers', $data);
    }
}

if (!function_exists('load_following')) {
    /**
     * Load Following Component
     *
     * A component that loads following.
     *
     * USAGE: load_following($following);
     *
     * @param array $following The array of following.
     */
    function load_following(array $following)
    {
        $data = [
            'following' => $following,
        ];

        $CI = &get_instance();
        $CI->load->view('components/load_followings', $data);
    }
}

if (!function_exists('apply_button')) {
    /**
     * Apply Button Component for Employee
     *
     * A component that creates an apply button for employee.
     *
     * USAGE: apply_button($jobpost);
     *
     * @param int $job_id The id of current job post
     * @param string $status The status of applied job post
     */
    function apply_button(int $job_id, string $status)
    {
        $CI = &get_instance();

        $data = [
            'job_id' => $job_id,
            'status' => $status,
            'employee' => get_userdata(USER),
            'resume' => $CI->Resume_model->getResume(get_userdata(USER)->ID),
        ];

        $CI->load->view('components/employee/dashboard/apply_button', $data);
    }
}

if (!function_exists('load_feedback')) {
    /**
     * Load Feedback Component
     *
     * A component that loads all the user's feedback.
     *
     * USAGE: load_feedback($feedback, $isAccount);
     *
     * @param array $feedback The array of feedback.
     * @param bool $isAccount The boolean value if the user is the account owner.
     */
    function load_feedback(array $feedback, bool $isAccount)
    {
        $data = [
            'feedback' => $feedback,
            'has_permission' => $isAccount,
        ];

        $CI = &get_instance();
        $CI->load->view('components/load_feedback', $data);
    }
}

if (!function_exists('follow_button')) {
    /**
     * Follow Button Component
     *
     * A component that displays a follow button for employee.
     *
     * USAGE: follow_button($user_id, $user_type, $isFollowing);
     *
     * @param int $employer_id
     * @param array $following
     */
    function follow_button(int $employer_id, array $following)
    {
        $data = [
            'employer_id' => $employer_id,
            'following' => $following,
        ];

        $CI = &get_instance();
        $CI->load->view('components/follow_button', $data);
    }
}

if (!function_exists('resumeDisplay')) {
    /**
     * Resume Display Component
     *
     * A component that displays the resume of the employee.
     *
     * USAGE: resumeDisplay($resume);
     *
     * @param object $resume The resume of the employee.
     */
    function resumeDisplay(object $resume)
    {
        $data = [
            'resume' => $resume,
        ];

        $CI = &get_instance();
        $CI->load->view('components/resume_display', $data);
    }
}
