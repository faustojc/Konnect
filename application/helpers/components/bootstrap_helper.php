<?php
if (!function_exists('modal')) {
    /**
     * Modal Component
     * A component that creates a modal.
     *
     * USAGE: modal($modalId, $title, $content, $submitBtnId, $submitBtnText);
     *
     * @param string $modalId The id of the modal.
     * @param string $title The title of the modal.
     * @param string $content The content of the modal.
     * @param string $submitBtnId The id of the submit button.
     * @param string $submitBtnText The text of the submit button.
     * @param string $bgColor OPTIONAL: The background color of the modal.
     */
    function modal(string $modalId, string $title, string $content, string $submitBtnId, string $submitBtnText, string $bgColor = '')
    {
        $data = array(
            'modalId' => $modalId,
            'title' => $title,
            'content' => $content,
            'submitBtnId' => $submitBtnId,
            'submitBtnText' => $submitBtnText,
            'bgColor' => $bgColor
        );

        $CI = &get_instance();
        $CI->load->view('components/modal', $data);
    }
}

if (!function_exists('showNotification')) {
    /**
     * Show Notification Component
     *
     * A component that shows a notification.
     *
     * USAGE: showNotification($type, $message);
     *
     * @param string $type The type of the notification. 'Success', 'Error', 'Warning', 'Info'
     * @param string $title The title of the notification.
     * @param string $message The message of the notification.
     */
    function showNotification(string $type, string $title, string $message)
    {
        $data = array(
            'type' => $type,
            'title' => $title,
            'message' => $message
        );

        $CI = &get_instance();
        $CI->load->view('components/show_notification', $data);
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
        $data = array(
            'employees' => $employees
        );

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
    function load_employers(array $employers, array $following = array())
    {
        $user_type = get_userdata(AUTH)['user_type'];
        $data = array(
            'employers' => $employers,
            'user_type' => $user_type,
        );

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
        $data = array(
            'followers' => $followers
        );

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
        $data = array(
            'following' => $following
        );

        $CI = &get_instance();
        $CI->load->view('components/load_followings', $data);
    }
}

if (!function_exists('load_jobpost')) {
    /**
     * Load Jobpostings Component
     *
     * A component that loads jobpostings.
     *
     * USAGE: load_jobpostings($jobpostings);
     *
     * @param array $jobpost The data of jobpost.
     */
    function load_jobpost(array $jobpost)
    {
        $data = array(
            '$jobpost' => $jobpost
        );

        $CI = &get_instance();

        $CI->load->view('components/load_jobpost', $data);
    }
}

if (!function_exists('apply_button')) {
    /**
     * Apply Button Component
     *
     * A component that creates an apply button.
     *
     * USAGE: apply_button($jobpost);
     *
     * @param int $job_id The id of current job post
     * @param string $status The status of applied job post
     */
    function apply_button(int $job_id, string $status)
    {
        $data = array(
            'job_id' => $job_id,
            'status' => $status,
        );

        $CI = &get_instance();
        $CI->load->view('components/employee/dashboard/apply_button', $data);
    }
}
