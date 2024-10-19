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
        * {
            font-family: "Figtree", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            background-color: #111;
            color: #fff;
        }

        .card-image {
            height: 40px;
            width: 45px;
            border-radius: 9px;
            padding: 5px;
        }
    </style>
</head>

<body>
    <main id="body">
        <div class="container" style="margin-top: 10%;">
            <div class="card" style="width: 100%; border: 2px solid #dc3545; border-radius: 5px; height: 100%;">
                <div class="row g-0 p-3">
                    <div class="col-md-3">
                        <img src="../images/profile.jpg" class="rounded-start" alt="profile-image" style="height: 290px; width: 100%;">
                    </div>
                    <div class="col-md-9 ps-3">
                        <div class="card-body">
                            <h4 class="card-title mb-4 fs-3" style="font-weight: 500;">Hi I'm Jit Nath</h4>
                            <p class="card-text mb-2">A Full stack PHP Developer</p>
                            <p class="card-text mb-2">I'm from Ramdashatti, Garden Reach, Kolkata: 700024</p>
                            <p class="card-text mb-4">Currently pursuring Bachelor of Computer Application (BCA) from IGNOU</p>
                            <a href="https://github.com/Jeet-web2026" target="_blank" style="text-decoration: none; font-size: 18px;">Github<i class="bi bi-box-arrow-in-up-right text-danger ms-2"></i></a>
                            <a href="https://www.linkedin.com/in/itz-jit-nath" target="_blank" class="ms-4" style="text-decoration: none; font-size: 18px;">Linkedin<i class="text-danger bi bi-box-arrow-in-up-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 mb-0">
                <h2 class="fs-2 ps-3 mb-0 text-capitalize">Skills</h2>
            </div>
            <div class="d-flex autoplay py-5">
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius: 15px;">
                        <i class="fa-brands fa-html5" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">Html</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <i class="fa-brands fa-css3-alt" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">Css</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <i class="fa-brands fa-square-js" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">Javascript</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <img src="../images/jquery.svg" class="bg-light card-image" alt="jquery-image">
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">JQuery</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <img src="../images/jquery-ui-logo.svg" class="bg-light card-image" alt="jquery-ui-image">
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">JQuery UI</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <i class="fa-brands fa-bootstrap" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">Bootstrap</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <img src="../images/PHP-logo.svg" class="bg-light card-image" alt="php-image">
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">PHP</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <i class="fa-brands fa-laravel" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">Laravel</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <img src="../images/logo-mysql.png" class="bg-light card-image" alt="mysql-image">
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">MySql</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <i class="fa-brands fa-react" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">React</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <img src="../images/mui.svg" class="bg-light card-image" alt="mui-image">
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">MUI</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <i class="fa-brands fa-git" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">Git</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <i class="fa-brands fa-github" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">Github</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius:  15px;">
                        <img src="../images/cloud-api.png" class="bg-light card-image" alt="api-image">
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">Api</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mt-5 mb-0">
                        <h2 class="fs-2 ps-3 mb-0 text-capitalize">education</h2>
                    </div>
                    <div class="card ms-3 mt-5" style="border: 2px solid #dc3545; border-radius: 8px;">
                        <h5 class="card-header">Graduation</h5>
                        <div class="card-body">
                            <h5 class="card-title text-light text-capitalize">bachelor of computer application (BCA)</h5>
                            <p class="card-text mb-2">Jun 2023 - Present</p>
                            <p class="card-text">Indira Gandhi National Open University (IGNOU)</p>
                        </div>
                    </div>
                    <div class="row  ps-3 mt-3">
                        <div class="col-md-6">
                            <div class="card" style="border: 2px solid #dc3545; border-radius: 8px;">
                                <h5 class="card-header text-capitalize">higher secondary</h5>
                                <div class="card-body">
                                    <h5 class="card-title text-light text-capitalize">commerce</h5>
                                    <p class="card-text mb-2">Jan 2020 - Jan 2021</p>
                                    <p class="card-text">Nangi High School</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="border: 2px solid #dc3545; border-radius: 8px;">
                                <h5 class="card-header text-capitalize">secondary</h5>
                                <div class="card-body">
                                    <h5 class="card-title text-light text-capitalize">all subjects</h5>
                                    <p class="card-text mb-2">Jan 2019 - Jan 2020</p>
                                    <p class="card-text">Nangi High School</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-5 mb-0">
                        <h2 class="fs-2 ps-3 mb-0 text-capitalize">experience</h2>
                    </div>
                    <div class="card ms-3 mt-5" style="border: 2px solid #dc3545; border-radius: 8px;">
                        <h5 class="card-header">Developer</h5>
                        <div class="card-body">
                            <h5 class="card-title text-light text-capitalize">Globe Allied Healthcare Skill Council</h5>
                            <p class="card-text mb-2">May 2024 - Present</p>
                            <p class="card-text">South Dumdum</p>
                        </div>
                    </div>
                    <div class="row  ps-3 mt-3">
                        <div class="col-md-6">
                            <div class="card" style="border: 2px solid #dc3545; border-radius: 8px;">
                                <h5 class="card-header text-capitalize">Administrative Executive</h5>
                                <div class="card-body">
                                    <h5 class="card-title text-light text-capitalize">M/s Solution Agency</h5>
                                    <p class="card-text mb-2">Mar 2023 - Apr 2024</p>
                                    <p class="card-text">Tollygunge, Kolkata</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="border: 2px solid #dc3545; border-radius: 8px;">
                                <h5 class="card-header text-capitalize">Backoffice Executive</h5>
                                <div class="card-body">
                                    <h5 class="card-title text-light text-capitalize">Solomon Advisory Pvt. Ltd.</h5>
                                    <p class="card-text mb-2">Aug 2022 - Mar 2023</p>
                                    <p class="card-text">New Alipore, Kolkata</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<?php
include '../components/footer.php';
?>