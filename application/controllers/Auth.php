<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
    }

    public function index()
    {
        $this->load->view('ControlPanel/login');
    }

    public function login()
    {
        
    }

    public function recover()
    {

    }
}