<?php
if (!function_exists('image_exist')) {
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

function select_active($value1, $value2)
{
    return ($value1 == $value2) ? "selected='selected'" : "";
}

function disable_field($id)
{
    if ($id > 0) {
        return "readonly='readonly'";
    }
}

function user_module($user_modules, $module_ID)
{
    foreach ($user_modules as $item) {
        if ($item->PersonnelType_ID == $module_ID) {
            // if ($item->$permission == 1)
            // {
            return "hidden";
            // }
        }
    }
}

function format_date($date)
{
    $date = explode("-", $date);
    $month = $date[1];
    switch ($date[1]) {
        case "01":
            $month = "January";
            break;
        case "02":
            $month = "February";
            break;
        case "03":
            $month = "March";
            break;
        case "04":
            $month = "April";
            break;
        case "05":
            $month = "May";
            break;
        case "06":
            $month = "June";
            break;
        case "07":
            $month = "July";
            break;
        case "08":
            $month = "August";
            break;
        case "09":
            $month = "September";
            break;
        case "10":
            $month = "October";
            break;
        case "11":
            $month = "November";
            break;
        case "12":
            $month = "December";
            break;
    }

    return $month . " " . $date[2] . ", " . $date[0];
}

function is_empty_object($obj)
{
    return $obj == new stdClass();
}

function socket_url()
{
    $ci =& get_instance();
    return $ci->config->item('socket_url');
}

function generate_random_integer()
{
    return bin2hex(random_bytes(4));
}

function sidebar($sidebar = NULL, $realSidebar = NULL)
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
        if (!isset($sidebar[$counter]) || !isset($realSidebar[$counter])) {
            $sidebar[$counter] = NULL;
            $realSidebar[$counter] = NULL;
        }
        if ($sidebar[$counter] == $realSidebar[$counter]) {
            array_push($result, TRUE);
        } else {
            array_push($result, FALSE);
        }
        $counter++;
        if ($counter == $countSidebar) {
            $flag = FALSE;
        }
    } while ($flag);

    return count(array_keys($result, TRUE)) == count($result);
}

/** user logs */
function user_logs($dataValue)
{

    $CI =& get_instance();
    $secret_key = $CI->config->item('encryption_key');
    $table = 'ctc_user_logs';

    $non_encrypt_data = [
        'origin_id' => $dataValue['originID'],
        'receiver_id' => $dataValue['receiverID'],
        'field_value' => str_replace('"', "'", serialize($dataValue['field_value'])),
        'date_created' => date('Y-m-d H:i:s'),
    ];

    $encrypt_data = [
        'table_origin' => $dataValue['tableOrigin'],
        'origin_name' => $dataValue['originName'],
        'table_receiver' => $dataValue['tableReceiver'],
        'receiver_name' => $dataValue['receiverName'],
        'description' => $dataValue['description'],
    ];

    insert_encryted_data($table, $encrypt_data, $non_encrypt_data);
}
