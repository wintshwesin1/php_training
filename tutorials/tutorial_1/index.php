<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorail 1</title>
    <style>
        .container{
        text-align: center;
        width: 270px;
        margin: 100px auto;
        }

        h3{
        font-size: 40px;
        color: #000000;
        }

        table {
        width:270px;
        border:2px solid #000;
        border-collapse: collapse;
        }

        .td-white{
        height: 30px;
        width: 30px;
        background-color: #FFFFFF;
        }

        .td-black{
        height: 30px;
        width: 30px;
        background-color: #000000;
        }
    </style>
</head>
<body>
  <div class="container">
    <h3>Chess Board</h3>
    <table>
        <?php

          for($row=0 ; $row<8 ; $row++) {
            echo "<tr>";
            for($col=0 ; $col<8 ; $col++) {
                $total=$row+$col;
                if($total%2 == 0) {
                    echo "<td class='td-white'></td>";
                } else {
                    echo "<td class='td-black'></td>";
                }
            }
            echo "</tr>";
          }
        ?>
    </table>
  </div>
  
</body>
</html>