<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit section</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Edit section</h2>
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('section.update', $section->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Section Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $section->name }}">
                    </div>
                    <div class="form-group">
                        <label for="html_content">HTML-Content</label>
                        <textarea class="form-control" id="html_content" name="html_content" rows="5">{{ $section->html_content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>