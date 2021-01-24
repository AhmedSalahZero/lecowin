<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    @yield('header')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link href="{{asset('assets/new/css/css_customize.css')}}" rel="stylesheet" type="text/css" />




@if(Auth()->check())
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script>


       //     Pusher.logToConsole = true;

            var pusher = new Pusher('2cb664932ad2d4bc5ea7', {
                cluster: 'eu'
            });
            var channel = pusher.subscribe('user-registered-channel');

            channel.bind('user-registered', function(data) {
                let x =  data.notifiable_id.includes({{Auth()->user()->id}});
                if(x) {
                    @if(App()->getLocale() == 'ar')
                    $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time"> الان </span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_ar[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                    $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">'+ `${data.message_ar[{{Auth()->user()->id}}]}` +  '</div> </div> </div> </div> <div class="col2"> <div class=""> الان </div> </div> </li>' + ``)
                    @else
                    $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_en[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                    $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">'+ `${data.message_en[{{Auth()->user()->id}}]}` +  '</div> </div> </div> </div> <div class="col2"> <div class="date"> Just Now </div> </div> </li>' + ``)
                    @endif
                    $('.notification_count').html(parseInt($('.notification_count').text())+ 1 );
                    $('.notifications_pending').html(parseInt($('.notifications_pending').text())+ 1 );


                }
            });
        </script>

        <script>


      //      Pusher.logToConsole = true;

            var pusher = new Pusher('2cb664932ad2d4bc5ea7', {
                cluster: 'eu'
            });
            var channel = pusher.subscribe('new-NetWorker-Added-channel');

            channel.bind('new-NetWorker-Added', function(data) {
                let x =  data.notifiable_id.includes({{Auth()->user()->id}});
                if(x) {
                   @if(App()->getLocale() =='ar')
                   $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">الان</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-bolt"></i> </span> ' + `${data.message_ar[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                    $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">'+ `${data.message_ar[{{Auth()->user()->id}}]}` +  '</div> </div> </div> </div> <div class="col2"> <div class=""> الان </div> </div> </li>' + ``)
                    @else
                    $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-bolt"></i> </span> ' + `${data.message_en[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                    $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">'+ `${data.message_en[{{Auth()->user()->id}}]}` +  '</div> </div> </div> </div> <div class="col2"> <div class="date"> Just Now </div> </div> </li>' + ``)
                       @endif
                    $('.notification_count').html(parseInt($('.notification_count').text())+ 1 );
                    $('.notifications_pending').html(parseInt($('.notifications_pending').text())+ 1 );

                }
            });
        </script>
        <script>


          //  Pusher.logToConsole = true;

            var pusher = new Pusher('2cb664932ad2d4bc5ea7', {
                cluster: 'eu'
            });
            var channel = pusher.subscribe('new-finance-Added-channel');

            channel.bind('new-finance-Added', function(data) {
                let x =  data.notifiable_id.includes({{Auth()->user()->id}}) ;
                if(x) {

                        @if(App()->getLocale() == 'ar')
                        $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">الان</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_ar[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                        $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">' + `${data.message_ar[{{Auth()->user()->id}}]}` + '</div> </div> </div> </div> <div class="col2"> <div class=""> الان </div> </div> </li>' + ``)

                        @else
                        $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_en[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                        $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">' + `${data.message_en[{{Auth()->user()->id}}]}` + '</div> </div> </div> </div> <div class="col2"> <div class="date"> Just Now </div> </div> </li>' + ``)

                        @endif
                        $('.notification_count').html(parseInt($('.notification_count').text()) + 1);
                        $('.notifications_pending').html(parseInt($('.notifications_pending').text()) + 1);
                    }


            });
        </script>
        <script>


            //  Pusher.logToConsole = true;

            var pusher = new Pusher('2cb664932ad2d4bc5ea7', {
                cluster: 'eu'
            });
            var channel = pusher.subscribe('user-sent-money-to-user-channel');

            channel.bind('user-sent-money-to-user', function(data) {
                let x =  data.notifiable_id.includes({{Auth()->user()->id}});
                if(x) {
                  @if(App()->getLocale() == 'ar')
                  $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">الان</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_ar[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                    $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">'+ `${data.message_ar[{{Auth()->user()->id}}]}` +  '</div> </div> </div> </div> <div class="col2"> <div class=""> الان </div> </div> </li>' + ``)
                      @else
                  $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_en[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                    $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">'+ `${data.message_en[{{Auth()->user()->id}}]}` +  '</div> </div> </div> </div> <div class="col2"> <div class="date"> Just Now </div> </div> </li>' + ``)
                    @endif
                    $('.notification_count').html(parseInt($('.notification_count').text())+ 1 );
                    $('.notifications_pending').html(parseInt($('.notifications_pending').text())+ 1 );

                }
            });
        </script>
        <script>


            //  Pusher.logToConsole = true;

            var pusher = new Pusher('2cb664932ad2d4bc5ea7', {
                cluster: 'eu'
            });
            var channel = pusher.subscribe('user-sent-money-to-admin-channel');

            channel.bind('user-sent-money-to-admin-Added', function(data) {
                let x =  data.notifiable_id.includes({{Auth()->user()->id}});
                if(x) {
                  @if(App()->getLocale() == 'ar')
                  $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">الان</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_ar[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                    $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">'+ `${data.message_ar[{{Auth()->user()->id}}]}` +  '</div> </div> </div> </div> <div class="col2"> <div class=""> الان </div> </div> </li>' + ``)
                      @else
                  $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_en[{{Auth()->user()->id}}]}` + '</span> </a> </li>' + ``)
                    $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">'+ `${data.message_en[{{Auth()->user()->id}}]}` +  '</div> </div> </div> </div> <div class="col2"> <div class="date"> Just Now </div> </div> </li>' + ``)

                    @endif
                    $('.notification_count').html(parseInt($('.notification_count').text())+ 1 );
                    $('.notifications_pending').html(parseInt($('.notifications_pending').text())+ 1 );
                }
            });
        </script>
        <script>


            //  Pusher.logToConsole = true;

            var pusher = new Pusher('2cb664932ad2d4bc5ea7', {
                cluster: 'eu'
            });
            var channel = pusher.subscribe('new-public-notification-channel');

            channel.bind('new-public-notification', function(data) {
                let x =  {{Auth()->check()}}
                if(x) {

                        @if(App()->getLocale() == 'ar')
                        $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">الان</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_ar[0] }` + '</span> </a> </li>' + ``)
                        $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">' + `${data.message_ar[0] }` + '</div> </div> </div> </div> <div class="col2"> <div class=""> الان </div> </div> </li>' + ``)

                        @else
                        $('.notifications_x').prepend('<li> <a href="javascript:;"> <span class="time">just now</span> <span class="details"> <span class="label label-sm label-icon label-success"> <i class="fa fa-plus"></i> </span> ' + `${data.message_en[0] }` + '</span> </a> </li>' + ``)
                        $('.time_lines_notifications').prepend(' <li><div class="col1"><div class="cont"><div class="cont-col1"> <div class="label label-sm label-success"> <i class="fa fa-bullhorn"></i> </div> </div> <div class="cont-col2"> <div class="desc">' + `${data.message_en[0] }` + '</div> </div> </div> </div> <div class="col2"> <div class="date"> Just Now </div> </div> </li>' + ``)

                        @endif
                        $('.notification_count').html(parseInt($('.notification_count').text()) + 1);
                        $('.notifications_pending').html(parseInt($('.notifications_pending').text()) + 1);


                }
            });
        </script>

        @if(Auth()->check())



            <script>
                var newsTickerJSON = {
                           @foreach(\App\Models\User::achievementNotifications() as $notification)

                    "{{$notification->id}}" : {

                        @if(App()->getLocale() =='ar')
                        "headline": "{{$notification->data['message_ar']}}",
                        @else
                        "headline": "{{$notification->data['message_en']}}",

                        @endif

                    },

                    @endforeach

                    // more data here

                }





            </script>
        @endif
    @endif
