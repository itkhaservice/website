    <!-- immer banner start -->
    <section class="inner-banner pt-80 pb-95" style="background-image: url('<?=$inner_banner_img?>');" data-overlay="7">
        <div class="container">
            <div class="row z-5 align-items-center">
                <div class="col-md-8 text-center text-md-left">
                    <h1 class="f-700 green">Liên hệ</h1>
                    <span class="green-line bg-green d-none d-md-inline-block"></span>
                </div>
                <div class="col-md-4 text-center text-md-right">
                    <nav aria-label="breadcrumb" class="banner-breadcump d-none">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home fs-12 mr-5"></i>Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact us area start -->
    <section class="contact-options pt-95 pb-95">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-left text-md-center relative z-5 mb-40 ">
                        <h5 class="line-head mb-15 ">
                          <span class="line before d-none d-md-block"></span>
                            Liên hệ với chúng tôi
                          <span class="line after"></span>
                        </h5>
                        <h1 class="">Thông tin liên hệ</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex mb-sm-30">
                        <div class="icon-box">
                            <div class="icon-box-icon">
                                <i class="fas fa-phone-volume green"></i>
                            </div>
                        </div>
                        <div class="icon-box-content">
                            <h5 class="f-700 fs-19 mb-10">Phone & Hotline</h5>
                            <p class="mb-0">Tel: <?=$row_setting['dienthoai']?></p>
                            <p class="mb-0">Hotline: <?=$row_setting['hotline']?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="d-flex mb-sm-30">
                        <div class="icon-box">
                            <div class="icon-box-icon">
                                <i class="far fa-envelope green"></i>
                            </div>
                        </div>
                        <div class="icon-box-content">
                            <h5 class="f-700 fs-19 mb-10">Email</h5>
                            <p class="mb-0">Email: <?=$row_setting['email']?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="d-flex  mt-md-30">
                        <div class="icon-box">
                            <div class="icon-box-icon">
                                <i class="fas fa-map-marker-alt green"></i>
                            </div>
                        </div>
                        <div class="icon-box-content">
                            <h5 class="f-700 fs-19 mb-10">Address</h5>
                            <p><?=$row_setting['diachi_vi']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact us area end -->

    <!-- Contact form area end -->
    <section class="contact-form bg-light-white pt-100 pb-100" style="background-image: url('img/bg/bg-abt.jpg');" data-overlay="7">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="fancy-head text-center relative z-5 mb-40">
                        <h5 class="line-head mb-15 ">
                            <span class="line before "></span>
                            Gửi tin nhắn cho chúng tôi
                            <span class="line after"></span>
                        </h5>
                        <h1 class="mb-5">Liên hệ với chúng tôi</h1>
                        <p class="small-p">Vui lòng điền thông tin theo form dưới đây. Chúng tôi sẽ liên hệ lại với bạn sớm nhất có thể</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form id="frm-contact" onsubmit="return false;" class="relative z-5 mt-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group relative mb-30 mb-sm-20">
                                    <input type="text" class="form-control input-lg input-white shadow-5" id="contact_name" placeholder="Họ & Tên" required>
                                    <i class="far fa-user transform-v-center"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group relative mb-30 mb-sm-20">
                                    <input type="email" class="form-control input-lg input-white shadow-5" id="contact_email" placeholder="Email" required>
                                    <i class="far fa-envelope transform-v-center"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group relative mb-30 mb-sm-20">
                                    <input type="text" class="form-control input-lg input-white shadow-5" id="contact_phone" placeholder="Số điện thoại">
                                    <i class="fas fa-mobile-alt transform-v-center"></i>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group relative mb-30 mb-sm-20">
                                    <textarea class="form-control input-white shadow-5" id="contact_message" cols="30" rows="7" placeholder="Lời nhắn"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center mt-30">
                                <button type="button" id="btn-contact-submit" class="btn btn-square blob-small">GỬI<i class="fas fa-long-arrow-alt-right ml-20"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom Alert Modal -->
    <div id="custom-alert-overlay" class="custom-alert-overlay">
        <div class="custom-alert-box">
            <div class="alert-icon"><i class="fas fa-exclamation-circle"></i></div>
            <h4 id="custom-alert-title">Thông báo</h4>
            <p id="custom-alert-message">Nội dung thông báo</p>
            <button id="custom-alert-close" class="alert-btn">Đóng</button>
        </div>
    </div>

    <style>
        /* CSS cho Custom Alert */
        .custom-alert-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.6); z-index: 99999;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; visibility: hidden; transition: all 0.3s;
        }
        .custom-alert-overlay.active { opacity: 1; visibility: visible; }
        .custom-alert-box {
            background: #fff; width: 90%; max-width: 400px;
            border-radius: 8px; padding: 30px; text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transform: translateY(-20px); transition: all 0.3s;
        }
        .custom-alert-overlay.active .custom-alert-box { transform: translateY(0); }
        .alert-icon { font-size: 50px; margin-bottom: 20px; color: #ffc107; }
        .custom-alert-box h4 { margin-bottom: 10px; font-weight: 700; color: #333; }
        .custom-alert-box p { margin-bottom: 25px; color: #666; font-size: 15px; }
        .alert-btn {
            background: #108042; color: #fff; border: none;
            padding: 10px 35px; border-radius: 5px; cursor: pointer;
            transition: background 0.3s; font-weight: 600; text-transform: uppercase;
        }
        .alert-btn:hover { background: #0a5c2e; }
        
        /* Fix input padding */
        #frm-contact .input-white { padding-right: 50px !important; }
    </style>

    <script>
        window.addEventListener('load', function() {
            // Hàm hiển thị thông báo Custom
            function showCustomAlert(message) {
                $('#custom-alert-message').text(message);
                $('#custom-alert-overlay').addClass('active');
            }

            // Đóng thông báo
            $('#custom-alert-close, #custom-alert-overlay').click(function(e){
                if(e.target === this) {
                    $('#custom-alert-overlay').removeClass('active');
                }
            });

            $('#btn-contact-submit').click(function(){
                var name = $('#contact_name').val();
                var email = $('#contact_email').val();
                var phone = $('#contact_phone').val();
                var message = $('#contact_message').val();

                if(name == '' || phone == '' || email == '' || message == ''){
                    showCustomAlert('Vui lòng nhập đầy đủ thông tin: Họ tên, Email, Số điện thoại và Lời nhắn!');
                    return false;
                }

                var btn = $(this);
                var originalText = btn.html();
                btn.text('Đang gửi...');
                btn.prop('disabled', true);

                $.ajax({
                    url: 'ajax/ajax_callback.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {name: name, phone: phone, email: email, message: message},
                    success: function(res){
                        if(res.status == 'success'){
                            window.location.href = 'thank-you.html';
                        } else {
                            showCustomAlert(res.message);
                            btn.html(originalText);
                            btn.prop('disabled', false);
                        }
                    },
                    error: function(xhr, status, error){
                        showCustomAlert('Có lỗi xảy ra khi kết nối server.');
                        btn.html(originalText);
                        btn.prop('disabled', false);
                    }
                });
            });
        });
    </script>
    <!-- Contact form area end -->

    <!-- cta area start -->
    <section class="cta pt-50 pb-50" style="background-image: url('img/bg/bg_cta.jpg');" data-overlay="9">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-5 mb-md-20 text-center text-lg-left">
                    <h3 class="z-5 white f-700 lh-18 wow fadeInLeft">
                        Bạn đang có nhu cầu về dịch vụ nào?
                        <span class="green italic">Liên hệ ngay</span>
                    </h3>
                </div>
                <div class="col-xl-8 col-lg-7 text-center text-lg-right z-5">
                    <a href="mailto:<?=$row_setting['email']?>" class="btn btn-square-white mr-20 mr-xs-00 d-block d-sm-inline-block mb-xs-15 wow fadeInUp">
                        <i class="fas fa-envelope mr-15"></i><?=$row_setting['email']?>
                    </a>
                    <a href="tel:<?=$row_setting['hotline']?>" class="btn btn-square-green d-block d-sm-inline-block blob-small wow fadeInUp">
                        <i class="fas fa-phone mr-15"></i><?=$row_setting['hotline']?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta area end -->