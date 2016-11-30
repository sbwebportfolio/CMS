<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
    }

    public function index()
    {
        // Check if the user is logged in. 
        if ($this->ion_auth->logged_in())
            $this->load->view('ControlPanel/ControlPanel');
        else
            $this->load->view('ControlPanel/login');
    }

    public function login()
    {
        if (!$this->input->is_ajax_request())
            exit('No direct script access allowed');

        // Get the data.
        $id = $this->input->post("user");
        $pass = $this->input->post("pass");
        $remember = $this->input->post("remember");

        // Check if the max login attempts is exceeded.
        if ($this->ion_auth->is_max_login_attempts_exceeded($id))
            echo json_encode(["error" => "The maximum number of login attempts is exceeded."]);
        else if ($this->ion_auth->login($id, $pass, $remember))
            echo json_encode(["success" => TRUE]);
        else
            echo json_encode(["error" => "Invalid login data, please try again."]);
    }

    public function logout()
    {
        $this->ion_auth->logout();
    }

    public function recover()
    {

    }
}