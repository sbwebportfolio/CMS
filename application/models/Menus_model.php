<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_model extends CI_Model
{
	public function all()
	{
		$names = $this->config->item('menus');
		$result = [];

		// Add each menu name to the results, otherwise empty menus don't show up.
		foreach ($names as $name)
			$result[$name] = [];

		// Get all menu items per menu.
		$this->db->order_by('position', 'ASC');
		$items = $this->db->get('menus')->result();
		foreach ($items as $item)
			$result[$item->name][] = $item;

		return $result;
	}

	public function save($name, $items)
	{
		// First remove all menu items for this name.
		$this->db->where('name', $name);
		$this->db->delete('menus');

		// Insert all menu items.
		$data = ['name' => $name];
		for ($i = 0; $i < count($items); $i++)
		{
			$data['position'] = $i;
			$data['title'] = $items[$i]['title'];
			$data['url'] = $items[$i]['url'];
			$this->db->insert('menus', $data);
		}
	}
}