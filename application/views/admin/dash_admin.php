<div class="row clearfix">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"><!-- Content -->
        <div class="card"> <!-- Berita dari admin untuk staf prodi -->
            <div class="info-box bg-teal hover-zoom-effect">
              <div class="icon"> <i class="material-icons">message</i> </div>
              <div class="content">
                  <div class="text">Admin</div> <h4>BERITA PRODI</h4>
              </div>
            </div>
            <div class="body">
               <div class="list-group">
                  <?php
                       $temp='';
                       $rows=array();
                  ?>
                  <?php
                       foreach($berita->result_array() as $b)
                       {
                         if($temp=='')
                           { $rows[]= '<a href="'.base_url().'admin/lihat_berita/'.$b['kode_brt'].'" class="list-group-item list-group-bg-teal">'.$b['judul'].'</a>'; }
                         else if($b['judul']!=$temp)
                           { $rows[]= '<a href="'.base_url().'admin/lihat_berita/'.$b['kode_brt'].'" class="list-group-item list-group-bg-teal">'.$b['judul'].'</a>'; }
                         else
                           { $rows[]= '<a href="'.base_url().'admin/lihat_berita/'.$b['kode_brt'].'" class="list-group-item list-group-bg-teal">'.$b['judul'].'</a>'; }
                         $temp=$b['judul'];
                       }
                       foreach($rows as $row)
                       { echo $row; }
                   ?>
               </div>
            </div>
         </div> <!-- #END Berita dari admin untuk staf prodi -->
        <div class="card"> <!-- Berita dari admin untuk user -->
            <div class="info-box bg-green hover-zoom-effect">
              <div class="icon"> <i class="material-icons">message</i> </div>
              <div class="content">
                  <div class="text">Admin</div> <h4>BERITA AKADEMIK</h4>
              </div>
            </div>
            <div class="body">
               <div class="list-group">
                   <?php
                       $temp='';
                       $rows=array();
                   ?>
                   <?php
                       foreach($beritaAkademik->result_array() as $b)
                       {
                         if($temp=='')
                           { $rows[]= '<a href="'.base_url().'admin/lihat_berita/'.$b['kode_brt'].'" class="list-group-item list-group-bg-green">'.$b['judul'].'</a>'; }
                         else if($b['judul']!=$temp)
                           { $rows[]= '<a href="'.base_url().'admin/lihat_berita/'.$b['kode_brt'].'" class="list-group-item list-group-bg-green">'.$b['judul'].'</a>'; }
                         else
                           { $rows[]= '<a href="'.base_url().'admin/lihat_berita/'.$b['kode_brt'].'" class="list-group-item list-group-bg-green">'.$b['judul'].'</a>'; }
                         $temp=$b['judul'];
                       }
                       foreach($rows as $row)
                       { echo $row; }
                   ?>
               </div>
            </div>
         </div> <!-- #END Berita dari admin untuk user -->
    </div> <!-- #END Content -->
    <!-- Linked Items -->
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"> <!-- Content Side -->
        <div class="card"> <!-- External Link -->
          <div class="info-box bg-pink hover-zoom-effect">
              <div class="icon"> <i class="material-icons">link</i> </div>
              <div class="content">
                  <div class="text">Admin</div> <h4>EXTERNAL LINK</h4>
              </div>
          </div>
          <div class="body">
              <div class="list-group">
              <?php
                foreach($uplink->result_array() as $l)
                { echo'<a href="'.$l['url'].'" target="'.$l['target'].'" class="list-group-item">'.$l['judul'].'</a>'; }
              ?>
              </div>
          </div>
      </div> <!-- #END External Link -->
        <div class="card"> <!-- Download Link -->
          <div class="info-box bg-cyan hover-zoom-effect">
              <div class="icon"> <i class="material-icons">file_download</i> </div>
              <div class="content">
                  <div class="text">Admin</div> <h4>Download</h4>
              </div>
          </div>
          <div class="body">
              <div class="list-group">
                  <a target="_blank" href="javascript:void(0);" class="list-group-item">Panduan Siakad.pdf <i class="material-icons">picture_as_pdf</i></a>
                  <a target="_blank" href="javascript:void(0);" class="list-group-item">Logo UMUS.png <i class="material-icons">image</i></a>
              </div>
          </div>
      </div> <!-- #END Download Link -->
    </div> <!-- #END Content Side -->
</div>
