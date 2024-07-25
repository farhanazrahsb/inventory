<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function get($id = null) {
        $this->db->select('transaction.*, p_item.name as item_name');
        $this->db->from('transaction');
        $this->db->join('p_item', 'p_item.item_id = transaction.item_id');
        if ($id != null) {
            $this->db->where('transaction_id', $id);
        }
        $this->db->order_by('date', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params = [
            'date'          => $post['transaction_date'],
            'item_id'       => $post['item'],
            'item_total'    => $post['item_total'],
            'price_total'   => $post['price_total'],
        ];
        $this->db->insert('transaction', $params);
    }

    public function edit($post) {
        $params = [
            'date'          => $post['transaction_date'],
            'item_id'       => $post['item'],
            'item_total'    => $post['item_total'],
            'price_total'   => $post['price_total'],
            'updated'       => date('Y-m-d H:i:s')
        ];
        $this->db->where('transaction_id', $post['transaction_id']);
        $this->db->update('transaction', $params);
    }

    public function delete($id) {
        $this->db->where('transaction_id', $id);
        $this->db->delete('transaction');
    }
}
