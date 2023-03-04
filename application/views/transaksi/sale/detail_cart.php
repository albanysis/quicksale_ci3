<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Details Items</h1>
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
                    <h3 class="box-title">Details Cart</h3>
                    <div>
                        <a href="<?= site_url('sale') ?>" class="btn btn-sm btn-warning">
                            Back
                        </a>
                    </div>
                </div>
                <?php echo form_open('sale/update'); ?>

                <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table table-bordered table-striped">

                    <tr>
                        <th style="width: 85px;">QTY</th>
                        <th class="text-center">Item Description</th>
                        <th class="text-center">Item Price</th>
                        <th class="text-center">Sub-Total</th>
                        <th class="text-center">Actions</th>
                    </tr>

                    <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items) : ?>
                        <tr>
                            <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'min' => '0', 'maxlength' => '3', 'size' => '5', 'type' => 'number', 'class' => 'form-control')); ?></td>
                            <td class="text-center">
                                <?php echo $items['name']; ?>
                            </td>
                            <td class="text-center" style="text-align:right">Rp. <?php echo number_format($items['price'], 0); ?></td>
                            <td class="text-center" style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('sale/delete/' . $items['rowid']) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                        <?php $i++; ?>

                    <?php endforeach; ?>

                    <tr>
                        <td colspan="2"> </td>
                        <td class="text-center"><strong>Total</strong></td>
                        <td class="text-center"><strong>Rp. <?php echo number_format($this->cart->total(), 0); ?></strong> </td>
                        <td colspan="2"> </td>

                    </tr>

                </table>



                <div class="row no-print">
                    <div class="col-12">
                        <a href="" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <a href="" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                            Payment
                        </a>
                        <button type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Update
                        </button>
                        <a href="<?= site_url('sale/clear') ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger float-right" style="margin-right: 5px;">
                            <i class="fas fa-retweet"></i> Clear Cart
                        </a>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    <!-- /.card -->

</section>