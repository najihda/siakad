<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">credit_card</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>TABEL KHS MAHASISWA</h4>
              </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Mahasiswa</th>
                        <th>Prodi</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th width="20">Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        foreach($mhs->result_array() as $k)
                        {
                            $st = "";
                            if($k['status']=='1'){
                              $st = "Sudah Disetujui";
                            }
                            echo'<tr>
                            <td>'.$no.'</td>
                            <td>'.$k['nim'].'</td>
                            <td>'.$k['nama_mahasiswa'].'</td>
                            <td>'.$k['kd_prodi'].'</td>
                            <td>'.$k['kelas_program'].'</td>
                            <td>'.$st.'</td>';
                            echo '<td><a href="'.base_url().'admin/input_nilai/'.$k['nim'].'" title="Lihat Transkip - '.$k['nama_mahasiswa'].'"class="btn bg-indigo btn-circle waves-effect waves-circle waves-float"><i class="material-icons">launch</i></a></td>
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