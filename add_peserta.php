<?php
include 'koneksi.php';
include 'header.php';

if(isset($_POST['submit'])){
    $nama_peserta = $_POST['nama_peserta'];
    $id_pelatihan = $_POST['id_pelatihan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $peserta = mysqli_query($db, "INSERT INTO peserta SET nama_peserta = '$nama_peserta', id_pelatihan = '$id_pelatihan', jenis_kelamin = '$jenis_kelamin'");
    if($peserta){
        echo"
            <script>
                alert ('berhasil tambah data!!');
                document.location.href = 'peserta.php';
            </script>
        ";
    }
}
?>


    <div class="form-group">
        <div class="container">
            <form action="" method="POST">
                <br><br><br>
                <h3>form tambah peserta</h3>
                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-3">
                                <label>NAMA PESERTA</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="nama_peserta" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>JENIS PELATIHAN</label>
                            </div>
                            <div class="col-md-8">
                                <select name="id_pelatihan" class="form-control">
                                    <?php
                                        $pelatihan1 = mysqli_query($db, "SELECT * FROM pelatihan");
                                        foreach($pelatihan1 as $list_pelatihan){
                                            echo '<option value="'.$list_pelatihan['id_pelatihan'].'">'.$list_pelatihan['jenis_pelatihan'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>JENIS KELAMIN</label>
                            </div>
                            <div class="col-md-8">
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="L">laki - laki</option>
                                    <option value="P">perempuan</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                
                            </div>
                            <div class="col">
                                <input class="btn btn-primary" type="submit" name="submit" value="simpan data">
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-5">
                        <img class="img-fluid" src="assets/img/laptop.png" alt="">
                    </div>
                </div>
            </form>
        </div>
    </div>


<?php
include 'footer.php';
?>