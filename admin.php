<?php 
include('./DB.php');
include('./User.php');
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="card-body p-5 text-center">

                                    <h3 class="mb-5">Sign in</h3>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="pass">Password</label>
                                        <input type="password" id="pass" name="pass"
                                            class="form-control form-control-lg" />
                                    </div>
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">
    </script>
</body>

</html>
<?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['logout'])){
                session_unset();
                session_destroy();
            } else {
                $email = $_POST['email'];
                $pass = md5($_POST['pass']);
                $user = DB::getUser($email, $pass);
                if($user === null){
                    echo "Wrong Password / Username";
                } else {
                    $_SESSION['user'] = $user;
                    header("Location:dashboard.php");
                }
            }
        }
    ?>