<?php
	if(isset($_POST['submit'])){
        $image=$_FILES['myfile'];
        $fname=$_POST['foldername'];
        $target_path_pdf = "profile/$fname/";

        if(!is_dir($target_path_pdf)){
            mkdir($target_path_pdf);
        }
        move_uploaded_file($image['tmp_name'],$target_path_pdf.$image['name']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 6</title>

    <style>
        *{
            box-sizing: border-box;
        }

        .container {
            width:400px;
            margin:180px auto;
            padding:20px;
            border:2px solid #33333390;
            border-radius:5px;
        }

        label {
            margin-right:20px;
        }

        .foldername {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
        }

        .btn {
            width: 80px;
            padding: 8px;
            background-color: #1CB6E0;
            border: 1px solid #1CB6E0;
            border-radius:5px;
            color: #fff;
        }

        .choose::-webkit-file-upload-button {
            color: white;
            display: inline-block;
            background: #1CB6E0;
            border: none;
            padding: 7px 15px;
            font-weight: 700;
            border-radius: 3px;
            white-space: nowrap;
            cursor: pointer;
            font-size: 10pt;
            margin:5px 10px 5px 10px;
        }

        .chooseimage,
        .foldername{
            border: 1px solid #00000090;
            margin-top:10px;
            border-radius:5px;
        }

    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="myfile">UploadImage : </label><br/>
            <div class="chooseimage">
                <input type="file" name="myfile" class="choose">
            </div><br/>

            <label for="foldername">FolderName : </label><br/>
            <input type="text" name="foldername" class="foldername"><br/>
            <input type="submit" value="upload" name='submit' class="btn">
        </form>
    </div>
    
</body>
</html>