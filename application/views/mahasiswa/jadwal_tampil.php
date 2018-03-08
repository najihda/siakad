<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">event_note</i>
              </div>
              <div class="content">
                  <div class="text">Mahasiswa</div>
                  <h4>TABEL JADWAL KULIAH</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Kode MK</th>
				            <th>Matakuliah</th>
				            <th width="10">SMT</th>
				            <th width="10">SKS</th>
				            <th>Dosen</th>
				            <th>Jadwal</th>
				            <th width="10">QTY</th>
				            <th width="10">P</th>
				            <th width="10">CP</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php Tampilkan_Mata_Kuliah($jadwal) ;?>
                    </tbody>
                </table>
                <a target="_blank" href="<?php echo base_url().'cetak/cetakjadwal' ?> " class="btn bg-blue waves-effect" title="Cetak Data">Cetak Data </a>
            </div>
        </div>
    </div>
</div>
<!-- #END# With Material Design Colors -->
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
				<td align="center" rowspan="1">'.$value['kd_mk'].'</td>
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
			$linkpeserta = '<a href="'.base_url().'mahasiswa/peserta/'.$value['kd_jadwal'].'_1
			/" data-toggle="tooltip" data-placement="left" title="Daftar Peserta Mata Kuliah '.$value['nama_mk'].'  -  Dosen '.$value['nama_dosen'].'" rel="example_group" class="btn btn-success btn-xs">
			'.$peserta.'</a>';

			$linkcalonpeserta = $calonpeserta;
			if($calonpeserta >0)
			$linkcalonpeserta = '<a href="'.base_url().'mahasiswa/peserta/'.$value['kd_jadwal'].'_0
			/" data-toggle="tooltip" data-placement="left" title="Daftar Calon Peserta Mata Kuliah '.$value['nama_mk'].'  -  Dosen '.$value['nama_dosen'].'" rel="example_group" class="btn btn-info btn-xs">
			'.$calonpeserta.'</a>';

			$rows[$index] .='<td id="'.'cell_'.$value['kd_mk'].'_'.$value['kd_prodi'].'">'.$value['nama_dosen'].'</td>
				<td align="center" id="jdwl_'.$value['kd_jadwal'].'">'.$value['jadwal'].'</td>
				<td align="center">'.$value['kapasitas'].'</td>
				<td align="center">'.$linkpeserta.'</td>
				<td align="center">'.$linkcalonpeserta.'</td>
        </tr>';
			$index++;
			$temp=$value['kd_mk'];
	}
	foreach($rows as $row)
	{
		echo str_replace('rowspan="1"', '', $row);
	}
}
?>
