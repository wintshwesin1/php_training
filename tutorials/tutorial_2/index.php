<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 2</title>
    <style>
        .container{
          text-align: center;
          width: 270px;
          margin: 10px auto;
          color:#333;
        }

        h3{
          font-size: 40px;
        }

        span{
          font-size:25px;
          font-weight:bold;
        }
    </style>
</head>
<body>
    <div class="container">
    <h3>Star</h3>
        <?php

            $max = 10;
            for($col = 0 ; $col <= $max ; $col+=2) {
                for($star=0 ; $star <= $col ; $star++) {
                    echo "<span>* <span>";
                }
                echo "<br>";
            }

            $count = 9;
            for($col = $max ; $col >= 0 ; $col-=2) {
                for($starr = $count ; $starr > 0 ; $starr--) {
                    echo "<span>* <span>";
                }
                echo "<br>";
                $count-=2;
            }

        ?>
    </div>
  
</body>
</html>