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
                    <h4>FORM TAMBAH JADWAL</h4>
                </div>
            </div>
              <div class="body">
                <form action="<?php echo base_url();?>staf/simpan_jadwal" method="post">
                    <div class="row clearfix">
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                <?php foreach($prodi->result_array() as $p) { ?>
                                  <input type="text" value="<?php echo $p['kd_prodi']; ?>" name="kd_prodi" class="form-control" readonly>
                                  <label class="form-label">Program Studi</label>
                                <?php } ?>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="kd_mk" id="kd_mk" class="form-control show-tick" data-live-search="true">
                              <option>Matakuliah</option>
                              <?php
                                foreach($mata_kuliah->result_array() as $mk)
                                { ?> <option value="<?php echo $mk['kd_mk'];?>"><?php echo $mk['kd_mk']." - ".$mk['nama_mk'];?></option> <?php }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="kd_dosen" id="kd_dosen" class="form-control show-tick" data-live-search="true">
                              <option>Dosen Pengampu</option>
                              <?php
                                foreach($dsn->result_array() as $d)
                                { ?> <option value="<?php echo $d['kd_dosen'];?>"><?php echo $d['kd_dosen']." - ".$d['nama_dosen'];?></option> <?php }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="hari" id="hari" class="form-control">
                              <option value="hari">Hari</option>
                              <option value="Senin">Senin</option>
                              <option value="Selasa">Selasa</option>
                              <option value="Rabu">Rabu</option>
                              <option value="Kamis">Kamis</option>
                              <option value="Jumat">Jumat</option>
                              <option value="Jumat">Sabtu</option>
                              <option value="Jumat">Minggu</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="jam_mulai" class="form-control">
                                  <label class="form-label">Jam Mulai</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="jam_akhir" class="form-control">
                                  <label class="form-label">Jam Selesai</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="kd_gedung" id="kd_gedung" class="form-control">
                              <option>Gedung</option>
                              <?php
                                foreach($gedung->result_array() as $g)
                                { ?> <option value="<?php echo $g['kd_gedung'];?>"><?php echo $g['kd_gedung']." - ".$g['nama_gedung'];?></option> <?php }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="kd_ruang_kelas" id="kd_ruang_kelas" class="form-control">
                              <option>Ruang</option>
                              <?php
                                foreach($ruang->result_array() as $r)
                                { ?> <option value="<?php echo $r['kd_ruang_kelas'];?>"><?php echo $r['kd_ruang_kelas']." - ".$r['nama_ruang_kelas'];?></option> <?php }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                <?php foreach($tahun_ajaran->result_array() as $t) { ?>
                                  <input type="text" value="<?php echo $t['keterangan']; ?>" name="kd_tahun" class="form-control" readonly>
                                  <label class="form-label">Tahun Ajaran</label>
                                <?php } ?>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                          <div class="form-group form-float">
                              <div class="form-line">
                                  <input type="text" name="kapasitas" class="form-control">
                                  <label class="form-label">Kapasitas</label>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group form-float">
                          <div class="form-line">
                            <select name="kelas_program" class="form-control">
                              <option>Kelas Program</option>
                              <option value="reguler">Reguler</option>
                              <option value="ekstensi">Ekstensi</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <a href="<?php echo base_url();?>staf/tampil_jadwal" class="btn bg-red waves-effect">Kembali</a>
                          <button class="btn bg-blue waves-effect">Simpan</button>
                          <input type="hidden" name="stts" value="tambah">
                      </div>
                    </div>
                </form>
              </div>
        </div>
    </div>
</div>
