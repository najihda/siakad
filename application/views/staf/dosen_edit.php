<!-- Inline Layout | With Floating Label -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-teal hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">create</i>
                </div>
                <div class="content">
                    <div class="text">Staf Prodi</div>
                    <h4>FORM EDIT DOSEN</h4>
                </div>
            </div>
              <div class="body">
                <form action="<?php echo base_url();?>staf/simpan_dosen" method="post">
                  <?php
                  foreach($dosen->result_array() as $d)
                  {
                  ?>
                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['kd_dosen']; ?>" type="text" name="kd_dosen" class="form-control" readonly>
                                  <label class="form-label">Kode</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['nama_dosen']; ?>" type="text" name="nama_dosen" class="form-control">
                                  <label class="form-label">Nama Lengkap</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['nidn']; ?>" type="text" name="nidn" class="form-control">
                                  <label class="form-label">NIDN</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['ttl']; ?>" type="text" name="ttl" class="form-control">
                                  <label class="form-label">T T L</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['alamat']; ?>" type="text" name="alamat" class="form-control">
                                  <label class="form-label">Alamat</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <input value="<?php echo $d['jk']; ?>" type="text" name="jk" class="form-control">
                                  <label class="form-label">Gender</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['email_dsn']; ?>" type="text" name="email_dsn" class="form-control">
                                  <label class="form-label">E-Mail</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['hp_dosen']; ?>" type="text" name="hp_dosen" class="form-control">
                                  <label class="form-label">No Telepon</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                <?php foreach($prodi->result_array() as $p) { ?>
                                  <input value="<?php echo $p['kd_prodi']; ?>" type="text" name="kd_prodi" class="form-control" readonly>
                                <?php } ?>
                                  <label class="form-label">Program Studi</label>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3><i class="fa fa-user"></i> RIWAYAT PENDIDIKAN S1</h3>
                      <div class="clearfix"></div>
                    <div class="row clearfix">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['nama_PTS1']; ?>" type="text" name="nama_PTS1" class="form-control">
                                  <label class="form-label">Nama Institusi</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['prodiS1']; ?>" type="text" name="prodiS1" class="form-control">
                                  <label class="form-label">Prodi</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['tahun_lulus1']; ?>" type="text" name="tahun_lulus1" class="form-control">
                                  <label class="form-label">Tahun Lulus</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['alamat_PTS1']; ?>" type="text" name="alamat_PTS1" class="form-control">
                                  <label class="form-label">Alamat</label>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3><i class="fa fa-user"></i> RIWAYAT PENDIDIKAN S2</h3>
                      <div class="clearfix"></div>
                    <div class="row clearfix">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['nama_PTS2']; ?>" type="text" name="nama_PTS2" class="form-control">
                                  <label class="form-label">Nama Institusi</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['prodiS2']; ?>" type="text" name="prodiS2" class="form-control">
                                  <label class="form-label">Prodi</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['tahun_lulus2']; ?>" type="text" name="tahun_lulus2" class="form-control">
                                  <label class="form-label">Tahun Lulus</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input value="<?php echo $d['alamat_PTS2']; ?>" type="text" name="alamat_PTS2" class="form-control">
                                  <label class="form-label">Alamat</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <a href="<?php echo base_url();?>staf/dosen" class="btn bg-red waves-effect">Kembali</a>
                          <button class="btn bg-blue waves-effect">Simpan</button>
                          <input type="hidden" name="kd_dosen" value="<?php echo $d['kd_dosen']; ?>">
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
