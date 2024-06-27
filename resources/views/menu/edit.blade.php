<!DOCTYPE html>
<html lang="en">
@extends('masteradmin')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
 

    <div class="card-body">
                    <h4 class="card-title">Edit Menu</h4>
                    <p class="card-description">
                     
                    </p>
                    <form class="forms-sample" action="{{ route('menu.update', $menu->id) }}" method="post">
                    @csrf
                    @method('PUT')
                      <div class="form-group col-md-8 ">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control"  id="title" name="title" value="{{ $menu->title }}">
                      </div>
                      <div class="form-group col-md-8 ">
                        <label for="exampleInputEmail3">URL</label>
                        <input type="email" class="form-control" id="url" name="url" value="{{ $menu->url }}">
                      </div>
                      <div class="form-group col-md-8 ">
                        <label for="exampleInputPassword4">Position</label>
                        <input type="number" class="form-control" id="position" name="position" value="{{ $menu->position }}">
                      </div>
                      <div class="form-group col-md-8 ">
                        <label for="exampleSelectGender">Active</label>
                        <select class="form-select"id="active" name="active">
                        <option value="1" {{ $menu->active == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $menu->active == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                      </div>
                   
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
</body>

</html>
@endsection
