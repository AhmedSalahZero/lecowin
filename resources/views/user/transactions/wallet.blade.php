@extends('user.layout.index')


@section('title')
    account
@endsection


@section('inside_title')

    My Wallet

@endsection
@section('header_link')
    <li>
        <a href="{{Route('wallet.index')}}">wallet </a>
        <i class="fa fa-money"></i>
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
    My wallet
@endsection
@section('content')

{{--    @include('partial.toaster')--}}
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
                            <h4 class="widget-thumb-heading">Money Sent</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-red icon-layers"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">EGP</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{($currentUser->MoneySent())}}"></span>
                                </div>
                            </div>
                        </div>
                        <!-- END WIDGET THUMB -->
                    </div>

                    <div class="col-md-3">
                        <!-- BEGIN WIDGET THUMB -->
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Money Received</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                <div class="widget-thumb-body">


                                        <span class="widget-thumb-subtitle">EGP</span>

                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{$currentUser->MoneyReceived()}}">815</span>
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



                       @if($currentUser->isActivated())
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Activation Price</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-calendar"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">EGP</span>
                                        <span class="widget-thumb-body-stat"  data-counter="counterup"  data-value="{{$currentUser->activationPrice()}}"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>

                           @endif



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

@endsection
