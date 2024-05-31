@extends('AdminLayout.index')

@section('content')
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>Return Order</h1>
                            </div>
                            <div>
                                <!--{{url('slider/create_slider')}}-->
                                <a href="" class="btn btn-link btn-soft-light">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-32">
                                        <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg> Orders
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="../../assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="../../assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="../../assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="../../assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="../../assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="../../assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            </div>
        </div>                <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
           <div class="col-sm-12">
              <div class="card">
                 <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                       <h4 class="card-title">View Return Orders</h4>
                    </div>
                 </div>
                 <div class="card-body">
                    <div class="table-responsive border rounded">
                        <table id="datatable" class="table " data-toggle="data-table">
                            <thead>
                                <tr>
                                    <!-- <th>Sno</th> -->
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Mobile No</th>
                                    <th>Total</th>
                                    <th>Mode</th>
                                    <th>Reason</th>
                                    <th>Order Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($j=1)
                                @foreach ($order as $item)
                                <tr>
                                    <td>{{$item->order_id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->mobile}}</td>
                                    <td>{{$item->grand_total}}</td>
                                    <td>{{$item->payment_mode}}</td>
                                    <td>{{$item->reason_type}}</td>
                                    <td>
                                        @if($item->status_order==6)
                                        <div class="btn btn-success btn-sm">{{"Return Accepted"}}</div>
                                        @endif
                                        @if($item->status_order==66)
                                        <div class="btn btn-success btn-sm">{{"Return Requested"}}</div>
                                        @endif
                                        @if($item->status_order==666)
                                        <div class="btn btn-danger btn-sm">{{"Return Canceled"}}</div>
                                        @endif
                                        <!--<div class="btn btn-danger btn-sm">
                                           @if($item->status_order==6){{"Return Requested"}}@endif
                                        </div>-->
                                    </td>
                                    <td> 
                                        {{date ('d M D Y',strtotime($item->order_time))}}
                                    </td>
                                    <td>
                                        <a href="{{url('order/return_edit/'.$item->order_id)}}"> 
                                            <i class="fa fa-edit" style="font-size:18px;color:green;"></i>
                                        </a>
                                       
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
              </div>
           </div>
        </div>
    </div>

@endsection

