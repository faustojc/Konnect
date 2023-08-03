<?php
date_default_timezone_set("Asia/Manila");
function locker($length = 50): string
{
    $result = "";
    $chars = CHAR_SET;
    $charArray = str_split($chars);

    for ($i = 0; $i < $length; $i++) {
        $randItem = array_rand($charArray);
        $result .= "" . $charArray[$randItem];
    }

    return $result;
}

function auth_token($value, $length = 30): string
{

    // $bytes = random_bytes(ceil($length / 2));
    $bytes = uniqid('', TRUE);
    $random = substr(bin2hex($bytes), 0, $length);
    return (sha1($random . $value . date('y-m-d:h:i:s')));
}

function password_generator($password, $locker, $length = 100): string
{
    return str_repeat(strrev($password) . $locker, $length);
}

function check_user_info()
{
    if (empty($_SESSION[USER])) {
        redirect(base_url() . 'login');
    }
}

function reset_session()
{
    unset($_SESSION[USER]);
}

function check_permission($position = '', $condition = [])
{
    if (in_array($position, $condition))
        return TRUE;
    return FALSE;
}

function unit_permission($condition = '', $values = '')
{
    switch ($condition) {
        case 'admin':
            return TRUE;
            break;
        case 'doctor':
            return TRUE;
            break;
        case 'accounting':
            return TRUE;
            break;
        case 'medtech':
            return TRUE;
            break;
        default:
            return FALSE;
            break;
    }
}

function id_code($brgy = '', $no = '')
{
    $str = str_replace(' ', '', $brgy);
    $trim = strtok($str, '(');
    $trim = preg_replace('/ -]/', '', $trim);

    $brgy = $trim;

    if (strpos(strtolower(@$brgy), 'barangay') !== FALSE) {
        $result = strtoupper(explode('barangay', strtolower($brgy), 2)[1]);

        $data = 'BRGY' . @$result . '-' . $no;
    } else {
        $data = strtoupper(substr($brgy, 0, 3)) . '-' . $no;
    }

    return $data;
}

function order_number_gen($id)
{
    $byte = random_bytes(ceil(5 / 2));
    $rand = substr(bin2hex($byte), 0, 5) . '' . $id;

    return $rand;
}

/** password verification */
function password_verify_laravel($plain_text, $hash)
{
    if (password_verify($plain_text, $hash)) {
        return TRUE;
    } else {
        return FALSE;
    }
}
