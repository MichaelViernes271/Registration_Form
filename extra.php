<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
</head>
<body>
<div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>            
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div> 
    <div class="container">
        <div class="box form-box">
            <?php
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];

                $id = $_SESSION['id'];
                
                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email ='$email', Age='$age'
                WHERE Id='$id' ") or die ("error occured");

                if($edit_query){
                    echo "<div class = 'message'>
                    <p>Profile Updated!</p>
                    </div> <br>";                                                                                                                                                                                                                                                     
                    echo "<a href = 'home.php'><button class='btn'> Go Home</button>";
                }
               }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT*FROM users WHERE Id=$id");

                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result["Username"];
                    $res_Email = $result["Email"];
                    $res_Age = $result["Age"];
                }
                                                                                                                            
            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo $res_Uname; ?>" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $res_Email; ?>" id="email" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" value="<?php echo $res_Age; ?>"  id="age" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
            </form>
        </div>  
        <?php } ?>                                                 
    </div>
</body>
</html>

















