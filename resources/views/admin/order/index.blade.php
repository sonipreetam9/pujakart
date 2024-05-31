@extends('AdminLayout.index')

@section('content')
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Orders</h1>
                        </div>
                        <div>
                            <a href="{{url('slider/create_slider')}}" class="btn btn-link btn-soft-light">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-32">
                                    <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                Orders
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
    </div>  <!-- Nav Header Component End -->
    <!--Nav End-->
</div>
<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">View Orders</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border rounded">
                        <table  class="table" data-toggle="data-table" id="dataTable">
                            <thead>
                                <tr>
                                    <!-- <th>Sno</th> -->
                                    <th>Order Id</th>
                                    <th>Name</th>
                                    <th>Mobile No</th>
                                    <th>Total</th>
                                    <th>Mode</th>
                                    <th>Order Status</th>
                                    
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                <tr>
                                    <td>{{$item->order_id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->mobile}}</td>
                                    <td>{{$item->grand_total}}</td>
                                    <td>@php echo ucwords($item->payment_mode)  @endphp
                                    @if($item->payment_mode=='online') ({{$item->payment_status}})@endif 
                                    @if($item->payment_mode=='cod') ( NA)  @endif
                                    </td>
                                    <td>
                                        @if($item->status_order==0)<div class="btn btn-warning btn-sm">{{ "Pending"}} </div>
                                        @elseif($item->status_order==8)<div class="btn btn-success btn-sm">{{"Confirm"}}</div>
                                        @elseif($item->status_order==1)<div class="btn btn-success btn-sm">{{"Processing"}}</div>
                                        @elseif($item->status_order==2)<div class="btn btn-success btn-sm">{{"Packed"}}</div>
                                        @elseif($item->status_order==3)<div class="btn btn-success btn-sm">{{"Shipping"}}</div>
                                        @elseif($item->status_order==4)<div class="btn btn-success btn-sm">{{"Delivered"}}</div>
                                            
                                        @elseif($item->status_order==6)<div class="btn btn-success btn-sm">{{"Return Accepted"}}</div>
                                        @elseif($item->status_order==66)<div class="btn btn-success btn-sm">{{"Return Requested"}}</div>
                                        @elseif($item->status_order==666)<div class="btn btn-danger btn-sm">{{"Return Canceled"}}</div>
                                        @elseif($item->status_order==6666)<div class="btn btn-success btn-sm">{{"Return Completed"}}</div>
                                            
                                        @elseif($item->status_order==7)<div class="btn btn-success btn-sm">{{"Excange Accepted"}}</div>
                                        @elseif($item->status_order==77)<div class="btn btn-success btn-sm">{{"Excange Requested"}}</div>
                                        @elseif($item->status_order==777)<div class="btn btn-danger btn-sm">{{"Excange Canceled"}}</div>
                                        @elseif($item->status_order==7777)<div class="btn btn-success btn-sm">{{"Excanged"}}</div>
                                       
                                        @elseif($item->status_order==5)<div class="btn btn-success btn-sm">{{"Cancel Accepted"}}</div>
                                        @elseif($item->status_order==55)<div class="btn btn-success btn-sm">{{"Cancel Requested"}}</div>
                                        @elseif($item->status_order==555)<div class="btn btn-danger btn-sm">{{"Order Canceled"}}</div>
                                        
                                        @elseif($item->status_order==9)<div class="btn btn-danger btn-sm">{{"Order Rejected"}}</div>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <!--{{date ('d M Y',strtotime($item->order_date))}}/{{date ('h:i A',strtotime($item->order_time))}}-->
                                        <!--{{$item->order_date}} / {{$item->order_time}}-->
                                       {{date ('d M Y',strtotime($item->order_date))}}/ {{$item->order_time}}
                                    </td>
                                    <td>
                                        <a href="{{url('order/edit/'.$item->order_id)}}"> 
                                            <i class="fa fa-edit" style="font-size:18px;color:green;"></i>
                                        </a>
                                        <a href="{{url('order/invoice/'.$item->order_id)}}" target="_blank">
                                            <i class="fa fa-download" style="font-size:18px;"></i>
                                        </a>
                                        <!--<a href="{{url('order/delete/'.$item->order_id)}}"> -->
                                        <!--    <i class="fa fa-trash-o" style="font-size:18px;color:red;"></i>-->
                                        <!--</a>-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <!-- <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#dataTable').DataTable();
});
</script>

@endsection

