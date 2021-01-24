{{--@extends('admin.layout.index')--}}


{{--@section('title')--}}
{{--     account--}}
{{--@endsection--}}


{{--@section('inside_title')--}}

{{--Account--}}

{{--@endsection--}}
{{--@section('header_link')--}}
{{--    <li>--}}
{{--        <a href="{{Route('account.index')}}">Account </a>--}}
{{--        <i class="fa fa-circle"></i>--}}
{{--    </li>--}}

{{--    <li>--}}
{{--        @if(isset($account))--}}
{{--            <span>Edit account</span>--}}
{{--        @else--}}
{{--            <span>Create account</span>--}}
{{--        @endif--}}
{{--    </li>--}}
{{--@endsection--}}
{{--@section('header')--}}

{{--    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <!-- END GLOBAL MANDATORY STYLES -->--}}
{{--    <link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />--}}


{{--    <!-- BEGIN THEME GLOBAL STYLES -->--}}
{{--    <link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />--}}
{{--    <link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <!-- END THEME GLOBAL STYLES -->--}}
{{--    <!-- BEGIN THEME LAYOUT STYLES -->--}}
{{--    <link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />--}}
{{--    <link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <!-- END THEME LAYOUT STYLES -->--}}
{{--    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />--}}
{{--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>--}}

{{--@endsection--}}

{{--@section('inside_title')--}}
{{--    User Profile--}}
{{--@endsection--}}
{{--@section('content')--}}


{{--    <div class="alert alert-danger" style="display: none;text-align: center">--}}
{{--        <strong id="fail_message_id">  </strong>--}}
{{--    </div>--}}
{{--    <div class="alert alert-success insert_success" style="display: none;text-align: center">--}}
{{--        <strong>Success! The account has been Created successfully.</strong>--}}
{{--    </div>--}}
{{--    <div class="alert alert-success updated_success" style="display: none;text-align: center">--}}
{{--        <strong>Success! The account has been Updated successfully.</strong>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <!-- BEGIN PROFILE SIDEBAR -->--}}
{{--            <div class="profile-sidebar">--}}
{{--                <!-- PORTLET MAIN -->--}}
{{--                <div class="portlet light profile-sidebar-portlet ">--}}
{{--                    <!-- SIDEBAR USERPIC -->--}}
{{--                    <div class="profile-userpic">--}}

{{--                            <img src="{{asset('storage/'.$currentUser->image)}}" class="img-responsive hoverZoomLink" alt="" style="width: 250px;height: 250px"> </div>--}}

{{--            <!-- END SIDEBAR USERPIC -->--}}
{{--                <!-- SIDEBAR USER TITLE -->--}}
{{--                <div class="profile-usertitle">--}}
{{--                    <div class="profile-usertitle-name"> {{$currentUser->name}}</div>--}}
{{--                    <div class="profile-usertitle-job"> {{$currentUser->rule->name}} </div>--}}
{{--                    <div class="profile-usertitle-job"> Code: {{$currentUser->code}} </div>--}}

{{--                </div>--}}
{{--                <!-- END SIDEBAR USER TITLE -->--}}
{{--                <!-- SIDEBAR BUTTONS -->--}}
{{--                <div class="profile-userbuttons">--}}
{{--                    <button type="button" class="btn btn-circle green btn-sm">Follow</button>--}}
{{--                    <button type="button" class="btn btn-circle red btn-sm">Message</button>--}}
{{--                </div>--}}
{{--                <!-- END SIDEBAR BUTTONS -->--}}
{{--                <!-- SIDEBAR MENU -->--}}
{{--                <div class="profile-usermenu">--}}
{{--                    <ul class="nav">--}}
{{--                        <li class="active">--}}
{{--                            <a href="{{Route('account.index')}}">--}}
{{--                                <i class="icon-home"></i> Overview </a>--}}
{{--                        </li>--}}
{{--                        <li >--}}
{{--                            <a href="{{Route('user.account.setting')}}">--}}
{{--                                <i class="icon-settings"></i> Account Settings </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="page_user_profile_1_help.html">--}}
{{--                                <i class="icon-info"></i> Help </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!-- END MENU -->--}}
{{--            </div>--}}

