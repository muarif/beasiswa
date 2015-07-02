<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> 
                        <h3>Tambah Kanwil</h3>
                    </div>
                    <div class="widget-content">
                    <div class="col-sm-12">
                        <form id="insertKanwil" action="<?php echo site_url('kanwil/add')?>" method="POST" class="form-horizontal">
                            <fieldset>
                                                                
                                <div class="form-group <?php echo (form_error('nama_kanwil')) ? 'has-error' : ''?>">                                         
                                    <label class="control-label col-sm-2 " for="nama_kanwil">Nama Kanwil</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_kanwil" name="nama_kanwil" value="<?php echo set_value('nama_kanwil'); ?>">
                                    </div> <!-- /controls -->
                                    <?php echo form_error('nama_kanwil'); ?>               
                                </div> <!-- /control-group -->

                                <div class="form-group <?php echo (form_error('wilayah_kerja')) ? 'has-error' : ''?>">                                         
                                    <label class="control-label col-sm-2 " for="wilayah_kerja">Wilayah Kerja</label>
                                    <div class="col-sm-10">
                                        <textarea name="wilayah_kerja" class="form-control" id="wilayah_kerja"><?php echo set_value('wilayah_kerja'); ?></textarea>
                                    </div> <!-- /controls -->
                                    <?php echo form_error('wilayah_kerja'); ?>               
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