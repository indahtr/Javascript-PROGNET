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
    <title>RESPONSE PHP</title>
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
                  <li><a class="dropdown-item" href="index.html">Tugas Javascript</a></li>
                  <li><a class="dropdown-item" href="index.php">Tugas PHP</a></li>
          </div>
        </div>
      </nav>
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

        
    <div class="container">
        <div id="result">
            
        </div>
    </div>
    
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>