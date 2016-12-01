<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        if (!$this->input->is_ajax_request())
            exit('No direct script access allowed');

        // Get the data.
        $id = $this->input->post('user');
        $pass = $this->input->post('pass');
        $remember = $this->input->post('remember');

        // Check if the max login attempts is exceeded.
        if ($this->ion_auth->is_max_login_attempts_exceeded($id))
            echo json_encode(['error' => 'The maximum number of login attempts is exceeded.']);
        else if ($this->ion_auth->login($id, $pass, $remember))
            echo json_encode(['success' => TRUE]);
        else
            echo json_encode(['error' => 'Invalid login data, please try again.']);
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('/ControlPanel');
    }

    public function recover()
    {

    }

    public function register()
    {
        if (!$this->input->is_ajax_request())
            exit('No direct script access allowed');

        // Check if the user is logged in and has the right permissions (TODO).
        if (!$this->ion_auth->logged_in())
            echo json_encode(['error' => 'You are not authorized to add a new user.']);

        echo json_encode(['success' => TRUE]);
    }
}