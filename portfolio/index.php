<!doctype html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="/portfolio/images/favicon.png">
</head>

<body id="main-body">
    <?php
    include 'components/navbar.php';

    $url = 'http://localhost/portfolio/';
    ?>
    <!-- modal -->
    <div id="my-Modal">
        <div class="close-btn">
            <i class="fa-solid fa-xmark text-danger"></i>
        </div>
        <div class="card shadow p-3" style="width: 40vw; height: 57vh; border-radius: 0px; background-color: #111;">
            <div class="card-body">
                <form action="<?php $url; ?>contact-chat.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label text-light">Email address</label>
                        <input class="form-control text-light" id="email" style="border-radius: 0px; background-color: #273038;">
                        <p class="showErroremail text-danger mb-0"></p>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label text-light">Contact no.</label>
                        <input type="number" class="form-control text-light" id="number" style="border-radius: 0px; background-color: #273038;">
                        <p class="showErrorpass text-danger mb-0"></p>
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label text-light mt-1">Purpose for contacting</label>
                        <select class="form-control text-light" name="cars" id="cars" style="border-radius: 0px; cursor: pointer; background-color: #273038;">
                            <option value="">Please select an option</option>
                            <option value="hire">Hire</option>
                            <option value="advice">Advice</option>
                            <option value="feedback">Feedback</option>
                        </select>
                    </div>
                    <button type="submit" id="liveToastBtn" class="btn btn-outline-danger px-3 py-2 mt-3" style="border-radius: 0px;">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    <!-- main body section -->
    <main id="body">
        <div class="container p-5">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <img src="<?php $url; ?>images/left.png" alt="body-left" class="img-fluid body-left-image">
                </div>
                <div class="col-md-7 ps-5">
                    <h4 class="text-capitalize" style="color: #ff000a; font-weight: 500;">hello i'm Jit Nath</h4>
                    <h1 class="text-capitalize fw-bold text-light myDesignation">web developer</h1>
                    <p class="text-secondary" style="font-weight: 500; line-height: 25px;">Frontend & Backend Developer with 2+ years of experience, including 5+ months of specialized frontend focus. Proficient in HTML, CSS, JavaScript, jQuery, jQuery UI, Bootstrap, PHP, Laravel and MySQL. Passionate about crafting intuitive, visually striking user interfaces. Experienced in transforming designs into responsive, high-performance web applications. Committed to staying updated with the latest frontend & backend technologies.</p>
                    <a href="<?php $url; ?>pages/about-me.php" id="more-btn" type="button" class="btn btn-outline-danger px-5 py-2" style="border-radius: 0px;">Know more</a>
                </div>
            </div>
        </div>
    </main>
    <!-- main body section -->
    <!-- card section -->
    <section id="card-section">
        <div class="row">
            <div class="col-md-6 p-5" style="background-color: #212529;">
                <div class="d-flex cstm-side">
                    <div class="card me-5 p-3" style="border-radius: 0px;">
                        <img src="<?php $url; ?>images/frontend-logo.png" class="card-img-top" alt="frontend-logo">
                        <div class="card-body">
                            <h5 class="card-title">Frontend Development</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                    <div class="card me-5 p-3" style="border-radius: 0px;">
                        <img src="<?php $url; ?>images/backend-logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Backend Development</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?php $url; ?>pages/my-projects.php" class="text-light" style="text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                    <div class="card p-3" style="border-radius: 0px;">
                        <img src="<?php $url; ?>images/database.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Database Management</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 p-5" style="background-color: #212529;">
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="text-center mt-5">
                        <h1 class="myYears" style="color: #ff000a;">3+</h1>
                        <h3 class="text-light fs-1" style="letter-spacing: 3px;">Years Experience</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-5">
                <div class="d-flex">
                    <div class="card p-3 me-3" style="border-radius: 0px; width: 50%; background-color: #273038; color: #fff;">
                        <div class="card-body">
                            <h5 class="card-title">7+</h5>
                            <p class="card-text fs-5">Companies worked</p>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                    <div class="card p-3" style="border-radius: 0px; width: 50%; background-color: #273038; color: #fff;">
                        <div class="card-body">
                            <h5 class="card-title">6+</h5>
                            <p class="card-text fs-5">Month's relevant experience</p>
                            <a href="<?php $url; ?>pages/my-projects.php" style="text-decoration: none; letter-spacing: 3px; color: #ff000a;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <div class="card p-3 me-3" style="border-radius: 0px; background-color: #273038; color: #fff; width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title">8+</h5>
                            <p class="card-text fs-5">Real world project's experience</p>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                    <div class="card p-3" style="border-radius: 0px; background-color: #273038; color: #fff; width: 50%;">
                        <div class="card-body">
                            <h5 class="card-title">10+</h5>
                            <p class="card-text fs-5">Personal project's experience</p>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- card section -->
    <!-- featured projects -->
    <section id="featured-projects" class="p-5">
        <div class="d-flex justify-content-between align-items-between px-5">
            <div>
                <h1 class="text-light text-uppercase">Featured Projects</h1>
                <p class="text-secondary">Take a look of my recent projects</p>
            </div>
            <div>
                <button type="button" class="btn btn-outline-danger text-uppercase fw-bold" style="letter-spacing: 2px; border-radius: 0px;">View more</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-5">
                <div class="card">
                    <div class="p-5" style="background-color: #273038;">
                        <img src="<?php $url; ?>images/brilliant.JPG" class="card-img-top" alt="Brilliaant-career-solution">
                    </div>
                    <div class="card-body px-0">
                        <h5 class="card-title mb-3" style="color: #fff;">Brilliaant Career solution</h5>
                        <a href="https://brilliaantcs.com/" target="_blank" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">VISIT<i class="fa-solid fa-up-right-from-square ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-5">
                <div class="card">
                    <div class="p-5" style="background-color: #273038;">
                        <img src="<?php $url; ?>images/nova.JPG" class="card-img-top" alt="Nova">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: #fff;">Nova</h5>
                        <a href="https://jeet-web2026.github.io/Nova/" target="_blank" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">VISIT<i class="fa-solid fa-up-right-from-square ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-5 pt-0">
                <div class="card">
                    <div class="p-5" style="background-color: #273038;">
                        <img src="<?php $url; ?>images/universal.JPG" class="card-img-top" alt="Universal-council-for-vocational-education">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: #fff;">Universal Counsil for Vocational and Skills Education</h5>
                        <a href="https://univskilleducation.org/" target="_blank" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">VISIT<i class="fa-solid fa-up-right-from-square ms-2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-5 pt-0">
                <div class="card">
                    <div class="p-5" style="background-color: #273038;">
                        <img src="<?php $url; ?>images/globe.JPG" class="card-img-top" alt="Globe-allied-healthcare-skill-council">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: #fff;">Globe Allied Healthcare Skill Counsil</h5>
                        <a href="https://globechealth.ac.in/" target="_blank" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">VISIT<i class="fa-solid fa-up-right-from-square ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured projects -->

    <!-- home-conteact section -->
    <section id="home-contact">
        <div class="container">
            <div class="row align-items-center" style="background-color: #273038;">
                <div class="col-md-6 p-5">
                    <h1 class="text-light fs-1 fw-bold mb-3">Let's work together on<br>your next project</h1>
                    <p class="text-secondary">Contact me if you ready to hire me as your Digital assistant!</p>
                </div>
                <div class="col-md-6 p-5 text-end">
                    <button id="dialog-opener" class="btn btn-outline-danger text-uppercase fw-bold" style="letter-spacing: 2px; border-radius: 0px;">contact me</button>
                </div>
            </div>
        </div>
    </section>
    <!-- home-conteact section -->
    <?php
    include 'components/footer.php';
    ?>


    <script>

    </script>
</body>

</html>