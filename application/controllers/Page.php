<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages');
    }

    public function remove()
    {
        $this->checkAjax();
        $this->checkLoggedInAjax();

        $this->pages->remove($this->input->get('page'));
    }
}