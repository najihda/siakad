<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue-grey hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">message</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>LIHAT BERITA</h4>
              </div>
            </div>
            <div class="body">
                <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                  <?php
                      foreach ($berita_akademik->result_array() as $ba) {
                  echo '<blockquote>
                            <p>'.$ba['isi'].' </p>
                            <footer>'.$ba['username'].'</footer>
                        </blockquote>';
                      }
                  ?>
                <a href="<?php echo base_url();?>" class="btn bg-red waves-effect">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</div>
