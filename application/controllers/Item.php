<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Item extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(['item_model', 'category_model', 'unit_model']);
  }

  public function index()
  {
    check_not_login();
    check_admin();
    $data['row'] = $this->item_model->get();
    $this->template->load('template', 'item/item_data', $data);
  }

  public function add()
  {
    $item = new stdClass();
    $item->item_id = null;
    $item->barcode = null;
    $item->name = null;
    $item->price = null;

    // Mengambil data secara manual
    // Untuk membuat dropdown diview sesuai DB
    $query_category = $this->category_model->get();
    $category[null] = '- Pilih -';
    foreach ($query_category->result() as $caty) {
      $category[$caty->category_id] = $caty->name;
    }

    // Mengambil data dengan library form CI3
    $query_unit = $this->unit_model->get();
    $unit[null] = '- Pilih -';
    foreach ($query_unit->result() as $unt) {
      $unit[$unt->unit_id] = $unt->name;
    }

    $data = array(
      'page' => 'add',
      'row' => $item,
      'category' => $category, 'selectedcategory' => null,
      'unit' => $unit, 'selectedunit' => null
    );
    $this->template->load('template', 'item/item_form', $data);
  }

  public function  edit($id)
  {
    $query = $this->item_model->get($id);
    if ($query->num_rows() > 0) {
      $item = $query->row();

      // Mengambil data secara manual
      // Untuk membuat dropdown diview sesuai DB
      $query_category = $this->category_model->get();
      $category[null] = '- Pilih -';
      foreach ($query_category->result() as $caty) {
        $category[$caty->category_id] = $caty->name;
      }

      // Mengambil data dengan library form CI3
      $query_unit = $this->unit_model->get();
      $unit[null] = '- Pilih -';
      foreach ($query_unit->result() as $unt) {
        $unit[$unt->unit_id] = $unt->name;
      }

      $data = array(
        'page' => 'edit',
        'row' => $item,
        'category' => $category, 'selectedcategory' => $item->category_id,
        'unit' => $unit, 'selectedunit' => $item->unit_id
      );
      $this->template->load('template', 'item/item_form', $data);
    } else {
      echo "
      <script>
      alert('Data Tidak Ditemukan.');
      window.location='" . site_url('item') . "'
      </script>
      ";
    }
  }

  public function proses()
  {
    $post = $this->input->post(null, true);
    if (isset($_POST['add'])) {
      if ($this->item_model->check_barcode($post['barcode'])->num_rows() > 0) {
        echo "
      <script>
      alert('Barcode " . $post['barcode'] . " sudah dipakai barang lain.');
      window.location='" . site_url('item/add') . "'
      </script>
      ";
      } else {
        $this->item_model->add($post);
      }
    } else if (isset($_POST['edit'])) {
      if ($this->item_model->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
        echo "
      <script>
      alert('Barcode " . $post['barcode'] . " sudah dipakai barang lain.');
      window.location='" . site_url('item/edit/' . $post['id']) . "'
      </script>
      ";
      } else {
        $this->item_model->edit($post);
      }
    }

    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Disimpan.');
      window.location='" . site_url('item') . "'
      </script>
      ";
    }
  }

  public function delete($id)
  {
    $this->item_model->delete($id);
    if ($this->db->affected_rows() > 0) {
      echo "
      <script>
      alert('Data Berhasil Dihapus.');
      </script>
      ";
    }
    redirect('item');
  }

  function barcode($id)
  {
    $data['row'] = $this->item_model->get($id)->row();
    $this->template->load('template', 'item/barcode', $data);
  }

  function barcode_print($id)
  {
    $data['row'] = $this->item_model->get($id)->row();
    $html = $this->load->view('item/barcode_print', $data, true);
    $this->fungsi->PdfGenerator($html, 'Qrbarcode-' . $data['row']->barcode);
  }
}


/* End of file Item.php */
/* Location: ./application/controllers/Item.php */