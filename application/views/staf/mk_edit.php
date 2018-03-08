<!-- Input -->
<div class="row clearfix">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-teal hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">create</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>FORM EDIT MATAKULIAH</h4>
              </div>
            </div>
            <div class="body">
              <form action="<?php echo base_url();?>staf/simpan_mk" method="post">
                  <?php
                  foreach($mk->result_array() as $m)
                  {
                  ?>
                 <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Nama Matakuliah</b> </p>
                                 <input value="<?php echo $m['nama_mk'];?>" name="nama_mk" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Jumlah SKS</b> </p>
                                <input value="<?php echo $m['jum_sks'];?>" name="jum_sks" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Semester</b> </p>
                                <input value="<?php echo $m['semester'];?>" name="semester" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>MKDU</b> </p>
                                <input value="<?php echo $m['prasyarat'];?>" name="prasyarat" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Prodi</b> </p>
                                <input value="<?php echo $m['kd_prodi'];?>" name="kd_prodi" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <a href="<?php echo base_url();?>staf/mk" class="btn bg-red waves-effect"> Kembali</a>
                      <button class="btn bg-blue waves-effect"> Simpan</button>
                      <input type="hidden" name="kd_mk" value="<?php echo $m['kd_mk']; ?>">
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
