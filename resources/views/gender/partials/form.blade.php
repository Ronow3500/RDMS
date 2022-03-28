@csrf
    <div class="row">
      <div class="col">
        <div class="mb-3">
           <label for="option">Option</label>
           <input id="option" type="text" name="option" class="form-control @error('option') is-invalid @enderror" value="@isset($create) {{ old('option') }} @endisset @isset($gender) {{ $gender->option }} @endisset" aria-describedby="option" placeholder="e.g male or female">
           @error('option')
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