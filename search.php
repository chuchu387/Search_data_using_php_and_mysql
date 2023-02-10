<?php
include 'rconnect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Search</title>
</head>
<style>
.search {
    margin: 10px;
    display: flex;
    justify-content: end;
}

.noob {
    margin: 2px;
    padding: 8px;
}

.oops {
    padding: 8px;
    margin: 2px;
}
</style>

<body>
    <div class="search">
        <form action="" method="post">
            <input type="search" class="oops" name="search2" placeholder="Search student">
            <input type="submit" name="search" class="noob" value="search">
        </form>
    </div>
    <table class="table my-5">
        <?php
            if(isset($_POST['search'])){
                $search=$_POST['search2'];

                $sql = "SELECT * FROM `student_registration` WHERE redgno='$search' or firstname='$search' or gender='$search' or selectcourse='$search' or parentsname='$search' or country='$search' or nationality='$search' or city='$search' or email='$search' or mobileno='$search' or gpa12='$search' ";
                $record= mysqli_query($con, $sql);
                if($record){
                    if(mysqli_num_rows($record)>0){
                        echo '<thead>
                        <tr>
                            <th scope="col">redgno</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Faculty</th>
                            <th scope="col">Parents Name</th>
                            <th scope="col">Country</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">City</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile Number</th>
                            <th scope="col">Result</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>';
                    while($row=mysqli_fetch_assoc($record)){
                        echo '<tbody>
                        <tr>
                        <th scope="row">'.$row['redgno'].'</th>
                        <td>'.$row['firstname'].'</td>
                        <td>'.$row['gender'].'</td>
                        <td>'.$row['selectcourse'].'</td>
                        <td>'.$row['parentsname'].'</td>
                        <td>'.$row['country'].'</td>
                        <td>'.$row['nationality'].'</td>
                        <td>'.$row['city'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['mobileno'].'</td>
                        <td>'.$row['gpa12'].'</td>
                        </tr>
                        </tbody>';
                    }
                    }
                }else{
                    echo "<h2> Student not found</h2>";
                }
            }
            ?>
    </table>
</body>

</html>