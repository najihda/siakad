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
                  <h4>FORM EDIT STAF PRODI</h4>
              </div>
            </div>
            <div class="body">
              <form action="<?php echo base_url();?>admin/simpan_staf" method="post">
                  <?php
                  foreach($staf->result_array() as $s)
                  {
                  ?>
                 <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Prodi</b> </p>
                                 <input value="<?php echo $s['kd_prodi'];?>" name="kd_prodi" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>NIP</b> </p>
                                 <input value="<?php echo $s['nip'];?>" name="nip" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Nama</b> </p>
                                <input value="<?php echo $s['nama_staf'];?>" name="nama_staf" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Alamat</b> </p>
                                <input value="<?php echo $s['alamat'];?>" name="alamat" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>T T L</b> </p>
                                <input value="<?php echo $s['ttl'];?>" name="ttl" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Gender</b> </p>
                                <input value="<?php echo $s['jk'];?>" name="jk" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>No Telepon</b> </p>
                                <input value="<?php echo $s['hp_staf'];?>" name="hp_staf" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>E-Mail</b> </p>
                                <input value="<?php echo $s['email_staf'];?>" name="email_staf" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <a href="<?php echo base_url();?>admin/staf" class="btn bg-red waves-effect"> Kembali</a>
                      <button class="btn bg-blue waves-effect"> Simpan</button>
                      <input type="hidden" name="kd_staf" value="<?php echo $s['kd_staf']; ?>">
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