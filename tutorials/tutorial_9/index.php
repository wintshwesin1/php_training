<?php

    require 'config.php';
    $sql ="SELECT count(id) as uid,DATE_FORMAT(created_at, '%Y-%m-%d') as date FROM user 
           GROUP BY DATE_FORMAT(created_at, '%Y-%m-%d')";
    $result = mysqli_query($db,$sql);
    $chart_data="";
    while ($row = mysqli_fetch_array($result)) { 
        $username[] = $row['uid'];
        $date[] = $row['date'];
 
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 9</title>

    <style>
        body {
            width: 600px;
            margin: 50px auto;
        }

        h2 {
            text-align:center;
        }

        #chart-container {
            width: 100%;
            height: auto;
        }

    </style>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>
</head>
<body>

    <div id="chart-container">
        <h2 class="page-header" >Analytics Reports </h2>
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            var chartdata = {
                labels: <?php echo json_encode($date); ?>,
                datasets: [
                    {
                        label: 'User Count',
                        backgroundColor: '#49e2ff',
                        borderColor: '#46d5f1',
                        hoverBackgroundColor: '#49e2ff90',
                        hoverBorderColor: '#666666',
                        data: <?php echo json_encode($username); ?>
                    }
                ]
            };

            var graphTarget = $("#graphCanvas");

            var barGraph = new Chart(graphTarget, {
                type: 'bar',
                data: chartdata
            });
        }
    </script>

    
</body>
</html>