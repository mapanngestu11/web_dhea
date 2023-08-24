<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ktp  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('M_ktp');
        $this->load->model('M_warga');
        $this->load->helper('url');
        $this->load->library('upload');
        // $this->load->model('M_tagihan');
        // $this->load->model('M_pengajuan');
        // $this->load->model('M_instansi');

        
    }

    public function index()
    {

        // $data['banner'] = $this->M_banner->tampil_data();
        $this->load->view('Front/Ktp.php');
    }

    public function cek_permohonan()
    {
        $kode_permohonan = $this->input->post('kode_permohonan');
        $hasil = $this->M_ktp->cek_kode_permohonan($kode_permohonan)->result();

        $status = $hasil[0]->status;
        $keterangan = $hasil[0]->keterangan;
        $file_surat = $hasil[0]->file_surat;



        if ($status == '1') {   
            $data['hasil'] = array(
                'status' => $status,
                'keterangan' => $keterangan,
                'file_surat' => $file_surat

            );
            $this->load->view('Front/Hasil_ktp.php',$data);

        }else{
            echo $this->session->set_flashdata('msg', 'proses');
            redirect('Ktp');
        }

    }


    public function cek_warga()
    {
        $data = (object)array();
        $nik = $this->input->post('input_check_nik');
        // $nis = '2022001';
        $cek_nik = $this->M_warga->cek_warga($nik);

        $data_nik = json_encode($cek_nik);

        $decode_nik = json_decode($data_nik);

        if ($decode_nik != NULL) {

            $hasil = "Data Ada";
            $data->result  = $decode_nik;
            $data->success         = TRUE;
            $data->message        = "True !";

        }else{

            $hasil = "Data Kosong";
            $data->result = FALSE ;
            $data->status = FALSE;
        }

        echo json_encode($data);

    }

}
