<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('user') ?>">User</a></li>
                    <li class="breadcrumb-item active">Tambah User</li>
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
                        <form action="<?= site_url('user/edit') ?>" method="POST">
                            <div>
                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Username</label>
                                        <input type="text" name="username" value="" autocomplete="off" required placeholder="Masukkan Username" class="form-control">
                                        <?= form_error('username') ?>
                                    </div>
                                    <div style="margin-bottom: 5px;width: 100%;">
                                        <label>Name</label>
                                        <input type="text" name="fullname" value="" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                                    </div>
                                </div>

                                <div class="d-flex" style="gap: 24px;">
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Password</label> <small>( biarkan kosong jika tidak diganti )</small>
                                        <input type="password" name="password" value="" autocomplete="off" placeholder="Masukkan Password" class="form-control">
                                    </div>
                                    <div style="margin-bottom: 5px; width: 100%;">
                                        <label>Level</label>
                                        <select type="text" name="level" required class="form-control">
                                            <!-- <?php $level = $this->input->post('level')  ?? $row->level  ?> -->
                                            <option value="1"> Admin </option>
                                            <option value="2" <?= $level == 2 ? 'selected' : null ?>> Kasir </option>
                                        </select>
                                    </div>
                                </div>
                                <div style="margin-bottom: 10px;">
                                    <label>Address</label>
                                    <input type="text" name="address" value="" autocomplete="off" required class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
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