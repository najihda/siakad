<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Model untuk Staf Prodi
*
* @package Siakad Najih
* @link http:www.najih.id
*/
class Model_Staf_Prodi extends CI_Model {

  //--------------------------------- MODEL STAF ---------------------------------//
  //query untuk mengecek kode dosen yang ada di dalam database
  function cekKodeDosenMax($kd)
  {
    $q = $this->db->query("SELECT * from tbl_dosen where kd_dosen='".$kd."'");
    $hasil = 0; if($q->num_rows()>0) { $hasil = 1; } return $hasil;
  }
  //query untuk mengecek nim yang sudah ada di database
  function cekNimMax($nim)
  {
    $q = $this->db->query("select * from tbl_mahasiswa where nim='".$nim."'");
    $hasil = 0; if($q->num_rows()>0) { $hasil = 1; } return $hasil;
  }
  // query untuk mengambil data dosen sesuai program studi
  function getDosenProdi($kd_staf){
  	$q = $this->db->query("SELECT d.kd_dosen,d.nidn,d.nama_dosen,d.alamat,p.kd_prodi,s.kd_staf
  		FROM tbl_dosen d
  		INNER JOIN tbl_prodi p ON p.kd_prodi = d.kd_prodi
  		INNER JOIN tbl_staf s ON p.kd_prodi = s.kd_prodi
  		where s.kd_staf='".$kd_staf."' group by d.kd_dosen");
  	return $q;
  }
  // query untuk mengambil data dosen wali sesuai program studi
  function getWaliProdi($kd_staf){
  	$q = $this->db->query("SELECT d.kd_dosen,d.nidn,d.nama_dosen,d.alamat,p.kd_prodi,s.kd_staf
  		FROM tbl_dosen d
  		INNER JOIN tbl_prodi p ON p.kd_prodi = d.kd_prodi
  		INNER JOIN tbl_staf s ON p.kd_prodi = s.kd_prodi
  		where s.kd_staf='".$kd_staf."' AND wali='1' group by d.kd_dosen");
  	return $q;
  }
  // query untuk mengambil data mahasiswa sesuai program studi
  function getMahasiswaProdi($kd_staf){
  	$q = $this->db->query("SELECT p.kd_prodi,s.kd_staf,m.nim,m.nama_mahasiswa,m.alamat,m.angkatan
  		FROM tbl_prodi p
  		INNER JOIN tbl_staf s ON p.kd_prodi = s.kd_prodi
  		INNER JOIN tbl_mahasiswa m ON p.kd_prodi = m.kd_prodi
  		where s.kd_staf='".$kd_staf."' group by m.nim");
  	return $q;
  }
  // query untuk mengambil data mk sesuai program studi
  function getMkProdi($kd_staf){
  	$q = $this->db->query("SELECT p.kd_prodi,s.kd_staf,m.kd_mk,m.nama_mk,m.jum_sks,m.semester,m.prasyarat
  		FROM tbl_prodi p
  		INNER JOIN tbl_staf s ON p.kd_prodi = s.kd_prodi
  		INNER JOIN tbl_mk m ON p.kd_prodi = m.kd_prodi
  		where s.kd_staf='".$kd_staf."' group by m.kd_mk");
  	return $q;
  }
  // query untuk mengambil data mk sesuai program studi
  function getMkduProdi($kd_staf){
  	$q = $this->db->query("SELECT p.kd_prodi,s.kd_staf,m.kd_mk,m.nama_mk,m.jum_sks,m.semester,m.prasyarat
  		FROM tbl_prodi p
  		INNER JOIN tbl_staf s ON p.kd_prodi = s.kd_prodi
  		INNER JOIN tbl_mk m ON p.kd_prodi = m.kd_prodi
  		where s.kd_staf='".$kd_staf."' and m.prasyarat=1 group by m.kd_mk");
  	return $q;
  }
  //query untuk mengambil semua jadwal staf prodi
  function getSemuaJadwalStaf($kd_staf)
  {
  	return $this->db->query("SELECT
  	a.kd_jadwal,b.nama_mk,b.kd_mk,b.semester,s.kd_staf,b.jum_sks,a.kapasitas,a.kd_prodi,p.kd_prodi,c.kd_dosen,a.jadwal,d.Peserta,d.CalonPeserta,c.nama_dosen
  	FROM `tbl_jadwal` a
  	left join tbl_prodi p on a.kd_prodi=p.kd_prodi left join tbl_staf s on a.kd_prodi=s.kd_prodi
  	left join tbl_mk b on a.kd_mk=b.kd_mk left join tbl_dosen c on a.kd_dosen=c.kd_dosen
  	left join (SELECT kd_jadwal,detail.kd_prodi,
  	SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta,
  	SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta
  	FROM tbl_perwalian_header
  	LEFT JOIN (select k.kd_jadwal,l.kd_prodi,l.kd_mk,k.nim from tbl_perwalian_detail k left join tbl_jadwal l on k.kd_jadwal=l.kd_jadwal)  as detail
  	ON tbl_perwalian_header.nim = detail.nim group by kd_jadwal) as d on a.kd_jadwal=d.kd_jadwal where s.kd_staf='".$kd_staf."' group by a.kd_jadwal");
  }
  //query untuk mengambil berita staf untuk dosen
  function getBeritaDsn()
  {
  	return $this->db->query("SELECT b.kode_brt, b.judul, b.isi, b.tgl, b.stts_brt
  		FROM tbl_berita b
  	where b.stts_brt=1 group by b.kode_brt");
  }
  //query untuk mengambil berita staf untuk mahasiswa
  function getBeritaMhs()
  {
  	return $this->db->query("SELECT b.kode_brt, b.judul, b.isi, b.tgl, b.stts_brt
  		FROM tbl_berita b
  	where b.stts_brt=2 group by b.kode_brt");
  }
  //--------------------------------- #END MODEL STAF ---------------------------------//

}

/* End of file model_staf_prodi.php */
/* Location: ./application/model/model_staf_prodi.php */
