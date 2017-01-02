<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model', 'categories');
	}

	public function _remap($name, $args)
	{
		// Check for a name or arguments, which invalidate the url.
		if (!file_exists(APPPATH . 'views/categories.php') || $name !== 'index' || !empty($args))
			show_404();
		
		$this->load->view('categories', ['categories' => $this->categories->all()]);
	}
}