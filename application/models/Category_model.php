<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Category_model extends CI_Model
{

  public function get($id = null)
  {
    $this->db->from('category');
    if ($id != null) {
      $this->db->where('category_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'name' => $post['category_name']
    ];
    $this->db->insert('category', $params);
  }

  public function edit($post)
  {
    $params = [
      'name' => $post['category_name'],
    ];
    $this->db->where('category_id', $post['id']);
    $this->db->update('category', $params);
  }

  public function delete($id)
  {
    $this->db->where('category_id', $id);
    $this->db->delete('category');
  }
}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */