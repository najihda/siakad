<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">library_books</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>TABEL MATAKULIAH</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Matakuliah</th>
                        <th>SKS</th>
                        <th>SMT</th>
                        <th width="110">
                          <?php
                            echo '<button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#largeModal">Tambah</button>';
                          ?>
                        </th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php
                        $no=1;
                        foreach($mka->result_array() as $m)
                        {
                        echo'<tr>
                        <td align="center">'.$no.'</td>
                        <td>'.$m['kd_mk'].'</td>
                        <td>'.$m['nama_mk'].'</td>
                        <td align="center">'.$m['jum_sks'].'</td>
                        <td align="center">'.$m['semester'].'</td>';
                        echo '<td align="center">
                        <a href="'.base_url().'staf/mk_dosen/'.$m['kd_mk'].'" class="btn bg-indigo btn-circle waves-effect waves-circle waves-float" title="dosen mk"><i class="material-icons">launch</i></a>
                        <a href="'.base_url().'staf/edit_mk/'.$m['kd_mk'].' "class="btn bg-green btn-circle waves-effect waves-circle waves-float" title="Edit"><i class="material-icons">create</i></a>
                        <a href="'.base_url().'staf/hapus_mk/'.$m['kd_mk'].'" onClick=\'return confirm("Anda yakin ingin menghapus data ini...??")\' class="btn bg-red btn-circle waves-effect waves-circle waves-float" title="Hapus"><i class="material-icons">delete_sweep</i></a></td>
                        </tr>';
                        $no++;
                        }
                      ?>
                    </tbody>
                </table>
                <a target="_blank" href="<?php echo base_url().'cetak/cetakmk' ?> " class="btn bg-blue waves-effect" title="Cetak Data">Cetak Data </a>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-pink hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">library_books</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>TABEL MKDU</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Matakuliah</th>
                        <th>SKS</th>
                        <th>SMT</th>
                        <th width="20">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no=1;
                      foreach($mkdu->result_array() as $m)
                      {
                      echo'<tr>
                      <td align="center">'.$no.'</td>
                      <td>'.$m['kd_mk'].'</td>
                      <td>'.$m['nama_mk'].'</td>
                      <td align="center">'.$m['jum_sks'].'</td>
                      <td align="center">'.$m['semester'].'</td>';
                      echo '<td align="center"><a href="'.base_url().'staf/mk_dosen/'.$m['kd_mk'].'" class="btn bg-indigo btn-circle waves-effect waves-circle waves-float" title="dosen mk"><i class="material-icons">launch</i></a></td>
                      </tr>';
                      $no++;
                      }
                    ?>
                    </tbody>
                </table>
                <a target="_blank" href="<?php echo base_url().'cetak/cetakmkdu' ?> " class="btn bg-blue waves-effect" title="Cetak Data">Cetak Data </a>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<!-- Modal Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">FORM TAMBAH MATAKULIAH</h4>
            </div>
              <form action="<?php echo base_url();?>staf/simpan_mk" method="post">
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="kd_mk" class="form-control">
                                 <label class="form-label">Kode MK</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-6 col-md-6 col-sm-9 col-xs-12">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="nama_mk" class="form-control">
                                <label class="form-label">Matakuliah</label>
                             </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="jum_sks" class="form-control">
                                <label class="form-label">SKS</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="semester" class="form-control">
                                 <label class="form-label">Semester</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <?php foreach($prodi->result_array() as $p) { ?>
                                <input value="<?php echo $p['kd_prodi']; ?>" type="text" name="kd_prodi" class="form-control" readonly>
                              <?php } ?>
                                <label class="form-label">Program Studi</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="prasyarat" class="form-control" readonly>
                                <label class="form-label">Prasysrat</label>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-link waves-effect">SAVE</button>
              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                <input type="hidden" name="stts" value="tambah">
            </div>
          </form>
        </div>
    </div>
</div>
<!-- #END# Modal Large Size -->