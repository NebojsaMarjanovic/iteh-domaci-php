<?php
  require 'model/user.php';
  require "dbBroker.php";

  session_start();

  

  $rezultat = User::showUsers($conn);

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


    <title>Moderatori</title>
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

<div class="form-group">
    <div class="input-group">
     <input type="text" name="search_text" id="Moderatorsearch" placeholder="Pretraži moderatora po imenu i prezimenu" class="form-control" />
    </div>
  
   <br />
   <div id="result"></div>
  </div>

    <table class="table" id="moderatorTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ime i prezime</span></th>
      <th scope="col">Katedra</span></th>
      <th scope="col">Email</span></th>
      <th scope="col">Kabinet</span></th>
    </tr>
  </thead>
  <tbody>
  <?php 
      while($red=$rezultat->fetch_array()):
        $brojac++;
    ?>

    <tr>
      <td scope="row"><?php echo $brojac?></th>
      <td> <?php echo $red['name']; ?></td>
      <td> <?php echo $red['katedra']; ?></td>
      <td> <?php echo $red['email']; ?></td>
      <td> <?php echo $red['kabinet']; ?></td>

      
      
    
    </tr>
    <?php
                endwhile;

 
    
    
    
     
            } //zatvaranje else-a
            ?>
    
  </tbody>
</table>

<script>
  $("#Moderatorsearch").on("keyup", function(){
    var value=$(this).val();

    $("table tr").each(function(records){
        if(records !=0){
          var id=$(this).find('td:nth-child(2)').text();
          if(id.indexOf(value)!=0 && id.toLowerCase().indexOf(value.toLowerCase())<0){
            $(this).hide();
          }
          else{
            $(this).show();
          }
        }
    });
  });
</script>
  
</div>

       



</body>
</html>