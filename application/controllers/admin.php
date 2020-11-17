<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        $this->load->view('admin/v_berita',$data);
        $this->load->view('admin/template/footer');
    }

    public function tambahberita()
	{
        $data['judul'] = 'Tambah Berita';

        $this->load->view('admin/template/header',$data);
        $this->load->view('admin/v_addberita');
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
            'temp_redaksi'  => $temp_redaksi,
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
        $this->load->view('admin/v_beritadetail',$data);
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
        $this->load->view('admin/v_editberita',$data);
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
                'temp_redaksi'  => $temp_redaksi
            );
        }
        else{
            $data = array(
                'tgl'           => $tgl,
                'judul'         => $judul,
                'redaksi'       => $redaksi,
                'temp_redaksi'  => $temp_redaksi,
                'cover'         => $cover
            );
        }
        

        $where = array(
            'id'    => $id
        );

        $this->m_master->update_data($where,$data,'tb_berita');
        redirect('admin/berita?pesan=update');
    }
}
