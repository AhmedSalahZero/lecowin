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
            font-size: 17px;
            font-family: Tahoma;
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
                                   </div>

                               </div>





                        </div>


                    </div>


                </div>





            </div>


            <div class="form-actions">
                    <button class="btn blue btn-small"  style="position: absolute;right: 50%;bottom: 4.2%;">Edit</button>
            </div>
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
        $('#sub_of').on('change',function(){
            $('#icon_url_div').show();
            if ($(this).val() !== 'none')
            {
                $('#icon_url_div').hide();
            }

        })
    </script>
    {{--    <script>--}}
    {{--        $(document).on('click', '#sub_edit_setting_btn', function (e) {--}}
    {{--            e.preventDefault();--}}
    {{--            let lang = "{{App()->getLocale()}}";--}}
    {{--            let id = $(e.target).attr('setting_id');--}}
    {{--            $.ajax({--}}
    {{--                type: 'put',--}}
    {{--                url: `/admin/settings/${id}`,--}}
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
