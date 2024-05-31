@extends('AdminLayout.index')

@section('content')
<style>
.form-label{
    font-weight:bold;
}
.container12 { 
    border:2px solid #ccc; 
    width:100%; height: 250px; 
    overflow-y: scroll; 
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div><h1>Create Product</h1></div>
                        <div>
                            <a href="{{url('product')}}" class="btn btn-link btn-soft-light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="20" height="20" viewBox="0 0 24 24">
                                    <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>
                                    <path d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z" stroke="currentColor"></path>
                                    <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"></path>
                                    <mask id="mask0_18_1038" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6"><path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"></path></mask>
                                    <g mask="url(#mask0_18_1038)"><path opacity="0.89" d="M13.5 12C14.3284 12 15 11.3284 15 10.5C15 9.67157 14.3284 9 13.5 9C12.6716 9 12 9.67157 12 10.5C12 11.3284 12.6716 12 13.5 12Z" fill="white"></path></g>
                                </svg>
                                View Product
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
    </div>                <!-- Nav Header Component End --><!--Nav End--></div>

    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Create Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="{{url('product/productsave')}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mt-3" >
                                <label class="form-label" for="price">Product Name<span style="color:red;">*</span>    </label>
                                <input type="text" class="form-control" name="name"  placeholder="Product Name" required>
                                @if($errors->has('name'))
                                    <div class="form-error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3" >
                                <label class="form-label" for="price">Product Code</label>
                                <input type="text" class="form-control" name="product_code"  placeholder="Product Code">
                                @if($errors->has('pcode'))
                                    <div class="form-error">{{ $errors->first('pcode') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3" >
                                <label class="form-label" for="price">HSN Code</label>
                                <input type="text" class="form-control" name="hsn"  placeholder="HSN Code">
                                @if($errors->has('hsn'))
                                    <div class="form-error">{{ $errors->first('hsn') }}</div>
                                @endif
                            </div>
                            <!-- Close -->
                            
                            <!-- Start add row-->
                            <div class="table-responsive" style="margin-top:20px;">
                                <table class="table table-bordered" id="dynamic_field">
                                <tr>
                                    <td>
                                        <label class="form-label" for="measurement">Measurement</label>
                                        <input type="text" class="form-control" name="measurement[]"  placeholder="" ></td>
                                    <td>
                                        <label class="form-label" for="price">Unit</label>
                                        <select name="unit[]" class="form-control">
                                            @foreach($unit as $urow)
                                            <option value="{{$urow->uid}}">{{$urow->unit_name}}</option>
                                            @endforeach
                                            <!-- <option value="kg">kg</option>
                                            <option value="mtr">mtr</option> -->
                                        </select>
                                    </td>
                                    <td>
                                        <label class="form-label">MRP<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="mrp_price[]" required>
                                    </td>
                                    <td>
                                        <label class="form-label" for="price">Selling Price<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="selling_price[]" required>
                                    </td>
                                    <td>
                                        <label class="form-label" for="price">Stock<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="stock[]" required>
                                    </td>
                                    <td>
                                        <label class="form-label" for="price">Status</label>
                                        <select name="pstatus[]" class="form-control" >
                                            <option value='1'>Available</option>
                                            <option value='0'>Sold Out</option>
                                        </select>
                                    </td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                                </tr>
                                </table>
                            </div>
                            <!-- Close add row-->

                            <!-- Start -->
                            <!-- <div class="col-md-12 mt-3">
                                <label class="form-label" for="price">Category<span style="color:red;">*</span></label>
                                <select name="category" id="cat" class="form-control" required>
                                    <option>--Select Super Category--</option>
                                    @foreach($list as $row)
                                    <option value="{{$row->cid}},{{$row->cat_name}}">{{$row->cat_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <div class="form-error">{{ $errors->first('category') }}</div>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="form-label" for="price">Sub Category</label>
                                <select name="sub_category" id="cat-id" class="form-control">
                                    <option value="">--Select Sub Category--</option>
                                </select>
                                @if($errors->has('sub_category'))
                                    <div class="form-error">{{ $errors->first('sub_category') }}</div>
                                @endif
                            </div> -->

                            <div class="col-md-12 mt-3">
                                <div class="container12" style="padding-left:10px;">
                                    @foreach($parent as $row)
                                        <br>
                                        <span style="font-weight:bold;color:#1d432b;">
                                            <input type="checkbox" name="cat[]" value="{{$row->sid}}" />
                                            {{$row->cname}}
                                        </span><br>
                                        @for($i=0; $i<count($child); $i++)
                                            @if($child[$i]->is_parent == $row->sid)
                                                <span style="margin-left:20px;"> 
                                                    <input type="checkbox" name="cat[]" value="{{$child[$i]->sid}}" />
                                                    {{$child[$i]->cname}}
                                                </span><br>
                                            @endif
                                        @endfor
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Manufacturer</label>
                                <input type="text"name="manufacturer" class="form-control">
                                @if($errors->has('manufacturer'))
                                    <div class="form-error">{{ $errors->first('manufacturer') }}</div>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Made In</label>
                                <select name="made_in"  class="form-control">
                                    <option value="india">India</option>
                                    <option value="china">China</option>
                                </select>
                                @if($errors->has('sub_category'))
                                    <div class="form-error">{{ $errors->first('sub_category') }}</div>
                                @endif
                            </div>
                            <!-- Close -->

                            <!--start-->
                            <hr style="border:1px solid;margin-top:20px;">
                            <div class="col-md-4 mt-3"><b>Select Shipping Type<span style="color:red;">*</span></b></div>
                            <div class="col-md-5 mt-3" >
                                <select name="shipping_type"  class="form-control" required>
                                    <option value="">--Select Option--</option>
                                    <option value="Local Shipping">Local Shipping</option>
                                    <option value="Standard Shipping">Standard Shipping</option>
                                </select>
                                @if($errors->has('sub_category'))
                                    <div class="form-error">{{ $errors->first('sub_category') }}</div>
                                @endif
                            </div>
                            <div style="clear:both;"></div><br>
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Delivery Places <span style="color:red;">*</span></label>
                                <select name="delivery_places" id="places" class="form-control" required>
                                    <option value="">--Select Option--</option>
                                    <option value="1">Pincode Included</option>
                                    <option value="2">Pincode Excluded</option>
                                    <option value="3">Includes All</option>
                                </select>
                                @if($errors->has('delivery_places'))
                                    <div class="form-error">{{ $errors->first('delivery_places') }}</div>
                                @endif
                            </div>
                            <div class="col-md-5 mt-3" >
                                <label class="form-label" for="delivery places">Select Pincode</label>
                                <select multiple="" name="pincode[]" id="del_place" class="form-select">
                                    <option value="">type in category name to search</option>
                                </select>
                            </div>
                            <hr style="border:1px solid;margin-top:20px;">
                            <!--close-->

                            <!--Start-->
                            <div class="col-md-4 mt3">
                                <label class="form-label" for="flexSwitchCheckDefault">Is Returnable? :</label>
                                <div class="form-check form-switch">
                                    <input name="returnable"  class="form-check-input" type="checkbox"  value="returnable" style="height: 2rem; width: 4rem;" role="switch" id="flexSwitchCheckChecked" />
                                </div>
                            </div>
                            <div class="col-md-4 mt3">
                                <label class="form-label" for="flexSwitchCheckDefault">Is cancel-able? :</label>
                                <div class="form-check form-switch">
                                    <input name="cancelable" class="form-check-input" type="checkbox" value="cancelable" style="height: 2rem; width: 4rem;" role="switch" id="flexSwitchCheckDefault" />
                                </div>
                            </div>
                            <div style="clear:both;"></div><br>
                            
                            <script>
                                // $(document).ready(function(){
                                //     $(".ret").click(function(){
                                //         $("#s").toggle();
                                //     });
                                // });
                            </script>

                            <div style="clear:both;"></div><br>
                            <div class="col-md-4 mt3">
                                <label class="form-label" for="flexSwitchCheckDefault">Is COD allowed? :</label>
                                <div class="form-check form-switch">
                                    <input name="cod_allowed" class="form-check-input" type="checkbox" style="height: 2rem; width: 4rem;" role="switch" id="flexSwitchCheckDefault" />
                                </div>
                            </div>
                            <div class="col-md-4 mt3">
                                <label class="form-label">Total allowed quantity : <span style='font-weight:normal;'>[Keep blank if no such limit]</span></label>
                                <input type="text" name="allowed_qty" class="form-control" />
                            </div>
                            <div style="clear:both;"></div><br>
                            <!-- Close-->

                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Product Image<span style="color:red;">*</span> 
                                &nbsp;<span style="font-weight:normal;">(Other Images of the Product: *Please choose square image of 850px*850px.) (jpg,png only)</span></label>
                                <input type="file" class="form-control" name="itemimage"  placeholder="Category Name" required>
                                @if($errors->has('itemimage'))
                                    <div class="form-error">{{ $errors->first('itemimage') }}</div>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Multiple Image &nbsp;<span style="font-weight:normal;">(Other Images of the Product: *Please choose square image of  850px*850px.) (jpg,png only)</span></label>
                                <input type="file" class="form-control" name="multi_image[]" multiple  placeholder="Category Name">
                                @if($errors->has('multi_image'))
                                    <div class="form-error">{{ $errors->first('multi_image') }}</div>
                                @endif
                            </div>
                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Upload Item List &nbsp;<span style="font-weight:normal;">(Only Select Image,Excel, PDF File.)</span></label>
                                <input type="file" class="form-control" name="bookpdf" accept="application/pdf,application/vnd.ms-excel,image/jpg, image/jpeg,image/png, image/PNG"  placeholder="">
                                @if($errors->has('bookpdf'))
                                    <div class="form-error">{{ $errors->first('bookpdf') }}</div>
                                @endif
                            </div>
                            <!-- Description start -->
                            <div class="col-md-6 mt-3" >
                                <label class="form-label" for="price">Short Description</label>
                                <textarea name="short_desc" class="ckeditor form-control"></textarea>
                                @if($errors->has('short_desc'))
                                    <div class="form-error">{{ $errors->first('short_desc') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mt-3" >
                                <label class="form-label" for="price">Full Description</label>
                                <textarea name="full_desc" class="ckeditor form-control"></textarea>
                                @if($errors->has('full_desc'))
                                    <div class="form-error">{{ $errors->first('full_desc') }}</div>
                                @endif
                            </div>
                            <!-- description close -->
                            <div class="" style="clear:both;"></div>

                            <!-- returnable -->
                            <div class="col-md-6 mt-3" >
                                <label class="form-label" for="price">Returnable Condition</label>
                                <textarea name="return_condition" class="ckeditor form-control"></textarea>
                            </div>
                            <div class="col-md-6 mt-3" >
                                <label class="form-label" for="price">Shipping</label>
                                <textarea name="shipping" class="ckeditor form-control"></textarea>
                            </div>
                            <div style="clear:both;"></div>
                            <!-- Submit button -->
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
    $('#cat').change(function()
    {
        var c_id = $('#cat').val();
        var myarr = c_id.split(",");
        var myvar = myarr[0];
        $("#cat-id").html('');
        if(c_id != '')
        {
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
                    $('#cat-id').html('<option value="">Select Sub Category</option>');
                        $.each(result.subcat, function (key, value) {
                            $("#cat-id").append('<option value="' + value
                               .sid +',' + value.subcat_name + '">' + value.subcat_name + '</option>');
                    });
                }
            });
        }
        // else
        // {
        //     $('#cat-id').html('<select name="cid" required><option value="">Select Category</option></select>');
        // }
    });
    
    //-- Start delivery places
    $('#places').change(function()
    {
        var places_id = $('#places').val();
        var status = '1';
        $("#places_id").html('');
        if(places_id != '3')
        {
            $.ajax({
                url:"https://workshipapp.awd.world/pincode/fetchPincode",
                type:"POST",
                data:{
                     mypin:status,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result)
                {
                    console.log(result);
                    $('#del_place').html('');
                        $.each(result.pin, function (key,value) {
                            $("#del_place").append('<option value="' + value
                                .pincode +'">' + value.pincode + '</option>');
                    });
                }
            });
        }
        else
        {
            $('#del_place').html('<option value="">type in category name to search</option>');
        }
    });
</script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
	i++;
	$('#dynamic_field').append('<tr id="row'+i+'"><td><label class="form-label">Measurement</label><input type="text" class="form-control" name="measurement[]"></td><td><label class="form-label">Unit</label><select name="unit[]" class="form-control"><?php foreach($unit as $urow){?><option value="<?php echo $urow->uid; ?>"><?php echo $urow->unit_name; ?></option><?php }?></select></td><td><label class="form-label">MRP<span style="color:red;">*</span></label><input type="number" class="form-control" name="mrp_price[]" required></td><td><label class="form-label">Selling Price<span style="color:red;">*</span></label><input type="number" class="form-control" name="selling_price[]" required></td><td><label class="form-label">Stock<span style="color:red;">*</span></label><input type="number" class="form-control" name="stock[]" required></td><td><label class="form-label">Status</label><select name="pstatus[]" class="form-control"><option value="1">Available</option><option value="0">Sold Out</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
});
	
$(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
	});
});
</script>

@endsection

