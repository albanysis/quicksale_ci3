<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= ucfirst($page) ?> Supplier</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('user') ?>">User</a></li>
                    <li class="breadcrumb-item active"><?= ucfirst($page) ?> User</li>
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
                        <form action="<?= site_url('supplier/proses') ?>" method="POST">
                            <div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <input type="hidden" name="id" value="<?= $row->supplier_id ?>">
                                        <label>Supplier Name <span style="color: red;">*</span></label>
                                        <input type="text" name="supplier_name" value="<?= $row->name ?>" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                                        <?= form_error('username') ?>
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Phone <span style="color: red;">*</span></label>
                                        <input type="number" name="phone" value="<?= $row->phone ?>" autocomplete="off" required placeholder="Masukkan Phone Number" class="form-control">
                                        <?= form_error('username') ?>
                                    </div>
                                </div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Address <span style="color: red;">*</span></label>
                                        <textarea type="text" name="addr" utocomplete="off" required class="form-control"><?= $row->address ?></textarea>
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Keterangan</label>
                                        <textarea type="text" name="ket" autocomplete="off" class="form-control"><?= $row->keterangan ?></textarea>
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