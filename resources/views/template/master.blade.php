<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <title>ប្រព័ន្ទកក់បន្ទប់ប្រជុំ</title>
    <style>
        .cardd {
            width: 30px;
            height: auto;
        }

        p {
            font-size: 1em;
            line-height: 1.3em;
            margin: 0;
        }

        .oneLine {
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }

        .modernWay {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .meetingLevelShow {
            cursor: pointer;
        }

        .showOfficeAndDepartment {
            display: none;
        }

        .showOfficeAndDepartment .show {
            display: block;
        }

        .font-khmer2 {
            font-family: khmer mef2;
        }

        .font-khmer1 {
            font-family: khmer mef1;
        }
    </style>
</head>

<body>

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img src="{{ asset('assets/images/loading.gif') }}" alt="joblist"></div>
            </div>
        </div>
    </div>

    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo">
                        @if (Session::get('is_user_logged_in') || Session::get('is_admin_logged_in'))
                            <img alt="iauoffsa" src="{{ asset('assets/images/logo.png') }}">
                        @else
                            <a class="d-flex" href="/admins">
                                <img alt="iauoffsa" src="{{ asset('assets/images/logo.png') }}">
                            </a>
                        @endif
                    </div>
                </div>

                <div class="header-nav">
                    {{-- @if (Session::get('is_admin_logged_in'))
                        <nav class="nav-main-menu">
                            <ul class="main-menu">
                                <li class="has-children"><a href="/booking">ការកក់បន្ទប់ប្រជុំ</a></li>
                                <li class="has-children"><a href="/users">មន្រ្តី</a></li>
                            </ul>
                        </nav>
                    @endif
                    @if (Session::get('is_user_logged_in'))
                        <nav class="nav-main-menu">
                            <ul class="main-menu">
                                <li class="has-children"><a href="/calendar">ការកក់បន្ទប់ប្រជុំ</a></li>
                                <li class="has-children"><a href="/booking/history">ប្រវត្តិកក់បន្ទប់ប្រជុំ</a></li>
                            </ul>
                        </nav>
                    @endif --}}
                    @yield('message')
                </div>

                <div class="burger-icon burger-icon-white">
                    {{-- <i class="fas fa-bars fs-2"></i> --}}
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>

                <div class="header-right">
                    @if (Session::get('is_user_logged_in'))
                        <a class="btn btn-default bg-danger btn-shadow ml-40 hover-up" href="/logout">ចាកចេញ</a>
                    @elseif (Session::get('is_admin_logged_in'))
                        <a class="btn btn-default bg-danger btn-shadow ml-40 hover-up" href="/admins/logout">ចាកចេញ</a>
                    @endif
                    @yield('header-right')
                </div>

            </div>
        </div>
    </header>

    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-search mobile-header-border mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start-->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                @if (Session::get('is_user_logged_in'))
                                    <li class="has-children"><a href="/logout">ចាកចេញ</a></li>
                                @elseif (Session::get('is_admin_logged_in'))
                                    <li class="has-children"><a href="/admins/logout">ចាកចេញ</a></li>
                                @else
                                    <li class="has-children"><a class=""
                                            href="/guests">ស្នើរសុំកក់បន្ទប់ប្រជុំ</a></li>
                                    <li class="has-children"><a
                                            href="https://t.me/kakadaa_07">ទំនាក់ទំនងមន្រ្តីទទួលបន្ទុក</a></li>
                                @endif

                                {{-- @if (Session::get('is_admin_logged_in'))
                                    <li class="has-children"><a href="/booking">ការកក់បន្ទប់ប្រជុំ</a>
                                    </li>
                                    <li class="has-children"><a href="/users">មន្រ្តី</a></li>
                                @endif
                                @if (Session::get('is_user_logged_in'))
                                    <li class="has-children"><a href="/calendar">ការកក់បន្ទប់ប្រជុំ</a>
                                    </li>
                                    <li class="has-children"><a href="/booking/history">ប្រវត្តិកក់បន្ទប់ប្រជុំ</a></li>
                                @endif --}}
                            </ul>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="main" style="min-height: 75vh; height:auto">

        <section class="section-box mt-100 mb-100">
            <div class="container">
                <div class="d-sm-none mt-100"></div>
                @yield('contents')

            </div>
        </section>
        <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    </main>

    <footer class="footer pt-30">
        <div class="container">
            <div class="row justify-content-between">
                <div class="footer-col-1 col-md-3 col-sm-12">
                    <a class="footer_logo d-flex" href="index.html">
                        <img alt="iauoffsa" src="{{ asset('assets/images/footerlogo.png') }}">
                    </a>
                </div>
                <div class="footer-col-1 col-md-3 col-sm-12 d-flex justify-content-center align-items-center">
                    <div class="footer-social">
                        <a class="icon-socials icon-facebook"
                            href="https://www.facebook.com/profile.php?id=100069646752356"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="icon-socials icon-youtube"
                            href="https://www.youtube.com/channel/UCzZH_Yx9_deWTDWT3XLjwZQ"><i
                                class="fab fa-youtube"></i></a>
                        <a class="icon-socials icon-internet" href="https://iauoffsa.gov.kh"><i
                                class="fab fa-internet-explorer"></i></a>
                        <a class="icon-socials icon-internet" href="https://t.me/iauoffsa"><i
                                class="fab fa-telegram"></i></a>
                    </div>
                </div>
                <div class="footer-col-1 col-md-3 col-sm-12">
                    <div class="mt-20 mb-20 font-xs color-text-paragraph-2">
                        អាសយដ្ឋាន ៖​ អគាលេខ ១៦៨F (ជាន់ទី៩) ផ្លូវ ៥៩៨
                        សង្កាត់ច្រាំងចំរេះ១ ខណ្ឌឬស្សីកែវ រាជធានីភ្នំពេញ</div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-xs color-text-paragraph">Copyright &copy; 2024 IAUOFFSA
                            all right
                            reserved</span>
                    </div>
                    <div class="col-md-6 text-md-end text-start">
                        <div class="footer-social">
                            <a class="font-xs color-text-paragraph" href="#">Privacy Policy</a>
                            <a class="font-xs color-text-paragraph mr-30 ml-30" href="#">Terms &amp;
                                Conditions</a>
                            <a class="font-xs color-text-paragraph" href="#">Security</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/Font-Awesome.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/main.js?v=4.1') }}"></script> --}}
    <script>
        $('#success-alert, #error-alert').fadeIn('slow');
        setTimeout(function() {
            $('#success-alert, #error-alert').fadeOut('slow');
        }, 5000);

        // var meetingLevelShow = document.querySelectorAll('.meetingLevelShow');
        // var showOfficeAndDepartment = document.querySelectorAll('.showOfficeAndDepartment');
        // for (let i = 0; i < meetingLevelShow.length; i++) {
        //     meetingLevelShow[i].addEventListener('mouseenter', function() {
        //         showOfficeAndDepartment[i].className = "d-block";
        //     });

        //     // Add leave event listener to hide the dropdown on mouse leave
        //     meetingLevelShow[i].addEventListener('mouseleave', function() {
        //         showOfficeAndDepartment[i].className = "d-none";
        //     });
        // }

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

</body>

</html>
