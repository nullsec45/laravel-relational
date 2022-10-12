<div class="form-group mt-3">
    <label for="{{$field}}">{{$label}}</label>
    <textarea class="form-control mt-3" name="{{$field}}" id="{{$field}}" cols="30" rows="5">
        @isset($value) {{old($field) ? old($field) : $value}}
            @else {{old($field)}}
        @endisset
    </textarea>
    
    @error($field)
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>