<?php
include 'koneksi.php';
require 'session.php';
if ($_POST){
    $keyword = $_POST['keyword'];
    $sql = "SELECT * FROM tiket INNER JOIN pemesanan ON tiket.id_tiket=pemesanan.id_tiket
                                INNER JOIN pembayaran ON pembayaran.id_pembayaran=pemesanan.id_pembayaran
                                WHERE pemesanan.nama LIKE '%$keyword%' OR pemesanan.tanggal LIKE '%$keyword%'";
    $query = mysqli_query($koneksi, $sql);
} else { 
    $sql = "SELECT * FROM tiket INNER JOIN pemesanan ON tiket.id_tiket=pemesanan.id_tiket
                            INNER JOIN pembayaran ON pembayaran.id_pembayaran=pemesanan.id_pembayaran";
    $query = mysqli_query($koneksi, $sql);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Pemesanan</title>
</head>
<style>
    table, th , td{
        border: 1px solid black;
        padding: 5px;
    }
</style>
<body>
    <h2>Menu Pemesanan</h2>
    <form action=""method="post">

        <input type="text" name="keyword"size="30" autofocus
        placeholder="Masukan Nama atau Tanggal..." autocomplete="off">
        <button type="sumbit" name="cari">Cari!</button>

    </form>
    <a href="tambah_pemesanan.php">Tambah Data</a>
    <a href="dashboard.php">Kembali</a>
    <table>
        <tr>
            <th>ID Pemesanan</th>
            <th>ID Pembayaran</th>
            <th>ID Tiket</th>
            <th>Nama</th>
            <th>Jam</th>
            <th>Tanggal</th>
            <th>Jumlah Tiket</th>
            <th>Kelola</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $data['id_pemesanan'] ?> </td>
                <td><?php echo $data['id_pembayaran'] ?> </td>
                <td><?php echo $data['id_tiket'] ?> </td>
                <td><?php echo $data['nama'] ?> </td>
                <td><?php echo $data['jam'] ?> </td>
                <td><?php echo $data['tanggal'] ?> </td>
                <td><?php echo $data['jumlah_tiket'] ?> </td>
                <td><a href="edit_pemesanan.php?id_pemesanan=<?php echo $data['id_pemesanan'] ?>">Edit</a> | <a href="hapus_pemesanan.php?id_pemesanan=<?php echo $data['id_pemesanan'] ?>">Hapus</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>