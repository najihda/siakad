<!-- Input -->
<div class="row clearfix">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-teal hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">create</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>FORM EDIT PROGRAM STUDI</h4>
              </div>
            </div>
            <div class="body">
              <form action="<?php echo base_url();?>admin/simpan_prodi" method="post">
                  <?php
                  foreach($prodi->result_array() as $f)
                  {
                  ?>
                 <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Program Studi</b> </p>
                                 <input value="<?php echo $f['nama_prodi'];?>" name="nama_prodi" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Fakultas</b> </p>
                                 <input value="<?php echo $f['kd_fakultas'];?>" name="kd_fakultas" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Status</b> </p>
                                <input value="<?php echo $f['status'];?>" name="status" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <p> <b>Kaprodi</b> </p>
                          <select name="kd_dosen" class="form-control show-tick" data-live-search="true">
                            <option>Kaprodi</option>
                            <?php
                              foreach($dosen->result_array() as $d)
                              { ?> <option value="<?php echo $d['nama_dosen']; ?>"><?php echo $d['kd_dosen'].'-'.$d['nama_dosen']; ?></option> <?php }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <p> <b>Staf Prodi</b> </p>
                          <select name="kd_staf" class="form-control show-tick" data-live-search="true">
                            <option>Staf Prodi</option>
                            <?php
                              foreach($staf->result_array() as $s)
                              { ?> <option value="<?php echo $s['kd_staf']; ?>"><?php echo $s['kd_staf'].'-'.$s['nama_staf']; ?></option> <?php }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <a href="<?php echo base_url();?>admin/prodi" class="btn bg-red waves-effect"> Kembali</a>
                      <button class="btn bg-blue waves-effect"> Simpan</button>
                      <input type="hidden" name="kd_prodi" value="<?php echo $f['kd_prodi']; ?>">
                      <input type="hidden" name="stts" value="edit">
                    </div>
                </div>
                    <?php
                    }
                    ?>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Input -->
