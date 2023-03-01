<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Custumer_model extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }



  public function get($id = null)
  {
    $this->db->from('custumer');
    $this->db->order_by('custumer_id', 'desc');
    if ($id != null) {
      $this->db->where('custumer_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'name' => $post['custumer_name'],
      'phone' => $post['phone'],
      'class' => $post['class'],
      'address' => empty($post['addr']) ? null : $post['addr'],
    ];
    $this->db->insert('custumer', $params);
  }

  public function edit($post)
  {
    $params = [
      'name' => $post['custumer_name'],
      'phone' => $post['phone'],
      'class' => $post['class'],
      'address' => empty($post['addr']) ? null : $post['addr'],
      'updated' => date('Y-m-d H:i:s')
    ];
    $this->db->where('custumer_id', $post['id']);
    $this->db->update('custumer', $params);
  }

  public function delete($id)
  {
    $this->db->where('custumer_id', $id);
    $this->db->delete('custumer');
  }
}

/* End of file Custumer_model.php */
/* Location: ./application/models/Custumer_model.php */