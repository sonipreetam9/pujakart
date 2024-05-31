@extends('AdminLayout.index')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Invoice Orders</h1>
                        </div>
                        <div>
                            <a href="{{url('order')}}" class="btn btn-link btn-soft-light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>
                                    <path d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z" stroke="currentColor"></path>
                                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"></path>
                                    <mask id="mask0_18_1038" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6"><path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"></path></mask>
                                    <g mask="url(#mask0_18_1038)"><path opacity="0.89" d="M13.5 12C14.3284 12 15 11.3284 15 10.5C15 9.67157 14.3284 9 13.5 9C12.6716 9 12 9.67157 12 10.5C12 11.3284 12.6716 12 13.5 12Z" fill="white"></path></g>
                                </svg>
                                 View Orders
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
    <div class="row" id="printableArea">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header" style="text-align:center;">
                    <div class="header-title">
                        <h4 class="card-title" style="width:100%;">INVOICE ORDERS</h4>
                    </div>
                </div>
            
                <div class="card-body">
                    <div class="row">
                        <table class="border">
                            <tbody>
                                <tr>
                                    <td style="border-right:1px solid #e8e8e8;width:50%;">
                                        <center>
                                            <img src="{{url('assets/images/pujakart.jpeg')}}" style="width:100px;border-radius:8px;" alt="Pujakart">
                                        </center>
                                    </td>
                                    <td style="padding:10px;">
                                        <h5>Pujakart</h5>
                                        <p><b>Email -</b> pujakartinfo@gmail.com, <br>
                                        <b>Address -</b> Paonta sahib, sirmour, Himachal Pradesh (India), <br>
                                        <b>Pincode -</b> 173025, <br>
                                        <b>Mobile No -</b> +01704796890<br> 
                                        <!--<b>Mobile No -</b> +91- 9111007615 </p> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-right:1px solid #e8e8e8;border-top:1px solid #e8e8e8;border-bottom:1px solid #e8e8e8;padding:10px;padding-left:30px;">
                                        <h5>SHIPPING DETAIL</h5>
                                    </td>
                                    <td style="border-top:1px solid #e8e8e8;border-bottom:1px solid #e8e8e8;padding:10px;">
                                        <h5>ORDER DETAIL</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-right:1px solid #e8e8e8;padding:30px;">
                                        <h5>{{$list[0]->fname}} {{$list[0]->lname}}</h5>
                                        <p>
                                            {{$list[0]->address_line1}}, <br>
                                            @if($list[0]->address_line2!="")
                                                {{$list[0]->address_line2}}, <br>
                                            @endif
                                            {{$list[0]->state}}, {{$list[0]->city}} ({{$list[0]->country}}), <br>
                                            Pincode- {{$list[0]->pincode}}, <br>
                                            Address Type- {{$list[0]->address_type}}, <br>
                                            Mobile- {{$list[0]->mobile}}, Email- {{$list[0]->email}}.
                                        </p>
                                    </td>
                                    <td style="padding:10px;">
                                        <p>
                                            <b>Order ID: </b>#{{$list[0]->order_id}}<br>
                                            <b>Order Date: </b>{{date ('d M Y',strtotime($list[0]->order_date))}}<br>
                                            <b>Order Time: </b>{{ $list[0]->order_time }}<br>
                                            <b>Payment Mode: </b> {{$list[0]->payment_mode}}<br>
                                            <b>Payment Status: </b> {{$list[0]->payment_status}}<br>
                                            @if($list[0]->status_order=='4')
                                            <b>Order Delivered: </b> {{date('d M Y',strtotime($list[0]->delivered_completed_on))}}
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        
                        <br>
                        <table class="border" style="width:100%;padding:10px;">
                            <thead>
                                <tr>
                                    <td colspan="6"><h5 style="margin:10px; 0px">ORDER DETAILS</h5></td>
                                </tr>
                            </thead>
                            <thead >
                                <tr style="background-color:#e9e9e9;">
                                    <!--<th>Image</th>-->
                                    <th>S.no.</th>
                                    <th style="padding:10px;">Item Name</th>
                                    <th style="padding:10px;">HSN Code</th>
                                    <th style="padding:10px;">Weight</th>
                                    <th style="padding:10px;">Amount</th>
                                    <th style="padding:10px;">Qty</th>
                                    <th style="padding:10px;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($detail as $row)
                                <tr>
                                    <!--<td><img src="{{asset('productImage/'.$row->pro_img)}}" style="width:60px;height:60px;" alt=""></td>-->
                                    <td style="padding:10px;border:1px solid #e8e8e8;padding:10px;">{{$i}}</td>
                                    <td style="padding:10px;border:1px solid #e8e8e8;padding:10px;">{{$row->pname}}</td>
                                    <td style="padding:10px;border:1px solid #e8e8e8;padding:10px;">{{$row->hsn}}</td>
                                    <td style="padding:10px;border:1px solid #e8e8e8;padding:10px;">{{$row->measurement}}{{$row->size}}</td>
                                    <td style="padding:10px;border:1px solid #e8e8e8;padding:10px;">₹{{$row->price}}</td>
                                    <td style="padding:10px;border:1px solid #e8e8e8;padding:10px;">{{$row->qty}}</td>
                                    <td style="padding:10px;border:1px solid #e8e8e8;padding:10px;"><b>₹{{$row->subtotal}}</b></td>
                                </tr>
                                @php $i++; @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Sub Total</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$list[0]->subtotal}}</b></td>
                                </tr>
                                @if($list[0]->coupon_code !="")
                                <tr>
                                    <td colspan="5" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Coupon Code</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>{{$list[0]->coupon_code}}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Coupon Discount</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$list[0]->coupon_discount}}</b></td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="5" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Delivery Charges</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$list[0]->delivery_charge}}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Grand Total</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$list[0]->grand_total}}</b></td>
                                </tr>
                            </tfoot>
                        </table>
                        <!--<b>Note:</b>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <button type="button" onclick="downloadDiv('printableArea')" class="btn btn-primary">Download Invoice</button>
            <!--<button type="button" class="btn btn-primary" onclick="printDiv('printableArea')">Print Invoice</button>-->
        </div>
</div>

<!-- END SECTION SHOP -->
<script src="{{asset('assets/invoice.min.js')}}"></script>
<script type="text/javascript">

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
     //alert("hello");
     var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
     window.print();
    document.body.innerHTML = originalContents;
     //alert("hello");
}

function downloadDiv(divName) {
    const printableArea = this.document.getElementById(divName);

        console.log(printableArea);
        console.log(window);
        var opt = {
            margin: 0.5,
            filename: 'invoice.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 1 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        html2pdf().from(printableArea).set(opt).save();
}
</script>

@endsection

