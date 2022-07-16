<?php
include 'koneksi.php';
require 'session.php';
if ($_POST){
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM tiket WHERE genre LIKE '%$keyword%' OR film LIKE '%$keyword%'";
    $query = mysqli_query($koneksi, $sql);
} else {
    $sql = "SELECT * FROM tiket";
    $query = mysqli_query($koneksi, $sql);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Tiket</title>
    <form action=""method="post">

        <input type="text" name="keyword"size="30" autofocus
        placeholder="Masukan Genre atau Film..." autocomplete="off">
        <button type="sumbit" name="cari">Cari!</button>

    </form>
</head>
<style>
    table, th, td{
        border: 1px solid black;
        padding: 5px;
    }
</style>
<body>
    <h2>Menu Tiket</h2>
    <a href="tambah_tiket.php">Tambah Data</a>
    <a href="dashboard.php">Kembali</a>
    <table>
        <tr>
            <th>ID Tiket</th>
            <th>Genre</th>
            <th>Film</th>
            <th>Harga</th>
            <th>Kelola</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['id_tiket'] ?> </td>
                <td><?php echo $data['genre'] ?> </td>
                <td><?php echo $data['film'] ?> </td>
                <td><?php echo $data['harga'] ?> </td>
                <td><a href="edit_tiket.php?id_tiket=<?php echo $data['id_tiket'] ?>">Edit</a> | <a href="hapus_tiket.php?id_tiket=<?php echo $data['id_tiket'] ?>">Hapus</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>