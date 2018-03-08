<div class="row clearfix">
    <?php
        foreach ($ad->result_array() as $s)
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
                            <div class="text">Admin</div>
                            <h4>PROFIL</h4>
                        </div>
                    </div>
             <div class="body">
                 <div class="form-group">
                     <div class="form-group">
                         <div class="form-line">
                             <h5>Nama    : <?php echo $s['nama_lengkap']; ?></h5>
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="form-line">
                             <h5>Kode     : <?php echo $s['username']; ?></h5>
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
                                    <h5>Alamat    : <?php echo $s['alamat']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>Telepon     : <?php echo $s['hp_admin']; ?></h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <h5>E-Mail    : <?php echo $s['email_admin']; ?></h5>
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
