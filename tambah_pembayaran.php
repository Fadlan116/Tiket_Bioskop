<form action="" method="post">
    <fieldset>
        <legend>Pembayaran</legend>
    <label for="id_pembayaran">ID Pembayaran :</label><br>
    <input type="text" name="id_pembayaran" id=""><br>
    <label for="metode_pembayaran">Metode Pembayaran :</label><br>
    <input type="text" name="metode_pembayaran" id=""><br>
    <label for="norek">No Rekening :</label><br>
    <input type="text" name="norek" id=""><br>
    <label for="atasnama">Atas Nama :</label><br>
    <input type="text" name="atasnama" id=""><br><br>
    <input type="submit" value="Simpan">
    </fieldset>
</form>

<?php
include 'koneksi.php';
if ($_POST){
    $sql = "INSERT INTO pembayaran (id_pembayaran, metode_pembayaran, norek, atasnama) VALUES ('{$_POST['id_pembayaran']}', '{$_POST['metode_pembayaran']}', '{$_POST['norek']}', '{$_POST['atasnama']}')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "Data Berhasil Disimpan";
        header('Location: index.php');
    } else {
        echo "Data Gagal Disimpan".mysqli_error();
    }
}
?>