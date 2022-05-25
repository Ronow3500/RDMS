@csrf
    <div class="row">
      <div class="col">
        <div class="mb-3">
           <label for="folder_name">Folder Name</label>
           <input id="folder_name" type="text" name="folder_name" class="form-control @error('folder_name') is-invalid @enderror" value="@isset($create) {{ old('folder_name') }} @endisset @isset($folder) {{ $folder->folder_name }} @endisset" aria-describedby="folder_name" placeholder="Write Folder Name">
           @error('folder_name')
           <span class="invalid-feedback"role="alert">
            {{ $message }}
           </span>
           @enderror
        </div> 
      </div>
      <div class="col">
          
      </div>
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </div>