<?php
session_start();
include '../admin-settings/about-settings.php';


if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header('Location: /portfolio/pages/login.php');
    exit;
}


$viewData = allDisplay();
$viewsliderData = sliderDisplay();
$viewexperienceData = experienceDisplay();
$vieweducationData = educationDisplay();
$viewCurrentexperienceData = currentexperienceDisplay();
$viewCurrenteducationData = currenteducationDisplay();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/portfolio/images/favicon.png">
    <title>Portfolio - Admin Dashboard</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
            font-family: "Figtree", serif;
            font-optical-sizing: auto;
            font-style: normal;
        }

        #admin-dashboard {
            padding: 100px 25px 15px 25px;
        }

        #slider-dashboard {
            padding: 15px 25px 35px 25px;
        }

        #preLoader {
            background: #000 url('/portfolio/images/preloader.gif') no-repeat center center;
            height: 100vh;
            width: 100%;
            background-size: 130px;
            position: fixed;
            z-index: 100000;
        }
    </style>

</head>

<body>
    <div id="preLoader"></div>
    <nav class="navbar navbar-expand-lg px-5 bg-dark py-2 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-2 fw-bold text-uppercase" href="index-admin-view.php">Super Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light text-uppercase me-3" aria-current="page" href="/portfolio/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-uppercase me-2" href="about-view.php">about settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-uppercase me-2" href="project-view.php">Project settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-uppercase me-2" href="contact-view.php">contact page settings</a>
                    </li>
                </ul>
                <a href="logout.php" class="btn btn-outline-danger shadow-none px-3 py1" style="border-radius: 0px;">LOGOUT</a>
            </div>
        </div>
    </nav>
    <!-- edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/about-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="image" class="form-label">Choose image</label>
                            <input type="text" class="form-control" id="image" name="image" aria-describedby="emailHelp">
                            <input type="hidden" id="hidden-id" name="hidden-id">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control" id="desc" name="desc" style="height: 100px"></textarea>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-outline-dark px-3" style="border-radius: 0px;" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success px-3" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Are you confirm to delete this item?</h1>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal" style="border-radius: 0px;">Cancel</button>
                    <a href="" id="confirmDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->

    <!-- modal - 2 -->
    <!-- edit Modal -->
    <div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/about-slider-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="sliderImageData" class="form-label">Choose image</label>
                            <input type="text" class="form-control" id="sliderImageData" name="Sliderimage" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="sliderHeadingData" class="form-label">Heading</label>
                            <input type="text" class="form-control" id="sliderHeadingData" name="headingData" aria-describedby="emailHelp">
                            <input type="hidden" id="hidden-sliderId" name="hidden-sliderId">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Description</label>
                            <textarea class="form-control" id="sliderDescriptiondata" name="description" style="height: 100px"></textarea>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-outline-dark px-3" style="border-radius: 0px;" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success px-3" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Are you confirm to delete this item?</h1>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal" style="border-radius: 0px;">Cancel</button>
                    <a href="" id="confirmSliderDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- modal - 2 -->

    <!-- modal - 3 -->
    <!-- edit Modal -->
    <div class="modal fade" id="editModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/about-experience-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="exDesignation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="exDesignation" name="exDesignation" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exCompany" class="form-label">Company</label>
                            <input type="text" class="form-control" id="exCompany" name="exCompany" aria-describedby="emailHelp">
                            <input type="hidden" id="hidden-experienceId" name="hidden-experienceId">
                        </div>
                        <div class="mb-3">
                            <label for="exdate" class="form-label">Date</label>
                            <input type="text" class="form-control" id="exdate" name="exdate" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="exLocation" name="exLocation" aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-outline-dark px-3" style="border-radius: 0px;" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success px-3" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Are you confirm to delete this item?</h1>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal" style="border-radius: 0px;">Cancel</button>
                    <a href="" id="confirmExpreienceDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- modal - 3 -->

    <!-- modal - 4 -->
    <!-- edit Modal -->
    <div class="modal fade" id="editModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/about-currentexperience-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="crntexDesignation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="crntexDesignation" name="CurrentD" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="crntexCompany" class="form-label">Company</label>
                            <input type="text" class="form-control" id="crntexCompany" name="CurrentC" aria-describedby="emailHelp">
                            <input type="hidden" id="hidden-crntexperienceId" name="hidden-CurrentID">
                        </div>
                        <div class="mb-3">
                            <label for="crntexdate" class="form-label">Date</label>
                            <input type="text" class="form-control" id="crntexdate" name="CurrentDT" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="crntexLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="crntexLocation" name="CurrentL" aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-outline-dark px-3" style="border-radius: 0px;" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success px-3" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Are you confirm to delete this item?</h1>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal" style="border-radius: 0px;">Cancel</button>
                    <a href="" id="confirmCurrentExpreienceDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- modal - 4 -->

    <!-- modal - 5 -->
    <!-- edit Modal -->
    <div class="modal fade" id="editModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/about-education-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="edDesignation" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="edDesignation" name="ED" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="edCompany" class="form-label">Degree Name</label>
                            <input type="text" class="form-control" id="edCompany" name="EC" aria-describedby="emailHelp">
                            <input type="hidden" id="hidden-educationId" name="hidden-EID">
                        </div>
                        <div class="mb-3">
                            <label for="eddate" class="form-label">Date</label>
                            <input type="text" class="form-control" id="eddate" name="EDT" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="edLocation" class="form-label">Institute Name</label>
                            <input type="text" class="form-control" id="edLocation" name="EL" aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-outline-dark px-3" style="border-radius: 0px;" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success px-3" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Are you confirm to delete this item?</h1>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal" style="border-radius: 0px;">Cancel</button>
                    <a href="" id="confirmEduDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- modal - 5 -->

    <!-- modal - 6 -->
    <!-- edit Modal -->
    <div class="modal fade" id="editModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/about-currenteducation-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="crntedDesignation" class="form-label">Qualification</label>
                            <input type="text" class="form-control" id="crntedDesignation" name="crntED" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="crntedCompany" class="form-label">Degree Name</label>
                            <input type="text" class="form-control" id="crntedCompany" name="crntEC" aria-describedby="emailHelp">
                            <input type="hidden" id="hidden-crnteducationId" name="hidden-crntEID">
                        </div>
                        <div class="mb-3">
                            <label for="crnteddate" class="form-label">Date</label>
                            <input type="text" class="form-control" id="crnteddate" name="crntEDT" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="crntedLocation" class="form-label">Institute Name</label>
                            <input type="text" class="form-control" id="crntedLocation" name="crntEL" aria-describedby="emailHelp">
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-outline-dark px-3" style="border-radius: 0px;" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success px-3" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Are you confirm to delete this item?</h1>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal" style="border-radius: 0px;">Cancel</button>
                    <a href="" id="confirmcrntEduDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- modal - 6 -->

    <!-- modal - 7 -->
    <!-- add slider -->
    <div class="modal fade" id="addSlider-model" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new skills</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/add-slider-details.php" method="POST">
                        <div class="mb-3">
                            <label for="sliderFile" class="form-label">Image</label>
                            <input type="file" class="form-control shadow-none" id="sliderFile" name="SliderImage" style="border-radius: 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="sliderHeading" class="form-label">Heading</label>
                            <input type="text" class="form-control shadow-none" id="sliderHeading" name="SliderHeading" style="border-radius: 0px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="floatingTextarea2">Description</label>
                            <textarea class="form-control shadow-none" placeholder="Description" name="SliderDescp" id="floatingTextarea2" style="height: 100px; border-radius: 0px;" required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-outline-dark shadow-none px-4 py-1" data-bs-dismiss="modal" style="border-radius: 0px;">Close</button>
                            <button type="submit" class="btn btn-outline-success shadow-none px-4 py-1" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- add slider -->
    <!-- modal - 7 -->

    <!-- modal - 8 -->
    <!-- add experience -->
    <div class="modal fade" id="addExperience-model" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new experience</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/add-experience-details.php" method="POST">
                        <div class="mb-3">
                            <label for="exDescription" class="form-label">Designation</label>
                            <input type="text" class="form-control shadow-none" id="exDescription" name="exDescription" style="border-radius: 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="exCompany" class="form-label">Company</label>
                            <input type="text" class="form-control shadow-none" id="exCompany" name="exCompany" style="border-radius: 0px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="exDate" class="form-label">Date</label>
                            <input type="text" class="form-control shadow-none" id="exDate" name="exDate" style="border-radius: 0px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="exLocation" class="form-label">Location</label>
                            <input type="text" class="form-control shadow-none" id="exLocation" name="exLocation" style="border-radius: 0px;" required>
                        </div>
                        <div class="modal-footer d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-outline-dark shadow-none px-4 py-1" data-bs-dismiss="modal" style="border-radius: 0px;">Close</button>
                            <button type="submit" class="btn btn-outline-success shadow-none px-4 py-1" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- add experience -->
    <!-- modal - 8 -->

    <!-- modal - 9 -->
    <!-- add education -->
    <div class="modal fade" id="addEducation-model" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new experience</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/add-education-details.php" method="POST">
                        <div class="mb-3">
                            <label for="edQualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control shadow-none" id="edQualification" name="edQualification" style="border-radius: 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="edDegree" class="form-label">Degree Name</label>
                            <input type="text" class="form-control shadow-none" id="edDegree" name="edDegree" style="border-radius: 0px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="edDate" class="form-label">Date</label>
                            <input type="text" class="form-control shadow-none" id="edDate" name="edDate" style="border-radius: 0px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="edInstitute" class="form-label">Institute Name</label>
                            <input type="text" class="form-control shadow-none" id="edInstitute" name="edInstitute" style="border-radius: 0px;" required>
                        </div>
                        <div class="modal-footer d-flex justify-content-center align-items-center">
                            <button type="button" class="btn btn-outline-dark shadow-none px-4 py-1" data-bs-dismiss="modal" style="border-radius: 0px;">Close</button>
                            <button type="submit" class="btn btn-outline-success shadow-none px-4 py-1" style="border-radius: 0px;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- add education -->
    <!-- modal - 9 -->



    <section id="admin-dashboard" class="container-fluid">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-start">Sl no.</th>
                    <th style="width: 10%; display: none;" class="text-start"></th>
                    <th style="width: 40%;" class="text-center">Content</th>
                    <th style="width: 35%;" class="text-center">Description</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_fetch_all($viewData, MYSQLI_ASSOC);
                $slno = 0;

                foreach ($data as $showData) {
                    $slno++;
                ?>
                    <tr>
                        <td class="text-start"><?php echo $slno; ?></td>
                        <td style="display: none;" class="text-start serial-no"><?php echo htmlspecialchars($showData['sl_no']); ?></td>
                        <td class="text-center myImage text-capitalize"><?php echo htmlspecialchars($showData['image']); ?></td>
                        <td class="text-start myDescription text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['description']); ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-outline-success for_edit" data-bs-toggle="modal" data-bs-target="#editModal" style="border-radius: 0px;">Edit</button>
                            <button type="button" class="btn btn-outline-danger for_delete" data-bs-toggle="modal" data-bs-target="#deleteModal" style="border-radius: 0px;">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <section id="slider-dashboard" class="container-fluid">
        <h2 class="text-center my-3">Slider Settings</h2>
        <table id="sliderTable" class="display">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-start">Sl no.</th>
                    <th style="width: 10%; display: none;" class="text-start"></th>
                    <th style="width: 25%;" class="text-center">Image</th>
                    <th style="width: 15%;" class="text-center">Heading</th>
                    <th style="width: 40%;" class="text-center">Description</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_fetch_all($viewsliderData, MYSQLI_ASSOC);
                $slno = 0;

                foreach ($data as $showData) {
                    $slno++;
                ?>
                    <tr>
                        <td class="text-start"><?php echo $slno; ?></td>
                        <td style="display: none;" class="text-start sliderSerial-no"><?php echo htmlspecialchars($showData['id']); ?></td>
                        <td class="text-center sliderImage text-capitalize"><?php echo htmlspecialchars($showData['img']); ?></td>
                        <td class="text-center sliderHeading text-capitalize"><?php echo htmlspecialchars($showData['heading']); ?></td>
                        <td class="text-start sliderDescription text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['description']); ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-outline-success for_slideredit" data-bs-toggle="modal" data-bs-target="#editModal2" style="border-radius: 0px;">Edit</button>
                            <button type="button" class="btn btn-outline-danger for_sliderdelete" data-bs-toggle="modal" data-bs-target="#deleteModal2" style="border-radius: 0px;">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <center>
            <button class="btn btn-dark shadow-none text-capitalize fs-5 px-4 py-1 mt-3" style="border-radius: 0px;" data-bs-toggle="modal" data-bs-target="#addSlider-model">add new slider</button>
        </center>
    </section>

    <section id="slider-dashboard" class="container-fluid">
        <h2 class="text-center my-3">Education & Experience Settings</h2>
        <h4 class="my-3">Experience</h4>
        <table id="edTable" class="display">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-start">Sl no.</th>
                    <th style="width: 10%; display: none;" class="text-start"></th>
                    <th style="width: 20%;" class="text-center">Designation</th>
                    <th style="width: 25%;" class="text-center">Company</th>
                    <th style="width: 20%;" class="text-center">Date</th>
                    <th style="width: 15%;" class="text-center">Location</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_fetch_all($viewexperienceData, MYSQLI_ASSOC);
                $slno = 0;

                foreach ($data as $showData) {
                    $slno++;
                ?>
                    <tr>
                        <td class="text-start"><?php echo $slno; ?></td>
                        <td style="display: none;" class="text-start experienceSerial-no"><?php echo htmlspecialchars($showData['id']); ?></td>
                        <td class="text-center experienceDesignation text-capitalize"><?php echo htmlspecialchars($showData['position']); ?></td>
                        <td class="text-center experienceCompany text-capitalize"><?php echo htmlspecialchars($showData['company']); ?></td>
                        <td class="text-center experienceDate text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['date']); ?></td>
                        <td class="text-center experienceLocation text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['location']); ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-outline-success for_experinceedit" data-bs-toggle="modal" data-bs-target="#editModal3" style="border-radius: 0px;">Edit</button>
                            <button type="button" class="btn btn-outline-danger for_experincedelete" data-bs-toggle="modal" data-bs-target="#deleteModal3" style="border-radius: 0px;">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <section id="slider-dashboard" class="container-fluid">
        <h4 class="my-3">Current Experience</h4>
        <table id="CurrentedTable" class="display">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-start">Sl no.</th>
                    <th style="width: 10%; display: none;" class="text-start"></th>
                    <th style="width: 20%;" class="text-center">Designation</th>
                    <th style="width: 25%;" class="text-center">Company</th>
                    <th style="width: 20%;" class="text-center">Date</th>
                    <th style="width: 15%;" class="text-center">Location</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_fetch_all($viewCurrentexperienceData, MYSQLI_ASSOC);
                $slno = 0;

                foreach ($data as $showData) {
                    $slno++;
                ?>
                    <tr>
                        <td class="text-start"><?php echo $slno; ?></td>
                        <td style="display: none;" class="text-start CrntexperienceSerial-no"><?php echo htmlspecialchars($showData['id']); ?></td>
                        <td class="text-center CrntexperienceDesignation text-capitalize"><?php echo htmlspecialchars($showData['position']); ?></td>
                        <td class="text-center CrntexperienceCompany text-capitalize"><?php echo htmlspecialchars($showData['company']); ?></td>
                        <td class="text-center CrntexperienceDate text-capitalize" style="max-width: 150px;"><?php echo htmlspecialchars($showData['date']); ?></td>
                        <td class="text-center CrntexperienceLocation text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['location']); ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-outline-success for_crntexperinceedit" data-bs-toggle="modal" data-bs-target="#editModal4" style="border-radius: 0px;">Edit</button>
                            <button type="button" class="btn btn-outline-danger for_crntexperincedelete" data-bs-toggle="modal" data-bs-target="#deleteModal4" style="border-radius: 0px;">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <center>
            <button class="btn btn-dark shadow-none text-capitalize fs-5 px-4 py-1 mt-3" style="border-radius: 0px;" data-bs-toggle="modal" data-bs-target="#addExperience-model">add new experience</button>
        </center>
    </section>

    <section id="slider-dashboard" class="container-fluid">
        <h4 class="my-3">Education</h4>
        <table id="exTable" class="display">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-start">Sl no.</th>
                    <th style="width: 10%; display: none;" class="text-start"></th>
                    <th style="width: 20%;" class="text-center">Qualification</th>
                    <th style="width: 25%;" class="text-center">Degree Name</th>
                    <th style="width: 20%;" class="text-center">Date</th>
                    <th style="width: 15%;" class="text-center">Institute Name</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_fetch_all($vieweducationData, MYSQLI_ASSOC);
                $slno = 0;

                foreach ($data as $showData) {
                    $slno++;
                ?>
                    <tr>
                        <td class="text-start"><?php echo $slno; ?></td>
                        <td style="display: none;" class="text-start educationnSerial-no"><?php echo htmlspecialchars($showData['id']); ?></td>
                        <td class="text-center educationnDesignation text-capitalize"><?php echo htmlspecialchars($showData['qualification']); ?></td>
                        <td class="text-center educationnCompany text-capitalize"><?php echo htmlspecialchars($showData['q_name']); ?></td>
                        <td class="text-center educationnDate text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['date']); ?></td>
                        <td class="text-start educationnLocation text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['name']); ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-outline-success for_educationnedit" data-bs-toggle="modal" data-bs-target="#editModal5" style="border-radius: 0px;">Edit</button>
                            <button type="button" class="btn btn-outline-danger for_educationndelete" data-bs-toggle="modal" data-bs-target="#deleteModal5" style="border-radius: 0px;">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>

    <section id="slider-dashboard" class="container-fluid">
        <h4 class="my-3">Current Education</h4>
        <table id="CurrentexTable" class="display">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-start">Sl no.</th>
                    <th style="width: 10%; display: none;" class="text-start"></th>
                    <th style="width: 20%;" class="text-center">Qualification</th>
                    <th style="width: 25%;" class="text-center">Degree Name</th>
                    <th style="width: 20%;" class="text-center">Date</th>
                    <th style="width: 15%;" class="text-center">Institute Name</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = mysqli_fetch_all($viewCurrenteducationData, MYSQLI_ASSOC);
                $slno = 0;

                foreach ($data as $showData) {
                    $slno++;
                ?>
                    <tr>
                        <td class="text-start"><?php echo $slno; ?></td>
                        <td style="display: none;" class="text-start crnteducationnSerial-no"><?php echo htmlspecialchars($showData['id']); ?></td>
                        <td class="text-center crnteducationnDesignation text-capitalize"><?php echo htmlspecialchars($showData['qualification']); ?></td>
                        <td class="text-center crnteducationnCompany text-capitalize"><?php echo htmlspecialchars($showData['q_name']); ?></td>
                        <td class="text-center crnteducationnDate text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['date']); ?></td>
                        <td class="text-center crnteducationnLocation text-truncate" style="max-width: 150px;"><?php echo htmlspecialchars($showData['name']); ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-outline-success for_crnteducationnedit" data-bs-toggle="modal" data-bs-target="#editModal6" style="border-radius: 0px;">Edit</button>
                            <button type="button" class="btn btn-outline-danger for_crnteducationndelete" data-bs-toggle="modal" data-bs-target="#deleteModal6" style="border-radius: 0px;">Delete</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <center>
            <button class="btn btn-dark shadow-none text-capitalize fs-5 px-4 py-1 mt-3" style="border-radius: 0px;" data-bs-toggle="modal" data-bs-target="#addEducation-model">add current education</button>
        </center>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jquery ui js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.0/jquery-ui.min.js" integrity="sha512-MlEyuwT6VkRXExjj8CdBKNgd+e2H+aYZOCUaCrt9KRk6MlZDOs91V1yK22rwm8aCIsb5Ec1euL8f0g58RKT/Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#preLoader').css({
                    'display': 'none'
                });
            }, 1000);
            $('#myTable').DataTable();
            $('#sliderTable').DataTable();
            $('#edTable').DataTable();
            $('#CurrentedTable').DataTable();
            $('#exTable').DataTable();
            $('#CurrentexTable').DataTable();
            $('#myTable_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });

            $('#sliderTable_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });

            $('#edTable_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });

            $('#CurrentedTable_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });

            $('#exTable_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });

            $('#CurrentexTable_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });

            $('.nav-item a').css({
                'color': '#6c757d',
                'font-weight': '600'
            });
            $('.nav-item a').mouseenter(function() {
                $(this).css({
                    'color': '#fff',
                    'border-bottom': '1px solid #fff',
                    'transition': '0.4s ease-in-out'
                });
            }).mouseleave(function() {
                $(this).css({
                    'color': '#6c757d',
                    'border-bottom': '0px',
                    'transition': '0.4s ease-in-out'
                });
            });
            $(document).on('click', '.for_edit', function() {
                let Imagedata = $(this).closest('tr').find('.myImage').text().trim();
                let serialNo = $(this).closest('tr').find('.serial-no').text().trim();
                let DescriptionData = $(this).closest('tr').find('.myDescription').text().trim();

                $('#image').val(Imagedata);
                $('#desc').val(DescriptionData);
                $('#hidden-id').val(serialNo);
            });

            $(document).on('click', '.for_delete', function() {
                const slno = $(this).closest('tr').find('.serial-no').text();
                $('#confirmDelete').attr('href', `/portfolio/pages/functions/about-delete.php?slno=${slno}`);
            });

            $(document).on('click', '.for_slideredit', function() {
                let Imagedata = $(this).closest('tr').find('.sliderImage').text().trim();
                let Headingdata = $(this).closest('tr').find('.sliderHeading').text().trim();
                let serialNo = $(this).closest('tr').find('.sliderSerial-no').text().trim();
                let DescriptionData = $(this).closest('tr').find('.sliderDescription').text().trim();

                $('#sliderImageData').val(Imagedata);
                $('#sliderHeadingData').val(Headingdata);
                $('#sliderDescriptiondata').val(DescriptionData);
                $('#hidden-sliderId').val(serialNo);
            });

            $(document).on('click', '.for_sliderdelete', function() {
                const slno = $(this).closest('tr').find('.sliderSerial-no').text();
                $('#confirmSliderDelete').attr('href', `/portfolio/pages/functions/about-slider-delete.php?slno=${slno}`);
            });

            $(document).on('click', '.for_experinceedit', function() {
                let Desigdata = $(this).closest('tr').find('.experienceDesignation').text().trim();
                let Codata = $(this).closest('tr').find('.experienceCompany').text().trim();
                let serialNo = $(this).closest('tr').find('.experienceSerial-no').text().trim();
                let DateData = $(this).closest('tr').find('.experienceDate').text().trim();
                let locationData = $(this).closest('tr').find('.experienceLocation').text().trim();

                $('#exDesignation').val(Desigdata);
                $('#exCompany').val(Codata);
                $('#exdate').val(DateData);
                $('#hidden-experienceId').val(serialNo);
                $('#exLocation').val(locationData);
            });

            $(document).on('click', '.for_experincedelete', function() {
                const slno = $(this).closest('tr').find('.experienceSerial-no').text();
                $('#confirmExpreienceDelete').attr('href', `/portfolio/pages/functions/about-expreience-delete.php?slno=${slno}`);
            });

            $(document).on('click', '.for_crntexperinceedit', function() {
                let Desigdata = $(this).closest('tr').find('.CrntexperienceDesignation').text().trim();
                let Codata = $(this).closest('tr').find('.CrntexperienceCompany').text().trim();
                let serialNo = $(this).closest('tr').find('.CrntexperienceSerial-no').text().trim();
                let DateData = $(this).closest('tr').find('.CrntexperienceDate').text().trim();
                let locationData = $(this).closest('tr').find('.CrntexperienceLocation').text().trim();

                $('#crntexDesignation').val(Desigdata);
                $('#crntexCompany').val(Codata);
                $('#crntexdate').val(DateData);
                $('#hidden-crntexperienceId').val(serialNo);
                $('#crntexLocation').val(locationData);
            });

            $(document).on('click', '.for_crntexperincedelete', function() {
                const slno = $(this).closest('tr').find('.CrntexperienceSerial-no').text();
                $('#confirmCurrentExpreienceDelete').attr('href', `/portfolio/pages/functions/about-currentexperience-delete.php?slno=${slno}`);
            });

            $(document).on('click', '.for_educationnedit', function() {
                let Desigdata = $(this).closest('tr').find('.educationnDesignation').text().trim();
                let Codata = $(this).closest('tr').find('.educationnCompany').text().trim();
                let serialNo = $(this).closest('tr').find('.educationnSerial-no').text().trim();
                let DateData = $(this).closest('tr').find('.educationnDate').text().trim();
                let locationData = $(this).closest('tr').find('.educationnLocation').text().trim();

                $('#edDesignation').val(Desigdata);
                $('#edCompany').val(Codata);
                $('#eddate').val(DateData);
                $('#hidden-educationId').val(serialNo);
                $('#edLocation').val(locationData);
            });

            $(document).on('click', '.for_educationndelete', function() {
                const slno = $(this).closest('tr').find('.educationnSerial-no').text();
                $('#confirmEduDelete').attr('href', `/portfolio/pages/functions/about-education-delete.php?slno=${slno}`);
            });

            $(document).on('click', '.for_crnteducationnedit', function() {
                let Desigdata = $(this).closest('tr').find('.crnteducationnDesignation').text().trim();
                let Codata = $(this).closest('tr').find('.crnteducationnCompany').text().trim();
                let serialNo = $(this).closest('tr').find('.crnteducationnSerial-no').text().trim();
                let DateData = $(this).closest('tr').find('.crnteducationnDate').text().trim();
                let locationData = $(this).closest('tr').find('.crnteducationnLocation').text().trim();

                $('#crntedDesignation').val(Desigdata);
                $('#crntedCompany').val(Codata);
                $('#crnteddate').val(DateData);
                $('#hidden-crnteducationId').val(serialNo);
                $('#crntedLocation').val(locationData);
            });

            $(document).on('click', '.for_crnteducationndelete', function() {
                const slno = $(this).closest('tr').find('.crnteducationnSerial-no').text();
                $('#confirmcrntEduDelete').attr('href', `/portfolio/pages/functions/about-currenteducation-delete.php?slno=${slno}`);
            });

        });
    </script>

</body>

</html>