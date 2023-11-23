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

    public function add()
    {
        // $nik = $this->input->post('nik');
        // // $hasil = $this->M_ktp->cek_ktp($nik)->result();


     date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['file_pemohon']['name'])) {
            if ($this->upload->do_upload('file_pemohon')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file = $gbr['file_name'];
                // $nik = $this->input->post('nik');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $kode_permohonan = $this->input->post('kode_permohonan');
                $kebutuhan = $this->input->post('kebutuhan');
                $tanggal =  date('Y-m-d h:i:s');
                $status = '0';


                $data = array(
                   'kode_permohonan' => $kode_permohonan,
                   'nama_lengkap' => $nama_lengkap,
                 // 'nik' => $nik,
                   'kebutuhan' => $kebutuhan,
                   'status' => $status,
                   'file_pemohon' => $file,
                   'tanggal' => $tanggal
               );

                $this->M_ktp->input_data($data, 'tbl_permohonan_ktp_baru');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Ktp');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Ktp');
            }
        } else {

            redirect('Ktp');
        }

    }





}
