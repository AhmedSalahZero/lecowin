@extends('admin.layout.index')

@section('title')
    transactions
@endsection
@section('inside_title')
{{--    transactions--}}
@endsection
@section('header_link')
    <li>
        <span>transactions</span>
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
{{--    <div id="sample_1_filter" class="dataTables_filter"><label>Search:<input style="font-size: 17px" type="search" class="form-control input-sm input-small input-inline search_input" placeholder="" aria-controls="sample_1"></label></div>--}}

    <div class="portlet" >
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-bell-o"></i> All transactions </div>
            <div class="tools">
                <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                <a href="javascript:;" class="reload" data-original-title="" title=""> </a>
                <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-scrollable ">
                <table id="myTable" class="table table-striped table-bordered table-advance table-hover">
                    <thead>
                    <tr>
                        <th>
                            <i class="fa fa-briefcase"></i> # </th>
                        <th>
                            <i class="fa fa-briefcase"></i> sender </th>
                        <th class="hidden-xs">
                            <i class="fa fa-transaction"></i> receiver </th>
                        <th class="hidden-xs">
                            <i class="fa fa-transaction"></i> amount </th>
                        <th class="hidden-xs">
                            <i class="fa fa-transaction"></i> reason </th>
                        <th class="hidden-xs">
                            <i class="fa fa-transaction"></i> date </th>
                        <th> details </th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--                    <div class="alert alert-success" style="display: none;text-align: center">--}}
                    {{--                        <strong>Success!</strong> The transaction has been deleted.--}}
                    {{--                    </div>--}}
                    @if(count($transactions))
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->id}}</td>
                                <td>{{$transaction->sender->first_name . ' ' .$transaction->sender->last_name }}</td>
                                <td class="hidden-xs"> {{$transaction->receiver->first_name . ' ' .$transaction->receiver->first_last}}</td>
                                <td class="hidden-xs"> {{$transaction->amount}} EGP</td>
                                <td class="hidden-xs"> {{$transaction->reason}}</td>
                                <td class="hidden-xs"> {{format_date($transaction->created_at)}}</td>
                                <td>
                                    <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong_trans{{$transaction->id}}">
                                        <i class="fa fa-eye" id="sub_fom_data"></i> details
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="exampleModalLong_trans{{$transaction->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$transaction->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <h4> receiver Name  : {{$transaction->receiver->first_name . ' ' . $transaction->receiver->last_name}} </h4>
                                            <h4>   receiver Email : {{$transaction->receiver->email}} </h4>
                                            <h4>  receiver Phone : {{$transaction->receiver->phone}} </h4>
                                            <h4>  sender Name    : {{$transaction->sender->first_name . ' ' .$transaction->sender->last_name}}</h4>
                                            <h4>  sender Email   : {{$transaction->sender->email}}</h4>
                                            <h4>  sender Phone   : {{$transaction->sender->phone}}</h4>
                                            <h4>  Amount         : {{$transaction->amount}} EGP </h4>
                                            <h4>  Reason         : {{$transaction->reason}}  </h4>
                                            <h4>  date           : {{format_date($transaction->created_at)}}</h4>
                                        </div>
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @else

                        <tr >
                            <th colspan="6" >
                                <div class="alert alert-info" style="text-align: center">
                                    <strong>There is no transactions until now !</strong>
                                </div>
                            </th>
                        </tr>

                    @endif
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

@endsection

