@extends('admin.layout.index')

@section('title')
    libraries
@endsection
@section('inside_title')
     libraries
@endsection
@section('header_link')


    <li>
        <span>libraries</span>
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

@endsection

@section('content')
@include('partial.toaster')
    <div id="sample_1_filter" class="dataTables_filter"><label>Search:<input style="font-size: 17px" type="search" class="form-control input-sm input-small input-inline search_input" placeholder="" aria-controls="sample_1"></label></div>

    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bell-o"></i> All libraries </div>
            <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                    <tr>
                        <th>
                            <i class="fa fa-briefcase"></i> # </th>
                        <th>
                            <i class="fa fa-briefcase"></i> name </th>
                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> creator </th>
                        <th> Edit </th>
                        <th> Delete </th>
                    </tr>
                    </thead>
                    <tbody>
                    <div class="alert alert-success" style="display: none;text-align: center">
                        <strong>Success!</strong> The library has been deleted.
                    </div>
                   @if(count($libraries) > 0)
                       @foreach($libraries as $library)
                           <tr class="{{'delete_library_'.$library->id}} all_data">
                               <td>{{$library->id}}</td>
                               <td class="hidden-xs"> {!!  $library->name[App()->getLocale()]!!}</td>
                               <td class="hidden-xs"> {!! $library->creator->name!!} </td>


                               <td>
                                   <a href="{{Route('libraries.edit',[$library->id])}}" class="btn btn-outline btn-circle btn-sm purple">
                                       <i class="fa fa-edit"></i> Edit </a>
                               </td>
                               <td>

                                   <a class="btn btn-outline btn-circle dark btn-sm black submit_class" library_id="{{$library->id}}" >
                                          <i class="fa fa-trash-o" id="sub_fom_data"></i> Delete
                                      </a>
                               </td>
                           </tr>
                       @endforeach
                   @else

                           <tr >
                               <th colspan="6" >
                                   <div class="alert alert-info" style="text-align: center">
                                       <strong>There is no libraries until now !</strong>
                                   </div>
                               </th>
                           </tr>

                    @endif

                    <tr style="display: none ;" class="no_libraries">
                        <th colspan="6" >
                            <div class="alert alert-info" style="text-align: center">
                                <strong>There is no libraries until now !</strong>
                            </div>
                        </th>
                    </tr>



                    </tbody>


                    <tbody class="searched_data">

                    </tbody>
                </table>
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
  <script>
      $(document).ready(function(){
         $('.dataTables_filter').on('keyup',function(){
             let query = $('.search_input').val();
             if(query ==='')
             {
                 $('.all_data').show();
                 return ;
             }
              query = query.split(' ').join('%');
             console.log(query);
             let lang="{{App()->getLocale()}}";
             $.ajax({
                 type:'get',
                 url:`/${lang}/adminPanel/filterlibraries/${query}`,


                 beforeSend:function (){

                 },
                 success:function(data){
                     $('.all_data').hide();
                     $('.searched_data').empty().append(data.searchData);



                 }
             }
             )
         })
      });
  </script>
  <script>
        $(document).on('click', '.submit_class', function (e) {
            e.preventDefault();
            let id = $(e.target).attr('library_id');
            let lang = "{{App()->getLocale()}}";
            $.ajax({

                type: 'DELETE',
                data: {
                    '_token':"{{csrf_token()}}",

                },
                url: `/admin/libraries/${id}`,
                success: function (data) {
                    if(data.status === true)
                    {
                        $(`.delete_library_${data.id}`).remove();
                        // $('.alert-success').show();

                        if(data.library_count ===0)
                        {
                            $('.no_libraries').show();

                        }

                        setTimeout(function(){
                            $('.alert-success').hide();
                        },3000)
                    }
            }
            });
        });

    </script>
@endsection

