<form action="" method="post">
    <fieldset>
        <legend>Pemesanan</legend>
    <label for="id_pemesanan">ID Pemesanan :</label><br>
    <input type="text" name="id_pemesanan" id=""><br>
    <label for="id_pembayaran">ID Pembayaran :</label><br>
    <input type="text" name="id_pembayaran" id=""><br>
    <label for="id_tiket">ID Tiket :</label><br>
    <input type="text" name="id_tiket" id=""><br>
    <label for="nama">Nama :</label><br>
    <input type="text" name="nama" id=""><br>
    <label for="jam">Jam :</label><br>
    <input type="text" name="jam" id=""><br>
    <label for="tanggal">Tanggal :</label><br>
    <input type="text" name="tanggal" id=""><br>
    <label for="jumlah_tiket">Jumlah Tiket :</label><br>
    <input type="text" name="jumlah_tiket" id=""><br><br>
    <input type="submit" value="Simpan">
    </fieldset>
</form>

<?php
include 'koneksi.php';
if ($_POST){
    $sql = "INSERT INTO pemesanan (id_pemesanan, id_pembayaran, id_tiket, nama, jam, tanggal, jumlah_tiket) VALUES ('{$_POST['id_pemesanan']}', '{$_POST['id_pembayaran']}', '{$_POST['id_tiket']}', '{$_POST['nama']}', '{$_POST['jam']}', '{$_POST['tanggal']}', '{$_POST['jumlah_tiket']}')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "Data Berhasil Disimpan";
        header('Location: index.php');
    } else {
        echo "Data Gagal Disimpan".mysqli_error();
    }
}
?>