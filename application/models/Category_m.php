<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function get($id = null) {
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('category_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params = [
            'name'          => $post['category_name'],
        ];
        $this->db->insert('p_category', $params);
    }

    public function edit($post) {
        $params = [
            'name'          => $post['category_name'],
            'updated'       => date('Y-m-d H:i:s')
        ];
        $this->db->where('category_id', $post['category_id']);
        $this->db->update('p_category', $params);
    }

    public function delete($id) {
        $this->db->where('category_id', $id);
        $this->db->delete('p_category');
    }
}
