@extends('user.layout.index')

@section('title')
    transactions
@endsection
@section('inside_title')
    confirm your transaction
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
    <link href="{{asset('assets/pages/css/invoice.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
@endsection

@section('content')

    @include('partial.toaster')

    <div class="invoice">
        <div class="modal fade " id="exampleModalLong30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form enctype="multipart/form-data" action="{{route('user.transfer.money') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-title">
                                        </div>
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <h2 > Are You Sure ? </h2>
                                                <input type="hidden" name="receiver_code" value="{{$receiver->generateCode()}}">
                                                <input type="hidden" name="amount" value="{{$amount}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button  type="submit" class="btn btn-success "> Transfer </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>

                        <th> Sender </th>
                        <th> Receiver name </th>
                        <th > Receiver Email </th>
                        <th > Receiver Code </th>
                        <th> Amount </th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td> {{$user->name}} </td>
                        <td > {{$receiver->name}} </td>
                        <td > {{$receiver->email}} </td>
                        <td > {{$receiver->generateCode()}} </td>
                        <td > {{$amount}} EGP </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-12 invoice-block">

                <a href="{{Route('user.transactions',$receiver->generateCode())}}" class="btn btn-lg red hidden-print margin-bottom-5 margin-top-5"> Cancel
                    <i class="fa fa-ca"></i>
                </a>

                <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> Print
                    <i class="fa fa-print"></i>
                </a>


                <a class="btn btn-lg green hidden-print margin-bottom-5" data-toggle="modal" data-target="#exampleModalLong30"> confirm
                    <i class="fa fa-check"></i>
                </a>

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

    <style>
        .alert {
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
                let lang="{{App()->getLocale()}}";
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
        $('li').removeClass('active');
        $('.trans_nav').addClass('active');

    </script>

@endsection

