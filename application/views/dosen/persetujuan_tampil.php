<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">recent_actors</i>
              </div>
              <div class="content">
                  <div class="text">Dosen</div>
                  <h4>TABEL MAHASISWA BIMBINGAN</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>NIM</th>
                          <th>Nama Mahasiswa</th>
                          <th>Angkatan</th>
                          <th>Prodi</th>
                          <th>Program Kelas</th>
                          <th>Status Persetujuan</th>
                          <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                      foreach($mhs->result_array() as $k)
                      {
                        $st="";
                        if($k['status']=='0')
                        {
                          $st= "Belum Disetujui";
                          $link = base_url().'dosen/detail_krs/'.$k['nim'].'/'.$k['status'];
                        }
                        else if ($k['status']=='1')
                        {
                          $st= "Sudah Disetujui";
                          $link = base_url().'dosen/detail_krs/'.$k['nim'].'/'.$k['status'];
                        }
                        else if($k['status']==NULL)
                        {
                          $st= "Belum Mengisi KRS";
                          $link = "";
                        }

                        echo '<tr>
                        <td align="center">'.$no.'</td>
                        <td>'.$k['nim'].'</td>
                        <td>'.$k['nama_mahasiswa'].'</td>
                        <td>'.$k['angkatan'].'</td>
                        <td>'.$k['nama_prodi'].'</td>
                        <td>'.$k['kelas_program'].'</td>';
                        echo '<td>'.$st.'</td>
                        <td><a href="'.$link.'" title="Detail Kartu Rencana Studi - '.$k['nama_mahasiswa'].'"class="btn bg-indigo btn-circle waves-effect waves-circle waves-float"><i class="material-icons">launch</i></a>
                        <a href="'.base_url().'dosen/hapus_krs/'.$k['nim'].' " onClick=\'return confirm("Anda yakin ingin menghapus data ini..??")\'class="btn btn-danger btn-circle waves-effect waves-circle waves-float" title="hapus"><i class="material-icons">delete_sweep</i></a></td>
                        </tr>';
                        $no++;
                      }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# With Material Design Colors -->