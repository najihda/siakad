<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller
{
  function __construct()
  {
      parent::__construct();
       $this->load->library('cfpdf');
  }

  function cetakprofil_mahasiswa()
  {
      $pdf = new FPDF('p','mm','A4');
      $pdf->AddPage();
     // head
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(190, 5, 'UNIVERSITAS MUHADI SETIABUDI BREBES', 0, 1, 'C');
     $pdf->SetFont('TIMES','',10);
     $pdf->Cell(190, 5, 'Jalan P.Diponegoro Km2 - Wanasari 5235201 ,Jawa Tengah', 0, 1, 'C');
     $pdf->Cell(190, 5, 'Telp.(022) 6645951 ,Fax(022)6645951', 0, 1, 'C');
     $pdf->Cell(190, 5, 'E-mail : http://www.umus.ac.id', 0, 1, 'C');
     $pdf->Line(11, 31, 200, 31);

     $pdf->Image(base_url().'/assets/images/umus2.png', 10, 10, 20);

     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(1,2,'',0,1);
     $pdf->Cell(190, 5, 'BIODATA MAHASISWA', 0, 1, 'C');
     $pdf->Cell(5, 5,'',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'FAKULTAS',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'PROGRAM STUDI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ANGKATAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NIM',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,'  ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA PRIBADI',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TEMPAT TANGGAL LAHIR',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JENIS KELAMIN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NO TELEPON',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT E-MAIL',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,' ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA ORANG TUA',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA AYAH',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NAMA IBU',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'PEKERJAAN AYAH',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'PEKERJAAN IBU',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'PENGHASILAN AYAH',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'PENGHASILAN IBU',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMA',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NO TELEPON',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,' ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA SEKOLAH ASAL',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA SEKOLAH ASAL',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JURUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TAHUN KELULUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT SEKOLAH',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NO TELEPON',0,0);
     $pdf->Cell(20,7,' : ',0,1);

     $pdf->Output();
  }

  function cetakprofil_dosen()
  {
      $pdf = new FPDF('p','mm','A4');
      $pdf->AddPage();
     // head
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(190, 5, 'UNIVERSITAS MUHADI SETIABUDI BREBES', 0, 1, 'C');
     $pdf->SetFont('TIMES','',10);
     $pdf->Cell(190, 5, 'Jalan P.Diponegoro Km2 - Wanasari 5235201 ,Jawa Tengah', 0, 1, 'C');
     $pdf->Cell(190, 5, 'Telp.(022) 6645951 ,Fax(022)6645951', 0, 1, 'C');
     $pdf->Cell(190, 5, 'E-mail : http://www.umus.ac.id', 0, 1, 'C');
     $pdf->Line(11, 31, 200, 31);

     $pdf->Image(base_url().'/assets/images/umus2.png', 10, 10, 20);

     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(1,2,'',0,1);
     $pdf->Cell(190, 5, 'BIODATA DOSEN', 0, 1, 'C');
     $pdf->Cell(5, 5,'',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'FAKULTAS',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'PROGRAM STUDI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NIDN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,'  ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA PRIBADI',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TEMPAT TANGGAL LAHIR',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JENIS KELAMIN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NO TELEPON',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT E-MAIL',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,' ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI JENJANG S1',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JURUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TAHUN KELULUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,' ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI JENJANG S2',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JURUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TAHUN KELULUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,' ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI JENJANG S3',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JURUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TAHUN KELULUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);

     $pdf->Output();
  }

  function cetakprofil_staf()
  {
      $pdf = new FPDF('p','mm','A4');
      $pdf->AddPage();
     // head
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(190, 5, 'UNIVERSITAS MUHADI SETIABUDI BREBES', 0, 1, 'C');
     $pdf->SetFont('TIMES','',10);
     $pdf->Cell(190, 5, 'Jalan P.Diponegoro Km2 - Wanasari 5235201 ,Jawa Tengah', 0, 1, 'C');
     $pdf->Cell(190, 5, 'Telp.(022) 6645951 ,Fax(022)6645951', 0, 1, 'C');
     $pdf->Cell(190, 5, 'E-mail : http://www.umus.ac.id', 0, 1, 'C');
     $pdf->Line(11, 31, 200, 31);

     $pdf->Image(base_url().'/assets/images/umus2.png', 10, 10, 20);

     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(1,2,'',0,1);
     $pdf->Cell(190, 5, 'BIODATA STAF PRODI', 0, 1, 'C');
     $pdf->Cell(5, 5,'',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'FAKULTAS',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'PROGRAM STUDI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NIP',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,'  ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA PRIBADI',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TEMPAT TANGGAL LAHIR',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JENIS KELAMIN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'NO TELEPON',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT E-MAIL',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,' ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI JENJANG S1',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JURUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TAHUN KELULUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,' ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI JENJANG S2',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JURUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TAHUN KELULUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(20,7,' ',0,1);
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(55,7,'DATA STUDI JENJANG S3',0,1);
     $pdf->SetFont('TIMES','',12);
     $pdf->Cell(55,7,'NAMA INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'JURUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'TAHUN KELULUSAN',0,0);
     $pdf->Cell(20,7,' : ',0,1);
     $pdf->Cell(55,7,'ALAMAT INSTANSI',0,0);
     $pdf->Cell(20,7,' : ',0,1);

     $pdf->Output();
  }

  function cetakmk()
  {
        $mk        =   "SELECT m.kd_mk,m.nama_mk,m.jum_sks,m.semester,p.kd_prodi,p.nama_prodi
                        FROM tbl_prodi p INNER JOIN tbl_mk m ON m.kd_prodi = p.kd_prodi";

    $pdf = new FPDF('l','mm','A4');
    $pdf->AddPage();
     // head
     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(280, 5, 'UNIVERSITAS MUHADI SETIABUDI BREBES', 0, 1, 'C');
     $pdf->SetFont('TIMES','',10);
     $pdf->Cell(280, 5, 'Jalan P.Diponegoro Km2 - Wanasari 5235201 ,Jawa Tengah', 0, 1, 'C');
     $pdf->Cell(280, 5, 'Telp.(022) 6645951 ,Fax(022)6645951', 0, 1, 'C');
     $pdf->Cell(280, 5, 'E-mail : http://www.umus.ac.id', 0, 1, 'C');
     $pdf->Line(11, 31, 285, 31);

     $pdf->Image(base_url().'/assets/images/umus2.png', 80, 10, 20);

     $pdf->SetFont('TIMES','B',12);
     $pdf->Cell(1,2,'',0,1);
     $pdf->Cell(280, 5, 'DATA MATAKULIAH', 0, 1, 'C');
     $pdf->Cell(5, 5,'',0,1);
     $pdf->SetFont('TIMES','B',12);

     // kasi jarak
     $pdf->Cell(3,2,'',0,1);

     $pdf->Cell(20, 7, 'NO', 1, 0,'C');
     $pdf->Cell(30, 7, 'KODE', 1, 0);
     $pdf->Cell(90, 7, 'MATA KULIAH', 1, 0);
     $pdf->Cell(90, 7, 'PRODI', 1, 0);
     $pdf->Cell(25, 7, 'SEMESTER', 1, 0,'C');
     $pdf->Cell(20, 7, 'SKS', 1, 1,'C');

     $pdf->SetFont('times','',12);
     $i=1;
     foreach ($this->db->query($mk)->result() as $r)
     {
        $pdf->Cell(20, 7, $i, 1, 0,'C');
        $pdf->Cell(30, 7, strtoupper($r->kd_mk), 1, 0);
        $pdf->Cell(90, 7, strtoupper($r->nama_mk), 1, 0);
        $pdf->Cell(90, 7, strtoupper($r->nama_prodi), 1, 0);
        $pdf->Cell(25, 7, strtoupper($r->semester), 1, 0,'C');
        $pdf->Cell(20, 7, strtoupper($r->jum_sks), 1, 1,'C');
        $i++;
     }

     $pdf->Cell(15,5,'',0,1);
     $pdf->Cell(15,5,'',0,1);
     // tanda tangan
     $pdf->Cell(95, 5, '', 0, 1);
     $pdf->Cell(230, 15, '', 0, 0);
     $pdf->Cell(25, 5, 'Brebes, 11 Nopember 2017 ', 0, 1,'C');
     $pdf->Cell(230, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'A,n. Rektor ', 0, 1,'C');
     $pdf->Cell(230, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Wakil Rektor I ', 0, 1,'C');
     $pdf->Cell(230, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Dekan Fakultas,', 0, 1,'C');
     $pdf->Cell(95, 10, '', 0, 0);
     $pdf->Cell(25, 10, '', 0, 1);
     $pdf->Cell(230, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Abdul Khamid, S.T,. M.T,', 0, 1,'C');
     $pdf->Output();
  }

  function cetakjadwal()
  {
    $sqlMHS     =   "SELECT p.nama_prodi,f.nama_fakultas,m.nama_mahasiswa,m.nim,m.angkatan
                    FROM tbl_mahasiswa as m, tbl_prodi as p, tbl_fakultas as f
                    WHERE m.kd_prodi=p.kd_prodi and p.kd_fakultas=f.kd_fakultas";
    $m          =  $this->db->query($sqlMHS)->row_array();

    $jdwl       =   "SELECT a.kd_jadwal,b.nama_mk,b.kd_mk,b.semester,b.jum_sks,a.kapasitas,a.kd_prodi,p.nama_prodi,p.kd_prodi,c.kd_dosen,a.jadwal,d.Peserta,d.CalonPeserta,c.nama_dosen
    FROM `tbl_jadwal` a
    left join tbl_prodi p on a.kd_prodi=p.kd_prodi left join tbl_mk b on a.kd_mk=b.kd_mk
    left join tbl_dosen c on a.kd_dosen=c.kd_dosen left join (SELECT kd_jadwal,detail.kd_prodi,
    SUM(CASE status WHEN 1 THEN 1 ELSE 0 END ) AS Peserta,
    SUM(CASE status WHEN 0 THEN 1 ELSE 0 END ) AS CalonPeserta
    FROM tbl_perwalian_header
    LEFT JOIN (select k.kd_jadwal,l.kd_prodi,l.kd_mk,k.nim from tbl_perwalian_detail k left join tbl_jadwal l on k.kd_jadwal=l.kd_jadwal)  as detail
    ON tbl_perwalian_header.nim = detail.nim group by kd_jadwal) as d on a.kd_jadwal=d.kd_jadwal";

      $pdf = new FPDF('l','mm','A4');
      $pdf->AddPage();
     // head
     $pdf->SetFont('courier','B',12);
     $pdf->Cell(280, 5, 'UNIVERSITAS MUHADI SETIABUDI BREBES', 0, 1, 'C');
     $pdf->SetFont('courier','',10);
     $pdf->Cell(280, 5, 'Jalan P.Diponegoro Km2 - Wanasari 5235201 ,Jawa Tengah', 0, 1, 'C');
     $pdf->Cell(280, 5, 'Telp.(022) 6645951 ,Fax(022)6645951', 0, 1, 'C');
     $pdf->Cell(280, 5, 'E-mail : http://www.umus.ac.id', 0, 1, 'C');
     $pdf->Line(15, 31, 280, 31);

     $pdf->Image(base_url().'/assets/images/umus2.png', 70, 10, 20);

     $pdf->SetFont('courier','B',12);
     $pdf->Cell(1,2,'',0,1);
     $pdf->Cell(280, 5, 'JADWAL PERKULIAHAN MAHASISWA', 0, 1, 'C');
     $pdf->Cell(5, 5,'',0,1);
     $pdf->SetFont('courier','B',12);
     // buat tabel disini
     $pdf->SetFont('courier','B',12);

     // kasi jarak
     $pdf->Cell(3,2,'',0,1);

     $pdf->Cell(20, 7, 'KODE', 1, 0);
     $pdf->Cell(75, 7, 'MATA KULIAH', 1, 0);
     $pdf->Cell(65, 7, 'DOSEN', 1, 0);
     $pdf->Cell(15, 7, 'PRODI', 1, 0);
     $pdf->Cell(10, 7, 'SMT', 1, 0,'C');
     $pdf->Cell(10, 7, 'SKS', 1, 0,'C');
     $pdf->Cell(80, 7, 'JADWAL', 1, 1);

     $pdf->SetFont('courier','',12);
     $i=1;
     foreach ($this->db->query($jdwl)->result() as $r)
     {
        $pdf->Cell(20, 7, strtoupper($r->kd_mk), 1, 0);
        $pdf->Cell(75, 7, strtoupper($r->nama_mk), 1, 0);
        $pdf->Cell(65, 7, strtoupper($r->nama_dosen), 1, 0);
        $pdf->Cell(15, 7, strtoupper($r->kd_prodi), 1, 0);
        $pdf->Cell(10, 7, $r->semester, 1, 0,'C');
        $pdf->Cell(10, 7, $r->jum_sks, 1, 0,'C');
        $pdf->Cell(80, 7, $r->jadwal, 1, 1);
     }

     $pdf->Cell(143,5,'',0,0,'R');
     $pdf->Cell(15,5,'',0,1);
     // tanda tangan
     $pdf->Cell(230, 15, '', 0, 0);
     $pdf->Cell(25, 5, 'Brebes, 11 Nopember 2017 ', 0, 1,'C');
     $pdf->Cell(230, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Dekan Fakultas,', 0, 1,'C');
     $pdf->Cell(95, 10, '', 0, 0);
     $pdf->Cell(25, 10, '', 0, 1);
     $pdf->Cell(25, 10, '', 0, 1);
     $pdf->Cell(230, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Abdul Khamid, S.T,. M.T,', 0, 1,'C');
     $pdf->Output();
  }

  function cetakjadwaldosen()
  {
    $bc = $this->session->userdata('kd_dosen');
    $sqlMHS     =   "SELECT p.nama_prodi,f.nama_fakultas,d.nama_dosen,d.kd_dosen
                    FROM tbl_dosen as d, tbl_prodi as p, tbl_fakultas as f
                    WHERE d.kd_prodi=p.kd_prodi and p.kd_fakultas=f.kd_fakultas and d.kd_dosen=$bc";
    $m          =  $this->db->query($sqlMHS)->row_array();

    $jdwl       =   "SELECT
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
        where a.kd_dosen=".$m['kd_dosen']." group by a.kd_jadwal";

      $pdf = new FPDF('l','mm','A4');
      $pdf->AddPage();
     // head
     $pdf->SetFont('courier','B',12);
     $pdf->Cell(280, 5, 'UNIVERSITAS MUHADI SETIABUDI BREBES', 0, 1, 'C');
     $pdf->SetFont('courier','',10);
     $pdf->Cell(280, 5, 'Jalan P.Diponegoro Km2 - Wanasari 5235201 ,Jawa Tengah', 0, 1, 'C');
     $pdf->Cell(280, 5, 'Telp.(022) 6645951 ,Fax(022)6645951', 0, 1, 'C');
     $pdf->Cell(280, 5, 'E-mail : http://www.umus.ac.id', 0, 1, 'C');
     $pdf->Line(15, 31, 280, 31);

     $pdf->Image(base_url().'/assets/images/umus2.png', 70, 10, 20);

     $pdf->SetFont('courier','B',12);
     $pdf->Cell(1,2,'',0,1);
     $pdf->Cell(280, 5, 'JADWAL PERKULIAHAN MAHASISWA', 0, 1, 'C');
     $pdf->Cell(5, 5,'',0,1);
     $pdf->SetFont('courier','B',12);
     // buat tabel disini
     $pdf->SetFont('courier','B',12);

     // kasi jarak
     $pdf->Cell(3,2,'',0,1);

     $pdf->Cell(20, 7, 'KODE', 1, 0);
     $pdf->Cell(75, 7, 'MATA KULIAH', 1, 0);
     $pdf->Cell(65, 7, 'DOSEN', 1, 0);
     $pdf->Cell(15, 7, 'PRODI', 1, 0);
     $pdf->Cell(10, 7, 'SMT', 1, 0,'C');
     $pdf->Cell(10, 7, 'SKS', 1, 0,'C');
     $pdf->Cell(80, 7, 'JADWAL', 1, 1);

     $pdf->SetFont('courier','',12);
     $i=1;
     foreach ($this->db->query($jdwl)->result() as $r)
     {
        $pdf->Cell(20, 7, strtoupper($r->kd_mk), 1, 0);
        $pdf->Cell(75, 7, strtoupper($r->nama_mk), 1, 0);
        $pdf->Cell(65, 7, strtoupper($r->nama_dosen), 1, 0);
        $pdf->Cell(15, 7, strtoupper($r->kd_prodi), 1, 0);
        $pdf->Cell(10, 7, $r->semester, 1, 0,'C');
        $pdf->Cell(10, 7, $r->jum_sks, 1, 0,'C');
        $pdf->Cell(80, 7, $r->jadwal, 1, 1);
     }

     $pdf->Cell(143,5,'',0,0,'R');
     $pdf->Cell(15,5,'',0,1);
     // tanda tangan
     $pdf->Cell(230, 15, '', 0, 0);
     $pdf->Cell(25, 5, 'Brebes, 11 Nopember 2017 ', 0, 1,'C');
     $pdf->Cell(230, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Dekan Fakultas,', 0, 1,'C');
     $pdf->Cell(95, 10, '', 0, 0);
     $pdf->Cell(25, 10, '', 0, 1);
     $pdf->Cell(25, 10, '', 0, 1);
     $pdf->Cell(230, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Abdul Khamid, S.T,. M.T,', 0, 1,'C');
     $pdf->Output();
  }

  function cetakkhs()
  {
    $mhs    =   $this->uri->segment(3);
    $smt    =   $this->uri->segment(4);
    $sqlMHS =   "SELECT p.nama_prodi,f.nama_fakultas,m.nama_mahasiswa,m.nim,m.angkatan,n.semester_ditempuh
                FROM tbl_mahasiswa as m, tbl_prodi as p, tbl_fakultas as f, tbl_nilai as n
                WHERE m.kd_prodi=p.kd_prodi and p.kd_fakultas=f.kd_fakultas and m.nim=$mhs and n.semester_ditempuh=$smt";
    $m      =  $this->db->query($sqlMHS)->row_array();

    $khs    =   "SELECT t_n.kd_dosen, tbl_dosen.nama_dosen,t_n.nim, tbl_mahasiswa.nama_mahasiswa, t_n.kd_mk, t_n.nama_mk, t_n.semester_ditempuh,t_n.jum_sks,
                t_n.grade, tbl_bobot.bobot, (t_n.jum_sks * tbl_bobot.bobot) AS NxH
                FROM (SELECT tbl_nilai.nim, tbl_nilai.kd_dosen, tbl_nilai.kd_mk, tbl_mk.nama_mk, tbl_mk.jum_sks, tbl_nilai.semester_ditempuh, tbl_nilai.grade
                FROM tbl_nilai LEFT JOIN tbl_mk ON tbl_nilai.kd_mk= tbl_mk.kd_mk
                WHERE tbl_nilai.nim = ".$m['nim']." and tbl_nilai.semester_ditempuh = ".$m['semester_ditempuh'].") as t_n
                LEFT JOIN tbl_dosen ON t_n.kd_dosen = tbl_dosen.kd_dosen LEFT JOIN tbl_bobot ON tbl_bobot.nilai = t_n.grade
                LEFT JOIN tbl_mahasiswa ON t_n.nim = tbl_mahasiswa.nim ORDER BY t_n.semester_ditempuh";

      $pdf = new FPDF('p','mm','A4');
      $pdf->AddPage();
     // head
     $pdf->SetFont('courier','B',12);
     $pdf->Cell(190, 5, 'UNIVERSITAS MUHADI SETIABUDI BREBES', 0, 1, 'C');
     $pdf->SetFont('courier','',10);
     $pdf->Cell(190, 5, 'Jalan P.Diponegoro Km2 - Wanasari 5235201 ,Jawa Tengah', 0, 1, 'C');
     $pdf->Cell(190, 5, 'Telp.(022) 6645951 ,Fax(022)6645951', 0, 1, 'C');
     $pdf->Cell(190, 5, 'E-mail : http://www.umus.ac.id', 0, 1, 'C');
     $pdf->Line(11, 31, 200, 31);

     $pdf->Image(base_url().'/assets/images/umus2.png', 25, 10, 20);

     $pdf->SetFont('courier','B',12);
     $pdf->Cell(1,2,'',0,1);
     $pdf->Cell(190, 5, 'KARTU HASIL STUDI MAHASISWA', 0, 1, 'C');
     $pdf->Cell(5, 5,'',0,1);
     $pdf->SetFont('courier','B',9);
     // buat tabel disini
     $pdf->SetFont('courier','',12);

     $pdf->Cell(50,5,'NIM',0,0);
     $pdf->Cell(20,5,' : '.  strtoupper($m['nim']),0,1);
     $pdf->Cell(50,5,'NAMA',0,0);
     $pdf->Cell(20,5,' : '.  strtoupper($m['nama_mahasiswa']),0,1);
     $pdf->Cell(50,5,'FAKULTAS',0,0);
     $pdf->Cell(20,5,' : '.  strtoupper($m['nama_fakultas']),0,1);
     $pdf->Cell(50,5,'PROGRAM STUDI',0,0);
     $pdf->Cell(20,5,' : '.  strtoupper($m['nama_prodi']),0,1);
     $pdf->Cell(50,5,'SEMESTER ',0,0);
     $pdf->Cell(20,5,' : '.  strtoupper($m['semester_ditempuh']),0,1);
     $pdf->Cell(50,5,'ANGKATAN',0,0);
     $pdf->Cell(20,5,' : '.  strtoupper($m['angkatan']),0,1);
     $pdf->Cell(20,5,' ',0,1);

     // kasi jarak
     $pdf->Cell(3,2,'',0,1);

     $pdf->Cell(18, 5, 'Kode', 1, 0);
     $pdf->Cell(73, 5, 'Nama Matakuliah', 1, 0);
     $pdf->Cell(60, 5, 'Nama Dosen', 1, 0);
     $pdf->Cell(10, 5, 'Sks', 1, 0,'C');
     $pdf->Cell(15, 5, 'Grade', 1, 0,'C');
     $pdf->Cell(14, 5, 'Nilai', 1, 1,'C');

     $pdf->SetFont('courier','',12);
     $jum_sks=0;
     $NxH=0;
     $ip=0;
     foreach ($this->db->query($khs)->result() as $r)
     {
        $pdf->Cell(18, 5, strtoupper($r->kd_mk), 1, 0);
        $pdf->Cell(73, 5, strtoupper($r->nama_mk), 1, 0);
        $pdf->Cell(60, 5, strtoupper($r->nama_dosen), 1, 0);
        $pdf->Cell(10, 5, $r->jum_sks, 1, 0,'C');
        $pdf->Cell(15, 5, $r->grade, 1, 0,'C');
        $pdf->Cell(14, 5, $r->NxH, 1, 1,'C');
        $jum_sks=$jum_sks+$r->jum_sks;
        $NxH=$NxH+$r->NxH;
        $ip=round($NxH/$jum_sks, 2);
     }

     $pdf->Cell(143,5,'Jumlah :',0,0,'R');
     $pdf->Cell(25,5,$jum_sks,0,0,'C');
     $pdf->Cell(5,5,'',0,0);
     $pdf->Cell(20,5,$NxH,0,1,'C');
     $pdf->Cell(143,5,'IP :',0,0,'R');
     $pdf->Cell(25,5,''.$ip,0,1,'C');
     $pdf->Cell(143,5,'Index Prestasi Komulatif :',0,0,'R');
     $pdf->Cell(15,5,'',0,1);
     $pdf->Cell(143,5,'Maksimal pengambilan SKS pada semster berikutnya :',0,0,'R');
     $pdf->Cell(15,5,'',0,1);
     // tanda tangan
     $pdf->Cell(95, 5, '', 0, 1);
     $pdf->Cell(150, 15, '', 0, 0);
     $pdf->Cell(25, 5, 'Brebes, 11 Nopember 2017 ', 0, 1,'C');
     $pdf->Cell(150, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'A,n. Rektor ', 0, 1,'C');
     $pdf->Cell(150, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Wakil Rektor I ', 0, 1,'C');
     $pdf->Cell(150, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Dekan Fakultas,', 0, 1,'C');
     $pdf->Cell(95, 10, '', 0, 0);
     $pdf->Cell(25, 10, '', 0, 1);
     $pdf->Cell(25, 10, '', 0, 1);
     $pdf->Cell(150, 5, '', 0, 0);
     $pdf->Cell(25, 5, 'Abdul Khamid, S.T,. M.T,', 0, 1,'C');
     $pdf->Output();
  }


}

/* End of file cetak.php */
/* Location: ./application/controllers/cetak.php */
