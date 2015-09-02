<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> 
                        <h3>Edit User</h3>
                    </div>
                    <div class="widget-content">
                        <div class="col-sm-12">
                            <form id="insertUser" action="<?php echo site_url('tingkatan/update/'.$id)?>" method="POST" class="form-horizontal">
                                <fieldset>
                                    <?php echo $this->session->flashdata('success') ?>                         
                                    <?php echo $this->session->flashdata('fail') ?>                         
                                    <div class="form-group ">                                         
                                        <label class="control-label col-sm-2 ">Tingkatan</label>
                                        <div class="col-sm-10">
                                            <p><?php echo $data['label']?></p>
                                        </div> <!-- /controls -->            
                                    </div> <!-- /control-group -->

                                    <div class="form-group <?php echo (form_error('besaran')) ? 'has-error' : ''?>">                                         
                                        <label class="control-label col-sm-2 " for="ibu_kota">Besaran Beasiswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="besaran" value="<?php echo $data['besaran']?>"> rupiah
                                        </div> <!-- /controls -->
                                        <?php echo form_error('besaran'); ?>               
                                    </div> <!-- /control-group -->
                                    
                                        
                                     <br />
                                    
                                        
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Save</button> 
                                            <a class="btn" href="<?php echo site_url('tingkatan');?>" role="button">Cancel</a>

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