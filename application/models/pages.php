<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Model
{
    /**
     * Get all users.
     */
    public function all()
    {
        $this->db->select('id, title, created, updated');
        $query = $this->db->get('pages');
        return $query->result();
    }

    /**
     * Create a new page.
     */
    public function create($title, $content)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'created' => 'NOW()',
            'updated' => 'NOW()'
        ];

        $this->db->insert('pages', $data);
    }

    /**
    * Update an existing page.
    */
    public function update($id, $title, $content)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'updated' => 'NOW()'
        ];

        $this->db->where('id', $id);
        $this->db->update('pages', $data);
    }
}