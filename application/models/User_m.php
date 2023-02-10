<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($username, $password)
    {
        // $this->db->select('*');
        // $this->db->from('user');
        // $this->db->where('username', $post['username']);
        // $this->db->where('password', sha1($post['password']));
        // $query = $this->db->get();
        // return $query;

        $this->db->where('username', $username);
        $this->db->where('password', sha1($password));
        $query = $this->db->get('user');
        if ($query->num_rows()) {
            return $query->row();
        }

        return false;
    }
}
