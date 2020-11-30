<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	public function index()
	{
		$data['judul']     = 'Page Not Found';

        $this->load->view('template/header',$data);
        $this->load->view('404');
        $this->load->view('template/footer');
	}
}
