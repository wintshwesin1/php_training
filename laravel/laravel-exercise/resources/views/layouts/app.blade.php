<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
 
        <style>
            * {
                margin :0px ;
                padding :0px;
                box-sizing : border-box;
            }

            .container {
                width :500px;
                margin: 50px auto;
            }

            .panel {
                width: 100%;
                border-radius :5px;
                border: 1px solid #33333390;
            }

            .panel-heading {
                background-color : #ECF0F1;
                padding : 10px 20px;
                font-size : 20px;
                border-bottom: 1px solid #33333390;
            }

            form {
                padding: 20px;
            }

            .form-control {
                width :100%;
                padding : 8px;
                margin: 10px 0px 20px 0px;
                border-radius :5px;
                border: 1px solid #00000090;
            }

            .btn {
                padding: 7px;
                border-radius :5px;
                border: 1px solid #00000090;
                cursor: pointer;
            }

            .control-label {
                font-size : 20px;
                color : #000;
                font-weight: bold;
            } 

            .panel-default {
                margin-top : 20px;
            }

            .table {
                padding : 20px;
            }

            .table-text {
                width: 70%;
            }

            th {
                text-align : left;
            }

            th, 
            td {
                border-bottom: 1px solid #ddd;
            }

            .btn-del {
                background-color : #CD6155 ;
                border: 1px solid #CD6155;
            }

            .alert-success {
                padding: 10px;
                color: #3c763d;
                background: #dff0d8;
                border: 1px solid #3c763d;
                margin-bottom: 20px;
            }

        </style>
    </head>
 
    <body>
        <div class="container">

            @yield('content')
            
        </div>
    </body>
</html>