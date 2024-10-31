<?php
include '../components/navbar.php';
include '../pages/admin-settings/project-settings.php';

$url = 'http://localhost/portfolio';


$viewRecentproject = recent_projects();
$viewOngoingproject = ongoing_projects();
$viewAllproject = all_projects();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #project-body {
            height: 115vh;
            width: 100%;
            background-color: #111;
            padding-top: 80px;
        }

        #project-body .col-md-10 .card {
            height: 250px;
            width: 355px;
            background-color: #d177770d;
            color: #fff;
        }

        #project-body .col-md-10 .card:hover {
            background-color: beige;
            color: #111;
            transition: 0.4s ease-in-out;
        }

        #project-body .row {
            --bs-gutter-x: 0rem;
        }
    </style>
</head>

<body>
    <main id="project-body" class="d-flex justify-content-center align-items-center">
        <section class="container">
            <div class="row align-items-center">
                <div class="col-md-2 navigator-button">
                    <button class="text-uppercase text-light btn mb-3 px-4" style="border-radius: 0px;">all projects</button>
                    <button class="text-uppercase text-light btn mb-3" style="border-radius: 0px;">ongoing projects</button>
                    <button class="text-uppercase text-light btn" style="border-radius: 0px;">recent projects</button>
                </div>
                <div class="col-md-10">
                    <div class="all-projects-show">
                        <div class="row">
                            <div class="row">
                                <?php
                                $data = mysqli_fetch_all($viewAllproject, MYSQLI_ASSOC);
                                $chunkTwo = array_chunk($data, 3);

                                foreach ($chunkTwo as $chunkTwoData) {
                                    echo '<div class="row mb-2">';
                                    foreach ($chunkTwoData as $viewData) {
                                        echo '<div class="col-sm-4">
                                            <div class="card" style="border-radius: 0px;">
                                                <div class="card-body d-flex justify-content-center align-items-center">
                                                    <div>
                                                        <h5 class="card-title text-capitalize mb-2 fst-italic text-danger">' . htmlspecialchars($viewData['project_name']) . '</h5>
                                                        <p class="card-text text-capitalize mb-1">' . htmlspecialchars($viewData['project_description']) . '</p>
                                                        <p class="card-text text-capitalize">' . htmlspecialchars($viewData['used_technologies']) . '</p>
                                                        <a href="' . htmlspecialchars($viewData['project_link']) . '" target="_blank" class="text-danger" style="text-decoration: none;">View<i class="fa-solid fa-up-right-from-square ms-1"></i></a>
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="ongoing-projects-show" style="display: none;">
                        <div class="row">
                            <div class="row">
                                <?php
                                $data = mysqli_fetch_all($viewOngoingproject, MYSQLI_ASSOC);
                                $chunkTwo = array_chunk($data, 3);

                                foreach ($chunkTwo as $chunkTwoData) {
                                    echo '<div class="row mb-2">';
                                    foreach ($chunkTwoData as $viewData) {
                                        echo '<div class="col-sm-4">
                                            <div class="card" style="border-radius: 0px;">
                                                <div class="card-body d-flex justify-content-center align-items-center">
                                                    <div>
                                                        <h5 class="card-title text-capitalize mb-2 fst-italic text-danger">' . htmlspecialchars($viewData['project_name']) . '</h5>
                                                        <p class="card-text text-capitalize mb-1">' . htmlspecialchars($viewData['project_description']) . '</p>
                                                        <p class="card-text text-capitalize">' . htmlspecialchars($viewData['used_technologies']) . '</p>
                                                        <a href="' . htmlspecialchars($viewData['project_link']) . '" target="_blank" class="text-danger" style="text-decoration: none;">View<i class="fa-solid fa-up-right-from-square ms-1"></i></a>
                                                    </div>
                                                    </div>
                                            </div>
                                        </div>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="recent-projects-show" style="display: none;">
                        <div class="row">
                            <div class="row">
                                <?php
                                $data = mysqli_fetch_all($viewRecentproject, MYSQLI_ASSOC);
                                $chunks = array_chunk($data, 3);

                                foreach ($chunks as $chunk) {
                                    echo '<div class="row mb-2">';

                                    foreach ($chunk as $fetchdata) {
                                        echo '<div class="col-sm-4">
                                                <div class="card" style="border-radius: 0px;">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div>
                                                            <h5 class="card-title text-capitalize mb-2 fst-italic text-danger">' . htmlspecialchars($fetchdata['project_name']) . '</h5>
                                                            <p class="card-text text-capitalize mb-1">' . htmlspecialchars($fetchdata['project_description']) . '</p>
                                                            <p class="card-text text-capitalize">' . htmlspecialchars($fetchdata['used_technologies']) . '</p>
                                                            <a href="' . htmlspecialchars($fetchdata['project_link']) . '" target="_blank" class="text-danger" style="text-decoration: none;">View<i class="fa-solid fa-up-right-from-square ms-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                    }

                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<?php
include '../components/footer.php';
?>
<script>
    $('#project-body').css({
        'opacity': '0'
    });
    $(document).ready(function() {
        $('.nav-item a').eq(2).css({
            'color': '#fff',
            'font-weight': '600',
            'border-bottom': '1px solid #fff',
        });
        setTimeout(function() {
            $('#project-body').animate({
                opacity: 1
            }, 'slow');
        }, 1205);
    });
</script>

</html>