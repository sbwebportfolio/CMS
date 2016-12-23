<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Check if the request is AJAX and if the user is logged in.
		$this->checkAjax();
		$this->checkLoggedInAjax();

		$this->load->model('categories_model', 'categories');
	}

	public function create()
	{
		$this->categories->create($this->input->post('name'));
		echo json_encode(['success' => TRUE]);
	}

	public function remove()
	{
		$this->categories->remove($this->input->get('id'));
	}
}