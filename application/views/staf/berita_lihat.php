<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue-grey hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">message</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>LIHAT BERITA</h4>
              </div>
            </div>
             <div class="body">
                <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                  <?php
                      foreach ($berita_staf->result_array() as $bs) {
                        echo '<blockquote>
                              <p>'.$bs['isi'].' </p>
                              <footer>'.$bs['kd_staf'].'</footer>
                              </blockquote>';
                        }
                  ?>
                <a href="<?php echo base_url();?>staf/berita" class="btn bg-red waves-effect">Kembali</a>
                </div>
              </div>
        </div>
    </div>
</div>
