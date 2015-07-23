<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget widget-table action-table">
                    <div class="widget-header clearfix"> <i class="icon-th-list"></i>
                        <h3>User List</h3>
                        <div class="widget-button">
                            <div class="searchArea">
                                <form style="margin:0" action="beasiswa?<?php echo getLink('q');?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control month" name="month" value="<?php echo ($this->input->get('month')) ? $this->input->get('month'):''; ?>">
                                        
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-calendar"></i>Filter by month</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </form>
                            </div>
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
                            <form style="margin:0" action="beasiswa?<?php echo getLink('q');?>">
                                <div class="input-group">
                                    
                                    <input type="text" class="form-control" placeholder="Cari" name="q" value="<?php echo $this->input->get('q')?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="widget-content">
                        <?php echo $this->session->flashdata('success') ?>                         
                        <?php echo $this->session->flashdata('fail') ?>                 
                        <table class="table" id="userTable">
                            <thead>
                                <tr>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['id_beasiswa'] == 'asc') ? 'desc' : 'asc'; ?>&by=id_beasiswa">ID</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['id_beasiswa'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['nama_lengkap'] == 'asc') ? 'desc' : 'asc'; ?>&by=nama_lengkap">Nama Lengkap</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['nama_lengkap'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['jenis_rek'] == 'asc') ? 'desc' : 'asc'; ?>&by=jenis_rek">Jenis Rekening</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['jenis_rek'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['nama_preferensi'] == 'asc') ? 'desc' : 'asc'; ?>&by=nama_preferensi">Nama Preferensi</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['nama_preferensi'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['nama_kanwil'] == 'asc') ? 'desc' : 'asc'; ?>&by=nama_kanwil">Kanwil</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['nama_kanwil'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($beasiswa as $row){?>
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
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                            <a class="btn btn-danger deleteButton" data-target='#my_modal' data-id="<?php echo $row['id_sc'];?>" data-toggle="modal" role="button"><span class="glyphicon glyphicon-trash"></span>Hapus</a>
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
                            <input type="text" class="form-control month"  name="month" value="<?php echo set_value('month'); ?>">
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