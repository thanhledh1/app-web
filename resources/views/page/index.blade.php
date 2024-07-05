<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @extends('masteradmin')
    @section('content')
    <h4 class="card-title">LIST WEB</h4>
    <div class="container-fluid">
        <a href="{{ route('page.create')}}"  class="btn btn-inverse-success btn-fw">+</a> 

        <table class="table table-bordered" style="border-collapse: collapse; width: 100%;">
            <thead class="thead-light">
                <tr style="text-align: center;">
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Domain</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                @foreach ($pages as $page)
                <tr>
                    <th scope="row">{{ $page->id }}</th>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->domain }}</td>
                    <td>{{ $page->user->name }}</td>

                    <td><img src="{{ asset('admin/uploads/logo/' . $page->logo) }}"></td>

                   
                    <td>
                        <form action="{{ route('page.destroy', $page->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">DELETE</button>
                            <a href="{{ route('page.show', [$page->id]) }}" class="btn btn-outline-info">SHOW</a>

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {{ $pages->links('pagination::bootstrap-5') }}

    @endsection

</body>
</html>