<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1 style="color:RGB(0,190,243);">Password Link</h1>
Hi {{$user->name}}
<p>Please click below link to reset your password. <br>
<a href="{{$resetLink}}" style="color:RGB(0,190,243);" >Click here</a> to activate the account.</p>

<br>
Best Regards,
{{ config('app.name') }}
</body>
</html>