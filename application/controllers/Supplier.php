<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function index()
    {
        echo 'ini view supplier';
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama', 'required');
        $this->form_validation->set_rules('alamat_supplier', 'Alamat', 'required');
        $this->form_validation->set_rules('nomer_tlp', 'Nomer tlp', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed!</div>');
            redirect('admin/supplier');
        } else {
            $data = [
                'nama_supplier' => $_POST['nama_supplier'],
                'alamat_supplier' => $_POST['alamat_supplier'],
                'nomer_tlp' => $_POST['nomer_tlp'],
            ];
            $this->db->insert('supplier', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Success Add New Supplier.</div>');
            redirect('admin/supplier');
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            // $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
            redirect('admin/supplier');
        } else {
            $this->db->where('id_supplier', $id);
            $this->db->delete('supplier');
            $this->session->set_flashdata('message', '<div class="alert alert-success">Success Delete Supplier.</div>');
            redirect('admin/supplier');
        }
    }
}
