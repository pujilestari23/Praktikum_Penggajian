<div id="top" class="row mb-3">
    <div class="col">
        <h3>Ubah Data Bagian</h3>
    </div>
    <div class="col">
        <a href="?page=bagian" class="btn btn-primary float-end">
            <i class="fa fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div class="pesan" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";

        if (isset($_POST['simpan_button'])){

            $id = $_GET['id']; 
            $nama = $_POST['nama'];
            
            $checkSQL = "SELECT * FROM bagian WHERE nama = '$nama' AND id!=$id";
            $result = mysqli_query($connection, $checkSQL);
            if (mysqli_num_rows($result) > 0){
        ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa fa-exclamation-circle"></i>
                    Nama bagian sama sudah ada
                </div>
                <?php
            } else {
                $sql = "UPDATE bagian SET nama='$nama' WHERE id = $id";
                $result = mysqli_query($connection, $sql);
                if (!$result) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="fa fa-exclamation-circle"></i>
                        <?php echo mysqli_eror($connection) ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa fa-check-circle"></i>
                        Ubah data berhasil dihapus
                    </div>
        <?php
                }
            }
        }
        
        $id = $_GET['id'];
        $selectSQL = mysqli_query($connection, $selectSQL);
        if (!$result 
        || mysqli_num_rows($result) == 0){
            echo '<meta http-equiv="refresh" content="0;url=?page=bagian">';
        }
        $row = mysqli_fetch_assoc($result);
        ?>
    </div>
</div>
<div id="inputan" class="row mb-3">
<div class="col">
        <div class="card px-3 py-3">
            <from action="" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Id</label>
                    <input type="text" class="form-control" id="id" nama="id" value="<?php echo $id ?>" readonly>
                </div>
                <div class="card px-3 py-3">
                    <label for="nama" class="form-label">Nama Bagian</label>
                    <input type="text" class="form-control" id="nama" nama="nama" placeholder="misal: HRD" value="<? echo $row['nama'] ?>" required>
                </div>
                <div class="col mb-3">
                    <button class="btn btn-succes" type="submit" name="simpan_button">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>
                </div>
            </from>
        </div>
    </div>
</div>
<script>
    if (window.history.replaceState) {
        window.history.replanceState(null, null, window.locatoin.href);
    }
</script>