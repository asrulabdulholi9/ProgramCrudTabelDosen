<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "siakad";

$connection = new mysqli($servername, $username, $password, $database);

$nama  = "";
$NIDN = "";
$jenjangpendidikan = "";


$errorMessage = "";
$successMessage ="";

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = $_POST["Nama"];
    $NIDN = $_POST["NIDN"];
    $jenjangpendidikan = $_POST["Jenjang_Pendidikan"];
    

    do {
        if(empty($nama) || empty($NIDN) || empty($jenjangpendidikan)){
            $errorMessage = "All the fields are required";
            break;
        }

        try {
            $sql = "INSERT INTO dosen (Nama, NIDN, Jenjang_Pendidikan) VALUES ('$nama', '$NIDN', '$jenjangpendidikan')";
            $result = $connection->query($sql);
        } catch (\Exception $e) {
            $errorMessage = "Invalid Query: " . $connection->error;
            break;
        };
                 

        $nama  = "";
        $kodematkul = "";
        $deskripsi = "";
      

        $successMessage = "Data Berhasil ditambah";

        header("location: index.php");
        exit;
    
       
    } while (false);
  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Tambah Data</h2>

        <?php
        if( !empty($errorMessage)){
            echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>
         <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-label">Nama Dosen</label>
                <div clas="col-sm-6">
                    <input type="text" class="form-control" name="Nama" value="<?php echo $nama; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-label">NIDN</label>
                <div clas="col-sm-6">
                    <input type="text" class="form-control" name="NIDN" value="<?php echo $NIDN; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-label">Jenjang Pendidikan</label>
                <div clas="col-sm-6">
               <select class="form-control" name="Jenjang_Pendidikan" >
               <option value="<?php echo $jenjangpendidikan="S1"; ?>">S1</option>
               <option value="<?php echo $jenjangpendidikan="S2"; ?>">S2</option>
               </select>
                </div>
            </div>
            

            <?php
              if(!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$successMessage</strong>
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>
               </di>
               </div>
                ";
              }
            ?>
          <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
               </div>
              <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
            </div>
           </div>
         </form>
    </div>
</body>
</html>
