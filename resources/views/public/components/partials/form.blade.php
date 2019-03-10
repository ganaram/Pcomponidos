<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

<div class="form-group">
    <label for="name">MOdel</label>
    <input type="text" class="form-control {{ $errors->has('name')?"is-invalid":"" }}" id="name" name="name" placeholder="Introduce the model." value="{{ isset($component)?$component->name:old('name') }}" required>
    @if( $errors->has('name'))
    <div class="invalid-feedback">
        {{ $errors->first('name') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="info">Info</label>
    <input type="text" class="form-control {{ $errors->has('info')?"is-invalid":"" }}" id="info" name="info" placeholder="Introduce the component description." value="{{ isset($component)?$component->info:old('info') }}"required>
    @if( $errors->has('info'))
    <div class="invalid-feedback">
        {{ $errors->first('info') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="brand">Brand</label>
    <select class="form-control generalInput {{ $errors->has('brand')?"is-invalid":"" }}" id="brand" name="brand[]" multiple>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}"
                @if( !$errors->isEmpty() )
                    {{ in_array($brand->id, old('brand') ?? [] )?"selected":"" }}
                @elseif( isset($book) )
                    {{ $component->brand->contains($brand->id)?"selected":"" }}
                @endif
            >{{ $brand->name }}</option>
        @endforeach
    </select>
    @if( $errors->has('brand') )
    <div class="invalid-feedback">
        {{ $errors->first('brand') }}
    </div>
    @endif
</div>
<div class="form-group">
    <label for="type">Type</label>
    <select class="form-control selectpicker" id="type" name="type">
    <option value="motherBoard">Motherboard</option>
    <option value="ram">Ram</option>
    <option value="cpu">Cpu</option>
    <option value="gpu">Gpu</option>
    <option value="powerSupply">Power Supply</option>
    <option value="storage">Storage</option>
      </select>
      @if( $errors->has('component') )
      <div class="invalid-feedback">
          {{ $errors->first('component') }}
      </div>
      @endif
    </select>
</div>
