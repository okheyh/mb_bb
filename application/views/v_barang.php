<div class="card">
    <div class="card-header row">
        <div class="col col-sm-3">
            <div class="card-options d-inline-block">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#demoModal"> <i
                        class="ik ik-plus-square">Tambah</i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover mb-0 table-responsive">
            <thead>
                <tr>
                    <th>
                        <center>No</center>
                    </th>
                    <th>
                        <center>Nama Barang</center>
                    </th>
                    <th>
                        <center>Foto</center>
                    </th>
                    <th>
                        <center>Nama Produsen</center>
                    </th>
                    <th>
                        <center>Kemasan</center>
                    </th>
                    <th>
                        <center>Bentuk Sediaan</center>
                    </th>
                    <th>
                        <center>No Pendaftaran</center>
                    </th>
                    <th>
                        <center>No Batch</center>
                    </th>
                    <th>
                        <center>Kadaluarsa</center>
                    </th>
                    <th>
                        <center>Kelompok Produk</center>
                    </th>
                    <th>
                        <center>Jumlah Satuan Terkecil</center>
                    </th>
                    <th>
                        <center>Taksiran Nilai Satuan</center>
                    </th>
                    <th>
                        <center>Taksiran Nilai Produk</center>
                    </th>
                    <th>
                        <center>Justifikasi Penyitaan</center>
                    </th>
                    <th>
                        <center>Keterangan</center>
                    </th>
                    <th>
                        <center>Aksi</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; foreach($barang as $row): ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row->nama_barang; ?></td>
                    <td><img src="<?php echo base_url('assets/img/foto_barang/' . $row->foto_barang) ?>" alt=""
                            class="img-fluid img-100"></td>
                    <td><?php echo $row->nama_produsen; ?></td>
                    <td><?php echo $row->kemasan; ?></td>
                    <td><?php echo $row->bentuk_sediaan; ?></td>
                    <td><?php echo $row->no_pendaftaran; ?></td>
                    <td><?php echo $row->no_batch; ?></td>
                    <td><?php echo $row->kadaluarsa; ?></td>
                    <td><?php echo $row->kelompok_produk; ?></td>
                    <td><?php echo $row->jml_satuan_terkecil; ?></td>
                    <td><?php echo $row->taksiran_nilai_satuan; ?></td>
                    <td><?php echo $row->taksiran_nilai_produk; ?></td>
                    <td><?php echo $row->justifikasi_penyitaan; ?></td>
                    <td><?php echo $row->ket; ?></td>
                    <td>
                        <a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                        <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <!-- Modal tambah barang -->
    <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="demoModalLabel">Tambah barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo base_url() . 'index.php/barang/insert' ?>" method="post"
                                    class="forms-sample" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Nama barang</label>
                                        <input type="text" name="nama_barang" class="form-control"
                                            placeholder="Nama barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Nama Produsen</label>
                                        <input type="text" name="nama_produsen" class="form-control"
                                            placeholder="Nama Prousen">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kemasan</label>
                                        <select class="form-control select2" name="kemasan">
                                            <option value="Strip">Strip</option>
                                            <option value="Blister">Blister</option>
                                            <option value="Kotak">Kotak</option>
                                            <option value="Botol">Botol</option>
                                            <option value="Ampul">Ampul</option>
                                            <option value="Vial">Vial</option>
                                            <option value="Bungkus">Bungkus</option>
                                            <option value="*">Enter value</option>
                                        </select>
                                        <input type="text" name="kemasan" class="form-control holder">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bentuk Sediaan</label>
                                        <input type="text" name="bentuk_sediaan" class="form-control"
                                            placeholder="Bentuk Sediaan">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No Pendaftaran</label>
                                        <input type="text" name="no_pendaftaran" class="form-control"
                                            placeholder="Bentuk Sediaan">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No Batch</label>
                                        <input type="text" name="no_batch" class="form-control" placeholder="No Batch">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kadaluarsa</label>
                                        <input type="text" name="kadaluarsa" class="form-control"
                                            placeholder="Kadaluarsa">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kelompok Produk</label>
                                        <input type="text" name="kelompok_produk" class="form-control"
                                            placeholder="Kelompok Produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jumlah Satuan Terkecil</label>
                                        <input type="text" name="jml_satuan_terkecil" class="form-control"
                                            placeholder="Jumlah Satuan Terkecil">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Taksiran Nilai Satuan</label>
                                        <input type="text" name="taksiran_nilai_satuan" class="form-control"
                                            placeholder="Taksiran Nilai Satuan">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Taksiran Nilai Produk</label>
                                        <input type="text" name="taksiran_nilai_produk" class="form-control"
                                            placeholder="Taksiran Nilai Produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Justifikasi Penyitaan</label>
                                        <input type="text" name="justifikasi_penyitaan" class="form-control"
                                            placeholder="Justifikasi Penyitaan">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Keterangan</label>
                                        <input type="text" name="ket" class="form-control" placeholder="Keterangan">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputConfirmPassword1"><i class="ik ik-share">Foto
                                                Barang</i></label>
                                        <input type="file" name="foto_barang" class="form-control"
                                            id="exampleInputConfirmPassword1" placeholder="Foto Barang">
                                    </div>
                                    <button type="submit" name="submit" value="true"
                                        class="btn btn-primary mr-2">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal tambah barang -->
</div>