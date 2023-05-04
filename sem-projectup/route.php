<?php

session_start();
unset($_SESSION['SESS_MEMBER_ID']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select route</title>
    <link href="stylesheet/route-style.css" rel="stylesheet" type="text/css" />
</head>
<style>
    body{
        
      background-image: url("");
        background-color: bisque;
    
    
    }
</style>
<body>
    <div class="routeForm">

        <form action="selectset.php" method="post">
            <span>
                <h2> Select Route</h2>
                <select name="route" class="inputFieldstyle">
                    <?php
                    include('db.php');
                    $result = mysqli_query($conn, "SELECT * FROM route");
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<option value="' . $row['id'] . '">';
                        echo $row['route'] . '  :' . $row['type'] . '  :' . date("h:i A", strtotime("2020-01-01 " . $row['time']));
                        echo '</option>';
                    }
                    ?>
                </select>
            </span><br>
            <span>
                <h2> Date </h2>
                <input name="date" type="date" id="sd" value="" />
            </span><br>
            <span>
                <h2>No. of Passenger </h2>
                <select name="qty" class="inputFieldstyle">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                </select>
            </span><br><br>
            <input class="routebutton" type="submit" id="submit" value="Next">
        </form>
        <div>
        </div>
</body>

</html>