<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategori</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<?php
include("../koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi){
    case 'list';
?>

<div>
    <a href=?page=kategori&aksi=entri&username=<?php echo $_GET['username'] ?> class="btn btn-primary fa fa-plus"> Entri Kategori Baru </a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Kategori
            </div>        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM kategori");
                        while ($data=mysqli_fetch_array($tampil)) { 
                        ?>
                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $data['nama_kategori']?></td>
                                
                                <td><a href=?page=kategori&aksi=edit&username=<?php echo $_GET['username'] ?>&id_kategori=<?php echo $data['id_kategori']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_kategori.php?page=kategori&username=<?php echo $_GET['username'] ?>&proses=hapus&id_kategori=<?php echo $data['id_kategori']; ?>" 
				                    onclick="return confirm('Yakin akan menghapus data ?');" class="btn btn-danger btn-sm fa fa-trash-o"> Hapus</td>
                            </tr>
                            <?php
                            $no++;
                        }
                            ?>
                            
                        </tbody>
                    </table>
                    <?php 
                        break;

                        case 'entri' ;

                    ?>
                    <a href=?page=kategori&aksi=list&username=<?php echo $_GET['username'] ?> class="btn btn-danger fa fa-table"> Kategori </a>
                    <h2>Entri New Category</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_kategori.php?page=kategori&proses=input">
                        
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori">
                        </div>

                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <br></br>
                        
                    </form>
                    <?php
                        break;
                    case 'edit' :	
                    $query=mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori='$_GET[id_kategori]'");
                    $data=mysqli_fetch_array($query);
                    ?>
                    <a href=?page=kategori&aksi=list&username=<?php echo $_GET['username'] ?> class="btn btn-danger fa fa-table"> Kategori </a>
                    <h2>Edit Kategori</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_kategori.php?page=kategori&proses=update">

                        <div class="form-group">
                            <label>ID Kategori</label>
                            <input type="text" name="id_kategori" class="form-control" placeholder="ID Kategori" value="<?php echo $data['id_kategori']?>">
                        </div>

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo $data['nama_kategori']?>">
                        </div>
                        
                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        </br>
                        </br>
                    </form>
                    <?php
                        break;
                    }
                    ?>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->