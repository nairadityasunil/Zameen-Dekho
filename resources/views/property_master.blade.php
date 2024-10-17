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
        <div class="card my-3">
            <h3 class="text-center my-3">Property Master</h3>
            <div class="card-body">
                <form action="{{ route('search_property') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Owner Name : </label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $owner ?? '' }}" name="owner" class="form-control"
                                id="inputEmail3">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('all_properties') }}">
                        <button type="button" class="btn btn-danger">Reset Form</button>
                    </a>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="text-center my-1">All Properties</h3>
                <div class="container-fluid">
                    <table class="table text-center table-bordered my-3">
                        <thead class="table-dark">
                            <tr>
                                <th>Sr.no</th>
                                <th>Image</th>
                                <th>Owner Name</th>
                                <th>Owner Contact</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Action</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_properties as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ $p->image_url }}" style="width:120px" alt="">
                                    </td>
                                    <td>{{ $p->owner }}</td>
                                    <td>{{ $p->owner_contact }}</td>
                                    <td>{{ $p->address }}</td>
                                    <td>{{ $p->description }}</td>
                                    <td>{{ $p->amount }}</td>
                                    @if ($p->action == 'sale')
                                        <td style="color: red; font-weight:bold">{{ $p->action }}</td>
                                    @else
                                        <td style="color: green; font-weight:bold">{{ $p->action }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ url('update_property') }}/{{ $p->id }}"
                                            class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete_property') }}/{{ $p->id }}" class="btn btn-danger">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
