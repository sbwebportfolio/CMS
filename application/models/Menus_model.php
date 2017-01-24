<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_model extends CI_Model
{
	public function all()
	{
		$this->load->model('pages_model', 'pages');
		$names = $this->config->item('menus');
		$result = [];

		// Get all menu items per menu.
		$this->db->order_by('position', 'ASC');
		$items = $this->db->get('menus')->result();
		foreach ($items as $item)
			$result[$item->name][] = $this->pages->get($item->page_id);

		return $result;
	}
}