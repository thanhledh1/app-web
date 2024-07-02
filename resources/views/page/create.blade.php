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
    <div class="container">
        <h2>Create New Page</h2>
        <div class="row">
            <div class="col-lg-6">
            <form action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="domain">Domain:</label>
                <input type="text" class="form-control" id="domain" name="domain" required>
            </div>
            <div class="form-group">
                <label for="image">Logo:</label>
                <input type="file" class="form-control-file" id="logo" name="logo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
            </div>
    </div>
</body>

</html>
@endsection