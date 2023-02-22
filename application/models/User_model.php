<?php
defined('BASEPATH') or exit('No direct script access allowed');


class User_model extends CI_Model
{




  public function login($post)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('username', $post['username']);
    $this->db->where('password', sha1($post['password']));
    $query = $this->db->get();
    return $query;
  }

  public function get($id = null)
  {
    $this->db->from('user');
    if ($id != null) {
      $this->db->where('user_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function insert($data)
  {
    $save = $this->db->insert('user', $data);
    if ($save) {
      return 1;
    } else {
      return 0;
    }
  }

  public function delete($id)
  {
    $this->db->where('user_id', $id);
    $this->db->delete('user');
  }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */