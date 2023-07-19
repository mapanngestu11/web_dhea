<?php
class M_warga extends CI_Model
{

    private $_table = "tbl_warga";

    function tampil_data()
    {
        return $this->db->get('tbl_warga');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_warga)
    {
        $hsl = $this->db->query("DELETE FROM tbl_warga WHERE id_warga='$id_warga'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data()
    {
        $this->db->select('count(tbl_warga.id_warga) as jumlah');
        $hsl = $this->db->get('tbl_warga');
        return $hsl;
    }
    function cek_warga($nik)
    {
        $this->db->select('*');
        $this->db->where('nik',$nik);
        $hsl = $this->db->get('tbl_warga')->result();
        return $hsl;
    }
}
