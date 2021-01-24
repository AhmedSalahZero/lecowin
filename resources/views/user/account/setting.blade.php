@extends('user.layout.index')


@section('title')
     @lang('lang.Setting')
@endsection


@section('header_link')


    <li>

            <span>@lang('lang.Setting')</span>
        <i class="fa fa-circle"></i>
    </li>
@endsection
@section('header')

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />


    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />


    <!-- BEGIN SHAREAHOLIC CODE -->
    <link rel="preload" href="https://cdn.shareaholic.net/assets/pub/shareaholic.js" as="script" />
    <meta name="shareaholic:af310919b521e763a1ec0a8c32fee6b6" content="af310919b521e763a1ec0a8c32fee6b6" />
    <script data-cfasync="false" async src="https://cdn.shareaholic.net/assets/pub/shareaholic.js"></script>
    <!-- END SHAREAHOLIC CODE -->


    <!-- END THEME LAYOUT STYLES -->
{{--    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


@endsection

@section('inside_title')
{{--    Setting--}}
@endsection
@section('content')
    @include('partial.toaster')

{{--    <div class="alert alert-danger" style="display: none;text-align: center">--}}
{{--        <strong id="fail_message_id">  </strong>--}}
{{--    </div>--}}
{{--    <div class="alert alert-success insert_success" style="display: none;text-align: center">--}}
{{--        <strong>Success! The account has been Created successfully.</strong>--}}
{{--    </div>--}}
{{--    <div class="alert alert-success updated_success" style="display: none;text-align: center">--}}
{{--        <strong>Success! The account has been Updated successfully.</strong>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">

                        <img src="{{asset('storage/'.$currentUser->image)}}" class="img-responsive hoverZoomLink" alt="" style="width: 250px;height: 250px"> </div>

                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$currentUser->first_name . ' ' . $currentUser->last_name}}</div>
                        <div class="profile-usertitle-job"> {{$currentUser->rule->name}} </div>
                        @if(Auth()->user()->isActivated())
                            <div class="profile-usertitle-job"> @lang('lang.Code'): {{$currentUser->code}} </div>
                        @else
                            <div class="profile-usertitle-job"> @lang('lang.Code'): {{$currentUser->generateCode()}} </div>
                            <div class="profile-usertitle-job alert alert-danger" style="color: #0a001f" > @lang('lang.Your Account is not activated yet') </div>
                        @endif

                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        @if(Auth()->user()->isActivated())
                            <button type="button" class="btn btn-circle green btn-sm">@lang('lang.Activated')</button>
                        @else


                            <div class="modal fade " id="exampleModalLong6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <form enctype="multipart/form-data" action="{{route('user.active',[App()->getLocale(),Auth()->user()->id]) }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="portlet light bordered">
                                                            <div class="portlet-title">
                                                                <h2>
                                                                    @lang('lang.Active your account for') {{\App\Models\User::getActivationAmount()}} @lang('lang.egp') @lang('lang.for one year')
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                                    <button  type="submit" class="btn btn-success "> @lang('lang.Active') </button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <button data-target="#exampleModalLong6" data-toggle="modal" type="button" class="btn btn-circle red btn-sm">@lang('lang.Buy Account')</button>
                        @endif


                            <a href="https://www.shareaholic.com/api/share/?v=1&apitype=1&apikey=8943b7fd64cd8b1770ff5affa9a9437b&service=974&title=my code at lecowin = {{Auth()->user()->generateCode()}}&link={{Auth()->user()->generateMyProfileLink()}}/&source=www.google.com.eg&templates[whatsapp][phone]=+0201025894984" target="_blank">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" style="height: 50px;width: 43px">
                            </a>





                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a href="{{Route('profile.index',[App()->getLocale(),Auth()->user()->generateCode()]) }}">
                                    <i class="icon-home"></i> @lang('lang.Overview') </a>
                            </li>
                            <li class="active">
                                <a href="{{Route('user.account.setting',App()->getLocale())}}">
                                    <i class="icon-settings"></i> @lang('lang.Account Settings') </a>
                            </li>

                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->

                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">@lang('lang.Profile Account')</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">@lang('lang.Personal Info')</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">@lang('lang.Change profile Image')</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">@lang('lang.Change Password')</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">@lang('lang.passport')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <form role="form" action="{{Route('user.account.save',App()->getLocale())}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.first_name')</label>
                                                <input type="text" placeholder="@lang('lang.first_name')" class="form-control" name="first_name" value="{{Auth()->user()->first_name}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.last name')</label>
                                                <input type="text" placeholder="@lang('lang.last_name')" class="form-control" name="last_name" value="{{Auth()->user()->last_name}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.email')</label>
                                                <input type="email" placeholder="@lang('lang.your_email')" class="form-control" name="email" value="{{Auth()->user()->email}}" required> </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.address')</label>
                                                <input type="text" placeholder="@lang('lang.your_address')" class="form-control" name="address" value="{{Auth()->user()->address}}" required> </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.job')</label>
                                                <input type="text" placeholder="@lang('lang.your job')" class="form-control" name="job" value="{{Auth()->user()->job}}" > </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.Mobile Number')</label>
                                                <input type="number" placeholder="@lang('lang.Your Mobile Number')" class="form-control" name="phone" value="{{Auth()->user()->phone}}" required> </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.WhatsApp number')</label>
                                                <input type="number" placeholder="@lang('lang.Your whatsapp Number')" class="form-control" name="WhatsApp" value="{{Auth()->user()->WhatsApp}}" >
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="official_id">@lang('lang.Your Official Id (Identity Number)')</label>
                                                <input type="number" id="official_id" placeholder="@lang('lang.Your Official Id (Identity Number)')" class="form-control" name="official_id" value="{{Auth()->user()->official_id}}" >
                                            </div>


                                            <select name="social_status" class="form-control">
                                                <option value="null" {{Auth()->user()->social_status == null ? 'selected' : ''}}> @lang('lang.Choose Your Social Status')</option>
                                                <option value="single" {{Auth()->user()->social_status == 'single' ? 'selected' : ''}}>  @lang('lang.Single')</option>
                                                <option value="married" {{Auth()->user()->social_status == 'married' ? 'selected' : ''}}>  @lang('lang.Married')</option>
                                            </select>



                                            <div class="form-group">
                                                <label class="control-label col-md-12" for="birthday">@lang('lang.Your Birthday')</label>
                                                <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                    <input type="text" id="birthday" class="form-control" readonly="" name="birthday" value="{{isset(Auth()->user()->birthday)?date('d-m-Y',strtotime(Auth()->user()->birthday)): old('birthday')}}" >
                                                    <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </div>





{{--                                            <div class="form-group">--}}
{{--                                                <label class="control-label">About</label>--}}
{{--                                                <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label class="control-label">Website Url</label>--}}
{{--                                                <input type="text" placeholder="http://www.mywebsite.com" class="form-control"> </div>--}}
                                            <div class="margiv-top-10">
                                                <input type="submit" value="@lang('lang.Save Changes')" class="btn green">
                                                <input type="reset" class="btn default" value="@lang('lang.default')">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
{{--                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum--}}
{{--                                            eiusmod. </p>--}}
                                        <form action="{{Route('user.account.change.image',App()->getLocale())}}" role="form" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img id="blah" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""
                                                             style="width: 186px; height: 140px;"


                                                        >
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> @lang('lang.Select image') </span>
                                                                            <span class="fileinput-exists"> @lang('lang.Change') </span>
                                                                            <input id="image" type="file" name="image">

                                                                        </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> @lang('lang.remove') </a>
                                                    </div>
                                                </div>
{{--                                                <div class="clearfix margin-top-10">--}}
{{--                                                    <span class="label label-danger">NOTE! </span>--}}
{{--                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="margin-top-10">
                                                <input type="submit" class="btn green" value="@lang('lang.Submit')">
                                                <a href="javascript:;" class="btn default"> @lang('lang.Cancel') </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <form action="{{Route('user.account.change.password',App()->getLocale())}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.Current Password')</label>
                                                <input type="password" class="form-control" name="old_password"> </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.New Password')</label>
                                                <input type="password" class="form-control" name="new_password"> </div>
                                            <div class="form-group">
                                                <label class="control-label">@lang('lang.Re-type New Password')</label>
                                                <input type="password" class="form-control" name="confirm_new_password"> </div>
                                            <div class="margin-top-10">
                                                <input type="submit" class="btn green" value="@lang('lang.Change Password')">
                                                <input type="reset" class="btn default" value="@lang('lang.clear')">
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <div class="tab-pane" id="tab_1_4">
                                        <form action="{{Route('user.change.passport.image',App()->getLocale())}}" role="form" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img id="blah2" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""
                                                             style="width: 186px; height: 140px;"


                                                        >
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                    <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new"> @lang('lang.Select image') </span>
                                                                            <span class="fileinput-exists"> @lang('lang.Change') </span>
                                                                            <input id="image2" type="file" name="image">
                                                                        </span>
                                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> @lang('lang.remove') </a>
                                                    </div>
                                                </div>
                                                {{--                                                <div class="clearfix margin-top-10">--}}
                                                {{--                                                    <span class="label label-danger">NOTE! </span>--}}
                                                {{--                                                    <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                            <div class="margin-top-10">
                                                <input type="submit" class="btn green" value="@lang('lang.Submit')">
                                                <a href="javascript:;" class="btn default"> @lang('lang.Cancel') </a>
                                            </div>
                                        </form>


                                        {{--                                        <form action="#">--}}
{{--                                            <table class="table table-light table-hover">--}}
{{--                                                <tbody><tr>--}}
{{--                                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="mt-radio-inline">--}}
{{--                                                            <label class="mt-radio">--}}
{{--                                                                <input type="radio" name="optionsRadios1" value="option1"> Yes--}}
{{--                                                                <span></span>--}}
{{--                                                            </label>--}}
{{--                                                            <label class="mt-radio">--}}
{{--                                                                <input type="radio" name="optionsRadios1" value="option2" checked=""> No--}}
{{--                                                                <span></span>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="mt-radio-inline">--}}
{{--                                                            <label class="mt-radio">--}}
{{--                                                                <input type="radio" name="optionsRadios11" value="option1"> Yes--}}
{{--                                                                <span></span>--}}
{{--                                                            </label>--}}
{{--                                                            <label class="mt-radio">--}}
{{--                                                                <input type="radio" name="optionsRadios11" value="option2" checked=""> No--}}
{{--                                                                <span></span>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="mt-radio-inline">--}}
{{--                                                            <label class="mt-radio">--}}
{{--                                                                <input type="radio" name="optionsRadios21" value="option1"> Yes--}}
{{--                                                                <span></span>--}}
{{--                                                            </label>--}}
{{--                                                            <label class="mt-radio">--}}
{{--                                                                <input type="radio" name="optionsRadios21" value="option2" checked=""> No--}}
{{--                                                                <span></span>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="mt-radio-inline">--}}
{{--                                                            <label class="mt-radio">--}}
{{--                                                                <input type="radio" name="optionsRadios31" value="option1"> Yes--}}
{{--                                                                <span></span>--}}
{{--                                                            </label>--}}
{{--                                                            <label class="mt-radio">--}}
{{--                                                                <input type="radio" name="optionsRadios31" value="option2" checked=""> No--}}
{{--                                                                <span></span>--}}
{{--                                                            </label>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                </tbody></table>--}}
{{--                                            <!--end profile-settings-->--}}
{{--                                            <div class="margin-top-10">--}}
{{--                                                <a href="javascript:;" class="btn red"> @lang('lang.Save Changes') </a>--}}
{{--                                                <a href="javascript:;" class="btn default"> @lang('lang.Cancel') </a>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
                                    </div>
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>


@endsection

@section('footer')
    <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript')}}"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>

    <!-- END CORE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <script src="{{asset('assets/pages/scripts/components-bootstrap-select.min.js')}}" type="text/javascript"></script>

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>

{{--    <script>--}}
{{--        $(document).on('click', '#sub_create_account_btn', function (e) {--}}
{{--            e.preventDefault();--}}


{{--            let lang = "{{App()->getLocale()}}"--}}
{{--            $.ajax({--}}


{{--                type: 'POST',--}}
{{--                url: `/admin/categories`,--}}
{{--                data: {--}}
{{--                    '_token':"{{csrf_token()}}",--}}
{{--                    'title_en':$("#title_en").val(),--}}
{{--                    'title_ar':$("#title_ar").val(),--}}
{{--                    'icon_url':$("#icon_url").val(),--}}
{{--                    'description_en':CKEDITOR.instances.description_en.getData(),--}}
{{--                    'description_ar':CKEDITOR.instances.description_ar.getData(),--}}
{{--                    'sub_of':$('#sub_of').val()--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    if(data.status===true)--}}
{{--                    {--}}
{{--                        $('.insert_success').show();--}}
{{--                        if(data.appear ==true)--}}
{{--                        {--}}


{{--                            $('.categories_options').append(`<option value="${data.account_id}">${data.account_title_en}</option>`)--}}
{{--                        }--}}

{{--                        setTimeout(function(){--}}
{{--                            $('.insert_success').hide();--}}
{{--                        },2000)--}}
{{--                    }--}}
{{--                    else{--}}
{{--                        $('.alert-danger').show();--}}
{{--                        $('#fail_message_id').append(`${data.message}`).css('display','block');--}}
{{--                        setTimeout(function(){--}}
{{--                            $('.alert-danger').hide();--}}
{{--                            $('#fail_message_id').hide().empty();--}}
{{--                        },2500)--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}


{{--    </script>--}}
    <script>
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                console.log('entered');
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function(){

            readURL(this);
        });


    </script>

    <script>
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah2').attr('src', e.target.result);
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                console.log('entered');
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image2").change(function(){

            readURL(this);
        });


    </script>

    <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>

    <script>
        $('#sub_of').on('change',function(){
            $('#icon_url_div').show();
            if ($(this).val() !== 'none')
            {
                $('#icon_url_div').hide();
            }

        })
    </script>
{{--    <script>--}}
{{--        $(document).on('click', '#sub_edit_account_btn', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            let lang = "{{App()->getLocale()}}";--}}
{{--            let id = $(e.target).attr('account_id');--}}
{{--            $.ajax({--}}
{{--                type: 'put',--}}
{{--                url: `/admin/categories/${id}`,--}}
{{--                data: {--}}
{{--                    '_token':"{{csrf_token()}}",--}}
{{--                    'title_en':$("#title_en").val(),--}}
{{--                    'title_ar':$("#title_ar").val(),--}}
{{--                    'icon_url':$("#icon_url").val(),--}}
{{--                    'description_en':CKEDITOR.instances.description_en.getData(),--}}
{{--                    'description_ar':CKEDITOR.instances.description_ar.getData(),--}}
{{--                    'sub_of':$('#sub_of').val()--}}
{{--                },--}}
{{--                success: function (data) {--}}
{{--                    if(data.status===true)--}}
{{--                    {--}}
{{--                        $('.updated_success').show();--}}

{{--                        setTimeout(function(){--}}
{{--                            $('.updated_success').hide();--}}
{{--                        },2000)--}}
{{--                    }--}}
{{--                    else{--}}
{{--                        $('.alert-danger').show();--}}
{{--                        $('#fail_message_id').append(`${data.message}`).css('display','block');--}}
{{--                        setTimeout(function(){--}}
{{--                            $('.alert-danger').hide();--}}
{{--                            $('#fail_message_id').hide().empty();--}}
{{--                        },2500)--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}


{{--    </script>--}}
{{--    <script src="{{url('ckeditor/ckeditor.js')}}" type="text/javascript"></script>--}}
{{--    <script>--}}

{{--        CKEDITOR.replace( 'description_en', {--}}
{{--            height: 300,--}}
{{--            filebrowserUploadUrl: "{{Route('upload.image',App()->getLocale())}}"--}}
{{--        });--}}
{{--        CKEDITOR.replace( 'description_ar', {--}}
{{--            height: 300,--}}
{{--            filebrowserUploadUrl: "{{Route('upload.image',App()->getLocale())}}",--}}
{{--            filebrowserUploadMethod: 'form'--}}
{{--        });--}}
{{--    </script>--}}

@endsection

