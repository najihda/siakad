
<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-deep-purple hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">contact_mail</i>
              </div>
              <div class="content">
                  <div class="text">Mahasiswa</div>
                  <h4>KARTU HASIL STUDI</h4>
              </div>
            </div>
      <?php
        $temp='';
        $rows=array();
        $totalNH=0;
        $totalSKS=0;
        $no=1;
      ?>
      <?php
        foreach($khs->result_array() as $value)
        {
        if($temp=='')
        {
          $rows[]='<div class="body table-responsive">
                <table class="table table-condensed">
            <thead>
              <tr>
                <th>Kode MK</th>
                <th>Matakuliah</th>
                <th>Semester</th>
                <th>SKS</th>
                <th>Nilai</th>
                <th>Bobot</th>
                <th>SKS x Bobot</th>
              </tr>
            <thead>';
          $rows[]='<tbody><tr><td colspan="8"><span class="label label-success">Semester : '.$value['semester_ditempuh'].'</span> <a target="_blank" href="'.base_url().'cetak/cetakkhs/'.$value['nim'].'/'.$value['semester_ditempuh'].' " class="label label-danger" title="Cetak KHS Semester : '.$value['semester_ditempuh'].'"><i class="fa fa-print"></i> Print</a></td></tr>';
          $rows[]='
          <td width=100">'. $value['kd_mk'].'</td>
          <td>'. $value['nama_mk'].'</td>
          <td align="center" width="20">'. $value['semester_ditempuh'].'</td>
          <td align="center" width="10">'. $value['jum_sks'].'&nbsp;</td>
          <td align="center" width="10">'. $value['grade'].'</td>
          <td align="center" width="10">'. $value['bobot'].'</td>
          <td align="center" width=100">'. $value['NxH'].'</td>';
          $totalNH=0;
          $totalSKS=0;
        }
        else if($value['semester_ditempuh']!=$temp)
        {
          $ip = 0;
          if($totalNH !=0)
          $ip = round($totalNH/$totalSKS, 2);
          $rows[]='<tr>
          <td colspan="2"></td>
          <td colspan="2"><strong>Jumlah SKS : '.$totalSKS.'</strong></td>
          <td colspan="4"><strong>IP Semester : '.$ip.'</strong></td></tbody></table></div>';

          $rows[]='<div class="body table-responsive">
                <table class="table table-condensed">
            <thead>
              <tr>
              <th>Kode MK</th>
              <th>Matakuliah</th>
              <th>Semester</th>
              <th>SKS</th>
              <th>Nilai</th>
              <th>Bobot</th>
              <th>SKS x Bobot</th>
              <th>#</th>
              </tr>
            <thead>';
          $rows[]='<tbody><tr><td colspan="8"><span class="label label-success">Semester : '.$value['semester_ditempuh'].'</span> <a target="_blank" href="'.base_url().'cetak/cetakkhs/'.$value['nim'].'/'.$value['semester_ditempuh'].' "class="btn btn-primary btn-xs" title="Cetak KHS Semester : '.$value['semester_ditempuh'].'"><i class="fa fa-print"></i> </a></td></tr>';
          $rows[]='
          <td width=100">'. $value['kd_mk'].'</td>
          <td>'. $value['nama_mk'].'</td>
          <td align="center" width="20">'. $value['semester_ditempuh'].'</td>
          <td align="center" width="10">'. $value['jum_sks'].'&nbsp;</td>
          <td align="center" width="10">'. $value['grade'].'</td>
          <td align="center" width="10">'. $value['bobot'].'</td>
          <td align="center" width=100">'. $value['NxH'].'</td>';
          $totalNH =0;
          $totalSKS=0;
        }
        else
        {
          $rows[]='<tr>
          <td>'. $value['kd_mk'].'</td>
          <td>'. $value['nama_mk'].'</td>
          <td align="center">'. $value['semester_ditempuh'].'</td>
          <td align="center">'. $value['jum_sks'].'</td>
          <td align="center">'. $value['grade'].'</td>
          <td align="center">'. $value['bobot'].'</td>
          <td align="center">'. $value['NxH'].'</td>
          </tr>';
        }
        if($value['grade'] != 'T') {
        $totalNH +=$value['NxH'];
        $totalSKS+=$value['jum_sks'];
        }
        $temp=$value['semester_ditempuh'];
        }
        $ip = 0;
        if($totalNH !=0)
        $ip = round($totalNH/$totalSKS, 2);
        $rows[]='
        <td colspan="2"></td>
        <td colspan="2"><strong>Jumlah SKS : '.$totalSKS.'</span></strong></td>
        <td colspan="4"><strong>IP Semester : '.$ip.'</span></strong></td></tbody></table></div>';

        foreach($rows as $row)
        {
        echo $row;
        }
        ?>
        </div>
    </div>
</div>
<!-- #END# With Material Design Colors -->