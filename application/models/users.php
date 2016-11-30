<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model
{
    /**
     * Get all users.
     */
    public function all()
    {
        $this->db->select('email, first_name, last_name');
        $query = $this->db->get('users');
        return $query->result();
    }
}