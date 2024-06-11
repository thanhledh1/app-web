<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New sectionon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Create New section</h2>
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('section.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Section Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">HTML-Content</label>
                        <textarea class="form-control @error('html_content') is-invalid @enderror" id="html_content" name="html_content" rows="5">{{ old('html_content') }}</textarea>
                        @error('html_content')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>