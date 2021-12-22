<?php

class Course{
    public $id;
    public $course;
    public $students;
    public $user_id;
    public $katedra;

    public function __construct($id=null,$course=null, $students=null,$user_id=null,$katedra=null)
    {
        $this->id = $id;
        $this->course = $course;
        $this->students = $students;
        $this->user_id = $user_id;
        $this->katedra=$katedra;
    }

    public static function show(mysqli $conn){
        $sql="SELECT user.id as userId, user.name as userName, course.id as courseId, 
        course.course as courseName, course.students as courseStudents, course.user_id as courseUserId, course.katedra as courseKatedra
        from course inner join user on course.user_id=user.id";
    
        $result=mysqli_query($conn,$sql);
    
        return $result;
    }

    public static function showById($id, mysqli $conn){
        $sql="SELECT user.id as userId, user.name as userName, course.id as courseId, 
        course.course as courseName, course.students as courseStudents, course.user_id as courseUserId, course.katedra as courseKatedra
        from course inner join user on course.user_id=user.id where course.id=$id";
    
        $result=mysqli_query($conn,$sql);
    
        return $result;
    }

    

    public static function addCourse($course, $students, $user_id, $katedra,mysqli $conn){
        $sql="insert into course (course,students,katedra, user_id) 
        values ('$course', '$students','$katedra', '$user_id')"; 
    
        $result=mysqli_query($conn,$sql);
    
        if($result){
            echo "<script>alert('Uspesno ste dodali kurs!')</script>";  

        }else{
            die(mysqli_error($conn));
        }
    }

    public static function deleteById($id, mysqli $conn)
    {
        $sql="DELETE FROM course WHERE id=$id";

         $result=mysqli_query($conn,$sql);

        return $result;
    }


    public static function updateCourse($courseId,$course,$students, $user_id,$katedra, mysqli $conn){
        $sql="update course set course='$course', students=$students, 
        user_id=$user_id, katedra='$katedra' where id=$courseId";
        $result=mysqli_query($conn,$sql);

        if($result){
            echo "<script>alert('Uspesno ste izmenili kurs!')</script>";  

        }else{
            die(mysqli_error($conn));
        }
    }

}
   
?>
        
