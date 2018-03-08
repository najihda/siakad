<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Model untuk Mahasiswa
*
* @package Siakad Najih
* @link http:www.najih.id
*/
class Model_Mahasiswa extends CI_Model {

  //--------------------------------- MODEL MAHASISWA ---------------------------------//
  //query untuk mengambil detail krs mahasiswa
  public function getDetailKrs($nim)
  {
    $q = $this->db->query("SELECT a.nim,hasil.kapasitas,hasil.semester,hasil.kd_prodi,
    hasil.kd_mk,hasil.jum_sks,hasil.kd_jadwal,c.nama_mahasiswa,hasil.nama_mk,hasil.nama_dosen,hasil.jadwal,
    SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta,
    SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta from tbl_perwalian_header a
    left join (select det.kd_prodi,det.semester,det.kapasitas,det.kd_mk,det.jum_sks,det.kd_jadwal,det.nama_mk,det.nama_dosen,det.jadwal,k.nim
    from tbl_perwalian_detail k
    left join (select w.kd_prodi,x.semester,w.kapasitas,x.kd_mk,x.jum_sks,w.kd_jadwal,x.nama_mk,y.nama_dosen,w.jadwal
    from tbl_jadwal w
    left join tbl_mk x on w.kd_mk=x.kd_mk
    left join tbl_dosen y on  w.kd_dosen=y.kd_dosen) as det on k.kd_jadwal=det.kd_jadwal) as hasil on a.nim=hasil.nim
    left join tbl_mahasiswa c on a.nim=c.nim
    where a.nim='".$nim."' group by hasil.kd_jadwal");
    return $q;
  }
  //query jadwal KRS mahasiswa
  function getJadwal($nim,$prodi)
  {
  	return $this->db->query('SELECT
  	a.kd_jadwal,b.nama_mk,b.kd_mk,b.semester,b.jum_sks,a.kapasitas,a.kd_prodi,g.nama_prodi,c.kd_dosen,a.jadwal,d.Peserta,d.CalonPeserta,c.nama_dosen
  	FROM `tbl_jadwal` a
  	left join tbl_mk b on a.kd_mk=b.kd_mk left join tbl_prodi g on a.kd_prodi=g.kd_prodi
  	left join tbl_dosen c on a.kd_dosen=c.kd_dosen left join (SELECT kd_jadwal,detail.kd_prodi,
  	SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta,
  	SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta
  	FROM tbl_perwalian_header
  	LEFT JOIN (select k.kd_jadwal,l.kd_prodi,l.kd_mk,k.nim from tbl_perwalian_detail k left join tbl_jadwal l on k.kd_jadwal=l.kd_jadwal)  as detail ON tbl_perwalian_header.nim = detail.nim
  	group by kd_jadwal) as d on a.kd_jadwal=d.kd_jadwal
  	where a.kd_mk not in (select kd_mk from tbl_nilai where nim="'.$nim.'" AND grade NOT IN("E","T")) and a.kd_prodi="'.$prodi.'"');
  }
  //query untuk menyimpan krs
  function insertKrs($data_head, $data)
  {
  	$this->db->trans_start();
  	$this->db->insert('tbl_perwalian_header',$data_head);
  	foreach($data as $value)
  	{
  		$this->db->insert('tbl_perwalian_detail', $value);
  	}
  	$this->db->trans_complete();
  	if($this->db->trans_status() === FALSE)
  	{
  		echo "Error entry data";
  	}
  }
  //query untuk menghapus data krs lama
  function deleteKrs($nim, $smt)
  {
  	$this->db->trans_start();
  	$tempwhere_head = "(nim='".$nim."') AND (semester='".$smt."')";
  	$tempwhere_detail = "(nim='".$nim."')";
  	$this->db->delete('tbl_perwalian_header',$tempwhere_head);
  	$this->db->delete('tbl_perwalian_detail',$tempwhere_detail);
  	$this->db->trans_complete();
  	if($this->db->trans_status() === FALSE)
  	{
  		echo "Error delete data";
  	}
  }
  //query untuk mengambil semua jadwal sesuai krs mahasiswa
  function getSemuaJadwalMahasiswa($nim)
  {
  	return $this->db->query("SELECT
  	a.kd_jadwal,b.nama_mk,b.kd_mk,b.semester,b.jum_sks,a.kapasitas,m.nim,p.nama_prodi,a.kd_prodi,p.kd_prodi,c.kd_dosen,a.jadwal,d.Peserta,d.CalonPeserta,c.nama_dosen FROM
  	`tbl_jadwal` a
  	left join tbl_prodi p on a.kd_prodi=p.kd_prodi
  	left join tbl_perwalian_detail m on a.kd_jadwal=m.kd_jadwal
  	left join tbl_mk b on a.kd_mk=b.kd_mk
  	left join tbl_dosen c on a.kd_dosen=c.kd_dosen
  	left join (SELECT kd_jadwal,detail.kd_prodi,
  	SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta,
  	SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta
  	FROM tbl_perwalian_header
  	LEFT JOIN (select k.kd_jadwal,l.kd_prodi,l.kd_mk,k.nim from tbl_perwalian_detail k left join tbl_jadwal l on k.kd_jadwal=l.kd_jadwal)  as detail
  	ON tbl_perwalian_header.nim = detail.nim group by kd_jadwal) as d on a.kd_jadwal=d.kd_jadwal
  	where m.nim='".$nim."' group by a.kd_jadwal");
  }
  //query untuk mengambil berita staf untuk mahasiswa
  function getBeritaMahasiswa($nim)
  {
  	return $this->db->query("SELECT b.kode_brt, p.kd_prodi,m.kd_prodi, b.kd_prodi,b.judul,b.isi,b.tgl,m.nim
  		FROM tbl_prodi p
  		INNER JOIN tbl_berita b ON b.kd_prodi = p.kd_prodi
  		INNER JOIN tbl_mahasiswa m ON p.kd_prodi = m.kd_prodi
  	where m.nim='".$nim."' and stts_brt=2 group by b.kode_brt");
  }
  //--------------------------------- #END MODEL MAHASISWA ---------------------------------//

}

/* End of file model_mahasiswa.php */
/* Location: ./application/model/model_mahasiswa.php */
