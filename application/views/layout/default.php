<!DOCTYPE html>
<!-- Template by freewebsitetemplates.com -->
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo isset($title) ? $title : ''; ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>webroot/css/style.css" media="all" />
        <link type="text/css" href="<?php echo base_url() ?>/webroot/css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>webroot/css/global.css"/>
        <script type="text/javascript" src="<?php echo base_url() ?>webroot/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>webroot/js/jquery-ui-1.8.21.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>webroot/js/validate.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>webroot/js/slides.min.jquery.js" type="text/javascript"></script>
        <style type="text/css">
            .pagination li a{
                background-image:url(<?php echo base_url() ?>webroot/img/pagination.png);
            }
        </style>
        <script type="text/javascript">
            $(function(){
                $('#slides').slides({
                    preload: true,
                    preloadImage: '<?php echo base_url() ?>webroot/img/loading.gif',
                    play: 5000,
                    pause: 2500,
                    hoverPause: true,
                    animationStart: function(current){
                        $('.caption').animate({
                            bottom:-35
                        },100);
                    },
                    animationComplete: function(current){
                        $('.caption').animate({
                            bottom:0
                        },200);
                    },
                    slidesLoaded: function() {
                        $('.caption').animate({
                            bottom:0
                        },200);
                    }
                });
                
                $('#datepicker').datepicker({
                    dateFormat: 'yy-mm-dd',
                    inline: true,
                    changeMonth: true,
                    changeYear: true
                });
                
                $(".tabs").tabs();
            });
        </script>
    </head>
    <body>
        <div id="header">
            <?php
            if ($this->session->userdata('login')) {
                $this->load->view('element/navigation/member_menu');
            } else {
                $this->load->view('element/navigation/guest_menu');
            }
            ?>
            <div class="logo">
                <a href="#"><img src="<?php echo base_url() ?>webroot/images/logo.png" alt="" /></a>
            </div>
        </div>
        <div id="body">
            <?php $this->load->view($content); ?>
        </div>
        <div id="footer">
            <div>
                <p>Copyright &copy; 2012. All rights reserved.</p>
            </div>
        </div>
    </body>
</html>