<?php
const DUPLICATE_RECORD = 'Duplicate record already found in the system.';
const EXIST_COLLECTION_LINE = 'Sorry this transaction cannot be process, this invoice was collected. ';
const EXIST_INVOICE_TRANSACTION = 'Sorry this transaction cannot be process, this client has invoice transacted. ';
const EXIST_COLLECTION_TRANSACTION = 'Sorry this transaction cannot be process, this invoice has collection transacted. ';
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
const USER = null | array();
const SYSTEM_NAME = 'Konnect';
const SYSTEM_ALT = '';
const FOOTER_NAME = '';
const FOOTER_YEAR = '';
const SYSTEM_MODULE = 'Konnect';
const MB = 1048576;

$array = array(
    // 'customer' =>  'tbl_customers',
    // 'items' => 'tbl_items',
    // 'order' => 'tbl_order',
    // 'reference' => 'tbl_reference',
    // 'list' => 'tbl_list',
    // 'applicant' => 'tblapplicant',
    // 'application' => 'tblapplication',
    // 'uses' => 'tbl_use_base',
    // 'position' => 'tbl_obo_position',
    // 'obo_personnel' => 'tbl_obo_personnel',
    // 'personnel' => 'tbl_personnel',
    // 'requirements' => 'tblrequirements',
    // 'scope' => 'tblscope',
    // 'bldgdetails' => 'tblbldgdetails',
    // 'professional' => 'tblprofessionalprof',
    // 'reqsubmitted' => 'tblreqsubmitted',
    // 'permit' => 'tbl_permit_type',
    // 'use'   => 'tbluse',
    // 'app_status' => 'tblapplicationstatus',
    // 'verification' => 'tblverification',
    // 'scopebase' => 'tblscopebase',
    // 'elecpermit' => 'tblapplication_ep',
    // 'mechpermit' => 'tblapplication_mechanical',
    // 'sanitary' => 'tblapplication_sanitaryplumbing',
    // 'p_access' => 'tbl_personnel_access',
    // 'remarks' => 'tbl_app_remarks',
    // 'inspection_verdict_table' => 'tbl_app_inpection_status',
    // 'particulars' => 'tbl_particular',
    // 'assessment' => 'tblassessment',
    // 'app_status' => 'tblapplicationstatus'
);

$tables = array(
    'employee' => 'tbl_employee',
    'employee_educ' => 'tbl_employee_educ',
    'employee_skill' => 'tbl_employee_skill',
    'employer' => 'tbl_employer',
    'employment' => 'tbl_employment',
    'feedback' => 'tbl_feedback',
    'jobposting' => 'tbl_jobposting',
    'skill' => 'tbl_skill',
    'training' => 'tbl_training',
);

define('TABLE', json_encode($tables));