<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login','ml');
	}
	public function index()
	{
		$this->load->view('admin/v_login');
	}
	public function proses_login()
	{
		if ($this->session->userdata('logged')==false) 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek = $this->db->get_where('admin', ['username' => $username])->row_array();
			if ($cek) 
			{
				if ($password == $cek['password']) 
				{
					$data = [
						'username' => $cek['username'],
						'nama_admin' => $cek['nama_admin'],
						'id_level' => $cek['id_level'],
						'logged' => true
					];
					$this->session->set_userdata($data);
					redirect('admin/C_dashboard','refresh');
				} 
				else 
				{
					$this->session->set_flashdata('pesan','password Salah');
					redirect('admin/C_login/index','refresh');
				}
				
			} 
			else 
			{
				$this->session->set_flashdata('pesan','Username tidak terdaftar');
				redirect('admin/C_login/index','refresh');
			}
			
		}
		else
		{
			$this->session->set_flashdata('pesan','session yg sebelumnya belum dilogout');
			redirect('admin/C_login/index','refresh');
		}
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/C_login/index','refresh');
	}

}

/* End of file C_login.php */
/* Location: ./application/modules/admin/controllers/C_login.php */