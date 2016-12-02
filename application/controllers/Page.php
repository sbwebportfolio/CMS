<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages');
    }

    public function remove()
    {
        if (!$this->ion_auth->logged_in())
        {
            echo json_encode(['error' => 'You are not logged in.']);
            exit();
        }

        $this->pages->remove($this->input->get('page'));
    }
}