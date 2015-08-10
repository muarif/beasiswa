<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> 
                        <h3>Tambah Provinsi</h3>
                    </div>
                    <div class="widget-content">
                    <div class="col-sm-12">
                        <form id="insertKanwil" action="<?php echo site_url('provinsi/add')?>" method="POST" class="form-horizontal">
                            <fieldset>
                                                                
                                <div class="form-group <?php echo (form_error('nama_provinsi')) ? 'has-error' : ''?>">                                         
                                    <label class="control-label col-sm-2 " for="nama_provinsi">Nama Provinsi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" value="<?php echo set_value('nama_provinsi'); ?>">
                                    </div> <!-- /controls -->
                                    <?php echo form_error('nama_provinsi'); ?>               
                                </div> <!-- /control-group -->

                                <div class="form-group <?php echo (form_error('ibu_kota')) ? 'has-error' : ''?>">                                         
                                    <label class="control-label col-sm-2 " for="ibu_kota">Ibukota</label>
                                    <div class="col-sm-10">
                                        <textarea name="ibu_kota" class="form-control" id="ibu_kota"><?php echo set_value('ibu_kota'); ?></textarea>
                                    </div> <!-- /controls -->
                                    <?php echo form_error('ibu_kota'); ?>               
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