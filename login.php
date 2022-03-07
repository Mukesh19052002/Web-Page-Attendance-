<style>
    p{
        margin-top: 200px;
        margin-left: 500px;
        font-family: cursive;
        font-size: 25px;
    }
    input[type=submit]{
        margin-left: 500px;
        font-family: cursive;
        font-size: 20px;
    }
</style>
<?php
session_start();
include_once('connection.php');
$current_date_num  = date("Y-m-d");
$userName = $_SESSION["username"];
$sql1 = "SELECT ID,Student_Name, Class, Section,Mentor FROM student_details WHERE Mentor='$userName'";
$result = mysqli_query($con,$sql1);
?>
<?php  
$count=0;

    while($row = mysqli_fetch_assoc($result)) {    
        if(isset($_POST[$row["Student_Name"]])){
            $count+=1;
            $studname = $row["Student_Name"];
            $studclass = $row["Class"];
            $studsection = $row["Section"];
            $studmentor = $row["Mentor"];
            $sql2 = "INSERT INTO `history` ( `Student_Name`, `Class`, `Section`, `Mentor`,`Attendance`,`Date`) VALUES ( '$studname', '$studclass', '$studsection', '$studmentor','Yes','$current_date_num')";
            $rs = mysqli_query($con,$sql2);
        }else{
            $studname = $row["Student_Name"];
            $studclass = $row["Class"];
            $studsection = $row["Section"];
            $studmentor = $row["Mentor"];
            $sql3 = "INSERT INTO `history` ( `Student_Name`, `Class`, `Section`, `Mentor`,`Attendance`,`Date`) VALUES ('$studname', '$studclass', '$studsection', '$studmentor','No','$current_date_num')";
            $rs1 = mysqli_query($con,$sql3);
        }
}
$cls = mysqli_num_rows($result);
?>
<p>
    No of Present : <?php echo $count ?>&emsp;&emsp;&emsp;
    No of Absent : <?php echo $cls-$count ?><br>
    <form action="attendance.html" method="post">
        <input type="submit" value="Logout">
    </form>
</p>