<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
		parent::__construct();
		// cek login
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'auth?pesan=belumlogin');
		}
	}

	public function index()
	{
        $data['judul'] = 'Dashboard Admin';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/v_dashboard');
        $this->load->view('admin/template/footer');
    }

    public function berita(){
        $data['judul'] = 'Data Berita';
        $data['berita'] = $this->m_master->get_data('tb_berita')->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/berita/v_berita',$data);
        $this->load->view('admin/template/footer');
    }

    public function tambahberita()
	{
        $data['judul'] = 'Tambah Berita';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/berita/v_addberita');
        $this->load->view('admin/template/footer');
    }

    public function inputberita(){
        $config = array();
        $config['upload_path']      = './uploads/img';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';

        $this->load->library('upload',$config,'coverupload');
        $this->coverupload->initialize($config);
        $coverupload    = $this->coverupload->do_upload('cover');
        $datcov         = $this->coverupload->data();

        $tgl            = $this->input->post('tgl');
        $judul          = $this->input->post('judul');
        $cover          = $datcov['file_name'];
        $redaksi        = $this->input->post('redaksi');
        $temp_redaksi   = $redaksi;
        
        $data = array(
            'tgl'           => $tgl,
            'judul'         => $judul,
            'redaksi'       => $redaksi,
            'cover'         => $cover
        );

        $this->m_master->insert_data($data,'tb_berita');
        redirect('admin/berita?pesan=berhasil');

        // $this->form_validation->set_rules('tgl','Masukan Tanggal','required');
        // $this->form_validation->set_rules('judul','Masukan Judul','required');
        // $this->form_validation->set_rules('cover','Masukan Cover','required');
        // $this->form_validation->set_rules('redaksi','Masukan Redaksi','required');

        // if($this->form_validation->run() != false){
        //     $data = array(
        //         'tgl' => $tgl,
        //         'judul' => $judul,
        //         'redaksi' => $redaksi,
        //         'temp_redaksi' => $temp_redaksi,
        //         'cover' => $cover
        //     );

        //     $this->m_master->input($data,'tb_berita');
        //     redirect('admin/berita?pesan=berhasil');
        // }
        // else{
        //     redirect('admin/tambahberita?pesan=gagal');
        // }
    }

    public function rincianberita($id){
        $data['judul'] = 'Rincian Berita';
        $data['detail'] = $this->db->get_where('tb_berita', array('id' => $id))->row();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/berita/v_beritadetail',$data);
        $this->load->view('admin/template/footer');
    }

    public function hapusberita($id){
        $where = array(
            'id' => $id
        );

        $this->m_master->delete_data($where,'tb_berita');
        redirect('admin/berita?pesan=hapusberita');
    }

    public function editberita($id){
        $data['judul']  = 'Rincian Berita';
        $where = array(
            'id' => $id
        );
        $data['update'] = $this->m_master->edit_data($where,'tb_berita')->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/berita/v_editberita',$data);
        $this->load->view('admin/template/footer');
    }

    public function updateberita(){
        $onfig = array();
        $config['upload_path']      = './uploads/img';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';

        $this->load->library('upload',$config,'coverupload');
        $this->coverupload->initialize($config);
        $coverupload    = $this->coverupload->do_upload('cover');
        $datcov         = $this->coverupload->data();

        $id             = $this->input->post('id');
        $tgl            = $this->input->post('tgl');
        $judul          = $this->input->post('judul');
        $redaksi        = $this->input->post('redaksi');
        $temp_redaksi   = $redaksi;
        $cover          = $datcov['file_name'];
        if($cover == ''){
            $data = array(
                'tgl'           => $tgl,
                'judul'         => $judul,
                'redaksi'       => $redaksi,
            );
        }
        else{
            $data = array(
                'tgl'           => $tgl,
                'judul'         => $judul,
                'redaksi'       => $redaksi,
                'cover'         => $cover
            );
        }
        

        $where = array(
            'id'    => $id
        );

        $this->m_master->update_data($where,$data,'tb_berita');
        redirect('admin/berita?pesan=update');
    }

    public function generalpost(){
        $data['judul'] = 'General Post';
        $data['jumbotron'] = $this->m_master->get_data('tb_jumbotron')->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/general-post/v_general-post',$data);
        $this->load->view('admin/template/footer');
    }

    public function addjumbotron(){
        $data['judul'] = 'Tambah Jumbotron';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/general-post/v_addjumbotron');
        $this->load->view('admin/template/footer');
    }

    public function inputjumbotron(){
        $onfig = array();
        $config['upload_path']      = './uploads/img-jumbotron';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';

        $this->load->library('upload',$config,'jumbotronupload');
        $this->jumbotronupload->initialize($config);
        $jumbotronupload    = $this->jumbotronupload->do_upload('gambar');
        $datgam             = $this->jumbotronupload->data();

        $judul          = $this->input->post('judul');
        $deskripsi      = $this->input->post('deskripsi');
        $gambar         = $datgam['file_name'];

        $data = array(
            'judul'     => $judul,
            'deskripsi' => $deskripsi,
            'gambar'    => $gambar
        );

        $this->m_master->insert_data($data,'tb_jumbotron');
        redirect('admin/generalpost?pesan=berhasil');
    }

    public function hapusjumbotron($id){
        $where = array(
            'id' => $id
        );

        $this->m_master->delete_data($where,'tb_jumbotron');
        redirect('admin/generalpost?pesan=hapusjumbotron');
    }

    public function editjumbotron($id){
        $data['judul'] = 'Edit Jumbotron';

        $where = array(
            'id' => $id
        );
        $data['edit'] = $this->m_master->edit_data($where,'tb_jumbotron')->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/general-post/v_editjumbotron',$data);
        $this->load->view('admin/template/footer');
    }

    public function updatejumbotron(){
        $onfig = array();
        $config['upload_path']      = './uploads/img-jumbotron';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';

        $this->load->library('upload',$config,'jumbotronupload');
        $this->jumbotronupload->initialize($config);
        $jumbotronupload    = $this->jumbotronupload->do_upload('gambar');
        $datgam             = $this->jumbotronupload->data();

        $id             = $this->input->post('id');
        $judul          = $this->input->post('judul');
        $deskripsi      = $this->input->post('deskripsi');
        $gambar         = $datgam['file_name'];

        if($gambar == ''){
            $data = array(
                'judul'     => $judul,
                'deskripsi' => $deskripsi
            );
        }
        else{
            $data = array(
                'judul'     => $judul,
                'deskripsi' => $deskripsi,
                'gambar'    => $gambar
            );
        }

        $where = array(
            'id'        => $id
        );

        $this->m_master->update_data($where,$data,'tb_jumbotron');
        redirect('admin/generalpost?pesan=update');
    }


    public function gantipassword(){
        $data['judul']  = 'Ganti Password';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/v_gantipassword');
        $this->load->view('admin/template/footer');
    }

    public function actpassword(){
        $pass_baru      = $this->input->post('pass_baru');
        $ulangi_pass    = $this->input->post('ulangi_pass');
        
        $this->form_validation->set_rules('pass_baru','Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass','Ulangi Password Baru','required');

        if($this->form_validation->run() != false){
            $data = array(
                'password' =>md5($pass_baru)
            );
            $w = array(
                'id' => $this->session->userdata('id')
            );

            $this->m_master->update_data($w,$data,'tb_admin');
            redirect('admin/gantipassword?pesan=berhasil');
        }
        else{
            redirect('admin/gantipassword?pesan=gagal');
        }
    }

    public function dataadmin(){
        $data['judul']  = 'Admin';
        $data['admin']  = $this->m_master->get_data('tb_admin')->result();

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/petugas/v_dataadmin',$data);
        $this->load->view('admin/template/footer');
    }

    public function inputadmin(){
        $nama       = $this->input->post('nama');
        $username   = $this->input->post('username');
        $password   = $this->input->post('password');

        $data=array(
            'nama' => $nama,
            'username' => $username,
            'password' => md5($password)
        );

        $this->m_master->insert_data($data,'tb_admin');
        redirect('admin/dataadmin?pesan=sukses');
    }

    public function hapusadmin($id){
        $where = array(
            'id' => $id
        );

        $this->m_master->delete_data($where,'tb_admin');
        redirect('admin/dataadmin?pesan=hapus');
    }
}
