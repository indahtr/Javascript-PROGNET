<?php 
    $host = "192.168.4.4";
    $user = "2205551053";
    $pass = "2205551053";
    $db = "db_2205551053";

    $conn = new mysqli($host, $user, $pass, $db);
    if($conn->connect_error){
        die("Koneksi gagal: ").$conn->connect_error;
    }

    $email      = "";
    $nama       = "";
    $universitas= "";
    $prodi      = "";
    $nim        = "";
    $birthdate  = "";
    $agama      = "";
    $error      = "";
    $sukses     = "";

    if(isset($_GET['op'])){
        $op = $_GET['op'];
    }else{
        $op = "";
    }

    if($op == 'delete'){
        $id         = $_GET['id'];
        $sql       = "delete from FORM where id = '$id'";
        $q1         = mysqli_query($conn,$sql);
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil dihapus";
            $sukses = "Data berhasil dihapus";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $error = "Data gagal dihapus";
        }
    }

    if ($op == 'edit') {
        $id         = $_GET['id'];
        $sql1       = "select * from FORM where id = '$id'";
        $q1         = mysqli_query($conn, $sql1);
        $r1         = mysqli_fetch_array($q1);
        $email      = $r1['email'];
        $nama       = $r1['nama'];
        $universitas= $r1['universitas'];
        $prodi      = $r1['prodi'];
        $nim        = $r1['nim'];
        $birthdate  = $r1['birthdate'];
        $agama      = $r1['agama'];
    
        if ($nim == '') {
            $error = "Data tidak ditemukan";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email      = $_POST['email'];
        $nama       = $_POST['nama'];
        $universitas= $_POST['universitas'];
        $prodi      = $_POST['prodi'];
        $nim        = $_POST['nim'];
        $birthdate  = $_POST['birthdate'];
        $agama      = $_POST['agama'];
        
        if($op == 'edit'){
                $sql       = "update FORM set email = '$email', nama = '$nama', universitas = '$universitas', prodi = '$prodi',  nim = '$nim', birthdate  = '$birthdate', agama = '$agama' where id = '$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "Data baru berhasil di-update";
                    $sukses = "Data baru berhasil di-update";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    $error = "Data baru gagal di-update";
                }
        }else{

            $sql = "INSERT INTO FORM (email, nama, universitas, prodi, nim,  birthdate , agama) VALUES ( '$email', '$nama', '$universitas', '$prodi','$nim','$birthdate ', '$agama')";
        
            if ($conn->query($sql) === TRUE) {
                echo "Data baru berhasil ditambahkan";
                $sukses = "Data baru berhasil ditambahkan";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                $error = "Data baru gagal ditambahkan";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect Database</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <style>
        body {
          background: linear-gradient(#eef3f8 0%,#d2e5f3 40%, #a2d9ff 100%);
            font-family: 'Lora', serif;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 15px;
        }
        .nav {
            padding-right: 15px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            text-align: left;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            
        }
       
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="../index.html">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#profile">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Projects
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Tugas Javascript</a></li>
                  <li><a class="dropdown-item" href="index.php">Tugas PHP</a></li>
          </div>
        </div>
      </nav>
      <br><br><br><br>
    <div class="container">
        <h1>CREATE/EDIT BIODATA</h1>
        <br>
        <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    
                }
                ?>
        <form method="POST" action="">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="name@example.com" value="<?php echo $email ?>" required><br>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="nama" placeholder="ex : Pande Komang Indah Triroshanti" value="<?php echo $nama ?>" required><br>
            <label for="univ">Universitas:</label>
            <input type="text" id="univ"  name="universitas" placeholder="ex : Universitas Udayana" value="<?php echo $universitas ?>" required><br>
            <label for="prodi">Program Studi:</label>
            <input type="text" id="prodi"  name="prodi" placeholder="ex : Teknologi Informasi"  value="<?php echo $prodi ?>" required><br>
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" placeholder="2205551053"  value="<?php echo $nim ?>" required><br>
            <label for="birthdate">Tanggal Lahir:</label>
            <input type="date" id="tglLahir" name="birthdate"  value="<?php echo $birthdate ?>" required><br><br>
            <label for="agama" >Agama</label>
            <select name="agama" id="agama" class="form-control" required>
                <option value="">--Pilih Agama--</option>
                <option value="Hindu" <?php if($agama == "Hindu") echo "selected" ?>>Hindu</option>
                <option value="Kristen" <?php if($agama == "Kristen") echo "selected" ?>>Kristen</option>
                <option value="Katolik" <?php if($agama == "Katolik") echo "selected" ?>>Katolik</option>
                <option value="Buddha" <?php if($agama == "Buddha") echo "selected" ?>>Buddha</option>
                <option value="Konghucu" <?php if($agama == "Konghucu") echo "selected" ?>>Konghucu</option>
                <option value="Islam" <?php if($agama == "Islam") echo "selected" ?>>Islam</option>
            </select>      
            <input type="submit" value="Submit" name="simpan">
        </form>
    </div>
    <div class="card">
            <div class="card-header text-white bg-secondary">
                BIODATA MAHASISWA
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Universitas</th>
                            <th scope="col">Prodi</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Agama</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
                            $sql2   = "SELECT * FROM FORM";
                            $result = $conn->query($sql2);
                            $urut   = 0;
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $id         = $row['id'];
                                    $email      = $row['email'];
                                    $nama       = $row['nama'];
                                    $universitas= $row['universitas'];
                                    $prodi      = $row['prodi'];
                                    $nim        = $row['nim'];
                                    $birthdate   = $row['birthdate'];
                                    $agama      = $row['agama'];
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo ++$urut ?></td>
                                        <td scope="row"><?php echo $email ?></td>
                                        <td scope="row"><?php echo $nama ?></td>
                                        <td scope="row"><?php echo $universitas ?></td>
                                        <td scope="row"><?php echo $prodi ?></td>
                                        <td scope="row"><?php echo $nim ?></td>
                                        <td scope="row"><?php echo $birthdate ?></td>
                                        <td scope="row"><?php echo $agama ?></td>
                                        <td scope="row">
                                            <a href="index2.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                            <a href="index2.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                        </td>

                                    </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>