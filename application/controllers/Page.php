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
		// Get the page, either by id or by slug.
		if ($name === 'id' && count($args) === 1)
		{
			$page = $this->pages->get($args[0]);
			if ($page == NULL)
				show_404();

			redirect('/Page/' . $page->slug);
		}
		else if (empty($args))
			$page = $this->pages->getBySlug($name);
		else
			show_404();
		
		if ($page == NULL)
			show_404();

		// Check if the template exists, otherwise use the default one.
		$template = $page->template;
		if (!file_exists(APPPATH . 'views/templates/' . $template . '.php'))
			$template = $this->templates->getDefault();
		
		$this->load->view('templates/' . $template, ['page' => $page]);
	}
}