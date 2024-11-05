<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio</title>
    <link rel="icon" type="image/x-icon" href="../images/favicon.png">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- google font cdn -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
    <!-- slick css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jquery ui css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.0/themes/base/jquery-ui.min.css" integrity="sha512-F8mgNaoH6SSws+tuDTveIu+hx6JkVcuLqTQ/S/KJaHJjGc8eUxIrBawMnasq2FDlfo7FYsD8buQXVwD+0upbcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- slick css 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- sweetalert css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css">

    <style>
        * {
            font-family: "Figtree", sans-serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        #main-body {
            background-color: #111;
        }

        #main-body .row {
            --bs-gutter-x: 0rem;
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
    <nav class="navbar navbar-expand-lg px-lg-5 px-sm-2 bg-dark py-2 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-2 fw-bold" href="http://localhost/portfolio/"><i class="fa-solid fa-code text-danger me-2"></i>PORTFOLIO</a>
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-plus-lg text-danger fs-3"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light text-uppercase me-3" aria-current="page" href="http://localhost/portfolio/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-uppercase me-2" href="/portfolio/pages/about-me.php">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-uppercase me-2" href="/portfolio/pages/my-projects.php">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-uppercase me-2" href="/portfolio/pages/contact-me.php">contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>