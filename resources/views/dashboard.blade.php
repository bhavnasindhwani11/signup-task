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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"

    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
    // <meta name="_token" content="{{ csrf_token() }}" />

</script>
</head>
<body>
    <div style="text-align: center; margin-top:100px;">
        <input hidden id="token" type="text" value="{{Cookie::get('token')}}" />
        {{-- {{session()->get('token')}} --}}
        <h1>hello its the dashboard</h1>
        <br>
        <a
        href="#"
         id="logout"  class="btn btn-primary">Logout</a>
    </div>
    <script>
        console.log($('#token').val());
        // localStorage.setItem("token", $('#token').val());

        if( $('#token').val() === ""){
            document.location.href = '/login'

        }

        $('#logout').click(function(){
        // localStorage.removeItem("token");
        console.log('hh');

            jQuery.ajax({
                  url: "{{ url('/remove-token') }}",
                  method: 'GET',
                  data: {
                    //  token: jQuery('#token').val(),
                //     //  type: jQuery('#type').val(),
                //     //  price: jQuery('#price').val()
                  },
                  success: function(result){
                     console.log(result);
                        if(result === 'logged out successfully'){
                            document.location.href = '/login'
                        }
                  }});

        });
    </script>
</body>
</html>
