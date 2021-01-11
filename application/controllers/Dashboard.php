<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['pageTitle'] = 'Dashboard';      
        // $data['bidang'] = $this->Model_bidang->get_bidang()->result();
        $data['pageContent'] = $this->load->view('dashboard', $data, TRUE);

        $this->load->view('template/layout', $data);

	}
}