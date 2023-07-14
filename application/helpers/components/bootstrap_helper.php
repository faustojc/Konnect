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
