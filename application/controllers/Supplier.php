<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Supplier extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('supplier_model');
  }

  public function index()
  {
    check_not_login();
    check_admin();
    $data['title'] = "QS - Supplier";
    $data['row'] = $this->supplier_model->get();
    $this->template->load('template', 'supplier/supplier_data', $data);
  }

  public function add()
  {
    $suppleir = new stdClass();
    $suppleir->supplier_id = null;
    $suppleir->name = null;
    $suppleir->phone = null;
    $suppleir->address = null;
    $suppleir->keterangan = null;
    $data['title'] = "QS - Add Supplier";
    $data = array(
      'page' => 'add',
      'row' => $suppleir
    );
    $this->template->load('template', 'supplier/supplier_form', $data);
  }

  public function  edit($id)
  {
    $query = $this->supplier_model->get($id);
    if ($query->num_rows() > 0) {
      $suppleir = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $suppleir
      );
      $this->template->load('template', 'supplier/supplier_form', $data);
    } else {
      echo "
      <script>
      alert('Data Tidak Ditemukan.');
      window.location='" . site_url('supplier') . "'
      </script>
      ";
    }
  }

  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($_POST['add'])) {
      $this->supplier_model->add($post);
    } else if (isset($_POST['edit'])) {
      $this->supplier_model->edit($post);
    }

    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Disimpan.');
      window.location='" . site_url('supplier') . "'
      </script>
      ";
    }
  }

  public function delete($id)
  {
    $this->supplier_model->delete($id);
    $error = $this->db->error();
    if ($error['code'] != 0) {
      echo "
      <script>
      alert('Data tidak dapat dihapus (sudah berelasi).');
      </script>
      ";
    } else {
      echo "
      <script>
      alert('Data Berhasil Dihapus.');
      </script>
      ";
    }
    // redirect('supplier');
    echo "
      <script>
      window.location='" . site_url('supplier') . "'
      </script>
      ";
  }
}


/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */