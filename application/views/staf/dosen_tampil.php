<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">assignment_ind</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>TABEL DOSEN</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Dosen</th>
                      <th width="110">
                        <?php echo '<a href="'.base_url().'staf/tambah_dosen"class="btn bg-blue waves-effect">Tambah</a>'; ?>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                  foreach($dsn->result_array() as $d)
                  {
                  echo'<tr>
                  <td width="10" align="center">'.$no.'</td>
                  <td>'.$d['kd_dosen'].'</td>
                  <td>'.$d['nama_dosen'].'</td>';
                  echo '<td width="110" align="center">
                  <a href="'.base_url().'staf/dosen_mk/'.$d['kd_dosen'].' "class="btn bg-indigo btn-circle waves-effect waves-circle waves-float" title="dosen mk">
                  <i class="material-icons">launch</i></a>
                  <a href="'.base_url().'staf/profil_dosen/'.$d['kd_dosen'].' "class="btn bg-teal btn-circle waves-effect waves-circle waves-float" title="profil">
                  <i class="material-icons">person</i></a>
                  <a href="'.base_url().'staf/edit_dosen/'.$d['kd_dosen'].' "class="btn bg-green btn-circle waves-effect waves-circle waves-float" title="Edit">
                  <i class="material-icons">create</i></a>
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
<!-- #END# Exportable Table -->

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-pink hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">assignment_ind</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>TABEL DOSEN WALI</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama Dosen</th>
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
                  foreach($dsn_wali->result_array() as $d)
                  {
                  echo'<tr>
                  <td width="10" align="center">'.$no.'</td>
                  <td>'.$d['kd_dosen'].'</td>
                  <td>'.$d['nama_dosen'].'</td>';
                  echo '<td width="70" align="center">
                  <a href="'.base_url().'staf/dosen_mk/'.$d['kd_dosen'].' "class="btn bg-indigo btn-circle waves-effect waves-circle waves-float" title="dosen mk">
                  <i class="material-icons">launch</i></a>
                  <a href="'.base_url().'staf/profil_dosen/'.$d['kd_dosen'].' "class="btn bg-teal btn-circle waves-effect waves-circle waves-float" title="profil">
                  <i class="material-icons">person</i></a>
                  <a href="'.base_url().'staf/hapus_wali/'.$d['kd_dosen'].' " onClick=\'return confirm("Anda yakin ingin menghapus data ini..??")\'class="btn bg-red btn-circle waves-effect waves-circle waves-float" title="Hapus"><i class="material-icons">delete_sweep</i></a></td>
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
<!-- #END# Exportable Table -->

<!-- Modal Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">Form Tambah Dosen Wali</h4>
            </div>
              <form action="<?php echo base_url();?>staf/simpan_wali" method="post">
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <select name="kd_dosen" id="kd_dosen" class="form-control">
                                <option>Dosen</option>
                                <?php
                                  foreach($dsn->result_array() as $d)
                                  { ?> <option value="<?php echo $d['kd_dosen']; ?>"><?php echo $d['kd_dosen'].' - '.$d['nama_dosen']; ?></option> <?php }
                                ?>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <select name="wali" id="wali" class="form-control">
                                <option>Status Jadi Wali</option>
                                <option value="1">YA</option>
                                <option value="0">TIDAK</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-link waves-effect">SAVE</button>
              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                <input type="hidden" name="stts" value="edit">
            </div>
          </form>
        </div>
    </div>
</div>
<!-- #END# Modal Large Size -->
