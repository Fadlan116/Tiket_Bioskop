<?php
include 'koneksi.php';

$id = $_GET['id_tiket'];

if($id){
    $sql = "DELETE FROM tiket WHERE id_tiket='{$id}'";
    $query = mysqli_query($koneksi, $sql);
    
    if ($query){
        echo"Data Berhasil Dihapus";
        header('Location: index.php');
    } else {
        echo"Data Gagal Dihapus: ".mysqli_error();
    }
}

?>