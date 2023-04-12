<?php
require '../script/dbkoneksi.php';

$sql = "SELECT * FROM kategori_produk ";
$stmt = $conn->prepare($sql);
$stmt->execute();

?>
<link rel="stylesheet" href="../css/kduk.css">
<table class="table">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $number = 1;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
        ?>
            <tr>
                <td class="no"><?= $number ?></td>
                <td><?= $row['nama'] ?></td>
            </tr>
        <?php
            $number++;
        endwhile;
        ?>
    </tbody>
</table>