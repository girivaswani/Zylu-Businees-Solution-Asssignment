<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Employee Information</title>
</head>

<?php
// session_start();
include 'dbconnect.php';
?>

<body>
    <div class="container">
        <h1>List of all employees</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Eid</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">No. of Years</th>
                <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql="SELECT * from employee";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){
                        if($row['no_of_years']>=5 && $row['is_active']==1){
                            
                            echo '<tr class="table-success">
                            <th scope="row">'.$row["eid"].'</th>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["email"].'</td>
                            <td>'.$row["no_of_years"].'</td>
                            <td>Yes</td>
                            </tr>';
                        }
                        else{
                            $active='No';
                            if ($row['is_active']==1){
                                $active='Yes';
                            }
                            echo '<tr>
                            <th scope="row">'.$row["eid"].'</th>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["email"].'</td>
                            <td>'.$row["no_of_years"].'</td>
                            <td>'.$active.'</td>
                            </tr>';
                        }
                    }

                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>