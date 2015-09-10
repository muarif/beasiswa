<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="widget">
                    <div class="widget-header"> 
                        <h3>Data Siswa</h3>
                        <div class="widget-button">
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="btn-icon glyphicon glyphicon-export"></i> Export <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="<?php echo site_url('kandidat/export/'.$id);?>">Export to excel</a></li>
                                    <li><a href="<?php echo site_url('kandidat/print_pdf/'.$id);?>">Export to PDF</a></li>
                                </ul>
                            </div>
                            <a href="#" onClick="window.print()"><button class="btn btn-primary"><i class="btn-icon fa fa-print"></i>Direct Print</button></a>
                        </div>
                    </div>
                    <div class="widget-content">

                        <div class="col-sm-12">
                            <?php echo $this->session->flashdata('success') ?>                         
                            <?php echo $this->session->flashdata('fail') ?> 
                            <?php echo $this->session->flashdata('warning') ?> 

                            <?php if($data[0]['id_lulus']=='1'&& $this->session->userdata('id_level')!=3){ ?>
                            <form action="<?php echo site_url('kandidat/setStatus/'.$id)?>" method="POST" class="form-horizontal">
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <div class="form-group <?php echo (form_error('dec_status')) ? 'has-error' : ''?>">                                         
                                        <label class="control-label col-md-2 " for="status">Status </label>
                                        <div class="col-md-10">
                                            <div class="radio  radio-inline">
                                                <input type="radio" id="kel1" value="1" name="status" <?php echo (set_radio('status', '1')?set_radio('status', '1'):(($data[0]['kts']=='1') ? 'checked': '')); ?>>
                                                <label for="kel1"> Aktif </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" id="kel2" value="0" name="status" <?php echo (set_radio('status', '0')?set_radio('status', '0'):(($data[0]['kts']=='0') ? 'checked': '')); ?>>
                                                <label for="kel2"> Non-aktif
                                            </div>
                                        </div> <!-- /controls -->
                                        <?php echo form_error('status'); ?>               
                                    </div> <!-- /control-group -->
                                    <div class="form-group ">                                         
                                        <input type="hidden" name="desc_status" value="">
                                        <label class="control-label col-md-2 " for="desc_status">Alasan Non-aktif</label>
                                        <div class="col-md-10">
                                            <div class="form-group <?php echo (form_error('desc_status')) ? 'has-error' : ''?>">                                        
                                                    <?php echo form_dropdown('desc_status', $status, ((set_value('desc_status'))?set_value('desc_status'):$data[0]['desc_status']), 'class="form-control" id="desc_status"');?>
                                                <?php echo form_error('desc_status'); ?>               
                                            </div>
                                        </div> <!-- /controls -->           
                                    </div> <!-- /control-group -->
                                   
                                </div>
                                <div class="panel-footer">
                                    <div class="btn-group pull-right" role="group" aria-label="form">
                                        <button type="submit" class="btn btn-success" >Confirm</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php } ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pribadi</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>ID Beasiswa :</dt>
                                        <dd><?php echo ($data[0]['id_beasiswa']) ? $data[0]['id_beasiswa'] : '-' ?></dd>

                                        <dt>Nama Lengkap :</dt>
                                        <dd><?php echo $data[0]['nama_lengkap'] ?></dd>

                                        <dt>Jenis Kelamin :</dt>
                                        <dd><?php echo ($data[0]['jenis_kelamin']=='L'?'Laki-laki' : 'Perempuan') ?></dd>
                                        
                                        <dt>Tempat / Tanggal Lahir :</dt>
                                        <dd><?php echo $data[0]['tempat_lahir'] ?> / <?php 

                                        $month = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
                                        echo date('j',strtotime($data[0]['tanggal_lahir'])) . ' ' .$month[date('n',strtotime($data[0]['tanggal_lahir']))]. ' ' .date('Y',strtotime($data[0]['tanggal_lahir']));

                                        ?></dd>

                                        <dt>Alamat Rumah :</dt>
                                        <dd> <address>  <?php echo $data[0]['alamat_rumah']?>,<br> 
                                                        Kel. <?php echo $data[0]['kelurahan']?>, Kec. <?php echo $data[0]['kecamatan']?>,<br>
                                                        <?php echo $data[0]['kota']?>, <?php echo $data[0]['nama_provinsi']?>, <?php echo $data[0]['kode_pos']?>,<br>
                                            </address>
                                        </dd>

                                        <dt>Kanwil :</dt>
                                        <dd><?php echo $data[0]['nama_kanwil']?></dd>

                                        <dt>No Telp / HP :</dt>
                                        <dd><i class="icon icon-phone"></i><?php echo $data[0]['telepon']?></dd>

                                        <dt>Email :</dt>
                                        <dd><i class="icon icon-envelope"></i><?php echo $data[0]['email']?></dd>
                                        
                                        <dt>Jenis Rekening :</dt>
                                        <dd><?php echo $data[0]['jenis_rek']?></dd>  

                                        <dt>Nomor Rekening :</dt>
                                        <dd><?php echo $data[0]['no_rek']?></dd>

                                        <dt>Atas Nama :</dt>
                                        <dd><?php echo $data[0]['rek_nama']?></dd>
                                    </dl>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Pendidikan</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Nama Sekolah :</dt>
                                        <dd><?php echo $data[0]['nama_sekolah'] ?></dd>

                                        <dt>Kelas / Tingkatan :</dt>
                                        <dd><?php echo $data[0]['labelk'].' '.$data[0]['labelt'];?></dd>
                                        
                                        <dt>Alamat Sekolah :</dt>
                                        <dd> <address>  <?php echo $data[0]['alamat_sekolah']?>
                                              </address>
                                        </dd>

                                        <dt>No Telp / HP :</dt>
                                        <dd><i class="icon icon-phone"></i><?php echo $data[0]['telepon_sekolah']?></dd>

                                        <dt>Nama Kepala Sekolah:</dt>
                                        <dd><?php echo $data[0]['nama_kepsek']?></dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Orang Tua Siswa</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Nama Ayah :</dt>
                                        <dd><?php echo $data[0]['nama_ayah'] ?></dd>

                                        <dt>Pekerjaan Ayah :</dt>
                                        <dd><?php echo $data[0]['pekerjaan_ayah'] ?></dd>

                                        <dt>Nama Ibu :</dt>
                                        <dd><?php echo $data[0]['nama_ibu'] ?></dd>

                                        <dt>Pekerjaan Ibu :</dt>
                                        <dd><?php echo $data[0]['pekerjaan_ibu'] ?></dd>

                                        <dt>Status Pekerjaan :</dt>
                                        <dd><?php 

                                            $st = array('Tetap','Kontrak / Outsourcing', 'Training');
                                            echo $st[$data[0]['status_pekerjaan']-1];

                                            ?></dd>
                                        
                                        <dt>Lama Pekerjaan :</dt>
                                        <dd><?php echo $data[0]['lama_pekerjaan'] ?></dd>

                                        <dt>Alamat Orang Tua :</dt>
                                        <dd> <address>  <?php echo $data[0]['alamat_ortu']?>
                                              </address>
                                        </dd>

                                        <dt>HP / Telepon Rumah :</dt>
                                        <dd><i class="icon icon-phone"></i><?php echo $data[0]['telepon_ortu']?></dd>

                                        <dt>Rata-rata Penghasilan/Bulan :</dt>
                                        <dd><?php echo $data[0]['pendapatan']?></dd>

                                        <dt>Rata-rata Pengeluaran/Bulan :</dt>
                                        <dd><?php echo $data[0]['pengeluaran']?></dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Data Perekomendasi</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Nama Lengkap :</dt>
                                        <dd><?php echo $data[0]['nama_preferensi'] ?></dd>

                                        <dt>Nama Lembaga :</dt>
                                        <dd><?php echo $data[0]['nama_lembaga'] ?></dd>

                                        <dt>Jabatan :</dt>
                                        <dd><?php echo $data[0]['jabatan'] ?></dd>

                                        <dt>Alamat Perekomendasi :</dt>
                                        <dd> <address>  <?php echo $data[0]['alamat_preferensi']?>
                                              </address>
                                        </dd>

                                        <dt>HP / Telepon Pereferensi :</dt>
                                        <dd><i class="icon icon-phone"></i><?php echo $data[0]['telepon_preferensi']?></dd>

                                        <dt>Email :</dt>
                                        <dd><i class="icon icon-envelope"></i><?php echo $data[0]['email_preferensi']?></dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Kelengkapan</h3>
                                </div>
                                <div class="panel-body">
                                    <dl class="dl-horizontal">

                                        <dt>Fotocopy Raport Semester :</dt>
                                        <dd><a href="<?php echo base_url('lampiran/fc_raport/'.$data[0]['fc_raport'])?>"><?php echo $data[0]['fc_raport'] ?></a></dd>

                                        <dt>Fotocopy KTP Orang Tua :</dt>
                                        <dd><a href="<?php echo base_url('lampiran/fc_ktp/'.$data[0]['fc_ktp'])?>"><?php echo $data[0]['fc_ktp']?></a></dd>

                                        <dt>Fotocopy KK :</dt>
                                        <dd><a href="<?php echo base_url('lampiran/fc_kk/'.$data[0]['fc_kk'])?>"><?php echo $data[0]['fc_kk']; ?></a></dd>

                                        <dt>Pas Foto Siswa :</dt>
                                        <dd><a href="<?php echo base_url('lampiran/pas_foto/'.$data[0]['pas_foto'])?>"><?php echo $data[0]['pas_foto'] ?></a></dd>

                                        <dt>Surat Keterangan Masih Aktif :</dt>
                                        <dd><a href="<?php echo base_url('lampiran/ska/'.$data[0]['ska'])?>"><?php echo $data[0]['ska']?></a></dd>

                                        <dt>Surat Keterangan Tidak Mampu :</dt>
                                        <dd><a href="<?php echo base_url('lampiran/sktm/'.$data[0]['sktm'])?>"><?php echo $data[0]['sktm']?></a></dd>

                                        
                                    </dl>
                                </div>
                            </div>
                            <?php if($data[0]['id_lulus']!='1'&&$this->session->userdata('id_level')!=3){ ?>
                            <form action="<?php echo site_url('kandidat/setKelulusan/'.$id)?>" method="POST" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Kelulusan</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group <?php echo (form_error('id_lulus')) ? 'has-error' : ''?>">                                         
                                        <label class="control-label col-md-2 " for="id_lulus">Status Kelulusan</label>
                                        <div class="col-md-10">
                                            <div class="radio  radio-inline">
                                                <input type="radio" id="kel1" value="1" name="id_lulus" <?php echo (set_radio('id_lulus', '1')?set_radio('id_lulus', '1'):(($data[0]['id_lulus']=='1') ? 'checked': '')); ?>>
                                                <label for="kel1"> Lulus </label>
                                            </div>
                                            <div class="radio radio-inline">
                                                <input type="radio" id="kel2" value="0" name="id_lulus" <?php echo (set_radio('id_lulus', '0')?set_radio('id_lulus', '0'):(($data[0]['id_lulus']=='0') ? 'checked': '')); ?>>
                                                <label for="kel2"> Belum Lulus </label>
                                            </div>
                                        </div> <!-- /controls -->
                                        <?php echo form_error('id_lulus'); ?>               
                                    </div> <!-- /control-group -->
                                    <div class="form-group ">                                         
                                        <label class="control-label col-md-2 " for="alasan_lulus">Alasan jika tidak lulus</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="alasan_lulus"><?php echo (set_value('alasan_lulus'))?set_value('alasan_lulus'):$data[0]['alasan_lulus']; ?></textarea> 
                                        </div> <!-- /controls -->           
                                    </div> <!-- /control-group -->
                                   
                                </div>
                                <div class="panel-footer">
                                    <div class="btn-group pull-right" role="group" aria-label="form">
                                        <button type="submit" class="btn btn-success" >Confirm</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <?php } ?>

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