<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?= $this->session->flashdata('success') ?>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <div class="box">
                <div class="box-header">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px">
                        <h3 class="box-title">Data Users</h3>
                        <a href="<?= site_url('user/add') ?>" class="btn btn-sm btn-info">
                            Add New User
                        </a>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($row->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->username ?></td>
                                        <td><?= $data->name ?></td>
                                        <td><?= $data->address ?></td>
                                        <td><?= $data->level == 1 ? "Admin" : "Kasir" ?></td>
                                        <td>
                                            <a href="<?= site_url('user/edit/' . $data->user_id) ?>" class="btn btn-sm btn-outline-dark">
                                                <i class="fa fa-pencil-alt"> </i>
                                            </a>
                                            <a href="<?= site_url('user/delete/' . $data->user_id) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-sm btn-outline-danger">
                                                <i class="fa fa-trash"> </i>
                                            </a>
                                        </td>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('user/add') ?>" method="POST">
                    <div>
                        <div style="margin-bottom: 5px;">
                            <label>Username</label>
                            <input type="text" name="username" autocomplete="off" required placeholder="Masukkan Username" class="form-control">
                        </div>
                        <div style="margin-bottom: 5px;">
                            <label>Name</label>
                            <input type="text" name="fullname" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                        </div>
                        <div style="margin-bottom: 5px;">
                            <label>Password</label>
                            <input type="password" name="password" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                        </div>
                        <!-- <div style="margin-bottom: 5px;">
                            <label>Password Confimotion</label>
                            <input type="password" name="passconf" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                        </div> -->
                        <div style="margin-bottom: 5px;">
                            <label>Address</label>
                            <input type="text" name="address" autocomplete="off" required placeholder="Masukkan Address" class="form-control">
                        </div>
                        <div>
                            <label>Level</label>
                            <select type="text" name="level" class="form-control">
                                <option value=""> - Pilih - </option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>> Admin </option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>> Kasir </option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default">
                    <i class=" fa fa-redo"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class=" fa fa-paper-plane"></i> Save
                </button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>