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
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>
    <div id="fb-customer-chat" class="fb-customerchat"></div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "<?=$row_setting['facebook_page_id']?>");
      chatbox.setAttribute("attribution", "biz_inbox");

      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v18.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    
    <style>
        /* Ép icon Messenger sang trái, đối xứng với nút Scroll Top (right: 80px, bottom: 51px) */
        #fb-root .fb_dialog {
            left: 80px !important;
            right: auto !important;
            bottom: 51px !important;
            z-index: 9999999 !important;
        }
        /* Xử lý khung chat khi mở ra */
        #fb-root .fb_iframe_widget iframe {
            left: 80px !important;
            right: auto !important;
            bottom: 51px !important;
            z-index: 9999999 !important;
        }
        /* Mobile: Giữ khoảng cách nhỏ hơn */
        @media (max-width: 768px) {
            #fb-root .fb_dialog {
                left: 20px !important;
                bottom: 80px !important;
            }
        }
    </style>
    <?php } ?>