<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>User List</h3>
                        <div class="widget-button">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="btn-icon glyphicon glyphicon-briefcase"></i> Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#" data-toggle="modal" data-target="#cetaksc">Cetak Salary Crediting</a></li>
                                    <li><a href="<?php echo site_url('kandidat/naikKelas');?>">Kirim E-mail</a></li>
                                </ul>
                            </div>
                            <div class="searchArea">
                            <form style="margin:0" action="user?<?php echo getLink('q');?>">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari" name="q" value="<?php echo $this->input->get('q')?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
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
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['id_user'] == 'asc') ? 'desc' : 'asc'; ?>&by=id_user">ID</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['id_user'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['username'] == 'asc') ? 'desc' : 'asc'; ?>&by=username">Username</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['username'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['level'] == 'asc') ? 'desc' : 'asc'; ?>&by=level">Level</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['level'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($user as $row){?>
                                <tr>
                                    <td><?php echo $row['id_beasiswa']?>
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
                    
                   <?php echo $page;?>
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
<div class="modal fade" id="cetaksc" tabindex="-1" role="dialog" aria-labelledby="Cetak Salary Crediting">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="<?php echo site_url('beasiswa/cetaksc');?>" method="GET">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cetak Salary Crediting</h4>
                </div>
                <div class="modal-body clearfix">
                    <div class="form-group <?php echo (form_error('month')) ? 'has-error' : ''?>">                                         
                        <label class="control-label col-sm-2 " for="month">Bulan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="month" name="month" value="<?php echo set_value('month'); ?>">
                        </div> <!-- /controls -->
                        <?php echo form_error('month'); ?>               
                    </div> <!-- /control-group -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>