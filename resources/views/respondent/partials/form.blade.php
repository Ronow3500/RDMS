@csrf
    <div class="row">
      <div class="col">
        <div class="mb-3">
           <label for="name">Name</label>
           <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="@isset($create) {{ old('name') }} @endisset @isset($respondent) {{ $respondent->name }} @endisset" aria-describedby="name">
           @error('name')
           <span class="invalid-feedback"role="alert">
            {{ $message }}
           </span>
           @enderror
        </div> 
      </div>
      <div class="col">
        <div class="mb-3">
        <label for="phone_1">Phone 1</label>
        <input id="phone_1" type="text" name="phone_1" class="form-control @error('phone_1') is-invalid @enderror" value="@isset($create) {{ old('phone_1') }} @endisset @isset($respondent) {{ $respondent->phone_1 }} @endisset" aria-describedby="phone_1">
            @error('phone_1')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mb-3">
        <label for="phone_2">Phone 2</label>
        <input id="phone_2" type="text" name="phone_2" class="form-control @error('phone_2') is-invalid @enderror" value="@isset($create) {{ old('phone_2') }} @endisset @isset($respondent) {{ $respondent->phone_2 }} @endisset" aria-describedby="phone_2">
            @error('phone_2')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
          </div>
        </div>
      <div class="col">
        <div class="mb-3">
        <label for="phone_3">Phone 3</label>
        <input id="phone_3" type="text" name="phone_3" class="form-control @error('phone_3') is-invalid @enderror" value="@isset($create) {{ old('phone_3') }} @endisset @isset($respondent) {{ $respondent->phone_3 }} @endisset" aria-describedby="phone_3">
            @error('phone_3')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mb-3">
        <label for="phone_4">Phone 4</label>
        <input id="phone_4" type="text" name="phone_4" class="form-control @error('phone_4') is-invalid @enderror" value="@isset($create) {{ old('phone_4') }} @endisset @isset($respondent) {{ $respondent->phone_4 }} @endisset" aria-describedby="phone_4">
            @error('phone_4')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
          </div>
        </div>
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="region">Region</label>
            <select name="region" class="form-select select2 select2-hidden-accessible @error('region') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($region  as $item ) : ?>
                <option value="@isset($create) {{ old('region') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('region')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="county">County</label>
            <select name="county" class="form-control select2 @error('county') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($county  as $item ) : ?>
                <option value="@isset($create) {{ old('county') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('county')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>

      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="sub_county">Sub County</label>
            <select name="sub_county" class="form-control select2 @error('sub_county') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($sub_county  as $item ) : ?>
                <option value="@isset($create) {{ old('sub_county') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('sub_county')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
      
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="district">District</label>
            <select name="district" class="form-control select2 @error('district') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($district  as $item ) : ?>
                <option value="@isset($create) {{ old('district') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('district')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="division">Division</label>
            <select name="division" class="form-control select2 @error('division') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($division  as $item ) : ?>
                <option value="@isset($create) {{ old('division') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('division')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>

     <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="location">Location</label>
            <select name="location" class="form-control select2 @error('location') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($location  as $item ) : ?>
                <option value="@isset($create) {{ old('location') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('location')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>

      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="sub_location">Sub Location</label>
            <select name="sub_location" class="form-control select2 @error('sub_location') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($sub_location  as $item ) : ?>
                <option value="@isset($create) {{ old('sub_location') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('sub_location')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="ward">Ward</label>
            <select name="ward" class="form-control select2 @error('ward') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($ward  as $item ) : ?>
                <option value="@isset($create) {{ old('ward') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('ward')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="constituency">Constituency</label>
            <select name="constituency" class="form-control select2 @error('constituency') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($constituency  as $item ) : ?>
                <option value="@isset($create) {{ old('constituency') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('constituency')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control select2 @error('gender') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($gender  as $item ) : ?>
                <option value="@isset($create) {{ old('gender') }} @endisset @isset($item) {{ $item->option }} @endisset">
                    <?= $item->option ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('gender')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
        <label for="exact_age">Exact Age</label>
        <input id="exact_age" type="text" name="exact_age" class="form-control @error('exact_age') is-invalid @enderror" value="@isset($create) {{ old('exact_age') }} @endisset @isset($respondent) {{ $respondent->exact_age }} @endisset" aria-describedby="exact_age">
            @error('exact_age')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
            @enderror
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="age_group">Age Group</label>
            <select name="age_group" class="form-control select2 @error('age_group') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($age_group  as $item ) : ?>
                <option value="@isset($create) {{ old('age_group') }} @endisset @isset($item) {{ $item->range }} @endisset">
                    <?= $item->range ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('age_group')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="setting">Setting</label>
            <select name="setting" class="form-control select2 @error('setting') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($setting  as $item ) : ?>
                <option value="@isset($create) {{ old('setting') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('setting')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="education_level">Education Level</label>
            <select name="education_level" class="form-control select2 @error('education_level') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($education_level  as $item ) : ?>
                <option value="@isset($create) {{ old('education_level') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('education_level')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
     <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="marital_status">Marital Status</label>
            <select name="marital_status" class="form-control select2 @error('marital_status') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($marital_status  as $item ) : ?>
                <option value="@isset($create) {{ old('marital_status') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('marital_status')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="religion">Religion</label>
            <select name="religion" class="form-control select2 @error('religion') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($religion  as $item ) : ?>
                <option value="@isset($create) {{ old('religion') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('religion')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="ethnic_group">Ethnic Group</label>
            <select name="ethnic_group" class="form-control select2 @error('ethnic_group') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($ethnic_group  as $item ) : ?>
                <option value="@isset($create) {{ old('ethnic_group') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('ethnic_group')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
      <div class="col">
        <div class="mb-3">
          <div class="form-group">
            <label for="employment_status">Employment Status</label>
            <select name="employment_status" class="form-control select2 @error('employment_status') is-invalid @enderror" style="width: 100%;">
              <?php foreach ($employment_status  as $item ) : ?>
                <option value="@isset($create) {{ old('employment_status') }} @endisset @isset($item) {{ $item->name }} @endisset">
                    <?= $item->name ?>        
                </option>
              <?php endforeach; ?>
            </select>
          </div>
           @error('employment_status')
           <span class="invalid-feedback" role="alert">
               {{ $message }}
           </span>
           @enderror
        </div>
      </div>
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>