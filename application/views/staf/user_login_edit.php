
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
                    <h4>FORM EDIT USER LOGIN</h4>
                </div>
            </div>
            <div class="body">
              <form action="<?php echo base_url();?>staf/simpan_user" method="post">
                  <?php
                  foreach($user->result_array() as $u)
                  {
                  ?>
                 <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Username</b> </p>
                                 <input value="<?php echo $u['username'];?>" name="username" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Password</b> </p>
                                <input value="<?php echo $u['password'];?>" name="password" type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <a href="<?php echo base_url();?>staf/user_login" class="btn bg-red waves-effect"> Kembali</a>
                      <button class="btn bg-blue waves-effect"> Simpan</button>
                      <input type="hidden" name="username" value="<?php echo $u['username']; ?>">
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