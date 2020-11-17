<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
        $data['judul'] = 'Yayasan Auliya Mursyidy';

        $this->load->view('template/header',$data);
        $this->load->view('v_home');
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
}
