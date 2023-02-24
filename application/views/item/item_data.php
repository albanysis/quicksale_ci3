<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Product Items</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Items</li>
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
                <div class="box-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px">
                    <h3 class="box-title">Data Product Items</h3>
                    <div>

                        <a href="<?= site_url('item/add') ?>" class="btn btn-sm btn-info">
                            Add New Product
                        </a>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->barcode ?></td>
                                    <td><?= $data->name ?></td>
                                    <td><?= $data->category_name ?></td>
                                    <td><?= $data->unit_name ?></td>
                                    <td><?= $data->price ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td>
                                        <a href="<?= site_url('item/edit/' . $data->item_id) ?>" class="btn btn-sm btn-outline-dark">
                                            <i class="fa fa-pencil-alt"> </i>
                                        </a>
                                        <a href="<?= site_url('item/delete/' . $data->item_id) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash"> </i>
                                        </a>
                                        <a href="<?= site_url('item/barcode/' . $data->item_id) ?>" class="btn btn-sm btn-outline-secondary">
                                            <i class="fa fa-barcode"> </i>
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