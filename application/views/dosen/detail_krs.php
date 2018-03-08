<div class="row clearfix">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="info-box bg-deep-purple hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">recent_actors</i>
            </div>
            <div class="content">
                <div class="text">Dosen</div>
                <h4>KRS MAHASISWA</h4>
            </div>
        </div>
        <div class="body">
          <div class="row clearfix">
            <?php
              if($status=='1')
              {
                $cls = "disetujui";
                $teks="<b>Sudah Disetujui</b>";
              }
              else if($status=='0')
              {
                $cls = "";
                $teks="<b>Belum Disetujui</b>";
              }
              else if($status==NULL)
              {
                $cls = "";
                $teks="<b>Belum Mengisi KRS</b>";
              }
            ?>
            <form name="datafrs" id="datafrs" method="POST" action="">
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
                            <input value="<?php echo $nama_mhs; ?>" name="nama_mhs" type="text" class="form-control" readonly>
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
            <div id="hasil"></div>
<div class="row clearfix">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="info-box bg-teal hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">recent_actors</i>
            </div>
            <div class="content">
                <div class="text">Dosen</div>
                <h4>FORM KRS MAHASISWA</h4>
            </div>
        </div>
      <div class="body">
        <div class="row clearfix">
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
                </tr>
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
                          <td>'.$value['kapasitas'].'</td>';
                  }
                  echo '<tr><td colspan=3>Total SKS Yang Akan Ditempuh :</td><td colspan=8 id="jmlcart"><b>'.$tot_sks.' SKS</b></td></tr>';
                  echo '<tr><td colspan=3>Status Persetujuan KRS :</td><td colspan=8>'.$teks.'</td></tr>';
                ?>
              </tbody>
            </table>
            <?php
                  if($status=='0')
                  {
                    if($state_app < 1)
                    {
                      echo "(+) Jika Anda menyetujui Kartu Rencana Study Mahasiswa ini silakan klick tombol Setujui di bawah ini
                     <br><br><input type='submit' value='Setujui Kartu Rencana Studi' class='btn btn-small btn-primary'>";
                    }
                    else if($state_app > 0)
                    {
                      echo "<p class='alert'>Anda tidak diperbolehkan menyetujui Kartu Rencana Studi ini, karena ada <b> ".$state_app." </b>mata kuliah yang telah terpenuhi kuotanya...!!!</p>";
                    }
                  }
                  else{
                    echo "<br>(+) Jika Anda ingin membatalkan seluruh Kartu Rencana Study Mahasiswa ini silakan klick tombol Batalkan di bawah ini
                    <br><br><input type='submit' value='Batalkan Kartu Rencana Studi' class='btn bg-indigo waves-effect'> ";
                  }
                ?>

          <a href="<?php echo base_url();?>dosen/persetujuan" class="btn bg-red waves-effect">Kembali</a>
          </div>
          </form>
        </div>
    </div>
  </div>
</div>
