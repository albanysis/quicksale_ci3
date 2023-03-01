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
    $this->db->order_by('user_id', 'desc');
    if ($id != null) {
      $this->db->where('user_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'username' => $post['username'],
      'password' => sha1($post['password']),
      'name' => $post['name'],
      'address' => empty($post['address']) ? null : $post['address'],
      'level' => $post['level'],
    ];
    $this->db->insert('user', $params);
  }

  public function edit($post)
  {
    $params = [
      'username' => $post['username'],
      'password' => sha1($post['password']),
      'name' => $post['name'],
      'address' => empty($post['address']) ? null : $post['address'],
      'level' => $post['level'],
      'updated' => date('Y-m-d H:i:s')
    ];
    $this->db->where('user_id', $post['id']);
    $this->db->update('user', $params);
  }

  public function delete($id)
  {
    $this->db->where('user_id', $id);
    $this->db->delete('user');
  }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */