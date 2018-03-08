<!-- With Material Design Colors -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-pink hover-zoom-effect">
              <div class="icon">
                  <i class="material-icons">today</i>
              </div>
              <div class="content">
                  <div class="text">Admin</div>
                  <h4>TABEL TAHUN AKADEMIK</h4>
              </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Tahun</th>
                            <th>Keterangan</th>
                            <th>TGL Perkuliahan</th>
                            <th>Batas Perwalian</th>
                            <th>Status</th>
                            <th width="105" align="center">
                              <?php echo '<button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#largeModal">Tambah</button>'; ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no=1;
                        foreach($thn_akademik->result_array() as $t)
                        {
                        echo'<tr>
                        <td width="10" align="center">'.$no.'</td>
                        <td>'.$t['kd_tahun'].'</td>
                        <td>'.$t['keterangan'].'</td>
                        <td>'.$t['tgl_kuliah'].'</td>
                        <td>'.$t['batas_perwalian'].'</td>
                        <td width="10" align="center">'.$t['stts_thn'].'</td>';
                        echo '<td width="105" align="center">
                        <a href="'.base_url().'admin/edit_thn/'.$t['kd_tahun'].' "class="btn btn-success btn-circle waves-effect waves-circle waves-float"
                        title="edit"> <i class="material-icons">create</i></a>
                        <a href="'.base_url().'admin/hapus_tahun/'.$t['kd_tahun'].' " onClick=\'return confirm("Anda yakin ingin menghapus data ini..??")\'
                        class="btn btn-danger btn-circle waves-effect waves-circle waves-float" title="hapus"><i class="material-icons">delete_sweep</i></a></td>
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
<!-- #END# With Material Design Colors -->

<!-- Modal Large Size -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">FORM TAMBAH TAHUN AKADEMIK</h4>
            </div>
              <form action="<?php echo base_url();?>admin/simpan_thn" method="post">
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="kd_tahun" class="form-control">
                                 <label class="form-label">Kode Tahun</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="keterangan" class="form-control">
                                <label class="form-label">Keterangan</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="tgl_kuliah" class="form-control">
                                 <label class="form-label">Tgl Perkuliahan</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="batas_perwalian" class="form-control">
                                <label class="form-label">Batas Waktu Perwalian</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                       <div class="form-group form-float">
                        <div class="form-line">
                          <select name="stts_thn" class="form-control show-tick" data-live-search="true">
                            <option value="0">Status</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                          </select>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-link waves-effect">SAVE</button>
              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                <input type="hidden" name="stts" value="tambah">
            </div>
          </form>
        </div>
    </div>
</div>
<!-- #END# Modal Large Size -->
