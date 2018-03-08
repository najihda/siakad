<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">library_books</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>TABEL MK DOSEN</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Kode MK</th>
                            <th>Matakuliah</th>
                            <th>Kode Dosen</th>
                            <th>Dosen</th>
                            <th>Jadwal</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($mk_dosen->result_array() as $d)
                      {
                      ?>
                      <tbody>
                        <td><?php echo $d['kd_mk']; ?></td>
                        <td><?php echo $d['nama_mk']; ?></td>
                        <td><?php echo $d['kd_dosen']; ?></td>
                        <td><?php echo $d['nama_dosen']; ?></td>
                        <td><?php echo $d['jadwal']; ?></td>
                      </tbody>
                      <?php
                        }
                      ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url();?>admin/mk" class="btn bg-red waves-effect">Kembali</a>
            </div>
        </div>
    </div>
</div>
<!-- #END# With Material Design Colors -->