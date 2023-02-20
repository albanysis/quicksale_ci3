<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('supplier_model');
    }

    public function index()
    {
        $this->load->view('supplier/testadd');
    }

    public function add()
    {
        $namasupplier = $this->input->post('nama_supplier');
        $alamatsupplier = $this->input->post('alamat_supplier');
        $nomer = $this->input->post('nomer_tlp');

        $data = [
            'nama_supplier' => $namasupplier,
            'alamat_supplier' => $alamatsupplier,
            'nomer_tlp' => $nomer
        ];

        $save = $this->supplier_model->insert($data);
        if ($save == 1) {
            redirect('admin/supplier');
        } else {
            echo 'Gagal';
        }
    }

    public function edit()
    {
        $supplier = $this->supplier_model;
        $validation = $this->form_validation;
        $validation->set_rules($supplier->rules());
        if ($validation->run()) {
            $supplier->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Success Update Supplier.</div>');
            redirect("admin/supplier");
        }
    }

    // public function hapus($id)
    // {
    //     if ($id == "") {
    //         // $this->session->set_flashdata('error', "Data Anda Gagal Di Hapus");
    //         redirect('admin/supplier');
    //     } else {
    //         $this->db->where('id_supplier', $id);
    //         $this->db->delete('supplier');
    //         // $this->session->set_flashdata('message', '<div class="alert alert-success">Success Delete Supplier.</div>');
    //         // redirect('admin/supplier');
    //     }
    // }
    public function delete()
    {
        $data   = file_get_contents("php://input");
        $params = json_decode($data, true);

        if ($params['id_supplier']) {
            $this->supplier_model->delete($params['id_supplier']);

            $return = array(
                'status' => true,
                'message' => 'Data User ' . $params['nama_supplier'] . ' berhasil di hapus.'
            );
        } else {
            $return = array(
                'status' => false,
                'message' => 'Maaf, Data user ' . $params['nama_supplier'] . ' tidak ditemukan!!!'
            );
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($return));
    }
}
