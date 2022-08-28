<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{URL::asset('css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"

    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
</head>
<body>
    <div style="text-align: center; margin-top:100px;">
        {{-- <input hidden id="token" type="text" value="{{session()->get('token')}}" /> --}}
        {{-- {{session()->get('token')}} --}}
        <h1>hello its the dashboard</h1>
        <br>
        <a href="{{route('logout')}}" id="logout"  class="btn btn-primary">Logout</a>
    </div>
    <script>

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function setCookie(cname, cvalue) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";";
}
        // console.log($('#token').val());
        // sessionStorage.setItem("name", "dev");
        // setCookie('token2',$('#token').val() )
        console.log(getCookie('token'));
        sessionStorage.setItem("token", $('#token').val());
        const token  = sessionStorage.getItem('token');
        if( !(sessionStorage.getItem('token'))){
        // sessionStorage.setItem("token", $('#token').val());
        // console.log($('#token').val());

            // window.location.href = '/login'

        }
        // if(localStorage.getItem('token')){
        //     window.location.href= '/dashboard'
        // }
        $('#logout').click(function(){
        sessionStorage.removeItem("token");

        });
    </script>
</body>
</html>
