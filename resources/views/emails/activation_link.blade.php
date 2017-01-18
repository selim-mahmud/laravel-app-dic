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
<h1 style="color:RGB(0,190,243);">Account Activation Link</h1>

<p>Your account with Driving Instructors Catalog has been created. <br>
<a href="{{$activation_link}}" style="color:RGB(0,190,243);" >Click here</a> to activate the account.</p>

<br>
Best Regards,
{{--<br><img src="{{asset('img/theme/dic_logo.png')}}" alt="Driving Instructors Catalog" style="padding:0px; margin:5px"/>--}}
<br><img src="{{$message->embed(asset('img/theme/dic_logo.png'))}}" alt="Driving Instructors Catalog" style="padding:0px; margin:5px"/>

</body>
</html>