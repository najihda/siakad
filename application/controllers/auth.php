<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			$this->load->view('tampilan_login');
		}
		else
		{
			$st = $this->session->userdata('stts');
			if($st=='mahasiswa')
			{
				header('location:'.base_url().'mahasiswa');
			}
			else if($st=='dosen')
			{
				header('location:'.base_url().'dosen');
			}
			else if($st=='admin')
			{
				header('location:'.base_url().'admin');
			}
			else if($st=='staf')
			{
				header('location:'.base_url().'staf');
			}
		}
	}

	public function login()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');

		$this->web_app_model->getLoginData($u,$p);
	}

	public function panduan()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			$this->load->view('panduan');
		}
	}

	public function logout()
	{
		$cek = $this->session->userdata('logged_in');
		if(empty($cek))
		{
			header('location:'.base_url().'');
		}
		else
		{
			$this->session->sess_destroy();
			header('location:'.base_url().'');
		}
	}


}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
