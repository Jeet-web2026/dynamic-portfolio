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

        // $('.invalid-notification').hide();
    });
</script>
<!-- footer menu -->