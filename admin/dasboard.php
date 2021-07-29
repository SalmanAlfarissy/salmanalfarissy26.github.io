<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron">
            <h1>Hello Selamat Datang </br><?php
            include("../koneksi.php");
            $queri=mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$_GET[username]'");
            $data=mysqli_fetch_array($queri);
            echo $data['nama'] ?>!!!</h1>
            <p>Selamat datang di web admin portofolio dimana fungsi dari web ini adalah untuk melakukan pengeditan portofolio.</p>
            <!-- <p><a class="btn btn-primary btn-lg" role="button">Learn more</a> -->
            </p>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
