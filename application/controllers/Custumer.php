<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Custumer extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('custumer_model');
  }

  public function index()
  {
    check_not_login();
    check_admin();
    $data['row'] = $this->custumer_model->get();
    $this->template->load('template', 'custumer/custumer_data', $data);
  }

  public function add()
  {
    $custumer = new stdClass();
    $custumer->custumer_id = null;
    $custumer->name = null;
    $custumer->phone = null;
    $custumer->class = null;
    $custumer->address = null;
    $data = array(
      'page' => 'add',
      'row' => $custumer
    );
    $this->template->load('template', 'custumer/custumer_form', $data);
  }

  public function  edit($id)
  {
    $query = $this->custumer_model->get($id);
    if ($query->num_rows() > 0) {
      $custumer = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $custumer
      );
      $this->template->load('template', 'custumer/custumer_form', $data);
    } else {
      echo "
      <script>
      alert('Data Tidak Ditemukan.');
      window.location='" . site_url('custumer') . "'
      </script>
      ";
    }
  }

  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($_POST['add'])) {
      $this->custumer_model->add($post);
    } else if (isset($_POST['edit'])) {
      $this->custumer_model->edit($post);
    }

    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Disimpan.');
      window.location='" . site_url('custumer') . "'
      </script>
      ";
    }
  }

  public function delete($id)
  {
    $this->custumer_model->delete($id);
    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Dihapus.');
      </script>
      ";
    }
    redirect('custumer');
  }
}


/* End of file Custumer.php */
/* Location: ./application/controllers/Custumer.php */