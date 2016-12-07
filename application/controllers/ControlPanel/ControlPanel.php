<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends My_Controller
{
    const MENU_ITEMS = [
        'pages', 'posts', 'menus', 'users', 'profile', 'edit-page', 'remove-content', 'add-user', 'edit-post', 'new-page'
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
        $this->load->view('ControlPanel/views/edit-page', ['page' => $this->pages->newPage()]);
    }

    private function show_edit_page()
    {
        $this->load->model('pages');
        $this->load->view('ControlPanel/views/edit-page', ['page' => $this->pages->get($this->input->get('id'))]);
    }

    public function show_posts()
    {
        $this->load->model('posts');
        $this->load->model('categories');

        $posts = $this->posts->all();
        foreach ($posts as $post)
            $post->categories = $this->categories->forPost($post->id);

        $this->load->view('ControlPanel/views/posts', ['posts' => $posts]);
    }

    public function show_edit_post()
    {
        $this->load->model('posts');
        $this->load->model('categories');

        $post = $this->posts->get($this->input->get('id'));
        $post->categories = $this->categories->forPost($post->id);

        $this->load->view('ControlPanel/views/edit-post', ['post' => $post]);
    }

    private function show_remove_post()
    {
        $this->load->model('posts');
        $this->load->model('categories');

        $post = $this->posts->get($this->input->get('post'));
        $post->categories = $this->categories->forPost($post->id);

        $this->load->view('ControlPanel/views/remove-post', ['post' => $post]);
    }

    private function show_users()
    {
        $this->load->view('ControlPanel/views/users', ['users' => $this->ion_auth->users()->result()]);
    }

    private function show_profile()
    {
        $this->load->view('ControlPanel/views/profile', ['user' => $this->ion_auth->user()->row()]);
    }

    private function show_remove_content()
    {
        $type = $this->input->get('type');
        $id = $this->input->get('id');

        // Load the content based on the type.
        if ($type === 'page')
        {
            $this->load->model('pages');
            $content = $this->pages->get($id);
        }
        else if ($type === 'post')
        {
            $this->load->model('posts');
            $content = $this->posts->get($id);
        }
        else
            show_404();

        $content->type = $type;
        $this->load->view('ControlPanel/views/remove-content', ['content' => $content]);
    }
}