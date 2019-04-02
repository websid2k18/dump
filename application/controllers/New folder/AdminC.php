<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminC extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/aDashboardV');
	}

}

/* End of file AdminC.php */
/* Location: ./application/controllers/AdminC.php */