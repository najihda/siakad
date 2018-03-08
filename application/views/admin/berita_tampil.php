<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">speaker_notes</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>TABEL BERITA AKADEMIK</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th width="10" align="center">No</th>
                      <th>Judul</th>
                      <th align="center">Tanggal</th>
                      <th align="center">Status</th>
                      <th width="105" align="center">
                        <?php
                          echo '<a href="'.base_url().'admin/tambah_berita" class="btn bg-blue waves-effect">Tambah</a>';
                        ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    foreach($berita_akademik->result_array() as $ba)
                    {
              echo '<tr>
                    <td width="10" align="center">'.$no.'</td>
                    <td>'.$ba['judul'].'</td>
                    <td align="left">'.$ba['tgl'].'</td>
                    <td align="left">'.$ba['stts_brt'].'</td>';
              echo '<td width="105" align="center">
                    <a href="'.base_url().'admin/lihat_berita/'.$ba['kode_brt'].' "class="btn bg-indigo btn-circle waves-effect waves-circle waves-float"
                    title="dosen mk"><i class="material-icons">launch</i></a>
                    <a href="'.base_url().'admin/hapus_berita/'.$ba['kode_brt'].' " onClick=\'return confirm("Anda yakin ingin menghapus data ini...??")\'
                    class="btn btn-danger btn-circle waves-effect waves-circle waves-float" title="hapus"><i class="material-icons">delete_sweep</i></a></td></tr>';
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

<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">speaker_notes</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>TABEL BERITA STAF</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th width="10" align="center">No</th>
                      <th>Judul</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th width="105" align="center">
                        <?php
                          echo '<a href="'.base_url().'admin/tambah_berita" class="btn bg-blue waves-effect">Tambah</a>';
                        ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    foreach($berita_stf->result_array() as $bs)
                    {
              echo '<tr>
                    <td width="10" align="center">'.$no.'</td>
                    <td>'.$bs['judul'].'</td>
                    <td align="left">'.$bs['tgl'].'</td>
                    <td align="left">'.$bs['stts_brt'].'</td>';
              echo '<td width="105" align="center">
                    <a href="'.base_url().'admin/lihat_berita/'.$bs['kode_brt'].' "class="btn bg-indigo btn-circle waves-effect waves-circle waves-float"
                    title="dosen mk"><i class="material-icons">launch</i></a>
                    <a href="'.base_url().'admin/hapus_berita/'.$bs['kode_brt'].'" onClick=\'return confirm("Anda yakin ingin menghapus data ini...??")\'
                    class="btn btn-danger btn-circle waves-effect waves-circle waves-float" title="hapus"><i class="material-icons">delete_sweep</i></a></td></tr>';
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
