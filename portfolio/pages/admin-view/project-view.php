<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header('Location: /portfolio/pages/login.php');
    exit;
}

include '../admin-settings/project-settings.php';

$viewRecentproject = recent_projects();
$viewOngoingproject = ongoing_projects();
$viewAllproject = all_projects();

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

        .profile {
            height: 75px;
            width: 75px;
            border-radius: 50%;
        }

        #preLoader {
            background: #000000de url('/portfolio/images/preloader.gif') no-repeat center center;
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 0px;">
                    <button class="btn btn-outline-success" type="submit" style="border-radius: 0px;">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Modal 1 -->
    <!-- edit modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/all-projects-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="Pname" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="Pname" name="Pname" aria-describedby="emailHelp">
                            <input type="hidden" id="hidden-id" name="hidden-id">
                        </div>
                        <div class="mb-3">
                            <label for="desc" class="form-label">Project Description</label>
                            <input type="text" class="form-control" id="desc" name="desc" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="Utech" class="form-label">Used Technologis</label>
                            <textarea class="form-control" id="Utech" name="Utech" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Project Link</label>
                            <input type="text" class="form-control" id="link" name="link" aria-describedby="emailHelp">
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
    <!-- edit modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
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
    <!-- Modal 1 -->

    <!-- Modal 2 -->
    <!-- edit modal -->
    <div class="modal fade" id="editModaltwo" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/ongoing-projects-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="ongoingPname" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="ongoingPname" name="ongoingPname" aria-describedby="emailHelp">
                            <input type="hidden" id="ongoinghidden-id" name="ongoinghidden-id">
                        </div>
                        <div class="mb-3">
                            <label for="ongoingdesc" class="form-label">Project Description</label>
                            <input type="text" class="form-control" id="ongoingdesc" name="ongoingdesc" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="ongoingUtech" class="form-label">Used Technologis</label>
                            <textarea class="form-control" id="ongoingUtech" name="ongoingUtech" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ongoinglink" class="form-label">Project Link</label>
                            <input type="text" class="form-control" id="ongoinglink" name="ongoinglink" aria-describedby="emailHelp">
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
    <!-- edit modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModaltwo" tabindex="-1">
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
                    <a href="" id="confirmongoingDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- Modal 2 -->

    <!-- Modal 3 -->
    <!-- edit modal -->
    <div class="modal fade" id="editModalthree" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/recent-projects-edit.php" method="POST">
                        <div class="mb-3">
                            <label for="recentPname" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="recentPname" name="recentPname" aria-describedby="emailHelp">
                            <input type="hidden" id="recenthidden-id" name="recenthidden-id">
                        </div>
                        <div class="mb-3">
                            <label for="recentdesc" class="form-label">Project Description</label>
                            <input type="text" class="form-control" id="recentdesc" name="recentdesc" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="recentUtech" class="form-label">Used Technologis</label>
                            <textarea class="form-control" id="recentUtech" name="recentUtech" style="height: 100px"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recentlink" class="form-label">Project Link</label>
                            <input type="text" class="form-control" id="recentlink" name="recentlink" aria-describedby="emailHelp">
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
    <!-- edit modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModalthree" tabindex="-1">
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
                    <a href="" id="confirmrecentDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- Modal 3 -->


    <section id="admin-dashboard" class="container-fluid">
        <h2 class="my-3">All Projects</h2>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-start">Sl no.</th>
                    <th style="width: 10%;" class="text-start d-none">Real Sl no.</th>
                    <th style="width: 15%;" class="text-center">Project Name</th>
                    <th style="width: 15%;" class="text-center">Project Description</th>
                    <th style="width: 30%;" class="text-center">Used Technologis</th>
                    <th style="width: 15%;" class="text-center">Project Link</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $data = mysqli_fetch_all($viewAllproject, MYSQLI_ASSOC);
                $id = 0;
                foreach ($data as $viewData) {
                    $id++;
                    echo '<tr>
                            <td class="text-start">' . htmlspecialchars($id) . '</td>
                            <td class="text-start d-none project-Id">' . htmlspecialchars($viewData['project_id']) . '</td>
                            <td class="text-center project-Name">' . htmlspecialchars($viewData['project_name']) . '</td>
                            <td class="text-center project-Description">' . htmlspecialchars($viewData['project_description']) . '</td>
                            <td class="text-center project-UsedTechnologis">' . htmlspecialchars($viewData['used_technologies']) . '</td>
                            <td class="text-center project-Link">' . htmlspecialchars($viewData['project_link']) . '</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-success edit-all-projects" data-bs-toggle="modal" data-bs-target="#editModal" style="border-radius: 0px;">Edit</button>
                                <button type="button" class="btn btn-outline-danger delete-all-projects" data-bs-toggle="modal" data-bs-target="#deleteModal" style="border-radius: 0px;">Delete</button>
                            </td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
        <h2 class="my-3">Ongoing Projects</h2>
        <table id="myTabletwo" class="display">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-start">Sl no.</th>
                    <th style="width: 10%;" class="text-start d-none">Real Sl no.</th>
                    <th style="width: 15%;" class="text-center">Project Name</th>
                    <th style="width: 15%;" class="text-center">Project Description</th>
                    <th style="width: 30%;" class="text-center">Used Technologis</th>
                    <th style="width: 15%;" class="text-center">Project Link</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $data = mysqli_fetch_all($viewOngoingproject, MYSQLI_ASSOC);
                $id = 0;
                foreach ($data as $viewData) {
                    $id++;
                    echo '<tr>
                            <td class="text-start">' . htmlspecialchars($id) . '</td>
                            <td class="text-start d-none ongoingproject-Id">' . htmlspecialchars($viewData['project_id']) . '</td>
                            <td class="text-center ongoingproject-Name">' . htmlspecialchars($viewData['project_name']) . '</td>
                            <td class="text-center ongoingproject-Description">' . htmlspecialchars($viewData['project_description']) . '</td>
                            <td class="text-center ongoingproject-UsedTechnologis">' . htmlspecialchars($viewData['used_technologies']) . '</td>
                            <td class="text-center ongoingproject-Link">' . htmlspecialchars($viewData['project_link']) . '</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-success edit-ongoing-projects" data-bs-toggle="modal" data-bs-target="#editModaltwo" style="border-radius: 0px;">Edit</button>
                                <button type="button" class="btn btn-outline-danger delete-ongoing-projects" data-bs-toggle="modal" data-bs-target="#deleteModaltwo" style="border-radius: 0px;">Delete</button>
                            </td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
        <h2 class="my-3">Recent Projects</h2>
        <table id="myTablethree" class="display">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-start">Sl no.</th>
                    <th style="width: 10%;" class="text-start d-none">Real Sl no.</th>
                    <th style="width: 15%;" class="text-center">Project Name</th>
                    <th style="width: 15%;" class="text-center">Project Description</th>
                    <th style="width: 30%;" class="text-center">Used Technologis</th>
                    <th style="width: 15%;" class="text-center">Project Link</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $data = mysqli_fetch_all($viewRecentproject, MYSQLI_ASSOC);
                $id = 0;
                foreach ($data as $viewData) {
                    $id++;
                    echo '<tr>
                            <td class="text-start">' . htmlspecialchars($id) . '</td>
                            <td class="text-start d-none recentproject-Id">' . htmlspecialchars($viewData['project_id']) . '</td>
                            <td class="text-center recentproject-Name">' . htmlspecialchars($viewData['project_name']) . '</td>
                            <td class="text-center recentproject-Description">' . htmlspecialchars($viewData['project_description']) . '</td>
                            <td class="text-center recentproject-UsedTechnologis">' . htmlspecialchars($viewData['used_technologies']) . '</td>
                            <td class="text-center recentproject-Link">' . htmlspecialchars($viewData['project_link']) . '</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-success edit-recent-projects" data-bs-toggle="modal" data-bs-target="#editModalthree" style="border-radius: 0px;">Edit</button>
                                <button type="button" class="btn btn-outline-danger delete-recent-projects" data-bs-toggle="modal" data-bs-target="#deleteModalthree" style="border-radius: 0px;">Delete</button>
                            </td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
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
            $('#myTabletwo').DataTable();
            $('#myTablethree').DataTable();
            $('#myTable_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });
            $('#myTabletwo_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });
            $('#myTablethree_wrapper').css({
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
            $(document).on('click', '.edit-all-projects', function() {
                let projectData = $(this).closest('tr').find('.project-Name').text().trim();
                let projectDesc = $(this).closest('tr').find('.project-Description').text().trim();
                let projectUseTech = $(this).closest('tr').find('.project-UsedTechnologis').text().trim();
                let projectLink = $(this).closest('tr').find('.project-Link').text().trim();
                let projectId = $(this).closest('tr').find('.project-Id').text().trim();

                $('#Pname').val(projectData);
                $('#desc').val(projectDesc);
                $('#Utech').val(projectUseTech);
                $('#link').val(projectLink);
                $('#hidden-id').val(projectId);

            });
            $(document).on('click', '.delete-ongoing-projects', function() {
                const serialNo = $(this).closest('tr').find('.project-Id').text();
                $('#confirmDelete').attr('href', `/portfolio/pages/functions/all-projects-delete.php?slno=${serialNo}`)
            });

            $(document).on('click', '.edit-ongoing-projects', function() {
                let projectData = $(this).closest('tr').find('.ongoingproject-Name').text().trim();
                let projectDesc = $(this).closest('tr').find('.ongoingproject-Description').text().trim();
                let projectUseTech = $(this).closest('tr').find('.ongoingproject-UsedTechnologis').text().trim();
                let projectLink = $(this).closest('tr').find('.ongoingproject-Link').text().trim();
                let projectId = $(this).closest('tr').find('.ongoingproject-Id').text().trim();

                $('#ongoingPname').val(projectData);
                $('#ongoingdesc').val(projectDesc);
                $('#ongoingUtech').val(projectUseTech);
                $('#ongoinglink').val(projectLink);
                $('#ongoinghidden-id').val(projectId);

            });
            $(document).on('click', '.delete-ongoing-projects', function() {
                const serialNo = $(this).closest('tr').find('.ongoingproject-Id').text();
                $('#confirmongoingDelete').attr('href', `/portfolio/pages/functions/ongoing-projects-delete.php?slno=${serialNo}`)
            });

            $(document).on('click', '.edit-recent-projects', function() {
                let projectData = $(this).closest('tr').find('.recentproject-Name').text().trim();
                let projectDesc = $(this).closest('tr').find('.recentproject-Description').text().trim();
                let projectUseTech = $(this).closest('tr').find('.recentproject-UsedTechnologis').text().trim();
                let projectLink = $(this).closest('tr').find('.recentproject-Link').text().trim();
                let projectId = $(this).closest('tr').find('.recentproject-Id').text().trim();

                $('#recentPname').val(projectData);
                $('#recentdesc').val(projectDesc);
                $('#recentUtech').val(projectUseTech);
                $('#recentlink').val(projectLink);
                $('#recenthidden-id').val(projectId);

            });
            $(document).on('click', '.delete-recent-projects', function() {
                const serialNo = $(this).closest('tr').find('.recentproject-Id').text();
                $('#confirmrecentDelete').attr('href', `/portfolio/pages/functions/recent-projects-delete.php?slno=${serialNo}`)
            });
        });
    </script>

</body>

</html>