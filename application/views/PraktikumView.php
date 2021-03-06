<!DOCTYPE html>
<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Feb 10, 2016
 Time 6:20:45 PM
 Encoding UTF-8
 Project Aplikasi-Penjadwalan
 Package Expression package is undefined on line 9, column 12 in Templates/Scripting/EmptyPHPWebPage.php.
  
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Aplikasi Penjadwalan</title>

        <?php $this->load->view('layout/css') ?>

    </head>
    <body>

        <?php $this->load->view('layout/header') ?>

        <div class="container">

            <div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Data Jadwal Praktikum</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Data Jadwal Praktikum Kosong</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">

                        <p></p>

                        <form method="post" action="<?php echo base_url() ?>index.php/PraktikumController/uploadListKelas" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Data Kelas Dan Mata Praktikum</label>
                                <input type="file" name="userfile">
                                <p class="help-block">Silahkan browse file csv untuk Data Kelas Dan Mata Praktikum</p>
                            </div>
                            <button type="submit" class="btn btn-success">Upload</button>
                        </form>

                        <p></p>

                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah</button>

                        <p></p>

                        <table id="tabel1" class="table table-bordered table-hover table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Hari</th>
                                    <th class="text-center">Ruang</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Sesi</th>
                                    <th class="text-center">Mata Praktikum</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataPraktikum as $d) { ?>
                                    <tr>
                                        <td><?php echo $d->hari; ?></td>
                                        <td><?php echo $d->ruang; ?></td>
                                        <td><?php echo $d->kelas; ?></td>
                                        <td><?php echo $d->sesi; ?></td>
                                        <td><?php echo $d->mata_praktikum; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">

                        <p></p>

                        <form method="post" action="<?php echo base_url() ?>index.php/PraktikumController/uploadJadwalPraktikum" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputFile">Upload Data Jadwal Praktikum</label>
                                <input type="file" name="userfile">
                                <p class="help-block">Silahkan browse file csv untuk data jadwal praktikum</p>
                            </div>
                            <button type="submit" class="btn btn-success">Upload</button>
                        </form>

                        <p></p>

                        <a href="<?php echo base_url(); ?>index.php/PraktikumController/hapusAllDataPraktikum">
                            <button class="btn btn-danger">Hapus Semua Data</button>
                        </a>

                        <p></p>

                        <table id="tabel2" class="table table-bordered table-hover table-responsive table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Hari</th>
                                    <th class="text-center">Ruang</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Sesi</th>
                                    <th class="text-center">Modul</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataPraktikumKosong as $dk) { ?>
                                    <tr>
                                        <td><?php echo $dk->hari; ?></td>
                                        <td><?php echo $dk->ruang; ?></td>
                                        <td><?php echo (empty($dk->kelas) ? 'kosong' : $dk->kelas) ?></td>
                                        <td><?php echo $dk->sesi; ?></td>
                                        <td><?php echo (empty($dk->mata_praktikum) ? 'kosong' : $dk->mata_praktikum) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Jadwal Praktikum</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>index.php/PraktikumController/simpanJadwalPraktikum" method="post">
                            <div class="form-group">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas">
                            </div>
                            <div class="form-group">
                                <label>Modul</label>
                                <input type="text" name="mata_praktikum" class="form-control" placeholder="Masukkan Mata Praktikum">
                            </div>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('layout/js') ?>

    </body>
</html>
