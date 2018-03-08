<div class="row clearfix">
  <form name="datafrs" id="datafrs" method="POST" action="<?php echo base_url();?>mahasiswa/simpan_krs">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="info-box bg-purple hover-zoom-effect">
          <div class="icon">
              <i class="material-icons">recent_actors</i>
          </div>
          <div class="content">
              <div class="text">Mahasiswa</div>
              <h4>KARTU RENCANA STUDI</h4>
          </div>
        </div>
        <div class="body">
          <div class="row clearfix">
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>NIM</b> </p>
                            <input value="<?php echo $nim; ?>" name="nim" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>Nama Mahasiswa</b> </p>
                            <input value="<?php echo $nama; ?>" name="nama_mhs" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>Tahun Ajaran</b> </p>
                            <input value="<?php echo $tahun_ajaran; ?>" name="smstr_thn_ajaran" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>Program Studi</b> </p>
                            <input value="<?php echo $prodi_nama; ?>" name="kd_prodi" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>Semester</b> </p>
                            <input value="<?php echo $smt_skr; ?>" name="semester" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>Program</b> </p>
                            <input value="<?php echo $program; ?>" name="program" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>IPK</b> </p>
                            <input value="<?php echo $ipk; ?>" name="ip" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>SKS</b> </p>
                            <input value="<?php echo $beban_studi; ?>" name="beban_study" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12">
                  <div class="form-group form-float">
                      <div class="form-line">
                        <p> <b>Dosen Wali</b> </p>
                            <input value="<?php echo $dosen_wali; ?>" name="dosen_wali" type="text" class="form-control" readonly>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>

    <div class="card">
        <div class="info-box bg-teal hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">recent_actors</i>
            </div>
            <div class="content">
                <div class="text">Mahasiswa</div>
                <h4>FORM KRS MAHASISWA</h4>
            </div>
        </div>
        <div class="body">
          <div class="row clearfix">
            <div id="hasil"></div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                <thead>
                <tr>
                  <th>Kode MK</th>
                  <th>Matakuliah</th>
                  <th>SMT</th>
                  <th>SKS</th>
                  <th>Dosen</th>
                  <th>Jadwal</th>
                  <th>QTY</th>
                  <th>P</th>
                  <th>CP</th>
                    <th>*</th>
                </tr>
                </thead>
                <tbody>
                  <?php Tampilkan_Mata_Kuliah($jadwal); ?>
                </tbody>
                </table>
            </div>
          </div>
          <?php Tampilkan_Detail_Frs($detail_krs);?>
          <button type="submit" name="tombolsimpan" class="btn bg-indigo waves-effect">Simpan Data KRS</button>
        </div>
    </div>

  </div>
  </form>
