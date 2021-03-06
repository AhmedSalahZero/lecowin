@extends('user.layout.index')
@section('title')
    @lang('lang.networks')
@endsection
@section('inside_title')

@endsection
@section('header_link')


    <li>
        <span>@lang('lang.My Network')</span>
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
{{--    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />--}}
    <link rel="stylesheet" href="{{asset('assets/new/css/accordion.css')}}">
    <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />


@endsection

@section('content')
    @include('partial.toaster')

   @if(Auth()->user()->rule_id != 1)
       <a href="{{Route('user.networkers.show.my.parents',App()->getLocale())}}" class="btn btn-success css_my_parents_button">
           @lang('lang.MyParents')
       </a>
       @endif
    <a href="{{Route('user.networkers.show.my.children',[App()->getLocale(),Auth()->user()->id])}}" class="btn btn-success css_my_parents_button">
        @lang('lang.my children')
    </a>

    {{--Search--}}
{{--    <div id="sample_1_filter" class="dataTables_filter"><label>Search:<input style="font-size: 17px" type="search" class="form-control input-sm input-small input-inline search_input" placeholder="" aria-controls="sample_1"></label></div>--}}
    @foreach($currentUser->levelNetWorkers() as $levelNetWork)
    <button class="accordion active">@lang('lang.level')  {{$levelNetWork['level']->level}}</button>
    <div class="panel" style="max-height:none;">
        <div class="portlet light ">
{{--            <div class="portlet-title">--}}
{{--                <div class="caption caption-md">--}}
{{--                    <i class="icon-bar-chart theme-font hide"></i>--}}
{{--                    <span class="caption-subject font-blue-madison bold uppercase">Your Activity</span>--}}
{{--                    <span class="caption-helper hide">weekly stats...</span>--}}
{{--                </div>--}}
{{--                <div class="actions">--}}
{{--                    <div class="btn-group btn-group-devided" data-toggle="buttons">--}}
{{--                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">--}}
{{--                            <input type="radio" name="options" class="toggle" id="option1">Today</label>--}}
{{--                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">--}}
{{--                            <input type="radio" name="options" class="toggle" id="option2">Week</label>--}}
{{--                        <label class="btn btn-transparent grey-salsa btn-circle btn-sm">--}}
{{--                            <input type="radio" name="options" class="toggle" id="option2">Month</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="portlet-body">
                <div class="row number-stats margin-bottom-30">
                    <div class="row widget-row">
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">@lang('lang.Basic Profit')</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green icon-bulb"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">@lang('lang.level')</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$currentUser->CountLevelProfit($levelNetWork['level'])}}">
                                            {{$currentUser->CountLevelProfit($levelNetWork['level'])}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">@lang('lang.Forth Profit')</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">@lang('lang.egp')</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$currentUser->CountLevelForthCost($levelNetWork['level'])}}">
                                            {{$currentUser->CountLevelForthCost($levelNetWork['level'])}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>

                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">@lang('lang.Total Profit')</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">@lang('lang.egp')</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$currentUser->levelTotalProfit($levelNetWork['level'])}}">
                                            {{$currentUser->levelTotalProfit($levelNetWork['level'])}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>


                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">@lang('lang.Members')</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">@lang('lang.person')</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$currentUser->CountLevelNetWorkers($levelNetWork['level'])}}">
                                            {{$currentUser->CountLevelNetWorkers($levelNetWork['level'])}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>

                    </div>

{{--                    <div class="col-md-3 col-sm-3 col-xs-3">--}}
{{--                        <div class="stat-left">--}}
{{--                            <div class="stat-chart">--}}
{{--                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->--}}
{{--                                <div id="sparkline_bar"><canvas width="90" height="45" style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas></div>--}}
{{--                            </div>--}}
{{--                            <div class="stat-number">--}}
{{--                                <div class="title"> Basic Profit </div>--}}
{{--                                <div class="number"> {{$currentUser->CountLevelProfit($levelNetWork['level'])}} </div>--}}
{{--                            </div>--}}



{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 col-sm-3 col-xs-3">--}}
{{--                        <div class="stat-left">--}}
{{--                            <div class="stat-chart">--}}
{{--                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->--}}
{{--                                <div id="sparkline_bar"><canvas width="90" height="45" style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas></div>--}}
{{--                            </div>--}}
{{--                            <div class="stat-number">--}}
{{--                                <div class="title"> Forth Profit </div>--}}
{{--                                <div class="number"> {{$currentUser->CountLevelForthCost($levelNetWork['level'])}} </div>--}}
{{--                            </div>--}}



{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 col-sm-3 col-xs-3">--}}
{{--                        <div class="stat-right">--}}
{{--                            <div class="stat-chart">--}}
{{--                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->--}}
{{--                                <div id="sparkline_bar2"><canvas width="90" height="45" style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas></div>--}}
{{--                            </div>--}}
{{--                            <div class="stat-number">--}}
{{--                                <div class="title"> Total Profit </div>--}}
{{--                                <div class="number"> {{$currentUser->levelTotalProfit($levelNetWork['level'])}} </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3 col-sm-3 col-xs-3">--}}
{{--                        <div class="stat-right">--}}
{{--                            <div class="stat-chart">--}}
{{--                                <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->--}}
{{--                                <div id="sparkline_bar2"><canvas width="90" height="45" style="display: inline-block; width: 90px; height: 45px; vertical-align: top;"></canvas></div>--}}
{{--                            </div>--}}
{{--                            <div class="stat-number">--}}
{{--                                <div class="title"> Members </div>--}}
{{--                                <div class="number"> {{$currentUser->CountLevelNetWorkers($levelNetWork['level'])}} </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="table-scrollable table-scrollable-borderless">


                    <table class="table table-hover table-light">
                        <thead>
                        <tr class="uppercase">
                            <th colspan="2"> @lang('lang.MEMBER') </th>
                            <th> @lang('lang.cost') </th>
{{--                            <th> Reason </th>--}}
                            <th> @lang('lang.level') </th>
                            <th> @lang('lang.Join At') </th>

                        </tr>
                        </thead>
                        @foreach($levelNetWork['networkers'] as $netWork)

                        <tbody>
                                <tr>
                                    <td class="fit">
                                        <img class="user-pic" src="{{asset('storage/'.$netWork->netWorker->image)}}"> </td>
                                    <td>
                                        <a href="javascript:;" class="primary-link">{{$netWork->netWorker->first_name .' '.$netWork->netWorker->last_name }}</a>
                                    </td>

                                    <td>
                                        {{$netWork->finance ? $netWork->finance->amount .' EGP' : '0'}}

                                    </td>
{{--                                    <td>{{(($netWorker->networks->where('level',$levelNetWork['level']->level)->first())->finance)->reason}}</td>--}}
                                    <td>{{$levelNetWork['level']->level}}</td>
                                    <td> {{format_date($netWork->netWorker->created_at)}} </td>
                                </tr>
                        </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    @if($currentUser->getMaxLevel() != 10)
        <button class="accordion active">@lang('lang.level') {{$currentUser->getMaxLevel() + 1 }}</button>

        <div class="panel" style="max-height:none;">
            <div class="portlet light ">

                <div class="portlet-body">

                    <div class="table-scrollable table-scrollable-borderless">


                        <table class="table table-hover table-light">


                                <tbody>
                                <tr>
                                  <h3> @lang('lang.this level is closed .. to open it you have to get
                                  4 networkers of level') {{$currentUser->getMaxLevel()}}</h3>
                                </tr>
                                </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>

    @endif

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
{{--  <script>--}}
{{--      $(document).ready(function(){--}}
{{--         $('.dataTables_filter').on('keyup',function(){--}}
{{--             let query = $('.search_input').val();--}}
{{--             if(query ==='')--}}
{{--             {--}}
{{--                 $('.all_data').show();--}}
{{--                 return ;--}}
{{--             }--}}
{{--              query = query.split(' ').join('%');--}}
{{--             console.log(query);--}}
{{--             let lang="{{App()->getLocale()}}";--}}
{{--             $.ajax({--}}
{{--                 type:'get',--}}
{{--                 url:`/${lang}/adminPanel/filterCategories/${query}`,--}}


{{--                 beforeSend:function (){--}}

{{--                 },--}}
{{--                 success:function(data){--}}
{{--                     $('.all_data').hide();--}}
{{--                     $('.searched_data').empty().append(data.searchData);--}}



{{--                 }--}}
{{--             }--}}
{{--             )--}}
{{--         })--}}
{{--      });--}}
{{--  </script>--}}
{{--  <script>--}}
{{--        $(document).on('click', '.submit_class', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            let id = $(e.target).attr('category_id');--}}
{{--            let lang = "{{App()->getLocale()}}";--}}
{{--            $.ajax({--}}
{{--                type: 'DELETE',--}}
{{--                url: `/admin/categories/${id}`,--}}
{{--                success: function (data) {--}}
{{--                    if(data.status === true)--}}
{{--                    {--}}
{{--                        $(`.delete_category_${data.id}`).remove();--}}
{{--                        $('.alert-success').show();--}}
{{--                        if(data.count_deleted_child_id >0)--}}
{{--                        {--}}
{{--                            for (let i = 0; i <= data.count_deleted_child_id; i++)--}}
{{--                                $(`.delete_category_${data.deleted_child_id[i]}`).remove();--}}
{{--                        }--}}
{{--                        if(data.category_count ===0)--}}
{{--                        {--}}
{{--                            $('.no_categories').show();--}}

{{--                        }--}}

{{--                        setTimeout(function(){--}}
{{--                            $('.alert-success').hide();--}}
{{--                        },3000)--}}
{{--                    }--}}
{{--            }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}
<script src="{{asset('assets/new/js/accordion.js')}}"></script>
  <script>
          $('li').removeClass('active');
          $('.networker_nav').addClass('active');

  </script>
  <script src="{{asset('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>


@endsection

