<?php
include_once("connection.php");


if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $name = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    
    $query = mysqli_query($mysqli,
        "UPDATE datamhs SET nama='$name', fakultas='$fakultas', prodi='$prodi', alamat='$alamat' WHERE id='$id' ");

    header('Location: index.php');
}

$id = $_GET['id'];

$query = mysqli_query($mysqli, "SELECT * FROM datamhs WHERE id='$id'");

while ($user_data = mysqli_fetch_array($query)) {
    $name = $user_data['nama'];
    $fakultas = $user_data['fakultas'];
    $prodi = $user_data['prodi'];
    $alamat = $user_data['alamat'];
}
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
        width: 410px;
        border: 1px solid #ccc;
        padding: 20px;
        margin: 20px;
        background-color: #f2f2f2;
    }

    .form-container input[type="text"] {
        width: 210%;
        padding: 10px;
        box-sizing: border-box;
    }

    .form-container input[type="submit"] {
        width: 170%;
        padding: 10px;
        box-sizing: border-box;
        background-color: #7986CB;
        color: white;
        border: none;
        cursor: pointer;
        margin-left: 150%;
        margin-top: 20px;
        display: block;
    }

    .form-container input[type="submit"]:hover {
        background-color: #7986CB;
    }

    .form-container button {
        display: block;
        width: 50%;
        padding: 10px;
        box-sizing: border-box;
        background-color: #7986CB;
        color: white;
        border: none;
        cursor: pointer;
        margin-right: 50px;
        margin-top: -40px;
    }

    .form-container button.add-button {
        display: block;
        width: 100px;
        padding: 10px;
        box-sizing: border-box;
        background-color: #7986CB;
        color: white;
        border: none;
        cursor: pointer;
        margin-right: 50px;
    }

    .input-label {
        text-align: center;
        margin-bottom: 5px;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Update Data Mahasiswa</h2>

        <form action="edit.php" method="POST" name="editUser">
            <table border="0">
                <tr>
                    <td><label for="nama" class="input-label">Nama Mahasiswa</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $name ?>"></td>
                </tr>
                <tr>
                    <td><label for="fakultas" class="input-label">Fakultas</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="fakultas" id="fakultas" placeholder="Masukkan Fakultas"
                            value="<?= $fakultas ?>"></td>
                </tr>
                <tr>
                    <td><label for="prodi" class="input-label">Prodi</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="prodi" id="prodi" placeholder="Masukkan Prodi" value="<?= $prodi ?>">
                    </td>
                </tr>
                <tr>
                    <td><label for="alamat" class="input-label">Alamat</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat"
                            value="<?= $alamat ?>"></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id" value="<?= $id ?>"></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        </form>
        <div class="button-container">
            <button onclick="location.href='index.php'" class="add-button">Kembali</button>
        </div>
    </div>
</body>

</html>