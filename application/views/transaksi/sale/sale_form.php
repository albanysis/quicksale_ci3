<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sale</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Sale</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content" style="padding: 0 24px;">
    <div class="d-flex" style="gap: 24px;">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="box box-widget">
                            <div class="box-body">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="vertical-align: top;">
                                            <label for="date">Date</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="date" id="date" value="<?= date('Y-m-d') ?>" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: 30%;">
                                            <label for="user">Kasir</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" id="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">
                                            <label for="customer">Customer</label>
                                        </td>
                                        <td>
                                            <div>
                                                <select id="customer" class="form-control">
                                                    <option value="">Umum</option>
                                                    <?php foreach ($customer as $cust => $value) {
                                                        echo '<option value="' . $value->custumer_id . '">' . $value->name . '</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-auto">
                        <div class="box box-widget">
                            <div class="box-body">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="vertical-align: top;">
                                            <label for="barcode">Barcode</label>
                                        </td>
                                        <td>
                                            <div class="form-group input-group">
                                                <input type="hidden" id="item_id">
                                                <input type="hidden" id="price">
                                                <input type="hidden" id="stock">
                                                <input type="text" id="barcode" class="form-control" autofocus>
                                                <span>
                                                    <button id="add_cart" type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;">
                                            <label for="qty">Qty</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="qty" value="1" min="1" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div>
                                                <button type="button" id="add_cart" class="btn btn-outline-primary">
                                                    <i class="fa fa-cart-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 350px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-auto">
                        <div class="box box-widget">
                            <div class="box-body">
                                <div>
                                    <h4>Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
                                    <h1><b><span id="grand_total2" style="font-size: 50pt;">0</span></b></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card" style="padding: 12px;">
        <div class="box-body table-responsive-sm">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Product Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <!-- <th>Discount Item</th> -->
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="t_body">
                    <tr>
                        <td colspan="9" class="text-center">Tidak Ada Item</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex" style="gap: 24px;">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-auto">
                        <div class="box box-widget">
                            <div class="box-body">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="vertical-align: top;">
                                            <label for="sub_total">Sub Total</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="sub_total" value="" class="form-control" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: 30%;">
                                            <label for="discount">Discount</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="discount" value="" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: 30%;">
                                            <label for="grand_total">Grand Total</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="grand_total" value="" class="form-control" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-auto">
                        <div class="box box-widget">
                            <div class="box-body">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="vertical-align: 30%;">
                                            <label for="cash">Cash</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="cash" value="0" min="0" class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: 30%;">
                                            <label for="change">Change</label>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" id="change" class="form-control" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-auto">
                        <div class="box box-widget">
                            <div class="box-body">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="vertical-align: top;">
                                            <label for="note">Note</label>
                                        </td>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <textarea type="number" id="note" rows="3" class="form-control"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <button id="cancel_payment" class="btn btn-flat btn-dark">
                    <i class="fa fa-sync-alt"></i> Cancel
                </button>
            </div>
            <div style="margin-top: 8px;">
                <button id="process_payment" class=" btn btn-flat btn-success">
                    <i class="far fa-paper-plane"></i> Payment
                </button>
            </div>
        </div>
    </div>
</section>

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

        $(document).on('click', '#add_cart', function() {
            $('#tbody').html("");
            $.each(response.carts, function(key, product) {
                total += product.price * product.qty
                $('#tbody').append(`
              <tr>
                <td>${product.name}</td>
                <td colspan="2" class="flex gap">
                  <select class="input-form" id="qty">
                  ${[...Array(product.stock).keys()].map((x) => (
                    `<option ${product.qty == x + 1 ? 'selected' : null} value=${x + 1}>
                        ${x + 1}
                    </option>`
                  ))}
                  </select>
                  <input type="hidden" id="cartId" value="${product.id}"/>
                  <button type="button" style="margin: auto; padding: 8px;" class="btn danger" value="${product.id}">
                    <span class="icon center">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="auto" height="auto" viewBox="0 0 512 512"><polygon points="337.46 240 312 214.54 256 270.54 200 214.54 174.54 240 230.54 296 174.54 352 200 377.46 256 321.46 312 377.46 337.46 352 281.46 296 337.46 240" style="fill:none"/><polygon points="337.46 240 312 214.54 256 270.54 200 214.54 174.54 240 230.54 296 174.54 352 200 377.46 256 321.46 312 377.46 337.46 352 281.46 296 337.46 240" style="fill:none"/><path d="M64,160,93.74,442.51A24,24,0,0,0,117.61,464H394.39a24,24,0,0,0,23.87-21.49L448,160ZM312,377.46l-56-56-56,56L174.54,352l56-56-56-56L200,214.54l56,56,56-56L337.46,240l-56,56,56,56Z"/><rect x="32" y="48" width="448" height="80" rx="12" ry="12"/></svg>
                    </span>
                  </button>
                </td>
                <td style="text-align: right;">
                  ${product.qty * product.price}
                </td>
              </tr>
            `)
            });
        })
    })
</script>