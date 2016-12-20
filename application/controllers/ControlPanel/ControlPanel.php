<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends My_Controller
{
	const MENU_ITEMS = [
		'pages', 'menus', 'users', 'profile', 'edit-page', 'media', 'edit-user', 'categories'
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

		// Load the models.
		$this->load->model('pages_model', 'pages');
		$this->load->model('categories_model', 'categories');
		$this->load->model('media_model', 'media');

		// Get the requested menu, check if it is valid.
		$menu = $this->input->get('menu');
		if (in_array($menu, self::MENU_ITEMS))
		{
			$data = [];

			// If a custom method exists, call that to get the data.
			$function = 'show_' . str_replace('-', '_', $menu);
			if (method_exists($this, $function))
				$data = $this->$function();

			// If the method did not return false, load the view.
			if ($data !== FALSE)
				$this->load->view('ControlPanel/views/' . $menu, $data);
		}
		else
			show_404();
	}

	/*
	View-specific data loading functions.
	These function either return an array containing data to be passed to the view with the same name,
	or FALSE to override the view loading.
	*/

	private function show_pages()
	{
		return ['pages' => $this->pages->all(TRUE)];
	}

	private function show_new_page()
	{
		
	}

	private function show_edit_page()
	{
		$id = $this->input->get('id');
		return [
			'page' => $id == -1 ? $this->pages->newPage() : $this->pages->get($id),
			'categories' => $this->categories->all()
		];
	}

	private function show_users()
	{
		return ['users' => $this->ion_auth->users()->result()];
	}

	private function show_profile()
	{
		return ['user' => $this->ion_auth->user()->row()];
	}

	private function show_edit_user()
	{
		return ['user' => $this->ion_auth->user($this->input->get('id'))->row()];
	}

	private function show_remove_user()
	{
		return $this->show_edit_user();
	}

	private function show_media()
	{
		return ['files' => $this->media->all()];
	}

	private function show_categories()
	{
		return ['categories' => $this->categories->all()];
	}
}