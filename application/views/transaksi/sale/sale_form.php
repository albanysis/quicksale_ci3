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

<section class="content">
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
                                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-auto">
                        <div class="box box-widget">
                            <div class="box-body">
                                <div>
                                    <h4>Invoice <b><span id="invoice">MP190925001</span></b></h4>
                                    <h1><b><span id="grand_total2" style="font-size: 50pt;">0</span></b></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="box-body table-responsive-sm">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barcode</th>
                        <th>Product Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Discount Item</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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
                <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <i class="fa fa-sync-alt"></i> Cancel
                </button>
            </div>
            <div>
                <button id="process_payment" class=" btn btn-flat btn-success">
                    <i class="far fa-paper-plane"></i> Payment
                </button>
            </div>
        </div>
    </div>
</section>