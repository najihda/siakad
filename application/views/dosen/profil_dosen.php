<div class="row clearfix">
    <?php
        foreach ($dsn->result_array() as $d)
        {
     ?>
     <!-- Latest Social Trends -->
     <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
         <div class="card">
            <div class="info-box bg-teal hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="content">
                    <div class="text">Dosen</div>
                    <h4>PROFIL</h4>
                </div>
            </div>
             <div class="body">
                 <div class="form-group">
                     <div class="form-group">
                         <div class="form-line">
                             <h5>Nama    : <?php echo $d['nama_dosen']; ?></h5>
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="form-line">
                             <h5>Kode     : <?php echo $d['kd_dosen']; ?></h5>
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="form-line">
                             <h5>NIDN     : <?php echo $d['nidn']; ?></h5>
                         </div>
                     </div>
                 </div>
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
                        <a href="#home_with_icon_title" data-toggle="tab">
                            <i class="material-icons">face</i> PROFIL
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#profile_with_icon_title" data-toggle="tab">
                            <i class="material-icons">account_balance</i> JENJANG S1
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#messages_with_icon_title" data-toggle="tab">
                            <i class="material-icons">account_balance</i> JENJANG S2
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Tanggal Lahir    : <?php echo $d['ttl']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Alamat    : <?php echo $d['alamat']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Telepon     : <?php echo $d['hp_dosen']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>E-Mail    : <?php echo $d['email_dsn']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Nama Institusi    : <?php echo $d['nama_PTS1']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Jurusan    : <?php echo $d['prodiS1']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Tahun Lulus     : <?php echo $d['tahun_lulus1']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Alamat    : <?php echo $d['alamat_PTS1']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Nama Institusi    : <?php echo $d['nama_PTS2']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Jurusan    : <?php echo $d['prodiS2']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Tahun Lulus     : <?php echo $d['tahun_lulus2']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Alamat    : <?php echo $d['alamat_PTS2']; ?></h5>
                                </div>
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
