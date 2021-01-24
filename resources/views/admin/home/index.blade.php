@section('title')
    @lang('lang.dashboard')
@endsection
@section('header')

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
@endsection
@extends('admin.layout.index')


@section('content')

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{count(\App\Models\User::all())}}">0</span>
                    </div>
                    <div class="desc"> @lang('lang.users') </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value=" {{\App\Models\Finance::sum('amount')}}">0</span> @lang('lang.egp') </div>
                    <div class="desc"> @lang('lang.finances') </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{count(\App\Models\Network::all())}}">0</span>
                    </div>
                    <div class="desc"> @lang('lang.networkers') </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
{{--                        +--}}
                        <span data-counter="counterup" data-value="{{count(\App\Models\Library::all())}}"></span>  </div>
                    <div class="desc">@lang('lang.libraries')</div>
                </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-bar-chart font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase">@lang('lang.networkers')</span>
                        <span class="caption-helper">@lang('per level')</span>
                    </div>
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group btn-group-devided" data-toggle="buttons">--}}
{{--                            <label class="btn red btn-outline btn-circle btn-sm active">--}}
{{--                                <input type="radio" name="options" class="toggle" id="option1">New</label>--}}
{{--                            <label class="btn red btn-outline btn-circle btn-sm">--}}
{{--                                <input type="radio" name="options" class="toggle" id="option2">Returning</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="portlet-body">
                    <div id="site_statistics_loading">
                        <img src="{{asset('assets/global/img/loading.gif')}}" alt="loading" /> </div>
                    <div id="site_statistics_content" class="display-none">
                        <div id="site_statistics" class="chart"> </div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
{{--    <div class="row">--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title tabbable-line">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-bubbles font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">Comments</span>--}}
{{--                    </div>--}}
{{--                    <ul class="nav nav-tabs">--}}
{{--                        <li class="active">--}}
{{--                            <a href="#portlet_comments_1" data-toggle="tab"> Pending </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#portlet_comments_2" data-toggle="tab"> Approved </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="tab-content">--}}
{{--                        <div class="tab-pane active" id="portlet_comments_1">--}}
{{--                            <!-- BEGIN: Comments -->--}}
{{--                            <div class="mt-comments">--}}
{{--                                <div class="mt-comment">--}}
{{--                                    <div class="mt-comment-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar1.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-comment-body">--}}
{{--                                        <div class="mt-comment-info">--}}
{{--                                            <span class="mt-comment-author">Michael Baker</span>--}}
{{--                                            <span class="mt-comment-date">26 Feb, 10:30AM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </div>--}}
{{--                                        <div class="mt-comment-details">--}}
{{--                                            <span class="mt-comment-status mt-comment-status-pending">Pending</span>--}}
{{--                                            <ul class="mt-comment-actions">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Quick Edit</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">View</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Delete</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-comment">--}}
{{--                                    <div class="mt-comment-img">--}}
{{--                                        <img src="{{asset("assets/pages/media/users/avatar6.jpg")}}" /> </div>--}}
{{--                                    <div class="mt-comment-body">--}}
{{--                                        <div class="mt-comment-info">--}}
{{--                                            <span class="mt-comment-author">Larisa Maskalyova</span>--}}
{{--                                            <span class="mt-comment-date">12 Feb, 08:30AM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>--}}
{{--                                        <div class="mt-comment-details">--}}
{{--                                            <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>--}}
{{--                                            <ul class="mt-comment-actions">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Quick Edit</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">View</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Delete</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-comment">--}}
{{--                                    <div class="mt-comment-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar8.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-comment-body">--}}
{{--                                        <div class="mt-comment-info">--}}
{{--                                            <span class="mt-comment-author">Natasha Kim</span>--}}
{{--                                            <span class="mt-comment-date">19 Dec,09:50 AM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore or non-characteristic. </div>--}}
{{--                                        <div class="mt-comment-details">--}}
{{--                                            <span class="mt-comment-status mt-comment-status-pending">Pending</span>--}}
{{--                                            <ul class="mt-comment-actions">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Quick Edit</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">View</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Delete</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-comment">--}}
{{--                                    <div class="mt-comment-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar4.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-comment-body">--}}
{{--                                        <div class="mt-comment-info">--}}
{{--                                            <span class="mt-comment-author">Sebastian Davidson</span>--}}
{{--                                            <span class="mt-comment-date">10 Dec, 09:20 AM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-comment-text"> The standard chunk of Lorem or non-characteristic Ipsum used since the 1500s or non-characteristic. </div>--}}
{{--                                        <div class="mt-comment-details">--}}
{{--                                            <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>--}}
{{--                                            <ul class="mt-comment-actions">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Quick Edit</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">View</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Delete</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- END: Comments -->--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="portlet_comments_2">--}}
{{--                            <!-- BEGIN: Comments -->--}}
{{--                            <div class="mt-comments">--}}
{{--                                <div class="mt-comment">--}}
{{--                                    <div class="mt-comment-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar4.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-comment-body">--}}
{{--                                        <div class="mt-comment-info">--}}
{{--                                            <span class="mt-comment-author">Michael Baker</span>--}}
{{--                                            <span class="mt-comment-date">26 Feb, 10:30AM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. </div>--}}
{{--                                        <div class="mt-comment-details">--}}
{{--                                            <span class="mt-comment-status mt-comment-status-approved">Approved</span>--}}
{{--                                            <ul class="mt-comment-actions">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Quick Edit</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">View</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Delete</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-comment">--}}
{{--                                    <div class="mt-comment-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar8.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-comment-body">--}}
{{--                                        <div class="mt-comment-info">--}}
{{--                                            <span class="mt-comment-author">Larisa Maskalyova</span>--}}
{{--                                            <span class="mt-comment-date">12 Feb, 08:30AM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-comment-text"> It is a long established fact that a reader will be distracted by. </div>--}}
{{--                                        <div class="mt-comment-details">--}}
{{--                                            <span class="mt-comment-status mt-comment-status-approved">Approved</span>--}}
{{--                                            <ul class="mt-comment-actions">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Quick Edit</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">View</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Delete</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-comment">--}}
{{--                                    <div class="mt-comment-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar6.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-comment-body">--}}
{{--                                        <div class="mt-comment-info">--}}
{{--                                            <span class="mt-comment-author">Natasha Kim</span>--}}
{{--                                            <span class="mt-comment-date">19 Dec,09:50 AM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-comment-text"> The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. </div>--}}
{{--                                        <div class="mt-comment-details">--}}
{{--                                            <span class="mt-comment-status mt-comment-status-approved">Approved</span>--}}
{{--                                            <ul class="mt-comment-actions">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Quick Edit</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">View</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Delete</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-comment">--}}
{{--                                    <div class="mt-comment-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar1.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-comment-body">--}}
{{--                                        <div class="mt-comment-info">--}}
{{--                                            <span class="mt-comment-author">Sebastian Davidson</span>--}}
{{--                                            <span class="mt-comment-date">10 Dec, 09:20 AM</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-comment-text"> The standard chunk of Lorem Ipsum used since the 1500s </div>--}}
{{--                                        <div class="mt-comment-details">--}}
{{--                                            <span class="mt-comment-status mt-comment-status-approved">Approved</span>--}}
{{--                                            <ul class="mt-comment-actions">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Quick Edit</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">View</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">Delete</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- END: Comments -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title tabbable-line">--}}
{{--                    <div class="caption">--}}
{{--                        <i class=" icon-social-twitter font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">Quick Actions</span>--}}
{{--                    </div>--}}
{{--                    <ul class="nav nav-tabs">--}}
{{--                        <li class="active">--}}
{{--                            <a href="#tab_actions_pending" data-toggle="tab"> Pending </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#tab_actions_completed" data-toggle="tab"> Completed </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="tab-content">--}}
{{--                        <div class="tab-pane active" id="tab_actions_pending">--}}
{{--                            <!-- BEGIN: Actions -->--}}
{{--                            <div class="mt-actions">--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar10.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class="icon-magnet"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Natasha Kim</span>--}}
{{--                                                    <p class="mt-action-desc">Dummy text of the printing</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-green"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar3.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class=" icon-bubbles"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Gavin Bond</span>--}}
{{--                                                    <p class="mt-action-desc">pending for approval</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-red"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar2.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class="icon-call-in"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Diana Berri</span>--}}
{{--                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy text</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-green"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar7.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class=" icon-bell"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">John Clark</span>--}}
{{--                                                    <p class="mt-action-desc">Text of the printing and typesetting industry</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-red"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar8.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class="icon-magnet"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Donna Clarkson </span>--}}
{{--                                                    <p class="mt-action-desc">Simply dummy text of the printing</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-green"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar9.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class="icon-magnet"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Tom Larson</span>--}}
{{--                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy text</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-green"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- END: Actions -->--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="tab_actions_completed">--}}
{{--                            <!-- BEGIN:Completed-->--}}
{{--                            <div class="mt-actions">--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar1.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class="icon-action-redo"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Frank Cameron</span>--}}
{{--                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-red"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar8.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class="icon-cup"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Ella Davidson </span>--}}
{{--                                                    <p class="mt-action-desc">Text of the printing and typesetting industry</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-green"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar5.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class=" icon-graduation"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Jason Dickens </span>--}}
{{--                                                    <p class="mt-action-desc">Dummy text of the printing and typesetting industry</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-red"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-action">--}}
{{--                                    <div class="mt-action-img">--}}
{{--                                        <img src="{{asset('assets/pages/media/users/avatar2.jpg')}}" /> </div>--}}
{{--                                    <div class="mt-action-body">--}}
{{--                                        <div class="mt-action-row">--}}
{{--                                            <div class="mt-action-info ">--}}
{{--                                                <div class="mt-action-icon ">--}}
{{--                                                    <i class="icon-badge"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="mt-action-details ">--}}
{{--                                                    <span class="mt-action-author">Jan Kim</span>--}}
{{--                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-datetime ">--}}
{{--                                                <span class="mt-action-date">3 jun</span>--}}
{{--                                                <span class="mt-action-dot bg-green"></span>--}}
{{--                                                <span class="mt=action-time">9:30-13:00</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="mt-action-buttons ">--}}
{{--                                                <div class="btn-group btn-group-circle">--}}
{{--                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>--}}
{{--                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- END: Completed -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light portlet-fit bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-directions font-green hide"></i>--}}
{{--                        <span class="caption-subject bold font-dark uppercase "> Activities</span>--}}
{{--                        <span class="caption-helper">Horizontal Timeline</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group">--}}
{{--                            <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions--}}
{{--                                <i class="fa fa-angle-down"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu pull-right">--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> Action 1</a>--}}
{{--                                </li>--}}
{{--                                <li class="divider"> </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Action 2</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Action 3</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Action 4</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="cd-horizontal-timeline mt-timeline-horizontal">--}}
{{--                        <div class="timeline">--}}
{{--                            <div class="events-wrapper">--}}
{{--                                <div class="events">--}}
{{--                                    <ol>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="16/01/2014" class="border-after-red bg-after-red selected">16 Jan</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="28/02/2014" class="border-after-red bg-after-red">28 Feb</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="20/04/2014" class="border-after-red bg-after-red">20 Mar</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="20/05/2014" class="border-after-red bg-after-red">20 May</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="09/07/2014" class="border-after-red bg-after-red">09 Jul</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="30/08/2014" class="border-after-red bg-after-red">30 Aug</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="15/09/2014" class="border-after-red bg-after-red">15 Sep</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="01/11/2014" class="border-after-red bg-after-red">01 Nov</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="10/12/2014" class="border-after-red bg-after-red">10 Dec</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="19/01/2015" class="border-after-red bg-after-red">29 Jan</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="03/03/2015" class="border-after-red bg-after-red">3 Mar</a>--}}
{{--                                        </li>--}}
{{--                                    </ol>--}}
{{--                                    <span class="filling-line bg-red" aria-hidden="true"></span>--}}
{{--                                </div>--}}
{{--                                <!-- .events -->--}}
{{--                            </div>--}}
{{--                            <!-- .events-wrapper -->--}}
{{--                            <ul class="cd-timeline-navigation mt-ht-nav-icon">--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="prev inactive btn btn-outline red md-skip">--}}
{{--                                        <i class="fa fa-chevron-left"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="next btn btn-outline red md-skip">--}}
{{--                                        <i class="fa fa-chevron-right"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <!-- .cd-timeline-navigation -->--}}
{{--                        </div>--}}
{{--                        <!-- .timeline -->--}}
{{--                        <div class="events-content">--}}
{{--                            <ol>--}}
{{--                                <li class="selected" data-date="16/01/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">New User</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_3.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">16 January 2014 : 7:45 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam--}}
{{--                                            at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non est rhoncus volutpat.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle red btn-outline">Read More</a>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle btn-icon-only blue">--}}
{{--                                            <i class="fa fa-plus"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right">--}}
{{--                                            <i class="fa fa-twitter"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="28/02/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Sending Shipment</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_3.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Hugh Grant</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">28 February 2014 : 10:15 AM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle btn-outline green-jungle">Download Shipment List</a>--}}
{{--                                        <div class="btn-group dropup pull-right">--}}
{{--                                            <button class="btn btn-circle blue-steel dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </button>--}}
{{--                                            <ul class="dropdown-menu pull-right" role="menu">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Action </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Another action </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Something else here </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="divider"> </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Separated link </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="20/04/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Blue Chambray</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_1.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue">Rory Matthew</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">20 April 2014 : 10:45 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle red">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="20/05/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">20 May 2014 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="09/07/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Event Success</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_1.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Matt Goldman</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">9 July 2014 : 8:15 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle btn-outline purple-medium">View Summary</a>--}}
{{--                                        <div class="btn-group dropup pull-right">--}}
{{--                                            <button class="btn btn-circle green dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </button>--}}
{{--                                            <ul class="dropdown-menu pull-right" role="menu">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Action </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Another action </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Something else here </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="divider"> </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Separated link </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="30/08/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Conference Call</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_1.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Rory Matthew</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">30 August 2014 : 5:45 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <img class="timeline-body-img pull-left" src="{{asset('assets/pages/media/blog/5.jpg')}}" alt="">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle red">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="15/09/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Conference Decision</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_5.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Jessica Wolf</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">15 September 2014 : 8:30 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <img class="timeline-body-img pull-right" src="{{asset('assets/pages/media/blog/6.jpg')}}" alt="">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-sharp">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="01/11/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">1 November 2014 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="10/12/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">10 December 2015 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="19/01/2015">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">19 January 2015 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="03/03/2015">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">3 March 2015 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--                        <!-- .events-content -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light portlet-fit bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-directions font-green hide"></i>--}}
{{--                        <span class="caption-subject bold font-dark uppercase"> Events</span>--}}
{{--                        <span class="caption-helper">Horizontal Timeline</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group btn-group-devided" data-toggle="buttons">--}}
{{--                            <label class="btn green btn-outline btn-circle btn-sm active">--}}
{{--                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>--}}
{{--                            <label class="btn  green btn-outline btn-circle btn-sm">--}}
{{--                                <input type="radio" name="options" class="toggle" id="option2">Tools</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="cd-horizontal-timeline mt-timeline-horizontal">--}}
{{--                        <div class="timeline mt-timeline-square">--}}
{{--                            <div class="events-wrapper">--}}
{{--                                <div class="events">--}}
{{--                                    <ol>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="16/01/2014" class="border-after-blue bg-after-blue selected">Expo 2016</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="28/02/2014" class="border-after-blue bg-after-blue">New Promo</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="20/04/2014" class="border-after-blue bg-after-blue">Meeting</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="20/05/2014" class="border-after-blue bg-after-blue">Launch</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="09/07/2014" class="border-after-blue bg-after-blue">Party</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="30/08/2014" class="border-after-blue bg-after-blue">Reports</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="15/09/2014" class="border-after-blue bg-after-blue">HR</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="01/11/2014" class="border-after-blue bg-after-blue">IPO</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="10/12/2014" class="border-after-blue bg-after-blue">Board</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="19/01/2015" class="border-after-blue bg-after-blue">Revenue</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#0" data-date="03/03/2015" class="border-after-blue bg-after-blue">Dinner</a>--}}
{{--                                        </li>--}}
{{--                                    </ol>--}}
{{--                                    <span class="filling-line bg-blue" aria-hidden="true"></span>--}}
{{--                                </div>--}}
{{--                                <!-- .events -->--}}
{{--                            </div>--}}
{{--                            <!-- .events-wrapper -->--}}
{{--                            <ul class="cd-timeline-navigation mt-ht-nav-icon">--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="prev inactive btn blue md-skip">--}}
{{--                                        <i class="fa fa-chevron-left"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="next btn blue md-skip">--}}
{{--                                        <i class="fa fa-chevron-right"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <!-- .cd-timeline-navigation -->--}}
{{--                        </div>--}}
{{--                        <!-- .timeline -->--}}
{{--                        <div class="events-content">--}}
{{--                            <ol>--}}
{{--                                <li class="selected" data-date="16/01/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Expo 2016 Launch</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Lisa Bold</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">23 February 2014</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod mi felis, aliquam at iaculis eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis mi felis, aliquam at--}}
{{--                                            iaculis eu, onsectetur adipiscing elit finibus eu ex. Integer efficitur leo eget dolor tincidunt, et dignissim risus lacinia. Nam in egestas onsectetur adipiscing elit nunc. Suspendisse potenti</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle dark btn-outline">Read More</a>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right">--}}
{{--                                            <i class="fa fa-twitter"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="28/02/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Sending Shipment</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_3.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Hugh Grant</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">28 February 2014 : 10:15 AM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle btn-outline green-jungle">Download Shipment List</a>--}}
{{--                                        <div class="btn-group dropup pull-right">--}}
{{--                                            <button class="btn btn-circle blue-steel dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </button>--}}
{{--                                            <ul class="dropdown-menu pull-right" role="menu">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Action </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Another action </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Something else here </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="divider"> </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Separated link </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="20/04/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Blue Chambray</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_1.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue">Rory Matthew</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">20 April 2014 : 10:45 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle red">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="20/05/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">20 May 2014 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="09/07/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Event Success</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_1.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Matt Goldman</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">9 July 2014 : 8:15 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle btn-outline purple-medium">View Summary</a>--}}
{{--                                        <div class="btn-group dropup pull-right">--}}
{{--                                            <button class="btn btn-circle green dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </button>--}}
{{--                                            <ul class="dropdown-menu pull-right" role="menu">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Action </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Another action </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Something else here </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="divider"> </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">Separated link </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="30/08/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Conference Call</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_1.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Rory Matthew</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">30 August 2014 : 5:45 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <img class="timeline-body-img pull-left" src="{{asset('assets/pages/media/blog/5.jpg')}}" alt="">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle red">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="15/09/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Conference Decision</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_5.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Jessica Wolf</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">15 September 2014 : 8:30 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <img class="timeline-body-img pull-right" src="{{asset('assets/pages/media/blog/6.jpg')}}" alt="">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis--}}
{{--                                            qui ut.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-sharp">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="01/11/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">1 November 2014 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="10/12/2014">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">10 December 2014 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="19/01/2015">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">19 January 2015 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li data-date="03/03/2015">--}}
{{--                                    <div class="mt-title">--}}
{{--                                        <h2 class="mt-content-title">Timeline Received</h2>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-author">--}}
{{--                                        <div class="mt-avatar">--}}
{{--                                            <img src="{{asset('assets/pages/media/users/avatar80_2.jpg')}}" />--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-name">--}}
{{--                                            <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>--}}
{{--                                        </div>--}}
{{--                                        <div class="mt-author-datetime font-grey-mint">3 March 2015 : 12:20 PM</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                    <div class="mt-content border-grey-steel">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget dolor--}}
{{--                                            tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non--}}
{{--                                            est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent dignissim luctus--}}
{{--                                            risus sed sodales.</p>--}}
{{--                                        <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ol>--}}
{{--                        </div>--}}
{{--                        <!-- .events-content -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-share font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">Recent Activities</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group">--}}
{{--                            <a class="btn btn-sm blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By--}}
{{--                                <i class="fa fa-angle-down"></i>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">--}}
{{--                                <label class="mt-checkbox mt-checkbox-outline">--}}
{{--                                    <input type="checkbox" /> Finance--}}
{{--                                    <span></span>--}}
{{--                                </label>--}}
{{--                                <label class="mt-checkbox mt-checkbox-outline">--}}
{{--                                    <input type="checkbox" checked="" /> Membership--}}
{{--                                    <span></span>--}}
{{--                                </label>--}}
{{--                                <label class="mt-checkbox mt-checkbox-outline">--}}
{{--                                    <input type="checkbox" /> Customer Support--}}
{{--                                    <span></span>--}}
{{--                                </label>--}}
{{--                                <label class="mt-checkbox mt-checkbox-outline">--}}
{{--                                    <input type="checkbox" checked="" /> HR--}}
{{--                                    <span></span>--}}
{{--                                </label>--}}
{{--                                <label class="mt-checkbox mt-checkbox-outline">--}}
{{--                                    <input type="checkbox" /> System--}}
{{--                                    <span></span>--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">--}}
{{--                        <ul class="feeds">--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-info">--}}
{{--                                                <i class="fa fa-check"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> You have 4 pending tasks.--}}
{{--                                                <span class="label label-sm label-warning "> Take action--}}
{{--                                                                    <i class="fa fa-share"></i>--}}
{{--                                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> Just now </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <div class="col1">--}}
{{--                                        <div class="cont">--}}
{{--                                            <div class="cont-col1">--}}
{{--                                                <div class="label label-sm label-success">--}}
{{--                                                    <i class="fa fa-bar-chart-o"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="cont-col2">--}}
{{--                                                <div class="desc"> Finance Report for year 2013 has been released. </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col2">--}}
{{--                                        <div class="date"> 20 mins </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-danger">--}}
{{--                                                <i class="fa fa-user"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> 24 mins </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-info">--}}
{{--                                                <i class="fa fa-shopping-cart"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> New order received with--}}
{{--                                                <span class="label label-sm label-success"> Reference Number: DR23923 </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> 30 mins </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-success">--}}
{{--                                                <i class="fa fa-user"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> 24 mins </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-default">--}}
{{--                                                <i class="fa fa-bell-o"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> Web server hardware needs to be upgraded.--}}
{{--                                                <span class="label label-sm label-default "> Overdue </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> 2 hours </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <div class="col1">--}}
{{--                                        <div class="cont">--}}
{{--                                            <div class="cont-col1">--}}
{{--                                                <div class="label label-sm label-default">--}}
{{--                                                    <i class="fa fa-briefcase"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="cont-col2">--}}
{{--                                                <div class="desc"> IPO Report for year 2013 has been released. </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col2">--}}
{{--                                        <div class="date"> 20 mins </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-info">--}}
{{--                                                <i class="fa fa-check"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> You have 4 pending tasks.--}}
{{--                                                <span class="label label-sm label-warning "> Take action--}}
{{--                                                                    <i class="fa fa-share"></i>--}}
{{--                                                                </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> Just now </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <div class="col1">--}}
{{--                                        <div class="cont">--}}
{{--                                            <div class="cont-col1">--}}
{{--                                                <div class="label label-sm label-danger">--}}
{{--                                                    <i class="fa fa-bar-chart-o"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="cont-col2">--}}
{{--                                                <div class="desc"> Finance Report for year 2013 has been released. </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col2">--}}
{{--                                        <div class="date"> 20 mins </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-default">--}}
{{--                                                <i class="fa fa-user"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> 24 mins </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-info">--}}
{{--                                                <i class="fa fa-shopping-cart"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> New order received with--}}
{{--                                                <span class="label label-sm label-success"> Reference Number: DR23923 </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> 30 mins </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-success">--}}
{{--                                                <i class="fa fa-user"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> You have 5 pending membership that requires a quick review. </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> 24 mins </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="col1">--}}
{{--                                    <div class="cont">--}}
{{--                                        <div class="cont-col1">--}}
{{--                                            <div class="label label-sm label-warning">--}}
{{--                                                <i class="fa fa-bell-o"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> Web server hardware needs to be upgraded.--}}
{{--                                                <span class="label label-sm label-default "> Overdue </span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col2">--}}
{{--                                    <div class="date"> 2 hours </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="javascript:;">--}}
{{--                                    <div class="col1">--}}
{{--                                        <div class="cont">--}}
{{--                                            <div class="cont-col1">--}}
{{--                                                <div class="label label-sm label-info">--}}
{{--                                                    <i class="fa fa-briefcase"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="cont-col2">--}}
{{--                                                <div class="desc"> IPO Report for year 2013 has been released. </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col2">--}}
{{--                                        <div class="date"> 20 mins </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="scroller-footer">--}}
{{--                        <div class="btn-arrow-link pull-right">--}}
{{--                            <a href="javascript:;">See All Records</a>--}}
{{--                            <i class="icon-arrow-right"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light tasks-widget bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-share font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">Tasks</span>--}}
{{--                        <span class="caption-helper">tasks summary...</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group">--}}
{{--                            <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> More--}}
{{--                                <i class="fa fa-angle-down"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu pull-right">--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> All Project </a>--}}
{{--                                </li>--}}
{{--                                <li class="divider"> </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> AirAsia </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> Cruise </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> HSBC </a>--}}
{{--                                </li>--}}
{{--                                <li class="divider"> </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> Pending--}}
{{--                                        <span class="badge badge-danger"> 4 </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> Completed--}}
{{--                                        <span class="badge badge-success"> 12 </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> Overdue--}}
{{--                                        <span class="badge badge-warning"> 9 </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="task-content">--}}
{{--                        <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">--}}
{{--                            <!-- START TASK LIST -->--}}
{{--                            <ul class="task-list">--}}
{{--                                <li>--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> Present 2013 Year IPO Statistics at Board Meeting </span>--}}
{{--                                        <span class="label label-sm label-success">Company</span>--}}
{{--                                        <span class="task-bell">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> Hold An Interview for Marketing Manager Position </span>--}}
{{--                                        <span class="label label-sm label-danger">Marketing</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> AirAsia Intranet System Project Internal Meeting </span>--}}
{{--                                        <span class="label label-sm label-success">AirAsia</span>--}}
{{--                                        <span class="task-bell">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> Technical Management Meeting </span>--}}
{{--                                        <span class="label label-sm label-warning">Company</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> Kick-off Company CRM Mobile App Development </span>--}}
{{--                                        <span class="label label-sm label-info">Internal Products</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> Prepare Commercial Offer For SmartVision Website Rewamp </span>--}}
{{--                                        <span class="label label-sm label-danger">SmartVision</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> Sign-Off The Comercial Agreement With AutoSmart </span>--}}
{{--                                        <span class="label label-sm label-default">AutoSmart</span>--}}
{{--                                        <span class="task-bell">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group dropup">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> Company Staff Meeting </span>--}}
{{--                                        <span class="label label-sm label-success">Cruise</span>--}}
{{--                                        <span class="task-bell">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group dropup">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="last-line">--}}
{{--                                    <div class="task-checkbox">--}}
{{--                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">--}}
{{--                                            <input type="checkbox" class="checkboxes" value="1" />--}}
{{--                                            <span></span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-title">--}}
{{--                                        <span class="task-title-sp"> KeenThemes Investment Discussion </span>--}}
{{--                                        <span class="label label-sm label-warning">KeenThemes </span>--}}
{{--                                    </div>--}}
{{--                                    <div class="task-config">--}}
{{--                                        <div class="task-config-btn btn-group dropup">--}}
{{--                                            <a class="btn btn-sm default" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                                                <i class="fa fa-cog"></i>--}}
{{--                                                <i class="fa fa-angle-down"></i>--}}
{{--                                            </a>--}}
{{--                                            <ul class="dropdown-menu pull-right">--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-check"></i> Complete </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-pencil"></i> Edit </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:;">--}}
{{--                                                        <i class="fa fa-trash-o"></i> Cancel </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <!-- END START TASK LIST -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="task-footer">--}}
{{--                        <div class="btn-arrow-link pull-right">--}}
{{--                            <a href="javascript:;">See All Records</a>--}}
{{--                            <i class="icon-arrow-right"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-cursor font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">General Stats</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <a href="javascript:;" class="btn btn-sm btn-circle red easy-pie-chart-reload">--}}
{{--                            <i class="fa fa-repeat"></i> Reload </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="easy-pie-chart">--}}
{{--                                <div class="number transactions" data-percent="55">--}}
{{--                                    <span>+55</span>% </div>--}}
{{--                                <a class="title" href="javascript:;"> Transactions--}}
{{--                                    <i class="icon-arrow-right"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="margin-bottom-10 visible-sm"> </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="easy-pie-chart">--}}
{{--                                <div class="number visits" data-percent="85">--}}
{{--                                    <span>+85</span>% </div>--}}
{{--                                <a class="title" href="javascript:;"> New Visits--}}
{{--                                    <i class="icon-arrow-right"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="margin-bottom-10 visible-sm"> </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="easy-pie-chart">--}}
{{--                                <div class="number bounce" data-percent="46">--}}
{{--                                    <span>-46</span>% </div>--}}
{{--                                <a class="title" href="javascript:;"> Bounce--}}
{{--                                    <i class="icon-arrow-right"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-equalizer font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">Server Stats</span>--}}
{{--                        <span class="caption-helper">monthly stats...</span>--}}
{{--                    </div>--}}
{{--                    <div class="tools">--}}
{{--                        <a href="" class="collapse"> </a>--}}
{{--                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>--}}
{{--                        <a href="" class="reload"> </a>--}}
{{--                        <a href="" class="remove"> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="sparkline-chart">--}}
{{--                                <div class="number" id="sparkline_bar5"></div>--}}
{{--                                <a class="title" href="javascript:;"> Network--}}
{{--                                    <i class="icon-arrow-right"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="margin-bottom-10 visible-sm"> </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="sparkline-chart">--}}
{{--                                <div class="number" id="sparkline_bar6"></div>--}}
{{--                                <a class="title" href="javascript:;"> CPU Load--}}
{{--                                    <i class="icon-arrow-right"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="margin-bottom-10 visible-sm"> </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="sparkline-chart">--}}
{{--                                <div class="number" id="sparkline_line"></div>--}}
{{--                                <a class="title" href="javascript:;"> Load Rate--}}
{{--                                    <i class="icon-arrow-right"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <!-- BEGIN REGIONAL STATS PORTLET-->--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-share font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">Regional Stats</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
{{--                            <i class="icon-cloud-upload"></i>--}}
{{--                        </a>--}}
{{--                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
{{--                            <i class="icon-wrench"></i>--}}
{{--                        </a>--}}
{{--                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-container="false" data-placement="bottom" href="javascript:;"> </a>--}}
{{--                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">--}}
{{--                            <i class="icon-trash"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div id="region_statistics_loading">--}}
{{--                        <img src="{{asset('assets/global/img/loading.gif')}}" alt="loading" /> </div>--}}
{{--                    <div id="region_statistics_content" class="display-none">--}}
{{--                        <div class="btn-toolbar margin-bottom-10">--}}
{{--                            <div class="btn-group btn-group-circle" data-toggle="buttons">--}}
{{--                                <a href="" class="btn grey-salsa btn-sm active"> Users </a>--}}
{{--                                <a href="" class="btn grey-salsa btn-sm"> Orders </a>--}}
{{--                            </div>--}}
{{--                            <div class="btn-group pull-right">--}}
{{--                                <a href="" class="btn btn-circle grey-salsa btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Select Region--}}
{{--                                    <span class="fa fa-angle-down"> </span>--}}
{{--                                </a>--}}
{{--                                <ul class="dropdown-menu pull-right">--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;" id="regional_stat_world"> World </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;" id="regional_stat_usa"> USA </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;" id="regional_stat_europe"> Europe </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;" id="regional_stat_russia"> Russia </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;" id="regional_stat_germany"> Germany </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div id="vmap_world" class="vmaps display-none"> </div>--}}
{{--                        <div id="vmap_usa" class="vmaps display-none"> </div>--}}
{{--                        <div id="vmap_europe" class="vmaps display-none"> </div>--}}
{{--                        <div id="vmap_russia" class="vmaps display-none"> </div>--}}
{{--                        <div id="vmap_germany" class="vmaps display-none"> </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END REGIONAL STATS PORTLET-->--}}
{{--        </div>--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <!-- BEGIN PORTLET-->--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title tabbable-line">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-globe font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">Feeds</span>--}}
{{--                    </div>--}}
{{--                    <ul class="nav nav-tabs">--}}
{{--                        <li class="active">--}}
{{--                            <a href="#tab_1_1" class="active" data-toggle="tab"> System </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#tab_1_2" data-toggle="tab"> Activities </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <!--BEGIN TABS-->--}}
{{--                    <div class="tab-content">--}}
{{--                        <div class="tab-pane active" id="tab_1_1">--}}
{{--                            <div class="scroller" style="height: 339px;" data-always-visible="1" data-rail-visible="0">--}}
{{--                                <ul class="feeds">--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-success">--}}
{{--                                                        <i class="fa fa-bell-o"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> You have 4 pending tasks.--}}
{{--                                                        <span class="label label-sm label-info"> Take action--}}
{{--                                                                            <i class="fa fa-share"></i>--}}
{{--                                                                        </span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> Just now </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New version v1.4 just lunched! </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> 20 mins </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-danger">--}}
{{--                                                        <i class="fa fa-bolt"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> Database server #12 overloaded. Please fix the issue. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 24 mins </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-info">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 30 mins </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-success">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 40 mins </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-warning">--}}
{{--                                                        <i class="fa fa-plus"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New user registered. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 1.5 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-success">--}}
{{--                                                        <i class="fa fa-bell-o"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> Web server hardware needs to be upgraded.--}}
{{--                                                        <span class="label label-sm label-default "> Overdue </span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 2 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-default">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 3 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-warning">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 5 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-info">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 18 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-default">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 21 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-info">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 22 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-default">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 21 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-info">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 22 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-default">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 21 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-info">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 22 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-default">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 21 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-info">--}}
{{--                                                        <i class="fa fa-bullhorn"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> New order received. Please take care of it. </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 22 hours </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="tab_1_2">--}}
{{--                            <div class="scroller" style="height: 290px;" data-always-visible="1" data-rail-visible1="1">--}}
{{--                                <ul class="feeds">--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New user registered </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> Just now </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New order received </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> 10 mins </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <div class="col1">--}}
{{--                                            <div class="cont">--}}
{{--                                                <div class="cont-col1">--}}
{{--                                                    <div class="label label-sm label-danger">--}}
{{--                                                        <i class="fa fa-bolt"></i>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="cont-col2">--}}
{{--                                                    <div class="desc"> Order #24DOP4 has been rejected.--}}
{{--                                                        <span class="label label-sm label-danger "> Take action--}}
{{--                                                                            <i class="fa fa-share"></i>--}}
{{--                                                                        </span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col2">--}}
{{--                                            <div class="date"> 24 mins </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New user registered </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> Just now </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New user registered </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> Just now </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New user registered </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> Just now </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New user registered </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> Just now </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New user registered </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> Just now </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New user registered </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> Just now </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="javascript:;">--}}
{{--                                            <div class="col1">--}}
{{--                                                <div class="cont">--}}
{{--                                                    <div class="cont-col1">--}}
{{--                                                        <div class="label label-sm label-success">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="cont-col2">--}}
{{--                                                        <div class="desc"> New user registered </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col2">--}}
{{--                                                <div class="date"> Just now </div>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!--END TABS-->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END PORTLET-->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <!-- BEGIN PORTLET-->--}}
{{--            <div class="portlet light calendar bordered">--}}
{{--                <div class="portlet-title ">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-calendar font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-dark bold uppercase">Feeds</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div id="calendar"> </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END PORTLET-->--}}
{{--        </div>--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <!-- BEGIN PORTLET-->--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-bubble font-hide hide"></i>--}}
{{--                        <span class="caption-subject font-hide bold uppercase">Chats</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="portlet-input input-inline">--}}
{{--                            <div class="input-icon right">--}}
{{--                                <i class="icon-magnifier"></i>--}}
{{--                                <input type="text" class="form-control input-circle" placeholder="search..."> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body" id="chats">--}}
{{--                    <div class="scroller" style="height: 525px;" data-always-visible="1" data-rail-visible1="1">--}}
{{--                        <ul class="chats">--}}
{{--                            <li class="out">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Lisa Wong </a>--}}
{{--                                    <span class="datetime"> at 20:11 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="out">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Lisa Wong </a>--}}
{{--                                    <span class="datetime"> at 20:11 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="in">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar1.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Bob Nilson </a>--}}
{{--                                    <span class="datetime"> at 20:30 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="in">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar1.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Bob Nilson </a>--}}
{{--                                    <span class="datetime"> at 20:30 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="out">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Richard Doe </a>--}}
{{--                                    <span class="datetime"> at 20:33 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="in">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Richard Doe </a>--}}
{{--                                    <span class="datetime"> at 20:35 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="out">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar1.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Bob Nilson </a>--}}
{{--                                    <span class="datetime"> at 20:40 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="in">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Richard Doe </a>--}}
{{--                                    <span class="datetime"> at 20:40 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="out">--}}
{{--                                <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar1.jpg')}}" />--}}
{{--                                <div class="message">--}}
{{--                                    <span class="arrow"> </span>--}}
{{--                                    <a href="javascript:;" class="name"> Bob Nilson </a>--}}
{{--                                    <span class="datetime"> at 20:54 </span>--}}
{{--                                    <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. sed diam nonummy nibh euismod tincidunt ut laoreet. </span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="chat-form">--}}
{{--                        <div class="input-cont">--}}
{{--                            <input class="form-control" type="text" placeholder="Type a message here..." /> </div>--}}
{{--                        <div class="btn-cont">--}}
{{--                            <span class="arrow"> </span>--}}
{{--                            <a href="" class="btn blue icn-only">--}}
{{--                                <i class="fa fa-check icon-white"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- END PORTLET-->--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-bubble font-dark hide"></i>--}}
{{--                        <span class="caption-subject font-hide bold uppercase">Recent Users</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group">--}}
{{--                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions--}}
{{--                                <i class="fa fa-angle-down"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu pull-right">--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> Option 1</a>--}}
{{--                                </li>--}}
{{--                                <li class="divider"> </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Option 2</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Option 3</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Option 4</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <!--begin: widget 1-1 -->--}}
{{--                            <div class="mt-widget-1">--}}
{{--                                <div class="mt-icon">--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="icon-plus"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="mt-img">--}}
{{--                                    <img src="{{asset('assets/pages/media/users/avatar80_8.jpg')}}"> </div>--}}
{{--                                <div class="mt-body">--}}
{{--                                    <h3 class="mt-username">Diana Ellison</h3>--}}
{{--                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>--}}
{{--                                    <div class="mt-stats">--}}
{{--                                        <div class="btn-group btn-group btn-group-justified">--}}
{{--                                            <a href="javascript:;" class="btn font-red">--}}
{{--                                                <i class="icon-bubbles"></i> 1,7k </a>--}}
{{--                                            <a href="javascript:;" class="btn font-green">--}}
{{--                                                <i class="icon-social-twitter"></i> 2,6k </a>--}}
{{--                                            <a href="javascript:;" class="btn font-yellow">--}}
{{--                                                <i class="icon-emoticon-smile"></i> 3,7k </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end: widget 1-1 -->--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <!--begin: widget 1-2 -->--}}
{{--                            <div class="mt-widget-1">--}}
{{--                                <div class="mt-icon">--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="icon-plus"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="mt-img">--}}
{{--                                    <img src="{{asset('assets/pages/media/users/avatar80_7.jpg')}}"> </div>--}}
{{--                                <div class="mt-body">--}}
{{--                                    <h3 class="mt-username">Jason Baker</h3>--}}
{{--                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>--}}
{{--                                    <div class="mt-stats">--}}
{{--                                        <div class="btn-group btn-group btn-group-justified">--}}
{{--                                            <a href="javascript:;" class="btn font-yellow">--}}
{{--                                                <i class="icon-bubbles"></i> 1,7k </a>--}}
{{--                                            <a href="javascript:;" class="btn font-blue">--}}
{{--                                                <i class="icon-social-twitter"></i> 2,6k </a>--}}
{{--                                            <a href="javascript:;" class="btn font-green">--}}
{{--                                                <i class="icon-emoticon-smile"></i> 3,7k </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end: widget 1-2 -->--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <!--begin: widget 1-3 -->--}}
{{--                            <div class="mt-widget-1">--}}
{{--                                <div class="mt-icon">--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="icon-plus"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="mt-img">--}}
{{--                                    <img src="{{asset('assets/pages/media/users/avatar80_6.jpg')}}"> </div>--}}
{{--                                <div class="mt-body">--}}
{{--                                    <h3 class="mt-username">Julia Berry</h3>--}}
{{--                                    <p class="mt-user-title"> Lorem Ipsum is simply dummy text. </p>--}}
{{--                                    <div class="mt-stats">--}}
{{--                                        <div class="btn-group btn-group btn-group-justified">--}}
{{--                                            <a href="javascript:;" class="btn font-yellow">--}}
{{--                                                <i class="icon-bubbles"></i> 1,7k </a>--}}
{{--                                            <a href="javascript:;" class="btn font-red">--}}
{{--                                                <i class="icon-social-twitter"></i> 2,6k </a>--}}
{{--                                            <a href="javascript:;" class="btn font-green">--}}
{{--                                                <i class="icon-emoticon-smile"></i> 3,7k </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--end: widget 1-3 -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="portlet light portlet-fit bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-microphone font-dark hide"></i>--}}
{{--                        <span class="caption-subject bold font-dark uppercase"> Recent Works</span>--}}
{{--                        <span class="caption-helper">default option...</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group btn-group-devided" data-toggle="buttons">--}}
{{--                            <label class="btn red btn-outline btn-circle btn-sm active">--}}
{{--                                <input type="radio" name="options" class="toggle" id="option1">Settings</label>--}}
{{--                            <label class="btn  red btn-outline btn-circle btn-sm">--}}
{{--                                <input type="radio" name="options" class="toggle" id="option2">Tools</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="mt-widget-2">--}}
{{--                                <div class="mt-head" style="background-image: url({{asset('assets/pages/img/background/32.jpg')}});">--}}
{{--                                    <div class="mt-head-label">--}}
{{--                                        <button type="button" class="btn btn-success">Manhattan</button>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-head-user">--}}
{{--                                        <div class="mt-head-user-img">--}}
{{--                                            <img src="{{asset('assets/pages/img/avatars/team7.jpg')}}"> </div>--}}
{{--                                        <div class="mt-head-user-info">--}}
{{--                                            <span class="mt-user-name">Chris Jagers</span>--}}
{{--                                            <span class="mt-user-time">--}}
{{--                                                                <i class="icon-emoticon-smile"></i> 3 mins ago </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-body">--}}
{{--                                    <h3 class="mt-body-title"> Thomas Clark </h3>--}}
{{--                                    <p class="mt-body-description"> It is a long established fact that a reader will be distracted </p>--}}
{{--                                    <ul class="mt-body-stats">--}}
{{--                                        <li class="font-green">--}}
{{--                                            <i class="icon-emoticon-smile"></i> 3,7k</li>--}}
{{--                                        <li class="font-yellow">--}}
{{--                                            <i class=" icon-social-twitter"></i> 3,7k</li>--}}
{{--                                        <li class="font-red">--}}
{{--                                            <i class="  icon-bubbles"></i> 3,7k</li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="mt-body-actions">--}}
{{--                                        <div class="btn-group btn-group btn-group-justified">--}}
{{--                                            <a href="javascript:;" class="btn">--}}
{{--                                                <i class="icon-bubbles"></i> Bookmark </a>--}}
{{--                                            <a href="javascript:;" class="btn ">--}}
{{--                                                <i class="icon-social-twitter"></i> Share </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="mt-widget-2">--}}
{{--                                <div class="mt-head" style="background-image: url({{asset('assets/pages/img/background/43.jpg')}});">--}}
{{--                                    <div class="mt-head-label">--}}
{{--                                        <button type="button" class="btn btn-danger">London</button>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-head-user">--}}
{{--                                        <div class="mt-head-user-img">--}}
{{--                                            <img src="{{asset('assets/pages/img/avatars/team3.jpg')}}"> </div>--}}
{{--                                        <div class="mt-head-user-info">--}}
{{--                                            <span class="mt-user-name">Harry Harris</span>--}}
{{--                                            <span class="mt-user-time">--}}
{{--                                                                <i class="icon-user"></i> 3 mins ago </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-body">--}}
{{--                                    <h3 class="mt-body-title"> Christian Davidson </h3>--}}
{{--                                    <p class="mt-body-description"> It is a long established fact that a reader will be distracted </p>--}}
{{--                                    <ul class="mt-body-stats">--}}
{{--                                        <li class="font-green">--}}
{{--                                            <i class="icon-emoticon-smile"></i> 3,7k</li>--}}
{{--                                        <li class="font-yellow">--}}
{{--                                            <i class=" icon-social-twitter"></i> 3,7k</li>--}}
{{--                                        <li class="font-red">--}}
{{--                                            <i class="  icon-bubbles"></i> 3,7k</li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="mt-body-actions">--}}
{{--                                        <div class="btn-group btn-group btn-group-justified">--}}
{{--                                            <a href="javascript:;" class="btn ">--}}
{{--                                                <i class="icon-bubbles"></i> Bookmark </a>--}}
{{--                                            <a href="javascript:;" class="btn ">--}}
{{--                                                <i class="icon-social-twitter"></i> Share </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-6 col-sm-6">--}}
{{--            <div class="portlet light portlet-fit bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-microphone font-dark hide"></i>--}}
{{--                        <span class="caption-subject bold font-dark uppercase"> Recent Projects</span>--}}
{{--                        <span class="caption-helper">default option...</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group btn-group-devided" data-toggle="buttons">--}}
{{--                            <label class="btn blue btn-outline btn-circle btn-sm active">--}}
{{--                                <input type="radio" name="options" class="toggle" id="option1">Actions</label>--}}
{{--                            <label class="btn  blue btn-outline btn-circle btn-sm">--}}
{{--                                <input type="radio" name="options" class="toggle" id="option2">Tools</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="mt-widget-4">--}}
{{--                                <div class="mt-img-container">--}}
{{--                                    <img src="{{asset('assets/pages/img/background/34.jpg')}}" /> </div>--}}
{{--                                <div class="mt-container bg-purple-opacity">--}}
{{--                                    <div class="mt-head-title"> Website Revamp & Deployment </div>--}}
{{--                                    <div class="mt-body-icons">--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-pencil"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-map"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-trash"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-footer-button">--}}
{{--                                        <button type="button" class="btn btn-circle btn-danger btn-sm">Dior</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="mt-widget-4">--}}
{{--                                <div class="mt-img-container">--}}
{{--                                    <img src="{{asset('assets/pages/img/background/46.jpg')}}" /> </div>--}}
{{--                                <div class="mt-container bg-green-opacity">--}}
{{--                                    <div class="mt-head-title"> CRM Development & Deployment </div>--}}
{{--                                    <div class="mt-body-icons">--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-social-twitter"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-bubbles"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-bell"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-footer-button">--}}
{{--                                        <button type="button" class="btn btn-circle blue-ebonyclay btn-sm">Nike</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="mt-widget-4">--}}
{{--                                <div class="mt-img-container">--}}
{{--                                    <img src="{{asset('assets/pages/img/background/37.jpg')}}" /> </div>--}}
{{--                                <div class="mt-container bg-dark-opacity">--}}
{{--                                    <div class="mt-head-title"> Marketing Campaigns </div>--}}
{{--                                    <div class="mt-body-icons">--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-bubbles"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-map"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class=" icon-cup"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-footer-button">--}}
{{--                                        <button type="button" class="btn btn-circle btn-success btn-sm">Honda</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="portlet light portlet-fit bordered">--}}
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="icon-microphone font-dark hide"></i>--}}
{{--                        <span class="caption-subject bold font-dark uppercase"> Activities</span>--}}
{{--                        <span class="caption-helper">default option...</span>--}}
{{--                    </div>--}}
{{--                    <div class="actions">--}}
{{--                        <div class="btn-group">--}}
{{--                            <a class="btn red btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions--}}
{{--                                <i class="fa fa-angle-down"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu pull-right">--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;"> Option 1</a>--}}
{{--                                </li>--}}
{{--                                <li class="divider"> </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Option 2</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Option 3</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:;">Option 4</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="portlet-body">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="mt-widget-3">--}}
{{--                                <div class="mt-head bg-blue-hoki">--}}
{{--                                    <div class="mt-head-icon">--}}
{{--                                        <i class=" icon-social-twitter"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>--}}
{{--                                    <span class="mt-head-date"> 25 Jan, 2015 </span>--}}
{{--                                    <div class="mt-head-button">--}}
{{--                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-body-actions-icons">--}}
{{--                                    <div class="btn-group btn-group btn-group-justified">--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-align-justify"></i>--}}
{{--                                                            </span>RECORD </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-camera"></i>--}}
{{--                                                            </span>PHOTO </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-calendar"></i>--}}
{{--                                                            </span>DATE </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-record"></i>--}}
{{--                                                            </span>RANC </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="mt-widget-3">--}}
{{--                                <div class="mt-head bg-red">--}}
{{--                                    <div class="mt-head-icon">--}}
{{--                                        <i class="icon-user"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>--}}
{{--                                    <span class="mt-head-date"> 12 Feb, 2016 </span>--}}
{{--                                    <div class="mt-head-button">--}}
{{--                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-body-actions-icons">--}}
{{--                                    <div class="btn-group btn-group btn-group-justified">--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-align-justify"></i>--}}
{{--                                                            </span>RECORD </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-camera"></i>--}}
{{--                                                            </span>PHOTO </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-calendar"></i>--}}
{{--                                                            </span>DATE </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-record"></i>--}}
{{--                                                            </span>RANC </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="mt-widget-3">--}}
{{--                                <div class="mt-head bg-green">--}}
{{--                                    <div class="mt-head-icon">--}}
{{--                                        <i class=" icon-graduation"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-head-desc"> Lorem Ipsum is simply dummy text of the ... </div>--}}
{{--                                    <span class="mt-head-date"> 3 Mar, 2015 </span>--}}
{{--                                    <div class="mt-head-button">--}}
{{--                                        <button type="button" class="btn btn-circle btn-outline white btn-sm">Add</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="mt-body-actions-icons">--}}
{{--                                    <div class="btn-group btn-group btn-group-justified">--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-align-justify"></i>--}}
{{--                                                            </span>RECORD </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-camera"></i>--}}
{{--                                                            </span>PHOTO </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-calendar"></i>--}}
{{--                                                            </span>DATE </a>--}}
{{--                                        <a href="javascript:;" class="btn ">--}}
{{--                                                            <span class="mt-icon">--}}
{{--                                                                <i class="glyphicon glyphicon-record"></i>--}}
{{--                                                            </span>RANC </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@section('footer')
    <script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
    <script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script>
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
    <script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script>
    <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
{{--    <script src="{{asset('assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>--}}
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
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
