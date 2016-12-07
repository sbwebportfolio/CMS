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
        $this->load->model('categories');
        $this->db->where('id', $id);
        $page = $this->db->get('pages')->row();
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
     * Create a new page.
     */
    public function create($title, $content)
    {
        $data = [
            'title' => $title,
            'content' => $content
        ];

        $this->db->set('created', 'NOW()', FALSE);
        $this->db->set('updated', 'NOW()', FALSE);

        $this->db->insert('pages', $data);
    }

    /**
    * Update an existing page.
    */
    public function update($id, $title, $content)
    {
        $data = [
            'title' => $title,
            'content' => $content
        ];

        $this->db->set('updated', 'NOW()', FALSE);

        $this->db->where('id', $id);
        return $this->db->update('pages', $data);
    }

    /**
     * Get a new (empty) page.
     */
    public function newPage()
    {
        return (object)['id' => -1, 'title' => 'New page', 'content' => '', 'categories' => []];
    }

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
}