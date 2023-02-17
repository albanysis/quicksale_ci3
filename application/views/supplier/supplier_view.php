<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Supplier
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active">Supplier</li>
        </ol>
    </section>
    <?= $this->session->flashdata('message') ?>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Supplier</h3>
                <div class="pull-right">
                    <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Add New</a>
                </div>
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomer Telpon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $s) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $s->nama_supplier ?></td>
                                <td><?= $s->alamat_supplier ?></td>
                                <td><?= $s->nomer_tlp ?></td>
                                <td>
                                    <a href="<?= base_url('supplier') ?>" class="btn btn-success fa fa-edit"></a>
                                    <a href="<?= base_url('supplier/hapus/' . $s->id_supplier) ?>" class="btn btn-danger fa fa-trash"></a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="modal_add_new" tabindex="-1" aria-labelledby="modal_add_newLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_add_newLabel">Modal title</h1>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('supplier/add') ?>" method="post">
                    <div>
                        <div style="margin-bottom: 10px;">
                            <label>Name</label>
                            <input type="text" name="nama_supplier" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label>Alamat</label>
                            <input type="text" name="alamat_supplier" autocomplete="off" required placeholder="Masukkan Alamat" class="form-control">
                        </div>
                        <div style="margin-bottom: 10px;">
                            <label>Nomer Tlp</label>
                            <input type="text" name="nomer_tlp" autocomplete="off" required placeholder="Masukkan Nomer Telpon" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>