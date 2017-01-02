<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model', 'categories');
		$this->load->model('pages_model', 'pages');
	}

	public function _remap($name, $args)
	{
		// Check for arguments, which invalidate the url.
		if (!file_exists(APPPATH . 'views/category.php') || !empty($args))
			show_404();

		// Get the category.
		$cat = $this->categories->getByName($name);
		if ($cat == NULL)
			show_404();
		
		$this->load->view('pages', ['pages' => $this->pages->inCategory($cat->id)]);
	}
}