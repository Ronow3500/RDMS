@csrf
    <div class="row">
      <div class="col">
        <div class="mb-3">
           <label for="ftp">Select File</label>
           <input id="ftp" type="file" name="ftp" class="form-control-file @error('ftp') is-invalid @enderror" value="@isset($create) {{ old('ftp') }} @endisset @isset($ftp) {{ $ftp->file_name }} @endisset" aria-describedby="ftp" placeholder="Please Select File">
           @error('ftp')
           <span class="invalid-feedback"role="alert">
            {{ $message }}
           </span>
           @enderror
        </div> 
      </div>
      <div class="col">
        <div class="mb-3">
           <label for="file_title">File Title</label>
           <input id="file_title" type="text" name="file_title" class="form-control @error('file_title') is-invalid @enderror" value="@isset($create) {{ old('file_title') }} @endisset @isset($file) {{ $file->file_title }} @endisset" aria-describedby="file_title" placeholder="Please Select File">
           @error('file_title')
           <span class="invalid-feedback"role="alert">
            {{ $message }}
           </span>
           @enderror
        </div> 
      </div>
    </div>
    <div class="mb-3">
        <label for="file_description">Description</label>
        @error('file_description')
           <span class="invalid-feedback"role="alert">
            {{ $message }}
           </span>
           @enderror
        <textarea class="form-control @error('file_description') is-invalid @enderror" id="file_description" name="file_description" rows="5">
            @isset($create) {{ old('file_description') }} @endisset @isset($file) {{ $file->file_description }} @endisset
        </textarea>
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">
            Upload
        </button>
    </div>