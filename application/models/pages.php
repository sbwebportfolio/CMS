<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Model
{
	/**
	 * Get all pages.
	 */
	public function all()
	{
		$pages = $this->db->get('pages')->result();
		foreach ($pages as $page)
			$this->setCategories($page);
		return $pages;
	}

	/**
	 * Get a page by its id.
	 */
	public function get($id)
	{
		return $this->getByProperty('id', $id);
	}
	
	/**
	 * Get a page by its slug.
	 */
	public function getBySlug($slug)
	{
		return $this->getByProperty('slug', $slug);
	}

	/**
	 * Get a page by a certain property.
	 */
	private function getByProperty($name, $value)
	{
		$this->load->model('categories');
		$this->db->where($name, $value);
		$page = $this->db->get('pages')->row();
		if ($page != NULL)
			$this->setCategories($page);
		return $page;
	}

	/**
	 * Remove a page.
	 */
	public function remove($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('pages');

		$this->db->where('page_id', $id);
		$this->db->delete('categories');
	}

	/**
	 * Update or insert a page.
	 * If the id is -1 then a new page will be created, otherwise the page with the given id will be updated.
	 */
	public function upsert($id, $title, $content, $slug, $hidden)
	{
		$data = [
			'title' => $title,
			'content' => $content,
			'slug' => $slug,
			'hidden' => $hidden
		];
		$this->db->set('updated', 'NOW()', FALSE);

		// Check if the page should be created or updated.
		if ($id == -1)
		{
			$this->db->set('created', 'NOW()', FALSE);
			return $this->db->insert('pages', $data);	
		}
		else
		{
			$this->db->where('id', $id);
			return $this->db->update('pages', $data);
		}

	}

	/**
	 * Get a new (empty) page.
	 */
	public function newPage()
	{
		$now = $this->sqlNow();

		return (object)[
			'id' => -1,
			'title' => 'New page',
			'content' => '',
			'categories' => [],
			'created' => $now,
			'updated' => $now,
			'slug' => '',
			'hidden' => 0
		];
	}

	/**
	 * Set the categories for a page.
	 */
	private function setCategories($page)
	{
		// Get all category names for a page.
		$this->db->select('category_names.name');
		$this->db->from('categories');
		$this->db->join('category_names', 'categories.category_id = category_names.id', 'INNER');
		$this->db->where('page_id', $page->id);
		$rows = $this->db->get()->result();

		// Put all category names in an array in the page.
		$page->categories = [];
		foreach ($rows as $row)
			$page->categories[] = $row->name;
	}

	/**
	 * Get the current date and time from the database.
	 */
	private function sqlNow()
	{
		$this->db->select('NOW()');
		return $this->db->get()->row_array()['NOW()'];
	}
}