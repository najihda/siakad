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
class Dosen extends CI_Controller {

	public function index()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['status'] 		= $this->session->userdata('stts');
			$bc['kd_dosen']	 	= $this->session->userdata('kd_dosen');

			$bc['uplink'] 			= $this->web_app_model->getAllData('external_link');
			$bc['berita_dosen']			= $this->model_dosen->getBeritaDosen($bc['kd_dosen']);
			$bc['beritaAkademik']	= $this->web_app_model->getBeritaAkademik();

			$this->template->load('template_dosen','dosen/dash_dosen',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function persetujuan()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			$bc['mhs'] = $this->model_dosen->getMahasiswaBimbingan($bc['kd_dosen']);

			$this->template->load('template_dosen','dosen/persetujuan_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function detail_krs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_dosen'] 	= $this->session->userdata('kd_dosen');

			$bc['nim'] 			= $this->uri->segment(3);
			$bc['status'] 		= $this->uri->segment(4);

			$bc['smt_skr'] 		= $this->web_app_model->getSemesterMax($bc['nim']);
			$bc['ipk']	   		= $this->web_app_model->getIpk($bc['nim'],$bc['smt_skr']-1);
			$bc['dosen_wali']	= $this->web_app_model->getDosenWali($bc['nim']);
			$bc['prodi_nama']	= $this->web_app_model->getProdi($bc['nim']);
			$bc['tahun_ajaran']	= $this->web_app_model->getTahunAjaran();

			$bc['beban_studi'] 	= beban_studi($bc['ipk']);

			$dt_mhs = $this->web_app_model->getSelectedData("tbl_mahasiswa","nim",$bc['nim']);
			foreach($dt_mhs->result() as $dm)
			{
				$bc['nama_mhs']		= $dm->nama_mahasiswa;
				$bc['program'] 		= $dm->kelas_program;
				$bc['kd_prodi'] 	= $dm->kd_prodi;
				$bc['prodi_nama']	= $this->web_app_model->getProdis($bc['nim']);
			}
			$bc['detailfrs'] = $this->web_app_model->getDetailKrsPersetujuan($bc['nim'],$bc['kd_prodi']);
			$this->template->load('template_dosen','dosen/detail_krs',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function setuju_krs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$data_update['nim'] 			= $this->input->post('nim');
			$data_update['status'] 			= '1';
			$data_update['tgl_persetujuan'] = date("y-m-d");

			$this->web_app_model->updateData('tbl_perwalian_header',$data_update,$data_update['nim'],'nim');
			echo "<div class='alert bg-green alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Sukses! Kartu Rencana Studi Berhasil Disetujui. </div>";
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function batal_krs()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$data_update['nim'] 			= $this->input->post('nim');
			$data_update['status']			= '0';
			$data_update['tgl_persetujuan'] = date("y-m-d");

			$this->web_app_model->updateData('tbl_perwalian_header',$data_update,$data_update['nim'],'nim');
			echo "<div class='alert bg-green alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            Sukses! Kartu Rencana Studi Berhasil Dibatalkan. </div>";
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_krs()
	{
		$cek	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$id = $this->uri->segment(3);
			$hapus	= array('nim'=>$id);

			$this->web_app_model->deleteData('tbl_perwalian_header',$hapus);

			header('location:'.base_url().'dosen/persetujuan');
		}
		else
		{
			header('location:'.base_url().'auth');
		}
	}

	public function hapus_krs2()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$dt_mentah 			= $this->input->post('id');
			$dt 				= explode("|",$dt_mentah);
			$data['nim'] 		= $dt[0];
			$data['kd_jadwal'] 	= $dt[1];

			$this->web_app_model->deleteData("tbl_perwalian_detail",$data);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function peserta()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$d = explode("_",$this->uri->segment(3));
			$bc ['peserta'] = $this->web_app_model->getPeserta($d[0],$d[1]);

			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');

			$this->template->load('template_dosen','dosen/peserta_tampil',$bc);
		}
		else
		{
			header('location:'.base_url().'auth');
		}
	}

	public function nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			$bc['mhs'] 		= $this->model_dosen->getDaftarMahasiswaNilai($bc['kd_dosen']);

			$this->template->load('template_dosen','dosen/nilai_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function input_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['username'] 	= $this->session->userdata('username');

			$nim = $this->uri->segment(3);
			$bc['nim'] 			= $this->uri->segment(3);

			$dt_mhs 			= $this->web_app_model->getSelectedData("tbl_mahasiswa","nim",$nim);
			$bc['prodi_nama']	= $this->web_app_model->getProdis($bc['nim']);
			foreach ($dt_mhs->result() as $dm)
			{
				$bc['nama_mhs'] = $dm->nama_mahasiswa;
				$bc['program'] 	= $dm->kelas_program;
				$bc['prodi'] 	= $dm->kd_prodi;
				$bc['kd_prodi'] = $dm->kd_prodi;
			}
			$bc['detailfrs']	= $this->web_app_model->getDetailKrsPersetujuan($nim,$bc);
			$bc['khs']			= $this->web_app_model->getNilai($nim);

			$this->template->load('template_dosen','dosen/nilai_input',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function hapus_nilai()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$dl['nim'] 		= $this->uri->segment(3);
			$dl['kd_mk'] 	= $this->uri->segment(4);
			$this->web_app_model->deleteData('tbl_nilai',$dl);

			header('location:'.base_url().'dosen/input_nilai/'.$dl['nim']);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}


	public function form_input_nilai()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$nim 			= $this->uri->segment(3);
			$kd_jdw 		= $this->uri->segment(4);
			$cek_smt 		= $this->web_app_model->getSelectedData('tbl_perwalian_header','nim',$nim);
			$bc['smt']		= "";

			foreach($cek_smt->result() as $c)
			{
				$bc['smt'] 	= $c->semester;
			}
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['username'] = $this->session->userdata('username');
			$bc['input'] 	= $this->web_app_model->getInputDetailNilai($nim,$kd_jdw);

			$this->template->load('template_dosen','dosen/form_input_nilai',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_nilai()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$st = $this->input->post("stts");
			if($st=="edit")
			{
				$nim 	= $this->input->post('nim');
				$kd_mk 	= $this->input->post('kd_mk');

				$di['nim']					= $this->input->post('nim');
				$di['kd_dosen'] 			= $this->input->post('kd_dosen');
				$di['kd_tahun'] 			= $this->input->post('kd_tahun');
				$di['semester_ditempuh'] 	= $this->input->post('semester_ditempuh');
				$di['grade'] 				= $this->input->post('grade');

				$this->web_app_model->updateDataMultiField("tbl_nilai",$di,array('nim'=>$nim, 'kd_mk'=>$kd_mk));
				?> <?php
					{
						header('location:'.base_url().'dosen/input_nilai/'.$di['nim'].'');
						$this->session->set_flashdata("save_nilai","<div class='alert bg-green alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			            Sukses! Data berhasil di Update. </div>");
					}
				?> <?php
			}
			else if($st=="tambah")
			{

				$di['nim'] 				= $this->input->post('nim');
				$di['kd_mk'] 			= $this->input->post('kd_mk');
				$di['kd_dosen'] 		= $this->input->post('kd_dosen');
				$di['kd_tahun'] 		= $this->input->post('kd_tahun');
				$di['semester_ditempuh']= $this->input->post('semester_ditempuh');
				$di['grade'] 			= $this->input->post('grade');

				$this->web_app_model->insertData('tbl_nilai',$di);
				?> <?php
					{
						header('location:'.base_url().'dosen/input_nilai/'.$di['nim'].'');
						$this->session->set_flashdata("save_nilai","<div class='alert bg-green alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			            Sukses!Data berhasil di Simpan. </div>");
					}
				?> <?php
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tampil_jadwal()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');
			$bc['jadwal'] 	= $this->model_dosen->getSemuaJadwalDosen($bc['kd_dosen']);

			$this->template->load('template_dosen','dosen/jadwal_tampil',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function tentang()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');

			$this->template->load('template_dosen','dosen/tentang',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function kalender()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 	= $this->session->userdata('nama');
			$bc['kd_dosen'] = $this->session->userdata('kd_dosen');

			$this->template->load('template_dosen','dosen/kalender',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function profil_dosen()
	{
		$cek = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 		= $this->session->userdata('nama');
			$bc['kd_dosen'] 	= $this->session->userdata('kd_dosen');
		  	$nm =	$bc['kd_dosen'];
			$bc['dsn']			= $this->web_app_model->getProfilDsn('tbl_dosen','kd_dosen',$nm,$this->uri->segment(3));

			$this->template->load('template_dosen','dosen/profil_dosen',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function lihat_berita()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 				= $this->session->userdata('nama');
			$bc['kd_dosen'] 		= $this->session->userdata('kd_dosen');
			$bc['berita_staf']	= $this->web_app_model->vBeritaStaf('tbl_berita','kode_brt',$this->uri->segment(3));

			$this->template->load('template_dosen','dosen/berita_lihat',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function lihat_berita_admin()
	{
		$cek  = $this->session->userdata('logged_in');
		$stts = $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$bc['nama'] 				= $this->session->userdata('nama');
			$bc['kd_dosen'] 		= $this->session->userdata('kd_dosen');
			$bc['berita_admin']	= $this->web_app_model->getBeritaAkademik('tbl_berita_admin','kode_brt',$this->uri->segment(3));

			$this->template->load('template_dosen','dosen/berita_admin_lihat',$bc);
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

	public function simpan_akun()
	{
		$cek 	= $this->session->userdata('logged_in');
		$stts 	= $this->session->userdata('stts');
		if(!empty($cek) && $stts=='dosen')
		{
			$username 			= $this->session->userdata('kd_dosen');
			$pass_lama 			= $this->input->post('pass_lama');
			$pass_baru 			= $this->input->post('pass_baru');
			$ulangi_pass 		= $this->input->post('ulangi_pass');

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
		            Sukses! Anda berhasil mengubah password. </div>");
					header('location:'.base_url().'dosen/index');
				}
				else
				{
					$this->session->set_flashdata("save_akun","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span> </button>
                    <strong>Terjadi kesalahan!</strong> Password baru yang anda masukan tidak sama. </div>");
					header('location:'.base_url().'dosen/index');
				}
			}
			else
			{
				$this->session->set_flashdata("save_akun","<div class='alert alert-danger alert-dismissible fade in' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				<strong>Terjadi kesalahan!</strong> Password lama anda salah, mohon di periksa kembali. </div>");
				header('location:'.base_url().'dosen/index');
			}
		}
		else
		{ header('location:'.base_url().'auth'); }
	}

}

/* End of file dosen.php */
/* Location: ./application/controllers/dosen.php */
