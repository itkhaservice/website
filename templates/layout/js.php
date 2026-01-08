<!-- JS Files -->
    <script src="js/modernizr-3.5.0.min.js"></script>
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/lightslider.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/main.js?v=<?=time()?>"></script>
    <!-- JS Files end -->
    
    <?php
    // DEBUG: Kiểm tra giá trị
    // var_dump($row_setting['facebook_page_id']); 
    ?>

    <?php if(!empty($row_setting['facebook_page_id'])) { ?>
    <!-- ✅ FULL FACEBOOK MESSENGER CUSTOMER CHAT (FINAL) -->
    <div id="fb-root"></div>
    <div id="fb-customer-chat" class="fb-customerchat"></div>

    <script>
        // ==============================
        // CONFIG
        // ==============================
        const FB_PAGE_ID = "<?=$row_setting['facebook_page_id']?>"; // Get from Admin Config

        // ==============================
        // SET ATTRIBUTE FOR CHATBOX
        // ==============================
        const chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", FB_PAGE_ID);
        chatbox.setAttribute("attribution", "biz_inbox");

        // ==============================
        // FACEBOOK SDK INIT
        // ==============================
        window.fbAsyncInit = function () {
            FB.init({
                xfbml: true,
                version: 'v18.0'
            });
        };

        // ==============================
        // LOAD FACEBOOK SDK ASYNC
        // ==============================
        (function (d, s, id) {
            let js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js";
            js.async = true;
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <style>
        /* ==============================
           FACEBOOK MESSENGER POSITION
           Force icon & chatbox to LEFT
           ============================== */
        #fb-root .fb_dialog,
        #fb-root .fb-customerchat iframe {
            left: 80px !important;   /* Desktop left position */
            right: auto !important;
            bottom: 51px !important; /* Align with Scroll Top */
            z-index: 9999999 !important;
        }

        /* ==============================
           MOBILE RESPONSIVE
           ============================== */
        @media (max-width: 768px) {
            #fb-root .fb_dialog,
            #fb-root .fb-customerchat iframe {
                left: 20px !important;
                bottom: 80px !important;
            }
        }
    </style>
    <?php } ?>