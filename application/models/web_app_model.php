<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Model untuk semua
*
* @package Siakad Najih
* @link http:www.najih.id
*/
class Web_App_Model extends CI_Model {
	//query otomatis dari active record Code Igniter
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	public function getAllDataLimited($table,$offset,$limit)
	{
		return $this->db->get($table,$limit,$offset);
	}
	public function getSelectedData($table,$key,$value)
	{
		$this->db->where($key, $value);
		return $this->db->get($table);
	}
	public function getSelectedDataMultiple($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table, $data);
	}
	function updateData($table,$data,$field,$key)
	{
		$this->db->where($key,$field);
		$this->db->update($table,$data);
	}
	function updateDataMultiField($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}

	//model login user
	public function getLoginData($usr,$psw)
	{
		$u = mysql_real_escape_string($usr);
		$p = md5(mysql_real_escape_string($psw));

		$q_cek_login = $this->db->get_where('tbl_login', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach ($q_cek_login->result() as $qck)
			{
				if($qck->stts=='mahasiswa')
				{
					$q_ambil_data = $this->db->get_where('tbl_mahasiswa', array('nim' => $u));
					foreach($q_ambil_data -> result() as $qad)
					{
						$sess_data['logged_in']	= 'yes';
						$sess_data['nim'] 			= $qad->nim;
						$sess_data['nama'] 			= $qad->nama_mahasiswa;
						$sess_data['alamat'] 		= $qad->alamat;
						$sess_data['ttl'] 			= $qad->ttl;
						$sess_data['jk'] 				= $qad->jk;
						$sess_data['angkatan'] 	= $qad->angkatan;
						$sess_data['prodi'] 		= $qad->kd_prodi;
						$sess_data['stts'] 			= 'mahasiswa';
						$sess_data['program'] 	= $qad->kelas_program;
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'mahasiswa');
				}
				else if($qck->stts=='dosen')
				{
					$q_ambil_data = $this->db->get_where('tbl_dosen', array('kd_dosen' => $u));
					foreach($q_ambil_data -> result() as $qad)
					{
						$sess_data['logged_in']	= 'yes';
						$sess_data['kd_dosen'] 	= $qad->kd_dosen;
						$sess_data['nidn'] 			= $qad->nidn;
						$sess_data['nama'] 			= $qad->nama_dosen;
						$sess_data['alamat'] 		= $qad->alamat;
						$sess_data['ttl'] 			= $qad->ttl;
						$sess_data['jk'] 				= $qad->jk;
						$sess_data['kd_prodi'] 	= $qad->kd_prodi;
						$sess_data['stts'] 			= 'dosen';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'dosen');
				}
				else if($qck->stts=='staf')
				{
					$q_ambil_data = $this->db->get_where('tbl_staf', array('kd_staf' => $u));
					foreach($q_ambil_data -> result() as $qad)
					{
						$sess_data['logged_in']	= 'yes';
						$sess_data['kd_staf'] 	= $qad->kd_staf;
						$sess_data['nip'] 			= $qad->nip;
						$sess_data['nama'] 			= $qad->nama_staf;
						$sess_data['alamat'] 		= $qad->alamat;
						$sess_data['ttl'] 			= $qad->ttl;
						$sess_data['jk'] 				= $qad->jk;
						$sess_data['hp_staf'] 	= $qad->hp_staf;
						$sess_data['email_staf']= $qad->email_staf;
						$sess_data['kd_prodi'] 	= $qad->kd_prodi;
						$sess_data['stts'] 			= 'staf';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'staf');
				}
				else if($qck->stts=='admin')
				{
					$q_ambil_data = $this->db->get_where('tbl_admin', array('username' => $u));
					foreach($q_ambil_data -> result() as $qad)
					{
						$sess_data['logged_in']	= 'yes';
						$sess_data['username'] 	= $qad->username;
						$sess_data['nama'] 			= $qad->nama_lengkap;
						$sess_data['stts'] 			= 'admin';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'admin');
				}
			}
		}
			else
			{
				header('location:'.base_url().'');
				$this->session->set_flashdata('info','<div class="alert bg-pink alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                USERNAME ATAU PASSWORD SALAH..!! </div>');
			}
		}

		//query utnuk mengambil tahun ajaran
		public function getTahunAjaran()
		{
			$q= $this->db->query("select keterangan from tbl_thn_ajaran where stts_thn='1'");
			$ket = "";
			foreach ($q->result() as $value)
			{
				$ket = $value->keterangan;
			}
			return $ket;
		}

	//query untuk mengecek kode matakuliah yang sudah ada didalam database
	function cekKodeMkMax($kd)
	{
		$q = $this->db->query("select * from tbl_mk where kd_mk='".$kd."'");
		$hasil=0; if($q->num_rows()>0) {$hasil = 1;} return $hasil;
	}

	//query untuk mengambil nama prodi
	public function getProdis($nim)
	{
		$q = $this->db->query("select nama_prodi from tbl_mahasiswa left join tbl_prodi on tbl_mahasiswa.kd_prodi = tbl_prodi.kd_prodi where tbl_mahasiswa.nim='".$nim."'");
		$nama_prodi="";
		foreach ($q->result() as $value)
		{
			$nama_prodi = $value->nama_prodi;
		}
		return $nama_prodi;
	}

	//query untuk mengambil nama prodi
	public function getProdit($kd_staf)
	{
		$q = $this->db->query("select nama_prodi from tbl_staf left join tbl_prodi on tbl_staf.kd_prodi = tbl_prodi.kd_prodi where tbl_staf.kd_staf='".$kd_staf."'");
		$nama_prodi="";
		foreach ($q->result() as $value)
		{
			$nama_prodi = $value->nama_prodi;
		}
		return $nama_prodi;
	}

		//query admin untuk mengambil dataProdi
		public function getProdi()
		{
			return $this->db->query("SELECT p.kd_prodi,p.nama_prodi,p.`status`, f.kd_fakultas,f.nama_fakultas,p.kaprodi,p.kd_staf
				FROM tbl_prodi p
				INNER JOIN tbl_fakultas f ON p.kd_fakultas = f.kd_fakultas");
		}

		//query admin untuk mengambil nama dekan
		public function getDekan()
		{
			return $this->db->query("SELECT p.nama_prodi,f.nama_fakultas,d.nama_dosen
				FROM tbl_dosen as d, tbl_prodi as p, tbl_fakultas as f
				WHERE d.kd_prodi=p.kd_prodi and p.kd_fakultas=f.kd_fakultas");
		}

		//query untuk melakukan edit data mahasiswa berdasarkan nim
		function getEditMahasiswa($nim)
		{
			return $this->db->query("SELECT a.nim,a.nama_mahasiswa,a.alamat,a.ttl,a.jk,a.kd_prodi,a.kelas_program,b.kd_dosen
				FROM tbl_mahasiswa a
				left join tbl_dosen_wali b on a.nim=b.nim
				where a.nim='".$nim."'");
		}

		//query untuk mengambil mkdu
		public function getMkdu()
		{
			return $this->db->query("SELECT m.kd_mk,m.nama_mk,m.jum_sks,m.semester,p.kd_prodi,p.nama_prodi,m.prasyarat
				FROM tbl_prodi p
				INNER JOIN tbl_mk m ON m.kd_prodi = p.kd_prodi where 	m.prasyarat='1'");
		}

		//query untuk mengambil data profil mhs
		public function getProfilMhs($table,$key,$value)
		{
			$this->db->where($key, $value);
			return $this->db->query("SELECT
				m.nim,m.nama_mahasiswa,m.alamat,m.ttl,m.jk,m.hp_mahasiswa,m.email_mhs,m.angkatan,m.kd_prodi,m.kelas_program,
				m.nama_ayah,m.nama_ibu,m.kerja_ayah,m.kerja_ibu,m.hasil_ayah,m.hasil_ibu,m.alamat_ortu,m.hp_ortu,
				m.nama_sekolah,m.jurusan_sekolah,m.thn_lulus,m.alamat_sekolah,m.hp_sekolah,
				p.kd_prodi,p.nama_prodi
				FROM tbl_mahasiswa m
				INNER JOIN tbl_prodi p ON m.kd_prodi = p.kd_prodi
			where m.nim='".$value."'");
		}
		//query untuk mengambil data profil dosen
		public function getProfilDsn($table,$key,$value)
		{
			$this->db->where($key,$value);
			return $this->db->query("SELECT p.kd_prodi,p.nama_prodi,
				d.kd_dosen,d.nama_dosen,d.kd_prodi,d.nidn,d.alamat,d.ttl,d.jk,d.hp_dosen,D.email_dsn,
				d.nama_PTS1,d.prodiS1,d.tahun_lulus1,d.alamat_PTS1,d.nama_PTS2,d.prodiS2,d.tahun_lulus2,d.alamat_PTS2
				FROM tbl_prodi p
				INNER JOIN tbl_dosen d ON d.kd_prodi = p.kd_prodi
			where d.kd_dosen='".$value."'");
		}

		//query untuk mengambil data profil staf
		public function getProfilStaf($table,$key,$value)
		{
			$this->db->where($key, $value);
			return $this->db->query("SELECT s.kd_staf,s.nip,s.nama_staf,s.alamat,s.ttl,s.jk,s.hp_staf,s.email_staf,s.kd_prodi, p.kd_prodi,p.nama_prodi
				FROM tbl_staf s
				INNER JOIN tbl_prodi p ON s.kd_prodi = p.kd_prodi
			where s.kd_staf='".$value."'");
		}

	//query untuk mengambil daftar matakuliah yang diajarkan oleh dosen
	function getDosenMK($kd)
	{
		return $this->db->query("SELECT a.kd_dosen, a.nama_dosen, b.nama_mk, b.kd_mk,b.jadwal
			FROM tbl_dosen a
			left join (select y.kd_mk,x.kd_dosen, y.nama_mk,x.jadwal
			from tbl_jadwal x left join tbl_mk y on x.kd_mk=y.kd_mk) b on a.kd_dosen=b.kd_dosen
		where a.kd_dosen='".$kd."' and b.kd_mk!=''");
	}

	//query untuk mengambil daftar dosen yang mengajar matakuliah
	function getMkDosen($kd)
	{
		return $this->db->query("SELECT a.kd_mk, a.nama_mk, b.nama_dosen, b.kd_dosen,b.jadwal
			FROM tbl_mk a
			left join (select x.kd_mk,y.kd_dosen, y.nama_dosen,x.jadwal
			from tbl_jadwal x left join tbl_dosen y on x.kd_dosen=y.kd_dosen) b on a.kd_mk=b.kd_mk
		where a.kd_mk='".$kd."' and b.kd_dosen!=''");
	}

//--------------------------------- MODEL ADMIN ---------------------------------//
//query untuk mengecek kode staf yang ada di dalam database
	function cekKodeStafMax($kd)
	{
		$q = $this->db->query("SELECT * from tbl_staf where kd_staf='".$kd."'");
		$hasil = 0; if($q->num_rows()>0) {$hasil = 1;} return $hasil;
	}
//query admin untuk mengambil dataStaf
public function getStaf()
{
	return $this->db->query("SELECT s.kd_staf,s.nama_staf,p.kd_prodi,p.nama_prodi
		FROM tbl_prodi p
		INNER JOIN tbl_staf s ON s.kd_prodi = p.kd_prodi");
}
//query untuk mengambil dataDosen
public function getDosen()
{
	return $this->db->query("SELECT d.kd_dosen,d.nama_dosen,p.kd_prodi,p.nama_prodi
		FROM tbl_prodi p
		INNER JOIN tbl_dosen d ON d.kd_prodi = p.kd_prodi");
}
//query admin untuk mengambil dataMhs
function getMhs()
{
	return $this->db->query("SELECT m.nim,m.nama_mahasiswa,m.angkatan,p.kd_prodi,p.nama_prodi
		FROM tbl_mahasiswa m
		INNER JOIN tbl_prodi p ON m.kd_prodi = p.kd_prodi");
}
//query untuk mengambil mk
public function getMk()
{
	return $this->db->query("SELECT m.kd_mk,m.nama_mk,m.jum_sks,m.semester,p.kd_prodi,p.nama_prodi
		FROM tbl_prodi p
		INNER JOIN tbl_mk m ON m.kd_prodi = p.kd_prodi");
}
//query untuk mengambil semua jadwal admin BAAK
function getSemuaJadwal()
{
	return $this->db->query('SELECT
	a.kd_jadwal,b.nama_mk,b.kd_mk,b.semester,b.jum_sks,a.kapasitas,a.kd_prodi,p.nama_prodi,p.kd_prodi,c.kd_dosen,a.jadwal,d.Peserta,d.CalonPeserta,c.nama_dosen
	FROM `tbl_jadwal` a
	left join tbl_prodi p on a.kd_prodi=p.kd_prodi left join tbl_mk b on a.kd_mk=b.kd_mk
	left join tbl_dosen c on a.kd_dosen=c.kd_dosen left join (SELECT kd_jadwal,detail.kd_prodi,
	SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta,
	SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta
	FROM tbl_perwalian_header
	LEFT JOIN (select k.kd_jadwal,l.kd_prodi,l.kd_mk,k.nim from tbl_perwalian_detail k left join tbl_jadwal l on k.kd_jadwal=l.kd_jadwal)  as detail
	ON tbl_perwalian_header.nim = detail.nim group by kd_jadwal) as d on a.kd_jadwal=d.kd_jadwal');
}
//--------------------------------- #END MODEL ADMIN ---------------------------------//

	//query untuk menampilkan berita staf untuk mahasiswa dan dosen sesuai judul
	public function vBeritaStaf($table,$key,$value)
	{
		$this->db->where($key,$value);
		return $this->db->query("SELECT b.kd_staf, b.judul, b.isi, b.tgl, stts_brt
			FROM tbl_berita b
		where b.kode_brt='".$value."'");
	}

	//query untuk mengambil berita admin untuk staf prodi
	function getBeritaStf()
	{
		return $this->db->query("SELECT b.username, b.kode_brt, b.judul, b.isi, b.tgl, b.stts_brt
			FROM tbl_berita_admin b
		where b.stts_brt=2 group by b.kode_brt");
	}

	//query untuk mengambil berita admin untuk semua user
	function getBeritaAkademik()
	{
		return $this->db->query("SELECT b.username, b.kode_brt, b.judul, b.isi, b.tgl, b.stts_brt
			FROM tbl_berita_admin b
		where b.stts_brt=1 group by b.kode_brt");
	}

	//query untuk menampilkan berita staf untuk mahasiswa dan dosen sesuai judul
	public function vBeritaAkademik($table,$key,$value)
	{
		$this->db->where($key,$value);
		return $this->db->query("SELECT b.username, b.judul, b.isi, b.tgl, stts_brt
			FROM tbl_berita_admin b
		where b.kode_brt='".$value."'");
	}

	//query untuk mengambil peserta kuliah
	function getPeserta($kd_jadwal,$status)
	{
		$q= $this->db->query("select nama_mahasiswa, kd_prodi,tbl_perwalian_detail.nim,status from tbl_perwalian_detail left join tbl_perwalian_header on tbl_perwalian_detail.nim=tbl_perwalian_header.nim left join tbl_mahasiswa on tbl_perwalian_detail.nim=tbl_mahasiswa.nim where kd_jadwal='".$kd_jadwal."' and status='".$status."'");
		return $q;
	}

	//query untuk menampilkan daftar peserta yang akan diinput nilainya
	function getDaftarMahasiswa()
	{
		$q = $this->db->query("SELECT * FROM tbl_perwalian_header a left join tbl_mahasiswa b on a.nim=b.nim left join tbl_dosen_wali c on a.nim=c.nim where a.status='1'");
		return $q;
	}

	//query  untuk mengambil krs untuk disetujui
	function getDetailKrsPersetujuan($nim,$prodi) {
		$q = $this->db->query("SELECT kd_jadwal, kd_mk, nama_mk,b.semester,jum_sks, nama_dosen, kd_dosen, b.kd_prodi,b.jadwal,b.kapasitas,a.nim,Peserta, CalonPeserta, status
			FROM tbl_perwalian_header a
			left join (select det.kd_jadwal,x.nim,det.nama_dosen,det.kd_dosen,det.nama_mk,det.jum_sks,det.kd_mk,det.semester,det.kd_prodi,det.jadwal,det.kapasitas,det.Peserta,det.CalonPeserta
			from tbl_perwalian_detail x
			left join (select k.kd_jadwal,m.nama_dosen,m.kd_dosen,l.nama_mk,l.jum_sks,l.kd_mk,l.semester,k.kd_prodi,k.jadwal,k.kapasitas,d.Peserta,d.CalonPeserta
			from tbl_jadwal k left join tbl_mk l on k.kd_mk=l.kd_mk left join tbl_dosen m on k.kd_dosen=m.kd_dosen
			left join (select o.nim,p.kd_jadwal,
					SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta,
					SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta
			from tbl_perwalian_header o left join tbl_perwalian_detail p on o.nim=p.nim group by p.kd_jadwal) d on k.kd_jadwal=d.kd_jadwal) det on x.kd_jadwal=det.kd_jadwal ) b on a.nim=b.nim
			left join tbl_mahasiswa c on a.nim=c.nim
			where a.nim='".$nim."' and kd_mk NOT IN (select kd_mk from tbl_nilai where nim='".$nim."') group by kd_jadwal");
		return $q;
	}

	//query untuk transkrip nilai
	public function getNilai($nim)
	{
		return $this->db->query('SELECT t_n.nim, tbl_mahasiswa.nama_mahasiswa, t_n.kd_mk, t_n.nama_mk, t_n.semester_ditempuh,
		t_n.jum_sks, t_n.grade, tbl_bobot.bobot, (t_n.jum_sks * tbl_bobot.bobot) AS NxH
		FROM (SELECT tbl_nilai.nim, tbl_nilai.kd_mk, tbl_mk.nama_mk, tbl_mk.jum_sks, tbl_nilai.semester_ditempuh, tbl_nilai.grade
					FROM tbl_nilai LEFT JOIN tbl_mk ON tbl_nilai.kd_mk= tbl_mk.kd_mk
					WHERE tbl_nilai.nim = "'.$nim.'") as t_n
		LEFT JOIN tbl_bobot ON tbl_bobot.nilai = t_n.grade LEFT JOIN tbl_mahasiswa ON t_n.nim = tbl_mahasiswa.nim
		ORDER BY t_n.semester_ditempuh');
	}

	//query untuk mengambil salah satu matakuliah yang akan diinput nilainya
	function getInputDetailNilai($nim,$kd_jadwal)
	{
		$q = $this->db->query("SELECT a.nim, c.nama_mahasiswa, b.kd_mk, b.nama_mk, b.kd_dosen, b.nama_dosen, b.kd_tahun,b.kd_jadwal
			FROM tbl_perwalian_detail a
			left join (select k.kd_jadwal, k.kd_mk, l.nama_mk, k.kd_dosen, m.nama_dosen, k.kd_tahun
			from tbl_jadwal k
			left join tbl_mk l on k.kd_mk=l.kd_mk left join tbl_dosen m on k.kd_dosen=m.kd_dosen) b on a.kd_jadwal=b.kd_jadwal
			left join tbl_mahasiswa c on a.nim=c.nim
			where a.nim='".$nim."' and b.kd_jadwal='".$kd_jadwal."'");
		return $q;
	}

	//query untuk mengambil semester maksimal
	public function getSemesterMax($nim)
	{
		$query = $this->db->query("select max(tbl_nilai.semester_ditempuh) semester_terakhir FROM tbl_nilai WHERE(tbl_nilai.nim='".$nim."')");
		$t='0';
		foreach($query->result() as $value)
		{
			$t= $value->semester_terakhir+1;
		}
		return $t;
	}

	//query untuk mengambil jumlah IPK
	public function getIpk($nim,$smt_terakhir)
	{
		$query = $this->db->query("select round(SUM((tbl_bobot.bobot * tbl_mk.jum_sks))/ SUM(tbl_mk.jum_sks),2) as IPK FROM tbl_nilai left join (tbl_mk,tbl_bobot) ON tbl_nilai.kd_mk=tbl_mk.kd_mk and tbl_bobot.nilai=tbl_nilai.grade WHERE tbl_nilai.nim='".$nim."' AND tbl_nilai.semester_ditempuh='".$smt_terakhir."' AND tbl_nilai.grade NOT IN('T')");
		$ipk=0.0;
		foreach($query->result() as $value)
		{
			$ipk = $value->IPK;
		}
		return $ipk;
	}

	//query untuk mengambil nama dosen utk wali
	public function getDosenWali($nim)
	{
		$q = $this->db->query("select nama_dosen from tbl_dosen_wali left join tbl_dosen on tbl_dosen_wali.kd_dosen = tbl_dosen.kd_dosen where tbl_dosen_wali.nim='".$nim."'");
		$nama_dosen="";
		foreach ($q->result() as $value)
		{
			$nama_dosen = $value->nama_dosen;
		}
		return $nama_dosen;
	}

	//query untuk transkrip nilai
	public function cetak_khs($nim)
	{
		return $this->db->query('SELECT t_n.nim, m.nama_mahasiswa, m.angkatan, m.kelas_program, m.kd_prodi, t_n.kd_mk, t_n.nama_mk, t_n.semester_ditempuh,
		t_n.jum_sks, t_n.grade, tbl_bobot.bobot, (
		t_n.jum_sks * tbl_bobot.bobot) AS NxH FROM
		(SELECT tbl_nilai.nim, tbl_nilai.kd_mk, tbl_mk.nama_mk, tbl_mk.jum_sks, tbl_nilai.semester_ditempuh, tbl_nilai.grade
		FROM tbl_nilai LEFT JOIN tbl_mk ON tbl_nilai.kd_mk= tbl_mk.kd_mk
		WHERE tbl_nilai.nim = "'.$nim.'") as t_n LEFT JOIN tbl_bobot ON tbl_bobot.nilai = t_n.grade LEFT JOIN tbl_mahasiswa m ON t_n.nim = m.nim
		ORDER BY t_n.semester_ditempuh');
	}

}

/* End of file web_app_model.php */
/* Location: ./application/model/web_app_model.php */
