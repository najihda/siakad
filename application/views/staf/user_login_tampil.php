<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="info-box bg-pink hover-zoom-effect">
                <div class="icon">
                    <i class="material-icons">person</i>
                </div>
                <div class="content">
                    <div class="text">Staf Prodi</div>
                    <h4>USER LOGIN SIAKAD UMUS</h4>
                </div>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th width="110">Action</th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php
                        $no=1;
                        foreach($user->result_array() as $u)
                        {
                        echo'<tr>
                        <td width="10" align="center">'.$no.'</td>
                        <td>'.$u['username'].'</td>
                        <td>'.$u['password'].'</td>
                        <td>'.$u['stts'].'</td>';
                        echo '<td width="10" align="center"><a href="'.base_url().'staf/edit_user/'.$u['username'].' "class="btn btn-success btn-circle waves-effect waves-circle waves-float" title="edit"><i class="material-icons">create</i></a></td>
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
