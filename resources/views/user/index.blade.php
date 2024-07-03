<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bao gồm thư viện SweetAlert2 và jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
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
    </style>
</head>
@extends('masteradmin')
@section('content')

<body>
    <h4 class="card-title">Users Table</h4>
    <div class="container-fluid">

        <table class="table table-striped" style=" border-collapse: collapse;
  width: 100%;">
            <thead class="thead-light">
                <tr style="text-align: center;">
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ asset('admin/uploads/user/' . $user->image) }}" alt="User Image"></td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="confirmDelete()">DELETE</button>
                            <a href="{{ route('users.edit', [$user->id]) }}" class="btn btn-outline-primary ">UPDATE</a>
                            <a href="{{ route('users.show', [$user->id]) }}" class="btn btn-outline-info">SHOW</a>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links('pagination::bootstrap-5') }}

    @if (session('success'))
    <script>
        $(document).ready(function() {
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
            @endif
        });
    </script>
    @endif

    <script>
        function confirmDelete() {
            if (confirm('Bạn có chắc chắn muốn xóa?')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
</body>

</html>
@endsection