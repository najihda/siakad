<div class="row clearfix">
    <?php
        foreach ($mhs->result_array() as $m)
        {
     ?>
     <!-- Latest Social Trends -->
     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="card">
            <div class="info-box bg-teal hover-zoom-effect">
                <div class="icon"> <i class="material-icons">person</i> </div>
                <div class="content">
                    <div class="text">Mahasiswa</div> <h4>PROFIL</h4>
                </div>
            </div>
            <div class="body">
                 <div class="form-group">
                     <div class="form-group">
                         <div class="form-line"> <h5>Nama    : <?php echo $m['nama_mahasiswa']; ?></h5> </div>
                     </div>
                     <div class="form-group">
                         <div class="form-line"> <h5>NIM     : <?php echo $m['nim']; ?></h5> </div>
                     </div>
                     <div class="form-group">
                         <div class="form-line"> <h5>Prodi     : <?php echo $m['nama_prodi']; ?></h5> </div>
                     </div>
                     <div class="form-group">
                         <div class="form-line"> <h5>Angkatan     : <?php echo $m['angkatan']; ?></h5> </div>
                     </div>
                 </div>
                 <a href="<?php echo base_url();?>staf/mahasiswa" class="btn btn-danger waves-effect"> Kembali</a>
            </div>
         </div>
     </div>
    <!-- #END# Latest Social Trends -->

    <!-- Tabs With Icon Title -->
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bg-teal">
                <h4> BIODATA DETAIL </h4>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home_with_icon_title" data-toggle="tab"> <i class="material-icons">face</i> PROFIL </a>
                    </li>
                    <li role="presentation">
                        <a href="#ayah_with_icon_title" data-toggle="tab"> <i class="material-icons">group</i> BIO AYAH </a>
                    </li>
                    <li role="presentation">
                        <a href="#ibu_with_icon_title" data-toggle="tab"> <i class="material-icons">group</i> BIO IBU </a>
                    </li>
                    <li role="presentation">
                        <a href="#sekolah_with_icon_title" data-toggle="tab"> <i class="material-icons">school</i> ASAL SEKOLAH </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-line"> <h5>Alamat    : <?php echo $m['alamat']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>T T L    : <?php echo $m['ttl']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Gender    : <?php echo $m['jk']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Telepon     : <?php echo $m['hp_mahasiswa']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>E-Mail    : <?php echo $m['email_mhs']; ?></h5> </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="ayah_with_icon_title">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-line"> <h5>Nama Ayah    : <?php echo $m['nama_ayah']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Alamat    : <?php echo $m['alamat_ortu']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Pekerjaan    : <?php echo $m['kerja_ayah']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Penghasilan    : <?php echo $m['hasil_ayah']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Telepon     : <?php echo $m['hp_ortu']; ?></h5> </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="ibu_with_icon_title">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-line"> <h5>Nama Ibu    : <?php echo $m['nama_ibu']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Alamat    : <?php echo $m['alamat_ortu']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Pekerjaan    : <?php echo $m['kerja_ibu']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Penghasilan    : <?php echo $m['hasil_ibu']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Telepon     : <?php echo $m['hp_ortu']; ?></h5> </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="sekolah_with_icon_title">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-line"> <h5>Nama Sekolah    : <?php echo $m['nama_sekolah']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Jurusan    : <?php echo $m['jurusan_sekolah']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Tahun Lulus    : <?php echo $m['thn_lulus']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Telepon     : <?php echo $m['hp_sekolah']; ?></h5> </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line"> <h5>Alamat    : <?php echo $m['alamat_sekolah']; ?></h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- #END# Tabs With Icon Title -->
    <?php
    }
    ?>
</div>
