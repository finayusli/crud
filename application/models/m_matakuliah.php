<?php
class m_matakuliah extends CI_Model{
    public function tampilmatakuliah(){
        return $this->db->get('matakuliah');
    }

    public function simpanmatakuliah($data=null){
        $this->db->insert('matakuliah',$data);
    }
    public function hapusmatakuliah($where=null){
        $this->db->delete('matakuliah',$where);
    }
    public function matkulwhere($where){
        return $this->db->get_where('matakuliah',$where);
    }
    public function updatematakuliah($data=null,$where=null){
        $this->db->update('matakuliah',$data,$where);
    }
}