</div>
<?php
  function Tampilkan_Detail_Frs($frsdetail)
  {
    $valuedetailfrs='';
    $checkboxvalue='';
    $totalsks=0;
    foreach($frsdetail->result_array() as $value){
      if($valuedetailfrs == '')
        $valuedetailfrs .= $value['kd_jadwal'];
      else
        $valuedetailfrs .= "|".$value['kd_jadwal'];
        $checkboxvalue .="document.datafrs.chk_".$value['kd_mk']."_".$value['kd_jadwal'].".checked=true;\n";
        $totalsks += $value['jum_sks'];
    }
    echo '<p class="left">
    <strong>Total Beban Studi yang Akan Ditempuh </strong>
    <input id="idJumlahSKS" name="jumlahsks" value="'.$totalsks.'" type="text" size="2" style="background-color: #fff;" readonly="readonly"/>
    <strong>SKS</strong></p>
    <p><input name="detailfrs" type="hidden" size=100 value="'.$valuedetailfrs.'"/></p>
    <script language="javascript">'.$checkboxvalue.'</script>';
  }

  function Tampilkan_Mata_Kuliah($jdwl)
  {
    $rows=array();
    $index=0;
    $temp='';
    $acuan=0;
    $rowspan=1;
    $id=1;
    foreach ($jdwl->result_array() as $value)
    {
      if(($temp=='') || ($value['kd_mk']!=$temp))
      {
        $rows[$index] = '<tr>
          <td>'.$value['kd_mk'].'</td>
          <td id="'.'nama_'.$value['kd_mk'].'">'.$value['nama_mk'].'</td>
          <td>'.$value['semester'].'</td>
          <td id="id'.$value['kd_mk'].'">'.$value['jum_sks'].'</td>';
        $rowspan=1;
        $acuan=$index;
      }
      else if($value['kd_mk']==$temp)
      {
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
      $linkpeserta = '<button type="button" class="btn btn-success btn-xs">' .$peserta.'</button>';

      $linkcalonpeserta = $calonpeserta;
      if($calonpeserta >0)
      $linkcalonpeserta = '<button type="button" class="btn btn-info btn-xs">'.$calonpeserta.'</button>';

      $rows[$index] .=' <td id="'.'cell_'.$value['kd_mk'].'_'.$value['kd_prodi'].'">'.$value['nama_dosen'].'</td>
                        <td id="jdwl_'.$value['kd_jadwal'].'">'.$value['jadwal'].'</td>
                        <td align="center">'.$value['kapasitas'].'</td>
                        <td align="center">'.$linkpeserta.'</td>
                        <td align="center">'.$linkcalonpeserta.'</td>
                        <td align="center">
                        <input type="checkbox" id="'.$id.'" class="filled-in chk-col-red" name="chk_'.$value['kd_mk'].'_'.$value['kd_jadwal'].'" value="ON"
                        onchange="javascript:PilihMataKuliah(this);" '.$disabled.'/><label for="'.$id.'"></label>
                        </td></tr>';
      $id++;
      $index++;
      $temp=$value['kd_mk'];
    }
    foreach($rows as $row)
    {
      echo str_replace('rowspan="1"', '', $row);
    }
  }
?>
<script src="<?php echo base_url();?>assets/js/js_tambahan/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/js_tambahan/jquery.min.js" type="text/javascript">></script>

<!-- /Input KRS -->
<script languange="javascript">
function PilihMataKuliah(chk) {
  var jumlahSKS=0;
  var checkboxdipilih = chk.name;
  var beban=document.datafrs.beban_study.value;
  var temp=document.datafrs.jumlahsks.value;
  for(i=0 ; i<document.datafrs.length; i++)
  {
    if(document.datafrs[i].value=="ON")
    {
      if(document.datafrs[i].checked==true)
      {
        c1 = checkboxdipilih.split("_");
        c2 = document.datafrs[i].name.split("_");
        g1 = c1[2]+"|"+c1[2];
        g2 = c2[2]+"|"+c2[2];
        if(c1[1]==c2[1])
        {
          if(document.datafrs[i].name !=checkboxdipilih)
            document.datafrs[i].checked=false;
        }
      }
    }
  }

  for(i=0 ; i<document.datafrs.length; i++)
  {
    if(document.datafrs[i].value=="ON")
    {
      if(document.datafrs[i].checked==true)
      {
        parseData= document.datafrs[i].name.split("_");
        idSKS = "id"+parseData[1];
        jumlahSKS +=parseInt(document.getElementById(idSKS).innerHTML);
        if(jumlahSKS > beban) {
          chk.checked=false;
          jumlahSKS = temp;
          alert('Jumlah SKS yang anda ambil tidak boleh lebih dari beban maksimal');
        }
      }
    }
  }

  document.datafrs.jumlahsks.value=jumlahSKS;
  var detailfrs="";
  for(i=0 ; i<document.datafrs.length; i++)
  {
    if(document.datafrs[i].value=="ON")
    {
      parseData= document.datafrs[i].name.split("_");
      if(document.datafrs[i].checked==true)
      {
        if(detailfrs=="")
          detailfrs = parseData[2];
        else
          detailfrs += "|"+parseData[2];
      }
    }
  }
  document.datafrs.detailfrs.value=detailfrs;
  if(parseInt(document.getElementById(idSKS).innerHTML)>0)
    document.datafrs.tombolsimpan.disabled=false;
  else
    document.datafrs.tombolsimpan.disabled=true;
}
</script>
<!-- /Input KRS -->
