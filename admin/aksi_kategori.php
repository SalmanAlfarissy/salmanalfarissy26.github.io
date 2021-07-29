<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='kategori' AND $proses=='hapus'){

mysqli_query($koneksi,"DELETE FROM kategori WHERE id_kategori='$_GET[id_kategori]'");
  header('location:home.php?page=kategori&username='.$_SESSION['username']);
  
}

else if ($page=='kategori' AND $proses=='input'){
  $query =mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori=$_POST[id_kategori]");
  $ckdt = mysqli_num_rows($query);

  if  ($ckdt > 0){
    echo "Data $_POST[nama_kategori] sudah ada!!</br>";
    echo "<a href=javascript:history.go(-1)>Please try again!!</a>"; 
  }else {
    mysqli_query($koneksi,"INSERT INTO kategori (id_kategori,nama_kategori) VALUES (null,'$_POST[nama_kategori]')");
    header('location:index.php?page=kategori&username='.$_SESSION['username']);
  }
}

else if ($page=='kategori' AND $proses=='update'){
    mysqli_query($koneksi,"UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]' WHERE id_kategori='$_POST[id_kategori]'");
  header('location:home.php?page=kategori&username='.$_SESSION['username']);
  }

?>