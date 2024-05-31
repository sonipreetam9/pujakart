@extends('AdminLayout.index')

@section('content')
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Update Cancel Orders</h1>
                        </div>
                        <div>
                            <a href="{{url('order/cancel')}}" class="btn btn-link btn-soft-light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>
                                    <path d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z" stroke="currentColor"></path>
                                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"></path>
                                    <mask id="mask0_18_1038" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6"><path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"></path></mask>
                                    <g mask="url(#mask0_18_1038)"><path opacity="0.89" d="M13.5 12C14.3284 12 15 11.3284 15 10.5C15 9.67157 14.3284 9 13.5 9C12.6716 9 12 9.67157 12 10.5C12 11.3284 12.6716 12 13.5 12Z" fill="white"></path></g>
                                </svg>
                                 Cancel Orders
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
                        <h4 class="card-title">Update Orders</h4>
                    </div>
                </div>
            
                <div class="card-body">
                <form action="{{url('order/cancelupdate/'.$list[0]->order_id)}}"  method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mt-3" >
                        <label class="form-label" for="price">Reason </label>
                        <textarea class="form-control" name="reason">{{$list[0]->admin_reason}}</textarea>
                    </div>
                    <div class="col-md-12 mt-3" >
                        <label class="form-label" for="price">Cancel Order </label>
                        <select name="status_order" required class="form-control">
                            <option value="">--Select Status--</option>
                            <option @if($list[0]->status_order=='5') selected @endif value="5">Accept</option>
                            <option @if($list[0]->status_order=='555') selected @endif value="555">Cancel</option>
                        </select>
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


@endsection
