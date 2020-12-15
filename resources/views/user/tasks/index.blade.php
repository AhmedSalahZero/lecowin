@extends('user.layout.index')

@section('title')
   tasks
@endsection
@section('inside_title')
     tasks
@endsection
@section('header_link')


    <li>
        <span>tasks</span>
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

@endsection

@section('content')
@include('partial.toaster')




    <div id="sample_1_filter" class="dataTables_filter"><label>Search:<input style="font-size: 17px" type="search" class="form-control input-sm input-small input-inline search_input" placeholder="" aria-controls="sample_1"></label></div>

    <div class="portlet-title">

        <div class="col-md-12 col-sm-12 " style="margin-bottom:10px;margin-top: 25px">
            <div class="col-md-6 col-xs-6 ">
                <a href="{{route('get.archived.tasks')}}" type="submit" class="btn green pull-left" >
                    <i class="fa fa-book"></i> Archive
                </a>
            </div>

            <div class="modal fade " id="exampleModalLong6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">


                            <form enctype="multipart/form-data" action="{{isset($task) ?route('tasks.update',$task->id) :route('tasks.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                            </div>
                                            <div class="portlet-body form">

                                                <div class="form-body">


                                                    <div class="form-group">
                                                        <label for="name_en">Name</label>
                                                        <div class="input-icon">
                                                            <input style="font-size: 17px;" type="text" class="form-control"  id="name_en" name="name" value="{{isset($task)?$task->name['en']:old('name')}}" > </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="note">note</label>
                                                        <textarea style="font-size: 17px;" id="note" name="note" class="form-control " rows="3" >{{old('note')}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">due date</label>
                                                        <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                            <input type="text" class="form-control" readonly="" name="due_date" value="{{ old('due_date')}}">
                                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                        </div>
                                                    </div>



                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button  type="submit" class="btn btn-danger "> add </button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-6">
                <button type="submit" class="btn green pull-right"   data-toggle="modal" data-target="#exampleModalLong6" >
                    <i class="fa fa-plus"></i> Add
                </button>

            </div>
        </div>

        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
            <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
        </div>
    </div>
<div class="row">
    <div class="col-md-6" >
        <!-- Button trigger modal -->

        <!-- Modal -->

        <div class="portlet-body " >


            <div class="table-scrollable">
                <div class="col-md-7" >
                    <div  class="pull-right"  >
                        <div class="alert alert-warning pull-left" style="text-align: center;color: black;"> uncompleted Tasks  </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                    <tr>
                        <th>
                            <i class="fa fa-briefcase"></i> # </th>
                        <th>
                            <i class="fa fa-briefcase"></i> name </th>
                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> due_date </th>
                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> note </th>

                        <th> edit </th>
                        <th> delete </th>
                        <th> completed </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($user->tasks->where('status','uncompleted')->count())
                        @foreach($user->tasks()->where('status','uncompleted')->get() as $task)
                            <tr class="{{'delete_uncompleted_task_'.$task->id}} all_data">
                                <td>{{$task->id}}</td>
                                <td class="hidden-xs"> {{  $task->name}}</td>
                                <td class="hidden-xs"> {{ $task->due_date}} </td>
                                <td class="hidden-xs"> {{ $task->note}} </td>


                                <td>
                                    <a href="{{Route('tasks.edit',[$task->id])}}" class="btn btn-outline btn-circle btn-sm purple" data-toggle="modal" data-target="#exampleModalLong7{{$task->id}}">
                                        <i class="fa fa-edit"></i> Edit </a>
                                </td>
                                <div class="modal fade " id="exampleModalLong7{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form enctype="multipart/form-data" action="{{route('tasks.update',$task->id) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="portlet light bordered">
                                                                <div class="portlet-title">
                                                                </div>
                                                                <div class="portlet-body form">

                                                                    <div class="form-body">


                                                                        <div class="form-group">
                                                                            <label for="name_en">Name</label>
                                                                            <div class="input-icon">
                                                                                <input style="font-size: 17px;" type="text" class="form-control"  id="name_en" name="name" value="{{$task->name}}" > </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="note">note</label>
                                                                            <textarea style="font-size: 17px;" id="note" name="note" class="form-control " rows="3" >{{$task->note}}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-12">due date</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">


                                                                                <input type="text" class="form-control" readonly="" name="due_date" value="{{date('d-m-Y',strtotime($task->due_date))}}">
                                                                                <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                                            </div>
                                                                        </div>



                                                                    </div>


                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button  type="submit" class="btn btn-danger "> Edit </button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <td>

                                    <a class="btn btn-outline btn-circle dark btn-sm black "  data-toggle="modal" data-target="#exampleModalLong20{{$task->id}}">
                                        <i class="fa fa-trash-o" id="sub_fom_data"></i> Delete
                                    </a>
                                </td>

                                <div class="modal fade " id="exampleModalLong20{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle20{{$task->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <h5 class="modal-title" id="exampleModalLongTitle{{$task->id}}">
                                                    <div class="alert alert-danger" style="font-size: 20px">delete this note Permanently ?</div>
                                                </h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger delete_uncompleted_class"  data-dismiss="modal" data-id="{{$task->id}}">delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <td>
                                    <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong2{{$task->id}}">
                                        <i class="fa fa-thumbs-o-up" id="sub_fom_data"></i> completed
                                    </button>
                                </td>

                            </tr>

                            <div class="modal fade" id="exampleModalLong2{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            did you complete this task ?
                                            this will move it to completed tasks section
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{route('task.completed',$task->id)}}" type="button" class="btn btn-success" >Ok</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        @endforeach
                    @else

                        <tr >
                            <th colspan="7" >
                                <div class="alert alert-info" style="text-align: center">
                                    <strong>There is no uncompleted tasks until now !</strong>
                                </div>
                            </th>
                        </tr>

                    @endif

                    <tr style="display: none ;" class="no_uncompleted_tasks">
                        <th colspan="7" >
                            <div class="alert alert-info" style="text-align: center">
                                <strong>There is no uncompleted tasks until now !</strong>
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

    <div class="col-md-6">


        <div class="portlet-body">
            <div class="table-scrollable">
                <div class="col-md-7" >
                    <div  class="pull-right"  >
                        <div class="alert alert-success pull-left" style="text-align: center;color: black;"> completed Tasks  </div>
                    </div>
                </div>

                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                    <tr>
                        <th>
                            <i class="fa fa-briefcase"></i> # </th>
                        <th>
                            <i class="fa fa-briefcase"></i> name </th>
                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> due_date </th>
                        <th class="hidden-xs">
                            <i class="fa fa-sticky-note"></i> note </th>
                        <th> archive </th>
                        <th> Delete </th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--                    <div class="alert alert-success" style="display: none;text-align: center">--}}
                    {{--                        <strong>Success!</strong> The task has been deleted.--}}
                    {{--                    </div>--}}
                    @if(($user->tasks->where('status','completed')->count()))
                        @foreach($user->tasks()->where('status','completed')->get() as $task)
                            <tr class="{{'delete_completed_task_'.$task->id}} all_data">
                                <td>{{$task->id}}</td>
                                <td class="hidden-xs"> {{  $task->name}}</td>
                                <td class="hidden-xs"> {{ $task->due_date}} </td>
                                <td class="hidden-xs"> {{ $task->note}} </td>

                                <td>
                                    <a  class="btn btn-outline btn-circle btn-sm purple"  data-toggle="modal" data-target="#exampleModalLong4{{$task->id}}">
                                        <i class="fa fa-book"></i> archive </a>
                                </td>
                                <td>
                                    <a class="btn btn-outline btn-circle dark btn-sm black submit_class" data-toggle="modal" data-target="#exampleModalLong3{{$task->id}}" >
                                        <i class="fa fa-trash-o" id="sub_fom_data"></i> Delete
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade " id="exampleModalLong3{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <h5 class="modal-title" id="exampleModalLongTitle{{$task->id}}">
                                                <div class="alert alert-danger" style="font-size: 20px">delete this note Permanently ?</div>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger delete_completed_class"  data-dismiss="modal" data-id="{{$task->id}}">delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade " id="exampleModalLong4{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <h5 class="modal-title" id="exampleModalLongTitle{{$task->id}}">
                                                <div class="alert alert-success" style="font-size: 20px;color:black">Send to archive ?</div>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="{{route('task.archive',$task->id)}}" type="button" class="btn btn-danger "   >send</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                    @else

                        <tr >
                            <th colspan="6" >
                                <div class="alert alert-info" style="text-align: center">
                                    <strong>There is no completed task until now !</strong>
                                </div>
                            </th>
                        </tr>

                    @endif

                    <tr style="display: none ;" class="no_completed_tasks">
                        <th colspan="6" >
                            <div class="alert alert-info" style="text-align: center">
                                <strong>There is no completed task until now !</strong>
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
             {{--let lang="{{App()->getLocale()}}";--}}
             $.ajax({
                 type:'get',
                 url:`/${lang}/adminPanel/filterusers/${query}`,
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
        $(document).on('click', '.delete_uncompleted_class', function (e) {
            e.preventDefault();
            let id = $(e.target).data('id');
           // let lang = "{{App()->getLocale()}}";
            $.ajax({

                type: 'DELETE',
                data: {
                    '_token':"{{csrf_token()}}",

                },
                url: `/tasks/${id}`,
                success: function (data) {
                    if(data.status === true)
                    {
                        $(`.delete_uncompleted_task_${data.id}`).remove();
                        // $('.alert-success').show();

                        if(data.uncompleted_tasks_count ===0)
                        {
                            $('.no_uncompleted_tasks').show();

                        }

                    }
            }
            });
        });
        $(document).on('click', '.delete_completed_class', function (e) {
            e.preventDefault();
            let id = $(e.target).data('id');
             {{--  let lang = "{{App()->getLocale()}}";  --}}
            $.ajax({

                type: 'DELETE',
                data: {
                    '_token':"{{csrf_token()}}",

                },
                url: `/tasks/${id}`,
                success: function (data) {
                    if(data.status === true)
                    {
                        $(`.delete_completed_task_${data.id}`).remove();
                        // $('.alert-success').show();

                        if(data.completed_tasks_count ===0)
                        {
                            $('.no_completed_tasks').show();

                        }

                    }
                }
            });
        });

    </script>
  <script>
      $('li').removeClass('active');
      $('.task_nav').addClass('active');

  </script>

@endsection

