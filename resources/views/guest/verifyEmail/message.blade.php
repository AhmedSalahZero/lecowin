<!doctype html>
<html>
<head></head>
<body>
<h4>
@if(App()->getLocale() == 'en')
    <u>  @lang('lang.Your verification code at lecowin is') {{$verificationCode}}  </u> <br>
@else
           <u> {{$verificationCode}} @lang('lang.Your verification code at lecowin is')   </u> <br>
    @endif

</h4>
<br>
<h3>@lang('lang.If you did not request a password reset, no further action is required.')</h3>
</body>
</html>
