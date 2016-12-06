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
        $data = [
            'name' => $name
        ];

        $this->db->insert('category_names', $data);
    }

    /**
     * Get all categories for a specific post.
     */
    public function forPost($postId)
    {
        $this->db->select('category_names.name');
        $this->db->from('categories');
        $this->db->join('category_names', 'categories.category_id = category_names.id', 'INNER');
        $this->db->where('post_id', $postId);
        $rows = $this->db->get()->result();

        // Put all category names in an array.
        $result = [];
        foreach ($rows as $row)
            $result[] = $row->name;
        return $result;
    }
}