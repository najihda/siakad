<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">person</i>
              </div>
              <div class="content">
                  <div class="text">Staf Prodi</div>
                  <h4>TABEL MAHASISWA</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Mahasiswa</th>
                        <th>Angkatan</th>
                        <th width="50">
                          <?php
                            echo '<a href="'.base_url().'staf/tambah_mahasiswa"class="btn bg-blue waves-effect waves-float">Tambah</a>';
                          ?>
                        </th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php
                        $no=1;
                        foreach($mhs->result_array() as $m)
                        {
                      echo'<tr>
                        <td width="10" align="center">'.$no.'</td>
                        <td>'.$m['nim'].'</td>
                        <td>'.$m['nama_mahasiswa'].'</td>
                        <td>'.$m['angkatan'].'</td>';

                      echo '<td width="50" align="center"><a href="'.base_url().'staf/profil_mahasiswa/'.$m['nim'].' "class="btn bg-teal btn-circle waves-effect waves-circle waves-float" title="profil"><i class="material-icons">person</i></a>
                      <a href="'.base_url().'staf/edit_mahasiswa/'.$m['nim'].' "class="btn bg-green btn-circle waves-effect waves-circle waves-float" title="edit"><i class="material-icons">create</i></a></td>
                      </tr>';
                        $no++;
                        }
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->