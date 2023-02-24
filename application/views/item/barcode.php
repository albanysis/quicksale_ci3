<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Barcode Generator</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('item') ?>">Items</a></li>
                    <li class="breadcrumb-item active"> Barcode</li>
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
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px">
                <h3 class="box-title">Barcode</h3>
                <a href="<?= site_url('item/barcode_print/' . $row->item_id) ?>" target="_blank" class="btn btn-sm btn-info">
                    <i class="fa fa-print"></i>
                </a>
            </div>
            <div class="box">
                <div class="box-body">
                    <div style="width: 100%; display:grid; place-items:center;">
                        <?php
                        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                        echo $generator->getBarcode($row->barcode, $generator::TYPE_CODE_128);
                        ?>
                        <?= $row->barcode ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->