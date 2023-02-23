<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Category extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('category_model');
  }

  public function index()
  {
    check_not_login();
    check_admin();
    $data['row'] = $this->category_model->get();
    $this->template->load('template', 'category/category_data', $data);
  }

  public function add()
  {
    $category = new stdClass();
    $category->category_id = null;
    $category->name = null;
    $data = array(
      'page' => 'add',
      'row' => $category
    );
    $this->template->load('template', 'category/category_form', $data);
  }

  public function  edit($id)
  {
    $query = $this->category_model->get($id);
    if ($query->num_rows() > 0) {
      $category = $query->row();
      $data = array(
        'page' => 'edit',
        'row' => $category
      );
      $this->template->load('template', 'category/category_form', $data);
    } else {
      echo "
      <script>
      alert('Data Tidak Ditemukan.');
      window.location='" . site_url('category') . "'
      </script>
      ";
    }
  }

  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($_POST['add'])) {
      $this->category_model->add($post);
    } else if (isset($_POST['edit'])) {
      $this->category_model->edit($post);
    }

    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Disimpan.');
      window.location='" . site_url('category') . "'
      </script>
      ";
    }
  }

  public function delete($id)
  {
    $this->category_model->delete($id);
    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Dihapus.');
      </script>
      ";
    }
    redirect('category');
  }
}


/* End of file Category.php */
/* Location: ./application/controllers/Category.php */