<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<h1>Contact message from {{config('app.name')}}</h1><br />
<p>Hello Admins,</p>
<h4>A message has been sent with following details:</h4>
<p><b>Name: </b>{{$formData['full_name']}}</p>
<p><b>Email: </b>{{$formData['email']}}</p>
<p><b>Phone: </b>{{$formData['contact_number']}}</p>
<p><b>Subject: </b>{{$formData['subject']}}</p>
<p><b>Message: </b>{{$formData['message']}}</p>
<br />
<p>Best Regards,</p>
{{config('app.name')}}

</body>

</html>