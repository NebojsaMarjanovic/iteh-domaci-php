
<?php
  require 'model/course.php';
  require "dbBroker.php";

  session_start();

  

  $rezultat = Course::show($conn);

  if(!$rezultat){
    echo "Nastala je greška prilikom izvođenja upitanja <br>";
    die();
}

if($rezultat->num_rows==0){
    echo "Nema dodatih kurseva!";
    die();
   

}
else{
  $brojac=0;




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="script/main.js"></script>


    <link rel="stylesheet" href="style.css">


    <title>Kursevi FON</title>
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

<div class="container">

<input type='hidden' id='sort' value='asc'>

    <table class="table" id="courseTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"><span onclick='sortTable("course");'>Naziv kursa</span></th>
      <th scope="col"><span onclick='sortTable("students");'>Broj studenata</span></th>
      <th scope="col"><span onclick='sortTable("katedra");'>Katedra</span></th>
      <th scope="col"><span onclick='sortTable("user_id");'>Moderator</span></th>
      <th scope="col" colspan="2" style=" text-align: center;">Aktivnost</th>

    </tr>
  </thead>
  <tbody>
  <?php 
      while($red=$rezultat->fetch_array()):
        $brojac++;
    ?>

    <tr>
      <th scope="row"><?php echo $brojac?></th>
      <td> <?php echo $red['courseName']; ?></td>
      <td> <?php echo $red['courseStudents']; ?></td>
      <td> <?php echo $red['courseKatedra']; ?></td>
      <td> <?php echo $red['userName']; ?></td>
      <td><a href="update.php?id=<?php echo $red['courseId']?>" id="update">IZMENI</a></td> 
      <td><a href="delete.php?id=<?php echo $red['courseId']?>" id="delete">OBRIŠI</a></td> 
      
    
    </tr>
    <?php
                endwhile;

 
    
    
    
     
            } //zatvaranje else-a
            ?>
    
  </tbody>
</table>
  
</div>

      </head>  



</body>
</html>