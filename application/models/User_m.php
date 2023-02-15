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
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        if ($query->num_rows()) {
            return $query->row();
        }

        return false;
    }

    // public function login($user, $pass)
    // {
    //     $this->db->where('username', $user);
    //     $this->db->where('password', $pass);
    //     $data = $this->db->get('user');
    //     if ($data->num_rows() > 0) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }

    // public function logout($date, $id)
    // {
    //     $this->db->where($this->user_id, $id);
    //     $this->db->update($this->last_login, $date);
    // }
}
