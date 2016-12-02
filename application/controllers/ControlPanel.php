<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends My_Controller
{
    const MENU_ITEMS = [
        'pages', 'posts', 'menus', 'users', 'profile', 'edit', 'remove'
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
        {
            // Get the right method, and if it exists call it to load the data.
            $function = 'show_' . $menu;
            $data = method_exists($this, $function) ? $this->$function() : [];

            $this->load->view('ControlPanel/views/' . $menu, $data);
        }
        else
            show_404();
    }

    /*==== View-specific data loading functions. ====*/

    private function show_pages()
    {
        $this->load->model('pages');
        return ['pages' => $this->pages->all()];
    }

    private function show_users()
    {
        return ['users' => $this->ion_auth->users()->result()];
    }

    private function show_profile()
    {
        return ['user' => $this->ion_auth->user()->row()];
    }

    private function show_remove()
    {
        $this->load->model('pages');
        return ['page' => $this->pages->get($this->input->get('page'))];
    }
}