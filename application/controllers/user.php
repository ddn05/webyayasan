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
                $data['judul'] = 'Berita';

                $this->load->view('template/header',$data);
                $this->load->view('v_berita');
                $this->load->view('template/footer');
        }

        public function baca(){
                $data['judul'] = 'Baca Berita';

                $this->load->view('template/header',$data);
                $this->load->view('v_baca');
                $this->load->view('template/footer');
        }
}
