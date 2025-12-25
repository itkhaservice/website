<!-- CSS files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/meanmenu.css" media="all">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- End CSS files -->
    <style>
        body { padding-top: 100px; }
        .main-menu-3 ul li a { color: #282f41 !important; font-weight: 500; text-transform: uppercase; font-size: 14px; }
        .main-menu-3 ul li a i { color: #282f41 !important; }
        .main-menu-3 ul li.active a, .main-menu-3 ul li a:hover { color: #09bc8a !important; }
        
        /* Submenu */
        .main-menu li .submenu { background: #ffffff; border-top: 3px solid #09bc8a; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .main-menu li .submenu li a { color: #282f41 !important; text-transform: none; }
        .main-menu li .submenu li a:hover { background: #f8f9fa; color: #09bc8a !important; }

        @media (max-width: 991px) {
            body { padding-top: 70px; }
            .mean-container .mean-nav { background: #ffffff !important; }
            .mean-container .mean-nav ul li a { color: #282f41 !important; }
        }

        /* White Footer Theme with 80px Padding */
        .footer-area { background: #ffffff !important; color: #000000 !important; border-top: 1px solid #eee; padding: 80px 0; }
        .contact-area { background: #f8f9fa !important; border: 1px solid #eee !important; border-radius: 10px; }
        .contact-options ul li { color: #000000 !important; }
        .footer-links h5 { color: #09bc8a !important; font-weight: 700; margin-bottom: 25px; }
        .links-list li a { color: #000000 !important; }
        .links-list li a:hover { color: #09bc8a !important; }
        .copyright { background: #f8f9fa !important; border-top: 1px solid #eee; color: #000000 !important; }
        .copyright p { color: #000000 !important; }

        /* Text truncation helper */
        .text-split-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5em;
            max-height: 4.5em; /* 1.5em * 3 lines */
            word-break: break-word;
        }
        .text-split-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.5em;
            max-height: 3em;
            word-break: break-word;
        }

        /* Social Icons - Brand Colors Default */
        .social-icons li { display: inline-block; margin-right: 8px; vertical-align: middle; }
        .social-icons li a { 
            width: 38px; height: 38px; display: flex !important; align-items: center; 
            justify-content: center; border-radius: 50%; transition: 0.3s; 
            color: #ffffff !important; line-height: 0 !important;
        }
        .social-icons li a i { font-size: 16px; color: #ffffff !important; margin: 0 !important; line-height: 1 !important; }
        .social-icons li a svg { display: block; margin: 0; }
        
        /* Màu nền thương hiệu mặc định */
        .social-icons li a[href*="facebook"] { background: #3b5998; }
        .social-icons li a[href*="youtube"] { background: #ff0000; }
        .social-icons li a[href*="tiktok"] { background: #000000 !important; }
        .social-icons li a[href*="tiktok"] i { color: #ffffff !important; opacity: 1 !important; display: block !important; }
        .social-icons li a[href*="instagram"] { background: #e1306c; }
        
        /* Đảm bảo icon bên trong luôn trắng và nổi bật */
        .social-icons li a i { color: #ffffff !important; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); }

        .social-icons li a:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.3); filter: brightness(1.1); }
    </style>