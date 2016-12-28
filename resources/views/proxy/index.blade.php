@extends('layouts.app_user')

@section('content_user')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learn Laravel 5</title>

    <link href="//cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
    <h2 style="color:red;padding:40px"> now {{ $count }}</h2>
    <div id="content" style="padding: 50px;">


            <table style="width:60%;left:80px">
              <tr>
                <th><h2>proxy_ip</h2></th>
                <th><h2>count</h2></th>
              </tr>
                @foreach ($flights as $comment)

              <tr>
                <td><h3>{{ $comment->ip.":".$comment->port }}</h3></td>
                <td><h3>{{ $comment->count }}</h3></td>
              </tr>
                @endforeach

            </table>

        </div>

    </div>

</body>
</html>
@endsection