<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Stocks</title>
</head>
<body>
    <div class="container" style="margin: 40px;">
        <h1 class="display-3">Stocks</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Stock Name</th>
                    <th>Stock Ticket</th>
                    <th>Stock Value</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $stock)
                <tr>
                    <td>{{$stock->id}}</td>
                    <td>{{$stock->stock_name}}</td>
                    <td>{{$stock->ticket}}</td>
                    <td>{{$stock->value}}</td>
                    <td>{{$stock->updated_at}}</td>
                    <td>
                        <a href="/stocks/edit/{{$stock->id}}" class="btn btn-primary">Edit</a>
                        <form action="/stocks/destroy/{{$stock->id}}" method="post" style="display: inline;">
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
