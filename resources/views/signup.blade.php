<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <meta name="_token" content="{{ csrf_token() }}" />

    <!-- Title Page-->
    {{-- <title>Au Register Forms by Colorlib</title> --}}

    <!-- Icons font CSS-->
    <link href=" {{URL::asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}} " rel="stylesheet" media="all">
    <link href="{{URL::asset('vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"

    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>
    <!-- Vendor CSS-->
    <link href="{{URL::asset('vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href=" {{URL::asset('vendor/datepicker/daterangepicker.css')}} " rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{URL::asset('css/main.css')}}" rel="stylesheet" media="all">
    <title>Signup Page</title>
</head>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST" action="{{route('users.register')}}">
                        @csrf
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input required class="input--style-4" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input required class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Birthday</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input required id="send-email" class="input--style-4" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input required class="input--style-4" type="number" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="">Confirm Password</label>
                                    <input required class="input--style-4" type="password" name="c_password">

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="">Password</label>
                                    <input required  class="input--style-4" type="password" name="password">

                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label for="">OTP</label>
                                    <input required id="otp_value" class="input--style-4" type="number" name="otp">

                                </div>
                            </div>
                        </div>
                        {{-- <div class="input-group">
                            <label class="label">Subject</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div> --}}
                        <div class="p-t-15">
                            <button id="clickSubmit" class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                            <button class="btn btn-success"><a href="{{route('login')}}" >Login</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{URL::asset('vendor/select2/select2.min.js')}}"></script>
    <script src="{{URL::asset('vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{URL::asset('vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{URL::asset('js/global.js')}}"></script>
    <script>
        let otp = 0;
        $('form #send-email').change(function(e){
//    $('#log').prepend('<p>Form changed</p>')
            e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
                jQuery.ajax({
                  url: "{{ url('/send-email') }}",
                  method: 'post',
                  data: {
                     sendEmail: jQuery('#send-email').val(),
                    //  type: jQuery('#type').val(),
                    //  price: jQuery('#price').val()
                  },
                  success: function(result){
                     console.log(result);
                    otp = result.otp
                    swal({
                        title: "OTP Sent!",
                        // text: "Fill up the form!",
                        icon: "success",
                    })
                  }});
            // console.log(document.getElementById('send-email').value)
        });

        $('form #otp_value').change(function(){
            // console.log(document.getElementById('otp_value').value);
                     if((document.getElementById('otp_value').value != otp) ){
                        $("#element").click(function(){
                            swal({
                        title: "Error!",
                        text: "Fill up the form!",
                        icon: "warning",
                        });
                        });
                        swal({
                        title: "Error in the OTP!",
                        text: "Wrong OTP!",
                        icon: "warning",
                        });


                     }
        });
    </script>
</body>
</html>