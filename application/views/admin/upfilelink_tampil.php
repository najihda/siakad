<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">link</i>
                </div>
                <div class="content">
                    <div class="text">Admin</div>
                    <h4>TABEL LINK EKSTERNAL</h4>
                </div>
            </div>
            <div class="body">
            	<div class="body table-responsive">
	                <table class="table table-condensed">
	                    <thead>
	                        <tr>
	                            <th width="10" align="center">No</th>
	                            <th>Judul</th>
	                            <th>Url</th>
	                            <th>Target</th>
	                            <th width="50" align="center">
	                              <?php
	                                echo '<button type="button" class="btn bg-blue waves-effect" data-toggle="modal" data-target="#largeModal45">Tambah</button>';
	                              ?>
	                            </th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                      <?php
	                        $no=1;
	                        foreach($uplink->result_array() as $ul)
	                        {
	                        echo'<tr>
	                        <td width="10" align="center">'.$no.'</td>
	                        <td>'.$ul['judul'].'</td>
	                        <td>'.$ul['url'].'</td>
	                        <td>'.$ul['target'].'</td>';
	                        echo '<td width="50" align="center">
	                        <a href="'.base_url().'admin/hapus_uplink/'.$ul['id'].' " onClick=\'return confirm("Anda yakin ingin menghapus data ini...??")\'
	                        class="btn btn-danger btn-circle waves-effect waves-circle waves-float" title="hapus"><i class="material-icons">delete_sweep</i></a></td></tr>';
	                        $no++;
	                        }
	                      ?>
	                    </tbody>
	                </table>
	            </div>
            </div>
        </div>
    </div>
</div>

<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-blue hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">file_upload</i>
                </div>
                <div class="content">
                    <div class="text">Admin</div>
                    <h4>TABEL FILE UPLOAD</h4>
                </div>
            </div>
            <div class="body">
                Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
            </div>
        </div>
    </div>
</div>

<!-- Modal Large Size -->
<div class="modal fade" id="largeModal55" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">FORM EDIT LINK</h4>
            </div>
            <div class="fetched-data"></div>
        </div>
    </div>
</div>
<!-- #END# Modal Large Size -->
  <script type="text/javascript">
    $(document).ready(function(){
        $('#largeModal55').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'staf.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

<!-- Modal Large Size -->
<div class="modal fade" id="largeModal45" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="largeModalLabel">FORM TAMBAH LINK</h4>
            </div>
              <form action="<?php echo base_url();?>admin/simpan_link" method="post">
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                 <input type="text" name="id" class="form-control">
                                 <label class="form-label">ID Link</label>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-4 col-sm-3 col-xs-6">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="judul" class="form-control">
                                <label class="form-label">Judul Link</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-3 col-xs-6">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input type="text" name="url" class="form-control" required>
                                <label class="form-label">URL</label>
                                <div class="help-info">Starts with http://, https://, ftp:// etc</div>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                         <div class="form-group form-float">
                             <div class="form-line">
                                <input value="_blank" type="text" name="target" class="form-control" readonly>
                                <label class="form-label">Target</label>
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