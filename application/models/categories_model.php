<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model
{
	/**
	 * Get all category names.
	 */
	public function all()
	{
		return $this->db->get('category_names')->result();
	}

	/**
	 * Get a category by its name.
	 */
	public function getByName($name)
	{
		$this->db->where('name', $name);
		return $this->db->get('category_names')->row();
	}

	/**
	 * Remove a category.
	 */
	public function remove($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('category_names');

		$this->db->where('category_id', $id);
		$this->db->delete('categories');
	}

	/**
	 * Create a new category.
	 */
	public function create($name)
	{
		$this->db->insert('category_names', ['name' => $name]);
	}

	/**
	 * Set the categories for a page.
	 */
	public function set($pageId, $catIds)
	{
		// Clear the page from the categories list.
		$this->db->where('page_id', $pageId);
		$this->db->delete('categories');

		// Insert the new categories.
		foreach ($catIds as $category)
		{
			$data = [
				'page_id' => $pageId,
				'category_id' => $category
			];
			$this->db->insert('categories', $data);
		}
	}
}