<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">supervisor_account</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>TABEL STAF PRODI</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Staf</th>
                        <th>Prodi</th>
                        <th width="110">
                          <?php
                            echo '<a href="'.base_url().'admin/tambah_staf"class="btn bg-blue waves-effect">Tambah</a>';
                          ?>
                        </th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php
                        $no=1;
                        foreach($staf->result_array() as $s)
                        {
                        echo'<tr>
                        <td width="10" align="center">'.$no.'</td>
                        <td>'.$s['kd_staf'].'</td>
                        <td>'.$s['nama_staf'].'</td>
                        <td>'.$s['nama_prodi'].'</td>';

                        echo '<td width="110" align="center"><a href="'.base_url().'admin/profil_staf/'.$s['kd_staf'].'
                        "class="btn bg-teal btn-circle waves-effect waves-circle waves-float" title="profil"><i class="material-icons">person</i></a>
                        <a href="'.base_url().'admin/edit_staf/'.$s['kd_staf'].' "class="btn btn-success btn-circle waves-effect waves-circle waves-float" title="edit">
                        <i class="material-icons">create</i></a>
                        <a href="'.base_url().'admin/hapus_staf/'.$s['kd_staf'].' " onClick=\'return confirm("Anda yakin ingin menghapus data ini..??")\'
                        class="btn btn-danger btn-circle waves-effect waves-circle waves-float" title="hapus"><i class="material-icons">delete_sweep</i></a>
                        </td></tr>';
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
