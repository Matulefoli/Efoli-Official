<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
</head>
<body>
    @php
        $setting=App\Setting::first();
    @endphp
    <div style="width:100%;background:white;padding:10px;margin:10px">
        <img src="{{asset($setting->ws_logo)}}" height="100px" width="100px" alt="">
        <p style="background:oldlace;font-size:19px;font-weight:700">
            Dear {{$contact->sender_email}}, <br>
            <h3>We just received a message from your email. </h3>
            Thank you for your Message. Our Team will go through it very quickly.
            
        </p>
        <br>
        <p>
            Your Trusted friend {{$setting->ws_title}}
            <br>
            <a href="{{url('/')}}">Go to Home site</a>
        </p>
        <p>
            if that wasn't you, please ignore and incase let us know..
        </p>
    </div>
</body>
</html>