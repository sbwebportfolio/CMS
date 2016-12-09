<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends My_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Check if the request is AJAX and if the user is logged in.
		$this->checkAjax();
		$this->checkLoggedInAjax();

		$this->load->model('pages');
	}

	public function remove()
	{
		$this->pages->remove($this->input->get('id'));
	}

	public function save()
	{
		// Get the data.
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$content = $this->input->post('content');

		$result = ['success' => TRUE, 'message' => 'The page was saved successfully.'];

		// Check if the id is -1, then it is a new page.
		if ($id == -1)
			$this->pages->create($title, $content);
		else
			$result['success'] = $this->pages->update($id, $title, $content);

		// Check if the page was saved successfully.
		if (!$result['success'])
			$result['message'] = 'Something went wrong while trying to save the page.';

		echo json_encode($result);
	}
}