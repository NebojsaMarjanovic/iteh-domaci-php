<?php
include 'dbBroker.php';
include 'model/course.php';


session_start();

if(isset($_POST['dodajKurs'])){
    $naziv=$_POST['kurs'];
    $brojStudenata=$_POST['broj'];
    $katedra=$_POST['katedra'];
    $user_id=$_SESSION['user_id'];

    

    
    $kurs = new Course(1,$naziv, $brojStudenata,$katedra, $user_id);
   
    $kurs::addCourse($naziv, $brojStudenata,$user_id,$katedra ,$conn);
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
    <title>Prijava kurseva</title>
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

    <div class="container my-5">

    <form method="post">
        <div class="form-group mt-5">
            <label >Naziv kursa</label>
            <input type="text" name="kurs" class="form-control" placeholder="Unesite naziv kursa" autocomplete=off>
         </div>

         <div class="form-group mt-5">
            <label >Broj studenata</label>
            <input type="text" name="broj" class="form-control" placeholder="Unesite broj studenata" autocomplete=off>
         </div>
         <div class="form-group mt-5">
            <label >Katedra</label>
            <input type="text" name="katedra" class="form-control" placeholder="Unesite katedru" autocomplete=off>
         </div>
         

  
  <button type="submit" class="btn btn-primary mt-5" name="dodajKurs">Unesi</button>
</form>
    </div>


    
  </body>
</html> 