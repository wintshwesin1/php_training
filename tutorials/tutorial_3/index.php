<?php 
    if(isset($_POST['submit'])) {
        $birthDate = $_POST['date-of-birth'];
        $currentDate = date("d-m-Y");
        $age = date_diff(date_create($birthDate), date_create($currentDate))->format("%y");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 3</title>
    
    <script src="./js/jquery-1.9.1.js"></script>
    <script src="./js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap-datepicker3.css"/>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery-ui.js"></script>
    <link rel="stylesheet" href="./css/jquery-ui.css">
    
    <style>
        .container {
            text-align : center;
            width : 250px;
            margin : 10px auto;
            color :#333;
        }

        h3 {
            font-size : 40px;
        }

        .form-input {
            width : 100%;
            margin-top : 10px;
            margin-bottom : 20px;
            padding : 5px 15px;
            border: 1px solid #00000090;
            border-radius:5px;
        }

        .calculatebtn {
            margin-bottom : 20px;
            width: 80px;
            padding: 8px;
            background-color: #1CB6E0;
            border: 1px solid #1CB6E0;
            border-radius:5px;
            color: #fff;
        }

        .showresult {
            font-size : 20px;
            color : #333;
            font-weight : bold ;
        }

    </style>
</head>
<body>
    <div class="container">
      <h3>Calculate Age</h3>
      
        <form action="." method="POST">
            <label for="date-of-birth">Date Of Birth:</label>
            <input class="date form-input" type="text" name="date-of-birth" autocomplete="off" required>
            <input type="submit" name="submit" value="Calculate" class="calculatebtn">
        </form>
        <div class="showresult"><?php if(!empty($age)){ echo "Age is : " .$age."years"; } ?></div>
        
    </div>

    
    <script>
        $(document).ready(function() {
            $('.date').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: '1850:2050',
            });

            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        });
    </script>
  
</body>
</html>