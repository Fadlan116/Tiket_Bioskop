<?php
include 'koneksi.php';

$id = $_GET['id_pemesanan'];

if($id){
    $sql = "DELETE FROM pemesanan WHERE id_pemesanan='{$id}'";
    $query = mysqli_query($koneksi, $sql);
    
    if ($query){
        echo"Data Berhasil Dihapus";
        header('Location: index.php');
    } else {
        echo"Data Gagal Dihapus: ".mysqli_error();
    }
}

?>