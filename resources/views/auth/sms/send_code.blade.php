@extends('main.index.layouts.master')

@section('main_style')
<link rel="stylesheet" href="{{asset('general/lib/teleSelect/intlTelInput.min.css')}}">
<link rel="stylesheet" href="{{asset('general/lib/teleSelect/demo.css')}}">
<style>
    .sms-code{
        padding:80px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 30px 0 rgba(138, 155, 165, 0.15);
    }
</style>

@endsection


@section('main_content')

<div class="container mt-5 sms-code">
    <form class="demo-form" action="/send-sms" method="POST">
        @csrf
        <h5 class="text-center">{{__("We will Send Verification To the Number Bellow")}}</h5>
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-lg-6 phone">
              <label for="inputPhone">{{__("Phone Number")}}
                @error('phone')
                <span class="text-danger">{{__("$message")}}</span>
                @enderror
              </label>
              <input type="tel" class="form-control" id="inputPhone" placeholder="" name="phone" value="{{auth()->user()->profile->phone}}"  dir="ltr" disabled>
              <button class="btn btn-danger mt-2">{{__("Submit")}}</button>
              <br><br>
              <a href="/change-phone" class="text-primary pl-1" style="font-size: 14px">{{__("Change Number")}}</a>
             
              @if (session('denied'))
                <p class="text-center text-danger">{{__("Try Again After 1 Minute")}}</p>
              @endif
            </div>
          </div>
        
    </form>
</div>

@endsection



@section('main_script')


<script src="{{asset('general/lib/teleSelect/intlTelInput.min.js')}}"></script>

<script>
  var input = document.querySelector("#inputPhone");
  window.intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    hiddenInput: "phone",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do','sa','iq'],
    // placeholderNumberType: "MOBILE",
    preferredCountries: ['iq', 'sa','kw','ae','lb','eg'],
    // separateDialCode: true,
    utilsScript: {{asset('general/lib/teleSelect/utils.js')}},
  });
</script>





@endsection
