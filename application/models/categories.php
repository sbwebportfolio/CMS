<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Model
{
    /**
     * Get all category names.
     */
    public function all()
    {
        return $this->db->get('category_names')->result();
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
}