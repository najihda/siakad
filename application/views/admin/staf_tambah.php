<!-- Inline Layout | With Floating Label -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-teal hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">create</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>FORM TAMBAH STAF PRODI</h4>
              </div>
            </div>
            <div class="body">
                <form action="<?php echo base_url();?>admin/simpan_staf" method="post">
                    <div class="row clearfix">
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="kd_staf" class="form-control">
                                  <label class="form-label">Kode</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="nama_staf" class="form-control">
                                  <label class="form-label">Nama Lengkap</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="nip" class="form-control">
                                  <label class="form-label">NIP</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="alamat" class="form-control">
                                  <label class="form-label">Alamat</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="ttl" class="form-control">
                                  <label class="form-label">T T L</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="jk" class="form-control show-tick" data-live-search="true">
                              <option>Gender</option>
                              <option value="laki-laki">Laki-laki</option>
                              <option value="perempuan">Perempuan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="hp_staf" class="form-control">
                                  <label class="form-label">No Telepon</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="email_staf" class="form-control">
                                  <label class="form-label">E-Mail</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="kd_prodi" class="form-control show-tick" data-live-search="true">
                              <option>Program Studi</option>
                              <?php
                                foreach($prodi->result_array() as $p)
                                { ?> <option value="<?php echo $p['kd_prodi']; ?>"><?php echo $p['kd_prodi'].'-'.$p['nama_prodi']; ?></option> <?php }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                          <a href="<?php echo base_url();?>admin/staf" class="btn bg-red waves-effect">Kembali</a>
                          <button class="btn bg-blue waves-effect">Simpan</button>
                          <input type="hidden" name="stts" value="tambah">
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
            <!-- #END# Inline Layout | With Floating Label -->
