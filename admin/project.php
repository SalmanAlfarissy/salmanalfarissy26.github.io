<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Project</h1>
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
    <a href=?page=project&aksi=entri&username=<?php echo $_GET['username'] ?> class="btn btn-primary fa fa-plus"> Entri New Project  </a>
</div>
<br/>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Project
            </div>        
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Project ID</th>
                                <th>Nama Project</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>URL</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        
                        <?php 
                        $no=1;
                        $tampil=mysqli_query($koneksi,"SELECT * FROM project order by project_id");
                        while ($data=mysqli_fetch_array($tampil)) {
                            $kat=mysqli_query($koneksi,"SELECT id_kategori,nama_kategori FROM kategori join project using(id_kategori) WHERE id_kategori='$data[id_kategori]'");
                            $kt=mysqli_fetch_array($kat);
                        ?>

                        <tbody>
                            <!-- isi tabel -->
                            <tr class="odd gradeX">
                                <td><?php echo $no?></td>
                                <td><?php echo $data['project_id']?></td>
                                <td><?php echo $data['nama_project']?></td>
                                <td><?php echo $kt['nama_kategori']?></td>
                                <td><?php echo date('j F, Y',strtotime($data['tanggal_project']))?></td>
                                <td><?php echo $data['url_project']?></td>
                                <td><?php echo $data['detail_project']?></td>
                                <td><a href=?page=project&aksi=edit&username=<?php echo $_GET['username'] ?>&project_id=<?php echo $data['project_id']; ?> class="btn btn-success btn-sm fa fa-pencil"> Edit</a>
			                        <a href="aksi_project.php?page=project&username=<?php echo $_GET['username'] ?>&proses=hapus&project_id=<?php echo $data['project_id']; ?>" 
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
                    <a href=?page=project&aksi=list&username=<?php echo $_GET['username'] ?> class="btn btn-danger fa fa-table"> Project </a>
                    <h2>Entri New Project</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_project.php?page=project&proses=input">
                        
                        <div class="form-group">
                            <label>Project ID</label>
                            <input type="text" name="project_id" class="form-control" placeholder="Project ID">
                        </div>

                        <div class="form-group">
                            <label>Nama Project</label>
                            <input type="text" name="nama_project" class="form-control" placeholder="Nama Project">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control">
                            <?php
                            $query=mysqli_query($koneksi,"SELECT * from kategori");
                                while ($data=mysqli_fetch_array($query)){
                                    echo "<option value=$data[id_kategori]>$data[nama_kategori]</option>";
                                }
                            ?>                               
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal_project" class="form-control" placeholder="yyyy-mm-dd">

                        </div>

                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="url_project" class="form-control" placeholder="URL Project">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea rows="5" name="detail_project" class="form-control" placeholder="Deskripsi"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Slide 1</label>
                            <input type="file" name="slide1">
                        </div>

                        <div class="form-group">
                            <label>Slide 2</label>
                            <input type="file" name="slide2">
                        </div>

                        <div class="form-group">
                            <label>Slide 3</label>
                            <input type="file" name="slide3">
                        </div>

                        <div class="form-group">
                            <label>Slide 4</label>
                            <input type="file" name="slide4">
                        </div>

                        <div class="form-group">
                            <label>Slide 5</label>
                            <input type="file" name="slide5">
                        </div>

                        <button type="submit" class="btn btn-primary fa fa-floppy-o"> Simpan</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <br></br>
                        
                    </form>
                    <?php
                        break;
                    case 'edit' :	
                    $query=mysqli_query($koneksi,"SELECT * FROM project WHERE project_id='$_GET[project_id]'");
                    $data=mysqli_fetch_array($query);
                    ?>
                    <a href=?page=project&aksi=list&username=<?php echo $_GET['username'] ?> class="btn btn-danger fa fa-table"> Project </a>
                    <h2>Edit Project</h2>

                    <form role="form" method="post" enctype="multipart/form-data" action="aksi_project.php?page=project&proses=update">
                        
                    <div class="form-group">
                            <label>Project ID</label>
                            <input type="text" name="project_id" class="form-control" value="<?php echo $data['project_id']?>" placeholder="Project ID">
                        </div>

                        <div class="form-group">
                            <label>Nama Project</label>
                            <input type="text" name="nama_project" class="form-control" value="<?php echo $data['nama_project']?>" placeholder="Nama Project">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control">
                            <?php
                            $q=mysqli_query($koneksi,"SELECT * from kategori");
                                while ($cek=mysqli_fetch_array($q)){
                                    if ($cek['id_kategori']==$data['id_kategori']){
                                        echo "<option value=$cek[id_kategori]>$cek[nama_kategori]</option>";
                                    }
                                    
                                }
                            ?>                               
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <?php 
                            $currentDate = $data['tanggal_project'];
                            $convertedDate = str_replace('-', '/', $currentDate );
                            $myNewDate = date("d/m/Y", strtotime($convertedDate));
                            echo "<input type='text' name='tanggal_project' class='form-control' value='$myNewDate' placeholder='dd/mm/yyyy'>"
                            ?>
                            

                        </div>

                        <div class="form-group">
                            <label>URL</label>
                            <input type="text" name="url_project" value=<?php echo $data['url_project'] ?> class="form-control" placeholder="URL Project">
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="detail_project" class="form-control" rows="5" placeholder="Deskripsi"><?php echo $data['detail_project']?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Slide 1</label>
                            <input type="file" name="slide1">
                            <?php 
                            if ($data['slide1']!='') {
                                echo "<img class='gambar' src='/image/slide1/$data[slide1]' height='100' width='100'>";
                            }
                            else {
                                echo "Tidak ada image";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Slide 2</label>
                            <input type="file" name="slide2">
                            <?php 
                            if ($data['slide2']!='') {
                                echo "<img class='gambar' src='/image/slide2/$data[slide2]' height='100' width='100'>";
                            }
                            else {
                                echo "Tidak ada image";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Slide 3</label>
                            <input type="file" name="slide3">
                            <?php 
                            if ($data['slide3']!='') {
                                echo "<img class='gambar' src='/image/slide3/$data[slide3]' height='100' width='100'>";
                            }
                            else {
                                echo "Tidak ada image";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Slide 4</label>
                            <input type="file" name="slide4">
                            <?php 
                            if ($data['slide4']!='') {
                                echo "<img class='gambar' src='/image/slide4/$data[slide5]' height='100' width='100'>";
                            }
                            else {
                                echo "Tidak ada image";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label>Slide 5</label>
                            <input type="file" name="slide5">
                            <?php 
                            if ($data['slide5']!='') {
                                echo "<img class='gambar' src='/image/slide5/$data[slide5]' height='100' width='100'>";
                            }
                            else {
                                echo "Tidak ada image";
                            }
                            ?>
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