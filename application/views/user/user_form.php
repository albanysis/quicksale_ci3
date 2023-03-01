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
                        <form action="<?= site_url('user/proses') ?>" method="POST">
                            <div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <input type="hidden" name="id" value="<?= $row->user_id ?>">
                                        <label>Username <span style="color: red;">*</span></label>
                                        <input type="text" name="username" value="<?= $row->username ?>" autocomplete="off" required placeholder="Masukkan Username" class="form-control">
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Name <span style="color: red;">*</span></label>
                                        <input type="text" name="name" value="<?= $row->name ?>" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>password <span style="color: red;">*</span></label>
                                        <input type="password" name="password" value="" autocomplete="off" placeholder="Masukan Password" class="form-control">
                                    </div>
                                </div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Level <span style="color: red;">*</span></label>
                                        <select type="text" name="level" autocomplete="off" class="form-control">
                                            <option value=""> - Pilih - </option>
                                            <option value="1" <?= $row->level == 1 ? 'selected' : null ?>>Admin</option>
                                            <option value="2" <?= $row->level == 2 ? 'selected' : null ?>>Kasir</option>
                                        </select>
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Address</label>
                                        <textarea type="text" name="address" utocomplete="off" class="form-control"><?= $row->address ?></textarea>
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