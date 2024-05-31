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
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Edit Product</h1>
                        </div>
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
    </div>                <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>

<div class="content-inner container-fluid pb-0" id="page_layout">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Product</h4>
                    </div>
                </div>
            
                <div class="card-body">
                    <form action="{{url('product/productupdate/'.$list[0]->pid)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mt-3" >
                                <label class="form-label" for="price">Product Name<span style="color:red;">*</span>    </label>
                                <input type="text" class="form-control" name="name" value="{{$list[0]->name}}" placeholder="Product Name" required>
                                @if($errors->has('name'))
                                    <div class="form-error">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3" >
                                <label class="form-label" for="price">Product Code</label>
                                <input type="text" class="form-control" name="product_code" value="{{$list[0]->product_code}}"  placeholder="Product Code">
                                @if($errors->has('product_code'))
                                    <div class="form-error">{{ $errors->first('product_code') }}</div>
                                @endif
                            </div>
                            <div class="col-md-4 mt-3" >
                                <label class="form-label" for="price">HSN Code</label>
                                <input type="text" class="form-control" name="hsn" value="{{$list[0]->hsn}}"  placeholder="HSN Code">
                                @if($errors->has('hsn'))
                                    <div class="form-error">{{ $errors->first('hsn') }}</div>
                                @endif
                            </div>
                            <!-- Close -->
                            
                            <!-- Start add row-->
                            <div class="table-responsive" style="margin-top:20px;">
                                <table class="table table-bordered" id="dynamic_field">
                                @php $i=1; @endphp
                                @foreach($list as $prow)
                                <tr>
                                    <td>
                                        <label class="form-label" for="measurement"><b>Measurement</b></label>
                                        <input type="text" class="form-control" name="measurement[]" value="{{$prow->pmeasurement}}"  placeholder="" ></td>
                                    <td>
                                        <label class="form-label" for="price">Unit<span style="color:red;">*</span></label>
                                        <select name="unit[]" class="form-control">
                                            @foreach($unit as $urow)
                                            <option  @if($prow->punit==$urow->unit_name) selected @endif value="{{$urow->uid}}">{{$urow->unit_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <label class="form-label">MRP<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="mrp_price[]" value="{{$prow->pmrp_price}}" required>
                                    </td>
                                    <td>
                                        <label class="form-label" for="price">Selling Price<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="selling_price[]"  value="{{$prow->pselling_price}}" required>
                                    </td>
                                    <td>
                                        <label class="form-label" for="price">Stock<span style="color:red;">*</span></label>
                                        <input type="number" class="form-control" name="stock[]"  value="{{$prow->pstock}}" required>
                                    </td>
                                    <td>
                                        <label class="form-label" for="price">Status</label>
                                        <select name="pstatus[]" class="form-control" >
                                            <option @if($prow->ppstatus==1) selected @endif value='1'>Available</option>
                                            <option @if($prow->ppstatus==0) selected @endif value='0'>Sold Out</option>
                                        </select>
                                    </td>
                                    <td>
                                        @if($i=='1')
                                        <button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                        @endif
                                        
                                        @if(count($list)=='1')
                                        
                                        @else
                                        <a href="{{url('product/stockdelete/'.$prow->psid)}}" id="add" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        @endif
                                    </td> 
                                </tr>
                                @php $i++ @endphp
                                <input type="hidden" name="psid[]" value="{{$prow->psid}}"  placeholder="" >
                                @endforeach
                                </table>
                            </div>
                            <!-- Close add row-->

                            <!--category-->
                            <div class="col-md-12 mt-3">
                                <div class="container12" style="padding-left:10px;padding-top:10px;">
                                    @php
                                        $pcat = $list[0]->category;
                                        $pcate = explode(',', $pcat);
                                    @endphp
                                    
                                    
                                    @foreach($parent as  $key=> $row)
                                        <br>
                                    <!--start : parent category-->
                                        <span style="font-weight:bold;color:#1d432b;">
                                            @foreach($pcate as $pdata) 
                                                @if($pdata == $row->sid)
                                                    <input type="checkbox" checked name="cat[]" value="{{$row->sid}}" />
                                                    {{$row->cname}}
                                                    @php 
                                                        $parentInputId = $row->sid;
                                                    @endphp
                                            
                                                @endif
                                             @endforeach
                                            
                                            @if(!empty($parentInputId))
                                                @if($row->sid == $parentInputId)
                                                    <!--{{$parentInputId}}-->
                                                @else
                                                    <input type="checkbox" name="cat[]" value="{{$row->sid}}" />
                                                        {{$row->cname}}
                                                @endif
                                            @else
                                                <input type="checkbox" name="cat[]" value="{{$row->sid}}" />
                                                        {{$row->cname}}
                                            @endif
                                        </span><br>
                                    <!--End : parent category-->
                                    <!--start : child category-->
                                        @for($i=0; $i<count($child); $i++)
                                            @if($child[$i]->is_parent == $row->sid)
                                                
                                                <span style="margin-left:20px;"> 
                                                
                                                   @foreach($pcate as $pdata) 
                                                        @if($pdata == $child[$i]->sid)
                                                            <input type="checkbox" checked name="cat[]" value="{{$child[$i]->sid}}" />
                                                            {{$child[$i]->cname}}
                                                            @php 
                                                                $checkedInputId = $child[$i]->sid;
                                                            @endphp
                                                        
                                                        @endif
                                                     @endforeach
                                                    
                                                    @if(!empty($checkedInputId))
                                                        @if($child[$i]->sid == $checkedInputId)
                                                            <!--{{$checkedInputId}}-->
                                                        @else
                                                            <input type="checkbox" name="cat[]" value="{{$child[$i]->sid}}" />
                                                                {{$child[$i]->cname}}
                                                        @endif
                                                    @else
                                                        <input type="checkbox" name="cat[]" value="{{$child[$i]->sid}}" />
                                                                {{$child[$i]->cname}}
                                                    @endif
                                                    
                                                </span><br>
                                            <!--End : child category-->
                                            @endif
                                        @endfor
                                    @endforeach
                                   
                                </div>
                            </div>

                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Manufacturer</label>
                                <input type="text"name="manufacturer" value="{{$list[0]->manufacturer}}" class="form-control">
                                
                            </div>
                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Made In</label>
                                <select name="made_in" class="form-control">
                                    <option @if($list[0]->made_in== 'India') selected @endif value="india">India</option>
                                    <option @if($list[0]->made_in== 'China') selected @endif value="china">China</option>
                                </select>
                            </div>
                            <!-- Close -->

                            <!--start-->
                            <hr style="border:1px solid;margin-top:20px;">
                            <div class="col-md-4 mt-3"><b>Select Shipping Type<span style="color:red;">*</span></b></div>
                            <div class="col-md-5 mt-3" >
                                <select name="shipping_type"  class="form-control" required>
                                    <option value="">--Select Option--</option>
                                    <option @if($list[0]->shipping_type== 'Local Shipping') selected @endif  value="Local Shipping">Local Shipping</option>
                                    <option @if($list[0]->shipping_type== 'Standard Shipping') selected @endif value="Standard Shipping">Standard Shipping</option>
                                </select>
                            </div>
                            <div style="clear:both;"></div><br>
                            <div class="col-md-4 mt-3">
                                <label class="form-label">Delivery Places <span style="color:red;">*</span></label>
                                <select name="delivery_places" id="places" class="form-control" required>
                                    <option value="">--Select Option--</option>
                                    <option @if($list[0]->delivery_places== 1) selected @endif value="1">Pincode Included</option>
                                    <option @if($list[0]->delivery_places== 2) selected @endif value="2">Pincode Excluded</option>
                                    <option @if($list[0]->delivery_places== 3) selected @endif value="3">Includes All</option>
                                </select>
                                @if($errors->has('delivery_places'))
                                    <div class="form-error">{{ $errors->first('delivery_places') }}</div>
                                @endif
                            </div>
                            <div class="col-md-5 mt-3" >
                                <label class="form-label" for="delivery places">Select Pincode</label>
                                <select multiple="" name="pincode[]" id="del_place" class="form-select">
                                    @if($list[0]->delivery_places== 3)
                                        <option value="">type in category name to search</option>
                                    @else
                                    <?php
                                        $pcategory=$list[0]->pincode;
                                        $pcat= explode(',', $pcategory);  
                                                                                                        
                                        if(!empty ($pinall)){
                                        foreach($pinall as $row11)
                                        {
                                        if(in_array($row11->pincode, $pcat)) 
                                        {
                                    ?>
                                            <option selected value="{{$row11->pincode}}">{{$row11->pincode}}</option>  
                                    <?php } else { ?>
                                            <option  value="{{$row11->pincode}}">{{$row11->pincode}}</option> 
                                    <?php }  } } ?>
                                    @endif
                                </select>
                            </div>
                            <hr style="border:1px solid;margin-top:20px;">
                            <!--close-->

                            <!--Start-->
                            <div class="col-md-4 mt3">
                                <label class="form-label" for="flexSwitchCheckDefault">Is Returnable? :</label>
                                <div class="form-check form-switch">
                                    <input name="returnable" @if($list[0]->returnable== 1) checked @endif class="form-check-input" type="checkbox"  value="returnable" style="height: 2rem; width: 4rem;" role="switch" id="flexSwitchCheckChecked" />
                                </div>
                            </div>
                            <div class="col-md-4 mt3">
                                <label class="form-label" for="flexSwitchCheckDefault">Is cancel-able? :</label>
                                <div class="form-check form-switch">
                                    <input name="cancelable" @if($list[0]->cancelable== 1) checked @endif class="form-check-input" type="checkbox" value="cancelable" style="height: 2rem; width: 4rem;" role="switch" id="flexSwitchCheckDefault" />
                                </div>
                            </div>
                            <div style="clear:both;"></div><br>
                            <div class="col-md-4 mt3">
                                <label class="form-label" for="flexSwitchCheckDefault">Is COD allowed? :</label>
                                <div class="form-check form-switch">
                                    <input name="cod_allowed" @if($list[0]->cod_allowed== 1) checked @endif class="form-check-input" type="checkbox" style="height: 2rem; width: 4rem;" role="switch" id="flexSwitchCheckDefault" />
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
                                &nbsp;<span style="font-weight:normal;">(Other Images of the Product: *Please choose square image of 850px*850px.)</span></label>
                                <input type="file" class="form-control" name="itemimage">
                                <img src="{{asset('productImage/'.$list[0]->itemimage)}}" alt="" class="img-fluid" style="width:100px;border:2px solid #e9e9e9;border-radius:8px;">
                                <input type="hidden" class="form-control" name="oldimage" value="{{$list[0]->itemimage}}">
                            </div>
                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Multiple Image &nbsp;<span style="font-weight:normal;">(Other Images of the Product: *Please choose square image of  850px*850px.)</span></label>
                                <input type="file" class="form-control" name="multi_image[]" multiple >
                                <input type="hidden" class="form-control" name="oldmultimage" value="{{$list[0]->multi_image}}">
                                <?php 
                                    $mimages = $list[0]->multi_image; 
                                    if(empty($mimages))
                                    {}
                                    else {
                                    $multi= explode(',',$mimages);
                                    foreach($multi as $rimage){
                                ?>
                                <img src="{{asset('multiImage/'.$rimage)}}" alt="" class="img-fluid" style="width:80px;height:80px;border:2px solid #e9e9e9;border-radius:8px;">
                                <?php } }?>
                            </div>

                            <div class="col-md-12 mt-3" >
                                <label class="form-label" for="price">Upload Item List
                                &nbsp;<span style="font-weight:normal;">(Only Select Image,Excel, PDF File.)</span></label>
                                <input type="file" class="form-control" name="bookpdf">
                                @if($list[0]->bookpdf != "")
                                <a href="{{asset('productImage/'.$list[0]->bookpdf)}}" alt="" target="_blank"><i class="fa fa-file" style="color:blue;font-size:22px;margin-top:5px;"></i></a>
                                @endif
                                <input type="hidden" class="form-control" name="oldpdf" value="{{$list[0]->bookpdf}}">
                            </div>

                            <!-- Description start -->
                            <div class="col-md-6 mt-3" >
                                <label class="form-label" for="price">Short Description</label>
                                <textarea name="short_desc" class="ckeditor form-control">{{$list[0]->short_desc}}</textarea>
                                @if($errors->has('short_desc'))
                                    <div class="form-error">{{ $errors->first('short_desc') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mt-3" >
                                <label class="form-label" for="price">Full Description</label>
                                <textarea name="full_desc" class="ckeditor form-control">{{$list[0]->full_desc}}</textarea>
                                @if($errors->has('full_desc'))
                                    <div class="form-error">{{ $errors->first('full_desc') }}</div>
                                @endif
                            </div>
                            <div class="col-md-6 mt-3" >
                                <label class="form-label" for="price">Returnable Condition</label>
                                <textarea name="return_condition" class="ckeditor form-control">{{$list[0]->return_condition}}</textarea>
                            </div>
                            <div class="col-md-6 mt-3" >
                                <label class="form-label" for="price">Shipping</label>
                                <textarea name="shipping" class="ckeditor form-control">{{$list[0]->shipping}}</textarea>
                            </div>
                            <!-- description close -->
                            <div class="" style="clear:both;"></div>
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
                               .cid +',' + value.subcat_name + '">' + value.subcat_name + '</option>');
                    });
                }
            });
        }
    });
    
   //-- Start delivery places  {{url('pincode/fetchPincode')}}
   
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
	$('#dynamic_field').append('<tr id="row'+i+'"><td><label class="form-label">Measurement</label><input type="text" class="form-control" name="measurement1[]"></td><td><label class="form-label">Unit</label><select name="newunit[]" class="form-control"><?php foreach($unit as $urow){?><option value="<?php echo $urow->uid; ?>"><?php echo $urow->unit_name; ?></option><?php }?></select></td><td><label class="form-label">MRP<span style="color:red;">*</span></label><input type="number" class="form-control" name="mrp_price1[]" required></td><td><label class="form-label">Selling Price<span style="color:red;">*</span></label><input type="number" class="form-control" name="selling_price1[]" required></td><td><label class="form-label">Stock<span style="color:red;">*</span></label><input type="number" class="form-control" name="stock1[]" required></td><td><label class="form-label">Status</label><select name="pstatus1[]" class="form-control"><option value="1">Available</option><option value="0">Sold Out</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
});
	
$(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
	});
});
</script>
@endsection