<link href="{{asset('assets/global/css/components-rounded.min.css')}}" rel="stylesheet">

    <style>
        .flex-ticker {
            background-image: linear-gradient(-90deg, #a0247f, #5e2973);
            border-radius: 5px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            padding: 10px;
            width: 100%;
            color: white !important;
            margin-bottom: 15px;
        }
        .flex-ticker .flex-ticker__text{
            color: #ffffff;
            text-decoration: none;
        }
    </style>




</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">


<?php
$currentUser = Auth()->user();
?>

<!-- BEGIN HEADER -->

@if(Auth()->check())
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">

                {{--            <h2 style="color: white;display: inline-block">The Tailors</h2>--}}


                <a href="{{Route('user.home',App()->getLocale())}}">
                    <img src="{{asset('assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" />
                </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->


                    @if(app()->getLocale() == 'en')
                        <a href="{{url('/ar'.$url)}}">
                            <img class="css_arabic_img" src="{{asset('assets/new/img/saudi-arabia.png')}}" width="30" height="30">
                        </a>


                    @elseif(app()->getLocale() == 'ar')
                        <a href="{{url('/en'.$url)}}">
                        <img class="css_arabic_img" src="{{asset('assets/new/img/united-kingdom.png')}}" width="30" height="30">
                        </a>
                    @endif


                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">

                        <a href="javascript:;" class="dropdown-toggle notification_read" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" base_url="{{ url('/') }}" user_id="{{Auth()->user()->id}}">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default notification_count"> {{count((\App\Models\User::allUserNotifications()))}} </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold notifications_pending">{{count((\App\Models\User::allUserNotifications()))}} </span> notifications</h3>
                                <a href="page_user_profile_1.html">@lang('lang.view all')</a>
                            </li>

                            <li>
                                <ul class="dropdown-menu-list scroller notifications_x" style="height: 250px;" data-handle-color="#637283">

                                    @forelse(\App\Models\User::allUserNotifications() as $notification)


                                        <li>
                                            <a href="javascript:;">
                                            <span class="time">
                                    {{leftTime($notification->created_at)}}

                                            </span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span>
                                                    @if(App()->getLocale() =='ar')
                                                        {{$notification->data['message_ar']}}
                                                    @else
                                                        {{$notification->data['message_en']}}
                                                    @endif


                                                </span>
                                            </a>
                                        </li>
                                    @empty
                                        <li>
                                            <a href="javascript:;">

                                            <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> no new notifications </span>
                                            </a>
                                        </li>
                                    @endforelse

                                    {{--                                <li>--}}
                                    {{--                                    <a href="javascript:;">--}}
                                    {{--                                        <span class="time">3 mins</span>--}}
                                    {{--                                        <span class="details">--}}
                                    {{--                                                    <span class="label label-sm label-icon label-danger">--}}
                                    {{--                                                        <i class="fa fa-bolt"></i>--}}
                                    {{--                                                    </span> Server #12 overloaded. </span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                                <li>--}}
                                    {{--                                    <a href="javascript:;">--}}
                                    {{--                                        <span class="time">10 mins</span>--}}
                                    {{--                                        <span class="details">--}}
                                    {{--                                                    <span class="label label-sm label-icon label-warning">--}}
                                    {{--                                                        <i class="fa fa-bell-o"></i>--}}
                                    {{--                                                    </span> Server #2 not responding. </span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                                <li>--}}
                                    {{--                                    <a href="javascript:;">--}}
                                    {{--                                        <span class="time">14 hrs</span>--}}
                                    {{--                                        <span class="details">--}}
                                    {{--                                                    <span class="label label-sm label-icon label-info">--}}
                                    {{--                                                        <i class="fa fa-bullhorn"></i>--}}
                                    {{--                                                    </span> Application error. </span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                                <li>--}}
                                    {{--                                    <a href="javascript:;">--}}
                                    {{--                                        <span class="time">2 days</span>--}}
                                    {{--                                        <span class="details">--}}
                                    {{--                                                    <span class="label label-sm label-icon label-danger">--}}
                                    {{--                                                        <i class="fa fa-bolt"></i>--}}
                                    {{--                                                    </span> Database overloaded 68%. </span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                                <li>--}}
                                    {{--                                    <a href="javascript:;">--}}
                                    {{--                                        <span class="time">3 days</span>--}}
                                    {{--                                        <span class="details">--}}
                                    {{--                                                    <span class="label label-sm label-icon label-danger">--}}
                                    {{--                                                        <i class="fa fa-bolt"></i>--}}
                                    {{--                                                    </span> A user IP blocked. </span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                                <li>--}}
                                    {{--                                    <a href="javascript:;">--}}
                                    {{--                                        <span class="time">4 days</span>--}}
                                    {{--                                        <span class="details">--}}
                                    {{--                                                    <span class="label label-sm label-icon label-warning">--}}
                                    {{--                                                        <i class="fa fa-bell-o"></i>--}}
                                    {{--                                                    </span> Storage Server #4 not responding dfdfdfd. </span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                                <li>--}}
                                    {{--                                    <a href="javascript:;">--}}
                                    {{--                                        <span class="time">5 days</span>--}}
                                    {{--                                        <span class="details">--}}
                                    {{--                                                    <span class="label label-sm label-icon label-info">--}}
                                    {{--                                                        <i class="fa fa-bullhorn"></i>--}}
                                    {{--                                                    </span> System Error. </span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                    {{--                                <li>--}}
                                    {{--                                    <a href="javascript:;">--}}
                                    {{--                                        <span class="time">9 days</span>--}}
                                    {{--                                        <span class="details">--}}
                                    {{--                                                    <span class="label label-sm label-icon label-danger">--}}
                                    {{--                                                        <i class="fa fa-bolt"></i>--}}
                                    {{--                                                    </span> Storage server failed. </span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                </li>--}}
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                {{--                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">--}}
                {{--                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
                {{--                        <i class="icon-envelope-open"></i>--}}
                {{--                        <span class="badge badge-default"> 4 </span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu">--}}
                {{--                        <li class="external">--}}
                {{--                            <h3>You have--}}
                {{--                                <span class="bold">7 New</span> Messages</h3>--}}
                {{--                            <a href="app_inbox.html">view all</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">--}}
                {{--                                <li>--}}
                {{--                                    <a href="#">--}}
                {{--                                                <span class="photo">--}}
                {{--                                                    <img src="{{asset('assets/layouts/layout3/img/avatar2.jpg')}}" class="img-circle" alt=""> </span>--}}
                {{--                                        <span class="subject">--}}
                {{--                                                    <span class="from"> Lisa Wong </span>--}}
                {{--                                                    <span class="time">Just Now </span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="#">--}}
                {{--                                                <span class="photo">--}}
                {{--                                                    <img src="{{asset('assets/layouts/layout3/img/avatar3.jpg')}}" class="img-circle" alt=""> </span>--}}
                {{--                                        <span class="subject">--}}
                {{--                                                    <span class="from"> Richard Doe </span>--}}
                {{--                                                    <span class="time">16 mins </span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="#">--}}
                {{--                                                <span class="photo">--}}
                {{--                                                    <img src="{{asset('assets/layouts/layout3/img/avatar1.jpg')}}" class="img-circle" alt=""> </span>--}}
                {{--                                        <span class="subject">--}}
                {{--                                                    <span class="from"> Bob Nilson </span>--}}
                {{--                                                    <span class="time">2 hrs </span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="#">--}}
                {{--                                                <span class="photo">--}}
                {{--                                                    <img src="{{asset('assets/layouts/layout3/img/avatar2.jpg')}}" class="img-circle" alt=""> </span>--}}
                {{--                                        <span class="subject">--}}
                {{--                                                    <span class="from"> Lisa Wong </span>--}}
                {{--                                                    <span class="time">40 mins </span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="#">--}}
                {{--                                                <span class="photo">--}}
                {{--                                                    <img src="{{asset('assets/layouts/layout3/img/avatar3.jpg')}}" class="img-circle" alt=""> </span>--}}
                {{--                                        <span class="subject">--}}
                {{--                                                    <span class="from"> Richard Doe </span>--}}
                {{--                                                    <span class="time">46 mins </span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                {{--                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">--}}
                {{--                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
                {{--                        <i class="icon-calendar"></i>--}}
                {{--                        <span class="badge badge-default"> 3 </span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu extended tasks">--}}
                {{--                        <li class="external">--}}
                {{--                            <h3>You have--}}
                {{--                                <span class="bold">12 pending</span> tasks</h3>--}}
                {{--                            <a href="app_todo.html">view all</a>--}}
                {{--                        </li>--}}
                {{--                        <li>--}}
                {{--                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">--}}
                {{--                                <li>--}}
                {{--                                    <a href="javascript:;">--}}
                {{--                                                <span class="task">--}}
                {{--                                                    <span class="desc">New release v1.2 </span>--}}
                {{--                                                    <span class="percent">30%</span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="progress">--}}
                {{--                                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">--}}
                {{--                                                        <span class="sr-only">40% Complete</span>--}}
                {{--                                                    </span>--}}
                {{--                                                </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="javascript:;">--}}
                {{--                                                <span class="task">--}}
                {{--                                                    <span class="desc">Application deployment</span>--}}
                {{--                                                    <span class="percent">65%</span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="progress">--}}
                {{--                                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">--}}
                {{--                                                        <span class="sr-only">65% Complete</span>--}}
                {{--                                                    </span>--}}
                {{--                                                </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="javascript:;">--}}
                {{--                                                <span class="task">--}}
                {{--                                                    <span class="desc">Mobile app release</span>--}}
                {{--                                                    <span class="percent">98%</span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="progress">--}}
                {{--                                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">--}}
                {{--                                                        <span class="sr-only">98% Complete</span>--}}
                {{--                                                    </span>--}}
                {{--                                                </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="javascript:;">--}}
                {{--                                                <span class="task">--}}
                {{--                                                    <span class="desc">Database migration</span>--}}
                {{--                                                    <span class="percent">10%</span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="progress">--}}
                {{--                                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">--}}
                {{--                                                        <span class="sr-only">10% Complete</span>--}}
                {{--                                                    </span>--}}
                {{--                                                </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="javascript:;">--}}
                {{--                                                <span class="task">--}}
                {{--                                                    <span class="desc">Web server upgrade</span>--}}
                {{--                                                    <span class="percent">58%</span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="progress">--}}
                {{--                                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">--}}
                {{--                                                        <span class="sr-only">58% Complete</span>--}}
                {{--                                                    </span>--}}
                {{--                                                </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="javascript:;">--}}
                {{--                                                <span class="task">--}}
                {{--                                                    <span class="desc">Mobile development</span>--}}
                {{--                                                    <span class="percent">85%</span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="progress">--}}
                {{--                                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">--}}
                {{--                                                        <span class="sr-only">85% Complete</span>--}}
                {{--                                                    </span>--}}
                {{--                                                </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li>--}}
                {{--                                    <a href="javascript:;">--}}
                {{--                                                <span class="task">--}}
                {{--                                                    <span class="desc">New UI release</span>--}}
                {{--                                                    <span class="percent">38%</span>--}}
                {{--                                                </span>--}}
                {{--                                        <span class="progress progress-striped">--}}
                {{--                                                    <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">--}}
                {{--                                                        <span class="sr-only">38% Complete</span>--}}
                {{--                                                    </span>--}}
                {{--                                                </span>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{asset('storage/'.Auth()->user()->image)}}" />
                            <span class="username username-hide-on-mobile"> {{Auth()->user()->first_name . ' ' . Auth()->user()->last_name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{Route('profile.index',[App()->getLocale(),Auth()->user()->generateCode()])}}">
                                    <i class="icon-user"></i> @lang('lang.My Profile') </a>
                            </li>
                            {{--                        <li>--}}
                            {{--                            <a href="app_calendar.html">--}}
                            {{--                                <i class="icon-calendar"></i> My Calendar </a>--}}
                            {{--                        </li>--}}
                            <li>
                                <a href="{{Route('wallet.index',App()->getLocale())}}">
                                    <i class="icon-envelope-open"></i> @lang('lang.My wallet')
                                    {{--                                <span class="badge badge-danger"> 3 </span>--}}
                                </a>
                            </li>
                            <li>
                                <a href="{{Route('tasks.index',App()->getLocale())}}">
                                    <i class="icon-rocket"></i> @lang('lang.My Tasks')
                                    {{--                                <span class="badge badge-success"> 7 </span>--}}
                                </a>
                            </li>
                            <li class="divider"> </li>
                            {{--                        <li>--}}
                            {{--                            <a href="page_user_lock_1.html">--}}
                            {{--                                <i class="icon-lock"></i> Lock Screen </a>--}}
                            {{--                        </li>--}}
                            <li>
                                <a href="{{Route('admin.logout',App()->getLocale())}}">
                                    <i class="icon-key"></i> @lang('lang.Log Out') </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                {{--                <li class="dropdown dropdown-quick-sidebar-toggler">--}}
                {{--                    <a href="javascript:;" class="dropdown-toggle">--}}
                {{--                        <i class="icon-logout"></i>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>


    @endif
    <!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
@if(Auth()->check())
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <li class="sidebar-toggler-wrapper hide">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                    {{--                <li class="sidebar-search-wrapper">--}}
                    {{--                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->--}}
                    {{--                    <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->--}}
                    {{--                    <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->--}}
                    {{--                    <form class="sidebar-search  " action="page_general_search_3.html" method="POST">--}}
                    {{--                        <a href="javascript:;" class="remove">--}}
                    {{--                            <i class="icon-close"></i>--}}
                    {{--                        </a>--}}
                    {{--                        <div class="input-group">--}}
                    {{--                            <input type="text" class="form-control" placeholder="Search...">--}}
                    {{--                            <span class="input-group-btn">--}}
                    {{--                                        <a href="javascript:;" class="btn submit">--}}
                    {{--                                            <i class="icon-magnifier"></i>--}}
                    {{--                                        </a>--}}
                    {{--                                    </span>--}}
                    {{--                        </div>--}}
                    {{--                    </form>--}}

                    {{--                </li>--}}


                    <li class="nav-item home_nav">
                        <a href="{{Route('user.home',App()->getLocale())}}" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">@lang('lang.dashboard')</span>
                            <span class="selected"></span>

                        </a>

                    </li>
                    {{--                <li class="heading">--}}
                    {{--                    <h3 class="uppercase">Features</h3>--}}
                    {{--                </li>--}}
                    <li class="nav-item  networker_nav">
                        <a href="{{Route('user.networkers.show',App()->getLocale())}}" class="nav-link ">
                            <i class="fa fa-share-alt"></i>
                            <span class="title">@lang('lang.My Network')</span>

                        </a>
                    </li>
                    <li class="nav-item  networker_linear_nav">
                        <a href="{{Route('user.networkers.show.linear',App()->getLocale())}}" class="nav-link ">
                            <i class="fa fa-share-alt"></i>
                            <span class="title">@lang('lang.Linear Networker')</span>

                        </a>
                    </li>
                    <li class="nav-item  networker_fourth_nav">
                        <a href="{{Route('user.networkers.show.fourth',App()->getLocale())}}" class="nav-link ">
                            <i class="fa fa-share-alt"></i>
                            <span class="title">@lang('lang.Fourth Networker')</span>

                        </a>
                    </li>

                    <li class="nav-item  library_nav">
                        <a href="{{Route('main.libraries.show',App()->getLocale())}}" class="nav-link ">
                            <i class="fa fa-book"></i>
                            <span class="title">@lang('lang.Libraries')</span>

                        </a>

                    </li>
                    <li class="nav-item task_nav ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-tasks"></i>
                            <span class="title">@lang('lang.Tasks')</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="{{Route('tasks.index',App()->getLocale())}}" class="nav-link ">
                                    <span class="title">@lang('lang.To do list')</span>
                                    {{--                                <span class="badge badge-success">1</span>--}}
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{Route('tasks.calendar',App()->getLocale())}}" class="nav-link">
                                    <span class="title">@lang('lang.Calendar')</span>
                                </a>
                            </li>


                        </ul>


                    </li>


                    {{--                <li class="nav-item  task_nav">--}}
                    {{--                    <a href="{{Route('tasks.index')}}" class="nav-link ">--}}
                    {{--                        <i class="icon-clock"></i>--}}
                    {{--                        <span class="title">Tasks</span>--}}

                    {{--                    </a>--}}

                    {{--                </li>--}}
                    <li class="nav-item  trans_nav">
                        <a href="{{Route('user.transactions',App()->getLocale())}}" class="nav-link ">
                            <i class="fa fa-money"></i>
                            <span class="title">@lang('lang.Transfer Money')</span>

                        </a>

                    </li>

                    <li class="nav-item  goal_nav">
                        <a href="{{Route('tasks.goals',App()->getLocale())}}" class="nav-link ">
                            <i class="fa fa-soccer-ball-o"></i>
                            <span class="title">@lang('lang.my goal')</span>
                        </a>
                    </li>

                </ul>

        @endif

           <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
{{--            <div class="theme-panel hidden-xs hidden-sm">--}}
{{--                <div class="toggler"> </div>--}}
{{--                <div class="toggler-close"> </div>--}}
{{--                <div class="theme-options">--}}
{{--                    <div class="theme-option theme-colors clearfix">--}}
{{--                        <span> THEME COLOR </span>--}}
{{--                        <ul>--}}
{{--                            <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>--}}
{{--                            <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>--}}
{{--                            <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>--}}
{{--                            <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>--}}
{{--                            <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>--}}
{{--                            <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Theme Style </span>--}}
{{--                        <select class="layout-style-option form-control input-sm">--}}
{{--                            <option value="square" selected="selected">Square corners</option>--}}
{{--                            <option value="rounded">Rounded corners</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Layout </span>--}}
{{--                        <select class="layout-option form-control input-sm">--}}
{{--                            <option value="fluid" selected="selected">Fluid</option>--}}
{{--                            <option value="boxed">Boxed</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Header </span>--}}
{{--                        <select class="page-header-option form-control input-sm">--}}
{{--                            <option value="fixed" selected="selected">Fixed</option>--}}
{{--                            <option value="default">Default</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Top Menu Dropdown</span>--}}
{{--                        <select class="page-header-top-dropdown-style-option form-control input-sm">--}}
{{--                            <option value="light" selected="selected">Light</option>--}}
{{--                            <option value="dark">Dark</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Sidebar Mode</span>--}}
{{--                        <select class="sidebar-option form-control input-sm">--}}
{{--                            <option value="fixed">Fixed</option>--}}
{{--                            <option value="default" selected="selected">Default</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Sidebar Menu </span>--}}
{{--                        <select class="sidebar-menu-option form-control input-sm">--}}
{{--                            <option value="accordion" selected="selected">Accordion</option>--}}
{{--                            <option value="hover">Hover</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Sidebar Style </span>--}}
{{--                        <select class="sidebar-style-option form-control input-sm">--}}
{{--                            <option value="default" selected="selected">Default</option>--}}
{{--                            <option value="light">Light</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Sidebar Position </span>--}}
{{--                        <select class="sidebar-pos-option form-control input-sm">--}}
{{--                            <option value="left" selected="selected">Left</option>--}}
{{--                            <option value="right">Right</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="theme-option">--}}
{{--                        <span> Footer </span>--}}
{{--                        <select class="page-footer-option form-control input-sm">--}}
{{--                            <option value="fixed">Fixed</option>--}}
{{--                            <option value="default" selected="selected">Default</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                   @if(Auth()->check())
                        <li class="">
                            <a href="{{Route('admin.home',App()->getLocale())}}">@lang('lang.dashboard')</a>
                            <i class="fa fa-circle"></i>
                        </li>

                       @endif
                    @yield('header_link')
                </ul>
{{--                <div class="page-toolbar">--}}
{{--                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">--}}
{{--                        <i class="icon-calendar"></i>&nbsp;--}}
{{--                        <span class="thin uppercase hidden-xs"></span>&nbsp;--}}
{{--                        <i class="fa fa-angle-down"></i>--}}
{{--                    </div>--}}
{{--                </div>
--}}
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> @yield('inside_title')
                <small></small>
            </h3>
            @if(Auth()->check() && !Auth()->user()->isActivated())
                <div class="profile-usertitle-job alert alert-danger css_alert" style="" > @lang('lang.Your Account is not activated yet')
                    <div class="" style="display: inline-block">
                        <div class="modal fade" id="exampleModalLong_transfer_money_e" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
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


                        <button data-target="#exampleModalLong_transfer_money_e" data-toggle="modal" type="button" class="btn btn-circle red btn-sm">@lang('lang.Buy Account')</button>

                    </div>

                </div>
            @endif
            @if(Auth()->check())
                <div class="flex-ticker" style="display:none;">

                    <div class="flex-ticker__text"></div>

                </div>

                @endif

{{--            @if(Auth()->user() && Auth()->user()->completedProfileInfoPercentage() != '100 %' && Auth()->user()->id != 1 && Request()->segment(3) != 'setting')--}}

{{--                <div class="alert alert-warning">--}}
{{--                   <span>@lang('lang.You have completed') {{Auth()->user()->completedProfileInfoPercentage()}} @lang('lang.of your account info ..  please completed your data') </span>--}}
{{--                    <a  href="{{route('user.account.setting',App()->getLocale())}}" class="btn btn-danger pull-right css_complete_data_a" >--}}
{{--                        @lang('lang.complete it')--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                @endif--}}
            @yield('content')


        </div>

        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
{{--    <a href="javascript:;" class="page-quick-sidebar-toggler">--}}
{{--        <i class="icon-login"></i>--}}
{{--    </a>--}}
{{--    <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">--}}
{{--        <div class="page-quick-sidebar">--}}
{{--            <ul class="nav nav-tabs">--}}
{{--                <li class="active">--}}
{{--                    <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users--}}
{{--                        <span class="badge badge-danger">2</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts--}}
{{--                        <span class="badge badge-success">7</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="dropdown">--}}
{{--                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More--}}
{{--                        <i class="fa fa-angle-down"></i>--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu pull-right">--}}
{{--                        <li>--}}
{{--                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">--}}
{{--                                <i class="icon-bell"></i> Alerts </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">--}}
{{--                                <i class="icon-info"></i> Notifications </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">--}}
{{--                                <i class="icon-speech"></i> Activities </a>--}}
{{--                        </li>--}}
{{--                        <li class="divider"></li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">--}}
{{--                                <i class="icon-settings"></i> Settings </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="tab-content">--}}
{{--                <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">--}}
{{--                    <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">--}}
{{--                        <h3 class="list-heading">Staff</h3>--}}
{{--                        <ul class="media-list list-items">--}}
{{--                            <li class="media">--}}
{{--                                <div class="media-status">--}}
{{--                                    <span class="badge badge-success">8</span>--}}
{{--                                </div>--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Bob Nilson</h4>--}}
{{--                                    <div class="media-heading-sub"> Project Manager </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar1.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Nick Larson</h4>--}}
{{--                                    <div class="media-heading-sub"> Art Director </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <div class="media-status">--}}
{{--                                    <span class="badge badge-danger">3</span>--}}
{{--                                </div>--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar4.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Deon Hubert</h4>--}}
{{--                                    <div class="media-heading-sub"> CTO </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Ella Wong</h4>--}}
{{--                                    <div class="media-heading-sub"> CEO </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <h3 class="list-heading">Customers</h3>--}}
{{--                        <ul class="media-list list-items">--}}
{{--                            <li class="media">--}}
{{--                                <div class="media-status">--}}
{{--                                    <span class="badge badge-warning">2</span>--}}
{{--                                </div>--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar6.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Lara Kunis</h4>--}}
{{--                                    <div class="media-heading-sub"> CEO, Loop Inc </div>--}}
{{--                                    <div class="media-heading-small"> Last seen 03:10 AM </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <div class="media-status">--}}
{{--                                    <span class="label label-sm label-success">new</span>--}}
{{--                                </div>--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar7.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Ernie Kyllonen</h4>--}}
{{--                                    <div class="media-heading-sub"> Project Manager,--}}
{{--                                        <br> SmartBizz PTL </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar8.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Lisa Stone</h4>--}}
{{--                                    <div class="media-heading-sub"> CTO, Keort Inc </div>--}}
{{--                                    <div class="media-heading-small"> Last seen 13:10 PM </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <div class="media-status">--}}
{{--                                    <span class="badge badge-success">7</span>--}}
{{--                                </div>--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar9.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Deon Portalatin</h4>--}}
{{--                                    <div class="media-heading-sub"> CFO, H&D LTD </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar10.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Irina Savikova</h4>--}}
{{--                                    <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <div class="media-status">--}}
{{--                                    <span class="badge badge-danger">4</span>--}}
{{--                                </div>--}}
{{--                                <img class="media-object" src="{{asset('assets/layouts/layout/img/avatar11.jpg')}}" alt="...">--}}
{{--                                <div class="media-body">--}}
{{--                                    <h4 class="media-heading">Maria Gomez</h4>--}}
{{--                                    <div class="media-heading-sub"> Manager, Infomatic Inc </div>--}}
{{--                                    <div class="media-heading-small"> Last seen 03:10 AM </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="page-quick-sidebar-item">--}}
{{--                        <div class="page-quick-sidebar-chat-user">--}}
{{--                            <div class="page-quick-sidebar-nav">--}}
{{--                                <a href="javascript:;" class="page-quick-sidebar-back-to-list">--}}
{{--                                    <i class="icon-arrow-left"></i>Back</a>--}}
{{--                            </div>--}}
{{--                            <div class="page-quick-sidebar-chat-user-messages">--}}
{{--                                <div class="post out">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Bob Nilson</a>--}}
{{--                                        <span class="datetime">20:15</span>--}}
{{--                                        <span class="body"> When could you send me the report ? </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post in">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Ella Wong</a>--}}
{{--                                        <span class="datetime">20:15</span>--}}
{{--                                        <span class="body"> Its almost done. I will be sending it shortly </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post out">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Bob Nilson</a>--}}
{{--                                        <span class="datetime">20:15</span>--}}
{{--                                        <span class="body"> Alright. Thanks! :) </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post in">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Ella Wong</a>--}}
{{--                                        <span class="datetime">20:16</span>--}}
{{--                                        <span class="body"> You are most welcome. Sorry for the delay. </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post out">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Bob Nilson</a>--}}
{{--                                        <span class="datetime">20:17</span>--}}
{{--                                        <span class="body"> No probs. Just take your time :) </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post in">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Ella Wong</a>--}}
{{--                                        <span class="datetime">20:40</span>--}}
{{--                                        <span class="body"> Alright. I just emailed it to you. </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post out">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Bob Nilson</a>--}}
{{--                                        <span class="datetime">20:17</span>--}}
{{--                                        <span class="body"> Great! Thanks. Will check it right away. </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post in">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar2.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Ella Wong</a>--}}
{{--                                        <span class="datetime">20:40</span>--}}
{{--                                        <span class="body"> Please let me know if you have any comment. </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="post out">--}}
{{--                                    <img class="avatar" alt="" src="{{asset('assets/layouts/layout/img/avatar3.jpg')}}" />--}}
{{--                                    <div class="message">--}}
{{--                                        <span class="arrow"></span>--}}
{{--                                        <a href="javascript:;" class="name">Bob Nilson</a>--}}
{{--                                        <span class="datetime">20:17</span>--}}
{{--                                        <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="page-quick-sidebar-chat-user-form">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control" placeholder="Type a message here...">--}}
{{--                                    <div class="input-group-btn">--}}
{{--                                        <button type="button" class="btn green" >--}}
{{--                                            <i class="icon-paper-clip"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">--}}
{{--                    <div class="page-quick-sidebar-alerts-list">--}}
{{--                        <h3 class="list-heading">General</h3>--}}
{{--                        <ul class="feeds list-items">--}}
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
{{--                                                            <i class="fa fa-share"></i>--}}
{{--                                                        </span>--}}
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
{{--                                            <div class="label label-sm label-info">--}}
{{--                                                <i class="fa fa-bell-o"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="cont-col2">--}}
{{--                                            <div class="desc"> Web server hardware needs to be upgraded.--}}
{{--                                                <span class="label label-sm label-warning"> Overdue </span>--}}
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
{{--                        </ul>--}}
{{--                        <h3 class="list-heading">System</h3>--}}
{{--                        <ul class="feeds list-items">--}}
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
{{--                                                            <i class="fa fa-share"></i>--}}
{{--                                                        </span>--}}
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
{{--                </div>--}}
{{--                <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">--}}
{{--                    <div class="page-quick-sidebar-settings-list">--}}
{{--                        <h3 class="list-heading">General Settings</h3>--}}
{{--                        <ul class="list-items borderless">--}}
{{--                            <li> Enable Notifications--}}
{{--                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
{{--                            <li> Allow Tracking--}}
{{--                                <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
{{--                            <li> Log Errors--}}
{{--                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
{{--                            <li> Auto Sumbit Issues--}}
{{--                                <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
{{--                            <li> Enable SMS Alerts--}}
{{--                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
{{--                        </ul>--}}
{{--                        <h3 class="list-heading">System Settings</h3>--}}
{{--                        <ul class="list-items borderless">--}}
{{--                            <li> Security Level--}}
{{--                                <select class="form-control input-inline input-sm input-small">--}}
{{--                                    <option value="1">Normal</option>--}}
{{--                                    <option value="2" selected>Medium</option>--}}
{{--                                    <option value="e">High</option>--}}
{{--                                </select>--}}
{{--                            </li>--}}
{{--                            <li> Failed Email Attempts--}}
{{--                                <input class="form-control input-inline input-sm input-small" value="5" /> </li>--}}
{{--                            <li> Secondary SMTP Port--}}
{{--                                <input class="form-control input-inline input-sm input-small" value="3560" /> </li>--}}
{{--                            <li> Notify On System Error--}}
{{--                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
{{--                            <li> Notify On SMTP Error--}}
{{--                                <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>--}}
{{--                        </ul>--}}
{{--                        <div class="inner-content">--}}
{{--                            <button class="btn btn-success">--}}
{{--                                <i class="icon-settings"></i> Save Changes</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- END QUICK SIDEBAR -->


{{--<script>--}}
{{--    $('body').css('direction','rtl');--}}

{{--</script>--}}


</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->


<br>

<div class="page-footer">
    <div class="page-footer-inner"> 2021 @ The Tailors Dev.
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>

<![endif]-->
<script>
    @if(!Auth()->check())
    $('.page-content').unwrap();
    $('.page-header-fixed').removeAttr('class');

    @endif

</script>
<script src="{{asset('assets/new/js/news_slider/ticker.js')}}"></script>
@yield('footer')

<script>
    $('.notification_read').hover(function(){
        var base_url = $(this).attr("base_url");
        var user_id = $(this).attr("user_id");
        console.log(base_url)
        $.ajax({
            type: "POST",
            url:base_url+'/en/notifications/unread/'+user_id,
            data: {
                '_token':"{{csrf_token()}}",
                'our_id':user_id
            },
            cache: false,
            success: function(result)
            {
                $('.notification_count , .notifications_pending').html(0);
            }
        });
    });

</script>

@if(\App\Models\Setting::liveChatStatus())
    <?php
    $liveChatCode= \App\Models\Setting::where('setting_name','liveChatCode')->first()->setting_value;
    ?>


    <script>

        window.__lc = window.__lc || {};
        window.__lc.license ={{$liveChatCode}};
        ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
    </script>
    <noscript><a href="https://www.livechatinc.com/chat-with/{{$liveChatCode}}/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>


@endif


</body>

</html>
