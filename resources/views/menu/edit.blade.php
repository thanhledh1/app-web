<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Edit Menu</h2>
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('menu.admin.update', $menu->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $menu->title }}">
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" value="{{ $menu->url }}">
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="number" class="form-control" id="position" name="position" value="{{ $menu->position }}">
                    </div>
                    <div class="form-group">
                        <label for="active">Active</label>
                        <select class="form-control" id="active" name="active">
                            <option value="1" {{ $menu->active == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $menu->active == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
