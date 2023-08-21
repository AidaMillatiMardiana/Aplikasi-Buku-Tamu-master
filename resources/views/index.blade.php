<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="{{ url('assets/img/logo.png') }}">

<head>
  <meta charset="utf-8">
  <title>Buku Tamu - BPS Kota Malang</title>
  <link rel="stylesheet" href="{{url('/form/css/style.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src={{ asset("/pengguna/assets/js/parsley.js")}}></script>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
  <form id="myForm" action="{{ url ('/simpan-bukutamu')}}" method="POST" autocomplete="off" name="formInput">
    @csrf
    <h1 id="judul" style="text-align: center">BUKU TAMU BPS KOTA MALANG</h1>
    <h2 id="judul" style="text-align: center">Silakan Isi Form Berikut</h2>

<!-- Hubungkan Font Awesome CSS di dalam <head> tag -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div style="text-align:center;">
  <span class="step" id="step-1"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
  <span class="step" id="step-2"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
  <span class="step" id="step-3"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
  <span class="step" id="step-4"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
  <span class="step" id="step-5"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
</div>
<br>
    <div class="tab" id="tab-1">
    <h3 style="text-align: center; font-family: sans-serif;">Informasi Pribadi</h3>

      <div class="input-group">
        <label for="name" style="color:#000000">Nama Lengkap</label>
        <input type="text" name="name" id="name" placeholder="Silakan isi nama anda" maxlength="30"
            value="{{old('name')}}" data-parsley-minwords="3" data-parsley-maxwords="30"
            data-parsley-pattern="/(^[a-zA-Z][a-zA-Z\s]{0,30}[a-zA-Z]$)/" data-parsley-trigger="keyup" required
            style="font-size: 14px;" />
        {{-- @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
      </div>

      <div class="input-group">
      <label for="name" style="color:#000000">No Handphone</label>
        <input type="text" name="hp" id="hp" class="form-control" placeholder="Silakan isi no handphone anda"
          minlength="8" maxlength="13" value="{{old('hp')}}" data-parsley-type="integer" data-parsley-trigger="keyup"
          required style="font-size: 14px;" />
        {{-- @error('hp')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
      </div>

      <div class="form-group mb-3">
        <label class="gender" for="gender" style="color:#000000">Jenis Kelamin</label>
        <select class="custom-select my-1 mr-sm-2" name="gender" id="gender" value={{collect(old('gender'))}} required style="font-size: 14px;">
        <option selected="false" disabled="disabled">Silakan Pilih Jenis Kelamin</option>
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
      </div>

      {{-- <div class="input-group">
        <label for="email" style="color:#000000">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Silakan isi email anda" />
      </div> --}}

      <div class="input-group">
        <label for="email" style="color:#000000">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Silakan isi email anda"
          maxlength="35" value="{{old('email')}}" data-parsley-type="email" data-parsley-trigger="keyup"
          data-parsley-error-message="Email anda tidak mengandung '@gmail.com'" required style="font-size: 14px;" />
        {{-- @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
      </div>

      <div class="input-group">
        <label for="address" style="color:#000000">Alamat</label>
        <input type="text" name="address" id="address" class="form-control" placeholder="Silakan isi alamat anda"
          maxlength="50" value="{{old('address')}}" data-parsley-trigger="keyup" required style="font-size: 14px;"/>
      </div>

      <div class="input-group">
        <label for="age" style="color:#000000">Usia</label>
        <input type="text" name="age" id="age" class="form-control" placeholder="Silakan isi umur anda (contoh: 27)"
          maxlength="3" value="{{old('age')}}" onkeypress="return event.charCode >= 48 && event.charCode <=57"
          data-parsley-type="integer" data-parsley-trigger="keyup" required style="font-size: 14px;" />
        {{-- @error('age')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
      </div>

      <!-- form tambahan untuk pilih tujuan kunjungan -->
      <div class="form-group mb-3">
        <label class="purpose" for="purposevtwo" style="color:#000000">Keperluan Anda</label>
        <select class="custom-select my-1 mr-sm-2" name="purposevtwo" id="purposevtwo" required>
        <option selected="false" disabled="disabled">Silakan Pilih Keperluan Anda</option>
          @foreach ($purposevoltwo as $purpose2)
            <option value="{{ $purpose2->id }}">{{ $purpose2->purposevtwo }}</option>
          @endforeach
        </select>
      </div>
      <br><br>
    </div>

    
    <div class="row" id="tabrow-1">

      <div class="tab" id="tab-2">
        <h3 style="text-align: center; font-family: sans-serif;">Riwayat Pendidikan</h3>
  
        <div class="input-group">
          <label for="institute" style="color:#000000">Nama instansi</label>
          <input type="text" name="institute" id="institute" class="form-control"
            placeholder="Silakan isi nama instansi anda" maxlength="35" value="{{old('institute')}}"
            data-parsley-pattern="/(^[a-zA-Z][a-zA-Z\s]{0,35}[a-zA-Z]$)/" data-parsley-trigger="keyup" style="font-size: 14px;"/>
          {{-- @error('institute')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror --}}
        </div>
  
        <div class="input-group">
          <label for="nipnim" style="color:#000000">NIM/NPM</label>
          <input type="text" name="nipnim" id="nipnim" class="form-control" placeholder="Silakan isi nip/nim anda"
            maxlength="20" value="{{old('nipnim')}}" onkeypress="return event.charCode >= 48 && event.charCode <=57"
            data-parsley-type="integer" data-parsley-trigger="keyup" required style="font-size: 14px;"/>
          {{-- @error('nipnim')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror --}}
        </div>
  
        <div class="form-group mb-3">
          <label class="label" for="job" style="color:#000000">Pekerjaan</label>
          <select class="custom-select my-1 mr-sm-2" name="job" id="job" style="font-size: 14px;">
            <option selected="false" disabled="disabled">Silakan Pilih Pekerjaan</option>
            @foreach ($job as $p)
            <option value="{{ $p->id }}">{{$p->job_type}}</option>
            @endforeach
          </select>
        </div><br><br>
  
        <div class="form-group mb-3">
          <label class="label" for="education" style="color:#000000">Pendidikan</label>
          <select class="custom-select my-1 mr-sm-2" name="education" id="education" style="font-size: 14px;">
            <option selected="false" disabled="disabled">Silakan Pilih Pendidikan</option>
            @foreach ($education as $p)
            <option value="{{ $p->id }}">{{$p->education_type}}</option>
            @endforeach
          </select>
        </div><br><br>
  
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(2, 1);">Previous</div>
          <div class="index-btn" onclick="run(2, 3);">Next</div>
        </div>
      </div>
  
      <div class="tab" id="tab-3">
        <h3 style="text-align: center; font-family: sans-serif;">Media Pelayanan</h3>
  
        <div class="input-group">
          <div class="form-group mb-3">
            <label class="label" for="media" style="color:#000000">Media Pelayanan</label>
            <select class="custom-select my-1 mr-sm-2" name="media" id="inlineFormCustomSelectPref" style="font-size: 14px;">
              <option selected="false" disabled="disabled">Silakan Pilih Media Pelayanan</option>
              @foreach ($media as $p)
              <option value="{{ $p->id }}">{{$p->media_type}}</option>
              @endforeach
            </select>
          </div>
        </div>
  
        <div class="input-group">
          <div class="form-group mb-3">
            <label class="label" for="media" style="color:#000000">Kebutuhan Data</label>
            <select class="custom-select my-1 mr-sm-2" name="sub_categories" id="inlineFormCustomSelectPref" style="font-size: 14px;">
              <option selected="false" disabled="disabled">Silakan Pilih Kebutuhan Data</option>
              @foreach($categories as $group)
              <optgroup label="{{$group->categories_type }}">
                @foreach ($sub_categories as $s)
                @if($s->id_categories == $group->id)
                <option value="{{ $s->id}}">{{$s->sub_categories_type}}</option>
                @endif
                @endforeach
              </optgroup>
              @endforeach
            </select>
          </div>
        </div>
  
        <div class="input-group">
          <div class="form-group mb-3">
            <label class="label" for="service" style="color:#000000">Jenis Pelayanan</label>
            <select class="custom-select my-1 mr-sm-2" name="service" id="inlineFormCustomSelectPref" style="font-size: 14px;">
              <option selected="false" disabled="disabled">Silakan Pilih Jenis Pelayanan</option>
              @foreach ($service as $j)
              <option value="{{ $j->id }}">{{$j->service_type}}</option>
              @endforeach
            </select>
          </div>
        </div>
  
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(3, 2);">Previous</div>
          <div class="index-btn" onclick="run(3, 4);">Next</div>
        </div>
      </div>
  
      <div class="tab" id="tab-4">
        <h3 style="text-align: center; font-family: sans-serif;">Tujuan Permintaan Data</h3>
  
        <div class="input-group">
          <div class="form-group mb-3">
            <label class="label" for="purpose" style="color:#000000">Tujuan</label>
            <select class="custom-select my-1 mr-sm-2" name="purpose" id="inlineFormCustomSelectPref" style="font-size: 14px;">
              <option selected="false" disabled="disabled">Silakan Pilih Tujuan</option>
              @foreach ($purpose as $p)
              <option value="{{ $p->id }}">{{$p->purpose_type}}</option>
              @endforeach
            </select>
          </div>
        </div>
  
        <div class="input-group">
          <label for="data" style="color:#000000">Catatan Data</label>
          <textarea type="text" name="data" id="data" placeholder="Silakan isi data spesifik yang anda perlukan"
            class="form-control" rows="10" cols="55" maxlength="50" value="{{old('data')}}"
            onkeypress="return event.charCode < 48 || event.charCode>57" data-parsley-trigger="keyup" style="font-size: 14px;"></textarea>
        </div>
  
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick=" run(4, 3);">Previous</div>
          <button class="index-btn" type="submit" name="submit" style="background: blue;" id="btn-submit-1">Submit</button>
        </div>
      </div>
    </div>

    <div class="row" id="tabrow-2">
      <div class="tab" id="tab-5">
        <h3 style="text-align: center; font-family: sans-serif;">Form Kunjungan</h3>
        <div class="input-group">
          <label for="institute" style="color:#000000">Nama instansi</label>
          <input type="text" name="institute2" id="institute" class="form-control"
            placeholder="Silakan isi nama instansi anda" maxlength="35" value="{{old('institute')}}"
            data-parsley-pattern="/(^[a-zA-Z][a-zA-Z\s]{0,35}[a-zA-Z]$)/" data-parsley-trigger="keyup" style="font-size: 14px;"/>
          {{-- @error('institute')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror --}}
          </div>
  
          <div class="form-group mb-3">
            <label class="label" for="tujuankunjungan" style="color:#000000">Tujuan Kujungan</label>
            <select class="custom-select my-1 mr-sm-2" name="tujuankunjungan" id="inlineFormCustomSelectPref" style="font-size: 14px;">
              <option selected="false" disabled="disabled">Silakan Pilih Tujuan Kunjungan</option>
              @foreach ($tujuankunjungan as $tk)
              <option value="{{ $p->id }}">{{$tk->tujuankunjungan_type}}</option>
              @endforeach
            </select>
          </div>
          <div class="index-btn-wrapper">
          <div class="index-btn" onclick=" run(5, 1);">Previous</div>
          <button class="index-btn" type="submit" name="submit" id="btn-submit-2" style="background: blue;">Submit</button>
        </div>
      </div>
    </div>
      </div>
  </form>

 <script type="text/javascript">

  $(function(){
    $("#myForm").parsley();
  })

  // Default tab
  $(".tab").css("display", "none");
  $("#tab-1").css("display", "block");

  function run(hideTab, showTab){
    if(hideTab < showTab){ // If not press previous button
      // Validation if press next button
      var currentTab = 0;
      x = $('#tab-'+hideTab);
      y = $(x).find("input")
      z = $(x).find("select")
      for (i = 0; i < y.length; i++){
        if (y[i].value == ""){
          $(y[i]).css("background", "#ffdddd");
          return false;
        }
      }
      for (i = 0; i < z.length; i++){
        if (z[i].value == ""){
          $(z[i]).css("background", "#ffdddd");
          return false;
        }
      }
    }

    // Progress bar
    for (i = 1; i < showTab; i++){
      $("#step-"+i).css("opacity", "1");
    }

    // Switch tab
    $("#tab-"+hideTab).css("display", "none");
    $("#tab-"+showTab).css("display", "block");
    $("input").css("background", "#fff");
  }

  // Add change event listener to "Tujuan Kunjungan" dropdown
  $("#purposevtwo").change(function() {
    $("#btn-submit-1").addClass("d-none")
    $("#btn-submit-2").addClass("d-none")
    
    if (this.value === "1") { // "Kunjungan"
      run(1, 5); // Go to Media Pelayanan tab
      $("#btn-submit-1").remove()
      $("#tabrow-1").remove()
    } else if (this.value === "2") { // "Permintaan Data"
      run(1, 2); // Go to Riwayat Pendidikan tab
      $("#btn-submit-2").remove()
      $("#tabrow-2").remove()
    }
  });

      $('#hp').on('keyup', function (){

        $value = $(this).val();
        // alert ($value);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        // alert ($value);
        $.ajax({

          type      : 'post',
          url       : '{{ URL::to('cekcustomer') }}',
          dataType  : 'json',
          data      : {'search':$value},
          success   : function(data)
          {
            
              // dataconv = JSON.parse(data);
            $.each(data, function (i, id) { 
              // var $dataString = JSON.stringify(data)
              // console.log(data[0].name);
              // alert(data[0].address);

              $('#name').val(data[0].name).attr('readonly', true).css('background-color' , '#DEDEDE').attr('disabled', true);
              $("#gender option[value="+data[0].gender).attr('selected', 'true');
              $("#gender").attr('disabled', true);
              $('#email').val(data[0].email).attr('readonly', true).css('background-color' , '#DEDEDE');
              $('#address').val(data[0].address).attr('readonly', true).css('background-color' , '#DEDEDE');
              $('#age').val(data[0].age).attr('readonly', true).css('background-color' , '#DEDEDE');
              $('#institute').val(data[0].institute).attr('readonly', true).css('background-color' , '#DEDEDE');
              $('#nipnim').val(data[0].nipnim).attr('readonly', true).css('background-color' , '#DEDEDE');
              $("#job option[value='"+data[0].id_job).attr('selected', 'true');
              $("#job").attr('disabled', true);
              $("#education option[value='"+data[0].id_education).attr('selected', 'true');
              $("#education").attr('disabled', true);
              $("#tujuankunjungan option[value='"+data[0].id_job).attr('selected', 'true');
              $("#tujuankunjungan").attr('disabled', true);
            });
          
          }
        });
      })

      // $(document).ready (function() {
        // $('#myForm').formValidation({
        // framework: 'bootstrap',
        // excluded: 'disabled',
        // icon: {
        // valid: 'glyphicon glyphicon-ok',
        // invalid: 'glyphicon glyphicon-remove',
        // validating: 'glyphicon glyphicon-refresh'
        // },
        // fields: {
        //     emailUser: {
        //     validators: {
        //     notEmpty: {
        //     message: 'Email Tidak Boleh Kosong'
        //     },
        //     emailAddress: {
        //     message: 'Email Tidak Valid'
        //     }
        //     }
        //     },
        // }
        // })
        // });

        // function ValidateEmail(mail)
        // {
        // if (/mysite@ourearth.com/.test(emailUser))
        // {
        // return (true)
        // }
        // alert("Masukkan e-Mail Dengan Ben0ar")
        // return (false)
        // }

        
  </script>
</body>
</html>