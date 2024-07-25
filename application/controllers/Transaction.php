<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller {

    function __construct() {
        parent::__construct();
        check_not_login();
        $this->load->model(['transaction_m', 'item_m']);
    }

    public function index() {
        $data['row'] = $this->transaction_m->get();
        $this->template->load('template', 'transaction/transaction_data', $data);
    }

    public function add() {
        $transaction = new stdClass();
        $transaction->transaction_id = null;
        $transaction->date = null;
        $transaction->item_id = null;
        $transaction->item_total = null;
        $transaction->price_total = null;
        $query_item = $this->item_m->get();
        $data = array(
            'page' => 'tambah',
            'row' => $transaction,
            'item' => $query_item,
        );
        $this->template->load('template', 'transaction/transaction_form', $data);
    }

    public function edit($id) {
        $query = $this->transaction_m->get($id);
        if ($query->num_rows() > 0) {
            $transaction = $query->row();
            $query_item = $this->item_m->get();
            $data = array(
                'page' => 'edit',
                'row' => $transaction,
                'item' => $query_item,
            );
            $this->template->load('template', 'transaction/transaction_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');</script>";
            echo "<script>window.location='" . site_url('transaction') . "';</script>";
        }
    }

    public function process() {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            $this->transaction_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->transaction_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        }
        redirect('transaction');
    }

    public function delete($id) {
        $this->transaction_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('transaction');
    }
}
