<?php
include '../components/navbar.php';

$url = 'http://localhost/portfolio';
include '../pages/admin-settings/about-settings.php';

$viewData = allDisplay();
$viewsliderData = sliderDisplay();
$viewexperienceData = experienceDisplay();
$viewcurrentexperienceData = currentexperienceDisplay();
$vieweducationData = educationDisplay();
$viewcurrenteducationData = currenteducationDisplay();
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

        <div class="container" style="padding-top: 10%;">
            <div class="card" style="width: 100%; border: 2px solid #dc3545; border-radius: 5px; height: 100%;">
                <div class="row g-0 p-3">
                    <div class="col-md-3">
                        <img src="../images/profile.jpg" class="rounded-start" alt="profile-image" style="height: 290px; width: 100%;">
                    </div>
                    <div class="col-md-9 ps-3">
                        <div class="card-body">
                            <h4 class="card-title mb-4 fs-3" style="font-weight: 500;">Hi I'm Jit Nath</h4>
                            <?php

                            $allData = mysqli_fetch_all($viewData, MYSQLI_ASSOC);
                            foreach ($allData as $data) {
                                echo '<p class="card-text mb-2">' . htmlspecialchars($data['description']) . '</p>';
                            }

                            ?>

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
                <?php

                $data = mysqli_fetch_all($viewsliderData, MYSQLI_ASSOC);
                foreach ($data as $showData) {
                    echo '<div class="px-3">
                    <div class="card p-3" style="background-color: transparent; border: 1px solid #dc3545; border-radius: 15px; height: 250px;">
                        <i class="fa-brands fa-html5" style="font-size: 45px;"></i>
                        <div class="card-body px-0">
                            <h5 class="card-title text-danger">' . $showData['heading'] . '</h5>
                            <p class="card-text">' . $showData['description'] . '</p>
                        </div>
                    </div>
                </div>';
                }
                ?>
                <!-- <img src="../images/cloud-api.png" class="bg-light card-image" alt="api-image"> -->
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mt-5 mb-0">
                        <h2 class="fs-2 ps-3 mb-0 text-capitalize">education</h2>
                    </div>
                    <?php
                    $data = mysqli_fetch_all($vieweducationData, MYSQLI_ASSOC);
                    foreach ($data as $showData) {
                    ?>
                        <div class="card ms-3 mt-5" style="border: 2px solid #dc3545; border-radius: 8px;">
                            <h5 class="card-header"><?php echo htmlspecialchars($showData['qualification']) ?></h5>
                            <div class="card-body">
                                <h5 class="card-title text-light text-capitalize"><?php echo htmlspecialchars($showData['q_name']) ?></h5>
                                <p class="card-text mb-2"><?php echo htmlspecialchars($showData['date']) ?></p>
                                <p class="card-text"><?php echo htmlspecialchars($showData['name']) ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="d-flex secondPlay py-3 ps-2">
                        <?php
                        $data = mysqli_fetch_all($viewcurrenteducationData, MYSQLI_ASSOC);
                        foreach ($data as $showData) {
                            echo '<div class="px-2">
                                    <div class="card" style="border: 2px solid #dc3545; border-radius: 8px; height: 200px; width: 300px;">
                                        <h5 class="card-header text-capitalize">' . $showData['qualification'] . '</h5>
                                        <div class="card-body">
                                            <h5 class="card-title text-light text-capitalize">' . $showData['q_name'] . '</h5>
                                            <p class="card-text mb-2">' . $showData['date'] . '</p>
                                            <p class="card-text">' . $showData['name'] . '</p>
                                        </div>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mt-5 mb-0">
                        <h2 class="fs-2 ps-3 mb-0 text-capitalize">experience</h2>
                    </div>
                    <?php
                    $data = mysqli_fetch_all($viewexperienceData, MYSQLI_ASSOC);
                    foreach ($data as $showData) {
                    ?>
                        <div class="card ms-3 mt-5" style="border: 2px solid #dc3545; border-radius: 8px;">
                            <h5 class="card-header"><?php echo htmlspecialchars($showData['position']) ?></h5>
                            <div class="card-body">
                                <h5 class="card-title text-light text-capitalize"><?php echo htmlspecialchars($showData['company']) ?></h5>
                                <p class="card-text mb-2"><?php echo htmlspecialchars($showData['date']) ?></p>
                                <p class="card-text"><?php echo htmlspecialchars($showData['location']) ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="d-flex secondPlay py-3 ps-2">
                        <?php
                        $data = mysqli_fetch_all($viewcurrentexperienceData, MYSQLI_ASSOC);
                        foreach ($data as $showData) {
                            echo '<div class="px-2">
                                    <div class="card" style="border: 2px solid #dc3545; border-radius: 8px; height: 200px; width: 300px;">
                                        <h5 class="card-header text-capitalize">' . $showData['position'] . '</h5>
                                        <div class="card-body">
                                            <h5 class="card-title text-light text-capitalize">' . $showData['company'] . '</h5>
                                            <p class="card-text mb-2">' . $showData['date'] . '</p>
                                            <p class="card-text">' . $showData['location'] . '</p>
                                        </div>
                                    </div>
                                </div>';
                        }
                        ?>
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