<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Project-Laravel</title>
    <!-- Favicon-->
    <link rel="icon" type="<?php echo e(asset('user/image/x-icon')); ?>" href="<?php echo e(asset('user/assets/favicon.ico')); ?>" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="<?php echo e(asset('user/text/css')); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="<?php echo e(asset('user/text/css')); ?>" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo e(asset('user/css/styles.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
        .editable {
            cursor: pointer;
        }

        .edit-button {
            margin-left: 10px;
        }

        .notification {
            display: none;
            margin-top: 10px;
        }

        .sortable-placeholder {
            border: 1px dashed #ccc;
            background: #f9f9f9;
            height: 40px;
            margin-bottom: 10px;
        }

        .mt-3 {
            margin-left: 63rem !important;
        }

        ;
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img style="height: 8rem;" src="{{ asset('admin/uploads/logo/'.$page->logo) }}" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="container mt-5">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0 sortable">
                        @foreach ($menus as $menu)
                        <li class="nav-item d-flex align-items-center" data-id="{{ $menu->id }}">
                            <a class="nav-link editable" contenteditable="false" href="{{ $menu->url }}">{{ $menu->title }}</a>
                            @auth
                            <button class="btn btn-primary btn-sm ms-2 edit-button">Edit</button>
                            @endauth
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="notification alert" id="notification"></div>
            </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Welcome To Our Studio!</div>
            <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>
        </div>
    </header>
    @foreach ($sections as $section)
    <div>
        @include($section->filename)
    </div>
    @endforeach
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo e(asset('user/js/scripts.js')); ?>"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>