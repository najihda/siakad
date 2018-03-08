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
                  <h4>FORM EDIT FAKULTAS</h4>
              </div>
            </div>
            <div class="body">
              <form action="<?php echo base_url();?>admin/simpan_fakultas" method="post">
                  <?php
                  foreach($fakultas->result_array() as $f)
                  {
                  ?>
                 <div class="row clearfix">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Nama Fakultas</b> </p>
                                 <input value="<?php echo $f['nama_fakultas'];?>" name="nama_fakultas" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Status</b> </p>
                                <input value="<?php echo $f['status'];?>" name="status" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group form-float">
                        <div class="form-line">
                          <p> <b>Nama Dekan</b> </p>
                          <select name="kd_dosen" class="form-control show-tick" data-live-search="true">
                            <option>Dekan</option>
                            <?php
                              foreach($dosen->result_array() as $d)
                              { ?> <option value="<?php echo $d['nama_dosen']; ?>"><?php echo $d['kd_dosen'].'-'.$d['nama_dosen']; ?></option> <?php }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                      <a href="<?php echo base_url();?>admin/fakultas" class="btn bg-red waves-effect"> Kembali</a>
                      <button class="btn bg-blue waves-effect"> Simpan</button>
                      <input type="hidden" name="kd_fakultas" value="<?php echo $f['kd_fakultas']; ?>">
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
