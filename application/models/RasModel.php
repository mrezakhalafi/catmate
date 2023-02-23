<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RasModel extends CI_Model
{
    public function getRas()
    {
        $this->db->select('*'); 
        $this->db->from('ras');
        $this->db->order_by('nama','asc');
        $ras = $this->db->get();
        $data = $ras->result_array();
        return $data;
    }

    public function getRasLimit()
    {
        $this->db->select('*'); 
        $this->db->from('ras');
        $this->db->order_by('nama','asc');
        $this->db->limit('3','0');
        $ras = $this->db->get();
        $data = $ras->result_array();
        return $data;
    }

    function countRas(){
        $this->db->select('id'); 
        $this->db->from('ras');
        $user = $this->db->get()->num_rows();
        return $user;
    }

    public function getRasAdmin()
    {
        $this->db->select('*'); 
        $this->db->from('ras');
        $this->db->order_by('nama','asc');
        $ras = $this->db->get();
        $data = $ras->result_array();
        return $data;
    }

    function tambahRas($data){
        $this->db->insert('ras', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }

    function ubahRas($data){
        $this->db->set('nama', $data['nama']);
        $this->db->where('id', $data['id']);
        $this->db->update('ras');
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }
}
