<?php
if (!function_exists('numberShortForm')) {
    function numberShortForm($number): string
    {
        if ($number >= 1000000000) {
            $formattedNumber = number_format($number / 1000000000, 1) . 'B';
        } else if ($number >= 1000000) {
            $formattedNumber = number_format($number / 1000000, 1) . 'M';
        } else if ($number >= 1000) {
            $formattedNumber = number_format($number / 1000, 1) . 'K';
        } else {
            $formattedNumber = $number;
        }

        return $formattedNumber;
    }
}

if (!function_exists('imageExists')) {
    function imageExists($url): bool
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, TRUE);
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpCode == 200;
    }
}

if (!function_exists('formatTime')) {
    function formatTime(string $time): string
    {
        $timeDiff = time() - strtotime($time);
        if ($timeDiff < 60) {
            $formattedTimeDiff = 'less than a minute ago';
        } else if ($timeDiff < 3600) {
            $minutes = floor($timeDiff / 60);
            $formattedTimeDiff = $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
        } else if ($timeDiff < 86400) {
            $hours = floor($timeDiff / 3600);
            $formattedTimeDiff = $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
        } else if ($timeDiff < 604800) {
            $days = floor($timeDiff / 86400);
            $formattedTimeDiff = $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
        } else if ($timeDiff < 2592000) {
            $weeks = floor($timeDiff / 604800);
            $formattedTimeDiff = $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
        } else if ($timeDiff < 31536000) {
            $months = floor($timeDiff / 2592000);
            $formattedTimeDiff = $months . ' month' . ($months > 1 ? 's' : '') . ' ago';
        } else {
            $years = floor($timeDiff / 31536000);
            $formattedTimeDiff = $years . ' year' . ($years > 1 ? 's' : '') . ' ago';
        }

        return $formattedTimeDiff;
    }
}

if (!function_exists('getTimeDiff')) {
    function getTimeDiff($time): string
    {
        $currentTime = new DateTime();
        $diff = NULL;
        try {
            $diff = $currentTime->diff(new DateTime($time));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $minutes = $diff->i;
        $hours = $diff->h;
        $days = $diff->d;

        if ($minutes < 60) {
            $timeAgo = $minutes . "min";
        } else if ($hours < 24) {
            $timeAgo = $hours . "hr";
        } else {
            $timeAgo = $days . "day";
        }

        return $timeAgo;
    }
}

if (!function_exists('sendEmail')) {
    function sendEmail($from, $name, $to, $subject, $message): void
    {
        $CI = &get_instance();
        $CI->load->library('email');

        $CI->email->from($from, $name);
        $CI->email->to($to);

        $CI->email->subject($subject);
        $CI->email->message($message);

        $CI->email->send();
    }
}

function is_empty_object($obj): bool
{
    return $obj == new stdClass();
}

function sidebar($sidebar = NULL, $realSidebar = NULL): bool
{
    //--NOTE--
    // Array values are key sensitive.
    $countSidebar = count($sidebar);
    $countrealSidebar = count($realSidebar);
    $flag = TRUE;
    $counter = 0;
    $result = [];

    if (empty($sidebar) || empty($realSidebar)) {
        return FALSE;
    }
    if ($countrealSidebar == 1 && @$sidebar[0] == @$realSidebar[0]) {
        return TRUE;
    }
    if ($countrealSidebar == 2 && @$sidebar[1] == @$realSidebar[1]) {
        return TRUE;
    }

    do {
        if (!isset($sidebar[$counter], $realSidebar[$counter])) {
            $sidebar[$counter] = NULL;
            $realSidebar[$counter] = NULL;
        }
        if ($sidebar[$counter] == $realSidebar[$counter]) {
            $result[] = TRUE;
        } else {
            $result[] = FALSE;
        }
        $counter++;
        if ($counter == $countSidebar) {
            $flag = FALSE;
        }
    } while ($flag);

    return count(array_keys($result, TRUE)) == count($result);
}
