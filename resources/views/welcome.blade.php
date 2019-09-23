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

        <script src="{{ asset('js/jquery.js') }}"></script>
    </head>
    <body>



        <div class="container">
            <h1>Drop down feature <button type="button" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" data-target="#forms">modal</button> </h1>
       
         

                
        </div>


<!-- Modal -->
<div class="modal fade" id="forms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">works</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('works.store')}}" method="POST">
            @csrf
                    <div class="modal-body">
          @csrf
          @include('works')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm btn-flat" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm btn-flat">submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>



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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
