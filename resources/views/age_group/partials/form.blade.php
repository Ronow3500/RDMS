@csrf
    <div class="row">
      <div class="col">
        <div class="mb-3">
           <label for="range">Age Group Range</label>
           <input id="range" type="text" name="range" class="form-control @error('range') is-invalid @enderror" value="@isset($create) {{ old('range') }} @endisset @isset($age_group) {{ $age_group->range }} @endisset" aria-describedby="range">
           @error('range')
           <span class="invalid-feedback"role="alert">
            {{ $message }}
           </span>
           @enderror
        </div> 
      </div>
      
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>