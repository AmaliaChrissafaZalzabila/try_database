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
        width: 400px;
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
        width: 60%;
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
        <h2>Input Data Mahasiswa</h2>

        <form action="add.php" method="POST" name="addUser">
            <table border="0">
                <tr>
                    <td><label for="nama" class="input-label">Nama Mahasiswa</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="nama" id="nama" placeholder="Masukkan Nama"></td>
                </tr>
                <tr>
                    <td><label for="fakultas" class="input-label">Fakultas</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="fakultas" id="fakultas" placeholder="Masukkan Fakultas"></td>
                </tr>
                <tr>
                    <td><label for="prodi" class="input-label">Prodi</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="prodi" id="prodi" placeholder="Masukkan Prodi"></td>
                </tr>
                <tr>
                    <td><label for="alamat" class="input-label">Alamat</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="Submit" value="Tambah"></td>
                </tr>
            </table>
        </form>
        <div class="button-container">
            <button onclick="location.href='index.php'" class="add-button">Kembali</button>
        </div>
    </div>


    <?php 
        if(isset($_POST['Submit'])) {
            $name = $_POST['nama'];
            $fakultas = $_POST['fakultas'];
            $prodi = $_POST['prodi'];
            $alamat = $_POST['alamat'];

            include_once("connection.php"); 

            
            $result = mysqli_query($mysqli, 
            "INSERT INTO datamhs (nama,fakultas,prodi,alamat) VALUES ('$name','$fakultas','$prodi','$alamat')");
            
           
            header("Location: index.php");
            exit;
        }
    ?>
</body>

</html>