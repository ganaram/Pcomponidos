<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control {{ $errors->has('model')?"is-invalid":"" }}" id="model" name="model" placeholder="Introduce the computer model" value="{{ isset($computer)?$computer->model:old('model') }}" required>
            @if( $errors->has('model'))
            <div class="invalid-feedback">
                {{ $errors->first('model') }}
            </div>
            @endif
        </div>
    </div>
</div>
{{-- <div class="form-group">
    <div class="row d-flex align-items-end">
        <div class="col-10">
            @foreach($components as $component)
            <label for="component">Component - {{$component->type}}</label>
            <select class="form-control selectpicker" id="component-{{$component->type}}" name="component-{{$component->type}}" multiple="multiple">
              @foreach($components as $component)
                  <option value="{{ $component->id }}"
                  @if( ! $errors->isEmpty() )
                    {{ old('component')==$component->id?" selected":"" }}
                  @elseif( isset($computer) )
                    {{ $component->id==$computer->component_id?"selected":"" }}
                  @endif
                  >{{ $component->name }}</option>
              @endforeach
            </select>
            @endforeach
            @if( $errors->has('component') )
            <div class="invalid-feedback">
                {{ $errors->first('component') }}
            </div>
            @endif 
        </div>
        <div class="col-2">
            <a class="btn btn-primary" href="{{ route('components.create') }}" target="_blank">New Component!</a>
        </div>
    </div>
</div>--}}
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control {{ $errors->has('description')?"is-invalid":"" }}" id="description" name="description" rows="10" placeholder="Computer Description" required>{{ isset($computer)?$computer->description:old('description') }}</textarea>
    @if( $errors->has('description'))
    <div class="invalid-feedback">
        {{ $errors->first('description') }}
    </div>
    @endif
</div>

<div class="form-group">
    <label for="price">Price</label>
    <input class="form-control {{ $errors->has('price')?"is-invalid":"" }}" id="price" name="price"placeholder="Computer price" required>{{ isset($computer)?$computer->price:old('price') }}
    @if( $errors->has('price'))
    <div class="invalid-feedback">
        {{ $errors->first('price') }}
    </div>
    @endif
</div>

<div class="form-group">
        <label for="img">Computer Image</label>
        <input type="file" class="form-control-file mt-1 {{ $errors->has('img')?"is-invalid":"" }}" id="img" name="img">
        @if( $errors->has('img'))
        <div class="invalid-feedback">
            {{ $errors->first('img') }}
        </div>
        @endif
    </div>
