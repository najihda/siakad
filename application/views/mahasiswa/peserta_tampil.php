<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">credit_card</i>
              </div>
              <div class="content">
                  <div class="text">Mahasiswa</div>
                  <h4>TABEL PESERTA KULIAH</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Mahasiswa</th>
                            <th>Prodi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                       $no =1;
                       foreach($peserta->result_array() as $value)
                       {

                        if($value['status']=='0')
                              {
                                $st = "Belum Disetujui";
                              }
                              else
                              {
                                $st = "Sudah Disetujui";
                               }

                        echo '<tr>
                        <td>'.$no.'</td>
                        <td>'.$value['nim'].'</td>
                        <td>'.$value['nama_mahasiswa'].'</td>
                        <td>'.$value['kd_prodi'].'</td>
                        <td>'.$st.'</td>
                        </tr>';
                        $no++;
                       }
                       ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url();?>mahasiswa/tampil_jadwal" class="btn bg-red waves-effect">Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- #END# With Material Design Colors -->