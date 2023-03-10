<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model(['item_model', 'supplier_model', 'stock_model']);
  }

  public function index()
  {

    check_admin();
    $data['row'] = $this->item_model->get();
    $this->template->load('template', 'item/item_data', $data);
  }

  public function stock_in_data()
  {
    $data['row'] = $this->stock_model->get_stock_in()->result();
    $this->template->load('template', 'transaksi/stock_in/stock_in_data', $data);
  }

  public function stock_in_add()
  {
    $item = $this->item_model->get()->result();
    $supplier = $this->supplier_model->get()->result();
    $data = ['item' => $item, 'supplier' => $supplier];
    $this->template->load('template', 'transaksi/stock_in/stock_in_form', $data);
  }

  public function stock_in_del()
  {
    $stock_id = $this->uri->segment(4);
    $item_id = $this->uri->segment(5);
    $qty = $this->stock_model->get($stock_id)->row()->qty;
    $data = [
      'qty' => $qty,
      'item_id' => $item_id
    ];
    $this->item_model->update_stock_out($data);
    $this->stock_model->del($stock_id);
    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Stock Berhasil Dihapus.');
      window.location='" . site_url('stock/in') . "'
      </script>
      ";
    }
  }

  public function stock_out_data()
  {
    $data['row'] = $this->stock_model->get_stock_out()->result();
    $this->template->load('template', 'transaksi/stock_out/stock_out_data', $data);
  }

  public function stock_out_add()
  {
    $item = $this->item_model->get()->result();
    $supplier = $this->supplier_model->get()->result();
    $data = ['item' => $item, 'supplier' => $supplier];
    $this->template->load('template', 'transaksi/stock_out/stock_out_form', $data);
  }

  public function stock_out_del()
  {
    $stock_id = $this->uri->segment(4);
    $item_id = $this->uri->segment(5);
    $qty = $this->stock_model->get($stock_id)->row()->qty;
    $data = [
      'qty' => $qty,
      'item_id' => $item_id
    ];
    $this->item_model->update_stock_in($data);
    $this->stock_model->del($stock_id);
    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Stock Berhasil Dihapus.');
      window.location='" . site_url('stock/out') . "'
      </script>
      ";
    }
  }

  public function proses()
  {
    if (isset($_POST['in_add'])) {
      $post = $this->input->post(null, true);
      $this->stock_model->add_stock_in($post);
      $this->item_model->update_stock_in($post);

      if ($this->db->affected_rows() > 0) {
        echo "
        <script>
        alert('Data Stock Berhasil Disimpan.');
        window.location='" . site_url('stock/in') . "'
        </script>
        ";
      }
    }
    if (isset($_POST['out_add'])) {
      $post = $this->input->post(null, true);
      $this->stock_model->add_stock_out($post);
      $this->item_model->update_stock_out($post);

      if ($this->db->affected_rows() > 0) {
        echo "
        <script>
        alert('Data Stock Berhasil Disimpan.');
        window.location='" . site_url('stock/out') . "'
        </script>
        ";
      }
    }
  }
}


/* End of file Stock.php */
/* Location: ./application/controllers/Stock.php */