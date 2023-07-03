<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //SOMETHING WAS POSTED
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        //read from database

        $query = "select * from users where username = '$username' limit 1";

        $result = mysqli_query($con, $query);


        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] == $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "Wrong username or password";
    } else {
        echo "Wrong username or password";
    }
}
?>

<?php

$dataPoints1 = array(
    array("x" => 23, "y" => 340),
    array("x" => 28, "y" => 390),
    array("x" => 39, "y" => 400),
    array("x" => 34, "y" => 430),
    array("x" => 24, "y" => 321),
    array("x" => 29, "y" => 250),
    array("x" => 29, "y" => 400),
    array("x" => 23, "y" => 290),
    array("x" => 27, "y" => 250),
    array("x" => 34, "y" => 380),
    array("x" => 36, "y" => 350),
    array("x" => 33, "y" => 405),
    array("x" => 32, "y" => 453),
    array("x" => 21, "y" => 292)
);

$dataPoints2 = array(
    array("x" => 19, "y" => 192),
    array("x" => 27, "y" => 250),
    array("x" => 35, "y" => 330),
    array("x" => 32, "y" => 190),
    array("x" => 29, "y" => 189),
    array("x" => 22, "y" => 160),
    array("x" => 27, "y" => 200),
    array("x" => 26, "y" => 192),
    array("x" => 24, "y" => 225),
    array("x" => 33, "y" => 330),
    array("x" => 34, "y" => 250),
    array("x" => 30, "y" => 120),
    array("x" => 37, "y" => 160),
    array("x" => 24, "y" => 196)
);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel='stylesheet' type='text/css'
        href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Visa Lodged"
                },
                axisX: {
                    title: "Lodged Date"
                },
                axisY: {
                    title: "No. of applicants"
                },
                legend: {
                    cursor: "pointer",
                    itemclick: toggleDataSeries
                },
                data: [
                    {
                        type: "scatter",
                        toolTipContent: "<span style=\"color:#4F81BC \"><b>{name}</b></span><br/><b> Load:</b> {x} TPS<br/><b> Response Time:</b></span> {y} ms",
                        name: "CPM",
                        markerType: "square",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints1); ?>
        },
                {
                    type: "scatter",
                    name: "CE",
                    markerType: "triangle",
                    showInLegend: true,
                    toolTipContent: "<span style=\"color:#C0504E \"><b>{name}</b></span><br/><b> Load:</b> {x} TPS<br/><b> Response Time:</b></span> {y} ms",
                    dataPoints: <?php echo json_encode($dataPoints2); ?>
        }
        ]
    });

        chart.render();

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            }
            else {
                e.dataSeries.visible = true;
            }
            chart.render();
        }
     
    }
    </script>
</head>

<body>


    <div id="box">
        <form method="post">
            <div style="padding:0px 120px; background-color:#2b2f7f; color:#FFFFFF">
                <div class="row g-3" style="padding:20px; align-items:center">
                    <div class="col-xs-12 col-lg-6">
                        <h1>Simple Visa Tracker</h1>
                        <h2>Keep track your visa journey....</h2>
                    </div>
                    <div class="col-xs-12 col-lg-6" style="">


                        <div style="display:flex; flex-direction:column; align-items:flex-end">
                            <div class="" style="margin-bottom:5px">

                                <input id="text" type="text" name="username" class="form-control" placeholder="Username"
                                    style="">
                            </div>
                            <div class="" style="margin-bottom:5px">

                                <input id="text" type="password" name="password" class="form-control"
                                    placeholder="Password">
                            </div>
                            <div style="margin-bottom:5px">

                                <button id="button" type="submit" value="Login" class="btn btn-primary">Login to
                                    Explore</button>

                            </div>
                            <div>
                                <p>Don't have an account? <a href="signup.php">Click to Signup</a></p>

                            </div>
                        </div>


                    </div>
                </div>



            </div>
        </form>
    </div>
    <div>
        <div id="chartContainer" style="height: 370px; width: 80%; margin:100px auto"></div>
    </div>

    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>