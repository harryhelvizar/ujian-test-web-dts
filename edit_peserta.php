<?php
include 'header.php';
include 'koneksi.php';

$id_peserta = $_GET['id_peserta'];
$edit = mysqli_query ($db, "SELECT * FROM peserta WHERE id_peserta = '$id_peserta'");
$results = mysqli_fetch_all ($edit, MYSQLI_ASSOC);

if(isset($_POST['submit'])){
    $nama_peserta = $_POST['nama_peserta'];
    $id_pelatihan = $_POST['id_pelatihan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $peserta = mysqli_query($db, "UPDATE peserta SET nama_peserta = '$nama_peserta', 
                                                    id_pelatihan = '$id_pelatihan', 
                                                    jenis_kelamin = '$jenis_kelamin' WHERE id_peserta = '$id_peserta'");
    if($peserta){
        echo"
            <script>
                alert ('berhasil edit data!!!');
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
                <h3>form edit peserta</h3>
                <div class="row">
                    <div class="col-md-7">
                    <div class="row">
                            <div class="col-md-3">
                                <label>ID PESERTA</label>
                            </div>
                            <div class="col-md-8">
                                <input disabled type="number" name="id_peserta" class="form-control" value="<?= $results[0]['id_peserta']; ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label>NAMA PESERTA</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="nama_peserta" class="form-control" value="<?= $results[0]['nama_peserta']; ?>">
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
                                        $pelatihan = $results[0]['id_pelatihan'];
                                        $pelatihan1 = mysqli_query($db, "SELECT * FROM pelatihan");
                                        foreach($pelatihan1 as $list_pelatihan){
                                            if($pelatihan == $list_pelatihan['id_pelatihan']){
                                                echo '<option value="'.$list_pelatihan['id_pelatihan'].'"selected>'.$list_pelatihan['jenis_pelatihan'].'</option>';
                                            }else{
                                                echo '<option value="'.$list_pelatihan['id_pelatihan'].'">'.$list_pelatihan['jenis_pelatihan'].'</option>';
                                            }
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
                                    <option value="L" <?= ($results[0]['jenis_kelamin'] == "L") ? "selected" : ""; ?>>laki - laki</option>
                                    <option value="P" <?= ($results[0]['jenis_kelamin'] == "P") ? "selected" : ""; ?>>perempuan</option>                                    
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                
                            </div>
                            <div class="col">
                                <input class="btn btn-primary" type="submit" name="submit" value="edit data">
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