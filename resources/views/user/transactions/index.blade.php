@extends('user.layout.index')

@section('title')
    @lang('lang.transactions')
@endsection
@section('inside_title')
{{--    transactions--}}
@endsection
@section('header_link')


    <li>
        <span>  @lang('lang.transactions')</span>
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



          <div class="portlet-title">

             <div class="row">
                 <div class="col-md-6 col-sm-6 " style="margin-bottom:10px;margin-top: 25px">
                     <div class="modal fade " id="exampleModalLong_transfer_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <form enctype="multipart/form-data" action="{{route('change.transfer.password',App()->getLocale())}}" method="post">
                                         @csrf
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="portlet light bordered">
                                                     <div class="portlet-title">
                                                     </div>
                                                     <div class="portlet-body form">
                                                         <div class="form-body">

                                                             @if($user->transfer_password)
                                                                 <div class="form-group">
                                                                     <label for="old_transfer_password">@lang('lang.your old transfer password')</label>
                                                                     <div class="input-icon">
                                                                         <input style="font-size: 17px;" type="password" class="form-control"  id="old_transfer_password" name="old_transfer_password" value="{{old('old_transfer_password')}}" > </div>
                                                                 </div>

                                                             @else
                                                                 <div class="form-group">
                                                                     <label for="account_password">@lang('lang.your account password')</label>
                                                                     <div class="input-icon">
                                                                         <input style="font-size: 17px;" type="password" class="form-control"  id="account_password" name="account_password" value="{{old('account_password')}}" > </div>
                                                                 </div>


                                                                 @endif
                                                             <div class="form-group">
                                                                 <label for="new_transfer_password">@lang('lang.new transfer password')</label>
                                                                 <div class="input-icon">
                                                                     <input style="font-size: 17px;" type="password" class="form-control"  id="new_transfer_password" name="new_transfer_password" value="{{old('new_transfer_password')}}" > </div>
                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="confirm_new_transfer_password"> @lang('lang.Confirm your transfer password')</label>
                                                                 <div class="input-icon">
                                                                     <input style="font-size: 17px;" type="password" class="form-control"  id="confirm_new_transfer_password" name="confirm_new_transfer_password" value="" > </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                             <button  type="submit" class="btn btn-success ">
                                                 {{($user->transfer_password) ? trans('lang.Edit Transfer Password'): trans('lang.Add Transfer Password')}}
                                             </button>
                                         </div>

                                     </form>
                                 </div>

                             </div>
                         </div>
                     </div>

                 </div>




                 <div class="col-md-6 col-sm-6 " style="margin-bottom:10px;margin-top: 25px">


                     <div class="modal fade " id="exampleModalLong6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <form enctype="multipart/form-data" action="{{route('user.confirm.receiver',App()->getLocale()) }}" method="post">
                                         @csrf
                                         <div class="row">
                                             <div class="col-md-12">
                                                 <div class="portlet light bordered">
                                                     <div class="portlet-title">
                                                         <div class="alert alert-danger">
                                                             @lang('lang.Not That : Admin Will Get 10% Of The Transaction Money')
                                                         </div>
                                                     </div>
                                                     <div class="portlet-body form">
                                                         <div class="form-body">

                                                             <div class="form-group">
                                                                 <label for="receiver_code">@lang('lang.Receiver Code')</label>
                                                                 <div class="input-icon">
                                                                     <input style="font-size: 17px;" type="text" class="form-control"  id="receiver_code" name="receiver_code" value="{{old('receiver_code')}}" > </div>
                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="amount">@lang('lang.Amount')</label>
                                                                 <div class="input-icon">
                                                                     <input style="font-size: 17px;" type="number" class="form-control"  id="amount" name="amount" value="{{old('amount')}}" > </div>
                                                             </div>
                                                             <div class="form-group">
                                                                 <label for="password">@lang('lang.Your transaction Password') </label>
                                                                 <div class="input-icon">
                                                                     <input style="font-size: 17px;" type="password" class="form-control"  id="password" name="password" value="" > </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                             <button  type="submit" class="btn btn-success "> @lang('lang.Transfer') </button>
                                         </div>

                                     </form>
                                 </div>

                             </div>
                         </div>
                     </div>

                     <div class="col-md-12 col-xs-12">


                         <button type="submit" class="btn green pull-right"  style="margin-left: 5px" data-toggle="modal" data-target="#exampleModalLong_transfer_password" >
                             <i class="fa fa-plus"></i>
                             {{($user->transfer_password) ? trans('lang.Edit Transfer Password'): trans('lang.Add Transfer Password')}}

                         </button>
                         <button type="submit" class="btn green pull-right"   data-toggle="modal" data-target="#exampleModalLong6" >
                             <i class="fa fa-plus"></i> @lang('lang.Transfer Money')
                         </button>

                     </div>
                 </div>
             </div>
{{--user_found--}}


              {{--user_found--}}
              <div class="tools">
                  <a href="javascript:" class="collapse" data-original-title="" title=""> </a>
                  <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                  <a href="javascript:" class="reload" data-original-title="" title=""> </a>
                  <a href="javascript:" class="remove" data-original-title="" title=""> </a>
              </div>
          </div>
        <div class="row">
          <div class="col-md-6" >

              <div class="portlet-body " >


                  <div class="table-scrollable">
                              <div class="alert alert-warning " style="text-align: center;color: black;background-color: #2B3643 ; color:white"> @lang('lang.Sent Money') </div>

                      <table class="table table-striped table-bordered table-advance table-hover">
                          <thead>
                          <tr>
                              <th>
                                  <i class="fa fa-briefcase"></i> # </th>
                              <th>
                                  <i class="fa fa-briefcase"></i> @lang('lang.Receiver') </th>
                              <th class="hidden-xs">
                                  <i class="fa fa-user"></i> @lang('lang.amount') </th>
                              <th class="hidden-xs">
                                  <i class="fa fa-user"></i> @lang('lang.reason') </th>
                              <th> @lang('lang.details') </th>
                          </tr>
                          </thead>
                          <tbody>
                          @if($user->transactionsAsSender->count())
                              @foreach($user->transactionsAsSender as $sentTransaction)
                                  <tr >
                                      <td>{{$sentTransaction->id}}</td>
                                      <td class="hidden-xs"> {{  $sentTransaction->receiver->first_name. ' ' . $sentTransaction->receiver->last_name}}</td>
                                      <td class="hidden-xs"> {{  $sentTransaction->amount}} </td>
                                      <td class="hidden-xs">
                                          @if(($sentTransaction->reason) == 'user transfer' )
                                              @lang('lang.user transfer')

                                          @elseif($sentTransaction->reason == 'account activation')
                                              @lang('lang.account activation')
                                          @elseif($sentTransaction->reason == 'admin transfer')
                                              @lang('lang.admin transfer')

                                          @else
                                              {{$sentTransaction->reason}}

                                              @endif

                                      </td>
                                      <td>
                                          <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong2{{$sentTransaction->id}}">
                                              <i class="fa fa-eye" id="sub_fom_data"></i> @lang('lang.details')
                                          </button>
                                      </td>

                                  </tr>

                                  <div class="modal fade" id="exampleModalLong2{{$sentTransaction->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$sentTransaction->id}}" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">

                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">

                                                  <h4>  @lang('lang.receiver Name')  : {{$sentTransaction->receiver->first_name . ' ' . $sentTransaction->receiver->last_name}}  </h4>
                                                  <h4>   @lang('lang.receiver Email') : {{$sentTransaction->receiver->email}}  </h4>
                                                  <h4>   @lang('lang.receiver Phone') : {{$sentTransaction->receiver->phone}}  </h4>
                                                  <h4>     @lang('lang.Amount')     : {{$sentTransaction->amount}} @lang('lang.egp')  </h4>
                                                  <h4>   @lang('lang.date')           : {{format_date($sentTransaction->created_at)}} </h4>
                                              </div>
                                              <div class="modal-footer">

                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>



                              @endforeach
                          @else

                              <tr >
                                  <th colspan="7" >
                                      <div class="alert alert-info" style="text-align: center">
                                          <strong>@lang('lang.you did not send any money till now !') </strong>
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
          <div class="col-md-6">


              <div class="portlet-body">

                              <div class="alert alert-success" style="text-align: center;background-color: #2B3643;color:#fff"> @lang('lang.Received Money')  </div>


                      <table class="table table-striped table-bordered table-advance table-hover">
                          <thead>
                          <tr>
                              <th>
                                  <i class="fa fa-briefcase"></i> # </th>
                              <th>
                                  <i class="fa fa-briefcase"></i> @lang('lang.sender') </th>
                              <th class="hidden-xs">
                                  <i class="fa fa-user"></i> @lang('lang.amount') </th>
                              <th class="hidden-xs">
                                  <i class="fa fa-sticky-note"></i> @lang('lang.reason') </th>

                              <th> @lang('lang.details') </th>
                          </tr>
                          </thead>
                          <tbody>
                          {{--                    <div class="alert alert-success" style="display: none;text-align: center">--}}
                          {{--                        <strong>Success!</strong> The task has been deleted.--}}
                          {{--                    </div>--}}
                          @if(($user->transactionsAsReceiver->count()))
                              @foreach($user->transactionsAsReceiver as $ReceivedTransaction)
                                  <tr >
                                      <td>{{$ReceivedTransaction->id}}</td>
                                      <td class="hidden-xs"> {{  $ReceivedTransaction->sender->first_name . ' ' . $ReceivedTransaction->sender->last_name}}</td>
                                      <td class="hidden-xs"> {{ $ReceivedTransaction->amount}} </td>
                                      <td class="hidden-xs">

                                          @if(($ReceivedTransaction->reason) == 'user transfer' )
                                              @lang('lang.user transfer')
                                          @elseif($ReceivedTransaction->reason == 'account activation')
                                              @lang('lang.account activation')
                                          @elseif($ReceivedTransaction->reason == 'admin transfer')
                                              @lang('lang.admin transfer')
                                          @else
                                              {{$ReceivedTransaction->reason}}
                                          @endif

                                      </td>
                                      <td>
                                          <button  class="btn btn-outline btn-circle dark btn-sm black" data-toggle="modal" data-target="#exampleModalLong_received{{$ReceivedTransaction->id}}">
                                              <i class="fa fa-eye" id="sub_fom_data"></i> @lang('lang.details')
                                          </button>
                                      </td>

                                  </tr>
                                  <div class="modal fade" id="exampleModalLong_received{{$ReceivedTransaction->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle{{$ReceivedTransaction->id}}" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="modal-body">

                                                      <h4>  @lang('lang.sender Name') : {{$ReceivedTransaction->sender->first_name . ' ' . $ReceivedTransaction->sender->last_name}}  </h4>
                                                      <h4> @lang('lang.sender Email') : {{$ReceivedTransaction->sender->email}}  </h4>
                                                      <h4> @lang('lang.sender Phone') : {{$ReceivedTransaction->sender->phone}}  </h4>
                                                      <h4> @lang('lang.Amount')         : {{$ReceivedTransaction->amount}} @lang('lang.egp')  </h4>
                                                      <h4> @lang('lang.date')           : {{format_date($ReceivedTransaction->created_at)}} </h4>
                                                  </div>

                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('lang.close')</button>
                                              </div>
                                          </div>
                                      </div>
                                  </div>


                              @endforeach
                          @else

                              <tr >
                                  <th colspan="6" >
                                      <div class="alert alert-info" style="text-align: center">
                                          <strong>@lang('lang.There is no Received Money til now !')</strong>
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

    <style>
        .alert {
            margin-bottom: 0;
        }

    </style>
    <script>
        {{--user_found--}}
{{--        {{--}}
{{--    (session()->has('found_receiver')) ? "--}}
{{--    $('#myModal').modal('show')--}}
{{--    " : ""--}}
{{--}}--}}

        {{--user_found--}}


        {{--$(document).ready(function(){--}}
        {{--    $('.dataTables_filter').on('keyup',function(){--}}
        {{--        let query = $('.search_input').val();--}}
        {{--        if(query ==='')--}}
        {{--        {--}}
        {{--            $('.all_data').show();--}}
        {{--            return ;--}}
        {{--        }--}}
        {{--        query = query.split(' ').join('%');--}}
        {{--        console.log(query);--}}
        {{--        let lang="{{App()->getLocale()}}";--}}
        {{--        $.ajax({--}}
        {{--                type:'get',--}}
        {{--                url:`/${lang}/adminPanel/filterusers/${query}`,--}}
        {{--                beforeSend:function (){--}}

        {{--                },--}}
        {{--                success:function(data){--}}
        {{--                    $('.all_data').hide();--}}
        {{--                    $('.searched_data').empty().append(data.searchData);--}}



        {{--                }--}}
        {{--            }--}}
        {{--        )--}}
        {{--    })--}}
        {{--});--}}
    </script>
    <script>
        $('li').removeClass('active');
        $('.trans_nav').addClass('active');

    </script>

@endsection

