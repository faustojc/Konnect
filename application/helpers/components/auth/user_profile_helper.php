<?php
if (!function_exists('employer_edit_button')) {
    /**
     * Load Employers Edit Button Component
     *
     * A component that loads employers button to edit the profile.
     *
     * USAGE: edit_profile_button($id);
     *
     * @param int $id The id of the employer.
     *
     * @return void
     */
    function employer_edit_button(int $id)
    {
        $data = ['id' => $id];

        $CI = &get_instance();
        $CI->load->view('components/auth/employer_profile_button', $data);
    }
}

if (!function_exists('employee_edit_button')) {
    /**
     * Load Employee Edit Button Component
     *
     * A component that loads employee button to edit the profile.
     *
     * USAGE: edit_profile_button($id);
     *
     * @return void
     */
    function employee_edit_button()
    {
        $CI = &get_instance();
        $CI->load->view('components/auth/employee_profile_button');
    }
}

if (!function_exists('verify_message')) {
    function verify_message($auth)
    {
        $data = ['auth' => $auth];

        $CI = &get_instance();
        $CI->load->view('components/auth/verify_message', $data);
    }
}

if (!function_exists('verifyBadge')) {
    /**
     * @var array|bool $auth
     */
    function verifyBadge($auth)
    {
        if (is_array($auth)) {
            $data = ['is_verified' => $auth['is_verified']];
        } else {
            $data = ['is_verified' => $auth];
        }

        $CI = &get_instance();
        $CI->load->view('components/auth/verify_badge', $data);
    }
}
