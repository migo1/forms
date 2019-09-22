<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
       {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                
                <div class="form-group">

                    <select name="country" id="country" class="form-control dynamic" data-dependent="state">
                            <option value="0">Select country</option>

                            @foreach ($country_list as $country)
                    <option value="{{ $country->country }}">{{ $country->country }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">

                        <select name="state" id="state" class="form-control dynamic" data-dependent="city">
                            <option value="">Select State</option>
                        </select>
                    </div>

                    <div class="form-group">

                            <select name="city" id="city" class="form-control" >
                                <option value="">Select city</option>
                            </select>
                        </div>
                        {{ csrf_field() }}

           {{-- <div class="col-lg-4">
                <form action="#">
                    <div class="form-group">
                        <label for="">Your provinces</label>
                        <select class="form-control" name="provinces" id="provinces">
                        <option value="0" disabled="true" selected="true">====== select provinces =====</option>
                        </select>    
                    </div>
                </form>
            </div>--}}
            </div>
        </div>
    </body>
 
</html>
<script>
        $(document).ready(function(){
            $('.dynamic').change(function(){
    
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
    
                    $.ajax({
                        url:"{{ route('dynamic.fetch') }}",
                        method:"POST",
                        data:{select:select, value:value,
                            dependent:dependent, _token:_token
                        },
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }
                    })
                }
            });
    
        });
        </script>