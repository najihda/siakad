<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">assignment_ind</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>TABEL DOSEN</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Dosen</th>
                        <th>Prodi</th>
                        <th width="110">Action</th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php
                        $no=1;
                        foreach($dosen->result_array() as $d)
                        {
                        echo'<tr>
                        <td width="10" align="center">'.$no.'</td>
                        <td>'.$d['kd_dosen'].'</td>
                        <td>'.$d['nama_dosen'].'</td>
                        <td>'.$d['nama_prodi'].'</td>';
                        echo '<td width="70" align="center">
                        <a href="'.base_url().'admin/dosen_mk/'.$d['kd_dosen'].' "class="btn bg-indigo btn-circle waves-effect waves-circle waves-float"
                        title="dosen mk"><i class="material-icons">launch</i></a>
                        <a href="'.base_url().'admin/profil_dosen/'.$d['kd_dosen'].' "class="btn bg-teal btn-circle waves-effect waves-circle waves-float"
                        title="profil"><i class="material-icons">person</i></a>
                        <a target="_blank" href="'.base_url().'cetak/cetakprofil_dosen/'.$d['kd_dosen'].'"
                        class="btn bg-blue btn-circle waves-effect waves-circle waves-float" title="Cetak Data"><i class="material-icons">print</i></a></td>
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