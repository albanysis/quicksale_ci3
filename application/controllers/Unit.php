<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Unit extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('unit_model');
  }

  public function index()
  {
    check_not_login();
    check_admin();
    $data['row'] = $this->unit_model->get();
    $this->template->load('template', 'unit/unit_data', $data);
  }

  public function add()
  {
    $unit = new stdClass();
    $unit->unit_id = null;
    $unit->name = null;
    $data = array(
      'page' => 'add',
      'row' => $unit
    );
    $this->template->load('template', 'unit/unit_form', $data);
  }

  public function  edit($id)
  {
    $query = $this->unit_model->get($id);
    if ($query->num_rows() > 0) {
      $unit = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $unit
      );
      $this->template->load('template', 'unit/unit_form', $data);
    } else {
      echo "
      <script>
      alert('Data Tidak Ditemukan.');
      window.location='" . site_url('unit') . "'
      </script>
      ";
    }
  }

  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($_POST['add'])) {
      $this->unit_model->add($post);
    } else if (isset($_POST['edit'])) {
      $this->unit_model->edit($post);
    }

    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Disimpan.');
      window.location='" . site_url('unit') . "'
      </script>
      ";
    }
  }

  public function delete($id)
  {
    $this->unit_model->delete($id);
    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Dihapus.');
      </script>
      ";
    }
    redirect('unit');
  }
}


/* End of file Unit.php */
/* Location: ./application/controllers/Unit.php */