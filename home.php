<?php  

require "dbBroker.php";
require "model/course.php";

$kurs=new Course(1,"Menadzment",60,1);
$odgovor=Course::show($conn); 

 $connect = mysqli_connect("localhost", "root", "", "baza");  
 $sql = "SELECT * FROM course INNER JOIN user ON user.id= course.user_id";  
 $result = mysqli_query($connect, $sql);  
 ?> 

 <!DOCTYPE html>  
 <html>  
      <head>  
             <!-- bootstrap Lib -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

             <!-- datatable lib -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            
        <link rel="stylesheet" href="style.css">
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <h3>Fetch Data from Two or more Table Join using PHP and MySql</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Naziv kursa</th> 
                               <th>Broj studenata</th>  
                               <th>Kreator</th>  

                          </tr>  
                          <?php  

                             if($odgovor->num_rows>0){
                                while($row = mysqli_fetch_array($result))  
                                {  
                                ?>  
                                 <tr> 
                                    <td><?php echo $row["course"]; ?></td> 
                                    <td><?php echo $row["students"];?></td>  

                                    <td><?php echo $row["name"];?></td>  

                                 </tr>  
                          <?php  
                                }  
                            }
                            ?>
  
                     </table> 
                     
                     
                </div>  
           </div>  
           <br />  
      </body>  
 </html>  