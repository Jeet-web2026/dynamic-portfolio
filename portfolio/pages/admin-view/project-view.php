<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header('Location: /portfolio/pages/login.php');
    exit;
}



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
            padding: 35px 25px;
        }

        .profile {
            height: 75px;
            width: 75px;
            border-radius: 50%;
        }

        #my-Modal {
            width: 100vw;
            height: 100vh;
            z-index: 1;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        #my-Modal .close-btn {
            position: absolute;
            cursor: pointer;
            top: 15%;
            right: 27%;
            font-size: 18px;
            border: 1px solid #fff;
            padding: 5px 12px;
            border-radius: 50%;
            background-color: #0df0b1;
        }

        #delete-Modal {
            width: 100vw;
            height: 100vh;
            z-index: 1;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg px-5 bg-dark py-2 fixed-top">
        <div class="container-fluid">
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
                        <a class="nav-link  text-uppercase me-2" href="">Project settings</a>
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
    <div id="my-Modal">
        <div class="close-btn">
            <i class="fa-solid fa-xmark text-dark"></i>
        </div>
        <div class="card shadow p-3" style="width: 40vw; height: 63%; border-radius: 0px; background-color: #0df0b1;">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label text-dark fw-bold fs-4">Choose Image</label>
                        <input class="form-control bg-light text-dark" id="image" name="iamge" type="file" style="border-radius: 0px;">
                        <p class="showErrorimage text-danger mb-0"></p>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label text-dark fw-bold fs-4">Description</label>
                        <textarea class="form-control" id="desc" style="height: 100px; border-radius: 0px;"></textarea>
                        <p class="showErrorpass text-danger mb-0"></p>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label text-dark fw-bold fs-4">Confirmation Password</label>
                        <input type="password" class="form-control text-dark bg-light" id="c-password" style="border-radius: 0px;">
                        <p class="showErrorpass text-danger mb-0"></p>
                    </div>
                    <button type="submit" id="liveToastBtn" class="btn btn-outline-success px-3 py-2 mt-3" style="border-radius: 0px;">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div id="delete-Modal">
        <div class="card shadow p-3" style="width: 40vw; height: 35%; border-radius: 0px;">
            <div class="card-body">
                <h2 class="text-center text-dark mt-3">Are you sure you want to delete this item?</h2>
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <button type="button" class="btn btn-dark text-light me-3 fs-5" id="deleteCancel" style="border-radius: 0px;">Cancel</button>
                    <button type="button" class="btn btn-secondary text-dark px-4 fs-5" style="border-radius: 0px;">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <section id="admin-dashboard" class="container-fluid mt-5">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-start">Sl no.</th>
                    <th style="width: 40%;" class="text-center">Displayed Image</th>
                    <th style="width: 35%;" class="text-center">Description</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-start">1</td>
                    <td class="text-center">demo</td>
                    <td class="text-center">demo</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-outline-success" id="editModal" style="border-radius: 0px;">Edit</button>
                        <button type="button" class="btn btn-outline-danger" id="deleteModal" style="border-radius: 0px;">Delete</button>
                    </td>
                </tr>
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
            $('#my-Modal').hide();
            $('#editModal').on('click', function() {
                $('#my-Modal').show('clip');
            });
            $('.close-btn').on('click', function() {
                $('#my-Modal').hide('clip');
            });
            $('#delete-Modal').hide();
            $('#deleteModal').on('click', function() {
                $('#delete-Modal').show('clip');
            });
            $('#deleteCancel').on('click', function() {
                $('#delete-Modal').hide('clip');
            });
        });
    </script>

</body>

</html>