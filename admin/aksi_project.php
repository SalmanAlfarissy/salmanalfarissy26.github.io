<?php
session_start();
include("../koneksi.php");
$page=isset($_GET['page']) ? $_GET['page'] : '';
$proses=isset($_GET['proses']) ? $_GET['proses'] : '';


if ($page=='project' AND $proses=='hapus'){
  
$query=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM project WHERE project_id='$_GET[project_id]'"));
    $slide1=$query['slide1'];
    $slide12='./image/slide1/'.$slide1;
    unlink($slide12);

    $slide2=$query['slide2'];
    $slide22='./image/slide2/'.$slide2;
        unlink($slide22);

    $slide3=$query['slide3'];
    $slide32='./image/slide3/'.$slide3;
        unlink($slide32);

    $slide4=$query['slide4'];
    $slide42='./image/slide4/'.$slide4;
    unlink($slide42);

    $slide5=$query['slide5'];
    $slide52='./image/slide5/'.$slide5;
        unlink($slide52);
    
mysqli_query($koneksi,"DELETE FROM project WHERE project_id='$_GET[project_id]'");
  header('location:home.php?page=project&username='.$_SESSION['username']);
}

else if ($page=='project' AND $proses=='input'){

  $lokasi_slide1    = $_FILES['slide1']['tmp_name'];
  $tipe_slide1      = $_FILES['slide1']['type'];
  $nama_slide1      = $_FILES['slide1']['name'];
  $acak           = rand(000000,999999);
  $nama_slide1_unik = $acak.$nama_slide1;

  $lokasi_slide2    = $_FILES['slide2']['tmp_name'];
  $tipe_slide2      = $_FILES['slide2']['type'];
  $nama_slide2      = $_FILES['slide2']['name'];
  $nama_slide2_unik = $acak.$nama_slide2;

  $lokasi_slide3    = $_FILES['slide3']['tmp_name'];
  $tipe_slide3      = $_FILES['slide3']['type'];
  $nama_slide3      = $_FILES['slide3']['name'];
  $nama_slide3_unik = $acak.$nama_slide3;

  $lokasi_slide4    = $_FILES['slide4']['tmp_name'];
  $tipe_slide4      = $_FILES['slide4']['type'];
  $nama_slide4      = $_FILES['slide4']['name'];
  $nama_slide4_unik = $acak.$nama_slide4;

  $lokasi_slide5    = $_FILES['slide5']['tmp_name'];
  $tipe_slide5      = $_FILES['slide5']['type'];
  $nama_slide5      = $_FILES['slide5']['name'];
  $nama_slide5_unik = $acak.$nama_slide5;

  $currentDate = $_POST['tanggal_project'];
  $convertedDate = str_replace('/', '-', $currentDate );
  $myNewDate = date("Y-m-d", strtotime($convertedDate));


  if (!empty($lokasi_slide1) && !empty($lokasi_slide2) && !empty($lokasi_slide3) && !empty($lokasi_slide4) && !empty($lokasi_slide5)){
    
    if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png" AND $tipe_slide2 != "image/jpeg" AND $tipe_slide2 != "image/pjpg" AND $tipe_slide2 != "image/png" AND $tipe_slide3 != "image/jpeg" AND $tipe_slide3 != "image/pjpg" AND $tipe_slide3 != "image/png" AND $tipe_slide4 != "image/jpeg" AND $tipe_slide4 != "image/pjpg" AND $tipe_slide4 != "image/png" AND $tipe_slide5 != "image/jpeg" AND $tipe_slide5 != "image/pjpg" AND $tipe_slide5 != "image/png") {
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
            Tipe file <b>$nama_slide2</b> : $tipe_slide2 <br>
            Tipe file <b>$nama_slide3</b> : $tipe_slide3 <br>
            Tipe file <b>$nama_slide4</b> : $tipe_slide4 <br>
            Tipe file <b>$nama_slide5</b> : $tipe_slide5 <br>
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
        echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
    }    else{
      move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
      move_uploaded_file($lokasi_slide2,"image/slide2/$nama_slide2_unik");
      move_uploaded_file($lokasi_slide3,"image/slide3/$nama_slide3_unik");
      move_uploaded_file($lokasi_slide4,"image/slide4/$nama_slide4_unik");
      move_uploaded_file($lokasi_slide5,"image/slide5/$nama_slide5_unik");

      mysqli_query($koneksi,"INSERT INTO `project` (`project_id`, `nama_project`, `id_kategori`, `tanggal_project`, `url_project`, `detail_project`, `slide1`, `slide2`, `slide3`, `slide4`, `slide5`) VALUES ('$_POST[project_id]', '$_POST[nama_project]', '$_POST[id_kategori]', '$myNewDate', '$_POST[url_project]', '$_POST[detail_project]', '$nama_slide1_unik', '$nama_slide2_unik', '$nama_slide3_unik', '$nama_slide4_unik', '$nama_slide5_unik');");
    header('location:home.php?page=project&username='.$_SESSION['username']);
    }

  }else if(!empty($lokasi_slide1) && !empty($lokasi_slide2) && !empty($lokasi_slide3) && !empty($lokasi_slide4)){
    if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png" AND $tipe_slide2 != "image/jpeg" AND $tipe_slide2 != "image/pjpg" AND $tipe_slide2 != "image/png" AND $tipe_slide3 != "image/jpeg" AND $tipe_slide3 != "image/pjpg" AND $tipe_slide3 != "image/png" AND $tipe_slide4 != "image/jpeg" AND $tipe_slide4 != "image/pjpg" AND $tipe_slide4 != "image/png") {
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
            Tipe file <b>$nama_slide2</b> : $tipe_slide2 <br>
            Tipe file <b>$nama_slide3</b> : $tipe_slide3 <br>
            Tipe file <b>$nama_slide4</b> : $tipe_slide4 <br>
            
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
        echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
    }    else{
      move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
      move_uploaded_file($lokasi_slide2,"image/slide2/$nama_slide2_unik");
      move_uploaded_file($lokasi_slide3,"image/slide3/$nama_slide3_unik");
      move_uploaded_file($lokasi_slide4,"image/slide4/$nama_slide4_unik");

      mysqli_query($koneksi,"INSERT INTO `project` (`project_id`, `nama_project`, `id_kategori`, `tanggal_project`, `url_project`, `detail_project`, `slide1`, `slide2`, `slide3`, `slide4`, `slide5`) VALUES ('$_POST[project_id]', '$_POST[nama_project]', '$_POST[id_kategori]', '$myNewDate', '$_POST[url_project]', '$_POST[detail_project]', '$nama_slide1_unik', '$nama_slide2_unik', '$nama_slide3_unik', '$nama_slide4_unik', '');");
    header('location:home.php?page=project&username='.$_SESSION['username']);
    }

  }else if(!empty($lokasi_slide1) && !empty($lokasi_slide2) && !empty($lokasi_slide3)){
    if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png" AND $tipe_slide2 != "image/jpeg" AND $tipe_slide2 != "image/pjpg" AND $tipe_slide2 != "image/png" AND $tipe_slide3 != "image/jpeg" AND $tipe_slide3 != "image/pjpg" AND $tipe_slide3 != "image/png") {
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
            Tipe file <b>$nama_slide2</b> : $tipe_slide2 <br>
            Tipe file <b>$nama_slide3</b> : $tipe_slide3 <br>
            
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
        echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
    }    else{
      move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
      move_uploaded_file($lokasi_slide2,"image/slide2/$nama_slide2_unik");
      move_uploaded_file($lokasi_slide3,"image/slide3/$nama_slide3_unik");

      mysqli_query($koneksi,"INSERT INTO `project` (`project_id`, `nama_project`, `id_kategori`, `tanggal_project`, `url_project`, `detail_project`, `slide1`, `slide2`, `slide3`, `slide4`, `slide5`) VALUES ('$_POST[project_id]', '$_POST[nama_project]', '$_POST[id_kategori]', '$myNewDate', '$_POST[url_project]', '$_POST[detail_project]', '$nama_slide1_unik', '$nama_slide2_unik', '$nama_slide3_unik', '', '');");
    header('location:home.php?page=project&username='.$_SESSION['username']);
    }

  }else if(!empty($lokasi_slide1) && !empty($lokasi_slide2)){
    if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png" AND $tipe_slide2 != "image/jpeg" AND $tipe_slide2 != "image/pjpg" AND $tipe_slide2 != "image/png") {
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
            Tipe file <b>$nama_slide2</b> : $tipe_slide2 <br>
            
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
        echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
    }    else{
      move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
      move_uploaded_file($lokasi_slide2,"image/slide2/$nama_slide2_unik");

      mysqli_query($koneksi,"INSERT INTO `project` (`project_id`, `nama_project`, `id_kategori`, `tanggal_project`, `url_project`, `detail_project`, `slide1`, `slide2`, `slide3`, `slide4`, `slide5`) VALUES ('$_POST[project_id]', '$_POST[nama_project]', '$_POST[id_kategori]', '$myNewDate', '$_POST[url_project]', '$_POST[detail_project]', '$nama_slide1_unik', '$nama_slide2_unik', '', '', '');");
    header('location:home.php?page=project&username='.$_SESSION['username']);
    }

  }else if(!empty($lokasi_slide1)){
    if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png") {
      echo "Gagal menyimpan data !!! <br>
            Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
            
            Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
        echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
    }    else{
      move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");

      mysqli_query($koneksi,"INSERT INTO `project` (`project_id`, `nama_project`, `id_kategori`, `tanggal_project`, `url_project`, `detail_project`, `slide1`, `slide2`, `slide3`, `slide4`, `slide5`) VALUES ('$_POST[project_id]', '$_POST[nama_project]', '$_POST[id_kategori]', '$myNewDate', '$_POST[url_project]', '$_POST[detail_project]', '$nama_slide1_unik', '', '', '', '');");
    header('location:home.php?page=project&username='.$_SESSION['username']);
    }

  }else {
    mysqli_query($koneksi,"INSERT INTO `project` (`project_id`, `nama_project`, `id_kategori`, `tanggal_project`, `url_project`, `detail_project`, `slide1`, `slide2`, `slide3`, `slide4`, `slide5`) VALUES ('$_POST[project_id]', '$_POST[nama_project]', '$_POST[id_kategori]', '$myNewDate', '$_POST[url_project]', '$_POST[detail_project]', '', '', '', '', '');");
    header('location:home.php?page=project&username='.$_SESSION['username']);
  }

}else if ($page=='project' AND $proses=='update'){
  $query=mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM project WHERE project_id='$_POST[project_id]'"));
        

        $lokasi_slide1    = $_FILES['slide1']['tmp_name'];
        $tipe_slide1      = $_FILES['slide1']['type'];
        $nama_slide1      = $_FILES['slide1']['name'];
        $acak           = rand(000000,999999);
        $nama_slide1_unik = $acak.$nama_slide1;
      
        $lokasi_slide2    = $_FILES['slide2']['tmp_name'];
        $tipe_slide2      = $_FILES['slide2']['type'];
        $nama_slide2      = $_FILES['slide2']['name'];
        $nama_slide2_unik = $acak.$nama_slide2;
      
        $lokasi_slide3    = $_FILES['slide3']['tmp_name'];
        $tipe_slide3      = $_FILES['slide3']['type'];
        $nama_slide3      = $_FILES['slide3']['name'];
        $nama_slide3_unik = $acak.$nama_slide3;
      
        $lokasi_slide4    = $_FILES['slide4']['tmp_name'];
        $tipe_slide4      = $_FILES['slide4']['type'];
        $nama_slide4      = $_FILES['slide4']['name'];
        $nama_slide4_unik = $acak.$nama_slide4;
      
        $lokasi_slide5    = $_FILES['slide5']['tmp_name'];
        $tipe_slide5      = $_FILES['slide5']['type'];
        $nama_slide5      = $_FILES['slide5']['name'];
        $nama_slide5_unik = $acak.$nama_slide5;
      
        $currentDate = $_POST['tanggal_project'];
        $convertedDate = str_replace('/', '-', $currentDate );
        $myNewDate = date("Y-m-d", strtotime($convertedDate));
  
        if (!empty($lokasi_slide1) && !empty($lokasi_slide2) && !empty($lokasi_slide3) && !empty($lokasi_slide4) && !empty($lokasi_slide5)){
    
          if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png" AND $tipe_slide2 != "image/jpeg" AND $tipe_slide2 != "image/pjpg" AND $tipe_slide2 != "image/png" AND $tipe_slide3 != "image/jpeg" AND $tipe_slide3 != "image/pjpg" AND $tipe_slide3 != "image/png" AND $tipe_slide4 != "image/jpeg" AND $tipe_slide4 != "image/pjpg" AND $tipe_slide4 != "image/png" AND $tipe_slide5 != "image/jpeg" AND $tipe_slide5 != "image/pjpg" AND $tipe_slide5 != "image/png") {
            echo "Gagal menyimpan data !!! <br>
                  Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
                  Tipe file <b>$nama_slide2</b> : $tipe_slide2 <br>
                  Tipe file <b>$nama_slide3</b> : $tipe_slide3 <br>
                  Tipe file <b>$nama_slide4</b> : $tipe_slide4 <br>
                  Tipe file <b>$nama_slide5</b> : $tipe_slide5 <br>
                  Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
              echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
          }    else{
            $slide1=$query['slide1'];
          $slide12='./image/slide1/'.$slide1;
          unlink($slide12);

          $slide2=$query['slide2'];
          $slide22='./image/slide2/'.$slide2;
              unlink($slide22);

          $slide3=$query['slide3'];
          $slide32='./image/slide3/'.$slide3;
              unlink($slide32);

          $slide4=$query['slide4'];
          $slide42='./image/slide4/'.$slide4;
          unlink($slide42);

          $slide5=$query['slide5'];
          $slide52='./image/slide5/'.$slide5;
              unlink($slide52);

            move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
            move_uploaded_file($lokasi_slide2,"image/slide2/$nama_slide2_unik");
            move_uploaded_file($lokasi_slide3,"image/slide3/$nama_slide3_unik");
            move_uploaded_file($lokasi_slide4,"image/slide4/$nama_slide4_unik");
            move_uploaded_file($lokasi_slide5,"image/slide5/$nama_slide5_unik");
      
            mysqli_query($koneksi,"UPDATE project SET 
            project_id   	= '$_POST[project_id]',
            nama_project    = '$_POST[nama_project]',
            id_kategori     = '$_POST[id_kategori]',
            tanggal_project    = '$myNewDate',
            url_project     = '$_POST[url_project]',
            detail_project     = '$_POST[detail_project]',
            slide1     = '$nama_slide1_unik',
            slide2     = '$nama_slide2_unik',
            slide3     = '$nama_slide3_unik',
            slide4 = '$nama_slide4_unik',
            slide5       = '$nama_slide5_unik'
           WHERE project_id = '$_POST[project_id]'");
header('location:home.php?page=project&username='.$_SESSION['username']);
          }
      
        }else if(!empty($lokasi_slide1) && !empty($lokasi_slide2) && !empty($lokasi_slide3) && !empty($lokasi_slide4)){
          if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png" AND $tipe_slide2 != "image/jpeg" AND $tipe_slide2 != "image/pjpg" AND $tipe_slide2 != "image/png" AND $tipe_slide3 != "image/jpeg" AND $tipe_slide3 != "image/pjpg" AND $tipe_slide3 != "image/png" AND $tipe_slide4 != "image/jpeg" AND $tipe_slide4 != "image/pjpg" AND $tipe_slide4 != "image/png") {
            echo "Gagal menyimpan data !!! <br>
                  Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
                  Tipe file <b>$nama_slide2</b> : $tipe_slide2 <br>
                  Tipe file <b>$nama_slide3</b> : $tipe_slide3 <br>
                  Tipe file <b>$nama_slide4</b> : $tipe_slide4 <br>
                  
                  Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
              echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
          }    else{
            $slide1=$query['slide1'];
          $slide12='./image/slide1/'.$slide1;
          unlink($slide12);

          $slide2=$query['slide2'];
          $slide22='./image/slide2/'.$slide2;
              unlink($slide22);

          $slide3=$query['slide3'];
          $slide32='./image/slide3/'.$slide3;
              unlink($slide32);

          $slide4=$query['slide4'];
          $slide42='./image/slide4/'.$slide4;
          unlink($slide42);

            move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
            move_uploaded_file($lokasi_slide2,"image/slide2/$nama_slide2_unik");
            move_uploaded_file($lokasi_slide3,"image/slide3/$nama_slide3_unik");
            move_uploaded_file($lokasi_slide4,"image/slide4/$nama_slide4_unik");
      
            mysqli_query($koneksi,"UPDATE project SET 
                            project_id   	= '$_POST[project_id]',
                            nama_project    = '$_POST[nama_project]',
                            id_kategori     = '$_POST[id_kategori]',
                            tanggal_project    = '$myNewDate',
                            url_project     = '$_POST[url_project]',
                            detail_project     = '$_POST[detail_project]',
                            slide1     = '$nama_slide1_unik',
                            slide2     = '$nama_slide2_unik',
                            slide3     = '$nama_slide3_unik',
                            slide4 = '$nama_slide4_unik'
                           WHERE project_id = '$_POST[project_id]'");
  header('location:home.php?page=project&username='.$_SESSION['username']);
          }
      
        }else if(!empty($lokasi_slide1) && !empty($lokasi_slide2) && !empty($lokasi_slide3)){
          if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png" AND $tipe_slide2 != "image/jpeg" AND $tipe_slide2 != "image/pjpg" AND $tipe_slide2 != "image/png" AND $tipe_slide3 != "image/jpeg" AND $tipe_slide3 != "image/pjpg" AND $tipe_slide3 != "image/png") {
            echo "Gagal menyimpan data !!! <br>
                  Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
                  Tipe file <b>$nama_slide2</b> : $tipe_slide2 <br>
                  Tipe file <b>$nama_slide3</b> : $tipe_slide3 <br>
                  
                  Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
              echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
          }    else{
            $slide1=$query['slide1'];
            $slide12='./image/slide1/'.$slide1;
            unlink($slide12);
  
            $slide2=$query['slide2'];
            $slide22='./image/slide2/'.$slide2;
                unlink($slide22);
  
            $slide3=$query['slide3'];
            $slide32='./image/slide3/'.$slide3;
                unlink($slide32);

            move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
            move_uploaded_file($lokasi_slide2,"image/slide2/$nama_slide2_unik");
            move_uploaded_file($lokasi_slide3,"image/slide3/$nama_slide3_unik");
      
            mysqli_query($koneksi,"UPDATE project SET 
                            project_id   	= '$_POST[project_id]',
                            nama_project    = '$_POST[nama_project]',
                            id_kategori     = '$_POST[id_kategori]',
                            tanggal_project    = '$myNewDate',
                            url_project     = '$_POST[url_project]',
                            detail_project     = '$_POST[detail_project]',
                            slide1     = '$nama_slide1_unik',
                            slide2     = '$nama_slide2_unik',
                            slide3     = '$nama_slide3_unik'
                           WHERE project_id = '$_POST[project_id]'");
  header('location:home.php?page=project&username='.$_SESSION['username']);
          }
      
        }else if(!empty($lokasi_slide1) && !empty($lokasi_slide2)){
          if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png" AND $tipe_slide2 != "image/jpeg" AND $tipe_slide2 != "image/pjpg" AND $tipe_slide2 != "image/png") {
            echo "Gagal menyimpan data !!! <br>
                  Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
                  Tipe file <b>$nama_slide2</b> : $tipe_slide2 <br>
                  
                  Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
              echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
          }    else{
            $slide1=$query['slide1'];
            $slide12='./image/slide1/'.$slide1;
            unlink($slide12);
  
            $slide2=$query['slide2'];
            $slide22='./image/slide2/'.$slide2;
                unlink($slide22);

            move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
            move_uploaded_file($lokasi_slide2,"image/slide2/$nama_slide2_unik");
      
            mysqli_query($koneksi,"UPDATE project SET 
            project_id   	= '$_POST[project_id]',
            nama_project    = '$_POST[nama_project]',
            id_kategori     = '$_POST[id_kategori]',
            tanggal_project    = '$myNewDate',
            url_project     = '$_POST[url_project]',
            detail_project     = '$_POST[detail_project]',
            slide1     = '$nama_slide1_unik',
            slide2     = '$nama_slide2_unik'
           WHERE project_id = '$_POST[project_id]'");
header('location:home.php?page=project&username='.$_SESSION['username']);
          }
      
        }else if(!empty($lokasi_slide1)){
          if ($tipe_slide1 != "image/jpeg" AND $tipe_slide1 != "image/pjpg" AND $tipe_slide1 != "image/png") {
            echo "Gagal menyimpan data !!! <br>
                  Tipe file <b>$nama_slide1</b> : $tipe_slide1 <br>
                  
                  Tipe file yang diperbolehkan adalah : <b>JPG/JPEG/png</b>.<br>";
              echo "<a href=javascript:history.go(-1)>Ulangi Lagi</a>";       
          }    else{
            $slide1=$query['slide1'];
            $slide12='./image/slide1/'.$slide1;
            unlink($slide12);

            move_uploaded_file($lokasi_slide1,"image/slide1/$nama_slide1_unik");
      
            mysqli_query($koneksi,"UPDATE project SET 
                            project_id   	= '$_POST[project_id]',
                            nama_project    = '$_POST[nama_project]',
                            id_kategori     = '$_POST[id_kategori]',
                            tanggal_project    = '$myNewDate',
                            url_project     = '$_POST[url_project]',
                            detail_project     = '$_POST[detail_project]',
                            slide1     = '$nama_slide1_unik'
                           WHERE project_id = '$_POST[project_id]'");
  header('location:home.php?page=project&username='.$_SESSION['username']);
          }
      
        }else {
          mysqli_query($koneksi,"UPDATE project SET 
                            project_id   	= '$_POST[project_id]',
                            nama_project    = '$_POST[nama_project]',
                            id_kategori     = '$_POST[id_kategori]',
                            tanggal_project    = '$myNewDate',
                            url_project     = '$_POST[url_project]',
                            detail_project     = '$_POST[detail_project]'
                           WHERE project_id = '$_POST[project_id]'");
  header('location:home.php?page=project&username='.$_SESSION['username']);
        }
  }

?>