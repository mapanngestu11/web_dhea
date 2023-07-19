<?php defined('BASEPATH') or exit('No direct script access allowed');

class Banner  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_banner');
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
        $data['banner'] = $this->M_banner->tampil_data();
        $this->load->view('Admin/List.banner.php', $data);
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 100000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 1950;
                $config['height'] = 631;
                $config['new_image'] = './assets/upload/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar = $gbr['file_name'];
                $id_banner = $this->input->post('id_banner');
                $judul = $this->input->post('judul');
                $nama_lengkap = $this->input->post('nama_lengkap');
                $tanggal =  date('Y-m-d h:i:s');

                $data = array(

                    'judul' => $judul,
                    'nama_lengkap' => $nama_lengkap,
                    'gambar' => $gambar,
                    'tanggal' => $tanggal

                );

                $where = array(
                    'id_banner' => $id_banner
                );

                $this->M_banner->update_data($where,$data,'tbl_banner');
                echo $this->session->set_flashdata('msg', 'success_update');
                redirect('Admin/Banner');
            } else {
                echo $this->session->set_flashdata('msg', 'warning_update');
                redirect('Admin/Banner');
            }

        } else {

         $id_banner = $this->input->post('id_banner');
         $judul = $this->input->post('judul');
         $nama_lengkap = $this->input->post('nama_lengkap');
         $tanggal =  date('Y-m-d h:i:s');

         $data = array(

            'judul' => $judul,
            'nama_lengkap' => $nama_lengkap,
            'tanggal' => $tanggal

        );



         $where = array(
            'id_banner' => $id_banner
        );

         $cek = $this->M_banner->update_data($where,$data,'tbl_banner');
         echo $this->session->set_flashdata('msg', 'success_update');
         redirect('Admin/Banner');
     }
 }
}