{{--                <!-- END PORTLET MAIN -->--}}
{{--                <!-- PORTLET MAIN -->--}}
{{--                <div class="portlet light ">--}}
{{--                    <!-- STAT -->--}}
{{--                    <div class="row list-separated profile-stat">--}}
{{--                        <div class="col-md-4 col-sm-4 col-xs-6">--}}
{{--                            <div class="uppercase profile-stat-title"> {{($currentUser->getMaxLevel())}} </div>--}}
{{--                            <div class="uppercase profile-stat-text"> Level </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4 col-sm-4 col-xs-6">--}}
{{--                            <div class="uppercase profile-stat-title"> {{$currentUser->countTotalNetworks()}} </div>--}}
{{--                            <div class="uppercase profile-stat-text"> networkers </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4 col-sm-4 col-xs-6">--}}
{{--                            <div class="uppercase profile-stat-title">{{$currentUser->totalProfit()}}</div>--}}
{{--                            <div class="uppercase profile-stat-text"> TotalProfit </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <!-- END STAT -->--}}
{{--                    <div>--}}
{{--                        <h4 class="profile-desc-title">About Marcus Doe</h4>--}}
{{--                        <span class="profile-desc-text"> Lorem ipsum dolor sit amet diam nonummy nibh dolore. </span>--}}
{{--                        <div class="margin-top-20 profile-desc-link">--}}
{{--                            <i class="fa fa-globe"></i>--}}
{{--                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>--}}
{{--                        </div>--}}
{{--                        <div class="margin-top-20 profile-desc-link">--}}
{{--                            <i class="fa fa-twitter"></i>--}}
{{--                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>--}}
{{--                        </div>--}}
{{--                        <div class="margin-top-20 profile-desc-link">--}}
{{--                            <i class="fa fa-facebook"></i>--}}
{{--                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- END PORTLET MAIN -->--}}
{{--            </div>--}}
{{--            <!-- END BEGIN PROFILE SIDEBAR -->--}}
{{--            <!-- BEGIN PROFILE CONTENT -->--}}
{{--            <div class="profile-content">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <!-- BEGIN PORTLET -->--}}
{{--                        <div class="portlet light ">--}}
{{--                            <div class="portlet-title">--}}
{{--                                <div class="caption caption-md">--}}
{{--                                    <i class="icon-bar-chart theme-font hide"></i>--}}
{{--                                    <span class="caption-subject font-blue-madison bold uppercase">Your Activity</span>--}}
{{--                                    <span class="caption-helper hide">weekly stats...</span>--}}
{{--                                </div>--}}
{{--                                <div class="actions">--}}
{{--                                    <div class="btn-group btn-group-devided" data-toggle="buttons">--}}
{{--                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">--}}
{{--                                            <input type="radio" name="options" class="toggle" id="option1">Today</label>--}}
{{--                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">--}}
{{--                                            <input type="radio" name="options" class="toggle" id="option2">Week</label>--}}
{{--                                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">--}}
{{--                                            <input type="radio" name="options" class="toggle" id="option2">Month</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="portlet-body">--}}
{{--                                <div class="row number-stats margin-bottom-30">--}}
{{--                                    <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                        <div class="stat-left">--}}
{{--                                            <div class="stat-chart">--}}
{{--                                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->--}}
{{--                                                <div id="sparkline_bar"><canvas width="90" height="45" style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="stat-number">--}}
{{--                                                <div class="title"> Total </div>--}}
{{--                                                <div class="number"> 2460 </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6 col-sm-6 col-xs-6">--}}
{{--                                        <div class="stat-right">--}}
{{--                                            <div class="stat-chart">--}}
{{--                                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->--}}
{{--                                                <div id="sparkline_bar2"><canvas width="90" height="45" style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="stat-number">--}}
{{--                                                <div class="title"> New </div>--}}
{{--                                                <div class="number"> 719 </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="table-scrollable table-scrollable-borderless">--}}
{{--                                    <table class="table table-hover table-light">--}}
{{--                                        <thead>--}}
{{--                                        <tr class="uppercase">--}}
{{--                                            <th colspan="2"> MEMBER </th>--}}
{{--                                            <th> Earnings </th>--}}
{{--                                            <th> CASES </th>--}}
{{--                                            <th> CLOSED </th>--}}
{{--                                            <th> RATE </th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody><tr>--}}
{{--                                            <td class="fit">--}}
{{--                                                <img class="user-pic" src="../assets/pages/media/users/avatar4.jpg"> </td>--}}
{{--                                            <td>--}}
{{--                                                <a href="javascript:;" class="primary-link">Brain</a>--}}
{{--                                            </td>--}}
{{--                                            <td> $345 </td>--}}
{{--                                            <td> 45 </td>--}}
{{--                                            <td> 124 </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="bold theme-font">80%</span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td class="fit">--}}
{{--                                                <img class="user-pic" src="../assets/pages/media/users/avatar5.jpg"> </td>--}}
{{--                                            <td>--}}
{{--                                                <a href="javascript:;" class="primary-link">Nick</a>--}}
{{--                                            </td>--}}
{{--                                            <td> $560 </td>--}}
{{--                                            <td> 12 </td>--}}
{{--                                            <td> 24 </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="bold theme-font">67%</span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td class="fit">--}}
{{--                                                <img class="user-pic" src="../assets/pages/media/users/avatar6.jpg"> </td>--}}
{{--                                            <td>--}}
{{--                                                <a href="javascript:;" class="primary-link">Tim</a>--}}
{{--                                            </td>--}}
{{--                                            <td> $1,345 </td>--}}
{{--                                            <td> 450 </td>--}}
{{--                                            <td> 46 </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="bold theme-font">98%</span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td class="fit">--}}
{{--                                                <img class="user-pic" src="../assets/pages/media/users/avatar7.jpg"> </td>--}}
{{--                                            <td>--}}
{{--                                                <a href="javascript:;" class="primary-link">Tom</a>--}}
{{--                                            </td>--}}
{{--                                            <td> $645 </td>--}}
{{--                                            <td> 50 </td>--}}
{{--                                            <td> 89 </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="bold theme-font">58%</span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody></table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- END PORTLET -->--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <!-- BEGIN PORTLET -->--}}
{{--                        <div class="portlet light ">--}}
{{--                            <div class="portlet-title tabbable-line">--}}
{{--                                <div class="caption caption-md">--}}
{{--                                    <i class="icon-globe theme-font hide"></i>--}}
{{--                                    <span class="caption-subject font-blue-madison bold uppercase">Feeds</span>--}}
{{--                                </div>--}}
{{--                                <ul class="nav nav-tabs">--}}
{{--                                    <li class="active">--}}
{{--                                        <a href="#tab_1_1" data-toggle="tab"> System </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#tab_1_2" data-toggle="tab"> Activities </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="portlet-body">--}}
{{--                                <!--BEGIN TABS-->--}}
{{--                                <div class="tab-content">--}}
{{--                                    <div class="tab-pane active" id="tab_1_1">--}}
{{--                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 320px;"><div class="scroller" style="height: 320px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2" data-initialized="1">--}}
{{--                                                <ul class="feeds">--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-success">--}}
{{--                                                                        <i class="fa fa-bell-o"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> You have 4 pending tasks.--}}
{{--                                                                        <span class="label label-sm label-info"> Take action--}}
{{--                                                                                        <i class="fa fa-share"></i>--}}
{{--                                                                                    </span>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> Just now </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New version v1.4 just lunched! </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> 20 mins </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-danger">--}}
{{--                                                                        <i class="fa fa-bolt"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 24 mins </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-info">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> New order received and pending for process. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 30 mins </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-success">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> New payment refund and pending approval. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 40 mins </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-warning">--}}
{{--                                                                        <i class="fa fa-plus"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> New member registered. Pending approval. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 1.5 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-success">--}}
{{--                                                                        <i class="fa fa-bell-o"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Web server hardware needs to be upgraded.--}}
{{--                                                                        <span class="label label-sm label-default "> Overdue </span>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 2 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-default">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Prod01 database server is overloaded 90%. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 3 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-warning">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> New group created. Pending manager review. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 5 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-info">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Order payment failed. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 18 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-default">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> New application received. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 21 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-info">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Dev90 web server restarted. Pending overall system check. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 22 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-default">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> New member registered. Pending approval </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 21 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-info">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> L45 Network failure. Schedule maintenance. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 22 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-default">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Order canceled with failed payment. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 21 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-info">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Web-A2 clound instance created. Schedule full scan. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 22 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-default">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Member canceled. Schedule account review. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 21 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-info">--}}
{{--                                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 22 hours </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div><div class="slimScrollBar" style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 158.514px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane" id="tab_1_2">--}}
{{--                                        <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 337px;"><div class="scroller" style="height: 337px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2" data-initialized="1">--}}
{{--                                                <ul class="feeds">--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New user registered </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> Just now </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New order received </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> 10 mins </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <div class="col1">--}}
{{--                                                            <div class="cont">--}}
{{--                                                                <div class="cont-col1">--}}
{{--                                                                    <div class="label label-sm label-danger">--}}
{{--                                                                        <i class="fa fa-bolt"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="cont-col2">--}}
{{--                                                                    <div class="desc"> Order #24DOP4 has been rejected.--}}
{{--                                                                        <span class="label label-sm label-danger "> Take action--}}
{{--                                                                                        <i class="fa fa-share"></i>--}}
{{--                                                                                    </span>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col2">--}}
{{--                                                            <div class="date"> 24 mins </div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New user registered </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> Just now </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New user registered </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> Just now </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New user registered </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> Just now </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New user registered </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> Just now </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New user registered </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> Just now </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New user registered </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> Just now </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:;">--}}
{{--                                                            <div class="col1">--}}
{{--                                                                <div class="cont">--}}
{{--                                                                    <div class="cont-col1">--}}
{{--                                                                        <div class="label label-sm label-success">--}}
{{--                                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="cont-col2">--}}
{{--                                                                        <div class="desc"> New user registered </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col2">--}}
{{--                                                                <div class="date"> Just now </div>--}}
{{--                                                            </div>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div><div class="slimScrollBar" style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--END TABS-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- END PORTLET -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <!-- BEGIN PORTLET -->--}}
{{--                        <div class="portlet light ">--}}
{{--                            <div class="portlet-title">--}}
{{--                                <div class="caption caption-md">--}}
{{--                                    <i class="icon-bar-chart theme-font hide"></i>--}}
{{--                                    <span class="caption-subject font-blue-madison bold uppercase">Customer Support</span>--}}
{{--                                    <span class="caption-helper">45 pending</span>--}}
{{--                                </div>--}}
{{--                                <div class="inputs">--}}
{{--                                    <div class="portlet-input input-inline input-small ">--}}
{{--                                        <div class="input-icon right">--}}
{{--                                            <i class="icon-magnifier"></i>--}}
{{--                                            <input type="text" class="form-control form-control-solid" placeholder="search..."> </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="portlet-body">--}}
{{--                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 305px;"><div class="scroller" style="height: 305px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2" data-initialized="1">--}}
{{--                                        <div class="general-item-list">--}}
{{--                                            <div class="item">--}}
{{--                                                <div class="item-head">--}}
{{--                                                    <div class="item-details">--}}
{{--                                                        <img class="item-pic" src="../assets/pages/media/users/avatar4.jpg">--}}
{{--                                                        <a href="" class="item-name primary-link">Nick Larson</a>--}}
{{--                                                        <span class="item-label">3 hrs ago</span>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="item-status">--}}
{{--                                                                    <span class="badge badge-empty badge-success"></span> Open</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="item">--}}
{{--                                                <div class="item-head">--}}
{{--                                                    <div class="item-details">--}}
{{--                                                        <img class="item-pic" src="../assets/pages/media/users/avatar3.jpg">--}}
{{--                                                        <a href="" class="item-name primary-link">Mark</a>--}}
{{--                                                        <span class="item-label">5 hrs ago</span>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="item-status">--}}
{{--                                                                    <span class="badge badge-empty badge-warning"></span> Pending</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet. </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="item">--}}
{{--                                                <div class="item-head">--}}
{{--                                                    <div class="item-details">--}}
{{--                                                        <img class="item-pic" src="../assets/pages/media/users/avatar6.jpg">--}}
{{--                                                        <a href="" class="item-name primary-link">Nick Larson</a>--}}
{{--                                                        <span class="item-label">8 hrs ago</span>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="item-status">--}}
{{--                                                                    <span class="badge badge-empty badge-primary"></span> Closed</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh. </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="item">--}}
{{--                                                <div class="item-head">--}}
{{--                                                    <div class="item-details">--}}
{{--                                                        <img class="item-pic" src="../assets/pages/media/users/avatar7.jpg">--}}
{{--                                                        <a href="" class="item-name primary-link">Nick Larson</a>--}}
{{--                                                        <span class="item-label">12 hrs ago</span>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="item-status">--}}
{{--                                                                    <span class="badge badge-empty badge-danger"></span> Pending</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="item-body"> Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="item">--}}
{{--                                                <div class="item-head">--}}
{{--                                                    <div class="item-details">--}}
{{--                                                        <img class="item-pic" src="../assets/pages/media/users/avatar9.jpg">--}}
{{--                                                        <a href="" class="item-name primary-link">Richard Stone</a>--}}
{{--                                                        <span class="item-label">2 days ago</span>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="item-status">--}}
{{--                                                                    <span class="badge badge-empty badge-danger"></span> Open</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat. </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="item">--}}
{{--                                                <div class="item-head">--}}
{{--                                                    <div class="item-details">--}}
{{--                                                        <img class="item-pic" src="../assets/pages/media/users/avatar8.jpg">--}}
{{--                                                        <a href="" class="item-name primary-link">Dan</a>--}}
{{--                                                        <span class="item-label">3 days ago</span>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="item-status">--}}
{{--                                                                    <span class="badge badge-empty badge-warning"></span> Pending</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="item-body"> Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="item">--}}
{{--                                                <div class="item-head">--}}
{{--                                                    <div class="item-details">--}}
{{--                                                        <img class="item-pic" src="../assets/pages/media/users/avatar2.jpg">--}}
{{--                                                        <a href="" class="item-name primary-link">Larry</a>--}}
{{--                                                        <span class="item-label">4 hrs ago</span>--}}
{{--                                                    </div>--}}
{{--                                                    <span class="item-status">--}}
{{--                                                                    <span class="badge badge-empty badge-success"></span> Open</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div><div class="slimScrollBar" style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 120.499px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- END PORTLET -->--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <!-- BEGIN PORTLET -->--}}
{{--                        <div class="portlet light  tasks-widget">--}}
{{--                            <div class="portlet-title">--}}
{{--                                <div class="caption caption-md">--}}
{{--                                    <i class="icon-bar-chart theme-font hide"></i>--}}
{{--                                    <span class="caption-subject font-blue-madison bold uppercase">Tasks</span>--}}
{{--                                    <span class="caption-helper">16 pending</span>--}}
{{--                                </div>--}}
{{--                                <div class="inputs">--}}
{{--                                    <div class="portlet-input input-small input-inline">--}}
{{--                                        <div class="input-icon right">--}}
{{--                                            <i class="icon-magnifier"></i>--}}
{{--                                            <input type="text" class="form-control form-control-solid" placeholder="search..."> </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="portlet-body">--}}
{{--                                <div class="task-content">--}}
{{--                                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 282px;"><div class="scroller" style="height: 282px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2" data-initialized="1">--}}
{{--                                            <!-- START TASK LIST -->--}}
{{--                                            <ul class="task-list">--}}
{{--                                                <li>--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="hidden" value="1" name="test">--}}
{{--                                                        <input type="checkbox" class="liChild" value="2" name="test"> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> Present 2013 Year IPO Statistics at Board Meeting </span>--}}
{{--                                                        <span class="label label-sm label-success">Company</span>--}}
{{--                                                        <span class="task-bell">--}}
{{--                                                                        <i class="fa fa-bell-o"></i>--}}
{{--                                                                    </span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="checkbox" class="liChild" value=""> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> Hold An Interview for Marketing Manager Position </span>--}}
{{--                                                        <span class="label label-sm label-danger">Marketing</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="checkbox" class="liChild" value=""> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> AirAsia Intranet System Project Internal Meeting </span>--}}
{{--                                                        <span class="label label-sm label-success">AirAsia</span>--}}
{{--                                                        <span class="task-bell">--}}
{{--                                                                        <i class="fa fa-bell-o"></i>--}}
{{--                                                                    </span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="checkbox" class="liChild" value=""> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> Technical Management Meeting </span>--}}
{{--                                                        <span class="label label-sm label-warning">Company</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="checkbox" class="liChild" value=""> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> Kick-off Company CRM Mobile App Development </span>--}}
{{--                                                        <span class="label label-sm label-info">Internal Products</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="checkbox" class="liChild" value=""> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> Prepare Commercial Offer For SmartVision Website Rewamp </span>--}}
{{--                                                        <span class="label label-sm label-danger">SmartVision</span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="checkbox" class="liChild" value=""> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> Sign-Off The Comercial Agreement With AutoSmart </span>--}}
{{--                                                        <span class="label label-sm label-default">AutoSmart</span>--}}
{{--                                                        <span class="task-bell">--}}
{{--                                                                        <i class="fa fa-bell-o"></i>--}}
{{--                                                                    </span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="checkbox" class="liChild" value=""> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> Company Staff Meeting </span>--}}
{{--                                                        <span class="label label-sm label-success">Cruise</span>--}}
{{--                                                        <span class="task-bell">--}}
{{--                                                                        <i class="fa fa-bell-o"></i>--}}
{{--                                                                    </span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="last-line">--}}
{{--                                                    <div class="task-checkbox">--}}
{{--                                                        <input type="checkbox" class="liChild" value=""> </div>--}}
{{--                                                    <div class="task-title">--}}
{{--                                                        <span class="task-title-sp"> KeenThemes Investment Discussion </span>--}}
{{--                                                        <span class="label label-sm label-warning">KeenThemes </span>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="task-config">--}}
{{--                                                        <div class="task-config-btn btn-group">--}}
{{--                                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                                <i class="fa fa-cog"></i>--}}
{{--                                                                <i class="fa fa-angle-down"></i>--}}
{{--                                                            </a>--}}
{{--                                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                                </li>--}}
{{--                                                                <li>--}}
{{--                                                                    <a href="javascript:;">--}}
{{--                                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                                </li>--}}
{{--                                                            </ul>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                            <!-- END START TASK LIST -->--}}
{{--                                        </div><div class="slimScrollBar" style="background: rgb(215, 220, 226); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 181.562px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>--}}
{{--                                </div>--}}
{{--                                <div class="task-footer">--}}
{{--                                    <div class="btn-arrow-link pull-right">--}}
{{--                                        <a href="javascript:;">See All Tasks</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- END PORTLET -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="portlet light portlet-fit ">--}}
{{--                            <div class="portlet-title">--}}
{{--                                <div class="caption">--}}
{{--                                    <i class="icon-microphone font-green"></i>--}}
{{--                                    <span class="caption-subject bold font-green uppercase"> Timeline</span>--}}
{{--                                    <span class="caption-helper">user timeline</span>--}}
{{--                                </div>--}}
{{--                                <div class="actions">--}}
{{--                                    <div class="btn-group btn-group-devided" data-toggle="buttons">--}}
{{--                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">--}}
{{--                                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>--}}
{{--                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">--}}
{{--                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="portlet-body">--}}
{{--                                <div class="timeline">--}}
{{--                                    <!-- TIMELINE ITEM -->--}}
{{--                                    <div class="timeline-item">--}}
{{--                                        <div class="timeline-badge">--}}
{{--                                            <img class="timeline-badge-userpic" src="../assets/pages/media/users/avatar80_2.jpg"> </div>--}}
{{--                                        <div class="timeline-body">--}}
{{--                                            <div class="timeline-body-arrow"> </div>--}}
{{--                                            <div class="timeline-body-head">--}}
{{--                                                <div class="timeline-body-head-caption">--}}
{{--                                                    <a href="javascript:;" class="timeline-body-title font-blue-madison">Lisa Strong</a>--}}
{{--                                                    <span class="timeline-body-time font-grey-cascade">Replied at 17:45 PM</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="timeline-body-head-actions">--}}
{{--                                                    <div class="btn-group">--}}
{{--                                                        <button class="btn btn-circle green btn-outline btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions--}}
{{--                                                            <i class="fa fa-angle-down"></i>--}}
{{--                                                        </button>--}}
{{--                                                        <ul class="dropdown-menu pull-right" role="menu">--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Action </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Another action </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Something else here </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="divider"> </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Separated link </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="timeline-body-content">--}}
{{--                                                                <span class="font-grey-cascade"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut consectetuer adipiscing elit laoreet dolore magna aliquam erat volutpat. Ut wisi enim--}}
{{--                                                                    ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- END TIMELINE ITEM -->--}}
{{--                                    <!-- TIMELINE ITEM WITH GOOGLE MAP -->--}}
{{--                                    <div class="timeline-item">--}}
{{--                                        <div class="timeline-badge">--}}
{{--                                            <img class="timeline-badge-userpic" src="../assets/pages/media/users/avatar80_7.jpg"> </div>--}}
{{--                                        <div class="timeline-body">--}}
{{--                                            <div class="timeline-body-arrow"> </div>--}}
{{--                                            <div class="timeline-body-head">--}}
{{--                                                <div class="timeline-body-head-caption">--}}
{{--                                                    <a href="javascript:;" class="timeline-body-title font-blue-madison">Paul Kiton</a>--}}
{{--                                                    <span class="timeline-body-time font-grey-cascade">Added office location at 2:50 PM</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="timeline-body-head-actions">--}}
{{--                                                    <div class="btn-group">--}}
{{--                                                        <button class="btn btn-circle red btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions--}}
{{--                                                            <i class="fa fa-angle-down"></i>--}}
{{--                                                        </button>--}}
{{--                                                        <ul class="dropdown-menu pull-right" role="menu">--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Action </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Another action </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Something else here </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="divider"> </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Separated link </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="timeline-body-content">--}}
{{--                                                <div id="gmap_polygons" class="gmaps" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" aria-label="Map" aria-roledescription="map" role="img" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -182, -96);"><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 30;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -182, -96);"><div style="width: 256px; height: 256px; position: absolute; left: 256px; top: 0px;"><canvas width="320" height="320" draggable="false" style="width: 256px; height: 256px; user-select: none; position: absolute; left: 0px; top: 0px;"></canvas></div><div style="width: 256px; height: 256px; position: absolute; left: 0px; top: 0px;"><canvas width="320" height="320" draggable="false" style="width: 256px; height: 256px; user-select: none; position: absolute; left: 0px; top: 0px;"></canvas></div><div style="width: 256px; height: 256px; position: absolute; left: 0px; top: -256px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 256px; top: -256px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -182, -96);"><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9373!3i17488!4i256!2m3!1e0!2sm!3i534256526!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=38064" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9372!3i17488!4i256!2m3!1e0!2sm!3i534256526!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=702" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9372!3i17487!4i256!2m3!1e0!2sm!3i534256526!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=3635" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9373!3i17487!4i256!2m3!1e0!2sm!3i534256526!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0!5m1!5f2&amp;token=40997" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-pbt"></p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"><div style="z-index: -202; cursor: pointer; display: none; touch-action: none;"><div style="width: 30px; height: 27px; overflow: hidden; position: absolute;"><img alt="" src="http://maps.gstatic.com/mapfiles/undo_poly.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 90px; height: 27px;"></div></div></div></div></div></div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe><div><div class="gmnoprint gm-bundled-control" draggable="false" controlwidth="40" controlheight="81" style="margin: 10px; user-select: none; position: absolute; left: 0px; top: 0px;"><div class="gmnoprint" controlwidth="40" controlheight="81" style="position: absolute; left: 0px; top: 0px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;"><button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; -webkit-appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23666%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23333%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpolygon%20fill%3D%22%23111%22%20points%3D%2218%2C7%2011%2C7%2011%2C0%207%2C0%207%2C7%200%2C7%200%2C11%207%2C11%207%2C18%2011%2C18%2011%2C11%2018%2C11%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; -webkit-appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C7h18v4H0V7z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"></button></div></div></div></div><div></div><div></div><div></div><div><button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; -webkit-appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A" alt="" style="height: 18px; width: 18px;" class="hoverZoomLink"></button></div><div></div><div></div><div></div><div></div><div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="0" controlheight="0" style="margin: 10px; user-select: none; position: absolute; display: none; bottom: 14px; right: 0px;"><div class="gmnoprint" controlwidth="40" controlheight="40" style="display: none; position: absolute;"><div style="width: 40px; height: 40px;"><button draggable="false" title="Rotate map 90 degrees" aria-label="Rotate map 90 degrees" type="button" class="gm-control-active" style="background: none rgb(255, 255, 255); display: none; border: 0px; margin: 0px 0px 32px; padding: 0px; text-transform: none; -webkit-appearance: none; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2222%22%20viewBox%3D%220%200%2024%2022%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20fill-rule%3D%22evenodd%22%20d%3D%22M20%2010c0-5.52-4.48-10-10-10s-10%204.48-10%2010v5h5v-5c0-2.76%202.24-5%205-5s5%202.24%205%205v5h-4l6.5%207%206.5-7h-4v-5z%22%20clip-rule%3D%22evenodd%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="height: 18px; width: 18px;" class="hoverZoomLink"></button><button draggable="false" title="Tilt map" aria-label="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none rgb(255, 255, 255); display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; -webkit-appearance: none; position: relative; cursor: pointer; user-select: none; width: 40px; height: 40px; top: 0px; left: 0px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;" class="hoverZoomLink"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218px%22%20height%3D%2216px%22%20viewBox%3D%220%200%2018%2016%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C16h8V9H0V16z%20M10%2C16h8V9h-8V16z%20M0%2C7h8V0H0V7z%20M10%2C0v7h8V0H10z%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="width: 18px;" class="hoverZoomLink"></button></div></div><div style="position: absolute; left: 0px; top: 0px;"></div></div></div><div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" href="https://maps.google.com/maps?ll=-12.043333,-77.028333&amp;z=15&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Open this area in Google Maps (opens a new window)" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="http://maps.gstatic.com/mapfiles/api-3/images/google4_hdpi.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div></div><div></div><div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 257px; bottom: 0px; width: 54px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="text-decoration: none; cursor: pointer;">Map Data</a><span style="display: none;">Map data ©2020</span></div></div></div><div draggable="false" class="gm-style-cc" style="position: absolute; user-select: none; height: 14px; line-height: 14px; right: 167px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><span>200 m&nbsp;</span><div style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 47px;"><div style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;"></div><div style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"></div><div style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); right: 0px; bottom: 0px;"></div><div style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;"></div><div style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);"></div><div style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;"></div></div></div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 96px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Terms of Use</a></div></div><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" dir="ltr" href="https://www.google.com/maps/@-12.043333,-77.028333,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2020</div></div></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 17px; top: 60px;"><div style="padding: 0px 0px 10px; font-size: 16px; box-sizing: border-box;">Map Data</div><div style="font-size: 13px;">Map data ©2020</div><button draggable="false" title="Close" aria-label="Close" type="button" class="gm-ui-hover-effect" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; -webkit-appearance: none; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A" style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;" class="hoverZoomLink"></button></div></div></div><div style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"><div><img alt="" src="http://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg" draggable="false" style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;"></div><div style="line-height: 20px; margin: 15px 0px;"><span style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">This page can't load Google Maps correctly.</span></div><table style="width: 100%;"><tr><td style="line-height: 16px; vertical-align: middle;"><a href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=keyless#api-key-and-billing-errors" target="_blank" rel="noopener" style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Do you own this website?</a></td><td style="text-align: right;"><button class="dismissButton">OK</button></td></tr></table></div></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- END TIMELINE ITEM WITH GOOGLE MAP -->--}}
{{--                                    <!-- TIMELINE ITEM -->--}}
{{--                                    <div class="timeline-item">--}}
{{--                                        <div class="timeline-badge">--}}
{{--                                            <div class="timeline-icon">--}}
{{--                                                <i class="icon-user-following font-green-haze"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="timeline-body">--}}
{{--                                            <div class="timeline-body-arrow"> </div>--}}
{{--                                            <div class="timeline-body-head">--}}
{{--                                                <div class="timeline-body-head-caption">--}}
{{--                                                    <span class="timeline-body-alerttitle font-red-intense">You have new follower</span>--}}
{{--                                                    <span class="timeline-body-time font-grey-cascade">at 11:00 PM</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="timeline-body-head-actions">--}}
{{--                                                    <div class="btn-group">--}}
{{--                                                        <button class="btn btn-circle green btn-outline--}}

{{--                                        btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions--}}
{{--                                                            <i class="fa fa-angle-down"></i>--}}
{{--                                                        </button>--}}
{{--                                                        <ul class="dropdown-menu pull-right" role="menu">--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Action </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Another action </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Something else here </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="divider"> </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Separated link </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="timeline-body-content">--}}
{{--                                                                <span class="font-grey-cascade"> You have new follower--}}
{{--                                                                    <a href="javascript:;">Ivan Rakitic</a>--}}
{{--                                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- END TIMELINE ITEM -->--}}
{{--                                    <!-- TIMELINE ITEM -->--}}
{{--                                    <div class="timeline-item">--}}
{{--                                        <div class="timeline-badge">--}}
{{--                                            <div class="timeline-icon">--}}
{{--                                                <i class="icon-docs font-red-intense"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="timeline-body">--}}
{{--                                            <div class="timeline-body-arrow"> </div>--}}
{{--                                            <div class="timeline-body-head">--}}
{{--                                                <div class="timeline-body-head-caption">--}}
{{--                                                    <span class="timeline-body-alerttitle font-green-haze">Server Report</span>--}}
{{--                                                    <span class="timeline-body-time font-grey-cascade">Yesterday at 11:00 PM</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="timeline-body-head-actions">--}}
{{--                                                    <div class="btn-group dropup">--}}
{{--                                                        <button class="btn btn-circle red btn-sm dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions--}}
{{--                                                            <i class="fa fa-angle-down"></i>--}}
{{--                                                        </button>--}}
{{--                                                        <ul class="dropdown-menu pull-right" role="menu">--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Action </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Another action </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Something else here </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="divider"> </li>--}}
{{--                                                            <li>--}}
{{--                                                                <a href="javascript:;">Separated link </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="timeline-body-content">--}}
{{--                                                                <span class="font-grey-cascade"> Lorem ipsum dolore sit amet--}}
{{--                                                                    <a href="javascript:;">Ispect</a>--}}
{{--                                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- END TIMELINE ITEM -->--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END PROFILE CONTENT -->--}}
{{--        </div>--}}
{{--    </div>--}}



{{--@endsection--}}

{{--@section('footer')--}}
{{--    <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript')}}"></script>--}}
{{--    <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>--}}
{{--    <!-- END CORE PLUGINS -->--}}
{{--    <!-- BEGIN THEME GLOBAL SCRIPTS -->--}}
{{--    <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>--}}
{{--    <!-- END THEME GLOBAL SCRIPTS -->--}}
{{--    <!-- BEGIN THEME LAYOUT SCRIPTS -->--}}
{{--    <script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>--}}
{{--    <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>--}}

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
{{--    <script>--}}
{{--        $('#sub_of').on('change',function(){--}}
{{--            $('#icon_url_div').show();--}}
{{--            if ($(this).val() !== 'none')--}}
{{--            {--}}
{{--                $('#icon_url_div').hide();--}}
{{--            }--}}

{{--        })--}}
{{--    </script>--}}
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

{{--@endsection--}}
