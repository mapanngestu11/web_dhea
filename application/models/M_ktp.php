<?php
class M_ktp extends CI_Model
{

    private $_table = "tbl_permohonan_ktp_baru";

    function tampil_data()
    {
        $this->db->select('
            a.id_ktp_baru,
            a.nik,
            b.nama_lengkap,
            a.status,
            a.kode_permohonan,
            a.kebutuhan,
            a.file_pemohon,
            a.keterangan,
            a.tanggal');
        $this->db->from('tbl_permohonan_ktp_baru as a');
        $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
        $query = $this->db->get();
        return $query;
    }

    function tampil_data_warga($nama)
    {
        $this->db->select('
            a.id_ktp_baru,
            a.nik,
            b.nama_lengkap,
            a.status,
            a.kode_permohonan,
            a.kebutuhan,
            a.file_pemohon,
            a.keterangan');
        $this->db->from('tbl_permohonan_ktp_baru as a');
        $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
        $this->db->where('b.nama_lengkap',$nama);
        $query = $this->db->get();
        return $query;
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_ktp_baru)
    {
        $hsl = $this->db->query("DELETE FROM tbl_permohonan_ktp_baru WHERE id_ktp_baru='$id_ktp_baru'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data()
    {
        $this->db->select('count(tbl_permohonan_ktp_baru.id_tkp) as jumlah');
        $hsl = $this->db->get('tbl_permohonan_ktp_baru');
        return $hsl;
    }
    function cek_kode_permohonan($kode_permohonan)
    {
       $this->db->select('
        a.id_ktp_baru,
        a.nik,
        b.nama_lengkap,
        a.status,
        a.kode_permohonan,
        a.kebutuhan,
        a.file_pemohon,
        a.keterangan,
        a.file_surat');
       $this->db->from('tbl_permohonan_ktp_baru as a');
       $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
       $this->db->where('kode_permohonan',$kode_permohonan);
       $query = $this->db->get();
       return $query;
   }
   function cek_ktp($nik)
   {
    $this->db->select('*');
    $this->db->from('tbl_warga');
    $this->db->where('status','1');
    $this->db->where('nik',$nik);
    $query = $this->db->get();
    return $query;

}
function cetak_laporan($bulan)
{
   $this->db->select('
    a.id_ktp_baru,
    a.nik,
    b.nama_lengkap,
    a.status,
    a.kode_permohonan,
    a.kebutuhan,
    a.file_pemohon,
    a.keterangan,
    a.file_surat,
    a.tanggal');
   $this->db->from('tbl_permohonan_ktp_baru as a');
   $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
   $this->db->where('MONTH(a.tanggal)',$bulan);
   $query = $this->db->get()->result();
   return $query;
}
}
