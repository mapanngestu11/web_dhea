<?php
class M_ktp extends CI_Model
{

    private $_table = "tbl_ktp";

    function tampil_data()
    {
        $cek_akses = $this->session->userdata('hak_akses');

        if ($cek_akses == 'lurah') {
           $this->db->select('*');
           $this->db->from('tbl_ktp');
           $this->db->where('status','1');
           $query = $this->db->get();
           return $query;
       }else{
        $this->db->select('*');
        $this->db->from('tbl_ktp');
        $query = $this->db->get();
        return $query;
    }

}

function cek_data_ktp($id_ktp)
{ 

    $this->db->select('*');
    $this->db->from('tbl_ktp');
    $this->db->where('id_ktp',$id_ktp);
    $query = $this->db->get();
    return $query;

}

function tampil_data_1()
{
    $this->db->select('
        a.id_ktp,
        a.nik,
        b.nama_lengkap,
        a.status,
        a.kode_permohonan,
        a.kebutuhan,
        a.file_pemohon,
        a.keterangan,
        a.tanggal');
    $this->db->from('tbl_ktp as a');
    $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
    $query = $this->db->get();
    return $query;
}

function tampil_data_warga($nama)
{
    $this->db->select('
        a.id_ktp,
        a.nik,
        b.nama_lengkap,
        a.status,
        a.kode_permohonan,
        a.kebutuhan,
        a.file_pemohon,
        a.keterangan');
    $this->db->from('tbl_ktp as a');
    $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
    $this->db->where('b.nama_lengkap',$nama);
    $query = $this->db->get();
    return $query;
}

function cek_kodepermohonan_ktp($kode_permohonan)
{
    $this->db->select('*');
    $this->db->from('tbl_ktp');
    $this->db->where('kode_permohonan',$kode_permohonan);
    $query = $this->db->get();
    return $query;
}

function input_data($data, $table)
{
    $this->db->insert($table, $data);
}

function delete_data($id_ktp)
{
    $hsl = $this->db->query("DELETE FROM tbl_ktp WHERE id_ktp='$id_ktp'");
    return $hsl;
}

function update_data($where, $data, $table)
{
    $this->db->where($where);
    $this->db->update($table, $data);
}
function jumlah_data()
{
    $this->db->select('count(tbl_ktp.id_tkp) as jumlah');
    $hsl = $this->db->get('tbl_ktp');
    return $hsl;
}
function cek_kode_permohonan($kode_permohonan)
{
   $this->db->select('
    a.id_ktp,
    a.nik,
    b.nama_lengkap,
    a.status,
    a.kode_permohonan,
    a.kebutuhan,
    a.file_pemohon,
    a.keterangan,
    a.file_surat');
   $this->db->from('tbl_ktp as a');
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
   $this->db->select('*');
   $this->db->from('tbl_ktp');

   $this->db->where('MONTH(tanggal)',$bulan);
   $query = $this->db->get()->result();
   return $query;
}
}
