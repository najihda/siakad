<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">today</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>TABEL JADWAL PERKULIAHAN</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                      <tr>
                        <th>Kode MK</th>
                        <th>Matakuliah</th>
                        <th>SMT</th>
                        <th>SKS</th>
                        <th>Dosen</th>
                        <th>Jadwal</th>
                        <th>Qty</th>
                        <th>P</th>
                        <th>CP</th>
                        <th><?php echo '<a href="'.base_url().'staf/tambah_jadwal"class="btn bg-blue waves-effect">Tambah</a>'; ?></th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php Tampilkan_Mata_Kuliah($jadwal) ;?>
                    </tbody>
                </table>
                NB : P = Peserta (Mahasiswa Registrasi KRS)
                     CP = Calon Perserta (Mahasiswa Belum Registrasi KRS)</br>
                <a target="_blank" href="<?php echo base_url().'cetak/cetakjadwal' ?> " class="btn bg-blue waves-effect" title="Cetak Data">Cetak Data </a>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<?php
function Tampilkan_Mata_Kuliah($jdwl)
{
	$rows=array();
	$index=0;
	$temp='';
	$acuan=0;
	$rowspan=1;
	foreach ($jdwl->result_array() as $value)
	{
		if(($temp=='') || ($value['kd_mk']!=$temp)) {
			$rows[$index] = '<tr>
				<td rowspan="1">'.$value['kd_mk'].'</td>
				<td rowspan="1" id="'.'nama_'.$value['kd_mk'].'">'.$value['nama_mk'].'</td>
				<td align="center" rowspan="1">'.$value['semester'].'</td>
				<td align="center" rowspan="1" id="id'.$value['kd_mk'].'">'.$value['jum_sks'].'</td>';

				$rowspan=1;
				$acuan=$index;
			}else if($value['kd_mk']==$temp) {
				$rows[$index] = '<tr>';
				$rowspan++;
			}

			$rows[$acuan]=str_replace('rowspan="'.($rowspan-1).'"', 'rowspan="'.$rowspan.'"', $rows[$acuan]);
			$peserta = isset($value['Peserta']) ? $value['Peserta']:'0';
			$calonpeserta = isset($value['CalonPeserta']) ? $value['CalonPeserta']:'0';

			$disabled ='';
			if($peserta >= $value['kapasitas'])
				$disabled ='disabled="disabled"';

			$linkpeserta = $peserta;
			if($peserta >0)
			$linkpeserta = '<a href="'.base_url().'staf/peserta/'.$value['kd_jadwal'].'_1
			/" title="Daftar Peserta Mata Kuliah '.$value['nama_mk'].'  -  Dosen '.$value['nama_dosen'].'" rel="example_group" class="btn btn-success btn-xs">'
				.$peserta.'</a>';

			$linkcalonpeserta = $calonpeserta;
			if($calonpeserta >0)
			$linkcalonpeserta = '<a href="'.base_url().'staf/peserta/'.$value['kd_jadwal'].'_0
			/" title="Daftar Calon Peserta Mata Kuliah '.$value['nama_mk'].'  -  Dosen '.$value['nama_dosen'].'" rel="example_group" class="btn btn-info btn-xs">
			'.$calonpeserta.'</a>';

			$rows[$index] .='<td id="'.'cell_'.$value['kd_mk'].'_'.$value['kd_prodi'].'">'.$value['nama_dosen'].'</td>
				<td id="jdwl_'.$value['kd_jadwal'].'">'.$value['jadwal'].'</td>
				<td align="center">'.$value['kapasitas'].'</td>
				<td align="center">'.$linkpeserta.'</td>
				<td align="center">'.$linkcalonpeserta.'</td>
				<td align="center">
				<a href="'.base_url().'staf/hapus_jadwal/'.$value['kd_jadwal'].'"
				onClick=\'return confirm("Anda yakin ingin menghapus data ini...??")\'
				class="btn bg-red btn-circle waves-effect waves-circle waves-float"><i class="material-icons">delete_sweep</i></a>
				</td></tr>';
			$index++;
			$temp=$value['kd_mk'];
	}
	foreach($rows as $row)
	{
		echo str_replace('rowspan="1"', '', $row);
	}
}
?>
