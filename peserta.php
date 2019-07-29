<?php
include 'header.php';
include 'koneksi.php';

$query = mysqli_query ($db, "SELECT * FROM peserta INNER JOIN pelatihan ON peserta.id_pelatihan = pelatihan.id_pelatihan");
$results = mysqli_fetch_all ($query, MYSQLI_ASSOC);

if(isset($_GET['hapus'])){
    $id_peserta = $_GET['hapus'];
    $hapus = mysqli_query($db, "DELETE FROM peserta WHERE id_peserta = '$id_peserta'");
    if($hapus){
        echo"
            <script>
                alert ('berhasil hapus data!!!');
                document.location.href = 'peserta.php';
            </script>
        ";
    }
}
?>


<div class="container">
    <br><br><br>
    <h3>Form peserta VSGA</h3>
    <a class="btn btn-primary" href="add_peserta.php">TAMBAH DATA</a><br><br>
    <table class="table table-striped">
        <tr>
            <th>NOMOR</th>
            <th>ID PESERTA</th>
            <th>NAMA PESERTA</th>
            <th>PELATIHAN</th>
            <th>JENIS KELAMIN</th>
            <th>PILIHAN</th>
        </tr>
        <?php $i=1; ?>
        <?php foreach($results as $row) :?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['id_peserta']; ?></td>
                <td><?= $row['nama_peserta']; ?></td>
                <td><?= $row['jenis_pelatihan']; ?></td>
                <td><?= $row['jenis_kelamin']; ?></td>
                <td>
                    <a class="btn btn-warning" href="edit_peserta.php?id_peserta=<?= $row['id_peserta']; ?>">edit</a>
                    <a class="btn btn-danger" href="peserta.php?hapus=<?=$row['id_peserta']; ?>">hapus</a>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>


<?php
include 'footer.php';
?>