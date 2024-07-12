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
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="domain">Domain:</label>
                        <input type="text" class="form-control" id="domain" name="domain" value="{{ old('domain') }}">
                        @error('domain')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label for="name">Logo:</label>
                        <input class="form-control file-upload-default" type="file" id="logo" name="logo" value="{{ old('logo') }}">
                        <div class="input-group col-xs-12 mt-2">
                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        @error('logo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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