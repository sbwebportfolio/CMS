<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model', 'pages');
	}

	public function _remap($name, $args)
	{
		// Check for a name or arguments, which invalidate the url.
		if ($name !== 'index' || !empty($args))
			show_404();
			
		$this->load->view('pages', ['pages' => $this->pages->all(FALSE)]);
	}
}