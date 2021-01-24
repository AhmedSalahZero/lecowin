@extends('user.layout.index')

@section('title')
   @lang('lang.tasks')
@endsection
@section('inside_title')
{{--     tasks--}}
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
@endsection

@section('content')
@include('partial.toaster')

{{--    <div id="sample_1_filter" class="dataTables_filter"><label>Search:<input style="font-size: 17px" type="search" class="form-control input-sm input-small input-inline search_input" placeholder="" aria-controls="sample_1"></label></div>--}}

    <div class="portlet-title">

{{--        <iframe src="https://trello.com/c/OKVduwHL.html" frameBorder="0" width="340" height="220"></iframe>--}}


            <div class="col-md-6 col-xs-6 ">

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


                            <form enctype="multipart/form-data" action="{{isset($task) ?route('tasks.update',[App()->getLocale(),$task->id]) :route('tasks.store',App()->getLocale()) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                            </div>
                                            <div class="portlet-body form">

                                                <div class="form-body">


                                                    <div class="form-group">
                                                        <label for="name_en">@lang('lang.name')</label>
                                                        <div class="input-icon">
                                                            <input style="font-size: 17px;" type="text" class="form-control"  id="name_en" name="name" value="{{isset($task)?$task->name['en']:old('name')}}" > </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="note">@lang('lang.note')</label>
                                                        <textarea style="font-size: 17px;" id="note" name="note" class="form-control " rows="3" >{{old('note')}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-12">@lang('lang.due_date')</label>
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                    <button  type="submit" class="btn btn-danger "> @lang('lang.add') </button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-6 ">


                <button  type="submit" style="margin-left: 5px;" class="btn green pull-right"   data-toggle="modal" data-target="#exampleModalLong6" >
                    <i class="fa fa-plus"></i> @lang('lang.add')
                </button>
                <a href="{{route('get.archived.tasks',App()->getLocale())}}" type="submit" class="btn green pull-right">
                    <i class="fa fa-book"></i> @lang('lang.Archive')
                </a>

            </div>
        </div>
{{--<iframe src="https://calendar.google.com/calendar/embed?src=ahmed_mu83%40yahoo.com&ctz=Africa%2FCairo" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>--}}
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
            <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
            <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
        </div>

<div class="row">
    <div class="col-md-12" >
        <!-- Button trigger modal -->

        <!-- Modal -->

        <div class="portlet-body " >


            <div class="table-scrollable" >
                        <div class="alert alert-warning " style="text-align: center;color:white;background-color: #2B3643">@lang('lang.To do list') </div>
                <table class="table table-striped table-bordered table-advance table-hover">
                    <thead >
                    <tr style="text-align: center">
                        <th ></th>
                        <th>
                           </th>
                        <th style="text-align: center">  #
                        </th>
                        <th >
                         </th>

{{--                        <th> @lang('lang.edit') </th>--}}
                        <th>  </th>
                        <th> </th>



                        <th>
                           </th>
                        <th style="text-align: center">
                          @lang('lang.name') </th>
                        <th >
                           </th>
                        <th >
                          </th>

                        {{--                        <th> @lang('lang.edit') </th>--}}
                        <th style="text-align: center"> @lang('lang.status') </th>





                        <th style="text-align: center">
                            <i class="fa fa-user"></i> @lang('lang.due_date')</th>

                        <th class="hidden-xs" style="text-align: center">
                            <i class="fa fa-user"></i> @lang('lang.note') </th>

                        <th style="text-align: center"> @lang('lang.edit') </th>
{{--                        <th style="text-align: center"> @lang('lang.delete') </th>--}}
                        <th style="text-align: center"> @lang('lang.completed') </th>


                    </tr>

                    </thead>
                    <tbody style="text-align: center">
                    @if($user->tasks->where('status','uncompleted')->count())
                        @foreach($user->tasks()->where('status','uncompleted')->get() as $task)
                            <tr class="{{'delete_uncompleted_task_'.$task->id}} all_data text-center">
                                <td  colspan="5">{{$task->id}}</td>
                                <td colspan="5" class="hidden-xs"> {{  $task->name}}</td>
                                <td  class="hidden-xs">
                                    @lang('lang.calls')
                                <br>
                                    <hr>
                                    @lang('lang.meeting')
                                    <br>
                                    <hr>
                                    @lang('lang.following')
                                    <br>
                                    <hr>
                                    @lang('lang.registration')
                                    <br>
                                    <hr>
                                    @lang('lang.training')
                                    <br>
                                    <hr>
                                </td>

                                <td  class="hidden-xs" >
                                    <span data-task-id="{{$task->id}}" data-due="0">{{explode('#',$task->due_date)[0]}}</span>
                                    <br>
                                    <hr>
                                    <span data-task-id="{{$task->id}}" data-due="1">{{explode('#',$task->due_date)[1]}}</span>
                                    <br>
                                    <hr>
                                    <span data-task-id="{{$task->id}}" data-due="2">{{explode('#',$task->due_date)[2]}}</span>
                                    <br>
                                    <hr>
                                    <span data-task-id="{{$task->id}}" data-due="3">{{explode('#',$task->due_date)[3]}}</span>
                                    <br>
                                    <hr>
                                    <span data-task-id="{{$task->id}}" data-due="4">{{explode('#',$task->due_date)[4]}}</span>
                                    <br>
                                    <hr>

                                </td>
                                <td class="hidden-xs">
                                    <span data-task-id="{{$task->id}}" data-note="0">{{explode('#',$task->note)[0]}}</span>
                                    <br> <hr>
                                    <span data-task-id="{{$task->id}}" data-note="1">{{explode('#',$task->note)[1]}}</span>
                                    <br> <hr>
                                    <span data-task-id="{{$task->id}}" data-note="2">{{explode('#',$task->note)[2]}}</span>
                                    <br> <hr>
                                    <span data-task-id="{{$task->id}}" data-note="3">{{explode('#',$task->note)[3]}}</span>
                                    <br> <hr>
                                    <span data-task-id="{{$task->id}}" data-note="4">{{explode('#',$task->note)[4]}}</span>
                                    <br> <hr>
                                </td>
                                <td>
                                    <a  href="{{Route('tasks.edit',[App()->getLocale(),$task->id])}}" class="btn btn-outline btn-circle btn-sm purple" data-toggle="modal" data-target="#exampleModalLong_task{{$task->id}}_0">
                                        <i class="fa fa-edit"></i> @lang('lang.edit') </a>
                                   <br> <hr>
                                    <a href="{{Route('tasks.edit',[App()->getLocale(),$task->id])}}" class="btn btn-outline btn-circle btn-sm purple" data-toggle="modal" data-target="#exampleModalLong_task{{$task->id}}_1">
                                        <i class="fa fa-edit"></i> @lang('lang.edit') </a>
                                    <br> <hr>
                                    <a href="{{Route('tasks.edit',[App()->getLocale(),$task->id])}}" class="btn btn-outline btn-circle btn-sm purple" data-toggle="modal" data-target="#exampleModalLong_task{{$task->id}}_2">
                                        <i class="fa fa-edit"></i> @lang('lang.edit') </a>
                                    <br> <hr>
                                    <a href="{{Route('tasks.edit',[App()->getLocale(),$task->id])}}" class="btn btn-outline btn-circle btn-sm purple" data-toggle="modal" data-target="#exampleModalLong_task{{$task->id}}_3">
                                        <i class="fa fa-edit"></i> @lang('lang.edit') </a>
                                    <br> <hr>
                                    <a href="{{Route('tasks.edit',[App()->getLocale(),$task->id])}}" class="btn btn-outline btn-circle btn-sm purple" data-toggle="modal" data-target="#exampleModalLong_task{{$task->id}}_4">
                                        <i class="fa fa-edit"></i> @lang('lang.edit') </a>
                                    <br> <hr>

                                </td>
                                <div class="modal fade " id="exampleModalLong_task{{$task->id}}_0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form >
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
                                                                            <label for="name_en">@lang('lang.edit')</label>
                                                                            <div class="input-icon">
                                                                                <input style="font-size: 17px;" type="text" class="form-control name_task{{$task->id}}_segment_0"  id="name_en" name="name" value="{{$task->name}}" > </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="note">@lang('lang.note')</label>
                                                                            <textarea style="font-size: 17px;" id="note" name="note" class="form-control note_task{{$task->id}}_segment_0" rows="3" >{{explode('#',$task->note)[0]}}</textarea>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-12">@lang('lang.due_date')</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                                                <input type="text" class="form-control due_task{{$task->id}}_segment_0" readonly="" name="due_date" value="{{date('d-m-Y',strtotime(explode('#',$task->due_date)[0]))}}">
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
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                                        <button data-task-id="{{$task->id}}" data-note="0" class="btn btn-danger edit_task_btn"> @lang('lang.edit') </button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade " id="exampleModalLong_task{{$task->id}}_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form >
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
                                                                            <label for="name_en">@lang('lang.edit')</label>
                                                                            <div class="input-icon">
                                                                                <input style="font-size: 17px;" type="text" class="form-control name_task{{$task->id}}_segment_1"  id="name_en" name="name" value="{{$task->name}}" > </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="note">@lang('lang.note')</label>
                                                                            <textarea style="font-size: 17px;" id="note" name="note" class="form-control note_task{{$task->id}}_segment_1" rows="3" >{{explode('#',$task->note)[1]}}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-12">@lang('lang.due_date')</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                                                <input type="text" class="form-control due_task{{$task->id}}_segment_1" readonly="" name="due_date" value="{{date('d-m-Y',strtotime(explode('#',$task->due_date)[1]))}}">
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
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                                        <button data-task-id="{{$task->id}}" data-note="1" type="submit" class="btn btn-danger edit_task_btn "> @lang('lang.edit') </button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade " id="exampleModalLong_task{{$task->id}}_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form >
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
                                                                            <label for="name_en">@lang('lang.edit')</label>
                                                                            <div class="input-icon">
                                                                                <input style="font-size: 17px;" type="text" class="form-control name_task{{$task->id}}_segment_2"  id="name_en" name="name" value="{{$task->name}}" > </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="note">@lang('lang.note')</label>
                                                                            <textarea style="font-size: 17px;" id="note" name="note" class="form-control note_task{{$task->id}}_segment_2" rows="3" >{{explode('#',$task->note)[2]}}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-12">@lang('lang.due_date')</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                                                <input type="text" class="form-control due_task{{$task->id}}_segment_2" readonly="" name="due_date" value="{{date('d-m-Y',strtotime(explode('#',$task->due_date)[2]))}}">
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
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                                        <button data-task-id="{{$task->id}}" data-note="2" type="submit" class="btn btn-danger edit_task_btn"> @lang('lang.edit') </button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade " id="exampleModalLong_task{{$task->id}}_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form >

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="portlet light bordered">
                                                                <div class="portlet-title">
                                                                </div>
                                                                <div class="portlet-body form">

                                                                    <div class="form-body">


                                                                        <div class="form-group">
                                                                            <label for="name_en">@lang('lang.edit')</label>
                                                                            <div class="input-icon">
                                                                                <input style="font-size: 17px;" type="text" class="form-control name_task{{$task->id}}_segment_3"  id="name_en" name="name" value="{{$task->name}}" > </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="note">@lang('lang.note')</label>
                                                                            <textarea style="font-size: 17px;" id="note" name="note" class="form-control note_task{{$task->id}}_segment_3" rows="3" >{{explode('#',$task->note)[3]}}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-12">@lang('lang.due_date')</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                                                <input type="text" class="form-control due_task{{$task->id}}_segment_3" readonly="" name="due_date" value="{{date('d-m-Y',strtotime(explode('#',$task->due_date)[3]))}}">
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
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                                        <button data-task-id="{{$task->id}}" data-note="3"  type="submit" class="btn btn-danger edit_task_btn"> @lang('lang.edit') </button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade " id="exampleModalLong_task{{$task->id}}_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form >
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
                                                                            <label for="name_en">@lang('lang.edit')</label>
                                                                            <div class="input-icon">
                                                                                <input style="font-size: 17px;" type="text" class="form-control name_task{{$task->id}}_segment_4"  id="name_en" name="name" value="{{$task->name}}" > </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="note">@lang('lang.note')</label>
                                                                            <textarea style="font-size: 17px;" id="note" name="note" class="form-control note_task{{$task->id}}_segment_4" rows="3" >{{explode('#',$task->note)[4]}}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-12">@lang('lang.due_date')</label>
                                                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                                                <input type="text" class="form-control due_task{{$task->id}}_segment_4" readonly="" name="due_date" value="{{date('d-m-Y',strtotime(explode('#',$task->due_date)[4]))}}">
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
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                                        <button data-task-id="{{$task->id}}" data-note="4" type="submit" class="btn btn-danger edit_task_btn"> @lang('lang.edit') </button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

{{--                                <td>--}}
{{--                                    <a class="btn btn-outline btn-circle dark btn-sm black "  data-toggle="modal" data-target="#exampleModalLong20{{$task->id}}">--}}
{{--                                        <i class="fa fa-trash-o" id="sub_fom_data"></i> @lang('lang.delete')--}}
{{--                                    </a>--}}
{{--                                    <br>--}}
{{--                                    <hr>--}}
{{--                                    <a class="btn btn-outline btn-circle dark btn-sm black "  data-toggle="modal" data-target="#exampleModalLong20{{$task->id}}">--}}
{{--                                        <i class="fa fa-trash-o" id="sub_fom_data"></i> @lang('lang.delete')--}}
{{--                                    </a>--}}
{{--                                    <br>--}}
{{--                                    <hr>--}}
{{--                                    <a class="btn btn-outline btn-circle dark btn-sm black "  data-toggle="modal" data-target="#exampleModalLong20{{$task->id}}">--}}
{{--                                        <i class="fa fa-trash-o" id="sub_fom_data"></i> @lang('lang.delete')--}}
{{--                                    </a>--}}
{{--                                    <br>--}}
{{--                                    <hr>--}}
{{--                                    <a class="btn btn-outline btn-circle dark btn-sm black "  data-toggle="modal" data-target="#exampleModalLong20{{$task->id}}">--}}
{{--                                        <i class="fa fa-trash-o" id="sub_fom_data"></i> @lang('lang.delete')--}}
{{--                                    </a>--}}
{{--                                    <br>--}}
{{--                                    <hr>--}}
{{--                                    <a class="btn btn-outline btn-circle dark btn-sm black "  data-toggle="modal" data-target="#exampleModalLong20{{$task->id}}">--}}
{{--                                        <i class="fa fa-trash-o" id="sub_fom_data"></i> @lang('lang.delete')--}}
{{--                                    </a>--}}
{{--                                    <br>--}}
{{--                                    <hr>--}}

{{--                                </td>--}}

{{--                                <div class="modal fade " id="exampleModalLong20{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle20{{$task->id}}" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}

{{--                                                <h5 class="modal-title" id="exampleModalLongTitle{{$task->id}}">--}}
{{--                                                    <div class="alert alert-danger" style="font-size: 20px">@lang('lang.delete this note Permanently ?')</div>--}}
{{--                                                </h5>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-footer">--}}
{{--                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>--}}
{{--                                                <button type="button" class="btn btn-danger delete_uncompleted_class"  data-dismiss="modal" data-id="{{$task->id}}">@lang('lang.delete')</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <td>

                                    <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong2{{$task->id}}">
                                        <i class="fa fa-thumbs-o-up" id="sub_fom_data"></i> @lang('lang.completed')
                                    </button>
                                    <br>
                                    <hr>
                                    <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong2{{$task->id}}">
                                        <i class="fa fa-thumbs-o-up" id="sub_fom_data"></i> @lang('lang.completed')
                                    </button>
                                    <br>
                                    <hr>
                                    <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong2{{$task->id}}">
                                        <i class="fa fa-thumbs-o-up" id="sub_fom_data"></i> @lang('lang.completed')
                                    </button>
                                    <br>
                                    <hr>
                                    <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong2{{$task->id}}">
                                        <i class="fa fa-thumbs-o-up" id="sub_fom_data"></i> @lang('lang.completed')
                                    </button>
                                    <br>
                                    <hr>
                                    <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong2{{$task->id}}">
                                        <i class="fa fa-thumbs-o-up" id="sub_fom_data"></i> @lang('lang.completed')
                                    </button>
                                    <br>
                                    <hr>
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
                                            @lang('lang.did you complete this task ?
                                            this will move it to completed tasks section')
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                            <a href="{{route('task.completed',[App()->getLocale(),$task->id])}}" type="button" class="btn btn-success" >@lang('lang.Ok')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        @endforeach
                    @else

                        <tr >
                            <th colspan="7" >
                                <div class="alert alert-info" style="text-align: center">
                                    <strong>@lang('lang.There is no uncompleted tasks until now !')</strong>
                                </div>
                            </th>
                        </tr>

                    @endif

                    <tr style="display: none ;" class="no_uncompleted_tasks">
                        <th colspan="7" >
                            <div class="alert alert-info" style="text-align: center">
                                <strong>@lang('lang.There is no uncompleted tasks until now !')</strong>
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
    <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('lang.you have to insert all fields');
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>

                </div>
            </div>
        </div>
    </div>


    {{-- Completed task section  --}}
{{--    <div class="col-md-6">--}}


{{--        <div class="portlet-body">--}}
{{--            <div class="table-scrollable">--}}
{{--                        <div class="alert alert-success " style="text-align: center;color: white;background-color: #2B3643;">@lang('lang.Completed Tasks')  </div>--}}
{{--                <table class="table table-striped table-bordered table-advance table-hover">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>--}}
{{--                            <i class="fa fa-briefcase"></i> # </th>--}}
{{--                        <th>--}}
{{--                            <i class="fa fa-briefcase"></i> @lang('lang.name') </th>--}}
{{--                        <th class="hidden-xs">--}}
{{--                            <i class="fa fa-user"></i> @lang('lang.due_date') </th>--}}
{{--                        <th class="hidden-xs">--}}
{{--                            <i class="fa fa-sticky-note"></i> @lang('lang.note') </th>--}}
{{--                        <th> archive </th>--}}
{{--                        <th> Delete </th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                                        <div class="alert alert-success" style="display: none;text-align: center">--}}
{{--                                            @lang('lang.The task has been deleted.')--}}
{{--                                        </div>--}}
{{--                    @if(($user->tasks->where('status','completed')->count()))--}}
{{--                        @foreach($user->tasks()->where('status','completed')->get() as $task)--}}
{{--                            <tr class="{{'delete_completed_task_'.$task->id}} all_data">--}}
{{--                                <td>{{$task->id}}</td>--}}
{{--                                <td class="hidden-xs"> {{  $task->name}}</td>--}}
{{--                                <td class="hidden-xs"> {{ $task->due_date}} </td>--}}
{{--                                <td class="hidden-xs"> {{ $task->note}} </td>--}}

{{--                                <td>--}}
{{--                                    <a  class="btn btn-outline btn-circle btn-sm purple"  data-toggle="modal" data-target="#exampleModalLong4{{$task->id}}">--}}
{{--                                        <i class="fa fa-book"></i> @lang('lang.Archive') </a>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <a class="btn btn-outline btn-circle dark btn-sm black submit_class" data-toggle="modal" data-target="#exampleModalLong3{{$task->id}}" >--}}
{{--                                        <i class="fa fa-trash-o" id="sub_fom_data"></i> @lang('lang.delete')--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <div class="modal fade " id="exampleModalLong3{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">--}}
{{--                                <div class="modal-dialog" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}

{{--                                            <h5 class="modal-title" id="exampleModalLongTitle{{$task->id}}">--}}
{{--                                                <div class="alert alert-danger" style="font-size: 20px">@lang('lang.delete this note Permanently ?')</div>--}}
{{--                                            </h5>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>--}}
{{--                                            <button type="button" class="btn btn-danger delete_completed_class"  data-dismiss="modal" data-id="{{$task->id}}">@lang('lang.delete')</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="modal fade " id="exampleModalLong4{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$task->id}}" aria-hidden="true">--}}
{{--                                <div class="modal-dialog" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}

{{--                                            <h5 class="modal-title" id="exampleModalLongTitle{{$task->id}}">--}}
{{--                                                <div class="alert alert-success" style="font-size: 20px;color:black">@lang('lang.Send to Archive ?')</div>--}}
{{--                                            </h5>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>--}}
{{--                                            <a href="{{route('task.archive',[App()->getLocale(),$task->id])}}" type="button" class="btn btn-danger "   >@lang('lang.send')</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


{{--                        @endforeach--}}
{{--                    @else--}}

{{--                        <tr >--}}
{{--                            <th colspan="6" >--}}
{{--                                <div class="alert alert-info" style="text-align: center">--}}
{{--                                    <strong>@lang('lang.There is no completed task until now !')</strong>--}}
{{--                                </div>--}}
{{--                            </th>--}}
{{--                        </tr>--}}

{{--                    @endif--}}

{{--                    <tr style="display: none ;" class="no_completed_tasks">--}}
{{--                        <th colspan="6" >--}}
{{--                            <div class="alert alert-info" style="text-align: center">--}}
{{--                                <strong>@lang('lang.There is no completed task until now !')</strong>--}}
{{--                            </div>--}}
{{--                        </th>--}}
{{--                    </tr>--}}



{{--                    </tbody>--}}


{{--                    <tbody class="searched_data">--}}

{{--                    </tbody>--}}
{{--                </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


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
      {{--$(document).ready(function(){--}}
      {{--   $('.dataTables_filter').on('keyup',function(){--}}
      {{--       let query = $('.search_input').val();--}}
      {{--       if(query ==='')--}}
      {{--       {--}}
      {{--           $('.all_data').show();--}}
      {{--           return ;--}}
      {{--       }--}}
      {{--        query = query.split(' ').join('%');--}}
      {{--       console.log(query);--}}
      {{--       let lang="{{App()->getLocale()}}";--}}
      {{--       $.ajax({--}}
      {{--           type:'get',--}}
      {{--           url:`/${lang}/adminPanel/filterusers/${query}`,--}}
      {{--           beforeSend:function (){--}}

      {{--           },--}}
      {{--           success:function(data){--}}
      {{--               $('.all_data').hide();--}}
      {{--               $('.searched_data').empty().append(data.searchData);--}}



      {{--           }--}}
      {{--       }--}}
      {{--       )--}}
      {{--   })--}}
      {{--});--}}
  </script>

  <script>
      $('li').removeClass('active');
      $('.task_nav').addClass('active');

  </script>




  <script>

      $('.edit_task_btn').on('click',function(event){
          event.preventDefault();
          let taskId= $(event.target).data('task-id') ;
          let lang= "{{app()->getLocale()}}";
          let segmentNumber = $(event.target).data('note');
          let nameField = $(`.name_task${taskId}_segment_${segmentNumber}`).val();
          let noteField = $(`.note_task${taskId}_segment_${segmentNumber}`).val();
          let dueDateField = $(`.due_task${taskId}_segment_${segmentNumber}`).val();
          if(nameField.length &&noteField.length && dueDateField.length )
          {
              $.ajax({
                  type:"post",
                  url:'/'+lang+'/task/edit/'+taskId,
                  data:{
                      _token:"{{csrf_token()}}",
                      segmentNumber:segmentNumber ,
                      nameField:nameField ,
                      dueDateField:dueDateField,
                      noteField:noteField
                  },
                  success:function(data)
                  {
                      window.location.reload();


                  }
              })
          }
          else{
             $('#warningModal').modal('show');


          }

      })
      $(document).on('click', '.delete_uncompleted_class', function (e) {
          e.preventDefault();
          let id = $(e.target).data('id');
           let lang = "{{App()->getLocale()}}";
          $.ajax({

              type: 'DELETE',
              data: {
                  '_token':"{{csrf_token()}}",

              },
              url: '/'+lang+`/tasks/${id}`,
              success: function (data) {
                  if(data.status === true)
                  {
                      $(`.delete_uncompleted_task_${data.id}`).remove();
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
            let lang = "{{App()->getLocale()}}";
          $.ajax({

              type: 'DELETE',
              data: {
                  '_token':"{{csrf_token()}}",

              },
              url: '/'+lang+`/tasks/${id}`,
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

@endsection

