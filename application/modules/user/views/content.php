<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>User List</h3>
                        <div class="widget-button">
                            <div class="searchArea">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button"><i class="glyphicon glyphicon-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                            </div>
                            <a href="<?php echo site_url('user/insert')?>"><button class="btn btn-primary"><i class="btn-icon icon-plus"></i>Tambah</button></a>
                        </div>
                    </div>
                    
                    <div class="widget-content">
                        <?php echo $this->session->flashdata('success') ?>                         
                        <?php echo $this->session->flashdata('fail') ?>                 
                        <table class="table" id="userTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($user as $row){?>
                                <tr>
                                    <td><?php echo $row['id_user']?>
                                    </td>
                                    <td><?php echo $row['username']?>
                                    </td>
                                    <td><?php echo $row['level']?>
                                    </td>
                                    <td><?php echo ($row['status']=='1') ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                            <a class="btn btn-default" href="<?php echo site_url('user/edit/'.$row['id_user']) ?>" role="button"><span class="glyphicon glyphicon-cog"></span>Edit</a>
                                            <a class="btn btn-danger deleteButton" data-target='#my_modal' data-id="<?php echo $row['id_user'];?>" data-toggle="modal" role="button"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                       
                    </div>
                    <!-- /widget-content --> 
                    <nav>
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /row --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /main-inner --> 
</div>
<!-- /main -->
<div class="modal" id="my_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Hapus Data</h4>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus data?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger delB" href="" role="button">Ya</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>