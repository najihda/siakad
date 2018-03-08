<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Class untuk resource mahasiswa
*
* @package Siakad Najih
* @author Najih Dziauddin Abdillah
* @copyright Copyright (c) 2017 - 2018 Najih.id
* @version 1.0
* @link http://najih.id
*/
class Mahasiswa extends CI_Controller {

	function __construct()
  {
      parent::__construct();
       $this->load->library('cfpdf');
  }

	public function index()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nim'] 			= $this->session->userdata('nim');
			$bc['status'] 		= $this->session->userdata('stts');
			$bc['nama'] 		= $this->session->userdata('nama');

			$bc['uplink'] 			= $this->web_app_model->getAllData('external_link');
			$bc['berita']			= $this->model_mahasiswa->getBeritaMahasiswa($bc['nim']);
			$bc['beritaAkademik']	= $this->web_app_model->getBeritaAkademik();

			$this->template->load('template_mahasiswa','mahasiswa/dash_mahasiswa',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function krs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['nim'] 			= $this->session->userdata('nim');
			$bc['program']		= $this->session->userdata('program');
			$bc['prodi'] 		= $this->session->userdata('prodi');

			$bc['smt_skr'] 		= $this->web_app_model->getSemesterMax($bc['nim']);
			$bc['ipk']	   		= $this->web_app_model->getIpk($bc['nim'],$bc['smt_skr']-1);
			$bc['dosen_wali']	= $this->web_app_model->getDosenWali($bc['nim']);
			$bc['tahun_ajaran']	= $this->web_app_model->getTahunAjaran();
			$bc['detail_krs']	= $this->model_mahasiswa->getDetailKrs($bc['nim']);
			$bc['prodi_nama']	= $this->web_app_model->getProdis($bc['nim']);

			$bc['beban_studi']	= beban_studi($bc['ipk']);

			$kls = $this->session->userdata('prodi');

			$bc['jadwal'] 		= $this->model_mahasiswa->getJadwal($bc['nim'], $kls);
			$bc['detailfrs'] 	= $this->web_app_model->getDetailKrsPersetujuan($bc['nim'],$bc['prodi']);

			$st 	= '';
			$cek 	= $this->web_app_model->getSelectedData('tbl_perwalian_header','nim',$bc['nim']);
			foreach($cek->result() as $c)
			{ $st = $c->status; }

			if($st==0)
			{ $this->template->load('template_mahasiswa','mahasiswa/jadwal',$bc); }
			else if($st==1)
			{ $this->template->load('template_mahasiswa','mahasiswa/detail_krs',$bc); }
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_krs()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$nim 		= $this->input->post('nim');
			$smt 		= $this->input->post('semester');
			$detailfrs 	= $this->input->post('detailfrs');
			if($detailfrs!="")
			{
				$data_header=array(
					'nim' => $nim ,
					'tgl_perwalian' => date("Y-m-d"),
					'tgl_persetujuan' => "",
					'status' => "0",
					'semester' => $smt);
				$data_detail=array();
				$temp=explode("|", $detailfrs);
				foreach($temp as $value)
				{
					$data_detail[]=array(
					'nim' => $nim ,
					'kd_jadwal' => $value);
				}
				$this->model_mahasiswa->deleteKrs($nim,$smt);
				$this->model_mahasiswa->insertKrs($data_header,$data_detail);

				header('location:'.base_url().'mahasiswa/krs');
				$this->session->set_flashdata("save_krs","<div class='alert bg-green alert-dismissible' role='alert'>
			    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			    Sukses! Data KRS berhasil di simpan. </div>");
			}
			else
			{
				$this->model_mahasiswa->deleteKrs($nim,$smt);
				header('location:'.base_url().'mahasiswa/krs');
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function khs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['nim'] 		= $this->session->userdata('nim');
			$bc['khs'] 		= $this->web_app_model->getNilai($bc['nim']);

			$this->template->load('template_mahasiswa','mahasiswa/khs',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tampil_jadwal()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['nim'] 		= $this->session->userdata('nim');
			$bc['jadwal'] 	= $this->model_mahasiswa->getSemuaJadwalMahasiswa($bc['nim']);

			$this->template->load('template_mahasiswa','mahasiswa/jadwal_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function peserta()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$d = explode("_",$this->uri->segment(3));

			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['nim'] 		= $this->session->userdata('nim');
			$bc['peserta']	= $this->web_app_model->getPeserta($d[0],$d[1]);

			$this->template->load('template_mahasiswa','mahasiswa/peserta_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function akun()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['nim'] 		= $this->session->userdata('nim');

			$this->template->load('template_mahasiswa','mahasiswa/akun',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_akun()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$username		= $this->session->userdata('nim');
			$pass_lama		= $this->input->post('pass_lama');
			$pass_baru		= $this->input->post('pass_baru');
			$ulangi_pass	= $this->input->post('ulangi_pass');

			$data['username'] = $username;
			$data['password'] = md5($pass_lama);

			$cek = $this->web_app_model->getSelectedDataMultiple('tbl_login',$data);
			if($cek->num_rows()>0)
			{
				if($pass_baru==$ulangi_pass)
				{
					$simpan['password'] = md5($pass_baru);
					$where = array('username'=>$username);
					$this->web_app_model->updateDataMultiField("tbl_login",$simpan,$where);

					header('location:'.base_url().'mahasiswa');
					$this->session->set_flashdata("save_akun","<div class='alert bg-green alert-dismissible' role='alert'>
			        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			        Sukses!Anda berhasil mengubah password. </div>");
				}
				else
				{
					$this->session->set_flashdata("save_akun","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span> </button>
                    <strong>Terjadi kesalahan!</strong> Password baru yang anda masukan tidak sama. </div>");
					header('location:'.base_url().'mahasiswa');
				}
			}
			else
			{
				$this->session->set_flashdata("save_akun","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span> </button>
				<strong>Terjadi kesalahan!</strong> Password lama anda salah, mohon di periksa kembali. </div>");
				header('location:'.base_url().'mahasiswa');
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_mahasiswa()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
		  $bc['nama'] 		= $this->session->userdata('nama');
			$bc['status'] 		= $this->session->userdata('stts');
			$bc['nim'] 			= $this->session->userdata('nim');
		  $nm =	$bc['nim'];

			$bc['mhs']			= $this->web_app_model->getProfilMhs('tbl_mahasiswa','nim',$nm,$this->uri->segment(3));

			$this->template->load('template_mahasiswa','mahasiswa/profil_mahasiswa',$bc);
		}
		else
		{
			header('location:'.base_url().'auth');
		}
	}

	public function tentang()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['nim'] 		= $this->session->userdata('nim');
			$this->template->load('template_mahasiswa','mahasiswa/tentang',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function kalender()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['nim'] 		= $this->session->userdata('nim');
			$this->template->load('template_mahasiswa','mahasiswa/kalender',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function lihat_berita()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nama'] 				= $this->session->userdata('nama');
			$bc['nim'] 					= $this->session->userdata('nim');
			$bc['berita_staf']	= $this->web_app_model->vBeritaStaf('tbl_berita','kode_brt',$this->uri->segment(3));

			$this->template->load('template_mahasiswa','mahasiswa/berita_lihat',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function lihat_berita_admin()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='mahasiswa')
		{
			$bc['nama'] 				= $this->session->userdata('nama');
			$bc['nim'] 		= $this->session->userdata('nim');
			$bc['berita_admin']	= $this->web_app_model->vBeritaAkademik('tbl_berita_admin','kode_brt',$this->uri->segment(3));

			$this->template->load('template_mahasiswa','mahasiswa/berita_admin_lihat',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}


}

/* End of file mahasiswa.php */
/* Location: ./application/controllers/mahasiswa.php */
