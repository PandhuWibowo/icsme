<?php include("base.php"); ?>
<!doctype html>
<html lang="en">
<head>

	<base href="<?php echo $base; ?>" />

	<meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="viewport" content ="width=device-width,initial-scale=1,user-scalable=yes" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="favicon.ico" />

    <title>ICSME 2018</title>

    <!-- Plugins CSS -->
    <link href="assets/css/fonts.css" rel="stylesheet" />
    <link href="assets/plugins/icsme-icon/css/icsme-icon.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap-4.1.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/plugins/diamond-layout/diamonds.min.css" rel="stylesheet" />
    <link href="assets/plugins/swiper/css/swiper.min.css" rel="stylesheet" />
    <link href="assets/plugins/material-input/material-input.min.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/datetimepicker.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="assets/css/icsme.min.css" rel="stylesheet" />

    <!-- jQuery Library -->
    <script src="assets/plugins/jquery/jquery-3.3.1.min.js"></script>

</head>
<body>

	<?php include($content); ?>
	
	<!-- JavaScript plugins
    ================================================== -->
    <script src="assets/plugins/popper/popper.min.js"></script>
    <script src="assets/plugins/bootstrap-4.1.1/js/bootstrap.min.js"></script>
    <script src="assets/plugins/diamond-layout/jquery.diamonds.js"></script>
    <script src="assets/plugins/swiper/js/swiper.min.js"></script>
    <script src="assets/plugins/datetimepicker/moment.min.js"></script>
    <script src="assets/plugins/datetimepicker/datetimepicker.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var widthScreen = $(window).width();

            if(widthScreen >= 1600) {
                var sizeDiamondNumber = 450;
            } else if(widthScreen >= 1400) {
                var sizeDiamondNumber = 360;
            } else {
                var sizeDiamondNumber = 300;
            }

            $(".list-diamond-number").diamonds({
                size : sizeDiamondNumber,
                gap :  20,
                hideIncompleteRow : false, // default: false
                autoRedraw : true, // default: true
                itemSelector : ".item"
            });

            var speakerList = new Swiper('.speaker-list', {
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                },
            });

            if(widthScreen >= 1600) {
                var sizeFotoSpeaker = 300;
            } else if(widthScreen >= 1400) {
                var sizeFotoSpeaker = 230;
            } else {
                var sizeFotoSpeaker = 190;
            }

            var countSpeakerList = $('.speaker-list .itembox').length;
            var itemSpeaker;
            for (itemSpeaker = 0; itemSpeaker < countSpeakerList; itemSpeaker++) {
                $(".list-diamond-speaker-" + itemSpeaker).diamonds({
                    size : sizeFotoSpeaker,
                    gap :  10,
                    hideIncompleteRow : false,
                    autoRedraw : true,
                    itemSelector : ".item"
                });
            }

            $('.scrollto').on('click', function(e){
                e.preventDefault();
                var target = $(this).attr('href');
                if(target == '#about'){
                    var positionTo = $(target).offset().top - 50;
                } else {
                    var positionTo = $(target).offset().top;
                }

                $('html, body').animate({
                    scrollTop: positionTo
                }, 500);

                $('.navbar .navbar-collapse').removeClass('show');
            });

            $('[data-toggle="tooltip"]').tooltip();

            $('.list-three-item .btn-more').on('click', function(){
                $('.list-three-item .boxtext .text').hide();
                $(this).parent().find('.text').show();
            });

            $('#toTop').on('click', function(){
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            });
        });

        $(window).scroll(function(){
            var scrollPos = $(window).scrollTop();
            if(scrollPos >= 300){
                $('.menu-icon-top').addClass('ontop');
                $('#toTop').addClass('show');
            } else {
                $('.menu-icon-top').removeClass('ontop');
                $('#toTop').removeClass('show');
            }
        });
    </script>

</body>
</html>