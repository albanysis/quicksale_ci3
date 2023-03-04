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
                        <?php $cart = $this->cart->contents();
                        $qty_item = 0;
                        foreach ($cart as $key => $value) {
                            $qty_item = $qty_item + $value['qty'];
                        }
                        ?>
                        <a href="<?= site_url() ?>" data-toggle="dropdown" class=" btn btn-sm btn-info">
                            <i class="fas fa-shopping-cart"></i> <?= ' ', 'Item', '( ', $qty_item, ' )' ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header"><?= $qty_item ?> Item in Cart</span>
                            <div class="dropdown-divider"></div>

                            <?php foreach ($cart as $key => $value) { ?>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-box mr-2"></i> <?= $value['name'] ?>
                                    <span class="float-right text-muted text-sm"><?= $value['qty'], ' x ', number_format($value['subtotal'], 0);  ?></span>
                                </a>
                            <?php } ?>
                            <div class="dropdown-divider"></div>
                            <?php if (empty($cart)) { ?>
                                <a href="#" class="dropdown-item">
                                    <p>Cart Shopping is Empty!</p>
                                </a>
                            <?php } ?>
                            <a href="" class="dropdown-item dropdown-footer">
                                <tr>
                                    <td colspan="2"> </td>
                                    <td class="right"><strong>Total</strong></td>
                                    <td class="right">Rp. <?php echo number_format($this->cart->total(), 0); ?></td>
                                </tr>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('sale/cart') ?>" class="dropdown-item dropdown-footer">
                                <i class="fas fa-shopping-cart mr-2"></i> <b>View Cart</b>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="" class="dropdown-item dropdown-footer">
                                <i class="fas fa-wallet mr-2"></i> <b>CheckOut</b>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                                <tr>
                                    <?php echo form_open('sale/add');
                                    echo form_hidden('id', $data->item_id);
                                    echo form_hidden('qty', 1);
                                    echo form_hidden('price', $data->price);
                                    echo form_hidden('name', $data->name);
                                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                                    ?>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data->barcode ?></td>
                                    <td><?= $data->name ?></td>
                                    <td>Rp. <?= number_format($data->price, 0) ?></td>
                                    <td><?= $data->stock ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-success swalDefaultSuccess" style="width: 100%;">
                                            <i class="fa fa-cart-plus"> </i>
                                        </button>
                                    </td>
                                    <?php echo form_close() ?>
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

<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Barang Telah Ditambahkan! Silahkan lihat keranjang.'
            })
        });
    })
</script>