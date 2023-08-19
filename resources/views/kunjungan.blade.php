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
    <h2 id="judul" style="text-align: center">Silakan Isi Form Kunjungan Berikut</h2>

<!-- Hubungkan Font Awesome CSS di dalam <head> tag -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div style="text-align:center;">
  <span class="step" id="step-1"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
  <span class="step" id="step-2"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
  <span class="step" id="step-3"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
  <span class="step" id="step-4"><i class="fas fa-check-circle"></i></span>&nbsp;&nbsp;
</div>
<br>

    


    <!-- <div class="tab" id="tab-1">
    <h3 style="text-align: center; font-family: sans-serif;">Informasi Pribadi</h3> -->

      <div class="input-group">
        <label for="name" style="color:#000000">Asal Instansi</label>
        <input type="text" name="name" id="name" placeholder="Silakan isi asal instansi Anda" maxlength="30"
            value="{{old('name')}}" data-parsley-minwords="3" data-parsley-maxwords="30"
            data-parsley-pattern="/(^[a-zA-Z][a-zA-Z\s]{0,30}[a-zA-Z]$)/" data-parsley-trigger="keyup" required
            style="font-size: 14px;" />
        {{-- @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}
      </div>

      <div class="form-group mb-3">
        <label class="gender" for="gender" style="color:#000000">Jenis Kelamin</label>
        <select class="custom-select my-1 mr-sm-2" name="gender" id="gender" value={{collect(old('gender'))}} required style="font-size: 14px;">
          <option selected="false" disabled="disabled">
          <option value="Pria">Pria</option>
          <option value="Wanita">Wanita</option>
        </select>
      </div>

      <!-- form tambahan untuk pilih tujuan kunjungan -->
      <div class="form-group mb-3">
        <label class="purpose" for="purposevtwo" style="color:#000000">Tujuan Kunjungan</label>
        <select class="custom-select my-1 mr-sm-2" name="purposevtwo" id="purposevtwo" required>
          <option selected disabled></option>
          @foreach ($purposevoltwo as $purpose2)
            <option value="{{ $purpose2->id }}">{{ $purpose2->purposevtwo }}</option>
          @endforeach
            <option value="other1">Kunjungan Dinas</option>
            <option value="other2">Pengantaran Data</option>
            <option value="other3">Evaluasi</option>
            <option value="other4">dll</option>
        </select>
      </div>
      <br><br>

      <div class="index-btn-wrapper">
        <!-- . -->
        <button class="index-btn" type="submit" name="submit" style="background: blue;">Submit</button>
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
            });
          
          }
        });
      })


      $(document).ready (function() {
        $('#myForm').formValidation({
        framework: 'bootstrap',
        excluded: 'disabled',
        icon: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            emailUser: {
            validators: {
            notEmpty: {
            message: 'Email Tidak Boleh Kosong'
            },
            emailAddress: {
            message: 'Email Tidak Valid'
            }
            }
            },
        }
        })
        });

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