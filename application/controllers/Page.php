<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pages_model', 'pages');
		$this->load->model('templates_model', 'templates');
	}

	public function _remap($name, $args)
	{
		// Check for arguments, which invalidate the url.
		if (!empty($args))
			show_404();

		// Get the page, check if it exists.
		$page = $this->pages->getBySlug($name);
		if ($page == NULL)
			show_404();

		// Check if the template exists, otherwise use the default one.
		$template = $page->template;
		if (!file_exists(APPPATH . 'views/templates/' . $template . '.php'))
			$template = $this->templates->getDefault();
		
		$this->load->view('templates/' . $template, ['page' => $page]);
	}
}