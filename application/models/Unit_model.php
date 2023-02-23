<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Unit_model extends CI_Model
{
  public function get($id = null)
  {
    $this->db->from('unit');
    if ($id != null) {
      $this->db->where('unit_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'name' => $post['unit_name']
    ];
    $this->db->insert('unit', $params);
  }

  public function edit($post)
  {
    $params = [
      'name' => $post['unit_name'],
    ];
    $this->db->where('unit_id', $post['id']);
    $this->db->update('unit', $params);
  }

  public function delete($id)
  {
    $this->db->where('unit_id', $id);
    $this->db->delete('unit');
  }
}
