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
                  <h4>FORM EDIT TAHUN AKADEMIK</h4>
              </div>
            </div>
            <div class="body">
            <div class="row clearfix">
              <form action="<?php echo base_url();?>index.php/admin/simpan_thn" method="post">
                  <?php
                  foreach($thn_akademik->result_array() as $t)
                  {
                  ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input value="<?php echo $t['keterangan'];?>" type="text" name="keterangan" class="form-control">
                                <label class="form-label">Keterangan</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input value="<?php echo $t['tgl_kuliah'];?>" type="text" name="tgl_kuliah" class="form-control">
                                <label class="form-label">Tgl Perkuliahan</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input value="<?php echo $t['batas_perwalian'];?>" type="text" name="batas_perwalian" class="form-control">
                                <label class="form-label">Batas Perwalian</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                       <div class="form-group form-float">
                        <div class="form-line">
                          <select name="stts_thn" class="form-control show-tick" data-live-search="true">
                            <option value="<?php echo $t['stts_thn'];?>">Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <a href="<?php echo base_url();?>index.php/admin/thn_akademik" class="btn bg-red waves-effect">Kembali</a>
                        <button class="btn bg-blue waves-effect">Simpan</button>
                        <input type="hidden" name="kd_tahun" value="<?php echo $t['kd_tahun']; ?>">
                        <input type="hidden" name="stts" value="edit">
                    </div>
                    <?php
                    }
                    ?>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Input -->