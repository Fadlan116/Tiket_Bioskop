<form action="" method="post">
    <fieldset>
        <legend>Tiket</legend>
    <label for="id_tiket">ID Tiket :</label><br>
    <input type="text" name="id_tiket" id=""><br>
    <label for="genre">Genre :</label><br>
    <input type="text" name="genre" id=""><br>
    <label for="film">Film :</label><br>
    <input type="text" name="film" id=""><br>
    <label for="harga">Harga :</label><br>
    <input type="text" name="harga" id=""><br><br>
    <input type="submit" value="Simpan">
    </fieldset>
</form>

<?php
include 'koneksi.php';
if ($_POST){
    $sql = "INSERT INTO tiket (id_tiket, genre, film, harga) VALUES ('{$_POST['id_tiket']}', '{$_POST['genre']}', '{$_POST['film']}', '{$_POST['harga']}')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        echo "Data Berhasil Disimpan";
        header('Location: index.php');
    } else {
        echo "Data Gagal Disimpan".mysqli_error();
    }
}
?>