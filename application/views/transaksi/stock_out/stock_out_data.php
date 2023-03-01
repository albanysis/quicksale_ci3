<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stock Out</h1>
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
                        <a href="<?= site_url('stock/out/add') ?>" class="btn btn-sm btn-info">
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
                                        <a id="set_dtl" class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#modal-detail" data-barcode="<?= $data->barcode ?>" data-detail="<?= $data->detail ?>" data-itemname="<?= $data->item_name ?>" data-suppliername="<?= $data->supplier_name ?>" data-qty="<?= $data->qty ?>" data-date="<?= indo_date($data->date) ?>">
                                            <i class="fa fa-eye"> </i>
                                        </a>
                                        <a href="<?= site_url('stock/out/del/' . $data->stock_id . '/' . $data->item_id) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-sm btn-outline-danger">
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

<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 100vh;">
            <div class="modal-header">
                <h4 class="modal-title">Stock In Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered no-margin">
                    <tbody>
                        <tr>
                            <th style="width: 35%;">Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Item Name</th>
                            <td><span id="item_name"></span></td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Supplier Name</th>
                            <td><span id="supplier_name"></span></td>
                        </tr>
                        <tr>
                            <th>Qty</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var barcode = $(this).data('barcode');
            var itemname = $(this).data('itemname');
            var detail = $(this).data('detail');
            var suppliername = $(this).data('suppliername');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            $('#barcode').text(barcode);
            $('#item_name').text(itemname);
            $('#detail').text(detail);
            $('#supplier_name').text(suppliername);
            $('#qty').text(qty);
            $('#date').text(date);
        })
    })
</script>