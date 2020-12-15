

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Register</title>
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
    <link href="{{asset('assets/pages/css/login-4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" /> </head>
<!-- END HEAD -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    var Login = function () {
        return {
            //main function to initiate the module
            init: function () {


                // init background slide images
                $.backstretch([
                        " {{asset('assets/pages/media/bg/1.jpg')}} ",
                        "{{asset('assets/pages/media/bg/2.jpg')}} ",
                        "{{asset('assets/pages/media/bg/3.jpg')}} ",
                        "{{asset('assets/pages/media/bg/4.jpg')}}"
                    ], {
                        fade: 1000,
                        duration: 8000
                    }
                );
            }
        };

    }();

    jQuery(document).ready(function() {
        Login.init();
    });


</script>

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <h2 style="color: white">Register </h2>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    @include('partial.session')
    <form class="register-form" action="{{Route('register.store')}}" method="post"  style="display: block;">
        @csrf
        <h3>Sign Up</h3>
        <p> Enter your personal details below: </p>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">UserName</label>
            <div class="input-icon">
                <i class="fa fa-font"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Your Name" name="name"  value="{{old('name')}}"  @if($errors->first('name')) style="border: solid 1px red;" @endif> </div>
            @if($errors->first('name')) <span style="color: white" class="danger" > {{$errors->first('name')}} </span> @endif
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-envelope"></i>

                <input class="form-control placeholder-no-fix" type="email" placeholder="Email" name="email"    @if($errors->first('email')) style="border: solid 1px red;" @endif value="{{@old('email')}}" >
                @if($errors->first('email')) <span style="color: white" class="danger" > {{$errors->first('email')}} </span> @endif

            </div>

        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Address</label>
            <div class="input-icon">
                <i class="fa fa-check"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Address" name="address" @if($errors->first('address')) style="border: solid 1px red;" @endif value="{{@old('address')}}">  </div>
            @if($errors->first('address')) <span style="color: white" class="danger" > {{$errors->first('address')}} </span> @endif

        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Phone</label>
            <div class="input-icon">
                <i class="fa fa-phone"></i>
                <input class="form-control placeholder-no-fix" type="number" placeholder="Phone" name="phone"  @if($errors->first('phone')) style="border: solid 1px red;" @endif value="{{@old('phone')}}"> </div>
            @if($errors->first('phone')) <span style="color: white" class="danger" > {{$errors->first('phone')}} </span> @endif
        </div>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Code</label>
            <div class="input-icon">
                <i class="fa fa-chain"></i>
                <input class="form-control placeholder-no-fix" type="text" placeholder="Code" name="parentCode" @if($errors->first('parentCode')) style="border: solid 1px red;" @endif value="{{@old('parentCode')}}">  </div>
            @if($errors->first('parentCode')) <span style="color: white" class="danger" > {{$errors->first('parentCode')}} </span> @endif

        </div>

{{--        <div class="form-group">--}}
{{--            <label class="control-label visible-ie8 visible-ie9">Passport Pic</label>--}}
{{--            <div class="input-icon">--}}
{{--                <i class="fa fa-picture-o"></i>--}}
{{--                <input class="form-control placeholder-no-fix" type="file"  placeholder="Username" name="passport_info"  @if($errors->first('passport_info')) style="border: solid 1px red;" @endif value="{{@old('passport_info')}}"> </div>--}}
{{--            @if($errors->first('passport_info')) <span style="color: white" class="danger" > {{$errors->first('passport_info')}} </span> @endif--}}
{{--        </div>--}}


        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" @if($errors->first('Password')) style="border: solid 1px red;" @endif> </div>
            @if($errors->first('Password')) <span style="color: white" class="danger" > {{$errors->first('Password')}} </span> @endif
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
            <div class="controls">
                <div class="input-icon">
                    <i class="fa fa-check"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="confirm_password" @if($errors->first('confirm_password')) style="border: solid 1px red;" @endif> </div>

                @if($errors->first('confirm_password')) <span style="color: white" class="danger" > {{$errors->first('confirm_password')}} </span> @endif
            </div>
        </div>

        {{--Conditions and terms box --}}
{{--        <div class="form-group">--}}
{{--            <label class="mt-checkbox mt-checkbox-outline">--}}
{{--                <input type="checkbox" name="remember" value="1">--}}
{{--                <input type="checkbox" name="tnc"> I agree to the--}}
{{--                <a href="javascript:;">Terms of Service </a> &amp;--}}
{{--                <a href="javascript:;">Privacy Policy </a>--}}
{{--                <span></span>--}}
{{--            </label>--}}
{{--            <div id="register_tnc_error"> </div>--}}
{{--        </div>--}}
        <div class="form-actions">
            <a href="{{Route('login.index')}}" type="button" class="btn red btn-outline"> Back </a>
            <button type="submit" id="register-submit-btn" class="btn green pull-right"> Sign Up </button>
        </div>
    </form>
</div>
<script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>



