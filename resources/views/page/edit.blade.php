<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @extends('masteradmin')
    @section('content')
    <div class="container">
        <h2>Edit Page</h2>
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('page.update', $page->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Page Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $page->name }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Domain: </label>
                        <input type="text" class="form-control" id="domain" name="domain" value="{{ $page->domain }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Logo: </label>
                        <input class="form-control" type="file" id="logo" name="logo"  value="{{ $page->logo}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection