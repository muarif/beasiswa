<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-th-list"></i>
                        <h3>Tingkatan Pendidikan</h3>
                        <div class="widget-button">
                            <div class="searchArea">
                            <form style="margin:0" action="provinsi?<?php echo getLink('q');?>">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari" name="q" value="<?php echo $this->input->get('q')?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                            </div>
                            <a href="<?php echo site_url('provinsi/insert')?>"><button class="btn btn-primary"><i class="btn-icon icon-plus"></i>Tambah</button></a>
                        </div>
                    </div>
                    
                    <div class="widget-content">
                        <?php echo $this->session->flashdata('success') ?>                         
                        <?php echo $this->session->flashdata('fail') ?>                 
                        <table class="table" id="kanwilTable">
                            <thead>
                                <tr>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['tingkatan'] == 'asc') ? 'desc' : 'asc'; ?>&by=tingkatan">Tingkatan</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['tingkatan'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['label'] == 'asc') ? 'desc' : 'asc'; ?>&by=label">Nama Tingkatan</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['label'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th><a href="?<?php echo getLink('sort','desc')?>&sort=<?php echo ($sort['besaran'] == 'asc') ? 'desc' : 'asc'; ?>&by=besaran">Besaran Nominal Beasiswa</a><i class="glyphicon glyphicon-triangle-<?php echo ($sort['besaran'] == 'asc') ? 'bottom' : 'top'; ?>"></i></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tingkatan as $row){?>
                                <tr>
                                    <td><?php echo $row['tingkatan']?>
                                    </td>
                                    <td><?php echo $row['label']?>
                                        <ul>
                                            <?php foreach($row['kelas'] as $val){
                                                echo '<li>'.$val['label'].'</li>';
                                            }
                                            ?>
                                        </ul>
                                    </td>
                                    <td><?php echo $row['besaran']?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                            <a class="btn btn-default" href="<?php echo site_url('tingkatan/edit/'.$row['id_tingkatan']) ?>" role="button"><span class="glyphicon glyphicon-cog"></span>Ubah Besaran Nominal</a>
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