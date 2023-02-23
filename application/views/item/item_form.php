<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= ucfirst($page) ?> Items</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('item') ?>">Items</a></li>
                    <li class="breadcrumb-item active"><?= ucfirst($page) ?> Items</li>
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
                        <form action="<?= site_url('item/proses') ?>" method="POST">
                            <div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <input type="hidden" name="id" value="<?= $row->item_id ?>">
                                        <label for="product_name">Name Product <span style="color: red;">*</span></label>
                                        <input type="text" name="product_name" id="product_name" value="<?= $row->name ?>" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                                    </div>
                                </div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Category <span style="color: red;">*</span></label>
                                        <?= form_dropdown('category', $category, $selectedcategory, ['class' => 'form-control', 'required' => 'required']) ?>
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Unit <span style="color: red;">*</span></label>
                                        <?= form_dropdown('unit', $unit, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                                    </div>
                                </div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Barcode <span style="color: red;">*</span></label>
                                        <input type="text" name="barcode" value="<?= $row->barcode ?>" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Price <span style="color: red;">*</span></label>
                                        <input type="text" name="price" value="<?= $row->price ?>" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                        <button name="<?= $page ?>" type="submit" class="btn btn-primary">Save</button>
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