<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->template->load('template', 'transaksi/transaksi_data');
  }
}


/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */