<div class="row clearfix">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="info-box bg-deep-purple hover-zoom-effect">
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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                        <p> <b>Angkatan</b> </p>
                            <input value="<?php echo $tahun_ajaran; ?>" name="smstr_thn_ajaran" type="text" class="form-control" readonly>
                      </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
    </div>
</div>
<div class="row clearfix">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="info-box bg-purple hover-zoom-effect">
          <div class="icon">
              <i class="material-icons">recent_actors</i>
          </div>
          <div class="content">
              <div class="text">Mahasiswa</div>
              <h4>DETAIL KARTU RENCANA STUDI</h4>
          </div>
        </div>
                <div class="body table-responsive">
                  <table class="table table-condensed">
                    <thead>
                      <th>Kode MK</th>
                      <th>Matakuliah</th>
                      <th>SMT</th>
                      <th>SKS</th>
                      <th>Dosen</th>
                      <th>Jadwal</th>
                      <th>QTY</th>
                      <th>P</th>
                      <th>CP</th>
                    </thead>
                    <tbody>
                      <?php
                    $state_app = 0;
                    $no=1;
                    $tot_sks = 0;
                    foreach ($detailfrs->result_array() as $value)
                    {
                    $tot_sks += $value['jum_sks'];
                    if($value['kapasitas']==$value['Peserta'])
                    {
                      $state_app++;
                      $color ="red";
                    }
                    else
                    {
                      $color ="";
                    }
                    echo '<tr bgcolor="'.$color.'" class="content">
                          <td>'.$value['kd_mk'].'</td>
                          <td>'.$value['nama_mk'].'</td>
                          <td>'.$value['semester'].'</td>
                          <td>'.$value['jum_sks'].'</td>';

                    echo '<td>'.$value['nama_dosen'].'</td>
                          <td>'.$value['jadwal'].'</td>
                          <td>'.$value['kapasitas'].'</td>
                          <td>'.$value['Peserta'].'</td>
                          <td>'.$value['CalonPeserta'].'</td>';
                    }
                    echo '<tr><td colspan=3>Total SKS Yang Akan Ditempuh :</td><td colspan=8 id="jmlcart"><b>'.$tot_sks.' SKS</b></td></tr>';
                          ?>
                    </tbody>
                  </table>
                </div>
        </div>
    </div>
  </div>
</div>
