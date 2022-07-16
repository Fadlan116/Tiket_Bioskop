<?php
include 'koneksi.php';

$id = $_GET['id_pembayaran'];

if($id){
    $sql = "DELETE FROM pembayaran WHERE id_pembayaran='{$id}'";
    $query = mysqli_query($koneksi, $sql);
    
    if ($query){
        echo"Data Berhasil Dihapus";
        header('Location: index.php');
    } else {
        echo"Data Gagal Dihapus: ".mysqli_error();
    }
}

?>