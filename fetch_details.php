<?php

include "dbBroker.php";

$columnName = $_POST['columnName'];
$sort = $_POST['sort'];
$brojac=0;

$sql = "SELECT user.id as userId, user.name as userName, course.id as courseId, 
course.course as courseName, course.students as courseStudents, course.user_id as courseUserId, course.katedra as courseKatedra
from course inner join user on course.user_id=user.id ORDER BY course.".$columnName." ".$sort." ";

$result=mysqli_query($conn,$sql);

$html = '';
while($red=$result->fetch_array()){
    $brojac++;
    $courseName = $red['courseName'];
  $courseStudents = $red['courseStudents'];;
  $katedra = $red['courseKatedra'];
  $userName = $red['userName'];
  $delete="delete.php?id= ".$red['courseId']."";
  $update="update.php?id= ".$red['courseId']."";
  

  $html .= "<tr>
    <td>".$brojac."</td>
    <td>".$courseName."</td>
    <td>".$courseStudents."</td>
    <td>".$katedra."</td>
    <td>".$userName."</td>
    <td><a href='".$update."' id='update'>IZMENI</a></td> 
    <td><a href='".$delete."' id='delete'>OBRIŠI</a></td> 
  </tr>";
}

echo $html;

?>