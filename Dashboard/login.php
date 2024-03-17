<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <section>
        <div class="fixed-top px-5">
            <div class="d-flex flex-row text-center">
                <img class="border-warning" src="../Dashboard/Assets/Logo.jpg" style="width: 50px; z-index: 1;" alt="">
                <p class="fs-4 fw-bolder mt-4 mx-3">TechVilleTechnologies</p>
            </div>
    </section>
    <section class="d-flex justify-content-center align-content-center" style="margin-top: 25vh;">
    <form action=""method="POST">
        <div>
            <h1 class="text-warning">Login</h1>
            <p>Welcome back!</p>
            <div class="border rounded p-2 mb-3">
                <i class="fa-solid fa-envelope"></i>
                <input class="wfocus border border-0" id="eml" type="Text" placeholder="Enter your Username" name="username" style="width: 300px;">
            </div>
            <div class="border rounded p-2" style="border-radius: 20px;">
                <i class="fa-solid fa-lock"></i>
                <input class="wfocus border border-0" id="pass" placeholder="Enter your password" name="password" type="password"
                    style="width: 300px;">
            </div>
            <div class="d-flex justify-content-between mt-3">

                <p class="text-warning">
                    <a class="text-warning" href="">Forgot password?</a>
                </p>
            </div>
            <button class="bg-dark text-light p-2 border rounded" style="width: 300px;" onclick="checkForm()" type="submit">Login</button>
        </div>
    </form>
    </section>
</body>
<!-- javaScript code -->
<script>
    var eml = document.getElementById('eml');
    var pass = document.getElementById('pass');

    // Check if formed is filled out if not alert user if yes let the php code handle the rest
    function checkForm() {
        if (eml.value == "" || pass.value == "") {
            alert('Please fill out the form');
            return false;
        }
    }


</script>
<!-- PHP Code  -->
<?php
    include '../Controllers/Controllers.php';
    $con = new Controllers();
    if(isset($_POST['username']) && isset($_POST['password'])){
        
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if(!empty($user) && !empty($pass)){
            $result = $con->Login($user, $pass);
            if($result){
                // Save session and redirect to dashboard
                session_start();
                $_SESSION['authenticated'] = true;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                setcookie('authenticated', true, time() + 3600);
                header('Location: ../Dashboard/dashboard.php');
                exit;
            }
            else{
                echo "<script>alert('Invalid Username or Password')</script>";
            }
        }
    }
?>



</html>