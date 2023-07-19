<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applicant_model extends CI_Model
{
    /**
     * @var mixed
     */
    private $Table;

    public function __construct()
    {
        parent::__construct();

        $this->Table = json_decode(TABLE);
    }

    
}