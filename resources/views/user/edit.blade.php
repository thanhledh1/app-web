<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container ">
        <h2>Edit</h2>
        <div class="row">
            <div class="col-lg-6">

                <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">User name</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" value="{{ $user->email }}"name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" value="{{ $user->password }}"name="password" id="exampleInputPassword1" placeholder="Password">
                    </div>

                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Avatar</label>
                        <input class="form-control" type="file" id="formFileMultiple"name="image" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
           

        </div>
</body>

</html>