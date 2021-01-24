@extends('user.layout.index')
@section('title')
    @lang('lang.MyParents')
@endsection
@section('inside_title')

@endsection
@section('header_link')


    <li>
        <span>@lang('lang.MyParents')</span>
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

    <link rel="stylesheet" href="{{asset('css/main.css')}}">

@endsection

@section('content')
    @include('partial.toaster')
    {{--Search--}}
    {{--    <div id="sample_1_filter" class="dataTables_filter"><label>Search:<input style="font-size: 17px" type="search" class="form-control input-sm input-small input-inline search_input" placeholder="" aria-controls="sample_1"></label></div>--}}



        <div class="panel" style="max-height:none;">
            <div class="portlet light ">
                <div class="portlet-body">
                    <div class="row number-stats ">
                        <div class="row widget-row text-center">

                            <?php $a=1; ?>
                            @foreach($myParents as $parent)


                                <div class="col-md-6 blockItem"  >
                                    <div class=" widget-bg-color-white text-uppercase margin-bottom-20 bordered" >

                                            <div class="col-md-6 networkItem"  >
                                                <div class="itemNumber">{{ $a }}</div>
                                                <?php $a++; ?>
                                                <div class="networkerPhoto" style='background-image: url("{{asset('storage/'.$parent->image)}}");'></div>
                                                <div class="widget-thumb-body">

                                        <span class="widget-thumb-body-stat "  >
                                            {{$parent->first_name . ' ' .$parent->last_name}}

                                        </span>
                                                </div>
                                            </div>

                                    </div>
                                </div>


                        @endforeach


                        <!-- END WIDGET THUMB -->




                        </div>
                    </div>

                </div>
            </div>
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
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('.dataTables_filter').on('keyup',function(){--}}
{{--                let query = $('.search_input').val();--}}
{{--                if(query ==='')--}}
{{--                {--}}
{{--                    $('.all_data').show();--}}
{{--                    return ;--}}
{{--                }--}}
{{--                query = query.split(' ').join('%');--}}
{{--                console.log(query);--}}
{{--                let lang="{{App()->getLocale()}}";--}}
{{--                $.ajax({--}}
{{--                        type:'get',--}}
{{--                        url:`/${lang}/adminPanel/filterCategories/${query}`,--}}


{{--                        beforeSend:function (){--}}

{{--                        },--}}
{{--                        success:function(data){--}}
{{--                            $('.all_data').hide();--}}
{{--                            $('.searched_data').empty().append(data.searchData);--}}
{{--                        }--}}
{{--                    }--}}
{{--                )--}}
{{--            })--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
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
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}
    <script src="{{asset('assets/new/js/accordion.js')}}"></script>
    <script>
        $('li').removeClass('active');
        $('.networker_fourth_nav').addClass('active');

    </script>
    <script src="{{asset('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
@endsection

