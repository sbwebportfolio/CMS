<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends My_Controller
{
    const MENU_ITEMS = [
        'pages', 'menus', 'users', 'profile', 'edit-page', 'remove-page', 'add-user', 'new-page', 'media'
    ];

    public function index()
    {
        // If the user is not logged in, load the login view.
        if (!$this->ion_auth->logged_in())
            $this->load->view('ControlPanel/Login');
        else
        {
            // Load the control panel.
            $data = [
                'user' => $this->ion_auth->user()->row()
            ];
            $this->load->view('ControlPanel/ControlPanel', $data);
        }
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
            // If a custom method exists, call that. Otherwise simply load the view.
            $function = 'show_' . str_replace('-', '_', $menu);
            if (method_exists($this, $function))
                $this->$function();
            else
                $this->load->view('ControlPanel/views/' . $menu);
        }
        else
            show_404();
    }

    /*==== View-specific data loading functions. ====*/

    private function show_pages()
    {
        $this->load->model('pages');
        $this->load->view('ControlPanel/views/pages', ['pages' => $this->pages->all()]);
    }

    private function show_new_page()
    {
        $this->load->model('pages');
        $this->load->model('categories');

        $data = [
            'page' => $this->pages->newPage(),
            'categories' => $this->categories->all()
        ];

        $this->load->view('ControlPanel/views/edit-page', $data);
    }

    private function show_edit_page()
    {
        $this->load->model('pages');
        $this->load->model('categories');

        $data = [
            'page' => $this->pages->get($this->input->get('id')),
            'categories' => $this->categories->all()
        ];

        $this->load->view('ControlPanel/views/edit-page', $data);
    }

    private function show_remove_page()
    {
        $this->load->model('pages');
        $this->load->view('ControlPanel/views/remove-page', ['page' => $this->pages->get($this->input->get('id'))]);
    }

    private function show_users()
    {
        $this->load->view('ControlPanel/views/users', ['users' => $this->ion_auth->users()->result()]);
    }

    private function show_profile()
    {
        $this->load->view('ControlPanel/views/profile', ['user' => $this->ion_auth->user()->row()]);
    }
}