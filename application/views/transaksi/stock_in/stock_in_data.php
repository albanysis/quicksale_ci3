<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stock In</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Stock In</li>
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
                        <h3 class="box-title">Data Stock</h3>
                        <a href="<?= site_url('stock/in/add') ?>" class="btn btn-sm btn-info">
                            Add New Stock
                        </a>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row as $key => $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->barcode ?></td>
                                    <td><?= $data->item_name ?></td>
                                    <td><?= $data->qty ?></td>
                                    <td><?= indo_date($data->date) ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-dark">
                                            <i class="fa fa-eye"> </i>
                                        </a>
                                        <a href="<?= site_url('stock/in/del/' . $data->stock_id . '/' . $data->item_id) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-sm btn-outline-danger">
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