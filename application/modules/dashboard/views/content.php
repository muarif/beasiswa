<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      
        <div class="col-md-6">

          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Kandidat Baru</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="table-responsive" data-pattern="priority-columns">                
                            <table class="table" id="userTable">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Nama</th>
                                        <th data-priority="2">Kanwil</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(count($kandidat_baru)>0){
                                      foreach($kandidat_baru as $row){?>
                                      <tr>
                                          <td><?php echo $row['nama_lengkap']?>
                                          </td>
                                          <td><?php echo $row['nama_kanwil']?>
                                          </td>
                                          <td>
                                              <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                                  <a class="btn btn-success" href="<?php echo site_url('kandidat/view/'.$row['id_siswa']) ?>" role="button"><span class="glyphicon glyphicon-search"></span>View</a>
                                              </div>
                                          </td>
                                      </tr>
                                      <?php }
                                    }else{
                                      ?>
                                      <tr>
                                          <td colspan="3" class="nothing">
                                              Tidak ada data kandidat
                                          </td>
                                      </tr>
                                      <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="<?php echo site_url('kandidat');?>" class="btn btn-primary" >
                          Lihat Semua Kandidat
                        </a>
            </div>

            <!-- /widget-content --> 
          </div>

          
        </div>
        <div class="col-md-6">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Kandidat tidak lulus</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="table-responsive" data-pattern="priority-columns">                
                            <table class="table" id="userTable">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Nama</th>
                                        <th data-priority="2">Kanwil</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(count($kandidat_tidak_lulus)>0){
                                      foreach($kandidat_tidak_lulus as $row){?>
                                      <tr>
                                          <td><?php echo $row['nama_lengkap']?>
                                          </td>
                                          <td><?php echo $row['nama_kanwil']?>
                                          </td>
                                          <td>
                                              <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                                  <a class="btn btn-success" href="<?php echo site_url('kandidat/view/'.$row['id_siswa']) ?>" role="button"><span class="glyphicon glyphicon-search"></span>View</a>
                                              </div>
                                          </td>
                                      </tr>
                                      <?php }
                                    }else{
                                      ?>
                                      <tr>
                                          <td colspan="3" class="nothing">
                                              Tidak ada data kandidat
                                          </td>
                                      </tr>
                                      <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                         <a href="<?php echo site_url('kandidat');?>" class="btn btn-primary" >
                          Lihat Semua Kandidat
                        </a>
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
        <!-- /span6 -->
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Peserta Aktif</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="table-responsive" data-pattern="priority-columns">                
                <table class="table" id="userTable">
                    <thead>
                        <tr>
                            <th data-priority="1">Nama</th>
                            <th data-priority="2">Kanwil</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(count($peserta_aktif)>0){
                          foreach($peserta_aktif as $row){?>
                          <tr>
                              <td><?php echo $row['nama_lengkap']?>
                              </td>
                              <td><?php echo $row['nama_kanwil']?>
                              </td>
                              <td>
                                  <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                      <a class="btn btn-success" href="<?php echo site_url('peserta/view/'.$row['id_siswa']) ?>" role="button"><span class="glyphicon glyphicon-search"></span>View</a>
                                  </div>
                              </td>
                          </tr>
                          <?php }
                        }else{
                          ?>
                          <tr>
                              <td colspan="3" class="nothing">
                                  Tidak ada data peserta
                              </td>
                          </tr>
                          <?php
                        } ?>
                    </tbody>
                </table>
            </div>
           <a href="<?php echo site_url('peserta');?>" class="btn btn-primary" >
                          Lihat Semua Peserta
                        </a>
          </div>

            <!-- /widget-content --> 
          </div>

          
        </div>
        <div class="col-md-6">

          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Peserta Tidak Aktif</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="table-responsive" data-pattern="priority-columns">                
                            <table class="table" id="userTable">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Nama</th>
                                        <th data-priority="2">Kanwil</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    if(count($peserta_ta)>0){
                                      foreach($peserta_ta as $row){?>
                                      <tr>
                                          <td><?php echo $row['nama_lengkap']?>
                                          </td>
                                          <td><?php echo $row['nama_kanwil']?>
                                          </td>
                                          <td>
                                              <div class="btn-group btn-group-xs" role="group" aria-label="Button Group">
                                                  <a class="btn btn-success" href="<?php echo site_url('peserta/view/'.$row['id_siswa']) ?>" role="button"><span class="glyphicon glyphicon-search"></span>View</a>
                                              </div>
                                          </td>
                                      </tr>
                                      <?php }
                                    }else{
                                      ?>
                                      <tr>
                                          <td colspan="3" class="nothing">
                                              Tidak ada data peserta
                                          </td>
                                      </tr>
                                      <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <a href="<?php echo site_url('peserta');?>" class="btn btn-primary" >
                          Lihat Semua Peserta
                        </a>
            </div>

            <!-- /widget-content --> 
          </div>
        </div>
        <!-- /span6 -->
      </div>
      <div class="row">
        <div class="widget">
              <div class="widget-header"> <i class="icon-bookmark"></i>
                  <h3>Important Shortcuts</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <div class="shortcuts"> 
                  <?php if($this->session->userdata('id_level')==1){ ?>
                  <a href="<?php echo site_url('user');?>" class="shortcut">
                    <i class="shortcut-icon fa fa-user"></i>
                    <span class="shortcut-label">Users</span> 
                  </a>
                  <?php } ?>
                  <a href="<?php echo site_url('kandidat');?>" class="shortcut">
                    <i class="shortcut-icon fa fa-users"></i>
                    <span class="shortcut-label">Kandidat</span> 
                  </a>
                  <a href="<?php echo site_url('peserta');?>" class="shortcut">
                    <i class="shortcut-icon glyphicon glyphicon-education"></i>
                    <span class="shortcut-label">Peserta</span> 
                  </a>
                  <?php if($this->session->userdata('id_level')!=3){ ?><a href="<?php echo site_url('beasiswa');?>" class="shortcut">
                    <i class="shortcut-icon glyphicon glyphicon-usd"></i>
                    <span class="shortcut-label">Beasiswa</span> 
                  </a><?php } ?>
                  <?php if($this->session->userdata('id_level')==1){ ?><a href="<?php echo site_url('kanwil');?>" class="shortcut">
                    <i class="shortcut-icon glyphicon glyphicon-map-marker"></i>
                    <span class="shortcut-label">Kanwil</span> 
                  </a><?php } ?>
                  <?php if($this->session->userdata('id_level')==1){ ?>
                  <a href="<?php echo site_url('provinsi');?>" class="shortcut">
                    <i class="shortcut-icon glyphicon glyphicon-globe"></i>
                    <span class="shortcut-label">Provinsi</span> 
                  </a><?php } ?>
                </div>
                <!-- /shortcuts --> 
              </div>
              <!-- /widget-content --> 
          </div>
          <!-- /widget -->
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->