<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{

  public function get_data()
  {
    return $this->db->get('supplier');
  }
}
