<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'category_m', 'unit_m']);
    }

    public function index() {
        $data['row'] = $this->item_m->get();
        $this->template->load('template', 'product/item/item_data', $data);
    }

    public function add() {
        $item = new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->name = null;
        $item->price = null;
        $item->stock = null;
        $item->category_id = null;
        $item->unit_id = null;
        $query_category = $this->category_m->get();
        $query_unit = $this->unit_m->get();
        $data = array(
            'page' => 'tambah',
            'row' => $item,
            'category' => $query_category,
            'unit' => $query_unit,
        );
        $this->template->load('template', 'product/item/item_form', $data);
    }

    public function edit($id) {
        $query = $this->item_m->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->category_m->get();
            $query_unit = $this->unit_m->get();
            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $query_category,
                'unit' => $query_unit,
            );
            $this->template->load('template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='" . site_url('item') . "';</script>";
        }
    }

    public function process() {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            if ($this->item_m->check_barcode($post['item_barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[item_barcode] sudah dipakai barang lain");
                redirect('item/add');
            } else {
                $this->item_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('item');
            }
        } else if (isset($_POST['edit'])) {
            if ($this->item_m->check_barcode($post['item_barcode'], $post['item_id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[item_barcode] sudah dipakai barang lain");
                redirect('item/edit/' . $post['item_id']);
            } else {
                $this->item_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('item');
            }
        }
    }

    public function delete($id) {
        $this->item_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('item');
    }
}
