<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Kanwil List</h3>
                        <div class="widget-button">
                            <div class="searchArea">
                            <form style="margin:0" action="kanwil?<?php echo getLink('q');?>">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari" name="q" value="<?php echo $this->input->get('q')?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                            </div>
                            <a href="<?php echo site_url('kanwil/insert')?>"><button class="btn btn-primary"><i class="btn-icon icon-plus"></i>Tambah</button></a>
                        </div>
                    </div>
                    
                    <div class="widget-content">
                        <?php echo $this->session->flashdata('success') ?>                         
                        <?php echo $this->session->flashdata('fail') ?>                 
                        <table class="table" id="kanwilTable">
                            <thead>
                                <tr>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['id_kanwil'] == 'asc') ? 'desc' : 'asc'; ?>&by=id_kanwil">ID Kanwil</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['id_kanwil'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['nama_kanwil'] == 'asc') ? 'desc' : 'asc'; ?>&by=nama_kanwil">Nama Kanwil</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['nama_kanwil'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['wilayah_kerja'] == 'asc') ? 'desc' : 'asc'; ?>&by=wilayah_kerja">Wilayah Kerja</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['wilayah_kerja'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($kanwil as $row){?>
                                <tr>
                                    <td><?php echo $row['id_kanwil']?>
                                    </td>
                                    <td><?php echo $row['nama_kanwil']?>
                                    </td>
                                    <td><?php echo $row['wilayah_kerja']?>
                                    </td>
                                    <td><?php echo ($row['aktif']=='1') ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                            <a class="btn btn-default" href="<?php echo site_url('kanwil/edit/'.$row['id_kanwil']) ?>" role="button"><span class="glyphicon glyphicon-cog"></span>Edit</a>
                                            <a class="btn btn-danger deleteButton" data-target='#my_modal' data-id="<?php echo $row['id_kanwil'];?>" data-toggle="modal" role="button"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
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