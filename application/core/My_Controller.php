<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	/**
	 * Check if the request is an AJAX request, or exit otherwise.
	 */
	protected function checkAjax()
	{
		if (!$this->input->is_ajax_request())
			exit('No direct script access allowed');
	}

	/**
	 * Check if the user is logged in, or echo a JSON error and exit otherwise.
	 */
	protected function checkLoggedInAjax()
	{
		if (!$this->ion_auth->logged_in())
		{
			echo json_encode(['success' => FALSE, 'message' => 'You are not logged in.']);
			exit();
		}
	}

	/**
	 * Check if the user is logged in, or show an error page and exit otherwise.
	 */
	protected function checkLoggedIn()
	{
		if (!$this->ion_auth->logged_in())
		{
			show_error('The requested resource requires user authentication.', 401, 'Not authorized');
			exit();
		}
	}
}