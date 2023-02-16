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
                                    <button href="" class="btn btn-success fa fa-edit"></button>
                                    <button href="" class="btn btn-danger fa fa-trash"></button>
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