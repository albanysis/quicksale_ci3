<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= ucfirst($page) ?> Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('user') ?>">Customer</a></li>
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
                        <form action="<?= site_url('custumer/proses') ?>" method="POST">
                            <div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <input type="hidden" name="id" value="<?= $row->custumer_id ?>">
                                        <label>Customer Name <span style="color: red;">*</span></label>
                                        <input type="text" name="custumer_name" value="<?= $row->name ?>" autocomplete="off" required placeholder="Masukkan Name" class="form-control">

                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Phone <span style="color: red;">*</span></label>
                                        <input type="number" name="phone" value="<?= $row->phone ?>" autocomplete="off" required placeholder="Masukkan Phone Number" class="form-control">

                                    </div>
                                </div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Class <span style="color: red;">*</span></label>
                                        <select type="text" name="class" autocomplete="off" class="form-control">
                                            <option value=""> - Pilih - </option>
                                            <option value="1" <?= $row->class == 1 ? 'selected' : null ?>>Gold</option>
                                            <option value="2" <?= $row->class == 2 ? 'selected' : null ?>>Platinum</option>
                                        </select>
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Address</label>
                                        <textarea type="text" name="addr" utocomplete="off" class="form-control"><?= $row->address ?></textarea>
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