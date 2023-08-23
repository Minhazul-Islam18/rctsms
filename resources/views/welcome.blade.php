<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="https://i.ibb.co/3Tw0RBz/89images.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RCT Seba SMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link href="{{ asset('/frontend/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </script>
</head>

<body>
    <div class="container my-4 px-4 py-3 main-container">
        <header class="site__header">
            <div class="Header__top_image">
                <img src="https://i.ibb.co/g6tTvr1/Whats-App-Image-2023-08-23-at-13-18-44.jpg" alt="">
            </div>
            {{-- <div class="row my-md-4 my-sm-3 my-2">
                <div class="col-md-3 col-sm-12 col-12">
                    <img src="https://i.ibb.co/3Tw0RBz/89images.png" class="img-fluid rounded-top header__logo"
                        alt="">
                </div>
                <div class="col-md-6 col-sm-12 col-12 d-flex justify-content-center align-items-center flex-column">
                    <div class="h2 school__name fw-bolder text-danger">মির্জানগর সরকারি প্রাথমিক বিদ্যালয়</div>
                    <div class="h2 school__name fw-bolder">Mirzanagar Govt. Primary School</div>
                    <span class="h6 school__established d-block text-center fw-bold">স্থাপিত: ১৯৯৫ খ্রিস্টাব্দ</span>
                    <div class="school__others__information">
                        <span>
                            ডাকঘর: মির্জানগর
                        </span>
                        <span>
                            উপজেলা: সুরমা
                        </span>
                        <span>
                            জেলা: সিলেট
                        </span>
                        <br>
                        <span>
                            মোবাইল: 0123456789
                        </span>
                        <span>
                            মেইল: xyz@gmail.com
                        </span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="school__eiin d-block bg-black py-1 px-2 mb-2 text-white text-uppercase">EIIN no: xxxxxxx
                    </div>
                    <div class="school__code d-block bg-danger text-white py-1 px-2 mb-2 text-uppercase">School Code:
                        xxxxxxx</div>
                </div>
            </div> --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 mt-4 border-top border-bottom">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav header__navbar">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">হোম</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">প্রতিষ্ঠান সম্পর্কে</a>
                            <div class="dropdown">
                                <ul>
                                    <li>প্রতিষ্ঠানের ইতিহাস</li>
                                    <li>সভাপতির বাণী</li>
                                    <li>প্রতিষ্ঠান প্রধানের বাণী</li>
                                    <li>সহকারী প্রধানের বাণী</li>
                                    <li>পাঠদানের অনুমতি</li>
                                    <li>শ্রেণি সমূহ</li>
                                    <li>সর্বশেষ কমিটি</li>
                                    <li>প্রাক্তণ সভাপতিগণ ও কার্যকাল</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">শিক্ষক-কর্মচারী</a>
                            <div class="dropdown">
                                <ul>
                                    <li>বর্তমান শিক্ষক-শিক্ষিকা</li>
                                    <li>বর্তমান কর্মচারী</li>
                                    <li>শিক্ষক-কর্মচারীদের উপস্থিতি</li>
                                    <li>প্রাক্তণ প্রধান শিক্ষকগণ ও কার্যকাল</li>
                                    <li>প্রাক্তণ কর্মচারীগণ ও কার্যকাল</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">শিক্ষার্থী</a>
                            <div class="dropdown">
                                <ul>
                                    <li>অধ্যায়নরত শিক্ষার্থীর সংখ্যা</li>
                                    <li>শিক্ষার্থীদের উপস্থিতি</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">পাঠদান সংক্রান্ত</a>
                            <div class="dropdown">
                                <ul>
                                    <li>রুটিন
                                    </li>
                                    <li>পাঠ্যসূচী
                                    </li>
                                    <li>
                                        বিবিধ নোটিশ</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ফলাফল</a>
                            <div class="dropdown">
                                <ul>
                                    <li>পাবলিক পরীক্ষার ফলাফল
                                    </li>
                                    <li>একাডেমিক ফলাফল</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">যোগাযোগ</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="site__body">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-12">
                    <div class="carousel-wrap">
                        <div class="owl-carousel">
                            <div class="item" style="height: 300px">
                                <img src="https://placehold.co/500x500.png">
                            </div>
                            <div class="item" style="height: 300px">
                                <img src="https://placehold.co/500x500.png">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 notice">
                        <h5 class="mb-2">নোটিশবোর্ড</h5>
                        <ul class="list-group notice-list">
                            <li class="list-group-item list-icon">ক্লাস রুটিন</li>
                            <li class="list-group-item list-icon">এক নজরে</li>
                            <li class="list-group-item list-icon">এইচএসসি ২০২৩</li>
                        </ul>
                    </div>
                    <div class="row my-4 gy-2">
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="image-box">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <span class="d-block fw-bold border-bottom mb-3">
                                            প্রতিষ্ঠান পরিচিতি
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" height="auto"
                                            width="100%">
                                            <path fill="#000000"
                                                d="M224 128v704h576V128H224zm-32-64h640a32 32 0 0 1 32 32v768a32 32 0 0 1-32 32H192a32 32 0 0 1-32-32V96a32 32 0 0 1 32-32z" />
                                            <path fill="#000000" d="M64 832h896v64H64zm256-640h128v96H320z" />
                                            <path fill="#000000"
                                                d="M384 832h256v-64a128 128 0 1 0-256 0v64zm128-256a192 192 0 0 1 192 192v128H320V768a192 192 0 0 1 192-192zM320 384h128v96H320zm256-192h128v96H576zm0 192h128v96H576z" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-12">
                                        <ul class="about-list">
                                            <li class="list-icon">
                                                <a href="#">এক নজরে</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">সভাপতির বাণী</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">প্রধান শিক্ষকের বাণী</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">বর্তমান কমিটি</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="image-box">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <span class="d-block fw-bold border-bottom mb-3">
                                            শিক্ষক-কর্মচারী
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        <svg fill="#000000" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
                                            width="100%" height="auto">

                                            <title>employee_group_line</title>

                                            <g id="e1709d41-49e9-409f-9912-e2615f9236f6" data-name="Layer 3">

                                                <path
                                                    d="M18.42,16.31a5.7,5.7,0,1,1,5.76-5.7A5.74,5.74,0,0,1,18.42,16.31Zm0-9.4a3.7,3.7,0,1,0,3.76,3.7A3.74,3.74,0,0,0,18.42,6.91Z" />

                                                <path
                                                    d="M18.42,16.31a5.7,5.7,0,1,1,5.76-5.7A5.74,5.74,0,0,1,18.42,16.31Zm0-9.4a3.7,3.7,0,1,0,3.76,3.7A3.74,3.74,0,0,0,18.42,6.91Z" />

                                                <path
                                                    d="M21.91,17.65a20.6,20.6,0,0,0-13,2A1.77,1.77,0,0,0,8,21.25v3.56a1,1,0,0,0,2,0V21.38a18.92,18.92,0,0,1,12-1.68Z" />

                                                <path
                                                    d="M33,22H26.3V20.52a1,1,0,0,0-2,0V22H17a1,1,0,0,0-1,1V33a1,1,0,0,0,1,1H33a1,1,0,0,0,1-1V23A1,1,0,0,0,33,22ZM32,32H18V24h6.3v.41a1,1,0,0,0,2,0V24H32Z" />

                                                <rect x="21.81" y="27.42" width="5.96" height="1.4" />

                                                <path
                                                    d="M10.84,12.24a18,18,0,0,0-7.95,2A1.67,1.67,0,0,0,2,15.71v3.1a1,1,0,0,0,2,0v-2.9a16,16,0,0,1,7.58-1.67A7.28,7.28,0,0,1,10.84,12.24Z" />

                                                <path
                                                    d="M33.11,14.23a17.8,17.8,0,0,0-7.12-2,7.46,7.46,0,0,1-.73,2A15.89,15.89,0,0,1,32,15.91v2.9a1,1,0,1,0,2,0v-3.1A1.67,1.67,0,0,0,33.11,14.23Z" />

                                                <path
                                                    d="M10.66,10.61c0-.23,0-.45,0-.67a3.07,3.07,0,0,1,.54-6.11,3.15,3.15,0,0,1,2.2.89,8.16,8.16,0,0,1,1.7-1.08,5.13,5.13,0,0,0-9,3.27,5.1,5.1,0,0,0,4.7,5A7.42,7.42,0,0,1,10.66,10.61Z" />

                                                <path
                                                    d="M24.77,1.83a5.17,5.17,0,0,0-3.69,1.55,7.87,7.87,0,0,1,1.9,1,3.14,3.14,0,0,1,4.93,2.52,3.09,3.09,0,0,1-1.79,2.77,7.14,7.14,0,0,1,.06.93,7.88,7.88,0,0,1-.1,1.2,5.1,5.1,0,0,0,3.83-4.9A5.12,5.12,0,0,0,24.77,1.83Z" />

                                            </g>

                                        </svg>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-12">
                                        <ul class="about-list">
                                            <li class="list-icon">
                                                <a href="#">কর্মরত শিক্ষক-কর্মচারী</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">প্রাক্তন শিক্ষক-কর্মচারী</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="image-box">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <span class="d-block fw-bold border-bottom mb-3">
                                            ভর্তি সংক্রান্ত
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        <svg fill="#000000" height="auto" width="100%" version="1.1"
                                            id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 406.846 406.846"
                                            xml:space="preserve">
                                            <path
                                                d="M232.629,189.966c0-5.523,4.478-10,10-10h14.242c5.522,0,10,4.477,10,10s-4.478,10-10,10h-14.242  C237.107,199.966,232.629,195.489,232.629,189.966z M242.629,241.881h14.242c5.522,0,10-4.477,10-10s-4.478-10-10-10h-14.242  c-5.522,0-10,4.477-10,10S237.107,241.881,242.629,241.881z M149.975,157.61h58.931c5.522,0,10-4.477,10-10s-4.478-10-10-10h-58.931  c-5.523,0-10,4.477-10,10S144.452,157.61,149.975,157.61z M242.629,157.61h14.242c5.522,0,10-4.477,10-10s-4.478-10-10-10h-14.242  c-5.522,0-10,4.477-10,10S237.107,157.61,242.629,157.61z M348.39,58.355v338.49c0,5.523-4.478,10-10,10H68.456  c-5.523,0-10-4.477-10-10V58.355c0-5.523,4.477-10,10-10h51.332V34.177c0-5.523,4.477-10,10-10h38.054  C172.128,10.196,185.159,0,200.526,0c15.367,0,28.398,10.196,32.686,24.177h38.054c5.522,0,10,4.477,10,10v14.178h57.125  C343.912,48.355,348.39,52.833,348.39,58.355z M139.788,72.533h121.477V44.177h-36.562c-5.522,0-10-4.477-10-10  c0-7.817-6.36-14.177-14.178-14.177c-7.817,0-14.176,6.36-14.176,14.177c0,5.523-4.477,10-10,10h-36.562V72.533z M328.39,68.355  h-47.125v14.177c0,5.523-4.478,10-10,10H129.788c-5.523,0-10-4.477-10-10V68.355H78.456v318.49H328.39V68.355z M230.329,273.973  h58.57V119.001c0-5.523,4.478-10,10-10s10,4.477,10,10v164.895c0.003,0.448-0.023,0.896-0.08,1.338c0,0.001,0,0.003,0,0.004  c-0.001,0.008-0.002,0.015-0.003,0.022c-0.001,0.003-0.001,0.006-0.002,0.009c0,0.006-0.001,0.012-0.002,0.017  c-0.001,0.009-0.002,0.018-0.004,0.027c0,0.001,0,0.003,0,0.005c-0.001,0.007-0.002,0.014-0.003,0.021c0,0,0,0.001,0,0.001  c-0.048,0.344-0.113,0.685-0.196,1.021c-0.001,0.002-0.001,0.004-0.002,0.007c-0.001,0.005-0.002,0.011-0.004,0.017  c-0.001,0.004-0.002,0.008-0.003,0.013c-0.001,0.005-0.003,0.01-0.004,0.015c-0.002,0.008-0.004,0.015-0.006,0.023  c0,0.002-0.001,0.003-0.001,0.005c-0.003,0.009-0.005,0.017-0.007,0.026v0.001c-0.425,1.647-1.271,3.191-2.504,4.463  c-0.007,0.007-0.014,0.014-0.021,0.021c0,0-0.001,0.001-0.001,0.002c-0.014,0.014-0.027,0.027-0.041,0.042  c-0.002,0.001-0.004,0.003-0.006,0.005c-0.005,0.005-0.01,0.01-0.015,0.015c-0.002,0.002-0.004,0.004-0.006,0.006  c-0.007,0.006-0.013,0.013-0.02,0.02l-68.57,68.572c-0.008,0.008-0.015,0.015-0.022,0.022c-0.002,0.001-0.003,0.003-0.005,0.005  c-0.006,0.005-0.012,0.011-0.018,0.017c-0.005,0.005-0.01,0.01-0.016,0.016c-0.002,0.002-0.004,0.004-0.006,0.006  c-0.007,0.007-0.015,0.014-0.021,0.021c0,0,0,0-0.001,0c-1.26,1.23-2.791,2.077-4.426,2.509l-0.001,0  c-0.007,0.002-0.015,0.004-0.022,0.006c-0.006,0-0.014,0.002-0.02,0.005c-0.329,0.085-0.662,0.154-1,0.206c0,0,0,0-0.001,0  c-0.008,0.001-0.017,0.002-0.024,0.004c-0.009,0-0.017,0.003-0.024,0.003c-0.009,0.002-0.017,0.003-0.025,0.004  c-0.008,0.001-0.014,0.001-0.025,0.004c-0.468,0.066-0.941,0.101-1.415,0.101c-0.027,0-0.054,0-0.081,0H107.945  c-5.523,0-10-4.477-10-10V119.001c0-5.523,4.477-10,10-10s10,4.477,10,10v223.543h102.385v-58.572  C220.329,278.45,224.807,273.973,230.329,273.973z M240.329,328.402l34.429-34.429h-34.429V328.402z M149.975,199.966h58.931  c5.522,0,10-4.477,10-10s-4.478-10-10-10h-58.931c-5.523,0-10,4.477-10,10S144.452,199.966,149.975,199.966z M149.975,305.282h8.152  v8.152c0,5.523,4.477,10,10,10s10-4.477,10-10v-8.152h8.152c5.523,0,10-4.477,10-10s-4.477-10-10-10h-8.152v-8.153  c0-5.523-4.477-10-10-10s-10,4.477-10,10v8.153h-8.152c-5.523,0-10,4.477-10,10S144.452,305.282,149.975,305.282z M149.975,241.881  h58.931c5.522,0,10-4.477,10-10s-4.478-10-10-10h-58.931c-5.523,0-10,4.477-10,10S144.452,241.881,149.975,241.881z" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-12">
                                        <ul class="about-list">
                                            <li class="list-icon">
                                                <a href="#">ভর্তির আবেদন</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">ভর্তি পরীক্ষার ফলাফল</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">সকল নোটিশ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="image-box">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <span class="d-block fw-bold border-bottom mb-3">
                                            লাইব্রেরি কর্নার
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        <svg width="100%" height="auto" viewBox="0 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <title>ionicons-v5-l</title>
                                            <rect x="32" y="96" width="64" height="368"
                                                rx="16" ry="16"
                                                style="fill:none;stroke:#000000;stroke-linejoin:round;stroke-width:32px" />
                                            <line x1="112" y1="224" x2="240" y2="224"
                                                style="fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                            <line x1="112" y1="400" x2="240" y2="400"
                                                style="fill:none;stroke:#000000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px" />
                                            <rect x="112" y="160" width="128" height="304"
                                                rx="16" ry="16"
                                                style="fill:none;stroke:#000000;stroke-linejoin:round;stroke-width:32px" />
                                            <rect x="256" y="48" width="96" height="416"
                                                rx="16" ry="16"
                                                style="fill:none;stroke:#000000;stroke-linejoin:round;stroke-width:32px" />
                                            <path
                                                d="M422.46,96.11l-40.4,4.25c-11.12,1.17-19.18,11.57-17.93,23.1l34.92,321.59c1.26,11.53,11.37,20,22.49,18.84l40.4-4.25c11.12-1.17,19.18-11.57,17.93-23.1L445,115C443.69,103.42,433.58,94.94,422.46,96.11Z"
                                                style="fill:none;stroke:#000000;stroke-linejoin:round;stroke-width:32px" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-12">
                                        <ul class="about-list">
                                            <li class="list-icon">
                                                <a href="#">৭ই মার্চের ভাষণ</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">বঙ্গবন্ধুর জীবনী</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">প্রকাশিত বই</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="image-box">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <span class="d-block fw-bold border-bottom mb-3">
                                            জরুরি কল
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        <svg width="100%" height="auto" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M14.3308 15.9402L15.6608 14.6101C15.8655 14.403 16.1092 14.2384 16.3778 14.1262C16.6465 14.014 16.9347 13.9563 17.2258 13.9563C17.517 13.9563 17.8052 14.014 18.0739 14.1262C18.3425 14.2384 18.5862 14.403 18.7908 14.6101L20.3508 16.1702C20.5579 16.3748 20.7224 16.6183 20.8346 16.887C20.9468 17.1556 21.0046 17.444 21.0046 17.7351C21.0046 18.0263 20.9468 18.3146 20.8346 18.5833C20.7224 18.8519 20.5579 19.0954 20.3508 19.3L19.6408 20.02C19.1516 20.514 18.5189 20.841 17.8329 20.9541C17.1469 21.0672 16.4427 20.9609 15.8208 20.6501C10.4691 17.8952 6.11008 13.5396 3.35083 8.19019C3.03976 7.56761 2.93414 6.86242 3.04914 6.17603C3.16414 5.48963 3.49384 4.85731 3.99085 4.37012L4.70081 3.65015C5.11674 3.23673 5.67937 3.00464 6.26581 3.00464C6.85225 3.00464 7.41488 3.23673 7.83081 3.65015L9.40082 5.22021C9.81424 5.63615 10.0463 6.19871 10.0463 6.78516C10.0463 7.3716 9.81424 7.93416 9.40082 8.3501L8.0708 9.68018C8.95021 10.8697 9.91617 11.9926 10.9608 13.04C11.9994 14.0804 13.116 15.04 14.3008 15.9102L14.3308 15.9402Z"
                                                stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-12">
                                        <ul class="about-list">
                                            <li class="list-icon">
                                                <a href="#">তথ্য সেবা</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">পুলিশ</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">ডাক্তার</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">অভিভাবক</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="image-box">
                                <div class="row g-0">
                                    <div class="col-12">
                                        <span class="d-block fw-bold border-bottom mb-3">
                                            শিক্ষাথী
                                        </span>
                                    </div>
                                    <div class="col-md-4 col-sm-12 col-12">
                                        <svg fill="#000000" width="100%" height="auto" viewBox="-32 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M319.4 320.6L224 416l-95.4-95.4C57.1 323.7 0 382.2 0 454.4v9.6c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-9.6c0-72.2-57.1-130.7-128.6-133.8zM13.6 79.8l6.4 1.5v58.4c-7 4.2-12 11.5-12 20.3 0 8.4 4.6 15.4 11.1 19.7L3.5 242c-1.7 6.9 2.1 14 7.6 14h41.8c5.5 0 9.3-7.1 7.6-14l-15.6-62.3C51.4 175.4 56 168.4 56 160c0-8.8-5-16.1-12-20.3V87.1l66 15.9c-8.6 17.2-14 36.4-14 57 0 70.7 57.3 128 128 128s128-57.3 128-128c0-20.6-5.3-39.8-14-57l96.3-23.2c18.2-4.4 18.2-27.1 0-31.5l-190.4-46c-13-3.1-26.7-3.1-39.7 0L13.6 48.2c-18.1 4.4-18.1 27.2 0 31.6z" />
                                        </svg>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-12">
                                        <ul class="about-list">
                                            <li class="list-icon">
                                                <a href="#">অধ্যায়ণরত শিক্ষার্থীর তালিকা</a>
                                            </li>
                                            <li class="list-icon">
                                                <a href="#">অধ্যায়ণরত শিক্ষার্থীর সংখ্যা</a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="card mb-md-3 mb-sm-2 mb-2">
                        <div class="card-header">
                            <span class="fw-bold h5">প্রধান শিক্ষক</span>
                        </div>
                        <div class="d-block text-center my-2">
                            <img src="https://i.ibb.co/kGPwsfz/pngwing-com-6.png" alt="...">
                        </div>
                    </div>
                    <div class="card mb-md-3 mb-sm-2 mb-2">
                        <div class="card-header">
                            <span class="fw-bold h5">সভাপতি</span>
                        </div>
                        <div class="d-block text-center my-2">
                            <img src="https://i.ibb.co/kGPwsfz/pngwing-com-6.png" alt="...">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <span class="fw-bold h5">গুরুত্বপূর্ণ লিংক</span>
                        </div>
                        <!-- Hover added -->
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action list-icon">শিক্ষা
                                মন্ত্রণালয়</a>
                            <a href="#" class="list-group-item list-group-item-action list-icon">এমপিওর
                                আবেদন</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-3">
                    <div class="row g-0">
                        <div class="col-6">
                            <h5>পোস্ট/ফটো গ্যালারি</h5>

                        </div>
                        <div class="col-6 text-end">
                            <a href="/" class="text-dark">সকল পোস্ট</a>
                        </div>
                    </div>
                    <div class="gallery">
                        <a
                            href="https://www.banglarunnoyon.net/media/imgAll/2018September/-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%A5%E0%A6%AE%E0%A6%BF%E0%A6%95-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE-2002232340.jpg">
                            <img src="https://www.banglarunnoyon.net/media/imgAll/2018September/-%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A6%BE%E0%A6%A5%E0%A6%AE%E0%A6%BF%E0%A6%95-%E0%A6%B6%E0%A6%BF%E0%A6%95%E0%A7%8D%E0%A6%B7%E0%A6%BE-2002232340.jpg"
                                alt="Hydrangeas, called 'Hortensia' in Dutch"></a>
                        <a
                            href="https://cdn.jagonews24.com/media/imgAllNew/BG/2019November/primary-education-20211025201321.jpg">
                            <img src="https://cdn.jagonews24.com/media/imgAllNew/BG/2019November/primary-education-20211025201321.jpg"
                                alt="Hydrangeas, called 'Hortensia' in Dutch"></a>
                        <a
                            href="https://samakal.com/uploads/2022/11/online/photos/Primary-Education-samakal-63613b67d9cff.jpg">
                            <img src="https://samakal.com/uploads/2022/11/online/photos/Primary-Education-samakal-63613b67d9cff.jpg"
                                alt="Hydrangeas, called 'Hortensia' in Dutch"></a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="site__footer bg-light">
            <div class="row px-2 py-3">
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="d-flex flex-column align-items-start">
                        <span class="fw-bold">কারিগরী সহায়তায়</span>
                        <span>
                            আরসিটি সেবা ভোলা
                        </span>
                    </div>
                </div>
                <div class="col-md-6 col-12"></div>
                <div class="col-md-3 col-sm-12 col-12">
                    <div class="d-flex flex-column align-items-end">
                        <span class="fw-bold">পরিকল্পনায় ও বাস্তবায়নে</span>
                        <span>বিদ্যালয় ও পরিদর্শণ শাখা</span>
                        <span>মাধ্যমিক ও উচ্চ মাধ্যমিক শিক্ষা অধিদপ্তর</span>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="d-block text-center bg-white pt-3 pb-2">
                    সর্বশেষ আপডেট ১৯ জুলাই ২০২৩
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Add fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        type="text/css" media="screen" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/index.js') }}"></script>
</body>

</html>
