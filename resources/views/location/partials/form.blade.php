@csrf
    <div class="row">
      <div class="col">
        <div class="mb-3">
           <label for="name">Location Name</label>
           <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="@isset($create) {{ old('name') }} @endisset @isset($location) {{ $location->name }} @endisset" aria-describedby="name" placeholder="e.g male or female">
           @error('name')
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