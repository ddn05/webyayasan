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
}
