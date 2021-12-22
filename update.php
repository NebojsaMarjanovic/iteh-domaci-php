<?php
include 'dbBroker.php';
include 'model/course.php';


session_start();



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
  <li><a href="dodajModeratora.php">Dodaj moderatora</a></li>
  <li><a href="#">Moderatori</a></li>
  <li><a href="index.php">Log out</a></li>
</ul>

    <div class="container my-5">

    <form method="post">

    <?php  
        $id=$_GET['id'];
        $rezultat=Course::showById($id,$conn);
        if(!$rezultat){
            echo "Nastala je greška prilikom izvođenja upitanja <br>";
            die();
        }
        
        if($rezultat->num_rows==0){
            echo "Nema dodatih kurseva!";
            die();
           
        
        }else{ 
            while($red=$rezultat->fetch_array()):
        
    ?>

        <div class="form-group mt-5">
            <label >Naziv kursa</label>
            <input type="text" name="kurs" class="form-control" placeholder="Unesite naziv kursa" autocomplete=off 
            value="<?php echo $red['courseName']; ?>">
         </div>

         <div class="form-group mt-5">
            <label >Broj studenata</label>
            <input type="text" name="broj" class="form-control" placeholder="Unesite broj studenata" autocomplete=off
            value="<?php echo $red['courseStudents']; ?>">
         </div>
         <div class="form-group mt-5">
            <label >Katedra</label>
            <input type="text" name="katedra" class="form-control" placeholder="Unesite katedru" autocomplete=off
            value="<?php echo $red['courseKatedra']; ?>">
         </div>
         <?php
                endwhile;

                if(isset($_POST['izmeniKurs'])){
                    $naziv=$_POST['kurs'];
                    $brojStudenata=$_POST['broj'];
                    $katedra=$_POST['katedra'];
                    $user_id=$_SESSION['user_id'];
                
                    
                
                    
                    $kurs = new Course(1,$naziv, $brojStudenata,$katedra, $user_id);
                   
                    $kurs::updateCourse($id,$naziv, $brojStudenata,$user_id,$katedra ,$conn);
                }
                
    
    
    
     
            } //zatvaranje else-a
            ?>
         

  
  <button type="submit" class="btn btn-primary mt-5" name="izmeniKurs">Unesi</button>
</form>
    </div>


    
  </body>
</html> 