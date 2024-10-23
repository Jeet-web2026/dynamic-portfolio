<?php
include '../admin-settings/home-settings.php';
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header('Location: /portfolio/pages/login.php');
    exit;
}


$viewData = anotherdisplayData();
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
            <a class="navbar-brand text-light fs-2 fw-bold text-uppercase" href="">Super Admin</a>
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
    <!-- edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/edit.php" method="POST">
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

    <section id="admin-dashboard" class="container-fluid">
        <div class="row mb-3 mt-3" style="--bs-gutter-x: 0rem;">
            <div class="col-sm-6 mb-3 mb-sm-0 pe-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Total Number of Visitor's</h5>
                        <p class="fw-bold fs-4 mb-0">Work going on..</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="/portfolio/images/profile.jpg" alt="Profile" class="profile">
                                </div>
                                <div>
                                    <h3 class="ms-3 mb-0">Jit nath</h3>
                                    <p class="mb-0 ms-3">Web Application Developer</p>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-info">Know more!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            $('#myTable_wrapper').css({
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
                $('#confirmDelete').attr('href', `/portfolio/pages/functions/delete.php?slno=${slno}`);
            });

        });
    </script>

</body>

</html>