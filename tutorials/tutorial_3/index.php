<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 3</title>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <style>
        .container{
            text-align: center;
            width: 250px;
            margin: 10px auto;
            color:#333;
        }

        h3{
            font-size: 40px;
        }

        .form-input{
            width:100%;
            margin-bottom:20px;
            padding:5px 15px;
        }

    </style>
</head>
<body>
    <div class="container">
      <h3>Calculate Age</h3>
      
        <label for="date-of-birth">Date Of Birth:</label>
        <input class="date form-input" type="text" name="date-of-birth" autocomplete="off">
        <label for="age">Age:</label>
        <input type="text" id="age" class="form-input">
        
    </div>

    
    <script>
      $(document).ready(function() {
        var age = "";
        $('.date').datepicker({
            onSelect: function (value, ui) {
                    var today = new Date();
                        age = today.getFullYear() - ui.selectedYear;
                    $('#age').val(age); 
            },
            changeMonth: true,
            changeYear: true,
            yearRange: '1850:2050',
        });
      });
    </script>
  
</body>
</html>