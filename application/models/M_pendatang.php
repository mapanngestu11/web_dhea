<?php
class M_pendatang extends CI_Model
{

    private $_table = "tbl_surat_datang";

    function tampil_data()
    {

        $cek_akses = $this->session->userdata('hak_akses');

        if ($cek_akses == 'lurah') {
          $this->db->select('*');
          $this->db->from('tbl_surat_datang');
          $this->db->where('status','1');
          $query = $this->db->get();
          return $query;
      }else{
        $this->db->select('*');
        $this->db->from('tbl_surat_datang');
        $query = $this->db->get();
        return $query;
    }
} 

function cek_data_surat($id_surat_datang)
{ 

    $this->db->select('*');
    $this->db->from('tbl_surat_datang');
    $this->db->where('id_surat_datang',$id_surat_datang);
    $query = $this->db->get();
    return $query;

}

function tampil_data_1()
{
    $this->db->select('
        a.id_surat_datang,
        a.nik,
        b.nama_lengkap,
        a.status,
        a.kode_permohonan,
        a.kebutuhan,
        a.file_pemohon,
        a.keterangan,
        a.tanggal');
    $this->db->from('tbl_surat_datang as a');
    $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
    $query = $this->db->get();
    return $query;
}

function tampil_data_warga($nama)
{
    $this->db->select('
        a.id_surat_datang,
        a.nik,
        b.nama_lengkap,
        a.status,
        a.kode_permohonan,
        a.kebutuhan,
        a.file_pemohon,
        a.keterangan');
    $this->db->from('tbl_surat_datang as a');
    $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
    $this->db->where('b.nama_lengkap',$nama);
    $query = $this->db->get();
    return $query;
}

function input_data($data, $table)
{
    $this->db->insert($table, $data);
}

function input_data_surat_pendatang($data, $table)
{
    $this->db->insert($table, $data);
}

function input_data_surat_pindah($data, $table)
{
    $this->db->insert($table, $data);
}

function cek_kodepermohonan_pendatang($kode_permohonan)
{
    $this->db->select('*');
    $this->db->from('tbl_surat_datang');
    $this->db->where('kode_permohonan',$kode_permohonan);
    $query = $this->db->get();
    return $query;
}


function cek_kodepermohonan_pindah($kode_permohonan)
{
    $this->db->select('*');
    $this->db->from('tbl_surat_pindah');
    $this->db->where('kode_permohonan',$kode_permohonan);
    $query = $this->db->get();
    return $query;
}



function delete_data($id_surat_datang)
{
    $hsl = $this->db->query("DELETE FROM tbl_surat_datang WHERE id_surat_datang='$id_surat_datang'");
    return $hsl;
}

function update_data($where, $data, $table)
{
    $this->db->where($where);
    $this->db->update($table, $data);
}
function jumlah_data()
{
    $this->db->select('count(tbl_surat_datang.id_surat_datang) as jumlah');
    $hsl = $this->db->get('tbl_surat_datang');
    return $hsl;
}
function cek_kode_permohonan($kode_permohonan)
{
   $this->db->select('
    a.id_surat_datang,
    a.nik,
    b.nama_lengkap,
    a.status,
    a.kode_permohonan,
    a.kebutuhan,
    a.file_pemohon,
    a.keterangan,
    a.file_surat');
   $this->db->from('tbl_surat_datang as a');
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
        a.id_surat_datang,
        a.nik,
        b.nama_lengkap,
        a.status,
        a.kode_permohonan,
        a.kebutuhan,
        a.file_pemohon,
        a.keterangan,
        a.tanggal');
    $this->db->from('tbl_surat_datang as a');
    $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
    $this->db->where('MONTH(a.tanggal)',$bulan);
    $query = $this->db->get()->result();
    return $query;
}


}
