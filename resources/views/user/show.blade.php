<!DOCTYPE html>
<html lang="en">
@extends('masteradmin')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Include Bootstrap JS and jQuery -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        img {
            border: 1px solid #ddd;
            border-radius: 2px;
            padding: 2px;
            width: 50px;
        }

        td,
        th {
            text-align: center;
        }

        .modal-dialog {
            max-width: 20%;
            /* Tăng kích thước của modal */
        }

        .modal-body img {
            width: 110%;
            /* Hình ảnh chiếm toàn bộ chiều rộng modal */
            height: auto;
            /* Giữ nguyên tỉ lệ của hình ảnh */
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <h2>Detail</h2>
        <div class="row">
            <div class="col-lg-6">

                <table class="table table-bordered" style=" border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <td>Image</td>
                        <td>
                            <img src="{{ asset('admin/uploads/user/' . $user->image) }}" alt="User Image" style="cursor: pointer;" data-toggle="modal" data-target="#imageModal" onclick="showImageModal(this)">
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

    <script>
        function showImageModal(element) {
            const imageSrc = element.src;
            document.getElementById('modalImage').src = imageSrc;
        }
    </script>
</body>
</html>
@endsection