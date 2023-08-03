<?php
const DUPLICATE_RECORD = 'Duplicate record already found in the system.';
const REQUIRED_FIELD = 'Please fill in required fields.';
const PASSWORD_LENGTH = 'Password should not be less than 6 (six) characters long.';
const USERNAME_LENGTH = 'Username should not be less than 6 (six) characters long.';
const NO_ACCOUNT = 'No existing account.';
const INVALID_USERNAME_PASSWORD = 'Invalid password.';
const ACCOUNT_DISABLED = 'Account is currently disabled.';
const SAVED_SUCCESSFUL = 'Details saved successfully.';
const DELETED_SUCCESSFUL = 'Details deleted successfully.';
const RENEW_SUCCESSFUL = 'Application successfully saved.';
const CONFIRM_RENEWAL = 'Submit this application?';
const NO_CRYPTO = 'No Cryptographically Secure Random Function Available.';
const CANNOT_MODIFY = 'Sorry, the process cannot be proceed.';
const ERROR_API_KEY = 'Error validating security key.';
const NO_CURRENT_APPLICATION = 'You have no current application.';
const EMAIL_FORMAT = 'Username must not be in email format.';
const ERROR_PROCESSING = 'Error Processing.';
const MISSING_DETAILS = 'Missing Details. Double check any empty fields that is required to be filled.';
const MISSING_USERNAME = 'Username field is empty.';
const MISSING_NAME_DETAILS = 'Missing Details. Please fill up the input boxes related to the personnel name';
const UPDATE_SUCCESSFUL = 'Updated successfully.';
const MISSING_INSP = 'Please check the checkbox to assign the inspector to their respective tabs.';
const SUCCESS = 'SUCCESS TRANSACTION.';
const EMPTY_FIELDS = 'One of these forms must not be empty.';

/** user messages */
const DEFAULT_PASSWORD = 'Do not use the default password. Please create new password.';
const NOT_MATCH = 'Your password does not match. Please try again.';
const DUPLICATE_USERNAME_FOUND = 'Username is already taken, please try again.';

/** default messages */
const DEFAULT_LOGIN_PASSWORD = 'password1234*';
const CHAR_SET = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$11<>?!@#$%^&*()~\/.';
const USER = 'user';
const AUTH = 'auth';
const SYSTEM_NAME = 'Konnect';
const SYSTEM_MODULE = 'Konnect';
const MB = 1048576;

$tables = [
    'employee' => 'tbl_employee',
    'employed' => 'tbl_employed',
    'education' => 'tbl_education',
    'employee_skill' => 'tbl_employee_skill',
    'employer' => 'tbl_employer',
    'employment' => 'tbl_employment',
    'feedback' => 'tbl_feedback',
    'jobposting' => 'tbl_jobposting',
    'skill' => 'tbl_skill',
    'training' => 'tbl_training',
    'applicant' => 'tbl_applicant',
    'user' => 'tbl_user',
    'follow' => 'tbl_follow',
    'notification' => 'tbl_notification',
    'resume' => 'tbl_resume',
];

try {
    define('TABLE', json_encode($tables, JSON_THROW_ON_ERROR));
} catch (JsonException $e) {
    throw new RuntimeException($e->getMessage(), $e->getCode(), $e);
}
