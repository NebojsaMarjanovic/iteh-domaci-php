<?php
include 'dbBroker.php';
include 'model/course.php';

$id=$_GET['id'];
$result=Course::deleteById($id,$conn);

if($result){
    ?>
    <script>
        alert("Deleted");
    </script>
    <?php
}
else{
    ?>
    <script>
        alert("Not deleted"); 
    </script>
    <?php
}

header('location:prikaz.php');

?>