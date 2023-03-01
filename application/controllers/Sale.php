<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Sale extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('sale_model');
  }

  public function index()
  {
    $this->load->model('custumer_model');
    $customer = $this->custumer_model->get()->result();
    $data = array(
      'customer' => $customer,
      'invoice' => $this->sale_model->invoice_no(),
    );
    $this->template->load('template', 'transaksi/sale/sale_form', $data);
  }
}


/* End of file Sale.php */
/* Location: ./application/controllers/Sale.php */