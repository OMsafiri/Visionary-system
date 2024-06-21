<?php 

    require_once("./database/connection.php");
    $connect = openConnection();

    $message = "";
    $username = "";
    $password = "";

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        print_r($_POST);

        echo $password;


        $query = "SELECT * FROM tbl_users WHERE username = '{$username}' AND password = '{$password}' ";

        $result = $connect->query($query);

        print_r($result);

        if($result->num_rows > 0){
          $message = "Record was found";
        } else {
          $message = "Sorry, we did not find any record matching your request";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visionary - System</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mx-auto">
              <?php echo $message; ?>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input class="form-control" type="text" name="username" placeholder="Enter username">
                                
                            </div>
                            <div class="col-12 mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Enter password">
                                
                            </div>
                            <div class="col-12">
                                <button class="btn btn-lg btn-primary" type="submit" name="submit">Log In</button>
                                
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
 
</html>