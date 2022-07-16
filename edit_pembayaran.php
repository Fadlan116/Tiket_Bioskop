<?php
include 'koneksi.php';

$sql = "SELECT * FROM pembayaran WHERE id_pembayaran = '".$_GET['id_pembayaran']."'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<form action="" method="post">
    <fieldset>
        <legend>Edit Pembayaran</legend>
    <input type="hidden" name="id_pembayaran" id="" value="<?php echo $data['id_pembayaran'] ?>"><br>
    <label for="id_pembayaran">ID Pembayaran</label><br>
    <input type="text" name="id_pembayaran" id="" value="<?php echo $data['id_pembayaran'] ?>" readonly><br>
    <label for="metode_pembayaran">Metode Pembayaran</label><br>
    <input type="text" name="metode_pembayaran" id="" value="<?php echo $data['metode_pembayaran'] ?>"><br>
    <label for="norek">No Rekening</label><br>
    <input type="text" name="norek" id="" value="<?php echo $data['norek'] ?>"><br>
    <label for="atasnama">Atas Nama</label><br>
    <input type="text" name="atasnama" id="" value="<?php echo $data['atasnama'] ?>"><br><br>
    <input type="submit" name="" id="" value="Simpan">
    </fielset>
</form>



<?php
if($_POST){
    $sql = "UPDATE pembayaran SET metode_pembayaran='{$_POST['metode_pembayaran']}', norek='{$_POST['norek']}',atasnama='{$_POST['atasnama']}' WHERE  id_pembayaran='{$_POST['id_pembayaran']}'";
    $query = mysqli_query($koneksi, $sql);

    if ($query){
        echo"Data Berhasil Diubah";
        header('Location: index.php');
    } else {
        echo"Data Gagal Diubah: ".mysqli_error();
    }
}
?>