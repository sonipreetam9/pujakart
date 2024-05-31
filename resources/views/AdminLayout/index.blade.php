   <!-- start: page body -->
   <!doctype html>
    <html lang="en" dir="ltr">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Pujakart - Admin Panel</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="DC.title" content="Pujakart">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{url('assets/images/pfav.png')}}">
        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="{{url('assets/css/core/libs.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendor/sheperd/dist/css/sheperd.css')}}">
        <!-- Flatpickr css -->
        <link rel="stylesheet" href="{{url('assets/vendor/flatpickr/dist/flatpickr.min.css')}}">
         <!-- qompac-ui Design System Css -->
        <link rel="stylesheet" href="{{url('assets/css/qompac-ui.minf700.css?v=1.0.1')}}">
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{url('assets/css/custom.minf700.css?v=1.0.1')}}">
        <!-- Dark Css -->
        <link rel="stylesheet" href="{{url('assets/css/dark.minf700.css?v=1.0.1')}}">
        <!-- Customizer Css -->
        <link rel="stylesheet" href="{{url('assets/css/customizer.minf700.css?v=1.0.1')}}" >
        <!-- RTL Css -->
        <link rel="stylesheet" href="{{url('assets/css/rtl.minf700.css?v=1.0.1')}}">
        <link rel="stylesheet" href="{{url('assets/vendor/swiperSlider/swiper-bundle.min.css')}}">
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    </head>
    <style>
        @media (max-width: 1199.98px){
            .iq-navbar .navbar-collapse:not(.offcanvas-collapse){
                top:65%;
            }
        }
    </style>
        <body onload="sidebar()">
        <!-- loader Start -->
        <div id="loading">
            <div class="loader simple-loader">
                <div class="loader-body ">
                    <!--https://templates.iqonic.design/product/qompac-ui/html/dist/assets/images/loader.webp-->
                    <img src="{{url('assets/images/pfav.png')}}" style="width:150px;" alt="loader" class="image-loader img-fluid ">
                </div>
            </div>
        </div>
        <!-- loader END -->
        <!--sidebar sidebar-base sidebar-white sidebar-default navs-rounded-all-->
        
        <aside class="sidebar sidebar-base sidebar-white sidebar-default navs-rounded-all sidebar-mini " id="first-tour" data-toggle="mini-sidebar" data-sidebar="responsive">
            <div class="sidebar-header d-flex align-items-center justify-content-start">
                <a href="{{url('dashboard')}}" class="navbar-brand">
                    <!--Logo start-->
                    <div class="logo-main">
                        <div class="logo-normal">
                            <center><img src="{{url('assets/images/pujakart.jpeg')}}" style="width:50%;" alt="Pujakart"></center>
                        </div>
                        <div class="logo-mini">
                            <img src="{{url('assets/images/pujakart.jpeg')}}" style="width:100%;" alt="Pujakart">
                        </div>
                    </div>
                    <!--logo End-->
                </a>
                <div class="sidebar-toggle"  id="sidebaricon" data-toggle="sidebar" data-active="true">
                    <i class="icon">
                        <svg class="icon-10" width="10" height="10" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.29853 8C7.11974 8 6.94002 7.93083 6.80335 7.79248L3.53927 4.50446C3.40728 4.37085 3.33333 4.18987 3.33333 4.00036C3.33333 3.81179 3.40728 3.63081 3.53927 3.4972L6.80335 0.207279C7.07762 -0.069408 7.52132 -0.069408 7.79558 0.209174C8.06892 0.487756 8.06798 0.937847 7.79371 1.21453L5.02949 4.00036L7.79371 6.78618C8.06798 7.06286 8.06892 7.51201 7.79558 7.79059C7.65892 7.93083 7.47826 8 7.29853 8Z" fill="white"/>
                            <path d="M3.96552 8C3.78673 8 3.60701 7.93083 3.47034 7.79248L0.206261 4.50446C0.0742745 4.37085 0.000325203 4.18987 0.000325203 4.00036C0.000325203 3.81179 0.0742745 3.63081 0.206261 3.4972L3.47034 0.207279C3.74461 -0.069408 4.18831 -0.069408 4.46258 0.209174C4.73591 0.487756 4.73497 0.937847 4.4607 1.21453L1.69649 4.00036L4.4607 6.78618C4.73497 7.06286 4.73591 7.51201 4.46258 7.79059C4.32591 7.93083 4.14525 8 3.96552 8Z" fill="white"/>
                        </svg>
                    </i>
                </div>
            </div>
            <div class="sidebar-body pt-0 data-scrollbar">
                <div class="sidebar-list">
                    <!-- Sidebar Menu Start -->
                    <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                        <!-- <li class="nav-item static-item">
                            <a class="nav-link static-item disabled text-start" href="#" tabindex="-1">
                                <span class="default-icon">Home</span>
                                <span class="mini-icon" data-bs-toggle="tooltip" title="Home" data-bs-placement="right">-</span>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{url('dashboard')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Dashboard" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                                    </svg>
                                </i>
                                <span class="item-name">Dashboard</span>
                            </a>
                        </li>  
                        <!-- <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="javascript:void()">
                                <i class="icon" data-bs-toggle="tooltip" title="Analytics" data-bs-placement="right">
                                    <svg width="20" height="20" class="icon-20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.1615 3.15833C10.1615 4.639 11.3636 5.83931 12.8464 5.83931C13.0097 5.83851 13.1726 5.82283 13.333 5.79248V11.1076C13.333 13.3437 12.014 14.6666 9.77463 14.6666H4.89725C2.65201 14.6666 1.33301 13.3437 1.33301 11.1076V6.23736C1.33301 4.00126 2.65201 2.66663 4.89725 2.66663H10.2084C10.1769 2.82863 10.1612 2.9933 10.1615 3.15833ZM8.76632 9.93102L10.6716 7.47248V7.46077C10.8347 7.2416 10.793 6.93255 10.5778 6.76419C10.4736 6.68375 10.3411 6.64893 10.2108 6.66768C10.0804 6.68644 9.96324 6.75716 9.88601 6.8637L8.27976 8.93004L6.45074 7.49004C6.34632 7.40869 6.21348 7.37277 6.08221 7.39039C5.95095 7.40802 5.83233 7.47769 5.75313 7.5837L3.78342 10.1242C3.71419 10.2105 3.67691 10.318 3.6779 10.4286C3.66647 10.6521 3.80759 10.855 4.02126 10.9225C4.23493 10.9899 4.46726 10.9048 4.58655 10.7154L6.23384 8.58467L8.06286 10.0188C8.16689 10.1027 8.3006 10.1407 8.43327 10.1242C8.56594 10.1076 8.68617 10.0379 8.76632 9.93102Z" fill="currentColor"/>
                                    <ellipse opacity="0.4" cx="12.9997" cy="2.99998" rx="1.66667" ry="1.66667" fill="currentColor"/>
                                    </svg>
                                </i>
                                <span class="item-name">Customer</span>
                            </a>
                        </li> -->
                        <!-- Users Start -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('users')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Users" data-bs-placement="right">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                </svg>
                                </i>
                                <span class="item-name">Users</span>
                            </a>
                            <!-- <ul class="sub-nav collapse" id="horizontal-user" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{url('buyer')}}">
                                        <i class="icon svg-icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Dual Compact" data-bs-placement="right"> D </i>                   
                                        <span class="item-name"> Buyer </span>
                                    </a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link " href="{{url('seller')}}">
                                      <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                      <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Horizontal" data-bs-placement="right"> H </i>
                                      <span class="item-name"> Seller </span>
                                    </a>
                                </li>
                            </ul> -->
                        </li> 
                        <!-- Users Close -->
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{url('helpEnquiry')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Enquiry" data-bs-placement="right">
                                    <svg class="icon-20" width="20" height="20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M10.1167 0.333496H3.88856C1.61893 0.333496 0.333008 1.61942 0.333008 3.88905V10.1113C0.333008 12.3809 1.61893 13.6668 3.88856 13.6668H10.1167C12.3863 13.6668 13.6663 12.3809 13.6663 10.1113V3.88905C13.6663 1.61942 12.3863 0.333496 10.1167 0.333496Z" fill="currentColor"/>
                                        <path d="M3.91244 5.24609C3.61022 5.24609 3.36133 5.49498 3.36133 5.80313V10.3839C3.36133 10.6861 3.61022 10.935 3.91244 10.935C4.22059 10.935 4.46948 10.6861 4.46948 10.3839V5.80313C4.46948 5.49498 4.22059 5.24609 3.91244 5.24609Z" fill="currentColor"/>
                                        <path d="M7.02279 3.05957C6.72057 3.05957 6.47168 3.30846 6.47168 3.61661V10.384C6.47168 10.6862 6.72057 10.9351 7.02279 10.9351C7.33094 10.9351 7.57983 10.6862 7.57983 10.384V3.61661C7.57983 3.30846 7.33094 3.05957 7.02279 3.05957Z" fill="currentColor"/>
                                        <path d="M10.0932 7.66406C9.78502 7.66406 9.53613 7.91295 9.53613 8.2211V10.3841C9.53613 10.6863 9.78502 10.9352 10.0872 10.9352C10.3954 10.9352 10.6443 10.6863 10.6443 10.3841V8.2211C10.6443 7.91295 10.3954 7.66406 10.0932 7.66406Z" fill="currentColor"/>
                                    </svg>
                                </i>
                                <span class="item-name">Enquiry</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                                <i class="icon" data-bs-toggle="tooltip" title="Product" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M13.6663 6.99992C13.6663 10.6826 10.6817 13.6666 6.99967 13.6666C3.31767 13.6666 0.333008 10.6826 0.333008 6.99992C0.333008 3.31859 3.31767 0.333252 6.99967 0.333252C10.6817 0.333252 13.6663 3.31859 13.6663 6.99992Z" fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.01351 6.20239C3.57284 6.20239 3.21484 6.56039 3.21484 6.99973C3.21484 7.43973 3.57284 7.79839 4.01351 7.79839C4.45418 7.79839 4.81218 7.43973 4.81218 6.99973C4.81218 6.56039 4.45418 6.20239 4.01351 6.20239ZM6.99958 6.20239C6.55891 6.20239 6.20091 6.56039 6.20091 6.99973C6.20091 7.43973 6.55891 7.79839 6.99958 7.79839C7.44024 7.79839 7.79824 7.43973 7.79824 6.99973C7.79824 6.56039 7.44024 6.20239 6.99958 6.20239ZM9.18718 6.99973C9.18718 6.56039 9.54518 6.20239 9.98584 6.20239C10.4265 6.20239 10.7845 6.56039 10.7845 6.99973C10.7845 7.43973 10.4265 7.79839 9.98584 7.79839C9.54518 7.79839 9.18718 7.43973 9.18718 6.99973Z" fill="currentColor"/>
                                    </svg>
                                </i>
                                <span class="item-name">Product</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('product');}}">
                                      <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                      <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="View Product" data-bs-placement="right"> V </i>
                                      <span class="item-name"> View Product </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('product/create_product');}}">
                                        <i class="icon svg-icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Dual Compact" data-bs-placement="right"> A </i>                   
                                        <span class="item-name">Add Product</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('product/product_order');}}">
                                        <i class="icon svg-icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Dual Compact" data-bs-placement="right"> O </i>                   
                                        <span class="item-name">Product Order</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>  
                        <li><hr class="hr-horizontal"></li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Pages</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li> 
                        <!-- Category start -->
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-menu1" role="button" aria-expanded="false" aria-controls="horizontal-menu">
                                <i class="icon" data-bs-toggle="tooltip" title="Category" data-bs-placement="right">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z" fill="currentColor"></path>
                                </svg>
                                </i>
                                <span class="item-name">Categories</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="horizontal-menu1" data-bs-parent="#sidebar-menu">
                                <!--<li class="nav-item">-->
                                <!--    <a class="nav-link" href="{{url('maincategory')}}">-->
                                <!--      <i class="icon">-->
                                <!--            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
                                <!--                <g>-->
                                <!--                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>-->
                                <!--                </g>-->
                                <!--            </svg>-->
                                <!--        </i>-->
                                <!--      <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Horizontal" data-bs-placement="right"> H </i>-->
                                <!--      <span class="item-name">Category </span>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--    <a class="nav-link" href="{{url('category')}}">-->
                                <!--      <i class="icon">-->
                                <!--            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
                                <!--                <g>-->
                                <!--                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>-->
                                <!--                </g>-->
                                <!--            </svg>-->
                                <!--        </i>-->
                                <!--      <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Horizontal" data-bs-placement="right"> H </i>-->
                                <!--      <span class="item-name"> View Category </span>-->
                                <!--    </a>-->
                                <!--</li>-->
                                <li class="nav-item">
                                    <a class="nav-link " href="{{url('category/create_category')}}">
                                        <i class="icon svg-icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Dual Compact" data-bs-placement="right"> D </i>                   
                                        <span class="item-name">Create Category</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('category/view-parent-category')}}">
                                        <i class="icon svg-icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Category" data-bs-placement="right"> C </i>                   
                                        <span class="item-name">Category</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('category/view-child-category')}}">
                                        <i class="icon svg-icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Sub Category" data-bs-placement="right"> s </i>                   
                                        <span class="item-name">Sub Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                        <!-- Category close -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-special" role="button" aria-expanded="false" aria-controls="sidebar-special">
                                <i class="icon" data-bs-toggle="tooltip" title="Pincode" data-bs-placement="right">
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53162 2.93677C10.7165 1.66727 13.402 1.68946 15.5664 2.99489C17.7095 4.32691 19.012 6.70418 18.9998 9.26144C18.95 11.8019 17.5533 14.19 15.8075 16.0361C14.7998 17.1064 13.6726 18.0528 12.4488 18.856C12.3228 18.9289 12.1848 18.9777 12.0415 19C11.9036 18.9941 11.7693 18.9534 11.6508 18.8814C9.78243 17.6746 8.14334 16.134 6.81233 14.334C5.69859 12.8314 5.06584 11.016 5 9.13442C4.99856 6.57225 6.34677 4.20627 8.53162 2.93677ZM9.79416 10.1948C10.1617 11.1008 11.0292 11.6918 11.9916 11.6918C12.6221 11.6964 13.2282 11.4438 13.6748 10.9905C14.1214 10.5371 14.3715 9.92064 14.3692 9.27838C14.3726 8.29804 13.7955 7.41231 12.9073 7.03477C12.0191 6.65723 10.995 6.86235 10.3133 7.55435C9.63159 8.24635 9.42664 9.28872 9.79416 10.1948Z" fill="currentColor"></path>
                                        <ellipse opacity="0.4" cx="12" cy="21" rx="5" ry="1" fill="currentColor"></ellipse>
                                    </svg>
                                </i>
                                <span class="item-name">Pincode</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-special" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('pincode')}}">
                                       <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                       <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="View Pincode" data-bs-placement="right">P</i>
                                       <span class="item-name">View Pincode</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('pincode/create_pincode')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Create Pincode" data-bs-placement="right">C</i>
                                        <span class="item-name">Create Pincode</span>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{url('slider')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Slider" data-bs-placement="right">
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M15.7161 16.2234H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.7161 12.0369H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M11.2521 7.86011H8.49707" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                </i>
                                <span class="item-name">Slider</span>
                            </a>
                        </li> 
                        <!-- <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{url('oembrands')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Crypto" data-bs-placement="right">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2428 4.73756C15.2428 6.95855 17.0459 8.75902 19.2702 8.75902C19.5151 8.75782 19.7594 8.73431 20 8.68878V16.6615C20 20.0156 18.0215 22 14.6624 22H7.34636C3.97851 22 2 20.0156 2 16.6615V9.3561C2 6.00195 3.97851 4 7.34636 4H15.3131C15.2659 4.243 15.2423 4.49001 15.2428 4.73756ZM13.15 14.8966L16.0078 11.2088V11.1912C16.2525 10.8625 16.1901 10.3989 15.8671 10.1463C15.7108 10.0257 15.5122 9.97345 15.3167 10.0016C15.1211 10.0297 14.9453 10.1358 14.8295 10.2956L12.4201 13.3951L9.6766 11.2351C9.51997 11.1131 9.32071 11.0592 9.12381 11.0856C8.92691 11.1121 8.74898 11.2166 8.63019 11.3756L5.67562 15.1863C5.57177 15.3158 5.51586 15.4771 5.51734 15.6429C5.5002 15.9781 5.71187 16.2826 6.03238 16.3838C6.35288 16.485 6.70138 16.3573 6.88031 16.0732L9.35125 12.8771L12.0948 15.0283C12.2508 15.1541 12.4514 15.2111 12.6504 15.1863C12.8494 15.1615 13.0297 15.0569 13.15 14.8966Z" fill="currentColor"></path>
                                    <circle opacity="0.4" cx="19.5" cy="4.5" r="2.5" fill="currentColor"></circle>
                                </svg>
                                </i>
                                <span class="item-name">Brands</span>
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link icon" href="{{url('unit')}}" data-bs-toggle="tooltip" title="Unit" data-bs-placement="right">
                                <i class="fa fa-hashtag" style="font-size:16px;"></i>
                                <span class="item-name">Unit</span>
                            </a>
                        </li>

                        <!-- Books Start -->
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-books" role="button" aria-expanded="false" aria-controls="sidebar-books">
                                <i class="fa fa-book"></i>
                                <span class="item-name">Books</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-books" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('books')}}">
                                       <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                       <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="View Books" data-bs-placement="right">V</i>
                                       <span class="item-name">View Books</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('bookcategory')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="View Books Category" data-bs-placement="right">v</i>
                                        <span class="item-name">View Books Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Book Close -->
                        
                        <!--<li class="nav-item">
                            <a class="nav-link " href="javascript:void(0)">
                                <i class="icon" data-bs-toggle="tooltip" title="Blank Page" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2" fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z" fill="currentColor"/>
                                    </svg>
                                </i>
                                <span class="item-name">Orders</span>
                            </a>
                        </li>-->
                        
                        <!-- Orders Start -->
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-orders" role="button" aria-expanded="false" aria-controls="sidebar-books">
                                 <i class="icon" data-bs-toggle="tooltip" title="Orders" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2" fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z" fill="currentColor"/>
                                    </svg>
                                </i>
                                <span class="item-name">Orders</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-orders" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('order')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="All Order" data-bs-placement="right">P</i>
                                        <span class="item-name">View All Order</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('order/return')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Return Order" data-bs-placement="right">P</i>
                                        <span class="item-name">Return Order</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('order/exchange')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Exchange Order" data-bs-placement="right">P</i>
                                        <span class="item-name">Exchange Order</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('order/cancel')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Cancel Order" data-bs-placement="right">P</i>
                                        <span class="item-name">Cancel Order</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Orders Close -->
                        
                        <!-- Setting Start -->
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-setting" role="button" aria-expanded="false" aria-controls="sidebar-books">
                                <i class="fa fa-cog" title="Setting" style="font-size:16px;"></i>
                                <span class="item-name">Setting</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-setting" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('setting/general_shipping_condition')}}">
                                       <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                       <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="General Conditions" data-bs-placement="right">K</i>
                                       <span class="item-name">General Conditions</span>
                                    </a>
                                </li>
                                <!--<li class="nav-item">
                                    <a class="nav-link" href="{{url('setting/_return_condition')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Pricing" data-bs-placement="right">P</i>
                                        <span class="item-name">General Return Condition</span>
                                    </a>
                                </li>-->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('shipping_charges')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Shipping Charges" data-bs-placement="right">S</i>
                                        <span class="item-name">Shipping Charges</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('social_media_link')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Social Media Link" data-bs-placement="right">M</i>
                                        <span class="item-name">Social Media Link</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('setting/minimum_order')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Minimum Order" data-bs-placement="right">M</i>
                                        <span class="item-name">Minimum Order</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('setting/support')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Support" data-bs-placement="right">S</i>
                                        <span class="item-name">Support</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('setting/return_exchange')}}">
                                        <i class="icon">
                                            <svg class="icon-10" width="10" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Support" data-bs-placement="right">S</i>
                                        <span class="item-name">Return/Exchange</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Setting Close -->
                        
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('promocode')}}">
                                <i class="fa fa-gift" title="Promo Code" style="font-size:18px;"></i>
                                <span class="item-name">Promo code</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('offerimages')}}">
                                <svg width="20" viewBox="0 0 24 24" fill="Offer Images" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M16.3328 22H7.66618C4.2769 22 2 19.6229 2 16.0843V7.91672C2 4.37811 4.2769 2 7.66618 2H16.3338C19.7231 2 22 4.37811 22 7.91672V16.0843C22 19.6229 19.7231 22 16.3328 22Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2451 8.67496C11.2451 10.045 10.1301 11.16 8.7601 11.16C7.3891 11.16 6.2751 10.045 6.2751 8.67496C6.2751 7.30496 7.3891 6.18896 8.7601 6.18896C10.1301 6.18896 11.2451 7.30496 11.2451 8.67496ZM19.4005 14.0876C19.6335 14.3136 19.8005 14.5716 19.9105 14.8466C20.2435 15.6786 20.0705 16.6786 19.7145 17.5026C19.2925 18.4836 18.4845 19.2246 17.4665 19.5486C17.0145 19.6936 16.5405 19.7556 16.0675 19.7556H7.6865C6.8525 19.7556 6.1145 19.5616 5.5095 19.1976C5.1305 18.9696 5.0635 18.4446 5.3445 18.1026C5.8145 17.5326 6.2785 16.9606 6.7465 16.3836C7.6385 15.2796 8.2395 14.9596 8.9075 15.2406C9.1785 15.3566 9.4505 15.5316 9.7305 15.7156C10.4765 16.2096 11.5135 16.8876 12.8795 16.1516C13.8132 15.641 14.3552 14.7673 14.827 14.0069L14.8365 13.9916C14.8682 13.9407 14.8997 13.8898 14.9311 13.8391C15.0915 13.5799 15.2495 13.3246 15.4285 13.0896C15.6505 12.7986 16.4745 11.8886 17.5395 12.5366C18.2185 12.9446 18.7895 13.4966 19.4005 14.0876Z" fill="currentColor"></path>
                                </svg>
                                <span class="item-name">Offer Images</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('review')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="News Letter" data-bs-placement="right">
                                <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2" fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z" fill="currentColor"/>
                                    </svg>
                                </i>
                                <span class="item-name">Review</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('notification')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="News Letter" data-bs-placement="right">
                                <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M21.25 13.4764C20.429 13.4764 19.761 12.8145 19.761 12.001C19.761 11.1865 20.429 10.5246 21.25 10.5246C21.449 10.5246 21.64 10.4463 21.78 10.3076C21.921 10.1679 22 9.97864 22 9.78146L21.999 7.10415C21.999 4.84102 20.14 3 17.856 3H6.144C3.86 3 2.001 4.84102 2.001 7.10415L2 9.86766C2 10.0648 2.079 10.2541 2.22 10.3938C2.36 10.5325 2.551 10.6108 2.75 10.6108C3.599 10.6108 4.239 11.2083 4.239 12.001C4.239 12.8145 3.571 13.4764 2.75 13.4764C2.336 13.4764 2 13.8093 2 14.2195V16.8949C2 19.158 3.858 21 6.143 21H17.857C20.142 21 22 19.158 22 16.8949V14.2195C22 13.8093 21.664 13.4764 21.25 13.4764Z" fill="currentColor"></path>
                                    <path d="M15.4303 11.5887L14.2513 12.7367L14.5303 14.3597C14.5783 14.6407 14.4653 14.9177 14.2343 15.0837C14.0053 15.2517 13.7063 15.2727 13.4543 15.1387L11.9993 14.3737L10.5413 15.1397C10.4333 15.1967 10.3153 15.2267 10.1983 15.2267C10.0453 15.2267 9.89434 15.1787 9.76434 15.0847C9.53434 14.9177 9.42134 14.6407 9.46934 14.3597L9.74734 12.7367L8.56834 11.5887C8.36434 11.3907 8.29334 11.0997 8.38134 10.8287C8.47034 10.5587 8.70034 10.3667 8.98134 10.3267L10.6073 10.0897L11.3363 8.61268C11.4633 8.35868 11.7173 8.20068 11.9993 8.20068H12.0013C12.2843 8.20168 12.5383 8.35968 12.6633 8.61368L13.3923 10.0897L15.0213 10.3277C15.2993 10.3667 15.5293 10.5587 15.6173 10.8287C15.7063 11.0997 15.6353 11.3907 15.4303 11.5887Z" fill="currentColor"></path>
                                </svg>
                                </i>
                                
                                <span class="item-name">Notification</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('setting/support')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Support" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2" fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z" fill="currentColor"/>
                                    </svg>
                                </i>
                                <span class="item-name">Support</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('homelayout')}}">
                                <i class="icon" data-bs-toggle="tooltip" title="Home Layout" data-bs-placement="right">
                                    <svg width="20" class="icon-20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2" fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07999 6.64999V6.65999C7.64899 6.65999 7.29999 7.00999 7.29999 7.43999C7.29999 7.86999 7.64899 8.21999 8.07999 8.21999H11.069C11.5 8.21999 11.85 7.86999 11.85 7.42899C11.85 6.99999 11.5 6.64999 11.069 6.64999H8.07999ZM15.92 12.74H8.07999C7.64899 12.74 7.29999 12.39 7.29999 11.96C7.29999 11.53 7.64899 11.179 8.07999 11.179H15.92C16.35 11.179 16.7 11.53 16.7 11.96C16.7 12.39 16.35 12.74 15.92 12.74ZM15.92 17.31H8.07999C7.77999 17.35 7.48999 17.2 7.32999 16.95C7.16999 16.69 7.16999 16.36 7.32999 16.11C7.48999 15.85 7.77999 15.71 8.07999 15.74H15.92C16.319 15.78 16.62 16.12 16.62 16.53C16.62 16.929 16.319 17.27 15.92 17.31Z" fill="currentColor"/>
                                    </svg>
                                </i>
                                <span class="item-name">Home Layout</span>
                            </a>
                        </li>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <li><hr class="hr-horizontal"></li>
                        <!-- <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Elements</span>
                                <span class="mini-icon" data-bs-toggle="tooltip" title="Elements" data-bs-placement="right">-</span>
                            </a>
                        </li> -->
                    </ul>
                    
                    <!-- Sidebar Menu End --> 
                </div>
            </div>
            <div class="sidebar-footer"></div>
        </aside>
        <main class="main-content">
            <div class="position-relative ">
            <!--Nav Start-->
                <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar">
                   <div class="container-fluid navbar-inner">
                        <a href="javascript:void()" class="navbar-brand">
                        <!--Logo start-->
                        <div class="logo-main">
                             <div class="logo-normal">
                                <img src="{{url('assets/images/pujakart.jpeg')}}" style="width:40%;" alt="Pujakart">
                             </div>
                             <div class="logo-mini">
                                <img src="{{url('assets/images/pujakart.jpeg')}}" style="width:40%;" alt="Pujakart">
                             </div>
                         </div>
                         <!--logo End-->
                         <h4 class="logo-title d-block d-xl-none" data-setting="">Pujakart</h4>
                      </a>
                      <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                         <i class="icon d-flex">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24">
                               <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                         </i>
                      </div>
                      <div class="d-flex align-items-center justify-content-between product-offcanvas">
                         <div class="breadcrumb-title border-end me-3 pe-3 d-none d-xl-block">
                            <small class="mb-0 text-capitalize">Home</small>
                         </div>
                          <div class="offcanvas offcanvas-end shadow-none iq-product-menu-responsive" tabindex="-1" id="offcanvasBottom">
                            <div class="offcanvas-body">
                               <ul class="iq-nav-menu list-unstyled">
                                  <li class="nav-item ">
                                     <a class="nav-link menu-arrow justify-content-start active" href="{{url('dashboard')}}" >
                                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                           <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="currentColor"/>
                                        </svg>
                                        <span class="nav-text ms-2">Dashboard</span>
                                     </a>
                                     <!-- <ul class="iq-header-sub-menu list-unstyled collapse" id="homeData"> -->
                                        <!-- <li class="nav-item"><a class="nav-link" href="{{url('dashboard')}}">Dashboard</a></li> -->
                                        <!-- <li class="nav-item"><a class="nav-link " href="crypto-dashboard.html">Crypto</a></li>
                                        <li class="nav-item">
                                           <a class="nav-link menu-arrow" data-bs-toggle="collapse" href="#menuStyles" role="button" aria-expanded="false" aria-controls="menuStyles">
                                              Menu Style
                                              <i class="right-icon">
                                                 <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.5 5L15.5 12L8.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                 </svg>
                                              </i>
                                           </a>
                                           <ul aria-expanded="false" class="iq-header-sub-menu left list-unstyled collapse" id="menuStyles">
                                              <li class="nav-item"><a class="nav-link " href="index-horizontal.html">Horizontal Dashboard</a></li>
                                              <li class="nav-item"><a class="nav-link " href="index-dual-compact.html">Dual Compact</a></li>
                                              <li class="nav-item"><a class="nav-link " href="index-boxed.html">Boxed Horizontal</a></li>
                                           </ul>
                                        </li> -->
                                     <!-- </ul> -->
                                  </li>
                                  <li class="nav-item ">
                                     <a class="nav-link menu-arrow justify-content-start" data-bs-toggle="collapse" href="#homeData" role="button" aria-expanded="false" aria-controls="homeData">
                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M22 11.9998C22 17.5238 17.523 21.9998 12 21.9998C6.477 21.9998 2 17.5238 2 11.9998C2 6.47776 6.477 1.99976 12 1.99976C17.523 1.99976 22 6.47776 22 11.9998Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.52075 10.8035C6.85975 10.8035 6.32275 11.3405 6.32275 11.9995C6.32275 12.6595 6.85975 13.1975 7.52075 13.1975C8.18175 13.1975 8.71875 12.6595 8.71875 11.9995C8.71875 11.3405 8.18175 10.8035 7.52075 10.8035ZM11.9999 10.8035C11.3389 10.8035 10.8019 11.3405 10.8019 11.9995C10.8019 12.6595 11.3389 13.1975 11.9999 13.1975C12.6609 13.1975 13.1979 12.6595 13.1979 11.9995C13.1979 11.3405 12.6609 10.8035 11.9999 10.8035ZM15.2813 11.9995C15.2813 11.3405 15.8183 10.8035 16.4793 10.8035C17.1403 10.8035 17.6773 11.3405 17.6773 11.9995C17.6773 12.6595 17.1403 13.1975 16.4793 13.1975C15.8183 13.1975 15.2813 12.6595 15.2813 11.9995Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="nav-text ms-2">Product</span>
                                     </a>
                                     <ul class="iq-header-sub-menu list-unstyled collapse" id="homeData">
                                        <li class="nav-item"><a class="nav-link" href="{{url('product')}}">View Product</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('product/create_product')}}">Add Product</a></li>
                                     </ul>
                                  </li>
                                    <li class="nav-item ">
                                        <a class="nav-link menu-arrow justify-content-start" data-bs-toggle="collapse" href="#homeData" role="button" aria-expanded="false" aria-controls="homeData">
                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.4" d="M18.8088 9.021C18.3573 9.021 17.7592 9.011 17.0146 9.011C15.1987 9.011 13.7055 7.508 13.7055 5.675V2.459C13.7055 2.206 13.5036 2 13.253 2H7.96363C5.49517 2 3.5 4.026 3.5 6.509V17.284C3.5 19.889 5.59022 22 8.16958 22H16.0463C18.5058 22 20.5 19.987 20.5 17.502V9.471C20.5 9.217 20.299 9.012 20.0475 9.013C19.6247 9.016 19.1177 9.021 18.8088 9.021Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M16.0842 2.56737C15.7852 2.25637 15.2632 2.47037 15.2632 2.90137V5.53837C15.2632 6.64437 16.1742 7.55437 17.2802 7.55437C17.9772 7.56237 18.9452 7.56437 19.7672 7.56237C20.1882 7.56137 20.4022 7.05837 20.1102 6.75437C19.0552 5.65737 17.1662 3.69137 16.0842 2.56737Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.97398 11.3877H12.359C12.77 11.3877 13.104 11.0547 13.104 10.6437C13.104 10.2327 12.77 9.89868 12.359 9.89868H8.97398C8.56298 9.89868 8.22998 10.2327 8.22998 10.6437C8.22998 11.0547 8.56298 11.3877 8.97398 11.3877ZM8.97408 16.3819H14.4181C14.8291 16.3819 15.1631 16.0489 15.1631 15.6379C15.1631 15.2269 14.8291 14.8929 14.4181 14.8929H8.97408C8.56308 14.8929 8.23008 15.2269 8.23008 15.6379C8.23008 16.0489 8.56308 16.3819 8.97408 16.3819Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="nav-text ms-2">Category</span>
                                     </a>
                                     <ul class="iq-header-sub-menu list-unstyled collapse" id="homeData">
                                        <!--<li class="nav-item"><a class="nav-link" href="{{url('supercategory')}}">Main Category</a></li>-->
                                        <li class="nav-item"><a class="nav-link" href="{{url('category/view-parent-category')}}">Category</a></li>
                                         <li class="nav-item"><a class="nav-link" href="{{url('category/view-child-category')}}">SubCategory</a></li>
                                     </ul>
                                  </li>
                                    <li class="nav-item ">
                                        <a class="nav-link menu-arrow justify-content-start" href="{{url('pincode')}}">
                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53162 2.93677C10.7165 1.66727 13.402 1.68946 15.5664 2.99489C17.7095 4.32691 19.012 6.70418 18.9998 9.26144C18.95 11.8019 17.5533 14.19 15.8075 16.0361C14.7998 17.1064 13.6726 18.0528 12.4488 18.856C12.3228 18.9289 12.1848 18.9777 12.0415 19C11.9036 18.9941 11.7693 18.9534 11.6508 18.8814C9.78243 17.6746 8.14334 16.134 6.81233 14.334C5.69859 12.8314 5.06584 11.016 5 9.13442C4.99856 6.57225 6.34677 4.20627 8.53162 2.93677ZM9.79416 10.1948C10.1617 11.1008 11.0292 11.6918 11.9916 11.6918C12.6221 11.6964 13.2282 11.4438 13.6748 10.9905C14.1214 10.5371 14.3715 9.92064 14.3692 9.27838C14.3726 8.29804 13.7955 7.41231 12.9073 7.03477C12.0191 6.65723 10.995 6.86235 10.3133 7.55435C9.63159 8.24635 9.42664 9.28872 9.79416 10.1948Z" fill="currentColor"></path>
                                            <ellipse opacity="0.4" cx="12" cy="21" rx="5" ry="1" fill="currentColor"></ellipse>
                                        </svg>
                                        <span class="nav-text ms-2">Pincode</span>
                                     </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link menu-arrow justify-content-start" href="{{url('slider')}}">
                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21.9999 14.7024V16.0859C21.9999 16.3155 21.9899 16.5471 21.9699 16.7767C21.6893 19.9357 19.4949 22 16.3286 22H7.67126C6.06806 22 4.71535 21.4797 3.74341 20.5363C3.36265 20.1864 3.042 19.7753 2.7915 19.3041C3.12217 18.9021 3.49291 18.462 3.85363 18.0208C4.46485 17.289 5.05603 16.5661 5.42677 16.0959C5.97788 15.4142 7.43078 13.6196 9.44481 14.4617C9.85563 14.6322 10.2164 14.8728 10.547 15.0833C11.3586 15.6247 11.6993 15.7851 12.2705 15.4743C12.9017 15.1335 13.3125 14.4617 13.7434 13.76C13.9739 13.388 14.2043 13.0281 14.4548 12.6972C15.547 11.2736 17.2304 10.8926 18.6332 11.7348C19.3346 12.1559 19.9358 12.6872 20.4969 13.2276C20.6172 13.3479 20.7374 13.4592 20.8476 13.5695C20.9979 13.7198 21.4989 14.2211 21.9999 14.7024Z" fill="currentColor"></path>
                                            <path opacity="0.4" d="M16.3387 2H7.67134C4.27455 2 2 4.37607 2 7.91411V16.086C2 17.3181 2.28056 18.4119 2.79158 19.3042C3.12224 18.9022 3.49299 18.4621 3.85371 18.0199C4.46493 17.2891 5.05611 16.5662 5.42685 16.096C5.97796 15.4143 7.43086 13.6197 9.44489 14.4618C9.85571 14.6323 10.2164 14.8729 10.5471 15.0834C11.3587 15.6248 11.6994 15.7852 12.2705 15.4734C12.9018 15.1336 13.3126 14.4618 13.7435 13.759C13.9739 13.3881 14.2044 13.0282 14.4549 12.6973C15.5471 11.2737 17.2305 10.8927 18.6333 11.7349C19.3347 12.1559 19.9359 12.6873 20.497 13.2277C20.6172 13.348 20.7375 13.4593 20.8477 13.5696C20.998 13.7189 21.499 14.2202 22 14.7025V7.91411C22 4.37607 19.7255 2 16.3387 2Z" fill="currentColor"></path>
                                            <path d="M11.4543 8.79668C11.4543 10.2053 10.2809 11.3783 8.87313 11.3783C7.46632 11.3783 6.29297 10.2053 6.29297 8.79668C6.29297 7.38909 7.46632 6.21509 8.87313 6.21509C10.2809 6.21509 11.4543 7.38909 11.4543 8.79668Z" fill="currentColor"></path>
                                        </svg>
                                        <span class="nav-text ms-2">Slider</span>
                                     </a>
                                  </li>
                                  <li class="nav-item ">
                                     <a class="nav-link menu-arrow justify-content-start" href="{{url('promocode')}}">
                                        <i class="fa fa-gift"></i>
                                        <span class="nav-text ms-2">Promo Code</span>
                                     </a>
                                  </li>
                                 
                               </ul>
                            </div>   
                         </div>
                      </div>
                      <div class="d-flex align-items-center">
                         <button id="navbar-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1 mt-1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                            </span>
                         </button>
                      </div>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0 ">
                           
                            
                            <li class="nav-item dropdown">
                               <a href="#"  class="nav-link" id="notification-drop" data-bs-toggle="dropdown" >
                                  <svg class="icon-24" width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M19.7695 11.6453C19.039 10.7923 18.7071 10.0531 18.7071 8.79716V8.37013C18.7071 6.73354 18.3304 5.67907 17.5115 4.62459C16.2493 2.98699 14.1244 2 12.0442 2H11.9558C9.91935 2 7.86106 2.94167 6.577 4.5128C5.71333 5.58842 5.29293 6.68822 5.29293 8.37013V8.79716C5.29293 10.0531 4.98284 10.7923 4.23049 11.6453C3.67691 12.2738 3.5 13.0815 3.5 13.9557C3.5 14.8309 3.78723 15.6598 4.36367 16.3336C5.11602 17.1413 6.17846 17.6569 7.26375 17.7466C8.83505 17.9258 10.4063 17.9933 12.0005 17.9933C13.5937 17.9933 15.165 17.8805 16.7372 17.7466C17.8215 17.6569 18.884 17.1413 19.6363 16.3336C20.2118 15.6598 20.5 14.8309 20.5 13.9557C20.5 13.0815 20.3231 12.2738 19.7695 11.6453Z" fill="currentColor"></path>
                                     <path opacity="0.4" d="M14.0088 19.2283C13.5088 19.1215 10.4627 19.1215 9.96275 19.2283C9.53539 19.327 9.07324 19.5566 9.07324 20.0602C9.09809 20.5406 9.37935 20.9646 9.76895 21.2335L9.76795 21.2345C10.2718 21.6273 10.8632 21.877 11.4824 21.9667C11.8123 22.012 12.1482 22.01 12.4901 21.9667C13.1083 21.877 13.6997 21.6273 14.2036 21.2345L14.2026 21.2335C14.5922 20.9646 14.8734 20.5406 14.8983 20.0602C14.8983 19.5566 14.4361 19.327 14.0088 19.2283Z" fill="currentColor"></path>
                                  </svg>
                                  <span class="bg-danger dots"></span>
                               </a>
                               <ul class="p-0 sub-drop dropdown-menu dropdown-menu-end" aria-labelledby="notification-drop">
                                     <li class="">
                                        <div class="p-3 card-header d-flex justify-content-between bg-primary rounded-top">
                                              <div class="header-title">
                                              <h5 class="mb-0 text-white">All Notifications</h5>
                                           </div>
                                        </div>
                                     <div class="p-0 card-body all-notification">
                                        <a href="#" class="iq-sub-card">
                                           <div class="d-flex align-items-center">
                                              <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="../assets/images/shapes/01.png" alt="" loading="lazy">
                                              <div class="ms-3 w-100">
                                                 <h6 class="mb-0 ">Emma Watson Bni</h6>
                                                 <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">95 MB</p>
                                                    <small class="float-end font-size-12">Just Now</small>
                                                 </div>
                                              </div>
                                           </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                           <div class="d-flex align-items-center">
                                              <div  >
                                                 <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="../assets/images/shapes/02.png" alt="" loading="lazy">
                                              </div>
                                                 <div class="ms-3 w-100">
                                                    <h6 class="mb-0 ">New customer is join</h6>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                       <p class="mb-0">Cyst Bni</p>
                                                       <small class="float-end font-size-12">5 days ago</small>
                                                    </div>
                                                 </div>
                                           </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                           <div class="d-flex align-items-center">
                                              <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="../assets/images/shapes/03.png" alt="" loading="lazy">
                                              <div class="ms-3 w-100">
                                                 <h6 class="mb-0 ">Two customer is left</h6>
                                                 <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Cyst Bni</p>
                                                    <small class="float-end font-size-12">2 days ago</small>
                                                 </div>
                                              </div>
                                           </div>
                                        </a>
                                        <a href="#" class="iq-sub-card">
                                           <div class="d-flex align-items-center">
                                              <img class="p-1 avatar-40 rounded-pill bg-soft-primary" src="../assets/images/shapes/04.png" alt="" loading="lazy">
                                              <div class="w-100 ms-3">
                                                 <h6 class="mb-0 ">New Mail from Fenny</h6>
                                                 <div class="d-flex justify-content-between align-items-center">
                                                    <p class="mb-0">Cyst Bni</p>
                                                    <small class="float-end font-size-12">3 days ago</small>
                                                 </div>
                                              </div>
                                           </div>
                                        </a>
                                     </div>
                                  </li>
                               </ul>
                            </li>
                            <li class="nav-item theme-scheme-dropdown">
                                  <a href="#"  class="nav-link" id="mode-drop" >
                                     <svg class="icon-24" width="24"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.9905 5.62598C10.7293 5.62574 9.49646 5.9995 8.44775 6.69997C7.39903 7.40045 6.58159 8.39619 6.09881 9.56126C5.61603 10.7263 5.48958 12.0084 5.73547 13.2453C5.98135 14.4823 6.58852 15.6185 7.48019 16.5104C8.37186 17.4022 9.50798 18.0096 10.7449 18.2557C11.9818 18.5019 13.2639 18.3757 14.429 17.8931C15.5942 17.4106 16.5901 16.5933 17.2908 15.5448C17.9915 14.4962 18.3655 13.2634 18.3655 12.0023C18.3637 10.3119 17.6916 8.69129 16.4964 7.49593C15.3013 6.30056 13.6808 5.62806 11.9905 5.62598Z" fill="currentColor"></path>
                                        <path d="M22.1258 10.8771H20.627C20.3286 10.8771 20.0424 10.9956 19.8314 11.2066C19.6204 11.4176 19.5018 11.7038 19.5018 12.0023C19.5018 12.3007 19.6204 12.5869 19.8314 12.7979C20.0424 13.0089 20.3286 13.1274 20.627 13.1274H22.1258C22.4242 13.1274 22.7104 13.0089 22.9214 12.7979C23.1324 12.5869 23.2509 12.3007 23.2509 12.0023C23.2509 11.7038 23.1324 11.4176 22.9214 11.2066C22.7104 10.9956 22.4242 10.8771 22.1258 10.8771Z" fill="currentColor"></path>
                                        <path d="M11.9905 19.4995C11.6923 19.5 11.4064 19.6187 11.1956 19.8296C10.9848 20.0405 10.8663 20.3265 10.866 20.6247V22.1249C10.866 22.4231 10.9845 22.7091 11.1953 22.9199C11.4062 23.1308 11.6922 23.2492 11.9904 23.2492C12.2886 23.2492 12.5746 23.1308 12.7854 22.9199C12.9963 22.7091 13.1147 22.4231 13.1147 22.1249V20.6247C13.1145 20.3265 12.996 20.0406 12.7853 19.8296C12.5745 19.6187 12.2887 19.5 11.9905 19.4995Z" fill="currentColor"></path>
                                        <path d="M4.49743 12.0023C4.49718 11.704 4.37865 11.4181 4.16785 11.2072C3.95705 10.9962 3.67119 10.8775 3.37298 10.8771H1.87445C1.57603 10.8771 1.28984 10.9956 1.07883 11.2066C0.867812 11.4176 0.749266 11.7038 0.749266 12.0023C0.749266 12.3007 0.867812 12.5869 1.07883 12.7979C1.28984 13.0089 1.57603 13.1274 1.87445 13.1274H3.37299C3.6712 13.127 3.95706 13.0083 4.16785 12.7973C4.37865 12.5864 4.49718 12.3005 4.49743 12.0023Z" fill="currentColor"></path>
                                        <path d="M11.9905 4.50058C12.2887 4.50012 12.5745 4.38141 12.7853 4.17048C12.9961 3.95954 13.1147 3.67361 13.1149 3.3754V1.87521C13.1149 1.57701 12.9965 1.29103 12.7856 1.08017C12.5748 0.869313 12.2888 0.750854 11.9906 0.750854C11.6924 0.750854 11.4064 0.869313 11.1955 1.08017C10.9847 1.29103 10.8662 1.57701 10.8662 1.87521V3.3754C10.8664 3.67359 10.9849 3.95952 11.1957 4.17046C11.4065 4.3814 11.6923 4.50012 11.9905 4.50058Z" fill="currentColor"></path>
                                        <path d="M18.8857 6.6972L19.9465 5.63642C20.0512 5.53209 20.1343 5.40813 20.1911 5.27163C20.2479 5.13513 20.2772 4.98877 20.2774 4.84093C20.2775 4.69309 20.2485 4.54667 20.192 4.41006C20.1355 4.27344 20.0526 4.14932 19.948 4.04478C19.8435 3.94024 19.7194 3.85734 19.5828 3.80083C19.4462 3.74432 19.2997 3.71531 19.1519 3.71545C19.0041 3.7156 18.8577 3.7449 18.7212 3.80167C18.5847 3.85845 18.4607 3.94159 18.3564 4.04633L17.2956 5.10714C17.1909 5.21147 17.1077 5.33543 17.0509 5.47194C16.9942 5.60844 16.9649 5.7548 16.9647 5.90264C16.9646 6.05048 16.9936 6.19689 17.0501 6.33351C17.1066 6.47012 17.1895 6.59425 17.294 6.69878C17.3986 6.80332 17.5227 6.88621 17.6593 6.94272C17.7959 6.99923 17.9424 7.02824 18.0902 7.02809C18.238 7.02795 18.3844 6.99865 18.5209 6.94187C18.6574 6.88509 18.7814 6.80195 18.8857 6.6972Z" fill="currentColor"></path>
                                        <path d="M18.8855 17.3073C18.7812 17.2026 18.6572 17.1195 18.5207 17.0627C18.3843 17.006 18.2379 16.9767 18.0901 16.9766C17.9423 16.9764 17.7959 17.0055 17.6593 17.062C17.5227 17.1185 17.3986 17.2014 17.2941 17.3059C17.1895 17.4104 17.1067 17.5345 17.0501 17.6711C16.9936 17.8077 16.9646 17.9541 16.9648 18.1019C16.9649 18.2497 16.9942 18.3961 17.0509 18.5326C17.1077 18.6691 17.1908 18.793 17.2955 18.8974L18.3563 19.9582C18.4606 20.0629 18.5846 20.146 18.721 20.2027C18.8575 20.2595 19.0039 20.2887 19.1517 20.2889C19.2995 20.289 19.4459 20.26 19.5825 20.2035C19.7191 20.147 19.8432 20.0641 19.9477 19.9595C20.0523 19.855 20.1351 19.7309 20.1916 19.5943C20.2482 19.4577 20.2772 19.3113 20.277 19.1635C20.2769 19.0157 20.2476 18.8694 20.1909 18.7329C20.1341 18.5964 20.051 18.4724 19.9463 18.3681L18.8855 17.3073Z" fill="currentColor"></path>
                                        <path d="M5.09528 17.3072L4.0345 18.368C3.92972 18.4723 3.84655 18.5963 3.78974 18.7328C3.73294 18.8693 3.70362 19.0156 3.70346 19.1635C3.7033 19.3114 3.7323 19.4578 3.78881 19.5944C3.84532 19.7311 3.92822 19.8552 4.03277 19.9598C4.13732 20.0643 4.26147 20.1472 4.3981 20.2037C4.53473 20.2602 4.68117 20.2892 4.82902 20.2891C4.97688 20.2889 5.12325 20.2596 5.25976 20.2028C5.39627 20.146 5.52024 20.0628 5.62456 19.958L6.68536 18.8973C6.79007 18.7929 6.87318 18.6689 6.92993 18.5325C6.98667 18.396 7.01595 18.2496 7.01608 18.1018C7.01621 17.954 6.98719 17.8076 6.93068 17.671C6.87417 17.5344 6.79129 17.4103 6.68676 17.3058C6.58224 17.2012 6.45813 17.1183 6.32153 17.0618C6.18494 17.0053 6.03855 16.9763 5.89073 16.9764C5.74291 16.9766 5.59657 17.0058 5.46007 17.0626C5.32358 17.1193 5.19962 17.2024 5.09528 17.3072Z" fill="currentColor"></path>
                                        <path d="M5.09541 6.69715C5.19979 6.8017 5.32374 6.88466 5.4602 6.94128C5.59665 6.9979 5.74292 7.02708 5.89065 7.02714C6.03839 7.0272 6.18469 6.99815 6.32119 6.94164C6.45769 6.88514 6.58171 6.80228 6.68618 6.69782C6.79064 6.59336 6.87349 6.46933 6.93 6.33283C6.9865 6.19633 7.01556 6.05003 7.01549 5.9023C7.01543 5.75457 6.98625 5.60829 6.92963 5.47184C6.87301 5.33539 6.79005 5.21143 6.6855 5.10706L5.6247 4.04626C5.5204 3.94137 5.39643 3.8581 5.25989 3.80121C5.12335 3.74432 4.97692 3.71493 4.82901 3.71472C4.68109 3.71452 4.53458 3.7435 4.39789 3.80001C4.26119 3.85652 4.13699 3.93945 4.03239 4.04404C3.9278 4.14864 3.84487 4.27284 3.78836 4.40954C3.73185 4.54624 3.70287 4.69274 3.70308 4.84066C3.70329 4.98858 3.73268 5.135 3.78957 5.27154C3.84646 5.40808 3.92974 5.53205 4.03462 5.63635L5.09541 6.69715Z" fill="currentColor"></path>
                                     </svg>
                                  </a>
                                  <ul class="list-unstyled dropdown-menu dropdown-content">
                                     <li data-setting="radio">
                                        <div class="dropdown-item d-flex align-items-center">
                                           <input type="radio" value="light" class="btn-check" name="theme_scheme" id="color-mode-light">
                                           <label class="d-block" for="color-mode-light">
                                              <svg class="icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <path d="M11.9905 5.62598C10.7293 5.62574 9.49646 5.9995 8.44775 6.69997C7.39903 7.40045 6.58159 8.39619 6.09881 9.56126C5.61603 10.7263 5.48958 12.0084 5.73547 13.2453C5.98135 14.4823 6.58852 15.6185 7.48019 16.5104C8.37186 17.4022 9.50798 18.0096 10.7449 18.2557C11.9818 18.5019 13.2639 18.3757 14.429 17.8931C15.5942 17.4106 16.5901 16.5933 17.2908 15.5448C17.9915 14.4962 18.3655 13.2634 18.3655 12.0023C18.3637 10.3119 17.6916 8.69129 16.4964 7.49593C15.3013 6.30056 13.6808 5.62806 11.9905 5.62598Z" fill="currentColor"></path>
                                                 <path d="M22.1258 10.8771H20.627C20.3286 10.8771 20.0424 10.9956 19.8314 11.2066C19.6204 11.4176 19.5018 11.7038 19.5018 12.0023C19.5018 12.3007 19.6204 12.5869 19.8314 12.7979C20.0424 13.0089 20.3286 13.1274 20.627 13.1274H22.1258C22.4242 13.1274 22.7104 13.0089 22.9214 12.7979C23.1324 12.5869 23.2509 12.3007 23.2509 12.0023C23.2509 11.7038 23.1324 11.4176 22.9214 11.2066C22.7104 10.9956 22.4242 10.8771 22.1258 10.8771Z" fill="currentColor"></path>
                                                 <path d="M11.9905 19.4995C11.6923 19.5 11.4064 19.6187 11.1956 19.8296C10.9848 20.0405 10.8663 20.3265 10.866 20.6247V22.1249C10.866 22.4231 10.9845 22.7091 11.1953 22.9199C11.4062 23.1308 11.6922 23.2492 11.9904 23.2492C12.2886 23.2492 12.5746 23.1308 12.7854 22.9199C12.9963 22.7091 13.1147 22.4231 13.1147 22.1249V20.6247C13.1145 20.3265 12.996 20.0406 12.7853 19.8296C12.5745 19.6187 12.2887 19.5 11.9905 19.4995Z" fill="currentColor"></path>
                                                 <path d="M4.49743 12.0023C4.49718 11.704 4.37865 11.4181 4.16785 11.2072C3.95705 10.9962 3.67119 10.8775 3.37298 10.8771H1.87445C1.57603 10.8771 1.28984 10.9956 1.07883 11.2066C0.867812 11.4176 0.749266 11.7038 0.749266 12.0023C0.749266 12.3007 0.867812 12.5869 1.07883 12.7979C1.28984 13.0089 1.57603 13.1274 1.87445 13.1274H3.37299C3.6712 13.127 3.95706 13.0083 4.16785 12.7973C4.37865 12.5864 4.49718 12.3005 4.49743 12.0023Z" fill="currentColor"></path>
                                                 <path d="M11.9905 4.50058C12.2887 4.50012 12.5745 4.38141 12.7853 4.17048C12.9961 3.95954 13.1147 3.67361 13.1149 3.3754V1.87521C13.1149 1.57701 12.9965 1.29103 12.7856 1.08017C12.5748 0.869313 12.2888 0.750854 11.9906 0.750854C11.6924 0.750854 11.4064 0.869313 11.1955 1.08017C10.9847 1.29103 10.8662 1.57701 10.8662 1.87521V3.3754C10.8664 3.67359 10.9849 3.95952 11.1957 4.17046C11.4065 4.3814 11.6923 4.50012 11.9905 4.50058Z" fill="currentColor"></path>
                                                 <path d="M18.8857 6.6972L19.9465 5.63642C20.0512 5.53209 20.1343 5.40813 20.1911 5.27163C20.2479 5.13513 20.2772 4.98877 20.2774 4.84093C20.2775 4.69309 20.2485 4.54667 20.192 4.41006C20.1355 4.27344 20.0526 4.14932 19.948 4.04478C19.8435 3.94024 19.7194 3.85734 19.5828 3.80083C19.4462 3.74432 19.2997 3.71531 19.1519 3.71545C19.0041 3.7156 18.8577 3.7449 18.7212 3.80167C18.5847 3.85845 18.4607 3.94159 18.3564 4.04633L17.2956 5.10714C17.1909 5.21147 17.1077 5.33543 17.0509 5.47194C16.9942 5.60844 16.9649 5.7548 16.9647 5.90264C16.9646 6.05048 16.9936 6.19689 17.0501 6.33351C17.1066 6.47012 17.1895 6.59425 17.294 6.69878C17.3986 6.80332 17.5227 6.88621 17.6593 6.94272C17.7959 6.99923 17.9424 7.02824 18.0902 7.02809C18.238 7.02795 18.3844 6.99865 18.5209 6.94187C18.6574 6.88509 18.7814 6.80195 18.8857 6.6972Z" fill="currentColor"></path>
                                                 <path d="M18.8855 17.3073C18.7812 17.2026 18.6572 17.1195 18.5207 17.0627C18.3843 17.006 18.2379 16.9767 18.0901 16.9766C17.9423 16.9764 17.7959 17.0055 17.6593 17.062C17.5227 17.1185 17.3986 17.2014 17.2941 17.3059C17.1895 17.4104 17.1067 17.5345 17.0501 17.6711C16.9936 17.8077 16.9646 17.9541 16.9648 18.1019C16.9649 18.2497 16.9942 18.3961 17.0509 18.5326C17.1077 18.6691 17.1908 18.793 17.2955 18.8974L18.3563 19.9582C18.4606 20.0629 18.5846 20.146 18.721 20.2027C18.8575 20.2595 19.0039 20.2887 19.1517 20.2889C19.2995 20.289 19.4459 20.26 19.5825 20.2035C19.7191 20.147 19.8432 20.0641 19.9477 19.9595C20.0523 19.855 20.1351 19.7309 20.1916 19.5943C20.2482 19.4577 20.2772 19.3113 20.277 19.1635C20.2769 19.0157 20.2476 18.8694 20.1909 18.7329C20.1341 18.5964 20.051 18.4724 19.9463 18.3681L18.8855 17.3073Z" fill="currentColor"></path>
                                                 <path d="M5.09528 17.3072L4.0345 18.368C3.92972 18.4723 3.84655 18.5963 3.78974 18.7328C3.73294 18.8693 3.70362 19.0156 3.70346 19.1635C3.7033 19.3114 3.7323 19.4578 3.78881 19.5944C3.84532 19.7311 3.92822 19.8552 4.03277 19.9598C4.13732 20.0643 4.26147 20.1472 4.3981 20.2037C4.53473 20.2602 4.68117 20.2892 4.82902 20.2891C4.97688 20.2889 5.12325 20.2596 5.25976 20.2028C5.39627 20.146 5.52024 20.0628 5.62456 19.958L6.68536 18.8973C6.79007 18.7929 6.87318 18.6689 6.92993 18.5325C6.98667 18.396 7.01595 18.2496 7.01608 18.1018C7.01621 17.954 6.98719 17.8076 6.93068 17.671C6.87417 17.5344 6.79129 17.4103 6.68676 17.3058C6.58224 17.2012 6.45813 17.1183 6.32153 17.0618C6.18494 17.0053 6.03855 16.9763 5.89073 16.9764C5.74291 16.9766 5.59657 17.0058 5.46007 17.0626C5.32358 17.1193 5.19962 17.2024 5.09528 17.3072Z" fill="currentColor"></path>
                                                 <path d="M5.09541 6.69715C5.19979 6.8017 5.32374 6.88466 5.4602 6.94128C5.59665 6.9979 5.74292 7.02708 5.89065 7.02714C6.03839 7.0272 6.18469 6.99815 6.32119 6.94164C6.45769 6.88514 6.58171 6.80228 6.68618 6.69782C6.79064 6.59336 6.87349 6.46933 6.93 6.33283C6.9865 6.19633 7.01556 6.05003 7.01549 5.9023C7.01543 5.75457 6.98625 5.60829 6.92963 5.47184C6.87301 5.33539 6.79005 5.21143 6.6855 5.10706L5.6247 4.04626C5.5204 3.94137 5.39643 3.8581 5.25989 3.80121C5.12335 3.74432 4.97692 3.71493 4.82901 3.71472C4.68109 3.71452 4.53458 3.7435 4.39789 3.80001C4.26119 3.85652 4.13699 3.93945 4.03239 4.04404C3.9278 4.14864 3.84487 4.27284 3.78836 4.40954C3.73185 4.54624 3.70287 4.69274 3.70308 4.84066C3.70329 4.98858 3.73268 5.135 3.78957 5.27154C3.84646 5.40808 3.92974 5.53205 4.03462 5.63635L5.09541 6.69715Z" fill="currentColor"></path>
                                              </svg>
                                           <span class="ms-3 mb-0">Light</span>
                                           </label>
                                        </div>
                                     </li>
                                     <li  data-setting="radio">
                                        <div class="dropdown-item d-flex align-items-center">
                                           <input type="radio" value="dark" class="btn-check" name="theme_scheme" id="color-mode-dark">
                                           <label class="d-block" for="color-mode-dark">
                                           <svg class="icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                              <path d="M19.0647 5.43757C19.3421 5.43757 19.567 5.21271 19.567 4.93534C19.567 4.65796 19.3421 4.43311 19.0647 4.43311C18.7874 4.43311 18.5625 4.65796 18.5625 4.93534C18.5625 5.21271 18.7874 5.43757 19.0647 5.43757Z" fill="currentColor"></path>
                                              <path d="M20.0692 9.48884C20.3466 9.48884 20.5714 9.26398 20.5714 8.98661C20.5714 8.70923 20.3466 8.48438 20.0692 8.48438C19.7918 8.48438 19.567 8.70923 19.567 8.98661C19.567 9.26398 19.7918 9.48884 20.0692 9.48884Z" fill="currentColor"></path>
                                              <path d="M12.0335 20.5714C15.6943 20.5714 18.9426 18.2053 20.1168 14.7338C20.1884 14.5225 20.1114 14.289 19.9284 14.161C19.746 14.034 19.5003 14.0418 19.3257 14.1821C18.2432 15.0546 16.9371 15.5156 15.5491 15.5156C12.2257 15.5156 9.48884 12.8122 9.48884 9.48886C9.48884 7.41079 10.5773 5.47137 12.3449 4.35752C12.5342 4.23832 12.6 4.00733 12.5377 3.79251C12.4759 3.57768 12.2571 3.42859 12.0335 3.42859C7.32556 3.42859 3.42857 7.29209 3.42857 12C3.42857 16.7079 7.32556 20.5714 12.0335 20.5714Z" fill="currentColor"></path>
                                              <path d="M13.0379 7.47998C13.8688 7.47998 14.5446 8.15585 14.5446 8.98668C14.5446 9.26428 14.7693 9.48891 15.0469 9.48891C15.3245 9.48891 15.5491 9.26428 15.5491 8.98668C15.5491 8.15585 16.225 7.47998 17.0558 7.47998C17.3334 7.47998 17.558 7.25535 17.558 6.97775C17.558 6.70015 17.3334 6.47552 17.0558 6.47552C16.225 6.47552 15.5491 5.76616 15.5491 4.93534C15.5491 4.65774 15.3245 4.43311 15.0469 4.43311C14.7693 4.43311 14.5446 4.65774 14.5446 4.93534C14.5446 5.76616 13.8688 6.47552 13.0379 6.47552C12.7603 6.47552 12.5357 6.70015 12.5357 6.97775C12.5357 7.25535 12.7603 7.47998 13.0379 7.47998Z" fill="currentColor"></path>
                                           </svg>
                                           <span class="ms-3 mb-0">Dark</span>
                                           </label>
                                        </div>
                                     </li>
                                     <li data-setting="radio">
                                        <div class="dropdown-item d-flex align-items-center">
                                           <input type="radio" value="auto" class="btn-check" name="theme_scheme" id="color-mode-auto" checked>
                                           <label class="d-block" for="color-mode-auto">
                                              <svg class="icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M1.34375 3.9463V15.2178C1.34375 16.119 2.08105 16.8563 2.98219 16.8563H8.65093V19.4594H6.15702C5.38853 19.4594 4.75981 19.9617 4.75981 20.5757V21.6921H19.2403V20.5757C19.2403 19.9617 18.6116 19.4594 17.8431 19.4594H15.3492V16.8563H21.0179C21.919 16.8563 22.6562 16.119 22.6562 15.2178V3.9463C22.6562 3.04516 21.9189 2.30786 21.0179 2.30786H2.98219C2.08105 2.30786 1.34375 3.04516 1.34375 3.9463ZM12.9034 9.9016C13.241 9.98792 13.5597 10.1216 13.852 10.2949L15.0393 9.4353L15.9893 10.3853L15.1297 11.5727C15.303 11.865 15.4366 12.1837 15.523 12.5212L16.97 12.7528V13.4089H13.9851C13.9766 12.3198 13.0912 11.4394 12 11.4394C10.9089 11.4394 10.0235 12.3198 10.015 13.4089H7.03006V12.7528L8.47712 12.5211C8.56345 12.1836 8.69703 11.8649 8.87037 11.5727L8.0107 10.3853L8.96078 9.4353L10.148 10.2949C10.4404 10.1215 10.759 9.98788 11.0966 9.9016L11.3282 8.45467H12.6718L12.9034 9.9016ZM16.1353 7.93758C15.6779 7.93758 15.3071 7.56681 15.3071 7.1094C15.3071 6.652 15.6779 6.28122 16.1353 6.28122C16.5926 6.28122 16.9634 6.652 16.9634 7.1094C16.9634 7.56681 16.5926 7.93758 16.1353 7.93758ZM2.71385 14.0964V3.90518C2.71385 3.78023 2.81612 3.67796 2.94107 3.67796H21.0589C21.1839 3.67796 21.2861 3.78023 21.2861 3.90518V14.0964C15.0954 14.0964 8.90462 14.0964 2.71385 14.0964Z" fill="currentColor"></path>
                                              </svg>
                                           <span class="ms-3 mb-0">Auto</span>
                                           </label>
                                        </div>
                                     </li>
                               </ul>
                            </li>
                             <li class="nav-item iq-full-screen d-none  d-xl-block border-end" id="fullscreen-item">
                               <a href="#"  class="nav-link pe-3" id="btnFullscreen" data-bs-toggle="dropdown" >
                                  <span class="btn-inner">
                                    <svg class="normal-screen icon-24" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.5528 5.99656L13.8595 10.8961" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M14.8016 5.97618L18.5524 5.99629L18.5176 9.96906" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5.8574 18.896L10.5507 13.9964" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M9.60852 18.9164L5.85775 18.8963L5.89258 14.9235" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                     </svg>
                                     <svg class="full-normal-screen icon-32 d-none" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.7542 10.1932L18.1867 5.79319" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.2976 10.212L13.7547 10.1934L13.7871 6.62518" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M10.4224 13.5726L5.82149 18.1398" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M6.74391 13.5535L10.4209 13.5723L10.3867 17.2755" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                     </svg>
                                  </span>
                               </a>
                            </li>
                            <li class="nav-item dropdown">
                               <a class="py-0 nav-link d-flex align-items-center ps-3" href="#" id="profile-setting" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <img src="{{url('assets/images/pfav.png')}}" alt="User-Profile" class="img-fluid avatar avatar-50 avatar-rounded" loading="lazy">
                                  <div class="caption ms-3 d-none d-md-block ">
                                     <h6 class="mb-0 caption-title">Pujakart</h6>
                                     <p class="mb-0 caption-sub-title">At Your Doorsteps</p>
                                  </div>
                               </a>
                               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile-setting">
                                  <li><a class="dropdown-item" href="#">Profile</a></li>
                                  <li><a class="dropdown-item" href="#">Privacy Setting</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="{{url('logout_admin')}}">Logout</a></li>
                               </ul>
                            </li>
                         </ul>
                      </div>
                   </div>
                </nav>
            <!--Nav End-->
            </div>
        @yield('content')

        @include('AdminLayout.footer')