<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function getProfilUser($id)
    {
        $data = $this->db->get_where('user', ['id' => $id])->row_array();
        return $data;
    }

    public function createUser($data){
        $this->db->insert('user', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }

    public function getDataUser($table,$email)
    {
        $data = $this->db->get_where($table, ['email' => $email])->row_array();
        return $data;
    }

    function ubahUser($id,$data){
        $this->db->where('id',$id);
        $this->db->update('user', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }

    function tambahKucing($data){
        $this->db->insert('kucing', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }


    function ubahKucing($data,$id){
        $this->db->where('id',$id);
        $this->db->update('kucing', $data);
        if ($this->db->affected_rows()>0) {
            return true;
        }else{
            return false;
        }
    }

    function countUser(){
        $this->db->select('id'); 
        $this->db->from('user');
        $user = $this->db->get()->num_rows();
        return $user;
    }

    public function getUserTerbaru(){
        $this->db->select('*'); 
        $this->db->from('user');
        $this->db->order_by('id','desc');
        $this->db->limit('5','0');
        $user = $this->db->get();
        $data = $user->result_array();
        return $data;
    }


}
