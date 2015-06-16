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
                                <div class="panel panel-primary">
                                    <div class="panel-heading"><h3 class="panel-title">Data Siswa</h3></div>
                                    <div class="panel-body">
                                        <h4>A. <b>Data Pribadi</b></h4>

                                        <div class="form-group <?php echo (form_error('nama_lengkap')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="nama_lengkap">Nama Lengkap</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>">
                                            </div> <!-- /controls -->
                                            <?php echo form_error('nama_lengkap'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('jenis_kelamin')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="jenis_kelamin">Jenis Kelamin</label>
                                            <div class="col-lg-10">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="inlineRadio1" value="L" name="jenis_kelamin" checked>
                                                    <label for="inlineRadio1"> Laki-laki </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input type="radio" id="inlineRadio2" value="P" name="jenis_kelamin">
                                                    <label for="inlineRadio2"> Wanita </label>
                                                </div>
                                            </div> <!-- /controls -->
                                            <?php echo form_error('jenis_kelamin'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('tempat')||form_error('tanggal_lahir')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="tempat">Tempat / Tanggal Lahir</label>
                                            <div class="col-lg-10">
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id='tempat'><i class="glyphicon glyphicon-globe"></i></span>
                                                        <input type="text" class="form-control" placeholder="Tempat" aria-describedby="tempat" name="tempat">
                                                    </div><!-- /input-group -->
                                                </div><!-- /.col-lg-6 -->
                                                <div class="col-lg-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id='tanggal_lahir'><i class="glyphicon glyphicon-calendar"></i></span>
                                                        <input type="text" class="form-control dp" placeholder="YYYY-MM-DD" aria-describedby="tanggal_lahir" name="tanggal_lahir">
                                                    </div><!-- /input-group -->
                                                </div><!-- /.col-lg-6 -->
                                            </div> <!-- /controls -->
                                            <?php echo form_error('tempat'); ?>               
                                            <?php echo form_error('tanggal_lahir'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('alamat_rumah')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="alamat_rumah">Alamat Rumah</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="<?php echo set_value('alamat_rumah'); ?>">
                                            </div> <!-- /controls -->
                                            <?php echo form_error('alamat_rumah'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="row col-lg-offset-2 col-lg-10">
                                            <div class="form-group ">
                                                <div class="<?php echo (form_error('kelurahan')) ? 'has-error' : ''?> col-lg-6">                                         
                                                    <div>
                                                        <input type="text" placeholder="Kelurahan" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo set_value('kelurahan'); ?>">
                                                    </div> <!-- /controls -->
                                                    <?php echo form_error('kelurahan'); ?>               
                                                </div> <!-- /control-group -->
                                                <div class="<?php echo (form_error('kecamatan')) ? 'has-error' : ''?> col-lg-6">                                         
                                                    <div>
                                                        <input type="text" placeholder="Kecamatan" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo set_value('kecamatan'); ?>">
                                                    </div> <!-- /controls -->
                                                    <?php echo form_error('kecamatan'); ?>               
                                                </div> <!-- /control-group -->
                                            </div>
                                            <div class="form-group ">
                                                <div class="<?php echo (form_error('kota')) ? 'has-error' : ''?> col-lg-6">                                         
                                                    <div>
                                                        <input type="text" placeholder="Kota / Kabupaten" class="form-control" id="kota" name="kota" value="<?php echo set_value('kecamatan'); ?>">
                                                    </div> <!-- /controls -->
                                                    <?php echo form_error('kota'); ?>               
                                                </div> <!-- /control-group -->
                                                <div class="<?php echo (form_error('kode_pos')) ? 'has-error' : ''?> col-lg-6">                                         
                                                    <div>
                                                        <input type="text" placeholder="Kode Pos" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo set_value('kecamatan'); ?>">
                                                    </div> <!-- /controls -->
                                                    <?php echo form_error('kode_pos'); ?>               
                                                </div> <!-- /control-group -->
                                            </div>
                                        </div>

                                        <div class="form-group <?php echo (form_error('id_provinsi')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="id_provinsi">Provinsi</label>
                                            <div class="col-lg-10">
                                                <?php echo form_dropdown('id_provinsi', $provinsi, set_value('level'), 'class="form-control" id="id_provinsi"');?>
                                            </div> <!-- /controls -->
                                            <?php echo form_error('id_provinsi'); ?>               
                                        </div> <!-- /control-group -->
                                
                                        <div class="form-group <?php echo (form_error('telepon')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="telepon">HP / Telepon Rumah</label>
                                            <div class="input-group col-lg-5">
                                                <span class="input-group-addon" id='telepon'><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                <input type="text" class="form-control" placeholder="" aria-describedby="telepon" name="telepon">
                                            </div><!-- /input-group -->
                                            <?php echo form_error('telepon'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('email')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="telepon">Email</label>
                                            <div class="input-group col-lg-5">
                                                <span class="input-group-addon" id='email'><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input type="text" class="form-control" placeholder="" aria-describedby="email" name="email">
                                            </div><!-- /input-group -->
                                            <?php echo form_error('email'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('no_rek')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="telepon">No Rekening BRI/BRIS</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" placeholder="" aria-describedby="no_rek" name="no_rek">
                                            </div><!-- /input-group -->
                                            <?php echo form_error('no_rek'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('rek_nama')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="telepon">Rek. Atas Nama</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" placeholder="" aria-describedby="rek_nama" name="rek_nama">
                                            </div><!-- /input-group -->
                                            <?php echo form_error('rek_nama'); ?>               
                                        </div> <!-- /control-group -->


                                        <h4>B. <b>Data Pendidikan</b></h4>
                                        <div class="form-group <?php echo (form_error('nama_sekolah')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="nama_sekolah">Nama Sekolah</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="<?php echo set_value('nama_sekolah'); ?>">
                                            </div> <!-- /controls -->
                                            <?php echo form_error('nama_sekolah'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('jenis_kelamin')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="jenis_kelamin">Tingkat</label>
                                            <div class="col-lg-10">
                                                    <ul class="list-group">
                                                        <li class="list-group-item sd">
                                                            <label class="control-label gradeLabel col-lg-2">SD :</label>
                                                            <div class="col-lg-10">
                                                                <div class="radio radio-inline sd">
                                                                    <input type="radio" id="inlineRadio3" value="1" name="id_kelas">
                                                                    <label for="inlineRadio3" > Kelas 1 </label>
                                                                </div>
                                                                <div class="radio radio-inline sd">
                                                                    <input type="radio" id="inlineRadio4" value="2" name="id_kelas">
                                                                    <label for="inlineRadio4" > Kelas 2  </label>
                                                                </div>
                                                                <div class="radio radio-inline sd">
                                                                    <input type="radio" id="inlineRadio5" value="3" name="id_kelas">
                                                                    <label for="inlineRadio5" > Kelas 3  </label>
                                                                </div>
                                                                <div class="radio radio-inline sd">
                                                                    <input type="radio" id="inlineRadio6" value="4" name="id_kelas">
                                                                    <label for="inlineRadio6" > Kelas 4  </label>
                                                                </div>
                                                                <div class="radio radio-inline sd">
                                                                    <input type="radio" id="inlineRadio7" value="5" name="id_kelas">
                                                                    <label for="inlineRadio7" > Kelas 5  </label>
                                                                </div>
                                                                <div class="radio radio-inline sd">
                                                                    <input type="radio" id="inlineRadio8" value="6" name="id_kelas">
                                                                    <label for="inlineRadio8" > Kelas 6  </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item smp">
                                                            <label class="control-label gradeLabel col-lg-2">SMP :</label>
                                                            <div class="col-lg-10">
                                                                <div class="radio radio-inline smp">
                                                                    <input type="radio" id="inlineRadio9" value="7" name="id_kelas">
                                                                    <label for="inlineRadio9" > Kelas 1 </label>
                                                                </div>
                                                                <div class="radio radio-inline smp">
                                                                    <input type="radio" id="inlineRadio10" value="8" name="id_kelas">
                                                                    <label for="inlineRadio10" > Kelas 2  </label>
                                                                </div>
                                                                <div class="radio radio-inline smp">
                                                                    <input type="radio" id="inlineRadio11" value="9" name="id_kelas">
                                                                    <label for="inlineRadio11" > Kelas 3  </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item sma">
                                                            <label class="control-label gradeLabel col-lg-2">SMA :</label>
                                                            <div class="col-lg-10">
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio12" value="10" name="id_kelas">
                                                                    <label for="inlineRadio12" > Kelas 1 </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio13" value="11" name="id_kelas">
                                                                    <label for="inlineRadio13" > Kelas 2  </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio14" value="12" name="id_kelas">
                                                                    <label for="inlineRadio14" > Kelas 3  </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item pt">
                                                            <label class="control-label gradeLabel col-lg-2">PT :</label>
                                                            <div class="col-lg-10">
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio15" value="10" name="id_kelas">
                                                                    <label for="inlineRadio15" > Semester 1 </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio16" value="11" name="id_kelas">
                                                                    <label for="inlineRadio16" > Semester 2  </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio17" value="12" name="id_kelas">
                                                                    <label for="inlineRadio17" > Semester 3  </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio18" value="10" name="id_kelas">
                                                                    <label for="inlineRadio18" > Semester 4 </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio19" value="11" name="id_kelas">
                                                                    <label for="inlineRadio19" > Semester 5  </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio20" value="12" name="id_kelas">
                                                                    <label for="inlineRadio20" > Semester 6  </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio21" value="11" name="id_kelas">
                                                                    <label for="inlineRadio21" > Semester 7  </label>
                                                                </div>
                                                                <div class="radio radio-inline">
                                                                    <input type="radio" id="inlineRadio22" value="12" name="id_kelas">
                                                                    <label for="inlineRadio22" > Semester 8  </label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </li>
                                                    
                                                
                                            </div> <!-- /controls -->
                                            <?php echo form_error('jenis_kelamin'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('alamat_sekolah')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="alamat_sekolah">Alamat Sekolah</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" value="<?php echo set_value('alamat_sekolah'); ?>">
                                            </div> <!-- /controls -->
                                            <?php echo form_error('alamat_sekolah'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('telepon_sekolah')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="telepon_sekolah">Telepon Sekolah</label>
                                            <div class="input-group col-lg-5">
                                                <span class="input-group-addon" id='telepon_sekolah'><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                <input type="text" class="form-control" placeholder="" aria-describedby="telepon_sekolah" name="telepon_sekolah">
                                            </div><!-- /input-group -->
                                            <?php echo form_error('telepon_sekolah'); ?>               
                                        </div> <!-- /control-group -->

                                        <div class="form-group <?php echo (form_error('nama_kepsek')) ? 'has-error' : ''?>">                                         
                                            <label class="control-label col-lg-2 " for="nama_kepsek">Alamat Sekolah</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek" value="<?php echo set_value('nama_kepsek'); ?>">
                                            </div> <!-- /controls -->
                                            <?php echo form_error('nama_kepsek'); ?>               
                                        </div> <!-- /control-group -->

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