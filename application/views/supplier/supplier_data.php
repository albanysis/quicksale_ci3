<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Supplier</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Supplier</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <div class="box">
                <div class="box-header">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px">
                        <h3 class="box-title">Data Supplier</h3>
                        <!-- <a href="<?= site_url('supplier/add') ?>" class="btn btn-sm btn-primary">
                            <i class="fa fa-user-plus"> </i> Add New
                        </a> -->
                        <a href="<?= site_url('supplier/add') ?>" class="btn btn-sm btn-info">
                            Add New Supplier
                        </a>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->phone ?></td>
                                    <td><?= $data->address ?></td>
                                    <td><?= $data->keterangan ?></td>
                                    <!-- <td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td> -->
                                    <td>
                                        <a href="<?= site_url('supplier/edit/' . $data->supplier_id) ?>" class="btn btn-sm btn-outline-dark">
                                            <i class="fa fa-pencil-alt"> </i>
                                        </a>
                                        <a href="<?= site_url('supplier/delete/' . $data->supplier_id) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash"> </i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->