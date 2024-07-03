<!DOCTYPE html>
<html lang="en">

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
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="<?php echo e(asset('user/assets/img/navbar-logo.svg')); ?>" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="container mt-5">
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0 sortable">
                        @foreach ($menus as $menu)
                        <li class="nav-item d-flex align-items-center" data-id="{{ $menu->id }}">

                            <input type="checkbox" name="selected_menus[]" value="{{ $menu->id }}" class="menu-checkbox">

                            <a class="nav-link editable" contenteditable="false" href="{{ $menu->url }}">{{ $menu->title }}</a>
                            @auth
                            <button class="btn btn-primary btn-sm ms-2 edit-button">Edit</button>
                            @endauth
                        </li>
                        @endforeach
                        <ul class="navbar-nav ms-auto">
                            @guest
                            <li class="nav-item"><a class="btn btn-outline-warning" href="{{ route('user.create') }}">SIGN UP</a></li>
                            <li class="nav-item"><a class="btn btn-outline-warning" href="{{ route('login') }}">LOG IN</a></li>
                            @else
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                                    <span class="text-uppercase nav-profile-name">Hello {{ Auth::user()->name }}</span>
                                    <!-- <img style=" width: 25%; height: 25px;" src="{{ asset('admin/uploads/user/'.Auth::user()->image) }}" alt="profile" /> -->
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                    <a id="logout-link" class="dropdown-item" href="#">
                                        <i class="mdi mdi-logout text-primary"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <script>
                                        document.getElementById('logout-link').addEventListener('click', function(event) {
                                            event.preventDefault();
                                            document.getElementById('logout-form').submit();
                                        });
                                    </script>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </ul>

                </div>
                <div class="notification alert" id="notification"></div>

                @auth
                <form id="add-selected-menus-form" method="POST" action="{{ route('addSelectedMenusToIntermediateTable') }}">
                    @csrf
                    <input type="hidden" name="page_id" value="{{ $page->id }}">

                    <button type="submit" class="btn btn-primary mt-3">Create Web</button>
                </form>
                @endauth
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Xử lý khi nhấn nút "Create WEb"
                    document.getElementById('add-selected-menus-form').addEventListener('submit', function(event) {
                        event.preventDefault();

                        let selectedMenus = [];
                        let selectedSections = [];
                        document.querySelectorAll('.menu-checkbox:checked').forEach(function(checkbox) {
                            selectedMenus.push(checkbox.value);
                        });
                        document.querySelectorAll('.section-checkbox:checked').forEach(function(checkbox) {
                            selectedSections.push(checkbox.value);
                        });
                        // Gửi yêu cầu POST đến route để thêm các menu đã chọn vào bảng trung gian
                        fetch('{{ route("addSelectedMenusToIntermediateTable") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    page_id: '{{ $page->id }}',
                                    menu_id: selectedMenus,
                                    session_id: selectedSections

                                })
                            })
                            .then(response => {
                                if (response.ok) {
                                    return response.json();
                                }
                                throw new Error('Network response was not ok.');
                            })
                            .then(data => {
                                // Xử lý dữ liệu trả về (nếu cần)
                                console.log(data);
                                document.getElementById('notification').classList.add('alert-success');
                                document.getElementById('notification').textContent = 'Selected menus added to intermediate table successfully.';
                                window.location.href = '/page';
                            })
                      
                            .catch(error => {
                                console.error('Error:', error);
                                document.getElementById('notification').classList.add('alert-danger');
                                document.getElementById('notification').textContent = 'Failed to add selected menus to intermediate table.';
                            });
                    });

                });
            </script>
            <script>
                document.getElementById('logout-link').addEventListener('click', function(event) {
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            </script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    @auth
                    document.querySelectorAll('.edit-button').forEach(function(button) {
                        button.addEventListener('click', function() {
                            const navLink = this.previousElementSibling;
                            navLink.contentEditable = true;
                            navLink.focus();
                        });
                    });
                    @endauth
                    @guest
                    document.querySelectorAll('.editable').forEach(function(element) {
                        element.setAttribute('contenteditable', 'false');
                    });
                    document.querySelectorAll('.edit-button').forEach(function(button) {
                        button.style.display = 'none';
                    });
                    @endguest
                });
            </script>
    </nav>
    <script>
        $(document).ready(function() {
            // Enable sorting on the menu list
            $(".sortable").sortable({
                update: function(event, ui) {
                    var sortedItems = $(".sortable").children('li');
                    var updatedPositions = [];

                    sortedItems.each(function(index, element) {
                        var id = $(element).data('id');
                        var position = index + 1; // New position based on the sorted order
                        updatedPositions.push({
                            id: id,
                            position: position
                        });
                        $(element).data('position', position); // Update the data-position attribute
                    });

                    // Send the new positions to the server
                    $.ajax({
                        url: '{{ route("menus.updateOrder") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            order: updatedPositions
                        },
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + error);
                        }
                    });
                }
            });

            $('.edit-button').on('click', function() {
                var $editable = $(this).siblings('.editable');
                $editable.attr('contenteditable', 'true').focus();
            });

            $('.editable').on('blur', function() {
                var $this = $(this);
                var id = $this.parent().data('id');
                var title = $this.text();
                $this.attr('contenteditable', 'false');

                $.ajax({
                    url: '/master/' + id,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        title: title
                    },
                    success: function(response) {
                        showNotification('success', response.success);
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + error);
                        showNotification('danger', 'Failed to update menu item.');
                    }
                });
            });

            function showNotification(type, message) {
                var $notification = $('#notification');
                $notification.removeClass('alert-success alert-danger').addClass('alert-' + type).text(message).fadeIn();

                setTimeout(function() {
                    $notification.fadeOut();
                }, 3000);
            }
        });
    </script>
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
        <input type="checkbox" name="sections[]" value="{{ $section->id }}" class="section-checkbox">
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