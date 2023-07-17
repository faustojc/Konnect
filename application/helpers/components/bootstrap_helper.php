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
