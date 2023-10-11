<!DOCTYPE html>
<html lang="en">

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $univ = $_POST['univ'];
        $fakultas = $_POST['fakultas'];
        $prodi = $_POST['prodi'];
        $nim = $_POST['nim'];
        $gender = $_POST['gender'];
        $umur = $_POST['umur'];
        $birthplace = $_POST['birthplace'];
        $tglLahir = $_POST['tglLahir'];
        $hobi = [];
        $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [];
        $agama = isset($_POST['agama']) ? $_POST['agama'] : '';
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PHP</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('../img/iyah1.jpg');
            background-size: cover;
            font-family: 'Lora', serif;
        }
        .header{
            position: fixed;
            width: 100%;
            top: 0;
            background-image: url('../img/iyah1.jpg');
            background-size: cover;
            padding: 15px; 
            z-index: 1000;
        }
        .nav{
            padding-right: 15px;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: left;
            background-color: black;
            color: white;
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
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        
    </style>
</head>

<body>
    <div class="header d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom fs-5">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-2 text-black">Mirah Kartika</span>
        </a>
    
        <ul class="nav nav-pills align-items-center">
        <li class="nav-item"><a href="../index.html" class="nav-link text-black" aria-current="page">Profile</a></li>
        <li class="nav-item"><a href="../Instagram/index.html" class="nav-link text-black">Instagram</a></li>
        <li class="nav-item"><a href="../Contact/index.html" class="nav-link text-black">Contact</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link active bg-black dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Projects
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-black" href="index.html">Tugas JavaScript</a></li>
              <li><a class="dropdown-item text-black" href="index.php">Tugas PHP</a></li>
            </ul>
          </li>
        </ul>
    </div>
    <br><br><br><br>
    <div class="container">
       
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th class="table-secondary" scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col">Email</th>
                    <div class="test">
                    <th class="table-secondary" scope="col"><?php echo $email?></th>
                    </div>
                </tr>
                <tr>
                    <th scope="col">Nama</th>
                    <th class="table-secondary" scope="col"><?php echo $nama?></th>
                </tr>
                <tr>
                    <th scope="col">Universitas</th>
                    <th class="table-secondary" scope="col"><?php echo $univ?></th>
                </tr>
                <tr>
                    <th scope="col">Fakultas</th>
                    <th class="table-secondary" scope="col"><?php echo $fakultas?></th>
                </tr>
                <tr>
                    <th scope="col">Program Studi</th>
                    <th class="table-secondary" scope="col"><?php echo $prodi?></th>
                </tr>
                <tr>
                    <th scope="col">NIM</th>
                    <th class="table-secondary" scope="col"><?php echo $nim?></th>
                </tr>
                <tr>
                    <th scope="col">Jenis Kelamin</th>
                    <th class="table-secondary" scope="col"><?php echo $gender?></th>
                </tr>
                <tr>
                    <th scope="col">Umur</th>
                    <th class="table-secondary" scope="col"><?php echo $umur?></th>
                </tr>
                <tr>
                    <th scope="col">Tempat Lahir</th>
                    <th class="table-secondary" scope="col"><?php echo $birthplace?></th>
                </tr>
                <tr>
                    <th scope="col">Tanggal Lahir</th>
                    <th class="table-secondary" scope="col"><?php echo $tglLahir?></th>
                </tr>
                <tr>
                    <th scope="col">Hobi</th>
                    <th class="table-secondary" scope="col"><?php 
                        foreach ($hobi as $item) {
                            echo "$item<br>";
                        }
                    ?></th>
                </tr>
                <tr>
                    <th scope="col">Agama</th>
                    <th class="table-secondary" scope="col"><?php echo $agama?></th>
                </tr>
            </tbody>
        </table>

    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>