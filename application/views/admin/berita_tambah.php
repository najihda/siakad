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
                  <h4>FORM TAMBAH BERITA</h4>
              </div>
            </div>
            <div class="body">
                <form action="<?php echo base_url();?>admin/simpan_berita" method="post">
                    <div class="row clearfix">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="kode_brt" class="form-control">
                                  <label class="form-label">Kode Berita</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $username; ?>" type="text" name="username" class="form-control" readonly>
                                  <label class="form-label">Penulis</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="tgl" class="form-control">
                                  <label class="form-label">Tanggal</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                <select name="stts_brt" id="stts_brt" class="form-control">
                                  <option value="1">Akademik</option>
                                  <option value="2">Staf Prodi</option>
                                </select>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="judul" class="form-control">
                                  <label class="form-label">Judul</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <textarea name="isi" ></textarea>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <a href="<?php echo base_url();?>admin/berita" class="btn bg-red waves-effect">Kembali</a>
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