<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">speaker_notes</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>TABEL BERITA MAHASISWA</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th width="10" align="center">No</th>
                      <th>Judul</th>
                      <th align="left">Tanggal</th>
                      <th align="left">Status</th>
                      <th width="105" align="center">
                        <?php
                          echo '<a href="'.base_url().'staf/tambah_berita" class="btn bg-blue waves-effect">Tambah</a>';
                        ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    foreach($berita_mahasiswa->result_array() as $bm)
                    {
              echo '<tr>
                    <td width="10" align="center">'.$no.'</td>
                    <td>'.$bm['judul'].'</td>
                    <td align="left">'.$bm['tgl'].'</td>
                    <td align="left">'.$bm['stts_brt'].'</td>';
              echo '<td width="105" align="center">
                    <a href="'.base_url().'staf/lihat_berita/'.$bm['kode_brt'].' "class="btn bg-indigo btn-circle waves-effect waves-circle waves-float"
                    title="lihat berita"><i class="material-icons">launch</i></a>
                    <a href="'.base_url().'staf/hapus_berita/'.$bm['kode_brt'].' " onClick=\'return confirm("Anda yakin ingin menghapus data ini...??")\'
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
                  <div class="text">Staf Prodi</div>
                  <h4>TABEL BERITA DOSEN</h4>
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
                          echo '<a href="'.base_url().'staf/tambah_berita" class="btn bg-blue waves-effect">Tambah</a>';
                        ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    foreach($berita_dosen->result_array() as $bd)
                    {
              echo '<tr>
                    <td width="10" align="center">'.$no.'</td>
                    <td>'.$bd['judul'].'</td>
                    <td align="left">'.$bd['tgl'].'</td>
                    <td align="left">'.$bd['stts_brt'].'</td>';
              echo '<td width="105" align="center">
                    <a href="'.base_url().'staf/lihat_berita/'.$bd['kode_brt'].' "class="btn bg-indigo btn-circle waves-effect waves-circle waves-float"
                    title="lihat berita"><i class="material-icons">launch</i></a>
                    <a href="'.base_url().'staf/hapus_berita/'.$bd['kode_brt'].'" onClick=\'return confirm("Anda yakin ingin menghapus data ini...??")\'
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
