<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function get($id = null)
  {
    $this->db->from('cart');
    $this->db->order_by('cart_id', 'desc');
    if ($id != null) {
      $this->db->where('cart_id', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  // ------------------------------------------------------------------------

}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */