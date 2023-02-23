<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Customer</li>
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
                        <h3 class="box-title">Data Customer</h3>
                        <a href="<?= site_url('custumer/add') ?>" class="btn btn-sm btn-info">
                            Add New
                        </a>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Class</th>
                                <th>Address</th>
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
                                    <td><?= $data->class == 1 ? "Gold" : "Platinum" ?></td>
                                    <td><?= $data->address ?></td>
                                    <td>
                                        <a href="<?= site_url('custumer/edit/' . $data->custumer_id) ?>" class="btn btn-sm btn-outline-dark">
                                            <i class="fa fa-pencil-alt"> </i>
                                        </a>
                                        <a href="<?= site_url('custumer/delete/' . $data->custumer_id) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-sm btn-outline-danger">
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