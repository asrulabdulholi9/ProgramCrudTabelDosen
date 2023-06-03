<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
   <h2>Daftar Dosen</h2>
    <a class="btn btn-primary" href="create.php" role="button">Tambah</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIDN </th>
                <th>Jenjang Pendidikan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "siakad";

            $connection = new mysqli($servername, $username, $password, $database);

            if($connection->connect_error){
                die("Connection failed: ". $connection->connect_error);
            }

            $sql = "SELECT * FROM dosen";
            $result = $connection->query($sql);

            if(!$result){
                die("Invalid query: ". $connection->error);
            }

            while($row = $result->fetch_assoc()){
                echo "
                <tr>
                <td>$row[ID]</td>
                <td>$row[Nama]</td>
                <td>$row[NIDN]</td>
                <td>$row[Jenjang_Pendidikan]</td>
                <td>
                <a class='btn btn-primary btn-sm' href='edit.php?ID=$row[ID]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='delete.php?ID=$row[ID]'>Hapus</a>
                </td>
            </tr>
        </tbody>
                ";
            }
                     ?>
        </tbody>
    </table>
</div>
    
</body>
</html>