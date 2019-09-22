<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

       
    </head>
    <body>



        <div class="container">
            <h1>Drop down feature</h1>
        <form action="{{ route('works.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="country">select your country</label>
                <select class="form-control" name="country" id="country">
                    <option value="" >Select country</option>
                        @foreach ($countries as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                </select>
            </div>




            <div class="form-group">
                    <label for="country">select your state</label>
                    <select class="form-control" name="state" id="state">
                        <option value="" >STATE</option>
                           
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-success">send</button>
                </div>
            </form>
        </div>


    <script src="{{ asset('js/jquery.js') }}"></script>

    <script>
        $(document).ready(function(){
         $('select[name="country"]').on('change', function(){

           var country_id = $(this).val();

           if(country_id)
            {

            
            $.ajax({
                url:'/getStates/'+country_id,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    console.log(data);


                    $('select[name="state"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="state"]')
                        .append('<option value="'+key+'">'+ value +'</option>');
                    });
                }

            });
             } else {
                $('select[name="state"]').empty();
             }
         });
        });

    </script>
    </body>
</html>
