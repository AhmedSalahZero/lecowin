@extends('admin.layout.index')

@section('title')
    Users
@endsection
@section('inside_title')
     Users
@endsection
@section('header_link')
    <li>
        <span>Users</span>
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
                <i class="fa fa-bell-o"></i> All Users </div>
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
                            <i class="fa fa-user"></i> email </th>

                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> phone </th>

                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> address </th>
                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> level </th>

                        <th class="hidden-xs">
                            <i class="fa fa-user"></i> Code </th>
                        <th>
                            <i class="fa fa-shopping-cart"></i> parent
                        </th>
                        <th> networkers </th>
                        <th> basic profit</th>
                        <th> forth profit</th>
                        <th> total network profit</th>
                        <th>  <i class="fa fa-money"></i></th> </th>
                        <th>

                            <i class="fa fa-check"></i>
                        </th>

                    </tr>
                    </thead>
                    <tbody>
{{--                    <div class="alert alert-success" style="display: none;text-align: center">--}}
{{--                        <strong>Success!</strong> The User has been deleted.--}}
{{--                    </div>--}}
                   @if(count($users) > 0)
                       @foreach($users as $user)

{{--                           @--}}
{{--                           <tr class="{{'delete_category_'.$category->id}} all_data">--}}
                           <tr>
                               <td>{{$user->id}}</td>
                               <td>{{$user->name}}</td>
                               <td class="hidden-xs"> {{$user->email}}</td>
                               <td class="hidden-xs"> {{$user->phone}}</td>
                               <td class="hidden-xs"> {{$user->address}}</td>
                               <td class="hidden-xs"> {{$user->getMaxLevel()}}</td>
                               <td class="hidden-xs"> {{$user->code}}</td>
                               <td class="hidden-xs"> {!! optional($user->parent)->name!!} </td>
                               <td class="hidden-xs"> {!! $user->countTotalNetworks()!!} </td>
                               <td class="hidden-xs"> {!! $user->CountLevelsProfit() !!} </td>
                               <td class="hidden-xs"> {!! $user->CountLevelsForthCost() !!} </td>
                               <td class="hidden-xs"> {!! $user->totalNetworkProfit() !!} </td>
                               <td>

                                      <button type="button" class="btn btn-outline btn-circle dark btn-sm black "  data-toggle="modal" data-target="#exampleModalLong6{{$user->id}}">
                                          <i class="fa fa-money" id=""></i>
                                      </button>

                                   <div class="modal fade " id="exampleModalLong6{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>

                                                   <h5 style="padding: 0;margin: 0" class="modal-title" id="exampleModalLongTitle">
                                                           transfer money To : {{$user->name}}
                                                   </h5>
                                               </div>
                                               <div class="modal-body">
                                                   <form enctype="multipart/form-data" action="{{route('add.transaction',$user->id)}}" method="post">
                                                       @csrf
                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <div class="portlet light bordered">
                                                                   <div class="portlet-title">
                                                                   </div>
                                                                   <div class="portlet-body form">

                                                                       <div class="form-body">
                                                                           <div class="form-group">
                                                                               <label for="name_en">Amount</label>
                                                                               <div class="input-icon">
                                                                                   <input style="font-size: 17px;" type="text" class="form-control"  id="amount" name="amount" value="{{old('amount')}}" > </div>
                                                                           </div>
                                                                       </div>
                                                                   </div>


                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                           <button  type="submit" class="btn btn-danger "> transfer </button>
                                                       </div>

                                                   </form>
                                               </div>

                                           </div>
                                       </div>
                                   </div>



                               </td>

                               @if(!($user->isActivated()))
                                   <td>
                                       <button type="button" class="btn btn-outline btn-circle dark btn-sm black "  data-toggle="modal" data-target="#activated_modal{{$user->id}}">
                                           <i class="fa fa-key" id=""></i>
                                       </button>

                                       <div class="modal fade " id="activated_modal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

                                           <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                   <div class="modal-header">
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <form enctype="multipart/form-data" action="{{route('admin.active',$user->id)}}" method="post">
                                                           @csrf
                                                           <div class="row">
                                                               <h4 style="padding-left:20px ">
                                                                   Active {{$user->name}} Account ?

                                                               </h4>

                                                               <div class="modal-footer">
                                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                   <button  type="submit" class="btn btn-success "> Active </button>
                                                               </div>

                                                       </form>
                                                   </div>

                                               </div>
                                           </div>
                                       </div>
                                   </td>
                               @endif

                               {{--                               <td>--}}
{{--                                   <a href="{{Route('categories.edit',[$category->id])}}" class="btn btn-outline btn-circle btn-sm purple">--}}
{{--                                       <i class="fa fa-edit"></i> Edit </a>--}}
{{--                               </td>--}}
{{--                               <td>--}}

{{--                                   <a class="btn btn-outline btn-circle dark btn-sm black submit_class" category_id="{{$category->id}}" >--}}
{{--                                          <i class="fa fa-trash-o" id="sub_fom_data"></i> Delete--}}
{{--                                      </a>--}}
{{--                               </td>--}}
                           </tr>
                       @endforeach
                   @else

                           <tr >
                               <th colspan="6" >
                                   <div class="alert alert-info" style="text-align: center">
                                       <strong>There is no Users until now !</strong>
                                   </div>
                               </th>
                           </tr>

                    @endif

                    <tr style="display: none ;" class="no_categories">
                        <th colspan="6" >
                            <div class="alert alert-info" style="text-align: center">
                                <strong>There is no Categories until now !</strong>
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
                 url:`/${lang}/adminPanel/filterCategories/${query}`,


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
            let id = $(e.target).attr('category_id');
            let lang = "{{App()->getLocale()}}";
            $.ajax({
                type: 'DELETE',
                url: `/admin/categories/${id}`,
                success: function (data) {
                    if(data.status === true)
                    {
                        $(`.delete_category_${data.id}`).remove();
                        $('.alert-success').show();
                        if(data.count_deleted_child_id >0)
                        {
                            for (let i = 0; i <= data.count_deleted_child_id; i++)
                                $(`.delete_category_${data.deleted_child_id[i]}`).remove();
                        }
                        if(data.category_count ===0)
                        {
                            $('.no_categories').show();

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

