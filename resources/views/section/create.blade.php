<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Create New Section</h2><br>
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('section.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Section Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">file name</label>
                        <input type="text" class="form-control @error('filename') is-invalid @enderror" id="filename" name="filename" value="{{ old('filename') }}">
                        @error('filename')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">COS</label>
                        <input type="number" class="form-control @error('cos') is-invalid @enderror" id="cos" name="cos" value="{{ old('cos') }}">
                        @error('cos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="image">Text 1</label>
                            <input type="text" class="form-control @error('text_1') is-invalid @enderror" id="text_1" name="text_1" value="{{ old('text_1') }}">
                            @error('text_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="text_2">Text 2</label>
                            <input type="text" class="form-control @error('text_2') is-invalid @enderror" id="text_2" name="text_2" value="{{ old('text_2') }}">
                            @error('text_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="text_3">Text 3</label>
                            <input type="text" class="form-control @error('text_3') is-invalid @enderror" id="text_3" name="text_3" value="{{ old('text_3') }}">
                            @error('text_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="text_4">Text 4</label>
                            <input type="text" class="form-control @error('text_4') is-invalid @enderror" id="text_4" name="text_4" value="{{ old('text_4') }}">
                            @error('text_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="text_5">Text 5</label>
                            <input type="text" class="form-control @error('text_5') is-invalid @enderror" id="text_5" name="text_5" value="{{ old('text_5') }}">
                            @error('text_5')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="text_6">Text 6</label>
                            <input type="text" class="form-control @error('text_6') is-invalid @enderror" id="text_6" name="text_6" value="{{ old('text_6') }}">
                            @error('text_6')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="text_7">Text 7</label>
                            <input type="text" class="form-control @error('text_7') is-invalid @enderror" id="text_7" name="text_7" value="{{ old('text_7') }}">
                            @error('text_7')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="text_8">Text 8</label>
                            <input type="text" class="form-control @error('text_8') is-invalid @enderror" id="text_8" name="text_8" value="{{ old('text_8') }}">
                            @error('text_8')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="text_9">Text 9</label>
                            <input type="text" class="form-control @error('text_9') is-invalid @enderror" id="text_9" name="text_9" value="{{ old('text_9') }}">
                            @error('text_9')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="text_10">Text 10</label>
                            <input type="text" class="form-control @error('text_10') is-invalid @enderror" id="text_10" name="text_10" value="{{ old('text_10') }}">
                            @error('text_10')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="file_1">File 1</label>
                            <input type="file" class="form-control @error('image_1') is-invalid @enderror" id="image_1" name="image_1">
                            @error('image_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="image_2">image 2</label>
                            <input type="file" class="form-control @error('image_2') is-invalid @enderror" id="image_2" name="image_2">
                            @error('image_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="image_3">image 3</label>
                            <input type="file" class="form-control @error('image_3') is-invalid @enderror" id="image_3" name="image_3">
                            @error('image_3')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="image_4">image 4</label>
                            <input type="file" class="form-control @error('image_4') is-invalid @enderror" id="image_4" name="image_4">
                            @error('image_4')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="image_5">image 5</label>
                            <input type="file" class="form-control @error('image_5') is-invalid @enderror" id="image_5" name="image_5">
                            @error('image_5')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="image_6">image 6</label>
                            <input type="file" class="form-control @error('image_6') is-invalid @enderror" id="image_6" name="image_6">
                            @error('image_6')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="image_7">image 7</label>
                            <input type="file" class="form-control @error('image_7') is-invalid @enderror" id="image_7" name="image_7">
                            @error('image_7')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="image_8">image 8</label>
                            <input type="file" class="form-control @error('image_8') is-invalid @enderror" id="image_8" name="image_8">
                            @error('image_8')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <a href="{{ route('section.index') }}" class="btn btn-primary btn-lg btn-danger">Back</a>
                    <button type="submit" class="btn btn-primary btn-lg btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>