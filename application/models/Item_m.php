<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function get($id = null) {
        $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
        $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
        if ($id != null) {
            $this->db->where('item_id', $id);
        }
        $this->db->order_by('barcode', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params = [
            'barcode'       => $post['item_barcode'],
            'name'          => $post['item_name'],
            'category_id'   => $post['category'],
            'unit_id'       => $post['unit'],
            'price'         => $post['item_price'],
            'stock'         => $post['stock'],
        ];
        $this->db->insert('p_item', $params);
    }

    public function edit($post) {
        $params = [
            'barcode'       => $post['item_barcode'],
            'name'          => $post['item_name'],
            'category_id'   => $post['category'],
            'unit_id'       => $post['unit'],
            'price'         => $post['item_price'],
            'stock'         => $post['stock'],
            'updated'       => date('Y-m-d H:i:s')
        ];
        $this->db->where('item_id', $post['item_id']);
        $this->db->update('p_item', $params);
    }

    function check_barcode($code, $id = null) {
        $this->db->from('p_item');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function delete($id) {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }
}
