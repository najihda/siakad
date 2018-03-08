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
                  <h4>FORM EDIT NILAI</h4>
              </div>
            </div>
            <div class="body">
              <form action="<?php echo base_url();?>admin/simpan_nilai" method="post">
                  <?php
                  foreach($input->result_array() as $i)
                  {
                 echo '<div class="row clearfix">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>NIM</b> </p>
                                 <input value="'.$i['nim'].'" name="nim" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Nama Mahasiswa</b> </p>
                                <input value="'.$i['nama_mahasiswa'].'" name="nama_mahasiswa" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Kode MK</b> </p>
                                <input value="'.$i['kd_mk'].'" name="kd_mk" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Matakuliah</b> </p>
                                <input value="'.$i['nama_mk'].'" name="nama_mk" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Kode Dosen</b> </p>
                                <input value="'.$i['kd_dosen'].'" name="kd_dosen" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Dosen</b> </p>
                                <input value="'.$i['nama_dosen'].'" name="nama_dosen" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Tahun Ajaran</b> </p>
                                <input value="'.$i['kd_tahun'].'" name="kd_tahun" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Semester</b> </p>
                                <input value="'.$smt.'" name="semester_ditempuh" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                              <p> <b>Nilai</b> </p>
                                <input name="grade" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <a href="'.base_url().'admin/input_nilai/'.$i['nim'].'" class="btn bg-red waves-effect"> Kembali</a>
                      <button class="btn bg-blue waves-effect"> Simpan</button>
                      <input type="hidden" name="stts" value="tambah">
                    </div>
                </div>';
                    }
                    ?>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Input -->