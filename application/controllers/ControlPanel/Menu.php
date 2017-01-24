<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Check if the request is AJAX and if the user is logged in.
		$this->checkAjax();
		$this->checkLoggedInAjax();

		$this->load->model('menus_model', 'menus');
	}

	public function save()
	{
		$name = $this->input->post('name');
		$items = $this->input->post('items');

		$this->menus->save($name, $items);

		// Build the result.
		$result = ['success' => TRUE, 'message' => 'The menu was saved successfully.'];
		echo json_encode($result);
	}
}