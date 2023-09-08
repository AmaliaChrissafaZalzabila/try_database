<?php
    // Memanggil koneksi menuju database
    include_once("connection.php");

    // Memanggil data dari database
    $result = mysqli_query($mysqli, 'SELECT * FROM 	datamhs');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Membuat CRUD</title>
    <style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(135deg, #BBDEFB, #7986CB);
        background: url(PICT/background.jpg);
        background-size: cover;
    }

    .form-container {
        width: 500px;
        border: 2px solid #ccc;
        padding: 20px;
        margin: 20px;
        background-color: #f2f2f2;
    }

    .form-container input[type="text"] {
        width: 100%;
        padding: 5px;
        box-sizing: border-box;
    }

    .form-container button {
        display: block;
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        background-color: #7986CB;
        color: white;
        border: none;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .form-container button:hover {
        background-color: #7986CB;
    }

    .table-container {
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 3px;
        text-align: left;
    }

    table th {
        background-color: #7986CB;
        color: white;
    }

    table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .add-button {
        background-color: #7986CB;
        color: white;
        border: none;
        cursor: pointer;
        padding: 10px;
        margin-top: 10px;
    }

    .add-button:hover {
        background-color: #7986CB;
    }

    .empty-data {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Data Mahasiswa</h2>
        <div class="table-container">
            <table border="1" style="width: 500px;">
                <tr>
                    <th>Nama</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                <?php 
                if (mysqli_num_rows($result) > 0) {
                while($user_data = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $user_data['nama']; ?></td>
                    <td><?php echo $user_data['fakultas']; ?></td>
                    <td><?php echo $user_data['prodi']; ?></td>
                    <td><?php echo $user_data['alamat']; ?></td>
                    <td>
                        <form action="edit.php" method="GET" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                            <button type="submit" style="padding: 5px 10px; font-size: 12px;">Edit</button>
                        </form>
                        <form action="delete.php" method="GET" style="display: inline;">
                            <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
                            <button type="submit" style="padding: 5px 10px; font-size: 12px;">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php 
            } 
        } else {
            ?>
                <tr>
                    <td colspan="5" class="empty-data">Tidak ada data </td>
                </tr>
                <?php 
        }
        ?>
            </table>
        </div>
        <form action="add.php" method="POST" name="addUser">
            <button type="submit" class="add-button">Tambah</button>
        </form>
    </div>
</body>

</html>