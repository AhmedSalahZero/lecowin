@extends('user.layout.index')


@section('title')
     account
@endsection


@section('inside_title')

Account

@endsection
@section('header_link')
    <li>
        <a href="{{Route('account.index')}}">Account </a>
        <i class="fa fa-circle"></i>
    </li>

    <li>
        @if(isset($account))
            <span>Edit account</span>
        @else
            <span>Create account</span>
        @endif
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


    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
{{--    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>




@endsection

@section('inside_title')
    User Profile
@endsection
@section('content')

@include('partial.toaster')
    <div class="alert alert-danger" style="display: none;text-align: center">
        <strong id="fail_message_id">  </strong>
    </div>
{{--    <div class="alert alert-success insert_success" style="display: none;text-align: center">--}}
{{--        <strong>Success! The account has been Created successfully.</strong>--}}
{{--    </div>--}}
    <div class="alert alert-success updated_success" style="display: none;text-align: center">
        <strong>Success! The account has been Updated successfully.</strong>
    </div>
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
                    <div class="profile-usertitle-name"> {{$currentUser->name}}</div>
                    <div class="profile-usertitle-job"> {{$currentUser->rule->name}} </div>
                    @if(Auth()->user()->isActivated())
                    <div class="profile-usertitle-job"> Code: {{$currentUser->code}} </div>
                    @else
                        <div class="profile-usertitle-job alert alert-danger" style="color: #0a001f" > Your Account is not activated yet </div>
                    @endif

                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                   @if(Auth()->user()->isActivated())
                        <button type="button" class="btn btn-circle green btn-sm">Activated</button>
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


                                        <form enctype="multipart/form-data" action="{{route('user.active',Auth()->user()->id) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="portlet light bordered">
                                                        <div class="portlet-title">
                                                            <h2>
                                                                Active your account for {{\App\Models\User::getActivationAmount()}} EGP for one year ?
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button  type="submit" class="btn btn-success "> Active </button>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <button data-target="#exampleModalLong6" data-toggle="modal" type="button" class="btn btn-circle red btn-sm">Buy Account</button>
                       @endif

                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="{{Route('account.index')}}">
                                <i class="icon-home"></i> Overview </a>
                        </li>
                        <li >
                            <a href="{{Route('user.account.setting')}}">
                                <i class="icon-settings"></i> Account Settings </a>
                        </li>
                        <li>
                            <a href="page_user_profile_1_help.html">
                                <i class="icon-info"></i> Help </a>
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
                <div class="row widget-row">
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Current Balance</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-green icon-bulb"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">EGP</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$currentUser->totalCash()}}"></span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">current level</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-red icon-layers"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">level</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{($currentUser->getMaxLevel())}}"></span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>

                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Current Networkers</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                <div class="widget-thumb-body">
                                    @if($currentUser->countTotalNetworks() != 1 )
                                    <span class="widget-thumb-subtitle">networkers</span>
                                    @else
                                        <span class="widget-thumb-subtitle">networker</span>
                                        @endif
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$currentUser->countTotalNetworks()}}">815</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>


                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">networkers balance</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">EGP</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{Auth()->user()->totalNetworkProfit()}}">5,071</span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>
                    @if(Auth()->user()->isActivated())
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Account expires at</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-calendar"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Year</span>
                                        <span class="widget-thumb-body-stat"  data-value="">{{expiresYear(Auth()->user()->activated_at)}}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Reminder days</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-clock"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">days</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{expiresDays(expiresYear(Auth()->user()->activated_at))}}"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                    @endif

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bar-chart font-dark hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">networkers</span>
                                    <span class="caption-helper">per level</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                        <label class="btn red btn-outline btn-circle btn-sm active">
                                            <input type="radio" name="options" class="toggle" id="option1">New</label>
                                        <label class="btn red btn-outline btn-circle btn-sm">
                                            <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="site_statistics_loading" style="display: none;">
                                    <img src="http://127.0.0.1:8000/assets/global/img/loading.gif" alt="loading"> </div>
                                <div id="site_statistics_content" class="display-none" style="display: block;">
                                    <div id="site_statistics" class="chart" style="padding: 0px; position: relative;"> <canvas class="flot-base" width="743" height="337" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 661px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 15px; text-align: center;">1</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 85px; text-align: center;">2</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 155px; text-align: center;">3</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 225px; text-align: center;">4</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 295px; text-align: center;">5</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 365px; text-align: center;">6</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 435px; text-align: center;">7</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 505px; text-align: center;">8</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 575px; text-align: center;">9</div><div style="position: absolute; max-width: 67px; top: 286px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 642px; text-align: center;">10</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 275px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">0</div><div style="position: absolute; top: 221px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">5</div><div style="position: absolute; top: 167px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">10</div><div style="position: absolute; top: 114px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">15</div><div style="position: absolute; top: 60px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">20</div><div style="position: absolute; top: 7px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">25</div></div></div><canvas class="flot-overlay" width="743" height="337" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 661px; height: 300px;"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET-->
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-share font-red-sunglo hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">Revenue</span>
                                    <span class="caption-helper">monthly stats...</span>
                                </div>
                                <div class="actions">
                                    <div class="btn-group">
                                        <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                            <span class="fa fa-angle-down"> </span>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;"> Q1 2014
                                                    <span class="label label-sm label-default"> past </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> Q2 2014
                                                    <span class="label label-sm label-default"> past </span>
                                                </a>
                                            </li>
                                            <li class="active">
                                                <a href="javascript:;"> Q3 2014
                                                    <span class="label label-sm label-success"> current </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> Q4 2014
                                                    <span class="label label-sm label-warning"> upcoming </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div id="site_activities_loading" style="display: none;">
                                    <img src="http://127.0.0.1:8000/assets/global/img/loading.gif" alt="loading"> </div>
                                <div id="site_activities_content" class="display-none" style="display: block;">
                                    <div id="site_activities" style="height: 228px; padding: 0px; position: relative;"> <canvas class="flot-base" width="743" height="256" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 661px; height: 228px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 21px; text-align: center;">DEC</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 91px; text-align: center;">JAN</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 159px; text-align: center;">FEB</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 225px; text-align: center;">MAR</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 296px; text-align: center;">APR</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 363px; text-align: center;">MAY</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 433px; text-align: center;">JUN</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 503px; text-align: center;">JUL</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 569px; text-align: center;">AUG</div><div style="position: absolute; max-width: 67px; top: 209px; font: small-caps 400 11px / 18px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 640px; text-align: center;">SEP</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div style="position: absolute; top: 198px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 20px; text-align: right;">0</div><div style="position: absolute; top: 149px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 7px; text-align: right;">500</div><div style="position: absolute; top: 101px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1000</div><div style="position: absolute; top: 52px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">1500</div><div style="position: absolute; top: 4px; font: small-caps 400 11px / 14px &quot;Open Sans&quot;, sans-serif; color: rgb(111, 123, 138); left: 1px; text-align: right;">2000</div></div></div><canvas class="flot-overlay" width="743" height="256" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 661px; height: 228px;"></canvas></div>
                                </div>
                                <div style="margin: 20px 0 10px 30px">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                            <span class="label label-sm label-success"> Revenue: </span>
                                            <h3>$13,234</h3>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                            <span class="label label-sm label-info"> Tax: </span>
                                            <h3>$134,900</h3>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                            <span class="label label-sm label-danger"> Shipment: </span>
                                            <h3>$1,134</h3>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                            <span class="label label-sm label-warning"> Orders: </span>
                                            <h3>235090</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END PORTLET-->
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
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>

    <script>
        $(document).on('click', '#sub_create_account_btn', function (e) {
            e.preventDefault();


            let lang = "{{App()->getLocale()}}"
            $.ajax({


                type: 'POST',
                url: `/admin/categories`,
                data: {
                    '_token':"{{csrf_token()}}",
                    'title_en':$("#title_en").val(),
                    'title_ar':$("#title_ar").val(),
                    'icon_url':$("#icon_url").val(),
                    'description_en':CKEDITOR.instances.description_en.getData(),
                    'description_ar':CKEDITOR.instances.description_ar.getData(),
                    'sub_of':$('#sub_of').val()
                },
                success: function (data) {
                    if(data.status===true)
                    {
                        $('.insert_success').show();
                        if(data.appear ==true)
                        {


                            $('.categories_options').append(`<option value="${data.account_id}">${data.account_title_en}</option>`)
                        }

                        setTimeout(function(){
                            $('.insert_success').hide();
                        },2000)
                    }
                    else{
                        $('.alert-danger').show();
                        $('#fail_message_id').append(`${data.message}`).css('display','block');
                        setTimeout(function(){
                            $('.alert-danger').hide();
                            $('#fail_message_id').hide().empty();
                        },2500)
                    }
                }
            });
        });


    </script>
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


    <script src="{{asset('assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>


    <script>
        var Dashboard = function() {

            return {

                initJQVMAP: function() {
                    if (!jQuery().vectorMap) {
                        return;
                    }

                    var showMap = function(name) {
                        jQuery('.vmaps').hide();
                        jQuery('#vmap_' + name).show();
                    }

                    var setMap = function(name) {
                        var map = jQuery('#vmap_' + name);

                        if (map.size() !== 1) {
                            return;
                        }

                        var data = {
                            map: 'world_en',
                            backgroundColor: null,
                            borderColor: '#333333',
                            borderOpacity: 0.5,
                            borderWidth: 1,
                            color: '#c6c6c6',
                            enableZoom: true,
                            hoverColor: '#c9dfaf',
                            hoverOpacity: null,
                            values: sample_data,
                            normalizeFunction: 'linear',
                            scaleColors: ['#b6da93', '#909cae'],
                            selectedColor: '#c9dfaf',
                            selectedRegion: null,
                            showTooltip: true,
                            onLabelShow: function(event, label, code) {

                            },
                            onRegionOver: function(event, code) {
                                if (code == 'ca') {
                                    event.preventDefault();
                                }
                            },
                            onRegionClick: function(element, code, region) {
                                var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
                                alert(message);
                            }
                        };

                        data.map = name + '_en';

                        map.width(map.parent().parent().width());
                        map.show();
                        map.vectorMap(data);
                        map.hide();
                    }

                    setMap("world");
                    setMap("usa");
                    setMap("europe");
                    setMap("russia");
                    setMap("germany");
                    showMap("world");

                    jQuery('#regional_stat_world').click(function() {
                        showMap("world");
                    });

                    jQuery('#regional_stat_usa').click(function() {
                        showMap("usa");
                    });

                    jQuery('#regional_stat_europe').click(function() {
                        showMap("europe");
                    });
                    jQuery('#regional_stat_russia').click(function() {
                        showMap("russia");
                    });
                    jQuery('#regional_stat_germany').click(function() {
                        showMap("germany");
                    });

                    $('#region_statistics_loading').hide();
                    $('#region_statistics_content').show();

                    App.addResizeHandler(function() {
                        jQuery('.vmaps').each(function() {
                            var map = jQuery(this);
                            map.width(map.parent().width());
                        });
                    });
                },

                initCalendar: function() {
                    if (!jQuery().fullCalendar) {
                        return;
                    }

                    var date = new Date();
                    var d = date.getDate();
                    var m = date.getMonth();
                    var y = date.getFullYear();

                    var h = {};

                    if ($('#calendar').width() <= 400) {
                        $('#calendar').addClass("mobile");
                        h = {
                            left: 'title, prev, next',
                            center: '',
                            right: 'today,month,agendaWeek,agendaDay'
                        };
                    } else {
                        $('#calendar').removeClass("mobile");
                        if (App.isRTL()) {
                            h = {
                                right: 'title',
                                center: '',
                                left: 'prev,next,today,month,agendaWeek,agendaDay'
                            };
                        } else {
                            h = {
                                left: 'title',
                                center: '',
                                right: 'prev,next,today,month,agendaWeek,agendaDay'
                            };
                        }
                    }



                    $('#calendar').fullCalendar('destroy'); // destroy the calendar
                    $('#calendar').fullCalendar({ //re-initialize the calendar
                        disableDragging: false,
                        header: h,
                        editable: true,
                        events: [{
                            title: 'All Day',
                            start: new Date(y, m, 1),
                            backgroundColor: App.getBrandColor('yellow')
                        }, {
                            title: 'Long Event',
                            start: new Date(y, m, d - 5),
                            end: new Date(y, m, d - 2),
                            backgroundColor: App.getBrandColor('blue')
                        }, {
                            title: 'Repeating Event',
                            start: new Date(y, m, d - 3, 16, 0),
                            allDay: false,
                            backgroundColor: App.getBrandColor('red')
                        }, {
                            title: 'Repeating Event',
                            start: new Date(y, m, d + 6, 16, 0),
                            allDay: false,
                            backgroundColor: App.getBrandColor('green')
                        }, {
                            title: 'Meeting',
                            start: new Date(y, m, d + 9, 10, 30),
                            allDay: false
                        }, {
                            title: 'Lunch',
                            start: new Date(y, m, d, 14, 0),
                            end: new Date(y, m, d, 14, 0),
                            backgroundColor: App.getBrandColor('grey'),
                            allDay: false
                        }, {
                            title: 'Birthday',
                            start: new Date(y, m, d + 1, 19, 0),
                            end: new Date(y, m, d + 1, 22, 30),
                            backgroundColor: App.getBrandColor('purple'),
                            allDay: false
                        }, {
                            title: 'Click for Google',
                            start: new Date(y, m, 28),
                            end: new Date(y, m, 29),
                            backgroundColor: App.getBrandColor('yellow'),
                            url: 'http://google.com/'
                        }]
                    });
                },

                initCharts: function() {
                    if (!jQuery.plot) {
                        return;
                    }

                    function showChartTooltip(x, y, xValue, yValue) {
                        $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                            position: 'absolute',
                            display: 'none',
                            top: y - 40,
                            left: x - 40,
                            border: '0px solid #ccc',
                            padding: '2px 6px',
                            'background-color': '#fff'
                        }).appendTo("body").fadeIn(200);
                    }

                    var data = [];
                    var totalPoints = 250;

                    // random data generator for plot charts

                    function getRandomData() {
                        if (data.length > 0) data = data.slice(1);
                        // do a random walk
                        while (data.length < totalPoints) {
                            var prev = data.length > 0 ? data[data.length - 1] : 50;
                            var y = prev + Math.random() * 10 - 5;
                            if (y < 0) y = 0;
                            if (y > 100) y = 100;
                            data.push(y);
                        }
                        // zip the generated y values with the x values
                        var res = [];
                        for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
                        return res;
                    }

                    function randValue() {
                        return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
                    }
                    var visitors = [
                            @foreach(\App\Models\Level_finance::countAllNetWorkers() as $key=>$counter)
                        ['{{$key}}', {{$counter}}],
                        @endforeach
                    ];
                    if ($('#site_statistics').size() != 0) {

                        $('#site_statistics_loading').hide();
                        $('#site_statistics_content').show();

                        var plot_statistics = $.plot($("#site_statistics"), [{
                                data: visitors,
                                lines: {
                                    fill: 0.6,
                                    lineWidth: 0
                                },
                                color: ['#f89f9f']
                            }, {
                                data: visitors,
                                points: {
                                    show: true,
                                    fill: true,
                                    radius: 5,
                                    fillColor: "#f89f9f",
                                    lineWidth: 3
                                },
                                color: '#fff',
                                shadowSize: 0
                            }],

                            {
                                xaxis: {
                                    tickLength: 0,
                                    tickDecimals: 0,
                                    mode: "categories",
                                    min: 0,
                                    font: {
                                        lineHeight: 14,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "#6F7B8A"
                                    }
                                },
                                yaxis: {
                                    ticks: 5,
                                    tickDecimals: 0,
                                    tickColor: "#eee",
                                    font: {
                                        lineHeight: 14,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "#6F7B8A"
                                    }
                                },
                                grid: {
                                    hoverable: true,
                                    clickable: true,
                                    tickColor: "#eee",
                                    borderColor: "#eee",
                                    borderWidth: 1
                                }
                            });

                        var previousPoint = null;
                        $("#site_statistics").bind("plothover", function(event, pos, item) {
                            $("#x").text(pos.x.toFixed(2));
                            $("#y").text(pos.y.toFixed(2));
                            if (item) {
                                if (previousPoint != item.dataIndex) {
                                    previousPoint = item.dataIndex;

                                    $("#tooltip").remove();
                                    var x = item.datapoint[0].toFixed(2),
                                        y = item.datapoint[1].toFixed(2);

                                    showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' users');
                                }
                            } else {
                                $("#tooltip").remove();
                                previousPoint = null;
                            }
                        });
                    }


                    if ($('#site_activities').size() != 0) {
                        //site activities
                        var previousPoint2 = null;
                        $('#site_activities_loading').hide();
                        $('#site_activities_content').show();

                        var data1 = [
                            ['DEC', 300],
                            ['JAN', 600],
                            ['FEB', 1100],
                            ['MAR', 1200],
                            ['APR', 860],
                            ['MAY', 1200],
                            ['JUN', 1450],
                            ['JUL', 1800],
                            ['AUG', 1200],
                            ['SEP', 600]
                        ];


                        var plot_statistics = $.plot($("#site_activities"),

                            [{
                                data: data1,
                                lines: {
                                    fill: 0.2,
                                    lineWidth: 0,
                                },
                                color: ['#BAD9F5']
                            }, {
                                data: data1,
                                points: {
                                    show: true,
                                    fill: true,
                                    radius: 4,
                                    fillColor: "#9ACAE6",
                                    lineWidth: 2
                                },
                                color: '#9ACAE6',
                                shadowSize: 1
                            }, {
                                data: data1,
                                lines: {
                                    show: true,
                                    fill: false,
                                    lineWidth: 3
                                },
                                color: '#9ACAE6',
                                shadowSize: 0
                            }],

                            {

                                xaxis: {
                                    tickLength: 0,
                                    tickDecimals: 0,
                                    mode: "categories",
                                    min: 0,
                                    font: {
                                        lineHeight: 18,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "#6F7B8A"
                                    }
                                },
                                yaxis: {
                                    ticks: 5,
                                    tickDecimals: 0,
                                    tickColor: "#eee",
                                    font: {
                                        lineHeight: 14,
                                        style: "normal",
                                        variant: "small-caps",
                                        color: "#6F7B8A"
                                    }
                                },
                                grid: {
                                    hoverable: true,
                                    clickable: true,
                                    tickColor: "#eee",
                                    borderColor: "#eee",
                                    borderWidth: 1
                                }
                            });

                        $("#site_activities").bind("plothover", function(event, pos, item) {
                            $("#x").text(pos.x.toFixed(2));
                            $("#y").text(pos.y.toFixed(2));
                            if (item) {
                                if (previousPoint2 != item.dataIndex) {
                                    previousPoint2 = item.dataIndex;
                                    $("#tooltip").remove();
                                    var x = item.datapoint[0].toFixed(2),
                                        y = item.datapoint[1].toFixed(2);
                                    showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + 'M$');
                                }
                            }
                        });

                        $('#site_activities').bind("mouseleave", function() {
                            $("#tooltip").remove();
                        });
                    }
                },

                initEasyPieCharts: function() {
                    if (!jQuery().easyPieChart) {
                        return;
                    }

                    $('.easy-pie-chart .number.transactions').easyPieChart({
                        animate: 1000,
                        size: 75,
                        lineWidth: 3,
                        barColor: App.getBrandColor('yellow')
                    });

                    $('.easy-pie-chart .number.visits').easyPieChart({
                        animate: 1000,
                        size: 75,
                        lineWidth: 3,
                        barColor: App.getBrandColor('green')
                    });

                    $('.easy-pie-chart .number.bounce').easyPieChart({
                        animate: 1000,
                        size: 75,
                        lineWidth: 3,
                        barColor: App.getBrandColor('red')
                    });

                    $('.easy-pie-chart-reload').click(function() {
                        $('.easy-pie-chart .number').each(function() {
                            var newValue = Math.floor(100 * Math.random());
                            $(this).data('easyPieChart').update(newValue);
                            $('span', this).text(newValue);
                        });
                    });
                },

                initSparklineCharts: function() {
                    if (!jQuery().sparkline) {
                        return;
                    }
                    $("#sparkline_bar").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11, 10, 9, 11, 13, 13, 12], {
                        type: 'bar',
                        width: '100',
                        barWidth: 5,
                        height: '55',
                        barColor: '#35aa47',
                        negBarColor: '#e02222'
                    });

                    $("#sparkline_bar2").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11, 10], {
                        type: 'bar',
                        width: '100',
                        barWidth: 5,
                        height: '55',
                        barColor: '#ffb848',
                        negBarColor: '#e02222'
                    });

                    $("#sparkline_bar5").sparkline([8, 9, 10, 11, 10, 10, 12, 10, 10, 11, 9, 12, 11, 10, 9, 11, 13, 13, 12], {
                        type: 'bar',
                        width: '100',
                        barWidth: 5,
                        height: '55',
                        barColor: '#35aa47',
                        negBarColor: '#e02222'
                    });

                    $("#sparkline_bar6").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11, 10], {
                        type: 'bar',
                        width: '100',
                        barWidth: 5,
                        height: '55',
                        barColor: '#ffb848',
                        negBarColor: '#e02222'
                    });

                    $("#sparkline_line").sparkline([9, 10, 9, 10, 10, 11, 12, 10, 10, 11, 11, 12, 11, 10, 12, 11, 10, 12], {
                        type: 'line',
                        width: '100',
                        height: '55',
                        lineColor: '#ffb848'
                    });
                },

                initMorisCharts: function() {
                    if (Morris.EventEmitter && $('#sales_statistics').size() > 0) {
                        // Use Morris.Area instead of Morris.Line
                        dashboardMainChart = Morris.Area({
                            element: 'sales_statistics',
                            padding: 0,
                            behaveLikeLine: false,
                            gridEnabled: false,
                            gridLineColor: false,
                            axes: false,
                            fillOpacity: 1,
                            data: [{
                                period: '2011 Q1',
                                sales: 1400,
                                profit: 400
                            }, {
                                period: '2011 Q2',
                                sales: 1100,
                                profit: 600
                            }, {
                                period: '2011 Q3',
                                sales: 1600,
                                profit: 500
                            }, {
                                period: '2011 Q4',
                                sales: 1200,
                                profit: 400
                            }, {
                                period: '2012 Q1',
                                sales: 1550,
                                profit: 800
                            }],
                            lineColors: ['#399a8c', '#92e9dc'],
                            xkey: 'period',
                            ykeys: ['sales', 'profit'],
                            labels: ['Sales', 'Profit'],
                            pointSize: 0,
                            lineWidth: 0,
                            hideHover: 'auto',
                            resize: true
                        });

                    }
                },

                initChat: function() {
                    var cont = $('#chats');
                    var list = $('.chats', cont);
                    var form = $('.chat-form', cont);
                    var input = $('input', form);
                    var btn = $('.btn', form);

                    var handleClick = function(e) {
                        e.preventDefault();

                        var text = input.val();
                        if (text.length == 0) {
                            return;
                        }

                        var time = new Date();
                        var time_str = (time.getHours() + ':' + time.getMinutes());
                        var tpl = '';
                        tpl += '<li class="out">';
                        tpl += '<img class="avatar" alt="" src="' + Layout.getLayoutImgPath() + 'avatar1.jpg"/>';
                        tpl += '<div class="message">';
                        tpl += '<span class="arrow"></span>';
                        tpl += '<a href="#" class="name">Bob Nilson</a>&nbsp;';
                        tpl += '<span class="datetime">at ' + time_str + '</span>';
                        tpl += '<span class="body">';
                        tpl += text;
                        tpl += '</span>';
                        tpl += '</div>';
                        tpl += '</li>';

                        var msg = list.append(tpl);
                        input.val("");

                        var getLastPostPos = function() {
                            var height = 0;
                            cont.find("li.out, li.in").each(function() {
                                height = height + $(this).outerHeight();
                            });

                            return height;
                        }

                        cont.find('.scroller').slimScroll({
                            scrollTo: getLastPostPos()
                        });
                    }

                    $('body').on('click', '.message .name', function(e) {
                        e.preventDefault(); // prevent click event

                        var name = $(this).text(); // get clicked user's full name
                        input.val('@' + name + ':'); // set it into the input field
                        App.scrollTo(input); // scroll to input if needed
                    });

                    btn.click(handleClick);

                    input.keypress(function(e) {
                        if (e.which == 13) {
                            handleClick(e);
                            return false; //<---- Add this line
                        }
                    });
                },

                initDashboardDaterange: function() {
                    if (!jQuery().daterangepicker) {
                        return;
                    }

                    $('#dashboard-report-range').daterangepicker({
                        "ranges": {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                            'Last 7 Days': [moment().subtract('days', 6), moment()],
                            'Last 30 Days': [moment().subtract('days', 29), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                        },
                        "locale": {
                            "format": "MM/DD/YYYY",
                            "separator": " - ",
                            "applyLabel": "Apply",
                            "cancelLabel": "Cancel",
                            "fromLabel": "From",
                            "toLabel": "To",
                            "customRangeLabel": "Custom",
                            "daysOfWeek": [
                                "Su",
                                "Mo",
                                "Tu",
                                "We",
                                "Th",
                                "Fr",
                                "Sa"
                            ],
                            "monthNames": [
                                "January",
                                "February",
                                "March",
                                "April",
                                "May",
                                "June",
                                "July",
                                "August",
                                "September",
                                "October",
                                "November",
                                "December"
                            ],
                            "firstDay": 1
                        },
                        //"startDate": "11/08/2015",
                        //"endDate": "11/14/2015",
                        opens: (App.isRTL() ? 'right' : 'left'),
                    }, function(start, end, label) {
                        $('#dashboard-report-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    });

                    $('#dashboard-report-range span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                    $('#dashboard-report-range').show();
                },

                initAmChart1: function() {
                    if (typeof(AmCharts) === 'undefined' || $('#dashboard_amchart_1').size() === 0) {
                        return;
                    }

                    var chartData = [{
                        "date": "2012-01-05",
                        "distance": 480,
                        "townName": "Miami",
                        "townName2": "Miami",
                        "townSize": 10,
                        "latitude": 25.83,
                        "duration": 501
                    }, {
                        "date": "2012-01-06",
                        "distance": 386,
                        "townName": "Tallahassee",
                        "townSize": 7,
                        "latitude": 30.46,
                        "duration": 443
                    }, {
                        "date": "2012-01-07",
                        "distance": 348,
                        "townName": "New Orleans",
                        "townSize": 10,
                        "latitude": 29.94,
                        "duration": 405
                    }, {
                        "date": "2012-01-08",
                        "distance": 238,
                        "townName": "Houston",
                        "townName2": "Houston",
                        "townSize": 16,
                        "latitude": 29.76,
                        "duration": 309
                    }, {
                        "date": "2012-01-09",
                        "distance": 218,
                        "townName": "Dalas",
                        "townSize": 17,
                        "latitude": 32.8,
                        "duration": 287
                    }, {
                        "date": "2012-01-10",
                        "distance": 349,
                        "townName": "Oklahoma City",
                        "townSize": 11,
                        "latitude": 35.49,
                        "duration": 485
                    }, {
                        "date": "2012-01-11",
                        "distance": 603,
                        "townName": "Kansas City",
                        "townSize": 10,
                        "latitude": 39.1,
                        "duration": 890
                    }, {
                        "date": "2012-01-12",
                        "distance": 534,
                        "townName": "Denver",
                        "townName2": "Denver",
                        "townSize": 18,
                        "latitude": 39.74,
                        "duration": 810
                    }, {
                        "date": "2012-01-13",
                        "townName": "Salt Lake City",
                        "townSize": 12,
                        "distance": 425,
                        "duration": 670,
                        "latitude": 40.75,
                        "alpha": 0.4
                    }, {
                        "date": "2012-01-14",
                        "latitude": 36.1,
                        "duration": 470,
                        "townName": "Las Vegas",
                        "townName2": "Las Vegas",
                        "bulletClass": "lastBullet"
                    }, {
                        "date": "2012-01-15"
                    }];
                    var chart = AmCharts.makeChart("dashboard_amchart_1", {
                        type: "serial",
                        fontSize: 12,
                        fontFamily: "Open Sans",
                        dataDateFormat: "YYYY-MM-DD",
                        dataProvider: chartData,

                        addClassNames: true,
                        startDuration: 1,
                        color: "#6c7b88",
                        marginLeft: 0,

                        categoryField: "date",
                        categoryAxis: {
                            parseDates: true,
                            minPeriod: "DD",
                            autoGridCount: false,
                            gridCount: 50,
                            gridAlpha: 0.1,
                            gridColor: "#FFFFFF",
                            axisColor: "#555555",
                            dateFormats: [{
                                period: 'DD',
                                format: 'DD'
                            }, {
                                period: 'WW',
                                format: 'MMM DD'
                            }, {
                                period: 'MM',
                                format: 'MMM'
                            }, {
                                period: 'YYYY',
                                format: 'YYYY'
                            }]
                        },

                        valueAxes: [{
                            id: "a1",
                            title: "distance",
                            gridAlpha: 0,
                            axisAlpha: 0
                        }, {
                            id: "a2",
                            position: "right",
                            gridAlpha: 0,
                            axisAlpha: 0,
                            labelsEnabled: false
                        }, {
                            id: "a3",
                            title: "duration",
                            position: "right",
                            gridAlpha: 0,
                            axisAlpha: 0,
                            inside: true,
                            duration: "mm",
                            durationUnits: {
                                DD: "d. ",
                                hh: "h ",
                                mm: "min",
                                ss: ""
                            }
                        }],
                        graphs: [{
                            id: "g1",
                            valueField: "distance",
                            title: "distance",
                            type: "column",
                            fillAlphas: 0.7,
                            valueAxis: "a1",
                            balloonText: "[[value]] miles",
                            legendValueText: "[[value]] mi",
                            legendPeriodValueText: "total: [[value.sum]] mi",
                            lineColor: "#08a3cc",
                            alphaField: "alpha",
                        }, {
                            id: "g2",
                            valueField: "latitude",
                            classNameField: "bulletClass",
                            title: "latitude/city",
                            type: "line",
                            valueAxis: "a2",
                            lineColor: "#786c56",
                            lineThickness: 1,
                            legendValueText: "[[description]]/[[value]]",
                            descriptionField: "townName",
                            bullet: "round",
                            bulletSizeField: "townSize",
                            bulletBorderColor: "#02617a",
                            bulletBorderAlpha: 1,
                            bulletBorderThickness: 2,
                            bulletColor: "#89c4f4",
                            labelText: "[[townName2]]",
                            labelPosition: "right",
                            balloonText: "latitude:[[value]]",
                            showBalloon: true,
                            animationPlayed: true,
                        }, {
                            id: "g3",
                            title: "duration",
                            valueField: "duration",
                            type: "line",
                            valueAxis: "a3",
                            lineAlpha: 0.8,
                            lineColor: "#e26a6a",
                            balloonText: "[[value]]",
                            lineThickness: 1,
                            legendValueText: "[[value]]",
                            bullet: "square",
                            bulletBorderColor: "#e26a6a",
                            bulletBorderThickness: 1,
                            bulletBorderAlpha: 0.8,
                            dashLengthField: "dashLength",
                            animationPlayed: true
                        }],

                        chartCursor: {
                            zoomable: false,
                            categoryBalloonDateFormat: "DD",
                            cursorAlpha: 0,
                            categoryBalloonColor: "#e26a6a",
                            categoryBalloonAlpha: 0.8,
                            valueBalloonsEnabled: false
                        },
                        legend: {
                            bulletType: "round",
                            equalWidths: false,
                            valueWidth: 120,
                            useGraphSettings: true,
                            color: "#6c7b88"
                        }
                    });
                },

                initAmChart2: function() {
                    if (typeof(AmCharts) === 'undefined' || $('#dashboard_amchart_2').size() === 0) {
                        return;
                    }

                    // svg path for target icon
                    var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";
                    // svg path for plane icon
                    var planeSVG = "M19.671,8.11l-2.777,2.777l-3.837-0.861c0.362-0.505,0.916-1.683,0.464-2.135c-0.518-0.517-1.979,0.278-2.305,0.604l-0.913,0.913L7.614,8.804l-2.021,2.021l2.232,1.061l-0.082,0.082l1.701,1.701l0.688-0.687l3.164,1.504L9.571,18.21H6.413l-1.137,1.138l3.6,0.948l1.83,1.83l0.947,3.598l1.137-1.137V21.43l3.725-3.725l1.504,3.164l-0.687,0.687l1.702,1.701l0.081-0.081l1.062,2.231l2.02-2.02l-0.604-2.689l0.912-0.912c0.326-0.326,1.121-1.789,0.604-2.306c-0.452-0.452-1.63,0.101-2.135,0.464l-0.861-3.838l2.777-2.777c0.947-0.947,3.599-4.862,2.62-5.839C24.533,4.512,20.618,7.163,19.671,8.11z";

                    var map = AmCharts.makeChart("dashboard_amchart_2", {
                        type: "map",
                        "theme": "light",
                        pathToImages: "../assets/global/plugins/amcharts/ammap/images/",

                        dataProvider: {
                            map: "worldLow",
                            linkToObject: "london",
                            images: [{
                                id: "london",
                                color: "#009dc7",
                                svgPath: targetSVG,
                                title: "London",
                                latitude: 51.5002,
                                longitude: -0.1262,
                                scale: 1.5,
                                zoomLevel: 2.74,
                                zoomLongitude: -20.1341,
                                zoomLatitude: 49.1712,

                                lines: [{
                                    latitudes: [51.5002, 50.4422],
                                    longitudes: [-0.1262, 30.5367]
                                }, {
                                    latitudes: [51.5002, 46.9480],
                                    longitudes: [-0.1262, 7.4481]
                                }, {
                                    latitudes: [51.5002, 59.3328],
                                    longitudes: [-0.1262, 18.0645]
                                }, {
                                    latitudes: [51.5002, 40.4167],
                                    longitudes: [-0.1262, -3.7033]
                                }, {
                                    latitudes: [51.5002, 46.0514],
                                    longitudes: [-0.1262, 14.5060]
                                }, {
                                    latitudes: [51.5002, 48.2116],
                                    longitudes: [-0.1262, 17.1547]
                                }, {
                                    latitudes: [51.5002, 44.8048],
                                    longitudes: [-0.1262, 20.4781]
                                }, {
                                    latitudes: [51.5002, 55.7558],
                                    longitudes: [-0.1262, 37.6176]
                                }, {
                                    latitudes: [51.5002, 38.7072],
                                    longitudes: [-0.1262, -9.1355]
                                }, {
                                    latitudes: [51.5002, 54.6896],
                                    longitudes: [-0.1262, 25.2799]
                                }, {
                                    latitudes: [51.5002, 64.1353],
                                    longitudes: [-0.1262, -21.8952]
                                }, {
                                    latitudes: [51.5002, 40.4300],
                                    longitudes: [-0.1262, -74.0000]
                                }],

                                images: [{
                                    label: "Flights from London",
                                    svgPath: planeSVG,
                                    left: 100,
                                    top: 45,
                                    labelShiftY: 5,
                                    color: "#d93d5e",
                                    labelColor: "#d93d5e",
                                    labelRollOverColor: "#d93d5e",
                                    labelFontSize: 20
                                }, {
                                    label: "show flights from Vilnius",
                                    left: 106,
                                    top: 70,
                                    labelColor: "#6c7b88",
                                    labelRollOverColor: "#d93d5e",
                                    labelFontSize: 11,
                                    linkToObject: "vilnius"
                                }]
                            },

                                {
                                    id: "vilnius",
                                    color: "#009dc7",
                                    svgPath: targetSVG,
                                    title: "Vilnius",
                                    latitude: 54.6896,
                                    longitude: 25.2799,
                                    scale: 1.5,
                                    zoomLevel: 4.92,
                                    zoomLongitude: 15.4492,
                                    zoomLatitude: 50.2631,

                                    lines: [{
                                        latitudes: [54.6896, 50.8371],
                                        longitudes: [25.2799, 4.3676]
                                    }, {
                                        latitudes: [54.6896, 59.9138],
                                        longitudes: [25.2799, 10.7387]
                                    }, {
                                        latitudes: [54.6896, 40.4167],
                                        longitudes: [25.2799, -3.7033]
                                    }, {
                                        latitudes: [54.6896, 50.0878],
                                        longitudes: [25.2799, 14.4205]
                                    }, {
                                        latitudes: [54.6896, 48.2116],
                                        longitudes: [25.2799, 17.1547]
                                    }, {
                                        latitudes: [54.6896, 44.8048],
                                        longitudes: [25.2799, 20.4781]
                                    }, {
                                        latitudes: [54.6896, 55.7558],
                                        longitudes: [25.2799, 37.6176]
                                    }, {
                                        latitudes: [54.6896, 37.9792],
                                        longitudes: [25.2799, 23.7166]
                                    }, {
                                        latitudes: [54.6896, 54.6896],
                                        longitudes: [25.2799, 25.2799]
                                    }, {
                                        latitudes: [54.6896, 51.5002],
                                        longitudes: [25.2799, -0.1262]
                                    }, {
                                        latitudes: [54.6896, 53.3441],
                                        longitudes: [25.2799, -6.2675]
                                    }],

                                    images: [{
                                        label: "Flights from Vilnius",
                                        svgPath: planeSVG,
                                        left: 100,
                                        top: 45,
                                        labelShiftY: 5,
                                        color: "#d93d5e",
                                        labelColor: "#d93d5e",
                                        labelRollOverColor: "#d93d5e",
                                        labelFontSize: 20
                                    }, {
                                        label: "show flights from London",
                                        left: 106,
                                        top: 70,
                                        labelColor: "#009dc7",
                                        labelRollOverColor: "#d93d5e",
                                        labelFontSize: 11,
                                        linkToObject: "london"
                                    }]
                                }, {
                                    svgPath: targetSVG,
                                    title: "Brussels",
                                    latitude: 50.8371,
                                    longitude: 4.3676
                                }, {
                                    svgPath: targetSVG,
                                    title: "Prague",
                                    latitude: 50.0878,
                                    longitude: 14.4205
                                }, {
                                    svgPath: targetSVG,
                                    title: "Athens",
                                    latitude: 37.9792,
                                    longitude: 23.7166
                                }, {
                                    svgPath: targetSVG,
                                    title: "Reykjavik",
                                    latitude: 64.1353,
                                    longitude: -21.8952
                                }, {
                                    svgPath: targetSVG,
                                    title: "Dublin",
                                    latitude: 53.3441,
                                    longitude: -6.2675
                                }, {
                                    svgPath: targetSVG,
                                    title: "Oslo",
                                    latitude: 59.9138,
                                    longitude: 10.7387
                                }, {
                                    svgPath: targetSVG,
                                    title: "Lisbon",
                                    latitude: 38.7072,
                                    longitude: -9.1355
                                }, {
                                    svgPath: targetSVG,
                                    title: "Moscow",
                                    latitude: 55.7558,
                                    longitude: 37.6176
                                }, {
                                    svgPath: targetSVG,
                                    title: "Belgrade",
                                    latitude: 44.8048,
                                    longitude: 20.4781
                                }, {
                                    svgPath: targetSVG,
                                    title: "Bratislava",
                                    latitude: 48.2116,
                                    longitude: 17.1547
                                }, {
                                    svgPath: targetSVG,
                                    title: "Ljubljana",
                                    latitude: 46.0514,
                                    longitude: 14.5060
                                }, {
                                    svgPath: targetSVG,
                                    title: "Madrid",
                                    latitude: 40.4167,
                                    longitude: -3.7033
                                }, {
                                    svgPath: targetSVG,
                                    title: "Stockholm",
                                    latitude: 59.3328,
                                    longitude: 18.0645
                                }, {
                                    svgPath: targetSVG,
                                    title: "Bern",
                                    latitude: 46.9480,
                                    longitude: 7.4481
                                }, {
                                    svgPath: targetSVG,
                                    title: "Kiev",
                                    latitude: 50.4422,
                                    longitude: 30.5367
                                }, {
                                    svgPath: targetSVG,
                                    title: "Paris",
                                    latitude: 48.8567,
                                    longitude: 2.3510
                                }, {
                                    svgPath: targetSVG,
                                    title: "New York",
                                    latitude: 40.43,
                                    longitude: -74
                                }
                            ]
                        },

                        zoomControl: {
                            buttonFillColor: "#dddddd"
                        },

                        areasSettings: {
                            unlistedAreasColor: "#15A892"
                        },

                        imagesSettings: {
                            color: "#d93d5e",
                            rollOverColor: "#d93d5e",
                            selectedColor: "#009dc7"
                        },

                        linesSettings: {
                            color: "#d93d5e",
                            alpha: 0.4
                        },


                        backgroundZoomsToTop: true,
                        linesAboveImages: true,

                        "export": {
                            "enabled": true,
                            "libs": {
                                "path": "http://www.amcharts.com/lib/3/plugins/export/libs/"
                            }
                        }
                    });
                },

                initAmChart3: function() {
                    if (typeof(AmCharts) === 'undefined' || $('#dashboard_amchart_3').size() === 0) {
                        return;
                    }

                    var chart = AmCharts.makeChart("dashboard_amchart_3", {
                        "type": "serial",
                        "addClassNames": true,
                        "theme": "light",
                        "path": "../assets/global/plugins/amcharts/ammap/images/",
                        "autoMargins": false,
                        "marginLeft": 30,
                        "marginRight": 8,
                        "marginTop": 10,
                        "marginBottom": 26,
                        "balloon": {
                            "adjustBorderColor": false,
                            "horizontalPadding": 10,
                            "verticalPadding": 8,
                            "color": "#ffffff"
                        },

                        "dataProvider": [{
                            "year": 2009,
                            "income": 23.5,
                            "expenses": 21.1
                        }, {
                            "year": 2010,
                            "income": 26.2,
                            "expenses": 30.5
                        }, {
                            "year": 2011,
                            "income": 30.1,
                            "expenses": 34.9
                        }, {
                            "year": 2012,
                            "income": 29.5,
                            "expenses": 31.1
                        }, {
                            "year": 2013,
                            "income": 30.6,
                            "expenses": 28.2,
                        }, {
                            "year": 2014,
                            "income": 34.1,
                            "expenses": 32.9,
                            "dashLengthColumn": 5,
                            "alpha": 0.2,
                            "additional": "(projection)"
                        }],
                        "valueAxes": [{
                            "axisAlpha": 0,
                            "position": "left"
                        }],
                        "startDuration": 1,
                        "graphs": [{
                            "alphaField": "alpha",
                            "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                            "fillAlphas": 1,
                            "title": "Income",
                            "type": "column",
                            "valueField": "income",
                            "dashLengthField": "dashLengthColumn"
                        }, {
                            "id": "graph2",
                            "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
                            "bullet": "round",
                            "lineThickness": 3,
                            "bulletSize": 7,
                            "bulletBorderAlpha": 1,
                            "bulletColor": "#FFFFFF",
                            "useLineColorForBulletBorder": true,
                            "bulletBorderThickness": 3,
                            "fillAlphas": 0,
                            "lineAlpha": 1,
                            "title": "Expenses",
                            "valueField": "expenses"
                        }],
                        "categoryField": "year",
                        "categoryAxis": {
                            "gridPosition": "start",
                            "axisAlpha": 0,
                            "tickLength": 0
                        },
                        "export": {
                            "enabled": true
                        }
                    });
                },

                initAmChart4: function() {
                    if (typeof(AmCharts) === 'undefined' || $('#dashboard_amchart_4').size() === 0) {
                        return;
                    }

                    var chart = AmCharts.makeChart("dashboard_amchart_4", {
                        "type": "pie",
                        "theme": "light",
                        "path": "../assets/global/plugins/amcharts/ammap/images/",
                        "dataProvider": [{
                            "country": "Lithuania",
                            "value": 260
                        }, {
                            "country": "Ireland",
                            "value": 201
                        }, {
                            "country": "Germany",
                            "value": 65
                        }, {
                            "country": "Australia",
                            "value": 39
                        }, {
                            "country": "UK",
                            "value": 19
                        }, {
                            "country": "Latvia",
                            "value": 10
                        }],
                        "valueField": "value",
                        "titleField": "country",
                        "outlineAlpha": 0.4,
                        "depth3D": 15,
                        "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                        "angle": 30,
                        "export": {
                            "enabled": true
                        }
                    });
                    jQuery('.chart-input').off().on('input change', function() {
                        var property = jQuery(this).data('property');
                        var target = chart;
                        var value = Number(this.value);
                        chart.startDuration = 0;

                        if (property == 'innerRadius') {
                            value += "%";
                        }

                        target[property] = value;
                        chart.validateNow();
                    });
                },

                initWorldMapStats: function() {
                    if ($('#mapplic').size() === 0) {
                        return;
                    }

                    $('#mapplic').mapplic({
                        source: '../assets/global/plugins/mapplic/world.json',
                        height: 265,
                        animate: false,
                        sidebar: false,
                        minimap: false,
                        locations: true,
                        deeplinking: true,
                        fullscreen: false,
                        hovertip: true,
                        zoombuttons: false,
                        clearbutton: false,
                        developer: false,
                        maxscale: 2,
                        skin: 'mapplic-dark',
                        zoom: true
                    });

                    $("#widget_sparkline_bar").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                        type: 'bar',
                        width: '100',
                        barWidth: 5,
                        height: '30',
                        barColor: '#4db3a4',
                        negBarColor: '#e02222'
                    });

                    $("#widget_sparkline_bar2").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                        type: 'bar',
                        width: '100',
                        barWidth: 5,
                        height: '30',
                        barColor: '#f36a5a',
                        negBarColor: '#e02222'
                    });

                    $("#widget_sparkline_bar3").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                        type: 'bar',
                        width: '100',
                        barWidth: 5,
                        height: '30',
                        barColor: '#5b9bd1',
                        negBarColor: '#e02222'
                    });

                    $("#widget_sparkline_bar4").sparkline([8, 7, 9, 8.5, 8, 8.2, 8, 8.5, 9, 8, 9], {
                        type: 'bar',
                        width: '100',
                        barWidth: 5,
                        height: '30',
                        barColor: '#9a7caf',
                        negBarColor: '#e02222'
                    });
                },

                init: function() {

                    this.initJQVMAP();
                    this.initCalendar();
                    this.initCharts();
                    this.initEasyPieCharts();
                    this.initSparklineCharts();
                    this.initChat();
                    this.initDashboardDaterange();
                    this.initMorisCharts();

                    this.initAmChart1();
                    this.initAmChart2();
                    this.initAmChart3();
                    this.initAmChart4();

                    this.initWorldMapStats();
                }
            };

        }();

        if (App.isAngularJsApp() === false) {
            jQuery(document).ready(function() {
                Dashboard.init(); // init metronic core componets
            });
        }

    </script>
@endsection
