<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Supplier_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }


  public function get($id = null)
  {
    $this->db->from('supplier');
    if ($id != null) {
      $this->db->where('supplier_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'name' => $post['supplier_name'],
      'phone' => $post['phone'],
      'address' => $post['addr'],
      'keterangan' => empty($post['ket']) ? null : $post['ket'],
    ];
    $this->db->insert('supplier', $params);
  }

  public function edit($post)
  {
    $params = [
      'name' => $post['supplier_name'],
      'phone' => $post['phone'],
      'address' => $post['addr'],
      'keterangan' => empty($post['ket']) ? null : $post['ket'],
      'updated' => date('Y-m-d H:i:s')
    ];
    $this->db->where('supplier_id', $post['id']);
    $this->db->update('supplier', $params);
  }

  public function delete($id)
  {
    $this->db->where('supplier_id', $id);
    $this->db->delete('supplier');
  }
}

/* End of file Supplier_model.php */
/* Location: ./application/models/Supplier_model.php */