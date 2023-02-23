<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KucingModel extends CI_Model
{
    public function getMyCats($id)
    {
        $this->db->select('*'); 
        $this->db->from('kucing a');
        $this->db->where('a.user_id', $id);
        $kucing = $this->db->get();
        $data = $kucing->result_array();
        return $data;
    }


    public function countCats($id){
        $query = $this->db->query('SELECT * FROM kucing JOIN user ON kucing.user_id = user.id WHERE user.id = '.$id.'');
        return $query->num_rows();
    }

    public function getRas($id)
    {
        $query = $this->db->query('SELECT ras.id, ras.nama, ras_id, COUNT( * ) as total FROM kucing
            JOIN ras ON ras.id = kucing.ras_id JOIN user ON user.id = kucing.user_id WHERE user.id = '.$id.'
                     GROUP BY ras_id
            ');
        return $query->result_array();
    }

    public function getAllCats(){
        $this->db->select('*'); 
        $this->db->from('kucing ');
        $kucing = $this->db->get();
        $data = $kucing->result_array();
        return $data;
    }

    public function getDetailCats($id){
        $this->db->select('*'); 
        $this->db->from('kucing a ');
        $this->db->where('a.id', $id);
        $kucing = $this->db->get();
        $data = $kucing->row_array();

        $this->db->select('*'); 
        $this->db->from('ras a ');
        $this->db->where('a.id', $data['ras_id']);
        $ras = $this->db->get()->row_array();

        $this->db->select('*'); 
        $this->db->from('user a ');
        $this->db->where('a.id', $data['user_id']);
        $user = $this->db->get()->row_array();
        $data['user'] = $user;
        $data['ras'] = $ras;
        return $data;
    }

    public function getKucingLainnya(){
        $this->db->select('*'); 
        $this->db->from('kucing ');
        $this->db->order_by('id','desc');
        $this->db->limit('5','0');
        $kucing = $this->db->get();
        $data = $kucing->result_array();
        return $data;
    }

    public function getKucingTerbaru(){
        $this->db->select('*'); 
        $this->db->from('kucing ');
        $this->db->order_by('id','desc');
        $this->db->limit('5','0');
        $kucing = $this->db->get();
        $data = $kucing->result_array();

        for ($i=0; $i < sizeOf($data) ; $i++) { 
            $this->db->select('*'); 
            $this->db->from('ras a ');
            $this->db->where('a.id', $data[$i]['ras_id']);
            $ras = $this->db->get()->row_array();
            $data[$i]['ras'] = $ras;
        }
        return $data;
    }

    function countKucing(){
        $this->db->select('id'); 
        $this->db->from('kucing');
        $user = $this->db->get()->num_rows();
        return $user;
    }


    function filterKota($kota){

        $this->db->select("kucing.*, user.kota");
        $this->db->from("kucing");
        $this->db->join('user','kucing.user_id = user.id');
        $this->db->where("kota", $kota);

        $data = $this->db->get()->result_array();
        return $data;
    }

    function filterKotaRas($kota, $ras){

        $this->db->select("kucing.*, user.kota");
        $this->db->from("kucing");
        $this->db->join('user','kucing.user_id = user.id');
        $this->db->where("kota", $kota);
        $this->db->where_in("ras_id", $ras);

        $data = $this->db->get()->result_array();
        return $data;
    }

    function filterKotaJK($kota, $jk){

        $this->db->select("kucing.*, user.kota");
        $this->db->from("kucing");
        $this->db->join('user','kucing.user_id = user.id');
        $this->db->where("kota", $kota);
        $this->db->where("jk", $jk);

        $data = $this->db->get()->result_array();
        return $data;
    }

    function filterAll($kota, $jk, $ras){

        $this->db->select("kucing.*, user.kota");
        $this->db->from("kucing");
        $this->db->join('user','kucing.user_id = user.id');
        $this->db->where('user.kota', $kota);
        $this->db->where("jk", $jk);
        $this->db->where_in("ras_id",$ras);


        $data = $this->db->get()->result_array();
        return $data;
    }

     function filterRas($ras){

        $this->db->select("*");
        $this->db->from("kucing");
        $this->db->where_in("ras_id", $ras);

        $data = $this->db->get()->result_array();
        return $data;
    }


    function filterJK($jk){

        $this->db->select("*");
        $this->db->from("kucing");
        $this->db->where("jk", $jk);

        $data = $this->db->get()->result_array();
        return $data;
    }

     function filterRasJK($jk, $ras){

        $this->db->select("*");
        $this->db->from("kucing");
        $this->db->where_in("ras_id", $ras);
        $this->db->where("jk", $jk);

        $data = $this->db->get()->result_array();
        return $data;
    }

}
