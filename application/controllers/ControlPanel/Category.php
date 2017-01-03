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
		echo json_encode(['success' => TRUE, 'message' => 'The category was added successfully.']);
	}

	public function remove()
	{
		$this->categories->remove($this->input->get('id'));
	}

	public function update()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');

		$success = $this->categories->update($id, $name) == 1;

		// Build the result.
		$result = ['success' => $success];
		if (!$success)
			$result['error'] = 'Something went wrong while trying to update the category.';
		echo json_encode($result);
	}
}