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
        .main-menu-3 ul li.active a, .main-menu-3 ul li a:hover { color: #108042 !important; }
        
        /* Submenu */
        .main-menu li .submenu { background: #ffffff; border-top: 3px solid #108042; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .main-menu li .submenu li a { color: #282f41 !important; text-transform: none; }
        .main-menu li .submenu li a:hover { background: #f8f9fa; color: #108042 !important; }

        @media (max-width: 991px) {
            body { padding-top: 70px; }
        }

        /* White Footer Theme */
        .footer-area { background: #ffffff !important; color: #000000 !important; border-top: 1px solid #eee; padding: 80px 0; }
        .contact-area { background: #f8f9fa !important; border: 1px solid #eee !important; border-radius: 10px; }
        .footer-links h5 { color: #108042 !important; font-weight: 700; margin-bottom: 25px; }
        .links-list li a { color: #000000 !important; }
        .links-list li a:hover { color: #108042 !important; }
        .copyright { background: #f8f9fa !important; border-top: 1px solid #eee; color: #000000 !important; }

        /* Text truncation */
        .text-split-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; line-height: 1.5em; max-height: 4.5em; word-break: break-word; }
        .text-split-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; line-height: 1.5em; max-height: 3em; word-break: break-word; }

        /* Social Icons */
        .social-icons li { display: inline-block; margin-right: 8px; vertical-align: middle; }
        .social-icons li a { width: 38px; height: 38px; display: flex !important; align-items: center; justify-content: center; border-radius: 50%; transition: 0.3s; color: #ffffff !important; }
        .social-icons li a[href*="facebook"] { background: #3b5998; }
        .social-icons li a[href*="youtube"] { background: #ff0000; }
        .social-icons li a[href*="tiktok"] { background: #000000 !important; }
        .social-icons li a:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.3); }

        /* --- GLOBAL RESPONSIVE CONTENT --- */
        .content-main { font-size: 16px; line-height: 1.8; color: #333; text-align: justify; }
        .content-main p { text-align: justify; }
        .content-main img { max-width: 100% !important; height: auto !important; display: block; margin: 20px auto; border-radius: 8px; }
        .content-main table { width: 100% !important; border-collapse: collapse; margin: 20px 0; }
        .content-main table td, .content-main table th { padding: 12px; border: 1px solid #eee; }
        
        .img-100 { width: 100% !important; height: auto !important; }
        .img-75 { width: 75% !important; height: auto !important; margin: 10px auto; display: block; }
        .img-50 { width: 50% !important; height: auto !important; margin: 10px auto; display: block; }
        .img-25 { width: 25% !important; height: auto !important; margin: 10px auto; display: block; }

        @media (max-width: 767px) {
            .content-main table { display: block; overflow-x: auto; }
            .content-main p, .content-main div { text-align: justify !important; }
            .content-main img { width: 100% !important; border-radius: 4px; }
            .img-75, .img-50, .img-25 { width: 100% !important; }
            .fancy-head h1 { font-size: 24px !important; }
        }

        /* Back to top button */
        .scroll-btn {
            position: fixed; bottom: 30px; right: 30px; width: 45px; height: 45px;
            background: #108042; color: #fff !important; border-radius: 50%;
            display: flex !important; align-items: center; justify-content: center;
            z-index: 9999; transition: 0.3s; visibility: hidden; opacity: 0;
            box-shadow: 0 10px 20px rgba(16, 128, 66, 0.3); border: none;
        }
        .scroll-btn.opacity-10 { visibility: visible; opacity: 1 !important; }
        .scroll-btn:hover { background: #0d6a36; transform: translateY(-5px); }

        /* Unified Pagination Footer */
        .pagination-footer { 
            background: #fff !important; 
            padding: 20px !important; 
            border-radius: 15px !important; 
            box-shadow: 0 5px 25px rgba(0,0,0,0.05) !important;
            border: 1px solid #f1f5f9 !important;
            margin-top: 30px;
        }
        .pagination-footer .text-muted { color: #64748b !important; font-size: 13px; font-weight: 500; }
        .pagination-footer strong { color: #1e293b !important; }

        .pagination { margin: 0 !important; }
        .pagination .page-item .page-link { 
            width: 40px !important; 
            height: 40px !important; 
            border-radius: 50% !important; 
            margin: 0 4px !important; 
            display: flex !important; 
            align-items: center !important; 
            justify-content: center !important; 
            border: none !important; 
            background: #f1f5f9 !important; 
            color: #475569 !important; 
            font-weight: 700 !important; 
            font-size: 14px !important;
            transition: all 0.3s ease !important;
        }
        .pagination .page-item.active .page-link { 
            background: #108042 !important; 
            color: #fff !important; 
            box-shadow: 0 4px 12px rgba(16, 128, 66, 0.25) !important; 
        }
        .pagination .page-link:hover { 
            background: #108042 !important; 
            color: #fff !important; 
            transform: translateY(-3px) !important; 
        }
        
        .per-page-select { 
            width: 85px !important;
            height: 38px !important; 
            border-radius: 20px !important; 
            padding: 0 15px !important; 
            background: #f1f5f9 !important; 
            border: 1px solid #e2e8f0 !important; 
            cursor: pointer !important;
            font-size: 13px !important; 
            font-weight: 700 !important; 
            color: #1e293b !important;
            appearance: auto !important;
        }
        
        @media (max-width: 767px) {
            .pagination-footer { flex-direction: column !important; gap: 20px; }
            .pagination-footer > div { order: 2; }
            .pagination-footer nav { order: 1; }
        }
    </style>