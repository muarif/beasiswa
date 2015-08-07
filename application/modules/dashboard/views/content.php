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
                                        <th data-priority="1">Username</th>
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
                <div class="shortcuts"> <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span
                                          class="shortcut-label">Apps</span> </a><a href="javascript:;" class="shortcut"><i
                                              class="shortcut-icon icon-bookmark"></i><span class="shortcut-label">Bookmarks</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Reports</span> </a><a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Comments</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-user"></i><span
                                                  class="shortcut-label">Users</span> </a><a href="javascript:;" class="shortcut"><i
                                                      class="shortcut-icon icon-file"></i><span class="shortcut-label">Notes</span> </a><a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-picture"></i> <span class="shortcut-label">Photos</span> </a><a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-tag"></i><span class="shortcut-label">Tags</span> </a> </div>
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