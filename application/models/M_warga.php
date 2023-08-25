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

    function cek_warga($nik)
    {
        $this->db->select('*');
        $this->db->where('nik',$nik);
        $hsl = $this->db->get('tbl_warga')->result();
        return $hsl;
    }
    function jumlah_warga()
    {
        $this->db->select('count(tbl_warga.id_warga) as jumlah');
        $hsl = $this->db->get('tbl_warga');
        return $hsl;
    }
    function jumlah_ktp()
    {
        $this->db->select('count(tbl_permohonan_ktp_baru.id_ktp_baru) as jumlah');
        $hsl = $this->db->get('tbl_permohonan_ktp_baru');
        return $hsl;
    }
    function jumlah_kelahiran()
    {
        $this->db->select('count(tbl_permohonan_surat_kelahiran.id_surat_kelahiran) as jumlah');
        $hsl = $this->db->get('tbl_permohonan_surat_kelahiran');
        return $hsl;
    }
    function jumlah_pendatang()
    {
      $this->db->select('count(tbl_permohonan_surat_pendatang.id_surat_pendatang) as jumlah');
      $hsl = $this->db->get('tbl_permohonan_surat_pendatang');
      return $hsl;   
  }


  function tampil_data_limit()
  {
    $this->db->limit('5');
    return $this->db->get('tbl_warga');
}
}
