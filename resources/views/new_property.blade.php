<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zameen Dekho</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card my-5">
            <div class="card-body">
                <h3 class="text-center">New Property Entry</h3>
                <form action="{{ route('save_new_property') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Owner Name : </label>
                        <div class="col-sm-10">
                            <input type="text" name="owner" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Owner Contact : </label>
                        <div class="col-sm-10">
                            <input type="text" name="owner_contact" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Address : </label>
                        <div class="col-sm-10">
                            <input type="text" name="address" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Image Url : </label>
                        <div class="col-sm-10">
                            <input type="text" name="image_url" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Description : </label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Amount : </label>
                        <div class="col-sm-10">
                            <input type="text" name="amount" class="form-control" id="inputEmail3">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Action : </label>
                        <div class="col-sm-10">
                            <select name="action" class="form-select" id="">
                                <option value="">Select Action</option>
                                <option value="rent">Rent</option>
                                <option value="sale">Sell</option>
                            </select>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
