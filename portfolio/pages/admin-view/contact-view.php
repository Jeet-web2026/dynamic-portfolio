<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header('Location: /portfolio/pages/login.php');
    exit;
}

require('../admin-settings/contact-settings.php');
$data = viewData();
$socialData = viewsocialdata();
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
                        <a class="nav-link  text-uppercase me-2" href="">contact page settings</a>
                    </li>
                </ul>
                <a href="logout.php" class="btn btn-outline-danger shadow-none px-3 py1" style="border-radius: 0px;">LOGOUT</a>
            </div>
        </div>
    </nav>
    <!-- modal 1 -->
    <!-- reply modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reply Messages</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../functions/contact-edit.php">
                        <div class="mb-3">
                            <label for="personNme" class="form-label">Contact Person Name</label>
                            <input type="text" class="form-control" id="personNme" name="personNme" style="border-radius: 0px;">
                            <input type="hidden" id="personSrNo" name="personSrNo">
                        </div>
                        <div class="mb-3">
                            <label for="personEmail" class="form-label">Contact Person Email</label>
                            <input type="email" class="form-control" id="personEmail" name="personEmail" style="border-radius: 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="contactNumber" class="form-label">Contact Person Number</label>
                            <input type="number" class="form-control" id="contactNumber" name="contactNumber" style="border-radius: 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="contactReason" class="form-label">Contact Reason</label>
                            <input type="text" class="form-control" id="contactReason" name="contactReason" style="border-radius: 0px;">
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
    <!-- reply modal -->
     <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to delete</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Are you confirm to delete this item?</h1>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal" style="border-radius: 0px;">Cancel</button>
                    <a href="" id="contactDelete" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- modal 1 -->

    <!-- modal 2 -->
    <!-- edit modal -->
    <div class="modal fade" id="editLinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reply Messages</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="../functions/link-edit.php">
                        <div class="mb-3">
                            <label for="linkNme" class="form-label">Name</label>
                            <input type="text" class="form-control" id="linkNme" name="linkNme" style="border-radius: 0px;">
                            <input type="hidden" id="linkSrNo" name="linkSrNo">
                        </div>
                        <div class="mb-3">
                            <label for="link-path" class="form-label">Path</label>
                            <input type="text" class="form-control" id="link-path" name="link-path" style="border-radius: 0px;">
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
    <div class="modal fade" id="deleteLinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm to delete</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">Are you confirm to delete this item?</h1>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-dark px-3" data-bs-dismiss="modal" style="border-radius: 0px;">Cancel</button>
                    <a href="" id="Delete-Link" type="button" class="btn btn-outline-danger px-3" style="border-radius: 0px;">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- modal 2 -->

 <!-- Modal 3 -->
    <!-- add social link modal -->
    <div class="modal fade" id="addsocialLink" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 0px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a social link</h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/portfolio/pages/functions/add-social-links.php" method="POST">
                        <div class="mb-3">
                            <label for="addLinkName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="addLinkName" name="addLinkName" aria-describedby="emailHelp" style="border-radius: 0px;">
                        </div>
                        <div class="mb-3">
                            <label for="addLinkpath" class="form-label">Link</label>
                            <input type="text" class="form-control" id="addLinkpath" name="addLinkpath" aria-describedby="emailHelp" style="border-radius: 0px;">
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
    <!-- add social link modal -->
    <!-- Modal 3 -->

    <section id="admin-dashboard" class="container-fluid">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-start">Sl no.</th>
                    <th style="width: 10%;" class="text-start d-none">real sr. no</th>
                    <th style="width: 20%;" class="text-center">Contact Person Name</th>
                    <th style="width: 25%;" class="text-center">Contact Person Email</th>
                    <th style="width: 15%;" class="text-center">Contact Person Number</th>
                    <th style="width: 15%;" class="text-center">Contact Reason</th>
                    <th style="width: 15%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $viewData = mysqli_fetch_all($data, MYSQLI_ASSOC);
                $id = 0;
                foreach ($viewData as $displayData) {
                    $id++;
                    echo '<tr>
                            <td class="text-start">' . $id . '</td>
                            <td class="text-start d-none contact-serial-no">' . htmlspecialchars($displayData['contact_id']) . '</td>
                            <td class="text-center text-capitalize Namecontact">' . htmlspecialchars($displayData['contact_name']) . '</td>
                            <td class="text-center Emailcontact">' . htmlspecialchars($displayData['contact_email']) . '</td>
                            <td class="text-center text-capitalize Numbercontact">' . htmlspecialchars($displayData['contact_number']) . '</td>
                            <td class="text-center text-capitalize Reasoncontact">' . htmlspecialchars($displayData['contact_reason']) . '</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-success" id="replyMessages" data-bs-toggle="modal" data-bs-target="#replyModal" style="border-radius: 0px;">Reply</button>
                                <button type="button" class="btn btn-outline-danger" id="deleteMessages" data-bs-toggle="modal" data-bs-target="#deleteModal"  style="border-radius: 0px;">Delete</button>
                            </td>
                        </tr>';
                }
                ?>

            </tbody>
        </table>
        <table id="linksTable" class="display">
            <h2 class="text-dark my-4">Social links</h2>
            <thead>
                <tr>
                    <th style="width: 10%;" class="text-start">Sl no.</th>
                    <th style="width: 10%;" class="text-start d-none">Real Sl no.</th>
                    <th style="width: 20%;" class="text-center">Name</th>
                    <th style="width: 50%;" class="text-center">Links Path</th>
                    <th style="width: 20%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $showData = mysqli_fetch_all($socialData, MYSQLI_ASSOC);
                $id = 0;
                foreach ($showData as $displayData) {
                    $id++;
                    echo '<tr>
                            <td class="text-start">' . $id . '</td>
                            <td class="text-start d-none serialLink">' . htmlspecialchars($displayData['links_id']) . '</td>
                            <td class="text-center text-capitalize linkName">' . htmlspecialchars($displayData['link_name']) . '</td>
                            <td class="text-start linkPath">' . htmlspecialchars($displayData['links_path']) . '</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-outline-success" id="updateSocialLinks" data-bs-toggle="modal" data-bs-target="#editLinkModal"  style="border-radius: 0px;">Edit</button>
                                <button type="button" class="btn btn-outline-danger" id="deleteSocialLinks" data-bs-toggle="modal" data-bs-target="#deleteLinkModal" style="border-radius: 0px;">Delete</button>
                            </td>
                        </tr>';
                }
                ?>

            </tbody>
        </table>
        <center>
            <button type="button" class="btn btn-dark fs-5 mt-3" data-bs-toggle="modal" data-bs-target="#addsocialLink" style="border-radius: 0px;">Add a social link</button>
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
            $('#linksTable').DataTable();
            $('#myTable_wrapper').css({
                'border': '1px solid #0000002d',
                'padding': '20px',
                'border-radius': '12px'
            });
            $('#linksTable_wrapper').css({
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

            $(document).on('click', '#replyMessages', function() {
                let contactName = $(this).closest('tr').find('.Namecontact').text().trim();
                let contactEmail = $(this).closest('tr').find('.Emailcontact').text().trim();
                let contacteeNumber = $(this).closest('tr').find('.Numbercontact').text().trim();
                let contacteeReason = $(this).closest('tr').find('.Reasoncontact').text().trim();
                let contacteeSrNumber = $(this).closest('tr').find('.contact-serial-no').text().trim();

                $('#personNme').val(contactName);
                $('#personEmail').val(contactEmail);
                $('#contactNumber').val(contacteeNumber);
                $('#contactReason').val(contacteeReason);
                $('#personSrNo').val(contacteeSrNumber);
            });

            $(document).on('click', '#deleteMessages', function() {
                const contacteeSrNumber = $(this).closest('tr').find('.contact-serial-no').text();
                $('#contactDelete').attr('href', `/portfolio/pages/functions/contact-delete.php?slno=${contacteeSrNumber}`);
            });

            $(document).on('click', '#updateSocialLinks', function() {
                let NameLink = $(this).closest('tr').find('.linkName').text().trim();
                let PathLink = $(this).closest('tr').find('.linkPath').text().trim();
                let serialnoLink = $(this).closest('tr').find('.serialLink').text().trim();

                $('#linkNme').val(NameLink);
                $('#link-path').val(PathLink);
                $('#linkSrNo').val(serialnoLink);
            });

            $(document).on('click', '#deleteSocialLinks', function() {
                const serialnoLink = $(this).closest('tr').find('.serialLink').text();
                $('#Delete-Link').attr('href', `/portfolio/pages/functions/link-delete.php?slno=${serialnoLink}`);
            });

        });
    </script>

</body>

</html>