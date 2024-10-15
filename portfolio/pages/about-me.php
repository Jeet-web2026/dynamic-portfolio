<?php
include '../components/navbar.php';

$url = 'http://localhost/portfolio';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h5>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem fuga, deleniti quisquam fugiat blanditiis impedit cupiditate nihil recusandae iste, maxime est eum exercitationem dolor. Id laborum eveniet deleniti ea nihil.</h5>
</body>

<script>
    $(document).ready(function() {
            $('#featured-projects .card-img-top').mouseenter(function() {
                $(this).css({
                    'transform': 'scale(1.05)',
                    'transition': 'transform 0.4s ease-in-out',
                    'cursor': 'pointer'
                });
            }).mouseleave(function() {
                $(this).css({
                    'transform': 'scale(1)',
                    'cursor': 'pointer'
                });
            });
        });
</script>

</html>
<?php
include '../components/footer.php';
?>