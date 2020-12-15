@extends('admin.layout.index')



@section('title')
    @if(isset($library))
        Edit library
    @else
        Create library
    @endif


@endsection


@section('inside_title')
  @if(isset($library))
      Edit library
  @else
      Create library
    @endif
@endsection
@section('header_link')
    <li>
        <a href="{{Route('libraries.index',App()->getLocale())}}">libraries</a>
        <i class="fa fa-circle"></i>
    </li>

    <li>
        @if(isset($library))
            <span>Edit library</span>
        @else
            <span>Create library</span>
        @endif
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


    <div class="alert alert-danger" style="display: none;text-align: center">
        <strong id="fail_message_id">  </strong>
    </div>

    <div class="alert alert-success updated_success" style="display: none;text-align: center">
        <strong>Success! The library has been Updated successfully.</strong>
    </div>

@include('partial.toaster')
    <form enctype="multipart/form-data" action="{{isset($library) ?route('libraries.update',$library->id) :route('libraries.store') }}" method="post">
        @csrf

        @if(isset($library))

        @method('put')

        @endif



        <div class="row">

    <div class="col-md-6">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-red-sunglo">
                    <i class="icon-settings font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase"> English Info </span>
                </div>

            </div>
            <div class="portlet-body form">

                <div class="form-body">


                    <div class="form-group">
                        <label for="name_en">Name</label>
                        <div class="input-icon">
                            <input style="font-size: 17px;" type="text" class="form-control"  id="name_en" name="name[en]" value="{{isset($library)?$library->name['en']:old('name.en')}}"> </div>
                    </div>
                    <div class="form-group">
                        <label for="description_en">brief description</label>
                        <textarea style="font-size: 17px;" id="description_en" name="description[en]" class="form-control ckeditor" rows="3">{{isset($library)?$library->description['en']:old('description.en')}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group input-small">
                                <div class="form-control uneditable-input input-fixed input-small" data-trigger="fileinput">
                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                    <span class="fileinput-filename"> </span>
                                </div>

                                <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new">Pdf </span>
                                                                <span class="fileinput-exists"> Change </span>
                                                                <input type="file" name="pdf" > </span>
                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                    </div>


                </div>


            </div>


        </div>





    </div>


    <div class="col-md-6">
        <div class="portlet light bordered" >
            <div class="portlet-title" style="direction: rtl">
                <div class="caption font-red-sunglo" >
                    <i class="icon-settings icon_ar font-red-sunglo"></i>
                    <span class="caption-subject bold uppercase" style="position: absolute;right: 52px;"> البيانات باللغه العربيه </span>
                </div>

            </div>
            <div class="portlet-body form">

                <div class="form-body">




                    <div class="form-group" style="direction: rtl" >
                        <label for="name[ar]" >الاسم</label>
                        <div class="input-icon input-icon-lg right">
                            <input value="{{(isset($library)?$library->name['ar']:old('name.ar'))}}" name="name[ar]" id="name[ar]" style="direction: rtl;font-size: 17px;" type="text" class="form-control input-lg" > </div>
                    </div>

                    <div class="form-group" style="direction: rtl">
                        <label for="description_ar">الوصف</label>
                        <textarea  style="direction: rtl ;font-size: 17px;" id="description_ar" name="description[ar]" class="form-control ckeditor" rows="3">{{isset($library)?$library->description['ar']:old('description.ar')}}</textarea>
                    </div>

                    @include('partial.image')


                </div>
            </div>


        </div>

    </div>






    <div class="form-actions">
        @if(isset($library))
            <button class="btn blue btn-small" library_id="{{$library->id}}" id="sub_edit_library_btn" style="position: absolute;right: 50%;bottom: 4.2%;">Edit</button>

        @else
            <button class="btn blue btn-small"  id="sub_create_library_btn" style="position: absolute;right: 50%;bottom: 4.2%;">Add</button>

        @endif
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
{{--        $(document).on('click', '#sub_edit_library_btn', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            let lang = "{{App()->getLocale()}}";--}}
{{--            let id = $(e.target).attr('library_id');--}}
{{--            $.ajax({--}}
{{--                type: 'put',--}}
{{--                url: `/admin/libraries/${id}`,--}}
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
