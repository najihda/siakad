<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Class untuk resource mahasiswa
*
* @package Siakad Najih
* @author Najih Dziauddin Abdillah
* @copyright Copyright (c) 2017 - 2018 Najih.id
* @version 1.0
* @link http://najih.id
*/
class Admin extends CI_Controller {

	function __construct()
  {
      parent::__construct();
       $this->load->library('cfpdf');
  }

	public function index()
	{
		$cek 				= $this->session->userdata('logged_in');
		$stts 			= $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['uplink'] 				= $this->web_app_model->getAllData('external_link');
			$bc['berita']					= $this->web_app_model->getBeritaStf();
			$bc['beritaAkademik']	= $this->web_app_model->getBeritaAkademik();
			$this->template->load('template','admin/dash_admin',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function thn_akademik()
	{
		$cek 				= $this->session->userdata('logged_in');
		$stts 			= $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['thn_akademik'] = $this->web_app_model->getAllData('tbl_thn_ajaran');
			$this->template->load('template','admin/thn_akademik_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_thn()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts	= $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin')
			{
				$st = $this->input->post("stts");

				$simpan["keterangan"] 		= $this->input->post("keterangan");
				$simpan["tgl_kuliah"] 		= $this->input->post("tgl_kuliah");
				$simpan["batas_perwalian"]= $this->input->post("batas_perwalian");
				$simpan["stts_thn"] 			= $this->input->post("stts_thn");

				if($st=="edit")
				{
					$kd_tahun	= $this->input->post('kd_tahun');
					$where		= array('kd_tahun'=>$kd_tahun);
					$this->web_app_model->updateDataMultiField("tbl_thn_ajaran",$simpan,$where);
					?><?php
						{
							header('location:'.base_url().'admin/thn_akademik');
							$this->session->set_flashdata("save_thn","<div class='alert bg-green alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              Sukses! Data berhasil di Update. </div>");
						}
					?><?php
				}
				else if($st=="tambah")
				{
					$simpan["kd_tahun"] = $this->input->post("kd_tahun");
					if($this->web_app_model->cekKodeMkMax($simpan["kd_tahun"])==0)
					{
						$this->web_app_model->insertData('tbl_thn_ajaran',$simpan);
						?><?php
							{
								header('location:'.base_url().'admin/thn_akademik');
								$this->session->set_flashdata("save_thn","<div class='alert bg-green alert-dismissible' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                Sukses! Data berhasil di simpan. </div>");
							}
						?><?php
					}
					else
					{
						header('location:'.base_url().'admin/thn_akademik');
						$this->session->set_flashdata("save_thn","<div class='alert bg-pink alert-dismissible' role='alert'>
          	<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          	Gagal! Maaf terjadi kesalahan data tidak berhasil di simpan </div>");
					}
				}
			}
			else
			{ header('location:'.base_url().'auth'); }
	}

	public function edit_thn()
	{
		$cek 				= $this->session->userdata('logged_in');
		$stts 			= $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['thn_akademik'] = $this->web_app_model->getSelectedData('tbl_thn_ajaran','kd_tahun',$this->uri->segment(3));
			$this->template->load('template','admin/thn_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_tahun()
	{
		$cek 		= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id 		= $this->uri->segment(3);
			$hapus 	= array('kd_tahun'=>$id);

			$this->web_app_model->deleteData('tbl_thn_ajaran',$hapus);
			{
				header('location:'.base_url().'admin/thn_akademik');
				$this->session->set_flashdata("hapus_thn","<div class='alert bg-green alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				Sukses! Data berhasil di Hapus. </div>");
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function fakultas()
	{
		$cek  			= $this->session->userdata('logged_in');
		$stts 			= $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['dosen'] 		= $this->web_app_model->getAllData('tbl_dosen');
			$bc['fakultas'] = $this->web_app_model->getAllData('tbl_fakultas');
			$this->template->load('template','admin/fakultas_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_fakultas()
	{
		$cek 		= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin')
			{
				$st = $this->input->post("stts");

				$simpan["nama_fakultas"]= $this->input->post("nama_fakultas");
				$simpan["status"] 			= $this->input->post("status");
				$simpan["dekan"] 				= $this->input->post("kd_dosen");

				if($st=="edit")
				{
					$kd_fakultas	= $this->input->post('kd_fakultas');
					$where				= array('kd_fakultas'=>$kd_fakultas);
					$this->web_app_model->updateDataMultiField("tbl_fakultas",$simpan,$where);
					?><?php
						{
							header('location:'.base_url().'admin/fakultas');
							$this->session->set_flashdata("save_fakultas","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              Sukses! Data berhasil di Update. </div>");
						}
					?><?php
				}
				else if($st=="tambah")
				{
					$simpan["kd_fakultas"] = $this->input->post("kd_fakultas");
					if($this->web_app_model->cekKodeMkMax($simpan["kd_fakultas"])==0)
					{
						$this->web_app_model->insertData('tbl_fakultas',$simpan);
						?><?php
						{
							header('location:'.base_url().'admin/fakultas');
							$this->session->set_flashdata("save_fakultas","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              Sukses! Data berhasil di simpan. </div>");
						}
						?><?php
					}
					else
					{
						header('location:'.base_url().'admin/fakultas');
						$this->session->set_flashdata("save_fakultas","<div class='alert bg-pink alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Gagal! Maaf terjadi kesalahan data tidak berhasil di simpan </div>");
					}
				}
			}
			else
			{ header('location:'.base_url().'auth'); }
	}

	public function edit_fakultas()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['dosen'] 		= $this->web_app_model->getAllData('tbl_dosen');
			$bc['fakultas'] = $this->web_app_model->getSelectedData('tbl_fakultas','kd_fakultas',$this->uri->segment(3));
			$this->template->load('template','admin/fakultas_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_fakultas()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id 		= $this->uri->segment(3);
			$hapus 	= array('kd_fakultas'=>$id);
			$hapus2 = array('kd_prodi'=>$id);

			$this->web_app_model->deleteData('tbl_fakultas',$hapus);
			$this->web_app_model->deleteData('tbl_prodi',$hapus2);
			{
				header('location:'.base_url().'admin/fakultas');
				$this->session->set_flashdata("hapus_fakultas","<div class='alert bg-green alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				Sukses! Data berhasil di Hapus. </div>");
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function prodi()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
		  $bc['fakultas'] = $this->web_app_model->getAllData('tbl_fakultas');
			$bc['prodi']		= $this->web_app_model->getProdi();
			$this->template->load('template','admin/prodi_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_prodi()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin')
			{
				$st = $this->input->post("stts");

				$simpan["nama_prodi"]	= $this->input->post("nama_prodi");
				$simpan["kd_fakultas"]= $this->input->post("kd_fakultas");
				$simpan["status"]			= $this->input->post("status");
				$simpan["kaprodi"] 		= $this->input->post("kd_dosen");
				$simpan["kd_staf"] 		= $this->input->post("kd_staf");

				if($st=="edit")
				{
					$kd_prodi	= $this->input->post('kd_prodi');
					$where		= array('kd_prodi'=>$kd_prodi);
					$this->web_app_model->updateDataMultiField("tbl_prodi",$simpan,$where);
					?><?php
						{
							header('location:'.base_url().'admin/prodi');
							$this->session->set_flashdata("save_prodi","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              Sukses! Data berhasil di Update. </div>");
						}
					?><?php
				}
				else if($st=="tambah")
				{
					$simpan["kd_prodi"]	= $this->input->post("kd_prodi");
					if($this->web_app_model->cekKodeMkMax($simpan["kd_prodi"])==0)
					{
						$this->web_app_model->insertData('tbl_prodi',$simpan);
						?><?php
						{
							header('location:'.base_url().'admin/prodi');
							$this->session->set_flashdata("save_prodi","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              Sukses! Data berhasil di simpan. </div>");
						}
						?><?php
					}
					else
					{
						header('location:'.base_url().'admin/prodi');
						$this->session->set_flashdata("save_prodi","<div class='alert bg-pink alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Gagal! Maaf terjadi kesalahan data tidak berhasil di simpan </div>");
					}
				}
			}
			else
			{ header('location:'.base_url().'auth'); }
	}

	public function edit_prodi()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['dosen'] 		= $this->web_app_model->getAllData('tbl_dosen');
			$bc['staf'] 		= $this->web_app_model->getAllData('tbl_staf');
			$bc['fakultas'] = $this->web_app_model->getAllData('tbl_fakultas');
			$bc['prodi'] 		= $this->web_app_model->getSelectedData('tbl_prodi','kd_prodi',$this->uri->segment(3));
			$this->template->load('template','admin/prodi_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_prodi()
	{
		$cek 		= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id			= $this->uri->segment(3);
			$hapus 	= array('kd_prodi'=>$id);
			$hapus2 = array('nim'=>$id);
			$hapus3 = array('kd_dosen'=>$id);
			$hapus4 = array('kd_jadwal'=>$id);
			$hapus5 = array('kd_mk'=>$id);
			$hapus6 = array('kd_staf'=>$id);
			$hapus7 = array('judul'=>$id);

			$this->web_app_model->deleteData('tbl_prodi',$hapus);
			$this->web_app_model->deleteData('tbl_mahasiswa',$hapus2);
			$this->web_app_model->deleteData('tbl_dosen',$hapus3);
			$this->web_app_model->deleteData('tbl_jadwal',$hapus4);
			$this->web_app_model->deleteData('tbl_mk',$hapus5);
			$this->web_app_model->deleteData('tbl_staf',$hapus6);
			$this->web_app_model->deleteData('tbl_berita_admin',$hapus7);

			header('location:'.base_url().'admin/prodi');
			?><?php
				{
					header('location:'.base_url().'admin/prodi');
					$this->session->set_flashdata("hapus_prodi","<div class='alert bg-green alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					Sukses! Data berhasil di Hapus. </div>");
				}
			?><?php
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function staf()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['staf'] 	= $this->web_app_model->getStaf('tbl_staf');
			$bc['prodi'] 	= $this->web_app_model->getAllData('tbl_prodi');
			$this->template->load('template','admin/staf_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tambah_staf()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['prodi'] 	= $this->web_app_model->getAllData('tbl_prodi');
			$this->template->load('template','admin/staf_tambah',$bc);
		}
		else
		{
			header('location:'.base_url().'auth');
		}
	}

	public function simpan_staf()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin')
			{
				$st = $this->input->post("stts");

				$simpan["nip"] 				= $this->input->post("nip");
				$simpan["nama_staf"]	= $this->input->post("nama_staf");
				$simpan["alamat"] 		= $this->input->post("alamat");
				$simpan["ttl"] 				= $this->input->post("ttl");
				$simpan["jk"] 				= $this->input->post("jk");
				$simpan["hp_staf"] 		= $this->input->post("hp_staf");
				$simpan["email_staf"] = $this->input->post("email_staf");
				$simpan["kd_prodi"] 	= $this->input->post("kd_prodi");

				if($st=="edit")
				{
					$kd_staf	= $this->input->post('kd_staf');
					$where		= array('kd_staf'=>$kd_staf);
					$this->web_app_model->updateDataMultiField("tbl_staf",$simpan,$where);
					?><?php
						{
							header('location:'.base_url().'admin/staf');
							$this->session->set_flashdata("save_staf","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              Sukses! Data berhasil di Update. </div>");
						}
					?><?php
				}
				else if($st=="tambah")
				{
					$simpan["kd_staf"]	= $this->input->post("kd_staf");
					if($this->web_app_model->cekKodeStafMax($simpan["kd_staf"])==0)
					{
						$lg['username'] = $this->input->post("kd_staf");
						$lg['password'] = md5($lg['username']);
						$lg['stts']			= "staf";

						$this->web_app_model->insertData('tbl_login',$lg);
						$this->web_app_model->insertData('tbl_staf',$simpan);
						?><?php
						{
							header('location:'.base_url().'admin/staf');
							$this->session->set_flashdata("save_staf","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              Sukses! Data berhasil di simpan. </div>");
						}
						?><?php
					}
					else
					{
						header('location:'.base_url().'admin/staf');
						$this->session->set_flashdata("save_staf","<div class='alert bg-red alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Gagal! Maaf terjadi kesalahan data tidak berhasil di simpan. </div>");
					}
				}
			}
			else
			{ header('location:'.base_url().'auth'); }
	}

	public function edit_staf()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['prodi'] 	= $this->web_app_model->getAllData('tbl_prodi');
			$bc['staf'] 	= $this->web_app_model->getSelectedData('tbl_staf','kd_staf',$this->uri->segment(3));
			$this->template->load('template','admin/staf_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_staf()
	{
		$cek	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id 		= $this->uri->segment(3);
			$hapus	= array('kd_staf'=>$id);
			$hapus2 = array('username'=>$id);

			$this->web_app_model->deleteData('tbl_staf',$hapus);
			$this->web_app_model->deleteData('tbl_login',$hapus2);

			header('location:'.base_url().'admin/staf');
			{
				header('location:'.base_url().'admin/staf');
				$this->session->set_flashdata("save_staf","<div class='alert bg-green alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				Sukses! Data berhasil di Hapus. </div>");
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_staf()
	{
		$cek 		= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['prodi'] 	= $this->web_app_model->getAllData('tbl_prodi');
			$bc['st']			= $this->web_app_model->getProfilStaf('tbl_staf','kd_staf',$this->uri->segment(3));
			$this->template->load('template','admin/profil_staf',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function mahasiswa()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama']			= $this->session->userdata('nama');
			$bc['mahasiswa']= $this->web_app_model->getMhs('tbl_mahasiswa');
			$this->template->load('template','admin/mahasiswa_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_mahasiswa()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['dosen'] 		= $this->web_app_model->getAllData('tbl_dosen');
			$bc['prodi'] 		= $this->web_app_model->getAllData('tbl_prodi');
			$bc['mahasiswa']= $this->web_app_model->getEditMahasiswa($this->uri->segment(3));
			$bc['mhs']			= $this->web_app_model->getProfilMhs('tbl_mahasiswa','nim',$this->uri->segment(3));
			$this->template->load('template','admin/profil_mahasiswa',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function dosen()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['dosen'] 	= $this->web_app_model->getDosen('tbl_dosen');
			$bc['prodi'] 	= $this->web_app_model->getAllData('tbl_prodi');
			$this->template->load('template','admin/dosen_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_dosen()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['dosen'] 	= $this->web_app_model->getAllData('tbl_dosen');
			$bc['prodi'] 	= $this->web_app_model->getAllData('tbl_prodi');
			$bc['dsn']		= $this->web_app_model->getProfilDsn('tbl_dosen','kd_dosen',$this->uri->segment(3));
			$this->template->load('template','admin/profil_dosen',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function dosen_mk()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['mk_dosen'] = $this->web_app_model->getDosenMK($this->uri->segment(3));
			$this->template->load('template','admin/dosen_mk',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function mk()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['mk'] 		= $this->web_app_model->getMk('tbl_mk');
			$bc['mkdu'] 	= $this->web_app_model->getMkdu('tbl_mk',$bc);
			$bc['prodi']	= $this->web_app_model->getAllData('tbl_prodi');

			$this->template->load('template','admin/mk_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_mk()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$st = $this->input->post("stts");

			$simpan["nama_mk"] 		= $this->input->post("nama_mk");
			$simpan["jum_sks"] 		= $this->input->post("jum_sks");
			$simpan["semester"] 	= $this->input->post("semester");
			$simpan["prasyarat"] 	= $this->input->post("prasyarat");
			$simpan["kd_prodi"] 	= $this->input->post("kd_prodi");

			if($st=="edit")
			{
				$kd_mk = $this->input->post('kd_mk');
				$where = array('kd_mk'=>$kd_mk);
				$this->web_app_model->updateDataMultiField("tbl_mk",$simpan,$where);
				?><?php
					{
						header('location:'.base_url().'admin/mk');
						$this->session->set_flashdata("save_mk","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Sukses! Data berhasil di Update. </div>");
					}
				?><?php
			}
			else if($st=="tambah")
			{
				$simpan["kd_mk"] 	= $this->input->post("kd_mk");
				if($this->web_app_model->cekKodeMkMax($simpan["kd_mk"])==0)
				{
					$this->web_app_model->insertData('tbl_mk',$simpan);
					?><?php
					{
						header('location:'.base_url().'admin/mk');
						$this->session->set_flashdata("save_mk","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Sukses! Data berhasil di simpan. </div>");
					}
					?><?php
				}
				else
				{
					header('location:'.base_url().'admin/tambah_mk');
					$this->session->set_flashdata("save_mahasiswa","<div class='alert bg-pink alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					Gagal! Maaf terjadi kesalahan data tidak berhasil di simpan </div>");
				}
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function edit_mk()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['prodi']	= $this->web_app_model->getAllData('tbl_prodi');
			$bc['mk'] 		= $this->web_app_model->getSelectedData('tbl_mk','kd_mk',$this->uri->segment(3));
			$this->template->load('template','admin/mk_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_mk()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id 		= $this->uri->segment(3);
			$hapus	= array('kd_mk'=>$id);
			$this->web_app_model->deleteData('tbl_mk',$hapus);

			header('location:'.base_url().'admin/mk');
			$this->session->set_flashdata("hapus_mkdu","<div class='alert bg-green alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			Sukses! Data mkdu berhasil di hapus. </div>");
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function mk_dosen()
	{
		$cek	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['mk_dosen'] = $this->web_app_model->getMkDosen($this->uri->segment(3));
			$this->template->load('template','admin/mk_dosen',$bc);
		}
		else
		{ header('location:'.base_url().'inedex.php/auth'); }
	}

	public function tampil_jadwal()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['jadwal'] = $this->web_app_model->getSemuaJadwal();
			$this->template->load('template','admin/jadwal_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'inedex.php/auth'); }
	}

	public function peserta()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		$bc['nama'] = $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$d = explode("_",$this->uri->segment(3));
			$bc['peserta']  = $this->web_app_model->getPeserta($d[0],$d[1]);
			$this->template->load('template','admin/peserta_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'inedex.php/auth'); }
	}

	public function nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		$bc['nama'] 	= $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['mhs']		= $this->web_app_model->getDaftarMahasiswa();
			$this->template->load('template','admin/nilai_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function input_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		$bc['nama'] 	= $this->session->userdata('nama');
		if(!empty($cek) && $stts=='admin')
		{
			$nim 			= $this->uri->segment(3);
			$bc['nim']= $this->uri->segment(3);

			$dt_mhs = $this->web_app_model->getSelectedData("tbl_mahasiswa","nim",$nim);
			$bc['prodi_nama']	= $this->web_app_model->getProdi($bc['nim']);
			foreach ($dt_mhs->result() as $dm)
			{
				$bc['nama_mhs'] = $dm->nama_mahasiswa;
				$bc['program'] 	= $dm->kelas_program;
				$bc['prodi']		= $dm->kd_prodi;
				$bc['kd_prodi'] = $dm->kd_prodi;
			}
			$bc['detailfrs']= $this->web_app_model->getDetailKrsPersetujuan($nim,$bc['kd_prodi']);
			$bc['khs'] 			= $this->web_app_model->getNilai($nim);

			$this->template->load('template','admin/nilai_input',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$dl['nim'] 		= $this->uri->segment(3);
			$dl['kd_mk']	= $this->uri->segment(4);

			$this->web_app_model->deleteData('tbl_nilai',$dl);
			header('location:'.base_url().'admin/input_nilai/'.$dl['nim']);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function form_input_nilai()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$nim 			= $this->uri->segment(3);
			$kd_jdw 	= $this->uri->segment(4);
			$cek_smt 	= $this->web_app_model->getSelectedData('tbl_perwalian_header','nim',$nim);
			$bc['smt'] 	= "";
			foreach($cek_smt->result() as $c)
			{
				$bc['smt'] 	= $c->semester;
			}
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['input'] 	= $this->web_app_model->getInputDetailNilai($nim,$kd_jdw);

			$this->template->load('template','admin/nilai_form_input',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_nilai()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$st = $this->input->post("stts");

			if($st=="edit")
			{
				$nim		= $this->input->post('nim');
				$kd_mk 	= $this->input->post('kd_mk');
				$nim 		= $this->uri->segment(3);

				$di['kd_dosen'] 				= $this->input->post('kd_dosen');
				$di['kd_tahun'] 				= $this->input->post('kd_tahun');
				$di['semester_ditempuh']= $this->input->post('semester_ditempuh');
				$di['grade'] 						= $this->input->post('grade');

				$this->web_app_model->updateDataMultiField("tbl_nilai",$di,array('nim'=>$nim, 'kd_mk'=>$kd_mk));
				?><?php
					{
						header('location:'.base_url().'admin/input_nilai/'.$nim.'');
						$this->session->set_flashdata("save_nilai","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Sukses! Data berhasil di simpan. </div>");
					}
				?><?php
			}
			else if($st=="tambah")
			{
				$di['nim']							= $this->input->post('nim');
				$di['kd_mk']						= $this->input->post('kd_mk');
				$di['kd_dosen'] 				= $this->input->post('kd_dosen');
				$di['kd_tahun'] 				= $this->input->post('kd_tahun');
				$di['semester_ditempuh']= $this->input->post('semester_ditempuh');
				$di['grade'] 						= $this->input->post('grade');

				$this->web_app_model->insertData('tbl_nilai',$di);
				?><?php
					{
						header('location:'.base_url().'admin/input_nilai/'.$di['nim'].'');
						$this->session->set_flashdata("save_nilai","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Sukses! Data berhasil di simpan. </div>");
					}
				?><?php
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_admin()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');
		 	$nm =	$bc['username'];

			$bc['dosen'] 	= $this->web_app_model->getAllData('tbl_dosen');
			$bc['prodi'] 	= $this->web_app_model->getAllData('tbl_prodi');
			$bc['ad']			= $this->web_app_model->getSelectedData('tbl_admin','username',$nm,$this->uri->segment(3));

			$this->template->load('template','admin/profil_admin',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function berita()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');

			$bc['berita_stf'] 		= $this->web_app_model->getBeritaStf('tbl_berita_admin');
			$bc['berita_akademik']= $this->web_app_model->getBeritaAkademik('tbl_berita_admin');

			$this->template->load('template','admin/berita_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function lihat_berita()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');
			$bc['berita_akademik']	= $this->web_app_model->vBeritaAkademik('tbl_berita_admin','kode_brt',$this->uri->segment(3));

			$this->template->load('template','admin/berita_lihat',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tambah_berita()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');
			$this->template->load('template','admin/berita_tambah',$bc);
		}
		else
		{
			header('location:'.base_url().'auth');
		}
	}

	public function edit_berita()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');
			$bc['berita'] 	= $this->web_app_model->getSelectedData('tbl_berita_admin','kode_brt',$this->uri->segment(3));
			$this->template->load('template','admin/berita_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_berita()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin')
			{
				$st = $this->input->post("stts");

				$simpan["username"]	= $this->input->post("username");
				$simpan["judul"]		= $this->input->post("judul");
				$simpan["isi"]			= $this->input->post("isi");
				$simpan["tgl"]			= $this->input->post("tgl");
				$simpan["stts_brt"]	= $this->input->post("stts_brt");

				if($st=="edit")
				{
						$kode_brt	= $this->input->post('kode_brt');
						$where		= array('kode_brt'=>$kode_brt);
						$this->web_app_model->updateDataMultiField("tbl_berita_admin",$simpan,$where);
						?> <?php
						 	{
								header('location:'.base_url().'admin/berita');
								$this->session->set_flashdata("save_berita","<div class='alert bg-green alert-dismissible' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								Sukses! Data berita berhasil di Update. </div>");
							}
						?> <?php
				}
				else if($st=="tambah")
				{
					$simpan["kode_brt"]	= $this->input->post("kode_brt");
					{
						$this->web_app_model->insertData('tbl_berita_admin',$simpan);
						?> <?php
						{
							header('location:'.base_url().'admin/berita');
							$this->session->set_flashdata("save_berita","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Sukses! Data berita berhasil di Simpan. </div>");
						}
						?> <?php
					}
						{ header('location:'.base_url().'admin/berita'); }
				}
				}
				else
				{ header('location:'.base_url().'auth'); }
	}

	public function hapus_berita()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id 		= $this->uri->segment(3);
			$hapus	= array('kode_brt'=>$id);
			$this->web_app_model->deleteData('tbl_berita_admin',$hapus);

			header('location:'.base_url().'admin/berita');
			$this->session->set_flashdata("hapus_berita","<div class='alert bg-green alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			Sukses! Data berita berhasil di hapus. </div>");
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function upFileLink()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');

			$bc['uplink'] = $this->web_app_model->getAllData('external_link');
			$bc['upfile'] = $this->web_app_model->getAllData('tbl_login');

			$this->template->load('template','admin/upfilelink_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_link()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='admin')
			{
				$st = $this->input->post("stts");

				$simpan["judul"]	= $this->input->post("judul");
				$simpan["url"]		= $this->input->post("url");
				$simpan["target"]	= $this->input->post("target");

				if($st=="edit")
				{
					$id			= $this->input->post('id');
					$where	= array('id'=>$id);
					$this->web_app_model->updateDataMultiField("external_link",$simpan,$where);
					?> <?php
					{
						header('location:'.base_url().'admin/upFileLink');
						$this->session->set_flashdata("save_link","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Sukses! Data berita berhasil di Update. </div>");
					}
					?> <?php
				}
				else if($st=="tambah")
				{
					$simpan["id"]	= $this->input->post("id");
					{
						$this->web_app_model->insertData('external_link',$simpan);
						?> <?php
						{
							header('location:'.base_url().'admin/link');
							$this->session->set_flashdata("save_link","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Sukses! Data link berhasil di Simpan. </div>");
						}
						?> <?php
					}
						{ header('location:'.base_url().'admin/upFileLink'); }
				}
			}
			else
			{ header('location:'.base_url().'auth'); }
	}

	public function hapus_uplink()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$id 		= $this->uri->segment(3);
			$hapus	= array('id'=>$id);
			$this->web_app_model->deleteData('external_link',$hapus);

			header('location:'.base_url().'admin/upFileLink');
			$this->session->set_flashdata("hapus_uplink","<div class='alert bg-green alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			Sukses! Data link berhasil di hapus. </div>");
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tentang()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$this->template->load('template','admin/tentang',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function kalender()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$this->template->load('template','admin/kalender',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function user_login()
	{
		$cek 		= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['user'] 	= $this->web_app_model->getAllData('tbl_login');
			$this->template->load('template','admin/user_login_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_user()
	{
		$cek 		= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$username 					= $this->input->post('username');
			$password 					= $this->input->post('password');
			$simpan['password'] = md5($password);
			$where 							= array('username'=>$username);
			$this->web_app_model->updateDataMultiField("tbl_login",$simpan,$where);
			?><?php
				{
					header('location:'.base_url().'admin/user_login');
					$this->session->set_flashdata("save_user","<div class='alert bg-green alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          Sukses! Data berhasil di Update. </div>");
				}
			?><?php
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function edit_user()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['user'] 	= $this->web_app_model->getSelectedData('tbl_login','username',$this->uri->segment(3));
			$this->template->load('template','admin/user_login_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function akun()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$this->template->load('template','admin/akun_admin',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_akun()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='admin')
		{
			$username 		= $this->session->userdata('username');
			$pass_lama 		= $this->input->post('pass_lama');
			$pass_baru 		= $this->input->post('pass_baru');
			$ulangi_pass 	= $this->input->post('ulangi_pass');

			$data['username'] 	= $username;
			$data['password'] 	= md5($pass_lama);
			$cek = $this->web_app_model->getSelectedDataMultiple('tbl_login',$data);
			if($cek->num_rows()>0)
			{
				if($pass_baru==$ulangi_pass)
				{
					$simpan['password'] = md5($pass_baru);
					$where = array('username'=>$username);
					$this->web_app_model->updateDataMultiField("tbl_login",$simpan,$where);

					$this->session->set_flashdata("save_akun","<div class='alert bg-green alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          Sukses! Data berhasil di Update. </div>");
					header('location:'.base_url().'admin/index');
				}
				else
				{
					header('location:'.base_url().'admin/index');
					$this->session->set_flashdata("save_mahasiswa","<div class='alert bg-pink alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					Gagal! Maaf terjadi kesalahan password baru yang anda masukan tidak sama data tidak berhasil di simpan </div>");
				}
			}
			else
			{
				$this->session->set_flashdata("save_mahasiswa","<div class='alert bg-pink alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				Gagal! Maaf terjadi kesalahan password lama yang anda masukan salah, data tidak berhasil di simpan </div>");
				header('location:'.base_url().'admin/index');
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

}

/* End of file admin.php */
/* Location: ./application/controller/admin.php */
