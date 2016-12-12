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

		$this->load->model('pages_model', 'pages');
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
		$slug = $this->input->post('slug');
		$hidden = $this->input->post('hidden') == "true";

		// This seems strange, but this way we only have to change one of the result items.
		$result = ['success' => FALSE, 'message' => 'The page was saved successfully.'];

		// Validate.
		if (empty($id))
			$result['message'] = 'The id of the page cannot be empty. Please refresh the page and try again.';
		else if (empty($title))
			$result['message'] = 'The title cannot be empty.';
		else if (empty($slug))
			$result['message'] = 'The slug cannot be empty.';
		else
		{
			$result['success'] = $this->pages->upsert($id, $title, $content, $slug, $hidden);

			// Check if something went wrong while saving to the db.
			if (!$result['success'])
				$result['message'] = 'Something went wrong while trying to save the page.';
		}

		echo json_encode($result);
	}
}