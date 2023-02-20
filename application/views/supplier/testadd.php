<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet">

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
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button onclick="deletedata()">Swal</button>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function deletedata() {
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
        });
    }
</script>