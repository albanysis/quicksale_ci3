<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{

  public function rules()
  {
    return [
      [
        'field' => 'nama_supplier',
        'label' => 'Name',
        'rules' => 'required',
      ],
      [
        'field' => 'alamat_supplier',
        'label' => 'Alamat',
        'rules' => 'required',
      ],
      [
        'field' => 'nomer_tlp',
        'label' => 'Nomer Telpon',
        'rules' => 'required',
      ]
    ];
  }

  public function get_data()
  {
    return $this->db->get('supplier');
  }

  // public function save()
  // {
  //   $post = $this->input->post();
  //   $this->nama_supplier = $post["nama_supplier"];
  //   $this->alamat_supplier = $post["alamat_supplier"];
  //   $this->nomer_tlp = $post["nomer_tlp"];
  //   return $this->db->insert($this->_table, $this);
  // }

  public function insert($data)
  {
    $save = $this->db->insert('supplier', $data);
    if ($save) {
      return 1;
    } else {
      return 0;
    }
  }

  // public function update($data)
  // {
  //   $getId = $this->db->where('id_supplier');
  //   $save = $this->db->update('supplier', $data);
  //   if ($save) {
  //     return 1;
  //   } else {
  //     return 0;
  //   }
  // }

  public function update()
  {
    $data = array(
      "nama_supplier" => $this->input->post('nama_supplier'),
      "alamat_supplier" => $this->input->post('alamat_supplier'),
      "nomer_tlp" => $this->input->post('nomer_tlp')
    );
    return $this->db->update($this->table, $data, array('id_supplier' => $this->input->post('id_supplier')));
  }

  public function delete($id)
  {
    $this->db->where('id_supplier', $id);
    $this->db->delete('supplier');
    // return $this->db->delete($this->_table, array("siswa_id" => $id));
  }
}
