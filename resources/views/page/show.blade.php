<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('masteradmin')
    @section('content')
    <div class="content-wrapper">
        <h2>Detail Page</h2>
        <div class="row">
            <div class="col-lg-6">

                <table class="table table-bordered" style=" border-collapse: collapse;
  width: 100%;">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $page->name }}</td>
                        </tr>

                        <tr>
                            <td>Domain</td>
                            <td>{{ $page->domain }}</td>
                        </tr>
                        <td>Logo</td>
                        <td>
                            <img src="{{ asset('admin/uploads/logo/' . $page->logo) }}" alt="User Image" style="cursor: pointer;" data-toggle="modal" data-target="#imageModal" onclick="showImageModal(this)">
                        </td>
                        </tr>

                        <tr>
                            <td>Created By</td>
                            <td>{{ $page->user->name }}</td>
                        </tr>
                        <tr>
                            <td>Menu</td>
                            <td>
                                <ul>
                                    @foreach ($page->menus as $menu)
                                    <li>{{ $menu->title }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                <td>Sessions</td>
                <td>
                    <ul>
                        @foreach ($page->sessions as $session)
                            <li>{{ $session->name }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal hình ảnh -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">User Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="User Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function showImageModal(element) {
            const imageSrc = element.src;
            document.getElementById('modalImage').src = imageSrc;
        }
    </script>
</body>
@endsection

</html>