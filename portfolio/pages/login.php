<?php
include '../components/navbar.php';

$url = 'http://localhost/portfolio';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .invalid-notification {
            position: absolute;
            bottom: 5%;
            background-color: #212529;
        }
    </style>
</head>

<body>
    <section class="container-fluid d-flex justify-content-center align-items-center" style="background-color: #111; width: 100%; height: 100vh;">
        <div class="p-5 shadow" style="width: 40%; height: auto; background-color: #212529;">
            <form action="/portfolio/pages/verification/verification.php" method="POST">
                <div class="mb-3">
                    <label for="loginemail" class="form-label fs-5 text-light">Email address</label>
                    <input class="form-control text-light" name="loginemail" id="loginemail" style="border-radius: 0px; background-color: #212529;">
                    <p class="showErroremail text-danger mb-0"></p>
                    <p class="showErrorformatemail text-danger mb-0"></p>
                </div>
                <div class="mb-3">
                    <label for="loginpassword" class="form-label fs-5 text-light">Password</label>
                    <input type="password" class="form-control text-light" name="loginpassword" id="loginpassword" style="border-radius: 0px; background-color: #212529;">
                    <p class="showErrorpass text-danger mb-0"></p>
                </div>
                <div class="mb-3">
                    <label for="mnum" class="form-label fs-5 text-light">Mobile Number</label>
                    <input type="number" class="form-control text-light" name="mnum" id="mnum" style="border-radius: 0px; background-color: #212529;">
                    <p class="showErrormob text-danger mb-0"></p>
                </div>
                <div class="mb-3">
                    <label for="randmnum" class="form-label fs-5 text-light">Verification captcha : <span class="random-captcha text-light"></span></label>
                    <input class="form-control text-light" name="randmnum" id="randmnum" style="border-radius: 0px; background-color: #212529;">
                    <p class="showblankcaptha text-danger mb-0"></p>
                    <p class="showErrorcaptha text-danger mb-0"></p>
                </div>
                <button id="Submit-form" type="submit" class="btn btn-outline-danger" style="border-radius: 0px;">Submit</button>
            </form>
        </div>

    </section>

    <?php
    include '../components/footer.php';

    $url = 'http://localhost/portfolio';
    ?>


    <script>
        $(document).ready(function() {

            
        });
    </script>
</body>

</html>