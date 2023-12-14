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

        $data['ktp'] = $this->M_ktp->tampil_data();
        $this->load->view('Front/Form.php',$data);
    }

    public function info()
    {


        $this->load->view('Front/Info.php');
    }

    public function input_data()
    {     
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);

        if (!empty($_FILES['akta']['name'])) {
            if ($this->upload->do_upload('akta')) {
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

                $file_akta = $gbr['file_name'];
                
                if (!empty($_FILES['kk']['name'])) {
                    if ($this->upload->do_upload('kk')) {
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

                        $file_kk = $gbr['file_name'];

                        if (!empty($_FILES['surat_pengantar']['name'])) {
                            if ($this->upload->do_upload('surat_pengantar')) {
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

                                $file_surat_pengantar = $gbr['file_name'];


                                $kode_permohonan = $this->input->post('kode_permohonan');
                                $nama = $this->input->post('nama');
                                $jenis_kelamin = $this->input->post('jenis_kelamin');
                                $tgl_lahir = $this->input->post('tgl_lahir');
                                $tempat_lahir = $this->input->post('tempat_lahir');
                                $email = $this->input->post('email');
                                $no_telp = $this->input->post('no_telp');
                                $pekerjaan = $this->input->post('pekerjaan');
                                $pendidikan = $this->input->post('pendidikan');
                                $alamat = $this->input->post('alamat');

                                $tanggal =  date('Y-m-d h:i:s');
                                $status = '0';


                                $data = array(
                                 'kode_permohonan' => $kode_permohonan,
                                 'nama' => $nama,
                                 'jenis_kelamin' => $jenis_kelamin,
                                 'tgl_lahir' => $tgl_lahir,
                                 'tempat_lahir' => $tempat_lahir,
                                 'email' => $email,
                                 'no_telp' => $no_telp,
                                 'pekerjaan' => $pekerjaan,
                                 'pendidikan' => $pendidikan,
                                 'alamat' => $alamat,
                                 'akta' => $file_akta,
                                 'kk' => $file_kk,
                                 'surat_pengantar' => $file_surat_pengantar,
                                 'status' => $status,
                                 'tanggal' => $tanggal
                             );

                                $this->M_ktp->input_data($data, 'tbl_ktp');

                                $data['informasi'] = array(
                                 'kode_permohonan' => $kode_permohonan,
                                 'nama' => $nama

                             );
                                $this->load->view('Front/Info.php',$data);

                            } else {
                                echo $this->session->set_flashdata('msg', 'warning');
                                redirect('Admin/Ktp');
                            }
                        } 



                    } else {
                        echo $this->session->set_flashdata('msg', 'warning');
                        redirect('Admin/Ktp');
                    }
                } 

            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Ktp');
            }
        } 
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
