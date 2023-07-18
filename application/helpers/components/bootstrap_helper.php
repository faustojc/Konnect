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
        $user_type = get_userdata('auth')['user_type'];
        $data = array(
            'employers' => $employers
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

if (!function_exists('load_jobpostings')) {
    /**
     * Load Jobpostings Component
     *
     * A component that loads jobpostings.
     *
     * USAGE: load_jobpostings($jobpostings);
     *
     * @param array $jobpostings The array of jobpostings.
     * @param array $saved OPTIONAL: The array of saved jobpostings.
     * @param array $applied OPTIONAL: The array of applied jobpostings.
     */
    function load_jobpostings(array $jobpostings, array $saved = array(), array $applied = array())
    {
        $user_type = get_userdata('auth')['user_type'];
        $data = array(
            'jobpostings' => $jobpostings
        );

        if (!empty($saved) && $user_type == 'EMPLOYEE') {
            $data['saved'] = $saved;
        }

        if (!empty($applied) && $user_type == 'EMPLOYEE') {
            $data['applied'] = $applied;
        }

        $CI = &get_instance();
        $CI->load->view('components/load_jobpostings', $data);
    }
}

if (!function_exists('loading_joblists')) {
    /**
     * Loading Job lists Component
     *
     * A component that displays a loading job lists content.
     *
     * USAGE: loading_joblists();
     */
    function loading_joblists()
    {
        $CI = &get_instance();
        $CI->load->view('components/loading_joblists');
    }
}
