<?php
session_start();
include '../components/navbar.php';
$url = 'http://localhost/portfolio';
require ('../pages/admin-settings/contact-settings.php');

$viewData = viewsocialdata();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #contact-me {
            height: 100vh;
            width: 100%;
            background-color: #111;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 100px;
        }
    </style>
</head>

<body>
    <main id="contact-me">
        <div class="container px-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="p-5" style="background-color: #000;">
                        <form action="../pages/admin-settings/contact-insert-settings.php" method="POST">
                            <p class="text-danger fs-5 warning-sen mb-0"></p>
                            <div class="mb-3">
                                <label for="name" class="form-label text-light fs-4">Name</label>
                                <input class="form-control fs-5 text-light" id="contact-person-name" name="contact-person-name" style="border-radius: 0px; background-color: #273038;">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label text-light fs-4">Email address</label>
                                <input type="email" class="form-control fs-5 text-light" id="contact-person-email" name="contact-person-email" style="border-radius: 0px; background-color: #273038;">
                            </div>
                            <div class="mb-3">
                                <label for="mob" class="form-label text-light fs-4">Mobile Number</label>
                                <input type="number" class="form-control fs-5 text-light" id="contact-person-number" name="contact-person-number" style="border-radius: 0px; background-color: #273038;">
                            </div>
                            <div class="mb-4">
                                <label for="purpose" class="form-label text-light fs-4">Contact me for</label>
                                <select class="form-control text-light fs-5" id="purpose" name="purpose" style="border-radius: 0px; cursor: pointer; background-color: #273038;">
                                    <option value="">Please select an option</option>
                                    <option value="hire">Hire</option>
                                    <option value="advice">Advice</option>
                                    <option value="feedback">Feedback</option>
                                </select>
                            </div>
                            <button type="submit" id="submit-contect-form" class="btn btn-outline-danger fs-5 mt-1" style="border-radius: 0px;">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 border-danger border p-5">
                    <h5 class="text-light mb-4">Get in Touch</h5>
                    <h1 class="text-light mb-4 fs-1">I'm always ready to help you and answer your questions</h1>
                    <div class="">
                        <div class="row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card bg-transparent border-danger" style="border-radius: 0px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-light">Call me:</h5>
                                        <a href="tel:9163715179" target="_blank" class="text-light" style="border-radius: 0px; text-decoration: none;">+91 9163715179</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card bg-transparent border-danger" style="border-radius: 0px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-light">Mail me:</h5>
                                        <a href="mailto:jeetnath2110@gmail.com" target="_blank" class="text-light" style="border-radius: 0px; text-decoration: none;">Jeetnath2110@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <div class="card bg-transparent border-danger" style="border-radius: 0px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-light">Whatsapp me:</h5>
                                        <a href="https://wa.me/9163715179" target="_blank" class="text-light" style="border-radius: 0px; text-decoration: none;">+91 9163715179</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card bg-transparent border-danger" style="border-radius: 0px;">
                                    <div class="card-body">
                                        <h5 class="card-title text-light">Skype:</h5>
                                        <a href="https://join.skype.com/invite/wKy9YRShZCqh" target="_blank" class="text-light" style="border-radius: 0px; text-decoration: none;">@jeet</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-5 social-icons">
                        <?php
                        
                        $data = mysqli_fetch_all($viewData, MYSQLI_ASSOC);
                        foreach($data as $showData){
                            echo'<a href="' . htmlspecialchars($showData['links_path']) . '" class="me-5" target="_blank"><i class="fa-brands fa-' . htmlspecialchars($showData['link_name']) . ' fs-5"></i></a>';
                        }                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include '../components/footer.php';
    ?>
</body>

</html>