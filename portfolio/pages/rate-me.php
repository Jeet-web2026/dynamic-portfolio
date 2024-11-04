<?php require '../components/navbar.php'  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #rate-me {
            height: 100vh;
            width: 100%;
            background-color: #111;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <main id="rate-me">
        <section class="container px-5">
            <div class="card p-3 shadow" style="border-radius: 0px; height: 25rem; background-color: antiquewhite;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div>
                        <h2 class="card-title text-center mb-4 fw-bold fs-2 text-danger">Hey, how was your experience with my portfolio website?</h2>
                        <h3 class="card-text text-center" style="color: #f51;">Rate me if you can!</h3>
                        <form action="" method="post">
                            <div class="row mt-4 socialButton">
                                <div class="col-md-6">
                                    <h5 class="text-center text-danger fs-5 fw-bold">Designing</h5>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center text-danger fs-5 fw-bold">Development</h5>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                        <button type="button" class="btn shadow-none">
                                            <i class="bi bi-star fs-5 text-danger"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <center class="mt-5">
                                <button type="submit" class="btn shadow-none btn-outline-success px-5 py-1" style="border-radius: 0px;">Submit</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

<script>
    $(document).ready(function() {
        
    });
</script>

</html>


<?php require '../components/footer.php'  ?>