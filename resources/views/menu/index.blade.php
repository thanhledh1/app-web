<!DOCTYPE html>
<html lang="en">
@extends('masteradmin')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bao gồm thư viện SweetAlert2 và jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

<body>
    <h4 class="card-title">Menu Table</h4>

    <div class="container-fluid">
        <table class="table table-bordered" style="border-collapse: collapse; width: 100%;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">URL</th>
                    <th scope="col">Position</th>
                    <th scope="col">Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                <tr>
                    <th scope="row">{{ $menu->id }}</th>
                    <td>{{ $menu->title }}</td>
                    <td>{{ $menu->url }}</td>
                    <td>{{ $menu->position }}</td>
                    <td>
                        @if($menu->active)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">DELETE</button>
                            <a href="{{ route('menu.edit', [$menu->id]) }}" class="btn btn-outline-primary">UPDATE</a>
                            <a href="{{ route('menu.show', [$menu->id]) }}" class="btn btn-outline-info">SHOW</a>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {{ $menus->links('pagination::bootstrap-5') }}

    @if (session('success'))
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('
                success ') }}',
                showConfirmButton: false,
                timer: 2000
            });
            @endif
        });
    </script>
    @endif
</body>

</html>
@endsection