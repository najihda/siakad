<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Model untuk Dosen
*
* @package Siakad Najih
* @link http:www.najih.id
*/
class Model_Dosen extends CI_Model {

  //--------------------------------- MODEL DOSEN ---------------------------------//
  function getDaftarMahasiswaNilai($kd_dosen)
  {
  	$q = $this->db->query("SELECT a.nim, b.nama_mahasiswa,b.angkatan,f.nama_prodi, c.j_sks, b.kd_prodi, b.kelas_program, e.status
  		from tbl_dosen_wali a
  		left join tbl_mahasiswa b on a.nim=b.nim
  		left join tbl_prodi f on b.kd_prodi=f.kd_prodi
  		left join (select k.nim, k.kd_jadwal, SUM(l.jum_sks) as j_sks from tbl_perwalian_detail k
  		left join (select x.kd_jadwal, y.jum_sks from tbl_jadwal x left join tbl_mk y on x.kd_mk=y.kd_mk) as l on k.kd_jadwal=l.kd_jadwal) c on a.nim=c.nim
  		left join tbl_perwalian_header e on a.nim=e.nim
  		where a.kd_dosen='".$kd_dosen."' and e.status=1 group by a.nim");
  	return $q;
  }
  //query untuk mengambil semua jadwal dosen
  function getSemuaJadwalDosen($kd_dosen)
  {
  	return $this->db->query("SELECT
  	a.kd_jadwal,b.nama_mk,b.kd_mk,b.semester,b.jum_sks,a.kapasitas,a.kd_prodi,p.kd_prodi,p.nama_prodi,c.kd_dosen,a.jadwal,d.Peserta,d.CalonPeserta,c.nama_dosen
  	FROM `tbl_jadwal` a
  	left join tbl_prodi p on a.kd_prodi=p.kd_prodi
  	left join tbl_mk b on a.kd_mk=b.kd_mk
  	left join tbl_dosen c on a.kd_dosen=c.kd_dosen
  	left join (SELECT kd_jadwal,detail.kd_prodi,
  	SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta,
  	SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta
  	FROM tbl_perwalian_header
  	LEFT JOIN (select k.kd_jadwal,l.kd_prodi,l.kd_mk,k.nim from tbl_perwalian_detail k left join tbl_jadwal l on k.kd_jadwal=l.kd_jadwal)  as detail
  	ON tbl_perwalian_header.nim = detail.nim group by kd_jadwal) as d on a.kd_jadwal=d.kd_jadwal
  	where a.kd_dosen='".$kd_dosen."' group by a.kd_jadwal");
  }
  // query untuk mengambil data mahasiswa yang diampu oleh dosen beserta jumlah sks yang diambil
  function getMahasiswaBimbingan($kd_dosen) {
  	$q = $this->db->query("SELECT a.nim,b.nama_mahasiswa,b.angkatan,c.j_sks,f.nama_prodi,b.kd_prodi,b.kelas_program,e.status from tbl_dosen_wali a
  	left join tbl_mahasiswa b on a.nim=b.nim left join tbl_prodi f on b.kd_prodi=f.kd_prodi
  	left join (select k.nim,k.kd_jadwal,SUM(l.jum_sks) as j_sks from tbl_perwalian_detail k
  	left join (select x.kd_jadwal, y.jum_sks from tbl_jadwal x left join tbl_mk y on x.kd_mk=y.kd_mk) as l on k.kd_jadwal=l.kd_jadwal) c on a.nim=c.nim
  	left join tbl_perwalian_header e on a.nim=e.nim
  	where a.kd_dosen='".$kd_dosen."' group by a.nim");
  	return $q;
  }
  //query untuk mengambil berita staf untuk dosen
  function getBeritaDosen($kd_dosen)
  {
  	return $this->db->query("SELECT b.kode_brt, p.kd_prodi,d.kd_prodi, b.kd_prodi,b.judul,b.isi,b.tgl,d.kd_dosen
  		FROM tbl_prodi p
  		INNER JOIN tbl_berita b ON b.kd_prodi = p.kd_prodi
  		INNER JOIN tbl_dosen d ON p.kd_prodi = d.kd_prodi
  	where 	d.kd_dosen='".$kd_dosen."' and stts_brt=1 group by b.kode_brt");
  }
  //--------------------------------- #END MODEL DOSEN ---------------------------------//

}

/* End of file model_dosen.php */
/* Location: ./application/model/model_dosen.php */
