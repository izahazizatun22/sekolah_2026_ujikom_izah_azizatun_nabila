<?php
include 'koneksi.php';
 $query = "SELECT * FROM tbuser";
 $result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tampil kategori</title>
</head>
<body>
    <h2>Data SKategori</h2>
   
    <table>
        <tr>
            <th>Id Kategori</th>
            <th>Ket Kategori</th>
            
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id_kategori'];?></td>
            <td><?php echo $row['ket_kategori'];?></td>
            
            
            <td>
                <a href="edit.php?nis=<?php echo $row['id_kategori']; ?>">Edit</a>
                
                <a href="delete.php?nis=<?php echo $row['id_kategori']; ?>" 
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php } ?>
        
    </table>
</body>
</html>