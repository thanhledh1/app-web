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
@extends('masteradmin')
@section('content')
    <div class="container-fluid">
        <h2> Section </h2>
        <table class="table table-striped" style=" border-collapse: collapse;
  width: 100%;">
            <thead class="thead-light">
                <tr style="text-align: center;">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">File Name</th>
                    <th scope="col">COS</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($sections as $section)
                <tr>
                    <th scope="row">{{ $section->id }}</th>
                    <td>{{ $section->name }}</td>
                    <td>{{ $section->filename }}</td>
                    <td>{{ $section->cos }}</td>
                    <td>
                        <form action="{{ route('section.destroy', $section->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="confirmDelete()" >DELETE</button>
                            <a href="{{ route('section.edit', [$section->id]) }}" class="btn btn-outline-primary">UPDATE</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
<script>
    function confirmDelete() {
        if (confirm('Bạn có chắc chắn muốn xóa?')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endsection
