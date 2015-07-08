<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> 
                        <h3>Edit Kandidat</h3>
                    </div>
                    <div class="widget-content">
                    <div class="col-sm-12">
                        <form id="insertUser" action="<?php echo site_url('kandidat/update/'.$id)?>" method="POST" class="form-horizontal">
                            <fieldset>
                                <div id="rootwizard">
                                    <ul>
                                        <li><a href="#tab1" data-toggle="tab">Data Siswa</a></li>
                                        <li><a href="#tab2" data-toggle="tab">Data Orang Tua Siswa</a></li>
                                        <li><a href="#tab3" data-toggle="tab">Data Preferensi</a></li>
                                        <li><a href="#tab4" data-toggle="tab">Kelengkapan</a></li>
                                    </ul>
                                    <div id="bar" class="progress">
                                        <div class="progress-bar active progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab1">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading"><h3 class="panel-title">Data Pribadi</h3></div>
                                                <div class="panel-body">
                                                    <div class="form-group <?php echo (form_error('nama_lengkap')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="nama_lengkap">Nama Lengkap</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo (set_value('nama_lengkap'))?set_value('nama_lengkap'):$data[0]['nama_lengkap'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('nama_lengkap'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('jenis_kelamin')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="jenis_kelamin">Jenis Kelamin</label>
                                                        <div class="col-md-10">
                                                            <div class="radio  radio-inline">
                                                                <input type="radio" id="inlineRadio1" value="L" name="jenis_kelamin" <?php echo (set_radio('jenis_kelamin', 'L')?set_radio('jenis_kelamin', 'L'):(($data[0]['jenis_kelamin']=='L') ? 'checked': '')); ?>>
                                                                <label for="inlineRadio1"> Laki-laki </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="inlineRadio2" value="P" name="jenis_kelamin" <?php echo (set_radio('jenis_kelamin', 'P')?set_radio('jenis_kelamin', 'P'):(($data[0]['jenis_kelamin']=='P') ? 'checked': '')); ?>>
                                                                <label for="inlineRadio2"> Wanita </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('jenis_kelamin'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('tempat_lahir')||form_error('tanggal_lahir')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="tempat_lahir">Tempat / Tanggal Lahir</label>
                                                        <div class="col-md-10">
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" id='tempat_lahir'><i class="glyphicon glyphicon-globe"></i></span>
                                                                    <input type="text" class="form-control" placeholder="Tempat" aria-describedby="tempat_lahir" name="tempat_lahir" value="<?php echo (set_value('tempat_lahir'))?set_value('tempat_lahir'):$data[0]['tempat_lahir'] ?>">
                                                                </div><!-- /input-group -->
                                                                 <?php echo form_error('tempat_lahir', '<div class="help-block ">', '</div>'); ?>
                                                            </div><!-- /.col-lg-6 -->
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" id='tanggal_lahir'><i class="glyphicon glyphicon-calendar"></i></span>
                                                                    <input type="text" class="form-control dp" placeholder="YYYY-MM-DD" aria-describedby="tanggal_lahir" name="tanggal_lahir" value="<?php echo (set_value('tanggal_lahir'))?set_value('tanggal_lahir'):$data[0]['tanggal_lahir'] ?>">
                                                                </div><!-- /input-group -->
                                                                <?php echo form_error('tanggal_lahir', '<div class="help-block ">', '</div>'); ?> 
                                                            </div><!-- /.col-lg-6 -->
                                                        </div> <!-- /controls -->
                                                       
                                                                   
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('alamat_rumah')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="alamat_rumah">Alamat Rumah</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="<?php echo (set_value('alamat_rumah'))?set_value('alamat_rumah'):$data[0]['alamat_rumah'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('alamat_rumah'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="row col-md-offset-2 col-md-10">
                                                        <div class="form-group ">
                                                            <div class="<?php echo (form_error('kelurahan')) ? 'has-error' : ''?> col-md-6">                                         
                                                                <div>
                                                                    <input type="text" placeholder="Kelurahan" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo (set_value('kelurahan'))?set_value('kelurahan'):$data[0]['kelurahan'] ?>">
                                                                </div> <!-- /controls -->
                                                                <?php echo form_error('kelurahan', '<div class="help-block ">', '</div>'); ?>            
                                                            </div> <!-- /control-group -->
                                                            <div class="<?php echo (form_error('kecamatan')) ? 'has-error' : ''?> col-md-6">                                         
                                                                <div>
                                                                    <input type="text" placeholder="Kecamatan" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo (set_value('kecamatan'))?set_value('kecamatan'):$data[0]['kecamatan'] ?>">
                                                                </div> <!-- /controls -->
                                                                 <?php echo form_error('kecamatan', '<div class="help-block ">', '</div>'); ?>   
             
                                                            </div> <!-- /control-group -->
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="<?php echo (form_error('kota')) ? 'has-error' : ''?> col-md-6">                                         
                                                                <div>
                                                                    <input type="text" placeholder="Kota / Kabupaten" class="form-control" id="kota" name="kota" value="<?php echo (set_value('kota'))?set_value('kota'):$data[0]['kota'] ?>">
                                                                </div> <!-- /controls -->
                                                               <?php echo form_error('kota', '<div class="help-block ">', '</div>'); ?>             
                                                            </div> <!-- /control-group -->
                                                            <div class="<?php echo (form_error('kode_pos')) ? 'has-error' : ''?> col-md-6">                                         
                                                                <div>
                                                                    <input type="text" placeholder="Kode Pos" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo (set_value('kode_pos'))?set_value('kode_pos'):$data[0]['kode_pos'] ?>">
                                                                </div> <!-- /controls -->
                                                                <?php echo form_error('kode_pos', '<div class="help-block ">', '</div>'); ?>              
                                                            </div> <!-- /control-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group <?php echo (form_error('id_provinsi')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="id_provinsi">Provinsi</label>
                                                        <div class="col-md-10">
                                                            <?php echo form_dropdown('id_provinsi', $provinsi, ((set_value('id_provinsi'))?set_value('id_provinsi'):$data[0]['id_provinsi']), 'class="form-control" id="id_provinsi"');?>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('id_provinsi'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('id_kanwil')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="id_kanwil">Kanwil</label>
                                                        <div class="col-md-10">
                                                            <?php echo form_dropdown('id_kanwil', $kanwil, ((set_value('id_kanwil'))?set_value('id_kanwil'):$data[0]['id_kanwil']), 'class="form-control" id="id_kanwil"');?>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('id_kanwil'); ?>               
                                                    </div> <!-- /control-group -->
                                            
                                                    <div class="form-group <?php echo (form_error('telepon')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="telepon">HP / Telepon Rumah</label>
                                                        <div class="input-group col-md-5">
                                                            <span class="input-group-addon" id='telepon'><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="telepon" name="telepon" value="<?php echo (set_value('telepon'))?set_value('telepon'):$data[0]['telepon'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('telepon'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('email')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="email">Email</label>
                                                        <div class="input-group col-md-5">
                                                            <span class="input-group-addon" id='email'><i class="glyphicon glyphicon-envelope"></i></span>
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="email" name="email" value="<?php echo (set_value('email'))?set_value('email'):$data[0]['email'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('email'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('jenis_rek')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="jenis_rek">Jenis Rekening</label>
                                                         <div class="col-md-10">
                                                            <div class="radio  radio-inline">
                                                                <input type="radio" id="jr1" value="BRI" name="jenis_rek" <?php echo (set_radio('jenis_rek', 'BRI')?set_radio('jenis_rek', 'BRI'):(($data[0]['jenis_rek']=='BRI') ? 'checked': '')); ?>>
                                                                <label for="jr1"> BRI </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="jr2" value="BRIS" name="jenis_rek" <?php echo (set_radio('jenis_rek', 'BRIS')?set_radio('jenis_rek', 'BRIS'):(($data[0]['jenis_rek']=='BRIS') ? 'checked': '')); ?>>
                                                                <label for="jr2"> BRIS </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('jenis_rek'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('no_rek')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="no_rek">No Rekening BRI/BRIS</label>
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="no_rek" name="no_rek" value="<?php echo (set_value('no_rek'))?set_value('no_rek'):$data[0]['no_rek'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('no_rek'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('rek_nama')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="rek_nama">Rek. Atas Nama</label>
                                                        <div class="col-md-5">
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="rek_nama" name="rek_nama" value="<?php echo (set_value('rek_nama'))?set_value('rek_nama'):$data[0]['rek_nama'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('rek_nama'); ?>               
                                                    </div> <!-- /control-group -->
                                                </div>
                                            </div>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading"><h3 class="panel-title">Data Pendidikan</h3></div>
                                                <div class="panel-body">
                                                    <div class="form-group <?php echo (form_error('nama_sekolah')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="nama_sekolah">Nama Sekolah</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah" value="<?php echo (set_value('nama_sekolah'))?set_value('nama_sekolah'):$data[0]['nama_sekolah'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('nama_sekolah'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('semester')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="semester">Semester</label>
                                                        <div class="col-md-10">
                                                            <?php 
                                                                $sm = array('1' => 'Ganjil','2' => 'Genap');
                                                                echo form_dropdown('semester',$sm, ((set_value('semester'))?set_value('semester'):$data[0]['semester']),'class="form-control" id="semester" ');
                                                            ?>
                                                            
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('semester'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('id_kelas')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="id_kelas">Tingkat</label>
                                                        <div class="col-md-10">
                                                                <ul class="list-group">
                                                                     <?php 
                                                                        $st = '';
                                                                        foreach($kelas as $key=>$value){
                                                                            $st.='<li class="list-group-item '.$key.'"> <label class="control-label gradeLabel col-md-2">'.strtoupper($key).' :</label><div class="col-md-10">';

                                                                            foreach ($value as $keys => $values) {
                                                                                $st.= '<div class="radio radio-inline '.$key.'"><input type="radio" id="inlineRadio'.$values['id_kelas'].'" value="'.$values['id_kelas'].'" name="id_kelas" '.(set_radio('id_kelas', $values['id_kelas'])?set_radio('id_kelas', $values['id_kelas']):(($data[0]['id_kelas']==$values['id_kelas']) ? 'checked': '')).'><label for="inlineRadio'.$values['id_kelas'].'" > '.$values['label'].' </label></div>';
                                                                            }
                                                                            $st.='</div></li>';
                                                                        }
                                                                        echo $st;
                                                                    ?>
                                                                </ul>
                                                                
                                                            
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('id_kelas'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('alamat_sekolah')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="alamat_sekolah">Alamat Sekolah</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" value="<?php echo (set_value('alamat_sekolah'))?set_value('alamat_sekolah'):$data[0]['alamat_sekolah'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('alamat_sekolah'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('telepon_sekolah')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="telepon_sekolah">Telepon Sekolah</label>
                                                        <div class="input-group col-md-5">
                                                            <span class="input-group-addon" id='telepon_sekolah'><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="telepon_sekolah" name="telepon_sekolah" value="<?php echo (set_value('telepon_sekolah'))?set_value('telepon_sekolah'):$data[0]['telepon_sekolah'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('telepon_sekolah'); ?>               
                                                    </div> <!-- /control-group -->

                                                    <div class="form-group <?php echo (form_error('nama_kepsek')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="nama_kepsek">Nama Kepala Sekolah</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek" value="<?php echo (set_value('nama_kepsek'))?set_value('nama_kepsek'):$data[0]['nama_kepsek'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('nama_kepsek'); ?>               
                                                    </div> <!-- /control-group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group <?php echo (form_error('nama_ayah')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="nama_ayah">Nama Ayah</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo (set_value('nama_ayah'))?set_value('nama_ayah'):$data[0]['nama_ayah'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('nama_ayah'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('pekerjaan_ayah')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?php echo (set_value('pekerjaan_ayah'))?set_value('pekerjaan_ayah'):$data[0]['pekerjaan_ayah'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('pekerjaan_ayah'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('nama_ibu')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="nama_ibu">Nama Ibu</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo (set_value('nama_ibu'))?set_value('nama_ibu'):$data[0]['nama_ibu'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('nama_ibu'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('pekerjaan_ibu')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?php echo (set_value('pekerjaan_ibu'))?set_value('pekerjaan_ibu'):$data[0]['pekerjaan_ibu'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('pekerjaan_ibu'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('status_pekerjaan')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="status_pekerjaan">Status Pekerjaan</label>
                                                        <div class="col-md-10">
                                                            <div class="radio radio radio-inline">
                                                                <input type="radio" id="sp1" value="1" name="status_pekerjaan" <?php echo (set_radio('status_pekerjaan', '1')?set_radio('status_pekerjaan', '1'):(($data[0]['status_pekerjaan']=='1') ? 'checked': '')); ?>>
                                                                <label for="sp1"> Tetap </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="sp2" value="2" name="status_pekerjaan" <?php echo (set_radio('status_pekerjaan', '2')?set_radio('status_pekerjaan', '2'):(($data[0]['status_pekerjaan']=='2') ? 'checked': '')); ?>>
                                                                <label for="sp2"> Kontrak / Outsourcing </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="sp3" value="3" name="status_pekerjaan" <?php echo (set_radio('status_pekerjaan', '3')?set_radio('status_pekerjaan', '3'):(($data[0]['status_pekerjaan']=='3') ? 'checked': '')); ?>>
                                                                <label for="sp3"> Training </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('status_pekerjaan'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('lama_pekerjaan')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="lama_pekerjaan">Lama Pekerjaan</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="lama_pekerjaan" name="lama_pekerjaan" value="<?php echo (set_value('lama_pekerjaan'))?set_value('lama_pekerjaan'):$data[0]['lama_pekerjaan'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('lama_pekerjaan'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('alamat_ortu')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="alamat_ortu">Alamat Orang Tua</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" value="<?php echo (set_value('alamat_ortu'))?set_value('alamat_ortu'):$data[0]['alamat_ortu'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('alamat_ortu'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('telepon_ortu')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="telepon_ortu">HP / Telepon Rumah</label>
                                                        <div class="input-group col-md-5">
                                                            <span class="input-group-addon" id='telepon_ortu'><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="telepon_ortu" name="telepon_ortu" value="<?php echo (set_value('telepon_ortu'))?set_value('telepon_ortu'):$data[0]['telepon_ortu'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('telepon_ortu'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('pendapatan')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="pendapatan">Rata-rata Penghasilan/Bulan</label>
                                                        <div class="input-group col-md-5">
                                                            
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="pendapatan" name="pendapatan" value="<?php echo (set_value('pendapatan'))?set_value('pendapatan'):$data[0]['pendapatan'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('pendapatan'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('pengeluaran')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="pengeluaran">Rata-rata Pengeluaran/Bulan</label>
                                                        <div class="input-group col-md-5">
                                                            
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="pengeluaran" name="pengeluaran" value="<?php echo (set_value('pengeluaran'))?set_value('pengeluaran'):$data[0]['pengeluaran'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('pengeluaran'); ?>               
                                                    </div> <!-- /control-group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <input type="hidden" id="prefId" name="id_preferensi" value="<?php echo (set_value('id_preferensi'))?set_value('id_preferensi'):$data[0]['id_preferensi'] ?>">
                                                    <div class="form-group <?php echo (form_error('nama_preferensi')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="nama_preferensi">Nama Lengkap</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="nama_preferensi" name="nama_preferensi" value="<?php echo (set_value('nama_preferensi'))?set_value('nama_preferensi'):$data[0]['nama_preferensi'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('nama_preferensi'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('nama_lembaga')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="nama_lembaga">Nama Lembaga</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="nama_lembaga" name="nama_lembaga" value="<?php echo (set_value('nama_lembaga'))?set_value('nama_lembaga'):$data[0]['nama_lembaga'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('nama_lembaga'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('alamat_preferensi')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="alamat_preferensi">Alamat Pereferensi</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="alamat_preferensi" name="alamat_preferensi" value="<?php echo (set_value('alamat_preferensi'))?set_value('alamat_preferensi'):$data[0]['alamat_preferensi'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('alamat_preferensi'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('jabatan')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="jabatan">Jabatan</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo (set_value('jabatan'))?set_value('jabatan'):$data[0]['jabatan'] ?>">
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('jabatan'); ?>               
                                                    </div> <!-- /control-group -->
                                                    
                                                    <div class="form-group <?php echo (form_error('telepon_preferensi')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="telepon_preferensi">HP / Telepon Pereferensi</label>
                                                        <div class="input-group col-md-5">
                                                            <span class="input-group-addon" id='telepon_preferensi'><i class="glyphicon glyphicon-phone-alt"></i></span>
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="telepon_preferensi" name="telepon_preferensi" value="<?php echo (set_value('telepon_preferensi'))?set_value('telepon_preferensi'):$data[0]['telepon_preferensi'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('telepon_preferensi'); ?>               
                                                    </div> <!-- /control-group -->
                                                    
                                                    <div class="form-group <?php echo (form_error('email_preferensi')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="email_preferensi">Email</label>
                                                        <div class="input-group col-md-5">
                                                            <span class="input-group-addon" id='email_preferensi'><i class="glyphicon glyphicon-envelope"></i></span>
                                                            <input type="text" class="form-control" placeholder="" aria-describedby="email_preferensi" name="email_preferensi" value="<?php echo (set_value('email_preferensi'))?set_value('email_preferensi'):$data[0]['email_preferensi'] ?>">
                                                        </div><!-- /input-group -->
                                                        <?php echo form_error('email_preferensi'); ?>               
                                                    </div> <!-- /control-group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab4">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <input type="hidden" id="prefId" name="fc_raport">
                                                    <div class="form-group <?php echo (form_error('fc_raport')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="fc_raport">Fotocopy Raport Semester</label>
                                                        <div class="col-md-10">
                                                            <div class="radio radio radio-inline">
                                                                <input type="radio" id="fcr1" value="1" name="fc_raport" <?php echo (set_radio('fc_raport', '1')?set_radio('fc_raport', '1'):(($data[0]['fc_raport']=='1') ? 'checked': '')); ?>>
                                                                <label for="fcr1"> Terlampir </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="fcr2" value="0" name="fc_raport" <?php echo (set_radio('fc_raport', '0')?set_radio('fc_raport', '0'):(($data[0]['fc_raport']=='0') ? 'checked': '')); ?>>
                                                                <label for="fcr2"> Tidak Ada </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('fc_raport'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('fc_ktp')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="fc_ktp">Fotocopy KTP Orang Tua</label>
                                                        <div class="col-md-10">
                                                            <div class="radio radio radio-inline">
                                                                <input type="radio" id="fcktp1" value="1" name="fc_ktp" <?php echo (set_radio('fc_ktp', '1')?set_radio('fc_ktp', '1'):(($data[0]['fc_ktp']=='1') ? 'checked': '')); ?>>
                                                                <label for="fcktp1"> Terlampir </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="fcktp2" value="0" name="fc_ktp" <?php echo (set_radio('fc_ktp', '0')?set_radio('fc_ktp', '0'):(($data[0]['fc_ktp']=='0') ? 'checked': '')); ?>>
                                                                <label for="fcktp2"> Tidak Ada </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('fc_ktp'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('fc_kk')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="fc_kk">Fotocopy KK</label>
                                                        <div class="col-md-10">
                                                            <div class="radio radio radio-inline">
                                                                <input type="radio" id="fckk1" value="1" name="fc_kk" <?php echo (set_radio('fc_kk', '1')?set_radio('fc_kk', '1'):(($data[0]['fc_kk']=='1') ? 'checked': '')); ?>>
                                                                <label for="fckk1"> Terlampir </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="fckk2" value="0" name="fc_kk" <?php echo (set_radio('fc_kk', '0')?set_radio('fc_kk', '0'):(($data[0]['fc_kk']=='0') ? 'checked': '')); ?>>
                                                                <label for="fckk2"> Tidak Ada </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('fc_kk'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('pas_foto')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="pas_foto">Pas Foto Siswa</label>
                                                        <div class="col-md-10">
                                                            <div class="radio radio radio-inline">
                                                                <input type="radio" id="pf1" value="1" name="pas_foto" <?php echo (set_radio('pas_foto', '1')?set_radio('pas_foto', '1'):(($data[0]['pas_foto']=='1') ? 'checked': '')); ?>>
                                                                <label for="pf1"> Terlampir </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="pf2" value="0" name="pas_foto" <?php echo (set_radio('pas_foto', '0')?set_radio('pas_foto', '0'):(($data[0]['pas_foto']=='0') ? 'checked': '')); ?>>
                                                                <label for="pf2"> Tidak Ada </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('pas_foto'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('ska')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="ska">Surat Keterangan Masih Aktif</label>
                                                        <div class="col-md-10">
                                                            <div class="radio radio radio-inline">
                                                                <input type="radio" id="skma1" value="1" name="ska" <?php echo (set_radio('ska', '1')?set_radio('ska', '1'):(($data[0]['ska']=='1') ? 'checked': '')); ?>>
                                                                <label for="skma1"> Terlampir </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="skma2" value="0" name="ska" <?php echo (set_radio('ska', '0')?set_radio('ska', '0'):(($data[0]['ska']=='0') ? 'checked': '')); ?>>
                                                                <label for="skma2"> Tidak Ada </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('ska'); ?>               
                                                    </div> <!-- /control-group -->
                                                    <div class="form-group <?php echo (form_error('sktm')) ? 'has-error' : ''?>">                                         
                                                        <label class="control-label col-md-2 " for="sktm">Surat Keterangan Tidak Mampu</label>
                                                        <div class="col-md-10">
                                                            <div class="radio radio radio-inline">
                                                                <input type="radio" id="sktm1" value="1" name="sktm" <?php echo (set_radio('sktm', '1')?set_radio('sktm', '1'):(($data[0]['sktm']=='1') ? 'checked': '')); ?>>
                                                                <label for="sktm1"> Terlampir </label>
                                                            </div>
                                                            <div class="radio radio-inline">
                                                                <input type="radio" id="sktm2" value="0" name="sktm" <?php echo (set_radio('sktm', '0')?set_radio('sktm', '0'):(($data[0]['sktm']=='0') ? 'checked': '')); ?>>
                                                                <label for="sktm2"> Tidak Ada </label>
                                                            </div>
                                                        </div> <!-- /controls -->
                                                        <?php echo form_error('sktm'); ?>               
                                                    </div> <!-- /control-group -->
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <ul class="pager wizard">
                                            <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                            <li class="previous"><a href="#">Previous</a></li>
                                            <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                            <li class="next"><a href="#">Next</a></li>
                                            <li class="next finish" style="float:right"><input type="submit" class="btn btn-primary" value="Update"></li>
                                        </ul>
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