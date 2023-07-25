@extends('main.index.layouts.master')

@section('main_style')
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

<div class="container sms-code mt-5 d-flex justify-content-center">
    <form action="/verify-sms" method="POST">
        @csrf
        <p>{{__("We Sent You A Verification Message, to the number : ". auth()->user()->profile->phone ." - Please Check Your Phone And Submit The Code")}}</p>
        <label for="sms"></label>
        <input type="text" class="p-1" placeholder="SMS Code" id="sms" name="code">
        <input type="submit" class="btn btn-danger" value="Submit">
        <br><br>
        <a href="/change-phone" class="text-primary pl-1" style="font-size: 14px">{{__("Change Number")}}</a>
        <a href="/send-sms" class="text-primary pl-1" style="font-size: 14px">{{__("send again")}}</a>
    </form>
</div>

@endsection