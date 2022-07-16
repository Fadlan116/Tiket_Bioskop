<?php
include 'koneksi.php';
require 'session.php';
if ($_POST){
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM pembayaran WHERE norek LIKE '%$keyword%' OR atasnama LIKE '%$keyword%'";
    $query = mysqli_query($koneksi, $sql);
} else {
    $sql = "SELECT * FROM pembayaran";
    $query = mysqli_query($koneksi, $sql);
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Pembayaran</title>
    <form action=""method="post">

        <input type="text" name="keyword"size="30" autofocus
        placeholder="Masukan No Rekening atau Atas Nama..." autocomplete="off">
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
    <h2>Menu Pembayaran</h2>
    <a href="tambah_pembayaran.php">Tambah Data</a>
    <a href="dashboard.php">Kembali</a>
    <table>
        <tr>
            <th>ID Pembayaran</th>
            <th>Metode Pembayaran</th>
            <th>No Rekening</th>
            <th>Atas Nama</th>
            <th>Kelola</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['id_pembayaran'] ?> </td>
                <td><?php echo $data['metode_pembayaran'] ?> </td>
                <td><?php echo $data['norek'] ?> </td>
                <td><?php echo $data['atasnama'] ?> </td>
                <td><a href="edit_pembayaran.php?id_pembayaran=<?php echo $data['id_pembayaran'] ?>">Edit</a> | <a href="hapus_pembayaran.php?id_pembayaran=<?php echo $data['id_pembayaran'] ?>">Hapus</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>