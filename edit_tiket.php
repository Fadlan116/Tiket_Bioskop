<?php
include 'koneksi.php';

$sql = "SELECT * FROM tiket WHERE id_tiket = '".$_GET['id_tiket']."'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
?>

<form action="" method="post">
    <fieldset>
        <legend>Edit Tiket</legend>
        <input type="hidden" name="id_tiket" id="" value="<?php echo $data['id_tiket'] ?>">
        <label for="id_tiket">ID Pemesanan</label><br>
        <input type="text" name="id_tiket" id="" value="<?php echo $data['id_tiket'] ?>" readonly><br>
        <label for="genre">Genre</label><br>
        <input type="text" name="genre" id="" value="<?php echo $data['genre'] ?>"><br>
        <label for="film">Film</label><br>
        <input type="text" name="film" id="" value="<?php echo $data['film'] ?>"><br>
        <label for="harga">Harga</label><br>
        <input type="text" name="harga" id="" value="<?php echo $data['harga'] ?>"><br><br>
        <input type="submit" name="" id="" value="Simpan">
    </fieldset>
</form>



<?php
if($_POST){
    $sql = "UPDATE tiket SET genre='{$_POST['genre']}', film='{$_POST['film']}', harga='{$_POST['harga']}' WHERE id_tiket='{$_POST['id_tiket']}'";
    $query = mysqli_query($koneksi, $sql);

    if ($query){
        echo"Data Berhasil Diubah";
        header('Location: index.php');
    } else {
        echo"Data Gagal Diubah: ".mysqli_error();
    }
}
?>