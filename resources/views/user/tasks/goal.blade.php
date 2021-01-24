@extends('user.layout.index')

@section('title')
   @lang('lang.tasks')
@endsection
@section('inside_title')
{{--     tasks--}}
@endsection
@section('header_link')


    <li>
        <span>@lang('lang.goal')</span>
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
    <style>
        .custom_form_input
        {
            display: inline-block;
            width: 300px;
        }
        .custom_form_input:first-of-type
        {
            width: 733px;
            margin: 0 25px 0 0;
        }
    </style>
{{--    <link href="{{asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />--}}
@endsection

@section('content')
@include('partial.toaster')


<div class="row">
    <div class="col-md-12" >
        <!-- Button trigger modal -->

        <!-- Modal -->

        <div class="portlet-body " >
            <form>
                <label for="my_goal_text" > @lang('lang.my goal') : </label>
                <input id="my_goal_text" type="text" name="my_goal[text]" class="form-control custom_form_input">
                <label for="my_goal_val" >@lang('lang.expected val') : </label>
                <input id="my_goal_val" type="number" name="my_goal[val]" class="form-control custom_form_input"> EGP
            </form>
            <div class="text-center margin-top-40" >
                <h2>You Have To Get 50 NetWorkers At Level One </h2>
            </div>
        </div>
    </div>



</div>



{{--models--}}



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
<style>
    .alert, .thumbnail {
        margin-bottom: 0;
    }

</style>
  <script>
      $('li').removeClass('active');
      $('.goal_nav').addClass('active');

       $('input[id="my_goal_text"] , input[id="my_goal_val"]').change(function(){
           let assign_cost = {{\App\Models\Level_finance::where('level',1)->first()->assign_cost}} ;
           let goal_text = $('input[id="my_goal_text"]').val();
           let goal_val = $('input[id="my_goal_val"]').val();

           if(goal_text && goal_val)
           {
               $.ajax({
                   type:"post",
                   url:"/admin/myGoal/store",
                   data:{
                       "_token":"{{csrf_token()}}",
                   },
                   success:function(data){
                       console.log('good');

                   }
               })

           }


       });

  </script>


@endsection

