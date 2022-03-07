<?php
session_start();
include_once('connection.php');

$userName = $_SESSION["username"];
$sql1 = "SELECT ID,Student_Name, Class, Section,Mentor FROM student_details WHERE Mentor='$userName'";
$result = mysqli_query($con,$sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            margin-left: auto;
            margin-right: auto;
            margin-top: 150px;
        }
        table,th,td{
            border: 2px solid black;
            border-collapse: collapse;
            text-align: center;
            font-family: cursive;
        }
        th{
            padding: 20px;
        }
        td{
            padding: 20px;
        }
        input[type=submit]{
            margin-top: 30px;
            margin-left: 490px;
            font-family: cursive;
            font-size: 16px;
        }
        
    </style>
</head>

<body>
    <form action="login.php" method="post">
    <table>
        <tr>
            <th>Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Mentor</th>
            <th>Present/Absent</th>
        </tr>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
    ?>
    
        <tr>
            <td><?php echo $row["Student_Name"]?></td>
            <td><?php echo $row["Class"]?></td>
            <td><?php echo $row["Section"]?></td>
            <td><?php echo $row["Mentor"]?></td>
            <td><input type="checkbox" name="<?php echo $row["Student_Name"]; ?>" ></td>
        </tr>
    <?php }?>
    </table>
    <input type="submit" name="Save" value="Save & Submit" >
    </form>
</body>

</html>