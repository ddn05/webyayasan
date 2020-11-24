<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
        $data['judul']     = 'Yayasan Auliya Mursyidy';
        $data['jumbotron'] = $this->m_master->get_data('tb_jumbotron')->result();

        $this->load->view('template/header',$data);
        $this->load->view('v_home',$data);
        $this->load->view('template/footer');
        }
        
        public function berita(){
                $data['judul']  = 'Berita';
                $data['berita'] = $this->m_master->get_data('tb_berita')->result();

                $this->load->view('template/header',$data);
                $this->load->view('v_berita',$data);
                $this->load->view('template/footer');
        }

        public function baca($id){
                $data['judul'] = 'Baca Berita';
                $data['baca'] = $this->db->get_where('tb_berita', array('id' => $id))->row();

                $this->load->view('template/header',$data);
                $this->load->view('v_baca',$data);
                $this->load->view('template/footer');
        }

        public function search(){
                $data['judul'] = 'Penelusuran';
                $keyword = $this->input->post('keyword');
                $data['cari'] = $this->m_master->cari_data($keyword);
                $data['kunci'] = $keyword;
        
                $this->load->view('template/header',$data);
                $this->load->view('v_cari',$data);
                $this->load->view('template/footer');
        }

        public function tentang(){
                $data['judul'] = 'Tentang';

                $this->load->view('template/header',$data);
                $this->load->view('v_tentang',$data);
                $this->load->view('template/footer');
        }
}
