<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_m extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function get($id = null) {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post) {
        $params = [
            'name'          => $post['unit_name'],
        ];
        $this->db->insert('p_unit', $params);
    }

    public function edit($post) {
        $params = [
            'name'          => $post['unit_name'],
            'updated'       => date('Y-m-d H:i:s')
        ];
        $this->db->where('unit_id', $post['unit_id']);
        $this->db->update('p_unit', $params);
    }

    public function delete($id) {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}
