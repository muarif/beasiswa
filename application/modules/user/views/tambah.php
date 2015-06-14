<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> 
                        <h3>Tambah User</h3>
                    </div>
                    <div class="widget-content">
                    <div class="col-sm-12">
                        <form id="insertUser" action="<?php echo site_url('user/add')?>" method="POST" class="form-horizontal">
                            <fieldset>
                                                                
                                <div class="form-group <?php echo (form_error('username')) ? 'has-error' : ''?>">                                         
                                    <label class="control-label col-sm-2 " for="username">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>">
                                    </div> <!-- /controls -->
                                    <?php echo form_error('username'); ?>               
                                </div> <!-- /control-group -->
                                                                
                                <div class="form-group <?php echo (form_error('password')) ? 'has-error' : ''?>">                                         
                                    <label class="control-label col-sm-2 " for="password">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" value="">
                                    </div> <!-- /controls --> 
                                    <?php echo form_error('password'); ?>              
                                </div> <!-- /control-group -->
                                
                                
                                <div class="form-group <?php echo (form_error('password2')) ? 'has-error' : ''?>">                                         
                                    <label class="control-label col-sm-2 " for="password2">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password2" name="password2">
                                    </div> <!-- /controls -->     
                                    <?php echo form_error('password2'); ?>          
                                </div> <!-- /control-group -->
                                
                                 <div class="form-group <?php echo (form_error('level')) ? 'has-error' : ''?>">                                         
                                    <label class="control-label col-sm-2 " for="level">User Level</label>
                                    <div class="col-sm-10">
                                        <?php echo form_dropdown('level', $level, set_value('level'), 'class="form-control" id="level"');?>
                                    </div> <!-- /controls -->      
                                    <?php echo form_error('level'); ?>         
                                </div> <!-- /control-group -->
                                
                                    
                                 <br />
                                
                                    
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">
                                        Save</button> 
                                        <a class="btn" href="<?php echo site_url('user');?>" role="button">Cancel</a>

                                    </div>
                                </div> 
                            </fieldset>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- /row --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /main-inner --> 
</div>
<!-- /main -->