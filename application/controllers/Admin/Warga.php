<?php defined('BASEPATH') or exit('No direct script access allowed');

class Warga  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_warga');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {
        $data['warga'] = $this->M_warga->tampil_data();
        $this->load->view('Admin/List.warga.php', $data);
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
            $data->result  = TRUE;
            $data->success         = TRUE;
            $data->message        = "True !";

        }else{

            $hasil = "Data Kosong";
            $data->result = FALSE ;
            $data->status = FALSE;
        }

        echo json_encode($data);

    }
    public function add()
    {
     date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 10000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['file']['name'])) {
            if ($this->upload->do_upload('file')) {
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
                $nama_kegiatan = $this->input->post('nama_kegiatan');
                $isi_kegiatan = $this->input->post('isi_kegiatan');
                $status = '1';
                $isi_kegiatan =  $this->input->post('isi_kegiatan');
                $tanggal =  date('Y-m-d h:i:s');

                $data = array(

                    'nama_kegiatan' => $nama_kegiatan,
                    'isi_kegiatan' => $isi_kegiatan,
                    'gambar' => $gambar,
                    'status' => $status,
                    'tanggal' => $tanggal,
                    'isi_kegiatan' => $isi_kegiatan

                );



                $this->M_kegiatan->input_data($data, 'tbl_kegiatan');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Kegiatan');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Kegiatan');
            }
        } else {

            redirect('Admin/Kegiatan');
        }
    }

    public function delete($id_user)
    {
        $id_user = $this->input->post('id_user');
        $this->M_user->delete_data($id_user);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/User');
    }

    public function update($kode_pegawai)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id_user = $this->input->post('id_user');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $hak_akses = $this->input->post('hak_akses');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $waktu =  date('Y-m-d h:i:s');

        $data = array(
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'password' => $password,
            'hak_akses' => $hak_akses,
            'waktu' => $waktu
        );

        $where = array(
            'id_user' => $id_user
        );

        $this->M_user->update_data($where, $data, 'tbl_user');
        echo $this->session->set_flashdata('msg', 'info-update');
        redirect('Admin/User');
    }
}
