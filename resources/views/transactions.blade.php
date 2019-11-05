@extends('layouts.app')
@section('content')

    <!DOCTYPE html>
<html lang="en" class="ie8 no-js"> <![endif]-->
<html lang="en" class="ie9 no-js"> <![endif]-->
<html lang="en">


<head>
    <meta charset="utf-8"/>
    <title> Transactions </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #6 for user account page" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN LAYOUT FIRST STYLES -->
    <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css"/>
    <!-- END LAYOUT FIRST STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="../assets/layouts/layout6/css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/layouts/layout6/css/custom.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class="">

<!-- END USER PROFILE -->
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="container-fluid">
    <div class="page-content page-content-popup">
        <div class="page-content-fixed-header">

        </div>
        <div class="page-sidebar-wrapper">

            <div class="page-sidebar navbar-collapse collapse">

                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                    data-slide-speed="200">
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">Menu</h3>
                    </li>


                    <li class="nav-item  ">
                        <a href="?p=" class="nav-link nav-toggle">
                            <i class="icon-wallet" href="transactionAdd"></i>
                            <span class="title">Klienci</span>
                            <span class="arrow"></span>
                        </a>
                    </li>

                    <li class="nav-item  ">
                        <a href="/transactions" class="nav-link nav-toggle">
                            <i class="icon-basket"></i>
                            <span class="title">Transakcje</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="ecommerce_index.html" class="nav-link ">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <div class="page-fixed-main-content">

            <div class="row">
                <div class="col-md-12">

                    <div class="profile-sidebar">
                    </div>

                    <div class="col-md-12">
                        </div>
                        <!-- Begin: life time stats -->
                        <div class="portlet light portlet-fit portlet-datatable bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-settings font-green"></i>
                                    <span class="caption-subject font-green sbold uppercase"> Transakcje </span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-container">

                                    <form role="form" method="post" action="{{url('/transactions')}}">
                                        @csrf
                                        <table class="table table-striped table-bordered table-hover table-checkable"
                                               id="datatable_orders">
                                            <thead>
                                            <tr role="row" class="heading">
                                                <th width="15%"> Data transakcji </th>
                                                <th width="15%"> Klient </th>
                                                <th width="10%"> Czynności </th>
                                            </tr>

                                            <td>
                                                <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm" value="yyyy-mm-dd"
                                                           name="order_date_from" placeholder="From">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                                <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
                                                    <input type="text" class="form-control form-filter input-sm" value="yyyy-mm-dd"
                                                           name="order_date_to"
                                                           placeholder="To">
                                                    <span class="input-group-btn">
                                                            <button class="btn btn-sm default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </td>


                                            <td>
                                                <input type="text" class="form-control form-filter input-sm" name="customer_id"></td>
                                            <td>
                                                <div class="margin-bottom-5">
                                                    <button class="btn btn-sm btn-success filter-submit margin-bottom">
                                                       <a>
                                                        <i class="fa fa-search" type="submit" method="post" class="nav-link"
                                                           href="{{url('/transactions')}}"></i> Szukaj
                                                           </a>
                                                    </button>
                                                </div>

                                                <div class="margin-bottom-5">
                                                    <button  class="btn btn-sm btn-success filter-submit margin-bottom">
                                                        <a href="/transactionAdd">
                                                        Dodaj transakcję
                                                        </a>
                                                    </button>
                                                </div>

                                                <button class="btn btn-sm btn-default filter-cancel">
                                                    <i class="fa fa-times"></i> Reset
                                                </button>
                                            </td>
                                            </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </form>


                                    <table class="table table-striped table-bordered table-hover table-checkable"
                                           id="datatable_orders">

                                        <tr>
                                            <td>kod klienta</td>
                                            <td>wartość transakcji</td>
                                            <td>kod transakcji</td>
                                            <td>Notatki</td>
                                            <td>data transakcji</td>
                                        </tr>
                                        @foreach($transactions as $transaction)
                                            <tr>


                                                @foreach($transaction as $key => $value)
                                                    <td>
                                                        {{ $value }}
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <button class="btn btn-sm btn-default filter-cancel">
                                                        <i class="fa fa-times"></i> Usuń transakcję
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Table -->

                        <!-- End: life time stats -->
                    </div>

                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- BEGIN FOOTER -->

        <a href="#index" class="go2top">
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END FOOTER -->
    </div>
</div>
<!-- END CONTAINER -->

<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout6/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>
@endsection

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
