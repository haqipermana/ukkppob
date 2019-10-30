<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	public function index()
	{
		$data['konten']='admin/v_dashboard';
		$this->load->view('Template', $data);
	}

}

/* End of file C_dashboard.php */
/* Location: ./application/modules/admin/controllers/C_dashboard.php */