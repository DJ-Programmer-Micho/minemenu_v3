@extends('main.index.layouts.master')

@section('style')
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


@section('content')

<div class="container mt-5 sms-code">
    <form class="demo-form" action="/change-phone" method="POST">
        @csrf
        @method('PUT')
        <h5 class="text-center">{{__("Change Your Phone Number")}}</h5>
        <div class="form-row d-flex justify-content-center">
            <div class="form-group col-lg-6 phone">
              <label for="inputPhone">{{__("Phone Number")}}
                @error('phone')
                <span class="text-danger">{{__("$message")}}</span>
                @enderror
              </label>
              <input type="tel" class="form-control" id="inputPhone" placeholder="" name="phoneinp"  dir="ltr" required>
              <button class="btn btn-danger mt-2">{{__("Submit")}}</button>
            </div>
          </div>
        
    </form>
</div>
@endsection

@section('script')
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