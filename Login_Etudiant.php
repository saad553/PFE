<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
   

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $host = "127.0.0.1";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "projet";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if($conn->connect_error){
        echo "echec";
        die("Connection failed:". $conn->connect_error);
    }

    $query= "SELECT * FROM etudiant WHERE email = '$email' AND pass = '$password'";
    $result= $conn->query($query);
    //print($result->num_rows);

    if($result->num_rows == 1){
        header("Location: success.php");
        exit();
        
    }
    
    else{
       header("Location: error.php");
       echo $_SERVER["REQUEST_METHOD"];
        exit();
    }
    $conn->close();
}


?>



<!DOCTYPE html>
<html lang="fr">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page de Connexion</title>
<link rel="stylesheet" href="Login_Etudiant.css">
</head>
<body>

  
  <form action="#" method="post" class="mx-auto">
  <div class="mb-3">
    <label for="email" class="form-label"></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="pass" class="form-label"></label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

</body>
<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</footer>
</html>


