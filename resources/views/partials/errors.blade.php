@if (count($errors->all()))
<div class="text-muted fst-italic mb-3">
    <div class="alert alert-danger" role="alert">
    
        @foreach ($errors->all() as $value) 
        <li>{{$value}}</li>
        @endforeach  
    </div>
</div>
@endif