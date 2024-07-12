<!DOCTYPE html>
<html lang="en">
@extends('masteradmin')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </style>
</head>

<body>
    <div class="content-wrapper">
        <h2>Detail</h2>
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
                            <td>Title</td>
                            <td>{{ $menu->title }}</td>
                        </tr>

                        <tr>
                            <td>URL</td>
                            <td>{{ $menu->url }}</td>
                        </tr>
                        <tr>
                            <td>Actice</td>
                            <td>
                                @if($menu->active)
                                <span style="color: green;">Active</span>
                                @else
                                <span style="color: red;">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
@endsection