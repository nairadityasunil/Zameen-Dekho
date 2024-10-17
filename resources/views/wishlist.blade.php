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
    <div class="container my-3">
        <h3>Wishlist</h3>
        <div class="row my-3">
            @foreach ($wishlist as $p)
                <div class="col-sm-4 my-2 ">
                    <div class="card" style="width: 25rem;">
                        <img class="card-img-top" src="{{$p->image_url}}" alt="Card image cap">
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td>
                                        <b>Owner : </b>{{$p->owner}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Contact : </b>{{$p->owner_contact}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Address : </b>{{$p->Address}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Description : </b>{{$p->description}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Amount : </b>{{$p->amount}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Action : </b>
                                        @if ($p->action == 'sale')
                                        <span style="color: red; font-weight:bold">{{ $p->action }}</span>
                                    @else
                                        <span style="color: green; font-weight:bold">{{ $p->action }}</span>
                                    @endif
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <a href="{{url('remove_wishlist')}}/{{$p->id}}" class="btn btn-danger">Remove</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
