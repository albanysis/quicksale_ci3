<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Supplier
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
            <li class="active">Supplier</li>
        </ol>
    </section>
    <?= $this->session->flashdata('message') ?>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Supplier</h3>
                <div class="pull-right">
                    <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Add New</a>
                    <!-- <a href="<?= base_url('supplier') ?>">ADD</a> -->
                </div>
            </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomer Telpon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $s) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $s->nama_supplier ?></td>
                                <td><?= $s->alamat_supplier ?></td>
                                <td><?= $s->nomer_tlp ?></td>
                                <td>
                                    <button class="btn btn-success" data-toggle="modal" data-placement="top" title="Edit" data-target="#editSupplier">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- <a href="<?= base_url('supplier/hapus/' . $s->id_supplier) ?>" class="btn btn-danger fa fa-trash"></a> -->
                                    <button class="btn btn-danger" onclick="deletedata(<?= htmlspecialchars('\'' . $s->nama_supplier . '\'') . ',' . $s->id_supplier; ?>)" data-toggle="tooltip" data-placement="top" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal ADD -->
<form action="<?= site_url('supplier/add') ?>" method="POST">
    <div class="modal fade" id="modal_add_new" tabindex="-1" aria-labelledby="modal_add_newLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_add_newLabel">Modal title</h1>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('supplier/add') ?>" method="POST">
                        <div>
                            <div style="margin-bottom: 10px;">
                                <label>Name</label>
                                <input type="text" name="nama_supplier" autocomplete="off" required placeholder="Masukkan Name" class="form-control">
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Alamat</label>
                                <input type="text" name="alamat_supplier" autocomplete="off" required placeholder="Masukkan Alamat" class="form-control">
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Nomer Tlp</label>
                                <input type="text" name="nomer_tlp" autocomplete="off" required placeholder="Masukkan Nomer Telpon" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Edit -->
<form action="<?= site_url('supplier/edit') ?>" method="POST">
    <div class="modal fade" id="editSupplier" tabindex="-1" aria-labelledby="editSupplierLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSupplierLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('supplier/edit') ?>" method="POST">
                        <div>
                            <div style="margin-bottom: 10px;">
                                <label>Name</label>
                                <input type="text" name="nama_supplier" autocomplete="off" required placeholder="Masukkan Name" class="form-control" value="<?= $s->nama_supplier ?>">
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Alamat</label>
                                <input type="text" name="alamat_supplier" autocomplete="off" required placeholder="Masukkan Alamat" class="form-control" value="<?= $s->alamat_supplier ?>">
                            </div>
                            <div style="margin-bottom: 10px;">
                                <label>Nomer Tlp</label>
                                <input type="text" name="nomer_tlp" autocomplete="off" required placeholder="Masukkan Nomer Telpon" class="form-control" value="<?= $s->nomer_tlp ?>">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Delete button -->
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    function deletedata(nama, id) {
        console.log(id);
        swal({
                title: "Apakah anda yakin akan menghapus data " + nama + " ?",
                text: "Data yang dihapus tidak bisa dikembalikan",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, archive it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    var datapost = {
                        id: id,
                        nama: nama
                    }
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('supplier/delete') ?>",
                        data: JSON.stringify(datapost),
                        dataType: 'json',
                        contentType: 'application/json; charset=utf-8',
                        success: function(response) {
                            if (response.status == true) {
                                // KONDISI JIKA DATA BERHASIL DI HAPUS
                                swal({
                                    title: 'Success!',
                                    text: response.message,
                                    type: "success"
                                }, function() {
                                    window.location = "<?= base_url('admin/supplier'); ?>";
                                });
                            } else {
                                // KONDISI JIKA GAGAL DELETE DATA
                                swal("Failed!", e.status + ' ' + e.message, "error");
                            }
                        },
                        error: function(e, json, errorThrown) {
                            // FUNGSI JIKA AJAX TIDAK MERESPONSE, ERROR DARI KONEKSI ATAU DARI SISTEM
                            console.log(e.status, e.message, json, errorThrown);
                            swal("Failed!", e.status + ' ' + e.message, "error");
                        }
                    }).fail(function(xhr, status, message) {
                        // FUNGSI JIKA AJAX TIDAK MERESPONSE
                        swal("Failed!", "Invalid respon, silahkan cek kembali inputan anda.", "error");
                    });
                } else {
                    // KONDISI JIKA CONFIRM DELETE DI CANCEL ATAU DIBATALKAN
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
    }
</script>