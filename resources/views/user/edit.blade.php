@extends('masteradmin')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Edit User</h2>
        <div class="row">
            <div class="col-lg-6">
                <form class="forms-sample" action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">User name:</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email address: </label>
                        <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="name">Password </label>
                        <input type="password" class="form-control" value="{{ $user->password }}" name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="name">Avatar:</label>
                        <input class="form-control file-upload-default" type="file" id="logo" name="image" value="{{ $user->image }}">
                        <div class="input-group col-xs-12 mt-2">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-light">Cancel</button>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.file-upload-browse').addEventListener('click', function() {
            var fileInput = document.querySelector('.file-upload-default');
            fileInput.click();
        });

        document.querySelector('.file-upload-default').addEventListener('change', function() {
            var fileName = this.value.split('\\').pop();
            document.querySelector('.file-upload-info').value = fileName;
        });
    </script>
</body>

</html>
@endsection