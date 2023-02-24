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
                    <li class="breadcrumb-item"><a href="<?= site_url('stock/in') ?>">Stock</a></li>
                    <li class="breadcrumb-item active"> Stock in add</li>
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
                <div class="box-body">
                    <div class="container">
                        <form action="<?= site_url('stock/proses') ?>" method="POST">
                            <div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Date <span style="color: red;">*</span></label>
                                        <input type="date" value="<?= date('Y-m-d') ?>" name="date" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                                    </div>

                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label for="barcode">Barcode <span style="color: red;">*</span></label>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="item_id" id="item_id">
                                            <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Item Name <span style="color: red;">*</span></label>
                                        <input type="" name="item_name" id="item_name" value="-" class="form-control" readonly>
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label for="item_unit">Item Unit <span style="color: red;">*</span></label>
                                        <input type="text" name="item_unit" id="item_unit" autocomplete="off" required class="form-control" readonly value="-">
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label for="stock">Initial Stock <span style="color: red;">*</span></label>
                                        <input type="text" name="stock" id="stock" autocomplete="off" required class="form-control" readonly value="-">
                                    </div>
                                </div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label for="detail">Detail <span style="color: red;">*</span></label>
                                        <input type="text" name="detail" id="detail" autocomplete="off" required placeholder="Kulakan / tambahan / etc" class="form-control">
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label for="supplier">Supplier <span style="color: red;">*</span></label>
                                        <select name="supplier" id="" class="form-control">
                                            <option value=""> - Pilih - </option>
                                            <?php foreach ($supplier as $s => $data) {
                                                echo '<option value="' . $data->supplier_id . '">' . $data->name . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label for="qty">Qty <span style="color: red;">*</span></label>
                                        <input type="number" name="qty" id="qty" autocomplete="off" required class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-end">
                                    <button name="in_add" type="submit" class="btn btn-primary">Save</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

<div class="modal fade" id="modal-item">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 100vh;">
            <div class="modal-header">
                <h4 class="modal-title">Select Product Items</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($item as $i => $data) { ?>
                            <tr>
                                <td><?= $data->barcode ?></td>
                                <td><?= $data->name ?></td>
                                <td><?= $data->unit_name ?></td>
                                <td class="text-right"><?= indo_currency($data->price) ?></td>
                                <td class="text-right"><?= $data->stock ?></td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-info" id="select" data-id="<?= $data->item_id ?>" data-barcode="<?= $data->barcode ?>" data-name="<?= $data->name ?>" data-unit="<?= $data->unit_name ?>" data-stock="<?= $data->stock ?>">
                                        <i class="fa fa-check"></i> Select
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
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
        $(document).on('click', '#select', function() {
            var item_id = $(this).data('id');
            var barcode = $(this).data('barcode');
            var name = $(this).data('name');
            var unit_name = $(this).data('unit');
            var stock = $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#item_unit').val(unit_name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');
        })
    })
</script>