@extends('user.layout.index')

@section('title')
    @lang('lang.tasks')
@endsection
@section('inside_title')
{{--    tasks--}}
@endsection
@section('header_link')


    <li>
        <span>@lang('lang.tasks')</span>
    </li>
@endsection

@section('header')

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
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
    <link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/mobiscroll.javascript.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/mobiscroll.javascript.min.js')}}"></script>


@endsection

@section('content')
    @include('partial.toaster')




    {{--    <div id="sample_1_filter" class="dataTables_filter"><label>Search:<input style="font-size: 17px" type="search" class="form-control input-sm input-small input-inline search_input" placeholder="" aria-controls="sample_1"></label></div>--}}

    <div class="portlet-title">

{{--        <iframe class="css_ifram" src="https://calendar.google.com/calendar/embed?src=ahmed_mu83%40yahoo.com&ctz=Africa%2FCairo" style="border: 0"  height="600" frameborder="0" scrolling="no"></iframe>--}}
<div class="css_content_calendar_img_at_center">
   <a href="{{route('tasks.index',App()->getLocale())}}">
       <img src="{{asset('assets/new/img/calendar.png')}}">
   </a>
{{--    <a href="javascript:void(0)" class="submit_calendar" >--}}
{{--        <img onclick="xyzx()" src="{{asset('assets/new/img/calendar.png')}}" data-base_url="{{url('/')}}" data-current_language="{{App()->getLocale()}}">--}}
{{--    </a>--}}

</div>

        {{--        <div id="demo-google-cal"></div>--}}

    </div>
    {{--<iframe src="https://calendar.google.com/calendar/embed?src=ahmed_mu83%40yahoo.com&ctz=Africa%2FCairo" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>--}}
    <div class="tools">
        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
        <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
        <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
    </div>


@endsection


@section('footer')
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
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>



{{--    <style>--}}
{{--        .alert, .thumbnail {--}}
{{--            margin-bottom: 0;--}}
{{--        }--}}

{{--    </style>--}}

{{--    <script>--}}
{{--        mobiscroll.setOptions({--}}
{{--            theme: 'ios',--}}
{{--            themeVariant: 'light',--}}
{{--            dragToCreate: true,--}}
{{--            dragToMove: true,--}}
{{--            dragToResize: true--}}
{{--        });--}}


{{--        // Load the Google API Client--}}
{{--        window.onGoogleLoad = function () {--}}
{{--            window.gapi.load('client', initClient);--}}
{{--        }--}}

{{--        // Load the SDK asynchronously--}}
{{--        function loadGoogleSDK() {--}}
{{--            (function (d, s, id) {--}}
{{--                var js, fjs = d.getElementsByTagName(s)[0];--}}
{{--                if (d.getElementById(id)) {--}}
{{--                    onGoogleLoad();--}}
{{--                    return;--}}
{{--                }--}}
{{--                js = d.createElement(s);--}}
{{--                js.id = id;--}}
{{--                js.src = "https://apis.google.com/js/api.js?onload=onGoogleLoad";--}}
{{--                js.onload = "onGoogleLoad";--}}
{{--                fjs.parentNode.insertBefore(js, fjs);--}}
{{--            }(document, 'script', 'google-jssdk'));--}}
{{--        };--}}

{{--        // Init the Google API client--}}
{{--        function initClient() {--}}
{{--            window.gapi.client.init({--}}
{{--                apiKey: API_KEY,--}}
{{--                clientId: CLIENT_ID,--}}
{{--                discoveryDocs: DISCOVERY_DOCS,--}}
{{--                scope: SCOPES--}}
{{--            }).then(function () {--}}
{{--                calApiLoaded = true;--}}
{{--                loadEvents(firstDay, lastDay);--}}
{{--            });--}}
{{--        }--}}

{{--        // Load events from Google Calendar between 2 dates--}}
{{--        function loadEvents(firstDay, lastDay) {--}}
{{--            // Only load events if the Google API finished loading--}}
{{--            if (calApiLoaded) {--}}
{{--                window.gapi.client.calendar.events.list({--}}
{{--                    'calendarId': CALENDAR_ID,--}}
{{--                    'timeMin': firstDay.toISOString(),--}}
{{--                    'timeMax': lastDay.toISOString(),--}}
{{--                    'showDeleted': false,--}}
{{--                    'singleEvents': true,--}}
{{--                    'maxResults': 100,--}}
{{--                    'orderBy': 'startTime'--}}
{{--                }).then(function (response) {--}}
{{--                    var event;--}}
{{--                    var events = response.result.items;--}}
{{--                    var eventList = [];--}}
{{--                    // Process event list--}}
{{--                    for (var i = 0; i < events.length; ++i) {--}}
{{--                        event = events[i];--}}
{{--                        eventList.push({--}}
{{--                            start: new Date(event.start.date || event.start.dateTime),--}}
{{--                            end: new Date(event.end.date || event.end.dateTime),--}}
{{--                            title: event.summary || 'No Title'--}}
{{--                        });--}}
{{--                    }--}}
{{--                    calInst.setEvents(eventList);--}}
{{--                });--}}
{{--            }--}}
{{--        }--}}
{{--        var API_KEY = 'AIzaSyCGb6izaYqzdkORx63q-BaHCWFqhzqnKAw';--}}
{{--        var CLIENT_ID = '108098505040-lk65n7fumjiv6m1s5n49aedrmghrqc07.apps.googleusercontent.com';--}}
{{--        var CALENDAR_ID = 'ahmed_mu83@yahoo.com';--}}
{{--        var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];--}}
{{--        var SCOPES = "https://www.googleapis.com/auth/calendar";--}}
{{--        var calApiLoaded;--}}
{{--        var firstDay;--}}
{{--        var lastDay;--}}

{{--        var calInst = mobiscroll.eventcalendar('#demo-google-cal', {--}}
{{--            view: {--}}
{{--                calendar: {--}}
{{--                    labels: true--}}
{{--                }--}}
{{--            },--}}
{{--            data: [],--}}
{{--            onPageLoading: function (event) {--}}
{{--                var year = event.firstDay.getFullYear(),--}}
{{--                    month = event.firstDay.getMonth();--}}

{{--                // Calculate dates--}}
{{--                // (pre-load events for previous and next months as well)--}}
{{--                firstDay = new Date(year, month - 1, -7);--}}
{{--                lastDay = new Date(year, month + 2, 14);--}}

{{--                loadEvents(firstDay, lastDay);--}}
{{--            }--}}
{{--        });--}}

{{--        // Load the Google SDK--}}
{{--        loadGoogleSDK();--}}


{{--    </script>--}}




    <script>
        $('li').removeClass('active');
        $('.task_nav').addClass('active');

    </script>
@endsection

