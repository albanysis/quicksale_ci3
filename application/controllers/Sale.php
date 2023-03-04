<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Sale extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['sale_model', 'item_model', 'custumer_model', 'cart_model']);
    $this->load->library('cart');
  }

  // public function index()
  // {
  //   // $this->load->model('custumer_model');
  //   // $item = $this->item_model->get()->result();
  //   // $customer = $this->custumer_model->get()->result();
  //   // $data = array(
  //   //   'item' => $item,
  //   //   'customer' => $customer,
  //   //   'invoice' => $this->sale_model->invoice_no(),
  //   // );
  //   $data['data'] = $this->sale_model->get_all_item();
  //   // $customer = $this->custumer_model->get()->result();
  //   // $data = array(
  //   //   'item' => $item,
  //   //   'customer' => $customer,
  //   // );
  //   $this->template->load('template', 'transaksi/sale/sale_proses', $data);
  // }

  public function index()
  {
    check_not_login();
    check_admin();
    $data['row'] = $this->item_model->get();
    $this->template->load('template', 'transaksi/sale/sale_view', $data);
  }

  public function add()
  {
    $redirect_page = $this->input->post('redirect_page');
    $data = array(
      'id'      => $this->input->post('id'),
      'qty'     => $this->input->post('qty'),
      'price'   => $this->input->post('price'),
      'name'    => $this->input->post('name'),
    );

    $this->cart->insert($data);
    redirect($redirect_page, 'refresh');
  }

  public function cart()
  {
    if (empty($this->cart->contents())) {
      redirect('sale');
    }
    $this->template->load('template', 'transaksi/sale/detail_cart');
  }

  public function delete($rowid)
  {
    $this->cart->remove($rowid);
    redirect('sale/cart');
  }

  public function update()
  {
    $i = 1;
    foreach ($this->cart->contents() as $item) {
      $data = array(
        'rowid' => $item['rowid'],
        'qty'   => $this->input->post($i . '[qty]'),
      );

      $this->cart->update($data);
      $i++;
    }
    redirect('sale/cart');
  }

  public function clear()
  {
    $this->cart->destroy($data);
    redirect('sale/cart');
  }
}


/* End of file Sale.php */
/* Location: ./application/controllers/Sale.php */