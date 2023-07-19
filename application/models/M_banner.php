<?php
class M_banner extends CI_Model
{

    private $_table = "tbl_banner";

    function tampil_data()
    {
        return $this->db->get('tbl_banner');
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_banner)
    {
        $hsl = $this->db->query("DELETE FROM tbl_banner WHERE id_banner='$id_banner'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data()
    {
        $this->db->select('count(tbl_banner.kode_pegawai) as jumlah');
        $hsl = $this->db->get('tbl_banner');
        return $hsl;
    }
}
