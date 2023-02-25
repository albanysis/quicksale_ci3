<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Sale extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    check_not_login();
    $this->template->load('template', 'transaksi/sale/sale_form');
  }
}


/* End of file Sale.php */
/* Location: ./application/controllers/Sale.php */