@extends('AdminLayout.index')

@section('content')
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Edit Orders</h1>
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Orders</h4>
                    </div>
                </div>
            
                <div class="card-body">
                <form action="{{url('order/orderupdate/'.$list[0]->order_id)}}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">First Name</label>
                        <input type="text" readonly class="form-control" name="fname" value="{{$list[0]->fname}}"  placeholder="First Name" >
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Last Name</label>
                        <input type="text" readonly class="form-control" name="lname" value="{{$list[0]->lname}}"  placeholder="Last Name" >
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Mobile No</label>
                        <input type="text" readonly class="form-control" name="mobile" value="{{$list[0]->mobile}}"  placeholder="Mobile No" >
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">email Id</label>
                        <input type="text" readonly class="form-control" name="email" value="{{$list[0]->email}}"  placeholder="Email Id" >
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Address line1</label>
                        <input type="text" readonly class="form-control" name="address_line1" value="{{$list[0]->address_line1}}"  placeholder="Line1">
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Address Line2</label>
                        <input type="text" readonly class="form-control" name="address_line2" value="{{$list[0]->address_line2}}"  placeholder="Line 2">
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Country</label>
                        <input type="text" readonly class="form-control" name="country" value="{{$list[0]->country}}"  placeholder="Country Name">
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">State</label>
                        <input type="text" readonly class="form-control" name="state" value="{{$list[0]->state}}"  placeholder="State Name">
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">City</label>
                        <input type="text" readonly class="form-control" name="city" value="{{$list[0]->city}}"  placeholder="City Name">
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Pincode</label>
                        <input type="text" readonly class="form-control" name="pincode" value="{{$list[0]->pincode}}"  placeholder="Pincode">
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Address Type</label>
                        <input type="text" readonly class="form-control" name="address_type" value="{{$list[0]->address_type}}"  placeholder="Address type">
                    </div>
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Expected Delivery Date</label>
                        <input type="date" class="form-control txtDate" name="delivered_on" value="{{$list[0]->delivered_on}}" id="txtDate"  placeholder="Expected Delivery Date">
                    </div> 
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Order Status</label>
                        <select name="order_status" class="form-control">
                            <option value='0' @if($list[0]->status_order ==0) selected @endif>Pending</option>
                            <option value='8' @if($list[0]->status_order ==8) selected @endif>Confirm</option>
                            <option value='1' @if($list[0]->status_order ==1) selected @endif>Processing</option>
                            <option value='2' @if($list[0]->status_order ==2) selected @endif>Packed</option>
                            <option value='3' @if($list[0]->status_order ==3) selected @endif>Shipment</option>
                            <option value='4' @if($list[0]->status_order ==4) selected @endif>Delivered</option>
                            
                            <option value='9' @if($list[0]->status_order ==9) selected @endif>Order Reject</option>
                            
                            <option value='55' @if($list[0]->status_order=='55') selected @endif>Cancel Request</option>
                            <option value='5' @if($list[0]->status_order=='5') selected @endif>Cancel Request Accept</option>
                            <option value='555' @if($list[0]->status_order=='555') selected @endif>Cancel Request Reject</option>
                            
                            <option value='66' @if($list[0]->status_order=='66') selected @endif>Return Request</option>
                            <option value='6' @if($list[0]->status_order=='6') selected @endif>Return Request Accept</option>
                            <option value='666' @if($list[0]->status_order=='666') selected @endif>Return Request Reject</option>
                            <option value='6666' @if($list[0]->status_order=='6666') selected @endif>Return Completed</option>
                            
                            <option value='77' @if($list[0]->status_order=='77') selected @endif>Exchange Request</option>
                            <option value='7' @if($list[0]->status_order=='7') selected @endif>Exchange Request Accept</option>
                            <option value='777' @if($list[0]->status_order=='777') selected @endif>Exchange Request Reject</option>
                            <option value='7777' @if($list[0]->status_order=='7777') selected @endif>Exchanged</option>
                            
                            <!--<option value='5' @if($list[0]->status_order ==5) selected @endif>Cancel</option>-->
                            <!--<option value='6' @if($list[0]->status_order ==6) selected @endif>Return</option>-->
                            <!--<option value='7' @if($list[0]->status_order ==7) selected @endif>Exchange</option>-->
                        </select>
                    </div> 
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Order Date</label>
                        <input type="date" class="form-control txtDate" readonly="" value="{{$list[0]->order_date}}" id="txtDate"  placeholder="Order Date">
                    </div> 
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Add Return / Exchange / Cancel Reason</label>
                        <textarea class="form-control" name="admin_reason">{{$list[0]->admin_reason}}</textarea>
                    </div>
                    
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Delivered On</label>
                        <input type="date" class="form-control txtDate" readonly="" value="{{$list[0]->delivered_completed_on}}" id="txtDate"  placeholder="Order Date">
                    </div> 
                    <!--<div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Expected Return Date</label>
                        <input type="date" class="form-control txtDate" name="return_on" value="{{$list[0]->return_on}}" id="txtDate"  placeholder="Expected Return Date">
                    </div> 
                    <div class="col-md-6 mt-3" >
                        <label class="form-label" for="price">Expected Exchange Date</label>
                        <input type="date" class="form-control txtDate" name="exchange_on" value="{{$list[0]->exchange_on}}" id="txtDate"  placeholder="Expected Exchange Date">
                    </div> -->

                    <div class="col-md-12 mt-3">
                        <br><h4>Order Details</h4><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Item Name</th>
                                    <th>Weight</th>
                                    <th>Amount</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail as $row)
                                <tr>
                                    <td style="border:1px solid #e8e8e8;padding:10px;">
                                        <img src="{{asset('productImage/'.$row->pro_img)}}" style="width:60px;height:60px;" alt="">
                                    </td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;">{{$row->pname}}</td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;">{{$row->measurement}} {{$row->size}}</td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;">₹{{$row->price}}</td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;">{{$row->qty}}</td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$row->subtotal}}</b></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Sub Total</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$list[0]->subtotal}}</b></td>
                                </tr>
                                 @if($list[0]->coupon_code !="")
                                <tr>
                                    <td colspan="4" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Coupon Code</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>{{$list[0]->coupon_code}}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Coupon Discount</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$list[0]->coupon_discount}}</b></td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="4" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Delivery Charges</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$list[0]->delivery_charge}}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="border:1px solid #e8e8e8;padding:10px;"></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>Grand Total</b></td>
                                    <td style="border:1px solid #e8e8e8;padding:10px;"><b>₹{{$list[0]->grand_total}}</b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-md-6 mt-3">
                        <button type="submit" class="btn btn-primary">{{$title}}</button>
                    </div>
                </div>
            </form>
        </div>

      </div>
   </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#from').change(function()
    {
        var c_id = $('#from').val();
        var myarr = c_id.split(",");
        var myvar = myarr[0];
        $("#cat-id").html('');
        if(c_id != '')
        {
           // alert(myvar);
            $.ajax({
                url:"{{url('subcategory/fetchCat')}}",
                type:"POST",
                data:{
                    myvar:myvar,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result)
                {
                    console.log(result);
                    // $('#divto').html(data);
                    $('#cat-id').html('<option value="">Select Category</option>');
                        $.each(result.subcat, function (key, value) {
                            $("#cat-id").append('<option value="' + value
                                .id +',' + value.subcat_name + '">' + value.subcat_name + '</option>');
                        });
                }
            });
        }
        else
        {
            $('#cat-id').html('<select name="cid" required><option value="">Select Category</option></select>');
        }
    });
</script>
<script>
    $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('.txtDate').attr('min', minDate);
});
</script>


@endsection

