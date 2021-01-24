@extends('admin.layout.index')



@section('title')
         settings
@endsection
@section('header_link')
    <li>

            <span>settings</span>

    </li>
@endsection
@section('header')

    <link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
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



    <style >
        *{
            /*font-size: 17px;*/
            /*font-family: Tahoma;*/
        }
        .icon_ar:before {
            content: "\e09a";
            position: absolute;
            right: 34px;
        }
    </style>
@endsection


@section('content')
    @include('partial.toaster')
    <form enctype="multipart/form-data" action="{{route('settings.update') }}" method="post">
        @csrf
        <div class="row">

            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Website Setting </span>
                        </div>

                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                           @foreach($settings as $setting)
                                <div class="form-group">
                                    <label for="{{$setting->setting_name}}">{{$setting->setting_name}}</label>
                                    <div class="input-icon">
                                        <input style="font-size: 17px;" type="text" class="form-control"  id="{{$setting->setting_name}}" name="{{$setting->setting_name}}" value="{{$setting->setting_value}}"> </div>
                                </div>
                                @endforeach
                               <script>
                                   document.getElementById('liveChatStatus').parentElement.parentElement.remove()
                               </script>

                                   </div>

                               </div>





                        </div>


                    </div>


                </div>








            <div class="form-actions text-center">
                    <button class="btn blue btn-small"  style="margin-bottom: 10px">Save</button>
            </div>

    </form>

    <form enctype="multipart/form-data" action="{{route('costs.update') }}" method="post">
        @csrf
        <div class="row">

            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase">Levels Costs</span>
                        </div>

                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">

                                <div class="form-group">

                                    <select name="level_number" class="form-control cost_select">
                                        <option value="none"  selected> Select Level </option>
                                        <@foreach(\App\Models\Level_finance::all() as $level_finance)
                                            <option value="{{$level_finance->level}}"> {{$level_finance->level}} </option>
                                        @endforeach

                                    </select>
                                    <label for="assign_id" class="assign_label"> Assign Cost </label>
                                    <input id="assign_id" type="text" name="assign_cost" class="form-control assign_input" placeholder="Assign Cost" style="margin-bottom: 5px;margin-top: 5px">
                                    <label for="fourth_id" class="fourth_label"> Fourth Cost </label>
                                    <input id="fourth_id" type="text" name="forth_cost" class="form-control forth_input" placeholder="Forth Cost">

                                </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="form-actions text-center">
            <button class="btn blue btn-small" style="margin-bottom: 10px">Save</button>
        </div>

    </form>
    <form enctype="multipart/form-data" action="{{route('admin.control.chat') }}" method="post">
        @csrf
        <div class="row">

            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Control LiveChat </span>
                        </div>

                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">

                                <div class="form-group">
                                    <div class="input-icon">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions text-center">
            @if(\App\Models\Setting::liveChatStatus())
            <button class="btn red btn-small" value="off" type="submit" style="margin-bottom: 10px">Turn Live Chat Off </button>
                <input type="hidden" value="0" name="liveChatStatus" >
                @else
                <input type="hidden" value="1" name="liveChatStatus" >
                <button class="btn green btn-small" type="submit" value="on" style="margin-bottom: 10px">Turn Live Chat on </button>
                @endif
        </div>

    </form>


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
    <script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>

    <script>

        $('.assign_input , .forth_input,.assign_label,.fourth_label').hide();
        $('.cost_select').on('change',function(){
            let selectedOptionValue = $('.cost_select option:selected').attr('value') ;
            if(selectedOptionValue != 'none') {
                $('.assign_input , .forth_input,.assign_label,.fourth_label').show();
                $.ajax({
                    type: 'get',
                    url: "setting/get/costs/"+selectedOptionValue,
                    data: {

                    },
                    success: function (data) {
                        if(data.status===true)
                        {
                            // console.log(data.assign_cost);
                            $('.assign_input').val(data.assign_cost);
                            $('.forth_input').val(data.forth_cost);
                        }


                    }
                });

            }
            else{
                $('.assign_input , .forth_input,.assign_label,.fourth_label').hide();
                $('.assign_input').val('');
                $('.forth_input').val('');

            }


        })
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


@endsection
