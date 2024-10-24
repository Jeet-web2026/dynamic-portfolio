<!-- footer menu -->
<section id="footer-menu" class="pt-5 pb-4" style="background-color: #111;">
    <div class="container">
        <div class="d-flex align-items-center justify-content-around">
            <div>
                <a href="/portfolio/" class="me-5 text-light" style="text-decoration: none;">Home</a>
                <a href="/portfolio/pages/login.php" class="me-5 text-light" style="text-decoration: none;">Admin login</a>
                <a href="/portfolio/pages/rate-me.php" class="text-light" style="text-decoration: none;">Rate me</a>
            </div>
            <div>
                <p class="text-secondary mb-0">© <?php echo date('Y') ?> DeveloperJit, All Rights Reserved</p>
            </div>
        </div>
    </div>
</section>


<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- slick js cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- jquery ui js cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.0/jquery-ui.min.js" integrity="sha512-MlEyuwT6VkRXExjj8CdBKNgd+e2H+aYZOCUaCrt9KRk6MlZDOs91V1yK22rwm8aCIsb5Ec1euL8f0g58RKT/Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- bootstrap js cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#preLoader').css({
                'display': 'none'
            });
        }, 1200);
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

        $('#my-Modal').hide();
        $('#dialog-opener').on('click', function() {
            $('#my-Modal').show('clip');
        });
        $('#liveToastBtn').click(function(e) {
            if ($('#email').val() === "" || $('#number').val() === "") {
                e.preventDefault();
                $('#my-Modal').effect('shake', {
                    times: 3
                }, 500);
            }
            if ($('#email').val() === "") {
                $('.showErroremail').html('Please enter your email here');
            } else {
                $('.showErroremail').html('');
            }
            if ($('#number').val() === "") {
                $('.showErrorpass').html('Please enter your password here');
            } else {
                $('.showErrorpass').html('');
            }
        });


        $('.close-btn').on('click', function() {
            $('#my-Modal').hide('clip');
        });

        $('#card-section .cstm-side').find('.card').eq(1).css({
            'background-color': '#ff000a',
            'color': '#fff'
        });
        $('#card-section .cstm-side').find('.card').eq(1).siblings().css({
            'background-color': '#273038',
            'color': '#fff'
        });
        $('.nav-item a').css({
            'color': '#6c757d',
        });
        $('.nav-item a').mouseenter(function() {
            $(this).css({
                'color': '#fff',
                'font-weight': '600',
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

        $('#card-section .cstm-side').find('.card').eq(1).css({
            'background-color': '#ff000a',
            'color': '#fff'
        });
        $('#card-section .cstm-side').find('.card').eq(1).siblings().css({
            'background-color': '#273038',
            'color': '#fff'
        });
        $('.nav-item a').css({
            'color': '#6c757d',
        });
        $('.nav-item a').mouseenter(function() {
            $(this).css({
                'color': '#fff',
                'font-weight': '600',
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

        $('#Submit-form').click(function(e) {
            if ($('#loginemail').val() === "" || $('#loginpassword').val() === "") {
                e.preventDefault();
            }
            if ($('#loginemail').val() === "") {
                e.preventDefault();
                $('.showErroremail').html('Please enter your email');
                $('.showErrorformatemail').html('');
            } else if (!$('#loginemail').val().includes('@') || !$('#loginemail').val().includes('.com')) {
                e.preventDefault();
                $('.showErrorformatemail').html('Please enter a valid email (include @ and .com)');
                $('.showErroremail').html('');
            } else {
                $('.showErroremail').html('');
                $('.showErrorformatemail').html('');
            }

            if ($('#loginpassword').val() === "") {
                e.preventDefault();
                $('.showErrorpass').html('Please enter your password');
            } else {
                $('.showErrorpass').html('');
            }

            const captcha = $(".random-captcha").html();
            const userInput = $('#randmnum').val();
            const blankCaptchaMessage = $('.showblankcaptha');
            const errorCaptchaMessage = $('.showErrorcaptha');

            if (userInput === "") {
                e.preventDefault();
                blankCaptchaMessage.html('Please enter the captcha');
                errorCaptchaMessage.html('');
            } else if (captcha !== userInput) {
                e.preventDefault();
                errorCaptchaMessage.html('Please enter the correct captcha');
                blankCaptchaMessage.html('');
            } else {
                blankCaptchaMessage.html('');
                errorCaptchaMessage.html('');
            }


            const Mobilenumber = $('#mnum').val();

            if (Mobilenumber.length !== 10) {
                e.preventDefault();
                $('.showErrormob').html('Please enter a 10-digit mobile number');
            } else {
                $('.showErrormob').html('');
            }

        });
        $(".random-captcha").html(Math.floor(Math.random() * 10000));


        $('.autoplay').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            dots: false,
            infinite: true,
            autoplaySpeed: 1000,
            prevArrow: false,
            nextArrow: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        $('.secondPlay').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            dots: false,
            infinite: true,
            autoplaySpeed: 5000,
            prevArrow: false,
            nextArrow: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $('.navigator-button button').eq(0).css({
            'background-color': '#ff000a',
            'color': '#fff',
            'font-weight': '600'
        });
        $('.navigator-button button').on('click', function() {
            $(this).css({
                'background-color': '#ff000a',
                'color': '#fff',
                'font-weight': '600',
                'transition': '0.3s ease-in-out'
            });
            $(this).siblings().css({
                'background-color': '',
                'color': '#fff',
                'font-weight': ''
            });
        });

        $('.navigator-button button').eq(0).click(function() {
            $('.all-projects-show').css({
                'display': ''
            });
            $('.all-projects-show').siblings().css({
                'display': 'none'
            });
        });

        $('.navigator-button button').eq(1).click(function() {
            $('.ongoing-projects-show').css({
                'display': ''
            });
            $('.ongoing-projects-show').siblings().css({
                'display': 'none'
            });
        });

        $('.navigator-button button').eq(2).click(function() {
            $('.recent-projects-show').css({
                'display': ''
            });
            $('.recent-projects-show').siblings().css({
                'display': 'none'
            });
        });

        $('#project-body .col-md-10 .card a').mouseenter(function() {
            $(this).css({
                'margin-left': '5px',
                'transition': '0.4s ease-in-out'
            });
        });

        $('#project-body .col-md-10 .card a').mouseleave(function() {
            $(this).css({
                'margin-left': '',
            });
        });

        $('.social-icons a').css({
            'color': '#fff'
        });
        $('.social-icons a').mouseenter(function() {
            $(this).css({
                'color': '#ff000a',
                'transition': '0.3s ease-in-out',
            });
        }).mouseleave(function() {
            $(this).css({
                'color': '#fff'
            });
        });

    });
</script>
<!-- footer menu -->