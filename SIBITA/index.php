


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/UIS.png">
    <title>Login Page</title>
    <link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <style>
    #layoutAuthentication_content {
        background-image: url('assets/img/Uvers2.png');
        background-size: contain; /* Menyesuaikan ukuran gambar */
        background-position: left; /* Menempatkan gambar di sebelah kiri */
        background-repeat: no-repeat;
        height: 100vh; /* Menetapkan tinggi agar latar belakang mengisi seluruh layar */
    }

        body {
            background: linear-gradient(90deg, #4b6cb7, #182848);
            color: #fff;
            
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
        }

        .card-header {
            text-align: center;
        }

        .card-header h4 {
            margin-bottom: 0;
        }

        .card-header img {
            width: 60%;
            height: auto;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            width: 100%; 
            height: 100%; 
            background: #FFFF; 
            border-radius: 8px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
        }

        .btn-primary {
            border: none;
            border-radius: 0;
            padding: 0.5rem 2rem;
            width: 100%; 
            height: 100%; 
            background: #1177D1; 
            border-radius: 8px; 
        }

        .btn-primary:hover {
            background: #182848;
        }

        .card-footer {
            text-align: center;
        }

        .small {
            color: #4b6cb7;
        }
        
    </style>
</head>

<body>

<div class="" style="margin-right: -120px;">
<div style="background-image: url('Uvers2.png');">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-end mr-6">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h4 class="text-center font-weight-light my-4">
                                    <img id="logo_uvers" src="assets/img/LogoUvers.png"/>
                                </h4>
                            </div>
                            <div class="card-body">
                            <?php
    // Check if there is an error parameter in the URL
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo "Maaf, Username atau Password Salah";
    }
    ?>
                                <form name="form" action="login.php" method="POST">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" type="text" name="id_user" placeholder="Masukkan Username" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Masukkan Password" />
                                    </div>
                                    <div class="form-group d-flex mt-4 mb-0">
                                        <input class="btn btn-primary btn-block" type="submit" name="submit" value="Login" />
                                    </div>
                                    
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><font color="darkblue">Copyright &copy; FKOM UVERS</font></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
</body>
</html>
