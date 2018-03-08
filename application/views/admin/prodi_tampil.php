<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">extension</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>TABEL PROGRAM STUDI</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                    <thead>
                      <tr>
                        <th width="10" align="center">No</th>
                        <th>Kode</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Kaprodi</th>
                        <th>Staf</th>
                        <th>Status</th>
                        <th width="105" align="center">
                          <?php
                            echo '<button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#largeModal">Tambah</button>';
                          ?>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        foreach($prodi->result_array() as $p)
                        {
                        echo'<tr>
                        <td width="10" align="center">'.$no.'</td>
                        <td>'.$p['kd_prodi'].'</td>
                        <td>'.$p['nama_prodi'].'</td>
                        <td>'.$p['nama_fakultas'].'</td>
                        <td>'.$p['kaprodi'].'</td>
                        <td>'.$p['kd_staf'].'</td>
                        <td>'.$p['status'].'</td>';
                        echo '<td width="105" align="center">
                        <a href="'.base_url().'admin/edit_prodi/'.$p['kd_prodi'].' "class="btn btn-success btn-circle waves-effect waves-circle waves-float"
                        title="edit"><i class="material-icons">create</i></a>
                        <a href="'.base_url().'admin/hapus_prodi/'.$p['kd_prodi'].' " onClick=\'return confirm("Anda yakin ingin menghapus data ini..??")\'
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

<!-- Modal Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">FORM TAMBAH PROGRAM STUDI</h4>
            </div>
              <form action="<?php echo base_url();?>admin/simpan_prodi" method="post">
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="kd_prodi" class="form-control">
                                 <label class="form-label">Kode Prodi</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-6 col-md-3 col-sm-3 col-xs-6">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="nama_prodi" class="form-control">
                                <label class="form-label">Nama Prodi</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="kaprodi" class="form-control" disabled>
                                 <label class="form-label">Kaprodi</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="status" class="form-control">
                                <label class="form-label">Status</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <select name="kd_fakultas" class="form-control show-tick" data-live-search="true">
                            <?php
                              foreach($fakultas->result_array() as $f)
                              { ?> <option value="<?php echo $f['kd_fakultas']; ?>"><?php echo $f['kd_fakultas'].'-'.$f['nama_fakultas']; ?></option> <?php }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="kd_staf" class="form-control" disabled>
                                 <label class="form-label">Staf Prodi</label>
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
