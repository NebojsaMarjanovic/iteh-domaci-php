<?php
include 'dbBroker.php';
include 'model/user.php';

session_start();


if(isset($_POST['submit'])){
    $uime=$_POST['ime'];
    $uemail=$_POST['email'];
    $usifra=$_POST['sifra'];
    $ukatedra=$_POST['katedra'];
    $ukabinet=$_POST['kabinet'];

     $uid=$_SESSION['user_id'];
    $korisnik = new User($uid,$uime,$ukatedra, $uemail,$ukabinet, $usifra);
   
    $korisnik::addUser($uime,$ukatedra, $uemail, $usifra, $ukabinet, $conn);
    $_SESSION['user_id'] = $korisnik->id;
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Prijava moderatora</title>
  </head>
  <body>


  <ul >
  <li><a href="prikaz.php">Pocetna</a></li>
  <li><a href="dodajKurs.php">Dodaj kurs</a></li>
  <?php if( $_SESSION['user_id']==1){
  echo "<li><a href='dodajModeratora.php'>Dodaj moderatora</a></li>";}?>
  <li><a href="moderatori.php">Moderatori</a></li>
  <li><a href="index.php">Log out</a></li>
</ul>
    <div class="container  ">

    <form method="post">
        <div class="form-group ">
            <label >Ime</label>
            <input type="text" name="ime" class="form-control" placeholder="Unesite ime" autocomplete=off>
         </div>

         <div class="form-group mt-4">
            <label >Katedra</label>
            <input type="text" name="katedra" class="form-control" placeholder="Unesite katedru" autocomplete=off>
         </div>

         <div class="form-group mt-4">
            <label >Email</label>
            <input type="text" name="email" class="form-control" placeholder="Unesite email" autocomplete=off>
         </div>

         <div class="form-group mt-4">
            <label >Šifra</label>
            <input type="password" name="sifra" class="form-control" placeholder="Unesite šifru" autocomplete=off>
         </div>
         <div class="form-group mt-4">
            <label >Kabinet</label>
            <input type="text" name="kabinet" class="form-control" placeholder="Unesite kabinet" autocomplete=off>
         </div>

  
  <button type="submit" class="btn btn-primary mt-5" name="submit">Unesi</button>
</form>
    </div>


    
  </body>
</html> 