<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Kandidat List</h3>
                        <div class="widget-button">
                            <div class="searchArea">
                            <form style="margin:0" action="kandidat?<?php echo getLink('q');?>">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari" name="q" value="<?php echo $this->input->get('q')?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                            </div>
                            <a href="<?php echo site_url('kandidat/insert')?>"><button class="btn btn-primary"><i class="btn-icon icon-plus"></i>Tambah</button></a>
                        </div>
                    </div>
                    
                    <div class="widget-content">
                        <?php echo $this->session->flashdata('success') ?>                         
                        <?php echo $this->session->flashdata('fail') ?> 
                        <?php echo $this->session->flashdata('warning') ?> 
                        <div class="table-responsive" data-pattern="priority-columns">                
                            <table class="table" id="userTable">
                                <thead>
                                    <tr>
                                        <th data-priority="3"><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['id_beasiswa'] == 'asc') ? 'desc' : 'asc'; ?>&by=id_beasiswa">ID Beasiswa</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['id_beasiswa'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                        <th data-priority="1"><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['nama_lengkap'] == 'asc') ? 'desc' : 'asc'; ?>&by=nama_lengkap">Username</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['nama_lengkap'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                        <th data-priority="5"><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['jenis_rek'] == 'asc') ? 'desc' : 'asc'; ?>&by=jenis_rek">Jenis Rekening</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['jenis_rek'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                        <th data-priority="4"><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['nama_preferensi'] == 'asc') ? 'desc' : 'asc'; ?>&by=nama_preferensi">Perekomendasi</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['nama_preferensi'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                        <th data-priority="2"><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['nama_kanwil'] == 'asc') ? 'desc' : 'asc'; ?>&by=nama_kanwil">Kanwil</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['nama_kanwil'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($kandidat as $row){?>
                                    <tr>
                                        <td><?php echo $row['id_beasiswa']?>
                                        </td>
                                        <td><?php echo $row['nama_lengkap']?>
                                        </td>
                                        <td><?php echo $row['jenis_rek']?>
                                        </td>
                                        <td><?php echo $row['nama_preferensi']?>
                                        </td>
                                        <td><?php echo $row['nama_kanwil']?>
                                        </td>
                                        <td><?php echo ($row['status']=='1') ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>' ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                                <a class="btn btn-success" href="<?php echo site_url('kandidat/view/'.$row['id_siswa']) ?>" role="button"><span class="glyphicon glyphicon-search"></span>View</a>
                                                <a class="btn btn-default" href="<?php echo site_url('kandidat/edit/'.$row['id_siswa']) ?>" role="button"><span class="glyphicon glyphicon-cog"></span>Edit</a>
                                                <a class="btn btn-danger deleteButton" data-target='#my_modal' data-id="<?php echo $row['id_siswa'];?>" data-toggle="modal" role="button"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
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