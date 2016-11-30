<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends CI_Controller
{
    const MENU_ITEMS = [
        'pages', 'posts', 'menus', 'users'
    ];

    public function index()
    {
        // Check if the user is logged in. 
        if ($this->ion_auth->logged_in())
            $this->load->view('ControlPanel/ControlPanel');
        else
            $this->load->view('ControlPanel/Login');
    }

    public function show()
    {
        // Check if the user is logged in.
        if (!$this->ion_auth->logged_in())
            redirect('/ControlPanel');

        // Get the requested menu, check if it is valid.
        $menu = $this->input->get('menu');
        if (in_array($menu, self::MENU_ITEMS))        
            $this->load->view('ControlPanel/views/' . $menu);
    }
}