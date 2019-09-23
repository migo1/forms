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