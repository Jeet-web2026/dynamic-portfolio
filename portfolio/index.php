<!doctype html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="/portfolio/images/favicon.png">
</head>

<body id="main-body">
    <?php
    include 'components/navbar.php';
    include './pages/admin-settings/home-settings.php';

    $viewData = displayData();
    $viewdgroupdescriptionData = displaygroupdescriptionData();
    $viewdgroupdescriptionDataTwo = displaygroupdescriptionDataTwo();
    $viewdgroupdescriptionDataThree = displaygroupdescriptionDataThree();
    $viewdgroupdescriptionDataFour = displaygroupdescriptionDataFour();
    $viewdgroupdescriptionDataFive = displaygroupdescriptionDataFive();
    $viewdgroupdescriptionDataSix = displaygroupdescriptionDataSix();
    $viewdgroupdescriptionDataSeven = displaygroupdescriptionDataSeven();
    $viewdgroupdescriptionDataEight = displaygroupdescriptionDataEight();
    $viewprojectOne = projectOne();
    $viewprojectTwo = projectTwo();
    $viewprojectThree = projectThree();
    $viewprojectFour = projectFour();

    $url = 'http://localhost/portfolio/';
    ?>
    <!-- main body section -->
    <main id="body">
        <div class="container-fluid p-5">
            <div class="row align-items-center px-5">
                <div class="col-md-5 text-center" style="position: relative;">
                    <img src="<?php $url; ?>images/left.png" alt="body-left" class="img-fluid body-left-image">
                </div>
                <div class="col-md-7 ps-5">
                    <h4 class="text-capitalize" style="color: #ff000a; font-weight: 500;">hello i'm Jit Nath</h4>
                    <?php
                    $data = mysqli_fetch_all($viewData, MYSQLI_ASSOC);
                    foreach ($data as $showData) {
                    ?>
                        <h2 class="text-capitalize fw-bold text-light myDesignation"><?php echo htmlspecialchars($showData['image']) ?></h2>
                        <p class="text-secondary" style="font-weight: 500; line-height: 25px;"><?php echo htmlspecialchars($showData['description']) ?></p>
                    <?php
                    }

                    ?>
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
                            <?php

                            $groupdata = mysqli_fetch_all($viewdgroupdescriptionData, MYSQLI_ASSOC);
                            $chunkedData = array_chunk($groupdata, 1);
                            foreach ($chunkedData as $viewGroupData) {
                                foreach ($viewGroupData as $data) {
                            ?>
                                    <h5 class="card-title text-capitalize"><?php echo htmlspecialchars($data['image']) ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($data['description']) ?></p>
                            <?php
                                }
                            }
                            ?>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                    <div class="card me-5 p-3" style="border-radius: 0px;">
                        <img src="<?php $url; ?>images/backend-logo.png" class="card-img-top" alt="...">
                        <div class="card-body">

                            <?php

                            $groupDatatwo = mysqli_fetch_all($viewdgroupdescriptionDataTwo, MYSQLI_ASSOC);
                            foreach ($groupDatatwo as $viewgroupDatatwo) {
                            ?>
                                <h5 class="card-title text-capitalize"><?php echo htmlspecialchars($viewgroupDatatwo['image']) ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($viewgroupDatatwo['description']) ?></p>
                            <?php
                            }
                            ?>
                            <a href="<?php $url; ?>pages/my-projects.php" class="text-light" style="text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                    <div class="card p-3" style="border-radius: 0px;">
                        <img src="<?php $url; ?>images/database.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <?php

                            $groupDatathree = mysqli_fetch_all($viewdgroupdescriptionDataThree, MYSQLI_ASSOC);
                            foreach ($groupDatathree as $viewgroupDatathree) {
                            ?>
                                <h5 class="card-title text-capitalize"><?php echo htmlspecialchars($viewgroupDatathree['image']) ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($viewgroupDatathree['description']) ?></p>
                            <?php
                            }
                            ?>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row second-cards">
            <div class="col-md-6 p-5" style="background-color: #212529;">
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <div class="text-center mt-5">
                        <?php

                        $expData = mysqli_fetch_all($viewdgroupdescriptionDataFour, MYSQLI_ASSOC);
                        foreach ($expData as $data) {
                        ?>
                            <h1 class="myYears" style="color: #ff000a;"><?php echo htmlspecialchars($data['image']) ?></h1>
                            <h3 class="text-light fs-1" style="letter-spacing: 3px;"><?php echo htmlspecialchars($data['description']) ?></h3>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="col-md-6 p-5">
                <div class="d-flex">
                    <div class="card p-3 me-3" style="border-radius: 0px; width: 50%; background-color: #273038; color: #fff;">
                        <div class="card-body">
                            <?php
                            $companyWork = mysqli_fetch_all($viewdgroupdescriptionDataFive, MYSQLI_ASSOC);
                            foreach ($companyWork as $companyWorkData) {
                            ?>
                                <h5 class="card-title"><?php echo htmlspecialchars($companyWorkData['image']) ?></h5>
                                <p class="card-text fs-5"><?php echo htmlspecialchars($companyWorkData['description']) ?></p>
                            <?php
                            }
                            ?>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                    <div class="card p-3" style="border-radius: 0px; width: 50%; background-color: #273038; color: #fff;">
                        <div class="card-body">
                            <?php
                            $exp = mysqli_fetch_all($viewdgroupdescriptionDataSix, MYSQLI_ASSOC);
                            foreach ($exp as $expData) {
                            ?>
                                <h5 class="card-title"><?php echo htmlspecialchars($expData['image']) ?></h5>
                                <p class="card-text fs-5"><?php echo htmlspecialchars($expData['description']) ?></p>
                            <?php
                            }
                            ?>
                            <a href="<?php $url; ?>pages/my-projects.php" style="text-decoration: none; letter-spacing: 3px; color: #ff000a;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <div class="card p-3 me-3" style="border-radius: 0px; background-color: #273038; color: #fff; width: 50%;">
                        <div class="card-body">
                            <?php
                            $project = mysqli_fetch_all($viewdgroupdescriptionDataSeven, MYSQLI_ASSOC);
                            foreach ($project as $projectData) {
                            ?>
                                <h5 class="card-title"><?php echo htmlspecialchars($projectData['image']) ?></h5>
                                <p class="card-text fs-5"><?php echo htmlspecialchars($projectData['description']) ?></p>
                            <?php
                            }
                            ?>
                            <a href="<?php $url; ?>pages/my-projects.php" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">KNOW MORE<i class="fa-solid fa-arrow-right-long ms-2"></i></a>
                        </div>
                    </div>
                    <div class="card p-3" style="border-radius: 0px; background-color: #273038; color: #fff; width: 50%;">
                        <div class="card-body">
                            <?php
                            $personalProject = mysqli_fetch_all($viewdgroupdescriptionDataEight, MYSQLI_ASSOC);
                            foreach ($personalProject as $personalProjectData) {
                            ?>
                                <h5 class="card-title"><?php echo htmlspecialchars($personalProjectData['image']) ?></h5>
                                <p class="card-text fs-5"><?php echo htmlspecialchars($personalProjectData['description']) ?></p>
                            <?php
                            }
                            ?>
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
                <a href="./pages/my-projects.php" type="button" class="btn btn-outline-danger text-uppercase fw-bold" style="letter-spacing: 2px; border-radius: 0px;">View more</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-5">
                <div class="card">
                    <?php
                    $projectData = mysqli_fetch_all($viewprojectOne, MYSQLI_ASSOC);
                    foreach ($projectData as $viewData) {
                    ?>
                        <div class="p-5" style="background-color: #273038;">
                            <img src="<?php $url; ?>images/brilliant.JPG" class="card-img-top" alt="Brilliaant-career-solution">
                        </div>
                        <div class="card-body px-0">
                            <h5 class="card-title mb-3" style="color: #fff;"><?php echo htmlspecialchars($viewData['description']) ?></h5>
                            <a href="https://brilliaantcs.com/" target="_blank" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">VISIT<i class="fa-solid fa-up-right-from-square ms-2"></i></a>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="col-md-6 p-5">
                <div class="card">
                    <?php
                    $projectData = mysqli_fetch_all($viewprojectTwo, MYSQLI_ASSOC);
                    foreach ($projectData as $viewData) {
                    ?>
                        <div class="p-5" style="background-color: #273038;">
                            <img src="<?php $url; ?>images/nova.JPG" class="card-img-top" alt="Nova">
                        </div>
                        <div class="card-body px-0">
                            <h5 class="card-title mb-3" style="color: #fff;"><?php echo htmlspecialchars($viewData['description']) ?></h5>
                            <a href="https://jeet-web2026.github.io/Nova/" target="_blank" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">VISIT<i class="fa-solid fa-up-right-from-square ms-2"></i></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 p-5 pt-0">
                <div class="card">
                    <?php
                    $projectData = mysqli_fetch_all($viewprojectThree, MYSQLI_ASSOC);
                    foreach ($projectData as $viewData) {
                    ?>
                        <div class="p-5" style="background-color: #273038;">
                            <img src="<?php $url; ?>images/universal.JPG" class="card-img-top" alt="Universal-council-for-vocational-education">
                        </div>
                        <div class="card-body px-0">
                            <h5 class="card-title mb-3" style="color: #fff;"><?php echo htmlspecialchars($viewData['description']) ?></h5>
                            <a href="https://univskilleducation.org/" target="_blank" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">VISIT<i class="fa-solid fa-up-right-from-square ms-2"></i></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6 p-5 pt-0">
                <div class="card">
                    <?php
                    $projectData = mysqli_fetch_all($viewprojectFour, MYSQLI_ASSOC);
                    foreach ($projectData as $viewData) {
                    ?>
                        <div class="p-5" style="background-color: #273038;">
                            <img src="<?php $url; ?>images/globe.JPG" class="card-img-top" alt="Globe-allied-healthcare-skill-council">
                        </div>
                        <div class="card-body px-0">
                            <h5 class="card-title mb-3" style="color: #fff;"><?php echo htmlspecialchars($viewData['description']) ?></h5>
                            <a href="https://globechealth.ac.in/" target="_blank" style="color: #ff000a; text-decoration: none; letter-spacing: 3px;">VISIT<i class="fa-solid fa-up-right-from-square ms-2"></i></a>
                        </div>
                    <?php
                    }
                    ?>
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
                    <a href="/portfolio/pages/contact-me.php" class="btn btn-outline-danger fs-5" style="border-radius: 0px;">Contact me</a>
                </div>
            </div>
        </div>
    </section>
    <!-- home-conteact section -->
    <?php
    include 'components/footer.php';
    ?>
</body>


<script>
    $('#body .col-md-5').css('opacity', 0);
    $('#body .col-md-7').css('opacity', 0);
    $('#card-section').css('opacity', 0);
    $('#featured-projects').css('opacity', 0);
    $(document).ready(function() {
        $('.nav-item a').eq(0).css({
            'color': '#fff',
            'font-weight': '600',
            'border-bottom': '1px solid #fff',
        });


        setTimeout(function() {
            $('#body .col-md-5').animate({
                opacity: 1
            }, 'slow');
        }, 1205);

        setTimeout(function() {
            $('#body .col-md-7').animate({
                opacity: 1
            }, 'slow');
        }, 1205);

        $('#card-section').mouseenter(function() {
            $(this).animate({
                opacity: 1
            }, 'fast');
        });

        $('#featured-projects').mouseenter(function() {
            $(this).animate({
                opacity: 1
            }, 'slow');
        });

    });
</script>

</html>