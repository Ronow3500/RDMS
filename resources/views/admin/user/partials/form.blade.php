@csrf
    <div class="row">
        <div class="col">
         <div class="mb-3">
           <label for="name">Name</label>
           <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="@isset($create) {{ old('name') }} @endisset @isset($user) {{ $user->name }} @endisset" aria-describedby="name">
            @error('name')
            <span class="invalid-feedback" role="alert">
             {{ $message }}
            </span>
            @enderror
         </div> 
        </div>
        <div class="col">
          <div class="mb-3">
          <label for="email">Email</label>
          <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="@isset($create) {{ old('email') }} @endisset @isset($user) {{ $user->email }} @endisset" aria-describedby="email">
          @error('email')
          <span class="invalid-feedback" role="alert">
              {{ $message }}
          </span>
          @enderror
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col mb-3">
        @isset($create)
        <label for="password">Password</label>
        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
       @error('password')
       <span class="invalid-feedback" role="alert">
           {{ $message }}
       </span>
       @enderror
       @endisset
     </div>
     <div class="col mb-3">
       @isset($create)
       <label for="password_confirmation">Confirm Password</label>
       <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
       @error('password_confirmation')
       <span class="invalid-feedback" role="alert">
           {{ $message }}
       </span>
       @enderror
       @endisset
     </div>
     <div class="col mb-3">
         @foreach($roles as $role)
          <div class="form-check">
          	<input type="checkbox" class="form-check-input" name="roles[]"
                   value="{{ $role->id }}" id="{{ $role->name }}"
                    @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset
         	       >
         	<label for="{{ $role->name }}"
         		   class="form-check-label">
         		{{ $role->name }}
         	</label>
          </div>
        @endforeach
    </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>