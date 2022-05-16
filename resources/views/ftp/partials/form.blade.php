@csrf
    <div class="row">
      
      <div class="col">
        <div class="mb-3">
           <label for="ftp">Select File</label>
           <input id="ftp" type="file" name="ftp" class="form-control-file @error('ftp') is-invalid @enderror" value="@isset($create) {{ old('ftp') }} @endisset @isset($file) {{ $file->ftp }} @endisset" aria-describedby="ftp" placeholder="Please Select File" accept="image/*">
           @error('ftp')
           <span class="invalid-feedback"role="alert">
            {{ $message }}
           </span>
           @enderror
        </div> 
      </div>
      
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Upload
        </button>
    </div>