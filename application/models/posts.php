<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Model
{
    /**
     * Get all posts.
     */
    public function all()
    {
        return $this->db->get('posts')->result();
    }

    /**
     * Get a post by its id.
     */
    public function get($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('posts');
        return $query->row();
    }

    /**
     * Remove a post.
     */
    public function remove($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('posts');

        $this->db->where('post_id', $id);
        $this->db->delete('categories');
    }

    /**
     * Create a new post.
     */
    public function create($title, $content)
    {
        $data = [
            'title' => $title,
            'content' => $content
        ];

        $this->db->set('created', 'NOW()', FALSE);
        $this->db->set('updated', 'NOW()', FALSE);

        $this->db->insert('posts', $data);
    }

    /**
    * Update an existing post.
    */
    public function update($id, $title, $content)
    {
        $data = [
            'title' => $title,
            'content' => $content
        ];

        $this->db->set('updated', 'NOW()', FALSE);

        $this->db->where('id', $id);
        return $this->db->update('posts', $data);
    }
}