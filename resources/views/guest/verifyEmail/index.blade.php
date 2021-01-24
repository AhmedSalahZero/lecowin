
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Lecowin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('assets/pages/css/login-5.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" /> </head>
<!-- END HEAD -->

<body class=" login">

<!-- BEGIN : LOGIN PAGE 5-1 -->
<div class="user-login-5">
    <div class="row bs-reset">

        <div class="col-md-6 bs-reset">
            <div class="login-bg" style="background-image:url({{asset('assets/pages/img/login/bg1.jpg')}})">
                <img class="login-logo" src="{{asset('assets/pages/img/login/logo.png')}}" /> </div>
        </div>
        <div class="col-md-6 login-container bs-reset">
            <div class="login-content text-center">
            @include('partial.session')
                <form action="{{Route('register.store',['lang'=>App()->getLocale(),'token'=>$token])}}" method="post" >
                    @csrf
                    <h3 class="font-green">@lang('lang.We Sent You A Verification Code Please Check Your Mail Box')</h3>
                    <p> @lang('lang.Enter The Verification Code Here.') </p>
                    <div class="form-group">
                        <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="@lang('lang.Verification_code')" name="code" />
                        <input type="hidden" name="first_name" value="{{$userData['first_name']}}">
                        <input type="hidden" name="last_name" value="{{$userData['last_name']}}">
                        <input type="hidden" name="email" value="{{$userData['email']}}">
                        <input type="hidden" name="parentCode" value="{{$userData['parentCode']}}">
                        <input type="hidden" name="address" value="{{$userData['address']}}">
                        <input type="hidden" name="password" value="{{$userData['password']}}">
                        <input type="hidden" name="phone" value="{{$userData['phone']}}">
                        <input type="hidden" name="token" value="{{$token}}">
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-left">
                            <a href="{{Route('login.index',App()->getLocale())}}" type="button" id="back-btn" class="btn green btn-outline">@lang('lang.back')</a>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="submit" class="btn btn-success uppercase pull-right">@lang('lang.register')</button>
                        </div>


                    </div>


                </form>

                <!-- END FORGOT PASSWORD FORM -->
            </div>
{{--            <div class="login-footer">--}}
{{--                <div class="row bs-reset">--}}
{{--                    <div class="col-xs-5 bs-reset">--}}
{{--                        <ul class="login-social">--}}
{{--                            <li>--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <i class="icon-social-facebook"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <i class="icon-social-twitter"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <i class="icon-social-dribbble"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-7 bs-reset">--}}
{{--                        <div class="login-copyright text-right">--}}
{{--                            <p>Copyright &copy; The Tailros Dev 2020</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<!-- END : LOGIN PAGE 5-1 -->
<!--[if lt IE 9]>
<script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{--<script src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>--}}
<script src="{{asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
{{--<script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>--}}
<script src="{{asset('assets/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
</body>

</html>
