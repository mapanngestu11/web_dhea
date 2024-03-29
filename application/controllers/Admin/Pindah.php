<?php defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';


class Pindah  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pindah');
        $this->load->model('M_warga');
        $this->load->helper('url');
        $this->load->library('upload');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {
        $data['pindah'] = $this->M_pindah->tampil_data();
        $this->load->view('Admin/List.pindah.php', $data);
    }

    public function kirim_email()
    {
        $id_surat_pindah = $this->input->post('id_surat_pindah');

        $data = $this->M_pindah->cek_data_surat($id_surat_pindah)->result();

        $cek_email = $data['0']->email;
        $kode_permohonan =  $data['0']->kode_permohonan;
        $nama = $data['0']->nama;

        $mail = new PHPMailer(true);

        $pesan         = $this->input->post('pesan');
        $nama_pengirim      = $this->input->post('nama_pengirim');
        $email              =  $cek_email;


        $mail->isSMTP();      

         $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'Dheakajbs1@gmail.com';   
            $mail->Password   = 'endabkolrrkmvyus';                  // SMTP username
            
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for 
            $mail->setFrom('Dheakajbs1@gmail.com');
            $mail->addAddress($email, $nama_pengirim);     // Add a recipient

            $mail->addReplyTo('Dheakajbs1@gmail.com');

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Informasi Permohonan Surat Pindah, Kelurahan Karang Timur';
            $mail->Body    = '<h1>Halo,' .$nama. '.</h1> <p> Permohonan Surat kamu dengan nomor : <strong>' .$kode_permohonan. ' </strong>, Sudah selesai anda bisa langsung untuk mengambilnya di Kelurahan Karang Timur. Note Pesan : ' .$pesan. '</p> ';

            if ($mail->send()) {
               echo $this->session->set_flashdata('msg', 'success');
               redirect('Admin/Pindah');
           } else {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }

    public function laporan_pindah()
    {
        $data['pindah'] = $this->M_pindah->tampil_data();
        $this->load->view('Admin/List.laporan.pindah.php', $data);
    }

    public function cetak_laporan_pindah ()
    {
       $tanggal = $this->input->post('tanggal');
       $bulan = date('m', strtotime($tanggal));
       $cek_bulan = date('F', strtotime($tanggal));

       $data['keterangan'] = 'Permohonan Pembuatan Surat Pindah';
       $data['laporan'] = $this->M_pindah->cetak_laporan($bulan);
       $jumlah = $this->M_pindah->cetak_laporan_jumlah ($bulan);
       $setuju = $this->M_pindah->cetak_laporan_setuju ($bulan);
       $proses = $this->M_pindah->cetak_laporan_proses ($bulan);
       $tolak = $this->M_pindah->cetak_laporan_tolak ($bulan);



       $data['informasi'] = array( 
        'bulan' => $cek_bulan,
        'jumlah' => $jumlah,
        'setuju' => $setuju,
        'proses' => $proses,
        'tolak' => $tolak,

    );

       $this->load->view('Admin/Cetak_laporan.php',$data);

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

public function delete($id_surat_pindah)
{
    $id_surat_pindah = $this->input->post('id_surat_pindah');
    $this->M_pindah->delete_data($id_surat_pindah);
    echo $this->session->set_flashdata('msg', 'success-hapus');
    redirect('Admin/Pindah');
}

public function add()
{

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
                $nik = $this->input->post('nik');
                $kode_permohonan = $this->input->post('kode_permohonan');
                $kebutuhan = $this->input->post('kebutuhan');
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');
                $status = '0';


                $data = array(
                 'kode_permohonan' => $kode_permohonan,
                 'nik' => $nik,
                 'kebutuhan' => $kebutuhan,
                 'status' => $status,
                 'file_pemohon' => $file,
                 'nama_user' => $nama_user,
                 'tanggal' => $tanggal
             );

                $this->M_pindah->input_data($data, 'tbl_surat_pindah');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Pindah');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/pindah');
            }
        } else {

            redirect('Admin/pindah');
        }
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['file_surat']['name'])) {
            if ($this->upload->do_upload('file_surat')) {
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
                $id_surat_pindah = $this->input->post('id_surat_pindah');
                $status = $this->input->post('status');
                $keterangan = $this->input->post('keterangan');
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');

                $nik = $this->input->post('nik');
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $no_telp = $this->input->post('no_telp');
                $alamat = $this->input->post('alamat');

                $data = array(

                    'status' => $status,
                    'keterangan' => $keterangan,
                    'file_pemohon' => $file,
                    'nama_user' => $nama_user,
                    'tanggal' => $tanggal,

                    'nik' => $nik,
                    'nama' => $nama,
                    'email' => $email,
                    'no_telp' => $no_telp,
                    'alamat' => $alamat


                );


                $where = array(
                    'id_surat_pindah' => $id_surat_pindah
                );

                $this->M_pindah->update_data($where,$data,'tbl_surat_pindah');




                echo $this->session->set_flashdata('msg', 'success_update');
                redirect('Admin/Pindah');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Pindah');
            }

        } else {

            $id_surat_pindah = $this->input->post('id_surat_pindah');
            $status = $this->input->post('status');
            $keterangan = $this->input->post('keterangan');
            $nama_user = $this->input->post('nama_user');
            $tanggal =  date('Y-m-d h:i:s');
            $nik = $this->input->post('nik');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');
            $alamat = $this->input->post('alamat');

            $data = array(

                'status' => $status,
                'keterangan' => $keterangan,
                'nama_user' => $nama_user,
                'tanggal' => $tanggal,


                'nik' => $nik,
                'nama' => $nama,
                'email' => $email,
                'no_telp' => $no_telp,
                'alamat' => $alamat
            );



            $where = array(
                'id_surat_pindah' => $id_surat_pindah
            );

            $this->M_pindah->update_data($where,$data,'tbl_surat_pindah');

            $data = $this->M_pindah->cek_data_surat($id_surat_pindah)->result();

            $cek_email = $data['0']->email;
            $kode_permohonan =  $data['0']->kode_permohonan;
            $nama = $data['0']->nama;



            $mail = new PHPMailer(true);

            $pesan              = $keterangan;
            $nama_pengirim      = $this->input->post('nama_pengirim');
            $email              =  $cek_email;
            if ($status  == '1') {
                $cek_status = 'Di Setujui';
            } elseif ($status == '2') {
                $cek_status = 'Di Tolak';
            } elseif ($status == '0') {
                $cek_status = 'Masih Menunggu';
            }


            $mail->isSMTP();      

            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'Maulanaagung543@gmail.com';   
            $mail->Password   = 'axsxzmeoojdrtzop';                  // SMTP username
            
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for 
            $mail->setFrom('Maulanaagung543@gmail.com');
            $mail->addAddress($email, $nama_pengirim);     // Add a recipient

            $mail->addReplyTo('Maulanaagung543@gmail.com');

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Informasi Permohonan Pindah Kelurahan Karang Timur';
            $mail->Body    = '<h1>Halo,' .$nama. '.</h1> <p> Permohonan Surat kamu dengan nomor : <strong>' .$kode_permohonan. ' </strong>, Saat ini sedang tahap : <strong> '.$cek_status.' </strong> , Keterangan lebih lanjut sebagai berikut : ' .$pesan. '</p> ';

            if ($mail->send()) {

            } else {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo $this->session->set_flashdata('msg', 'success_update');
            redirect('Admin/Pindah');
        }

    }
}
