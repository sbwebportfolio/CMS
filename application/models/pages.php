<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Model
{
    /**
     * Get all users.
     */
    public function all()
    {
        return $this->db->get('pages')->result();
    }

    /**
     * Get a page by its id.
     */
    public function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('pages');
        return $query->row();
    }

    /**
     * Remove a page.
     */
    public function remove($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pages');
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
}