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
class Staf extends CI_Controller {

	function __construct()
	  {
	      parent::__construct();
	       $this->load->library('cfpdf');
	  }

	public function index()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['status'] 	= $this->session->userdata('stts');
			$bc['kd_staf'] 	= $this->session->userdata('kd_staf');

			$bc['uplink'] 			= $this->web_app_model->getAllData('external_link');
			$bc['berita']			= $this->web_app_model->getBeritaStf();
			$bc['beritaAkademik']	= $this->web_app_model->getBeritaAkademik();

			$this->template->load('template_staf','staf/dash_staf',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

  public function dosen()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');

      		$bc['dsn']    	= $this->model_staf_prodi->getDosenProdi($bc['kd_staf']);
      		$bc['dsn_wali'] = $this->model_staf_prodi->getWaliProdi($bc['kd_staf']);

			$this->template->load('template_staf','staf/dosen_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tambah_dosen()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');
			$bc['prodi'] 	= $this->web_app_model->getSelectedData('tbl_prodi','kd_staf',$bc['kd_staf']);

			$this->template->load('template_staf','staf/dosen_tambah',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_dosen()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$st = $this->input->post("stts");

				$simpan["nidn"] 				= $this->input->post("nidn");
				$simpan["nama_dosen"] 	= $this->input->post("nama_dosen");
				$simpan["alamat"] 			= $this->input->post("alamat");
				$simpan["ttl"] 					= $this->input->post("ttl");
				$simpan["jk"] 					= $this->input->post("jk");
				$simpan["kd_prodi"] 		= $this->input->post("kd_prodi");
				$simpan["hp_dosen"] 		= $this->input->post("hp_dosen");
				$simpan["email_dsn"] 		= $this->input->post("email_dsn");
				$simpan["nama_PTS1"] 		= $this->input->post("nama_PTS1");
				$simpan["prodiS1"] 			= $this->input->post("prodiS1");
				$simpan["tahun_lulus1"] = $this->input->post("tahun_lulus1");
				$simpan["alamat_PTS1"]	= $this->input->post("alamat_PTS1");
				$simpan["nama_PTS2"] 		= $this->input->post("nama_PTS2");
				$simpan["prodiS2"] 			= $this->input->post("prodiS2");
				$simpan["tahun_lulus2"] = $this->input->post("tahun_lulus2");
				$simpan["alamat_PTS2"] 	= $this->input->post("alamat_PTS2");

			if($st=="edit")
			{
				$kd_dosen = $this->input->post('kd_dosen');
				$where 		= array('kd_dosen'=>$kd_dosen);
				$this->web_app_model->updateDataMultiField("tbl_dosen",$simpan,$where);
				?> <?php
				{
					header('location:'.base_url().'staf/dosen');
					$this->session->set_flashdata("save_dosen","<div class='alert bg-green alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					Sukses! Data dosen berhasil di Update. </div>");
				}
				?> <?php
			}
			else if($st=="tambah")
			{
				$simpan["kd_dosen"] 	= $this->input->post("kd_dosen");
				if($this->model_staf_prodi->cekKodeDosenMax($simpan["kd_dosen"])==0)
				{
					$lg['username'] = $this->input->post("kd_dosen");
					$lg['password'] = md5($lg['username']);
					$lg['stts']			= "dosen";

					$this->web_app_model->insertData('tbl_login',$lg);
					$this->web_app_model->insertData('tbl_dosen',$simpan);
					?> <?php
					{
						header('location:'.base_url().'staf/dosen');
						$this->session->set_flashdata("save_dosen","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Sukses! Data dosen berhasil di Simpan. </div>");
					}
					?> <?php
				}
				else
				{
					header('location:'.base_url().'staf/tambah_dosen');
					$this->session->set_flashdata("save_dosen","<div class='alert bg-pink alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          Gagal!! Kode Dosen telah digunakan </div>");
				}
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_wali()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');

		if(!empty($cek) && $stts=='staf')
		{
			$st 						= $this->input->post("stts");
			$simpan["wali"] = $this->input->post("wali");

			$st=="edit";
			$kd_dosen	= $this->input->post('kd_dosen');
			$where		= array('kd_dosen'=>$kd_dosen);

			$this->web_app_model->updateDataMultiField("tbl_dosen",$simpan,$where);
			?> <?php
			{
				header('location:'.base_url().'staf/dosen');
				$this->session->set_flashdata("save_wali","<div class='alert bg-green alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				Sukses! Data wali dosen berhasil di simpan. </div>");
			}
			?> <?php
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function edit_dosen()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');

			$bc['prodi'] 	= $this->web_app_model->getSelectedData('tbl_prodi','kd_staf',$bc['kd_staf']);
			$bc['dosen'] 	= $this->web_app_model->getSelectedData('tbl_dosen','kd_dosen',$this->uri->segment(3));

			$this->template->load('template_staf','staf/dosen_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_dosen()
	{
		$cek	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$id 		= $this->uri->segment(3);
			$hapus	= array('kd_dosen'=>$id);
			$hapus2 = array('username'=>$id);

			$this->web_app_model->deleteData('tbl_dosen',$hapus);
			$this->web_app_model->deleteData('tbl_login',$hapus2);

			header('location:'.base_url().'staf/dosen');
			$this->session->set_flashdata("hapus_dosen","<div class='alert bg-green alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			Sukses! Data dosen berhasil di hapus. </div>");
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_wali()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$id 	= $this->uri->segment(3);
			$data_update	= array('kd_dosen'=>$id);
			$data_update['wali']= '0';

			$this->web_app_model->updateData('tbl_dosen',$data_update,$data_update['kd_dosen'],'kd_dosen');

			header('location:'.base_url().'staf/dosen');
			$this->session->set_flashdata("hapus_wali","<div class='alert bg-green alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			Sukses! Data wali dosen berhasil di hapus. </div>");
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_dosen()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			$bc['dsn']			= $this->web_app_model->getProfilDsn('tbl_dosen','kd_dosen',$this->uri->segment(3));

			$this->template->load('template_staf','staf/profil_dosen',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

  public function dosen_mk()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_staf'] 	= $this->session->userdata('kd_staf');
			$bc['mk_dosen'] = $this->web_app_model->getDosenMK($this->uri->segment(3));

			$this->template->load('template_staf','staf/dosen_mk',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

  public function mahasiswa()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama']		= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');
			$bc['mhs'] 		= $this->model_staf_prodi->getMahasiswaProdi($bc['kd_staf']);

			$this->template->load('template_staf','staf/mahasiswa_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

  public function tambah_mahasiswa()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');

			$bc['dsn']    			= $this->model_staf_prodi->getWaliProdi($bc['kd_staf']);
			$bc['prodi'] 				= $this->web_app_model->getSelectedData('tbl_prodi','kd_staf',$bc['kd_staf']);
			$bc['tahun_ajaran'] = $this->web_app_model->getSelectedData('tbl_thn_ajaran','stts_thn',1);

			$this->template->load('template_staf','staf/mahasiswa_tambah',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_mahasiswa()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
			if(!empty($cek) && $stts=='staf')
			{
				$st = $this->input->post("stts");

				$simpan["nama_mahasiswa"] = $this->input->post("nama_mahasiswa");
				$simpan["alamat"] 				= $this->input->post("alamat");
				$simpan["ttl"] 						= $this->input->post("ttl");
				$simpan["jk"] 						= $this->input->post("jk");
				$simpan["angkatan"] 			= $this->input->post("angkatan");
				$simpan["kd_prodi"] 			= $this->input->post("kd_prodi");
				$simpan["kelas_program"] 	= $this->input->post("kelas_program");
				$simpan["email_mhs"] 			= $this->input->post("email_mhs");
				$simpan["hp_mahasiswa"] 	= $this->input->post("hp_mahasiswa");
				$simpan["stts_aktif"] 		= $this->input->post("stts_aktif");
				$simpan["stts_masuk"] 		= $this->input->post("stts_masuk");
				$simpan["nama_ayah"] 			= $this->input->post("nama_ayah");
				$simpan["nama_ibu"] 			= $this->input->post("nama_ibu");
				$simpan["kerja_ayah"] 		= $this->input->post("kerja_ayah");
				$simpan["kerja_ibu"] 			= $this->input->post("kerja_ibu");
				$simpan["hasil_ayah"] 		= $this->input->post("hasil_ayah");
				$simpan["hasil_ibu"] 			= $this->input->post("hasil_ibu");
				$simpan["alamat_ortu"] 		= $this->input->post("alamat_ortu");
				$simpan["hp_ortu"] 				= $this->input->post("hp_ortu");
				$simpan["email_ortu"] 		= $this->input->post("email_ortu");
				$simpan["nama_sekolah"] 	= $this->input->post("nama_sekolah");
				$simpan["jurusan_sekolah"]= $this->input->post("jurusan_sekolah");
				$simpan["thn_lulus"] 			= $this->input->post("thn_lulus");
				$simpan["alamat_sekolah"] = $this->input->post("alamat_sekolah");
				$simpan["hp_sekolah"] 		= $this->input->post("hp_sekolah");
				$simpan2["kd_dosen"] 			= $this->input->post("kd_dosen");

				if($st=="edit")
				{
					$nim		= $this->input->post('nim');
					$where	= array('nim'=>$nim);
					$this->web_app_model->updateDataMultiField("tbl_mahasiswa",$simpan,$where);
					$this->web_app_model->updateDataMultiField("tbl_dosen_wali",$simpan2,$where);
					?> <?php
					 	{
							header('location:'.base_url().'staf/mahasiswa');
							$this->session->set_flashdata("save_mahasiswa","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Sukses! Data mahasiswa berhasil di Update. </div>");
						}
					?> <?php
				}
				else if($st=="tambah")
				{
					$simpan["nim"]			= $this->input->post("nim");
					$simpan2["nim"] 		= $this->input->post("nim");
					$simpan2["kd_dosen"]= $this->input->post("kd_dosen");
					$simpan3["username"]= $this->input->post("nim");
					$simpan3["password"]= md5($this->input->post("nim"));
					$simpan3["stts"]		= "mahasiswa";
					if($this->model_staf_prodi->cekNimMax($simpan["nim"])==0)
					{
						$this->web_app_model->insertData('tbl_mahasiswa',$simpan);
						$this->web_app_model->insertData('tbl_dosen_wali',$simpan2);
						$this->web_app_model->insertData('tbl_login',$simpan3);
						?> <?php
							{
								header('location:'.base_url().'staf/mahasiswa');
								$this->session->set_flashdata("save_mahasiswa","<div class='alert bg-green alert-dismissible' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								Sukses! Data mahasiswa berhasil di Simpan. </div>");
							}
						?> <?php
					}
					else
					{
						header('location:'.base_url().'staf/mahasiswa');
						$this->session->set_flashdata("save_mahasiswa","<div class='alert bg-pink alert-dismissible' role='alert'>
	          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	          Gagal!! NIM Mahasiswa telah digunakan </div>");
					}
				}
			}
			else
			{ header('location:'.base_url().'auth'); }
	}

	public function hapus_mahasiswa()
	{
		$cek	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$id			= $this->uri->segment(3);
			$hapus	= array('nim'=>$id);
			$hapus2 = array('username'=>$id);

			$this->web_app_model->deleteData('tbl_mahasiswa',$hapus);
			$this->web_app_model->deleteData('tbl_login',$hapus2);
			$this->web_app_model->deleteData('tbl_dosen_wali',$hapus);

			header('location:'.base_url().'staf/mahasiswa');
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function edit_mahasiswa()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');

			$bc['dsn'] = $this->model_staf_prodi->getWaliProdi($bc['kd_staf']);
			$bc['prodi'] 		= $this->web_app_model->getSelectedData('tbl_prodi','kd_staf',$bc['kd_staf']);
			$bc['mahasiswa']= $this->web_app_model->getSelectedData('tbl_mahasiswa','nim',$this->uri->segment(3));

			$this->template->load('template_staf','staf/mahasiswa_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_mahasiswa()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');
			$bc['nim'] 		= $this->session->userdata('nim');

		  $nm =	$bc['nim'];
			$bc['mhs'] = $this->web_app_model->getProfilMhs('tbl_mahasiswa','nim',$this->uri->segment(3));

			$this->template->load('template_staf','staf/profil_mahasiswa',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

  	public function mk()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');

			$bc['prodi'] 	= $this->web_app_model->getSelectedData('tbl_prodi','kd_staf',$bc['kd_staf']);
      $bc['mka']    = $this->model_staf_prodi->getMkProdi($bc['kd_staf']);
			$bc['mkdu'] 	= $this->model_staf_prodi->getMkduProdi($bc['kd_staf']);

			$this->template->load('template_staf','staf/mk_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_mk()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
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
				?> <?php
					{
						header('location:'.base_url().'staf/mk');
						$this->session->set_flashdata("save_mk","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Sukses! Data berhasil di Update. </div>");
					}
				?> <?php
			}
			else if($st=="tambah")
			{
				$simpan["kd_mk"] 	= $this->input->post("kd_mk");
				if($this->web_app_model->cekKodeMkMax($simpan["kd_mk"])==0)
				{
					$this->web_app_model->insertData('tbl_mk',$simpan);
					?> <?php
						{
							header('location:'.base_url().'staf/mk');
							$this->session->set_flashdata("save_mk","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Sukses! Data berhasil di Simpan. </div>");
						}
					?> <?php
				}
				else
				{
					header('location:'.base_url().'staf/mk');
					$this->session->set_flashdata("save_mk","<div class='alert bg-pink alert-dismissible' role='alert'>
	        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        Gagal!! Kode matakuliah telah digunakan </div>");
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
		if(!empty($cek) && $stts=='staf')
		{

			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');

			$bc['prodi']	= $this->web_app_model->getAllData('tbl_prodi');
			$bc['mk'] 		= $this->web_app_model->getSelectedData('tbl_mk','kd_mk',$this->uri->segment(3));

			$this->template->load('template_staf','staf/mk_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_mk()
	{
		$cek	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$id			= $this->uri->segment(3);
			$hapus	= array('kd_mk'=>$id);

			$this->web_app_model->deleteData('tbl_mk',$hapus);
			$this->web_app_model->deleteData('tbl_jadwal',$hapus);

			header('location:'.base_url().'staf/mk');
			$this->session->set_flashdata("hapus_mk","<div class='alert bg-green alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			Sukses! Data berhasil di Hapus. </div>");
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function mk_dosen()
	{
		$cek	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_staf'] 	= $this->session->userdata('kd_staf');
			$bc['mk_dosen'] = $this->web_app_model->getMkDosen($this->uri->segment(3));

			$this->template->load('template_staf','staf/mk_dosen',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

  public function tampil_jadwal()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_staf'] 	= $this->session->userdata('kd_staf');
			$bc['jadwal'] 	= $this->model_staf_prodi->getSemuaJadwalStaf($bc['kd_staf']);

			$this->template->load('template_staf','staf/jadwal_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tambah_jadwal()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_staf'] 	= $this->session->userdata('kd_staf');

			$bc['mata_kuliah']	= $this->model_staf_prodi->getMkProdi($bc['kd_staf']);
			$bc['dsn']    			= $this->model_staf_prodi->getDosenProdi($bc['kd_staf']);
			$bc['prodi'] 				= $this->web_app_model->getSelectedData('tbl_prodi','kd_staf',$bc['kd_staf']);
			$bc['gedung'] 			= $this->web_app_model->getAllData('tbl_gedung');
			$bc['ruang'] 				= $this->web_app_model->getAllData('tbl_ruang_kelas');
			$bc['tahun_ajaran']	= $this->web_app_model->getAllData('tbl_thn_ajaran','stts',1);

			$this->template->load('template_staf','staf/jadwal_tambah',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_jadwal()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='staf')
			{
				$st = $this->input->post("stts");

				$hari			= $this->input->post('hari');
				$mulai 		= ($this->input->post('jam_mulai'));
				$akhir 		= ($this->input->post('jam_akhir'));
				$ruangan 	= ($this->input->post('kd_ruang_kelas'));
				$gedung 	= ($this->input->post('kd_gedung'));
				$jadwal 	= $hari.' / '.$mulai.' - '.$akhir.' / '.$gedung.' / '.$ruangan;

				$simpan["kd_mk"]				= $this->input->post("kd_mk");
				$simpan["kd_dosen"]			= $this->input->post("kd_dosen");
				$simpan["kd_tahun"]			= $this->input->post("kd_tahun");
				$simpan["jadwal"]				= $jadwal;
				$simpan["kapasitas"]		= $this->input->post("kapasitas");
				$simpan["kelas_program"]= $this->input->post("kelas_program");
				$simpan["kd_prodi"]			= $this->input->post("kd_prodi");

				if($st=="edit")
				{
					$kd_jadwal	= $this->input->post('kd_jadwal');
					$where			= array('kd_jadwal'=>$kd_jadwal);

					$this->web_app_model->updateDataMultiField("tbl_jadwal",$simpan,$where);
					?> <?php
					 	{
					 		header('location:'.base_url().'staf/tampil_jadwal');
					 		$this->session->set_flashdata("save_jadwal","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Sukses! Data berhasil di Update. </div>");
					 	}
					?> <?php
				}
				else if($st=="tambah")
				{
					$this->web_app_model->insertData('tbl_jadwal',$simpan);
					?> <?php
						{
							header('location:'.base_url().'staf/tampil_jadwal');
							$this->session->set_flashdata("save_jadwal","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Sukses! Data berhasil di Simpan. </div>");
						}
					?> <?php
				}
			}
			else
				{ header('location:'.base_url().'auth'); }
	}

	public function hapus_jadwal()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$id 		= $this->uri->segment(3);
			$hapus	= array('kd_jadwal'=>$id);
			$hapus2	= array('kd_jadwal'=>$id);

			$this->web_app_model->deleteData('tbl_jadwal',$hapus);
			$this->web_app_model->deleteData('tbl_perwalian_detail',$hapus2);

			header('location:'.base_url().'staf/tampil_jadwal');
			$this->session->set_flashdata("hapus_jadwal","<div class='alert bg-green alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			Sukses! Data berhasil di Hapus. </div>");
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');
			$bc['mhs']			= $this->web_app_model->getDaftarMahasiswa();

			$this->template->load('template_staf','staf/nilai_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function input_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');

			$nim 				= $this->uri->segment(3);
			$bc['nim'] 	= $this->uri->segment(3);

			$dt_mhs 					= $this->web_app_model->getSelectedData("tbl_mahasiswa","nim",$nim);
			$bc['prodi_nama']	= $this->web_app_model->getProdi($bc['nim']);
			foreach ($dt_mhs->result() as $dm)
			{
				$bc['nama_mhs'] = $dm->nama_mahasiswa;
				$bc['program'] 	= $dm->kelas_program;
				$bc['prodi']		= $dm->kd_prodi;
				$bc['kd_prodi'] = $dm->kd_prodi;
			}
			$bc['detailfrs']	= $this->web_app_model->getDetailKrsPersetujuan($nim,$bc['kd_prodi']);
			$bc['khs'] 				= $this->web_app_model->getNilai($nim);

			$this->template->load('template_staf','staf/nilai_input',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$dl['nim'] 		= $this->uri->segment(3);
			$dl['kd_mk']	= $this->uri->segment(4);

			$this->web_app_model->deleteData('tbl_nilai',$dl);
			header('location:'.base_url().'staf/input_nilai/'.$dl['nim']);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function form_input_nilai()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$nim 			= $this->uri->segment(3);
			$kd_jdw 	= $this->uri->segment(4);
			$cek_smt 	= $this->web_app_model->getSelectedData('tbl_perwalian_header','nim',$nim);
			$bc['smt']= "";

			foreach($cek_smt->result() as $c)
			{
				$bc['smt'] 	= $c->semester;
			}

			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');

			$bc['input'] 		= $this->web_app_model->getInputDetailNilai($nim,$kd_jdw);
			$this->template->load('template_staf','staf/nilai_form_input',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_nilai()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$st = $this->input->post("stts");

			if($st=="edit")
			{
				$nim	= $this->input->post('nim');
				$kd_mk= $this->input->post('kd_mk');
				$nim 	= $this->uri->segment(3);

				$di['kd_dosen'] 				= $this->input->post('kd_dosen');
				$di['kd_tahun'] 				= $this->input->post('kd_tahun');
				$di['semester_ditempuh']= $this->input->post('semester_ditempuh');
				$di['grade'] 						= $this->input->post('grade');

				$this->web_app_model->updateDataMultiField("tbl_nilai",$di,array('nim'=>$nim, 'kd_mk'=>$kd_mk));
				?><?php
					{
						header('location:'.base_url().'staf/input_nilai/'.$nim.'');
						$$this->session->set_flashdata("save_nilai","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Sukses! Data berhasil di Simpan. </div>");
					}
				?><?php
			}
			else if($st=="tambah")
			{
				$di['nim']								= $this->input->post('nim');
				$di['kd_mk']							= $this->input->post('kd_mk');
				$di['kd_dosen'] 					= $this->input->post('kd_dosen');
				$di['kd_tahun'] 					= $this->input->post('kd_tahun');
				$di['semester_ditempuh'] 	= $this->input->post('semester_ditempuh');
				$di['grade'] 							= $this->input->post('grade');

				$this->web_app_model->insertData('tbl_nilai',$di);
				?><?php
					{
						header('location:'.base_url().'staf/input_nilai/'.$di['nim'].'');
						$this->session->set_flashdata("save_nilai","<div class='alert bg-green alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						Sukses! Data berhasil di Simpan. </div>");
					}
				?><?php
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function peserta()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$d = explode("_",$this->uri->segment(3));
			$bc ['peserta'] = $this->web_app_model->getPeserta($d[0],$d[1]);

			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');

			$this->template->load('template_staf','staf/peserta_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_staf()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');
		  $nm 			= $bc['kd_staf'];
			$bc['st']	= $this->web_app_model->getProfilStaf('tbl_staf','kd_staf',$nm,$this->uri->segment(3));

			$this->template->load('template_staf','staf/profil_staf',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function akun()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_staf'] 	= $this->session->userdata('kd_staf');

			$this->template->load('template_staf','bg_akun',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_akun()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$username 		= $this->session->userdata('kd_staf');
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

					header('location:'.base_url().'staf');
					$this->session->set_flashdata("save_akun","<div class='alert bg-green alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					Sukses! Anda berhasil mengubah password. </div>");
				}
				else
				{
					header('location:'.base_url().'staf');
					$this->session->set_flashdata("save_akun","<div class='alert bg-pink alert-dismissible' role='alert'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
          Terjadi kesalahan!! Passowrd yang anda masukan tidak sama </div>");
				}
			}
			else
			{
				header('location:'.base_url().'staf');
				$this->session->set_flashdata("save_akun","<div class='alert bg-pink alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        Terjadi kesalahan!! Password lama anda salah, mohon periksa kembali password lama anda. </div>");
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tentang()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_staf'] 	= $this->session->userdata('kd_staf');

			$this->template->load('template_staf','staf/tentang',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function kalender()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_staf'] 	= $this->session->userdata('kd_staf');

			$this->template->load('template_staf','staf/kalender',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function user_login()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');

			$bc['user'] 		= $this->web_app_model->getAllData('tbl_login');
			$this->template->load('template_staf','staf/user_login_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_user()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$username 	= $this->input->post('username');
			$password 	= $this->input->post('password');
			$simpan['password'] = md5($password);
			$where 			= array('username'=>$username);
			$this->web_app_model->updateDataMultiField("tbl_login",$simpan,$where);
			?><?php
				{
					header('location:'.base_url().'staf/user_login');
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
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');
			$bc['user'] 		= $this->web_app_model->getSelectedData('tbl_login','username',$this->uri->segment(3));

			$this->template->load('template_staf','staf/user_login_edit',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

/* MODEL STAF PRODI */
	public function berita()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');

			$bc['berita_mahasiswa'] = $this->model_staf_prodi->getBeritaMhs('tbl_berita');
			$bc['berita_dosen'] 		= $this->model_staf_prodi->getBeritaDsn('tbl_berita');

			$this->template->load('template_staf','staf/berita_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function lihat_berita()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 				= $this->session->userdata('nama');
			$bc['kd_staf'] 			= $this->session->userdata('kd_staf');
			$bc['berita_staf']	= $this->web_app_model->vBeritaStaf('tbl_berita','kode_brt',$this->uri->segment(3));

			$this->template->load('template_staf','staf/berita_lihat',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function lihat_berita_admin()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 				= $this->session->userdata('nama');
			$bc['kd_staf'] 			= $this->session->userdata('kd_staf');
			$bc['berita_admin']	= $this->web_app_model->vBeritaAkademik('tbl_berita_admin','kode_brt',$this->uri->segment(3));

			$this->template->load('template_staf','staf/berita_admin_lihat',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tambah_berita()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_staf']= $this->session->userdata('kd_staf');
			$bc['prodi'] 	= $this->web_app_model->getSelectedData('tbl_prodi','kd_staf',$bc['kd_staf']);

			$this->template->load('template_staf','staf/berita_tambah',$bc);
		}
		else
		{
			header('location:'.base_url().'auth');
		}
	}

	public function simpan_berita()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
			if(!empty($cek) && $stts=='staf')
			{
				$st = $this->input->post("stts");

				$simpan["kd_prodi"]	= $this->input->post("kd_prodi");
				$simpan["kd_staf"]	= $this->input->post("kd_staf");
				$simpan["judul"]		= $this->input->post("judul");
				$simpan["isi"]			= $this->input->post("isi");
				$simpan["tgl"]			= $this->input->post("tgl");
				$simpan["stts_brt"]	= $this->input->post("stts_brt");

				if($st=="edit")
				{
						$kode_brt	= $this->input->post('kode_brt');
						$where		= array('kode_brt'=>$kode_brt);
						$this->web_app_model->updateDataMultiField("tbl_berita",$simpan,$where);
						?> <?php
						 	{
								header('location:'.base_url().'staf/berita');
								$this->session->set_flashdata("save_berita","<div class='alert bg-green alert-dismissible' role='alert'>
								<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								Sukses! Data berhasil di Update. </div>");
							}
						?> <?php
				}
				else if($st=="tambah")
				{
					$simpan["kode_brt"]	= $this->input->post("kode_brt");
					{
						$this->web_app_model->insertData('tbl_berita',$simpan);
						?> <?php
						{
							header('location:'.base_url().'staf/berita');
							$this->session->set_flashdata("save_berita","<div class='alert bg-green alert-dismissible' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							Sukses! Data berhasil di Simpan. </div>");
						}
						?> <?php
					}
					{ header('location:'.base_url().'staf/berita'); }
				}
			}
			else
			{ header('location:'.base_url().'auth'); }
	}

	public function hapus_berita()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='staf')
		{
			$id 		= $this->uri->segment(3);
			$hapus	= array('kode_brt'=>$id);
			$this->web_app_model->deleteData('tbl_berita',$hapus);

			header('location:'.base_url().'staf/berita');
			$this->session->set_flashdata("hapus_berita","<div class='alert bg-green alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			Sukses! Data berita berhasil di hapus. </div>");
		}
		else
		{ header('location:'.base_url().'auth'); }
	}


}

/* End of file staf.php */
/* Location: ./application/controllers/staf.php */
