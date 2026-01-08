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

    <?php if(!empty($row_setting['facebook_page_id'])) { ?>
    <!-- Nút Gọi điện thoại (Trên nút Chat) -->
    <a href="tel:<?=str_replace([' ','.','-'], '', $row_setting['hotline'])?>" class="mess-fixed-btn phone-fixed-btn shadow-lg">
        <i class="fas fa-phone-alt"></i>
        <span class="mess-text">Gọi ngay: <?=$row_setting['hotline']?></span>
    </a>

    <!-- Nút Chat Messenger Thủ Công (Thiết kế đối xứng On-top) -->
    <a href="https://m.me/<?=$row_setting['facebook_page_id']?>" target="_blank" class="mess-fixed-btn shadow-lg">
        <i class="fab fa-facebook-messenger"></i>
        <span class="mess-text">Chat Messenger</span>
    </a>

    <style>
        .mess-fixed-btn {
            position: fixed;
            left: 80px;
            bottom: 51px;
            background: #108042;
            color: #fff !important;
            width: 50px;
            height: 50px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: flex-start; /* Để icon luôn nằm cố định bên trái */
            z-index: 999999;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            white-space: nowrap;
            text-decoration: none !important;
            /* Animation tỏa năng lượng */
            animation: pulse-green 2s infinite;
        }
        .phone-fixed-btn {
            bottom: 115px; /* Cách nút Chat khoảng 64px */
            background: #dc3545; /* Màu đỏ cho nút gọi */
            animation: pulse-red 2s infinite;
        }
        
        /* Keyframes cho hiệu ứng tỏa năng lượng nhè nhẹ */
        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(16, 128, 66, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(16, 128, 66, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 128, 66, 0); }
        }
        @keyframes pulse-red {
            0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(220, 53, 69, 0); }
            100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
        }

        .phone-fixed-btn:hover {
            background: #c82333;
        }
        .mess-fixed-btn i {
            min-width: 50px; /* Bằng chiều rộng nút ban đầu */
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }
        .mess-text {
            opacity: 0;
            font-weight: 600;
            font-size: 14px;
            transition: opacity 0.3s ease;
            padding-right: 20px;
        }
        /* Hiệu ứng Hover */
        .mess-fixed-btn:hover {
            width: 190px;
            background: #0d6a36;
            box-shadow: 0 8px 25px rgba(16, 128, 66, 0.3);
        }
        .phone-fixed-btn:hover {
            width: 230px; /* Tăng chiều rộng để hiện số điện thoại */
            background: #c82333;
            box-shadow: 0 8px 25px rgba(220, 53, 69, 0.3);
        }
        .mess-fixed-btn:hover .mess-text {
            opacity: 1;
        }
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .mess-fixed-btn {
                left: 20px;
                bottom: 20px;
            }
            .phone-fixed-btn {
                left: 20px;
                bottom: 80px;
            }
            .mess-fixed-btn:hover {
                width: 50px; /* Tắt mở rộng trên mobile để tránh đè giao diện */
            }
            .mess-fixed-btn:hover .mess-text {
                display: none;
            }
        }
    </style>

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