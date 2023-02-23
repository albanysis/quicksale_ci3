<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= ucfirst($page) ?> Unit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('unit') ?>">Unit</a></li>
                    <li class="breadcrumb-item active"><?= ucfirst($page) ?> Unit</li>
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
                        <form action="<?= site_url('unit/proses') ?>" method="POST">
                            <div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <input type="hidden" name="id" value="<?= $row->unit_id ?>">
                                        <label>Unit Name <span style="color: red;">*</span></label>
                                        <input type="text" name="unit_name" value="<?= $row->name ?>" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
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