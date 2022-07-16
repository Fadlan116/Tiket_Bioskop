<?php
include 'koneksi.php';

$sql = "SELECT * FROM pemesanan WHERE id_pemesanan = '".$_GET['id_pemesanan']."'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<form action="" method="post">
    <fieldset>
        <legend>Edit Pemesanan</legend>
        <input type="hidden" name="id_pemesanan" id="" value="<?php echo $data['id_pemesanan'] ?>">
        <label for="id_pemesanan">ID Pemesanan</label><br>
        <input type="text" name="id_pemesanan" id="" value="<?php echo $data['id_pemesanan'] ?>" readonly><br>
        <label for="id_pembayaran">ID Pembayaran</label><br>
        <input type="text" name="id_pembayaran" id="" value="<?php echo $data['id_pembayaran'] ?>" readonly><br>
        <label for="id_tiket">ID Tiket</label><br>
        <input type="text" name="id_tiket" id="" value="<?php echo $data['id_tiket'] ?>" readonly><br>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="" value="<?php echo $data['nama'] ?>"><br>
        <label for="jam">Jam</label><br>
        <input type="text" name="jam" id="" value="<?php echo $data['jam'] ?>"><br>
        <label for="tanggal">Tanggal</label><br>
        <input type="text" name="tanggal" id="" value="<?php echo $data['tanggal'] ?>"><br>
        <label for="jumlah_tiket">Jumalah Tiket</label><br>
        <input type="text" name="jumlah_tiket" id="" value="<?php echo $data['jumlah_tiket'] ?>"><br><br>
        <input type="submit" name="" id="" value="Simpan">
    </fieldset>

</form>



<?php
if($_POST){
    $sql = "UPDATE pemesanan SET nama='{$_POST['nama']}', jam='{$_POST['jam']}', tanggal='{$_POST['tanggal']}', jumlah_tiket='{$_POST['jumlah_tiket']}' WHERE  id_pemesanan='{$_POST['id_pemesanan']}'";
    $query = mysqli_query($koneksi, $sql);

    if ($query){
        echo"Data Berhasil Diubah";
        header('Location: index.php');
    } else {
        echo"Data Gagal Diubah: ".mysqli_error();
    }
}
?>