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
                    <h4>FORM TAMBAH MAHASISWA</h4>
                </div>
            </div>
              <div class="body">
                <form action="<?php echo base_url();?>staf/simpan_mahasiswa" method="post">
                    <div class="row clearfix">
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="nim" class="form-control">
                                  <label class="form-label">NIM</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="nama_mahasiswa" class="form-control">
                                  <label class="form-label">Nama Lengkap</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
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
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="ttl" class="datepicker form-control">
                                  <label class="form-label">T T L</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="alamat" class="form-control">
                                  <label class="form-label">Alamat</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="hp_mahasiswa" class="form-control">
                                  <label class="form-label">No Telepon</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="email_mhs" class="form-control">
                                  <label class="form-label">E-Mail</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                <?php foreach($tahun_ajaran->result_array() as $t) { ?>
                                  <input type="text" value="<?php echo $t['keterangan']; ?>" name="angkatan" class="form-control" readonly>
                                  <label class="form-label">Angkatan</label>
                                <?php } ?>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                <?php foreach($prodi->result_array() as $p) { ?>
                                  <input value="<?php echo $p['kd_prodi']; ?>" type="text" name="kd_prodi" class="form-control" readonly>
                                <?php } ?>
                                  <label class="form-label">Program Studi</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="kd_dosen" class="form-control show-tick" data-live-search="true">
                              <option>Dosen Wali</option>
                              <?php foreach($dsn->result_array() as $d) { ?>
                                  <option value="<?php echo $d['kd_dosen']; ?>"><?php echo $d['kd_dosen']. '-' .$d['nama_dosen']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="stts_masuk" class="form-control show-tick" data-live-search="true">
                              <option>Status</option>
                              <option value="1">1.Baru</option>
                              <option value="2">2.Pindahan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="kelas_program" class="form-control show-tick" data-live-search="true">
                              <option>Program</option>
                              <option value="reguler">Reguler</option>
                              <option value="ekstensi">Ekstensi</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <h3><i class="fa fa-user"></i> DATA ORANG TUA</h3>
                      <div class="clearfix"></div>
                    <div class="row clearfix">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="nama_ayah" class="form-control">
                                  <label class="form-label">Nama Ayah</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="kerja_ayah" class="form-control">
                                  <label class="form-label">Pekerjaan</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="hasil_ayah" class="form-control">
                                  <label class="form-label">Penghasilan</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="nama_ibu" class="form-control">
                                  <label class="form-label">Nama Ibu</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="kerja_ibu" class="form-control">
                                  <label class="form-label">Pekerjaan</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="hasil_ibu" class="form-control">
                                  <label class="form-label">Penghasilan</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="alamat_ortu" class="form-control">
                                  <label class="form-label">Alamat</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="hp_ortu" class="form-control">
                                  <label class="form-label">No Telepon</label>
                              </div>
                          </div>
                      </div>
                    </div>
                    <h3><i class="fa fa-user"></i> DATA SEKOLAH ASAL</h3>
                      <div class="clearfix"></div>
                    <div class="row clearfix">
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="nama_sekolah" class="form-control">
                                  <label class="form-label">Nama Sekolah</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="thn_lulus" class="form-control">
                                  <label class="form-label">Tahun Lulus</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="jurusan_sekolah" class="form-control">
                                  <label class="form-label">Jurusan</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="hp_sekolah" class="form-control">
                                  <label class="form-label">No Telepon</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="alamat_sekolah" class="form-control">
                                  <label class="form-label">Alamat</label>
                              </div>
                          </div>
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <a href="<?php echo base_url();?>staf/mahasiswa" class="btn bg-red waves-effect">Kembali</a>
                          <button class="btn bg-blue waves-effect">Simpan</button>
                          <input type="hidden" name="stts" value="tambah">
                      </div>
                    </div>
                </form>
              </div>
        </div>
    </div>
</div>
