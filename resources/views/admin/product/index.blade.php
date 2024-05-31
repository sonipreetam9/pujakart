@extends('AdminLayout.index')

@section('content')
<style>
.fade {
    opacity: 0;
    -webkit-transition: opacity 0.15s linear;
    -o-transition: opacity 0.15s linear;
    transition: opacity 0.15s linear;
}
.fade.in {
    opacity: 1;
}
.close {
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 0.2;
}
.close:focus,
.close:hover {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    filter: alpha(opacity=50);
    opacity: 0.5;
}
button.close {
    padding: 0;
    cursor: pointer;
    background: 0 0;
    border: 0;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
.modal-open {
    overflow: hidden;
}
.modal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.modal.fade .modal-dialog {
    -webkit-transform: translate(0, -25%);
    -ms-transform: translate(0, -25%);
    -o-transform: translate(0, -25%);
    transform: translate(0, -25%);
    -webkit-transition: -webkit-transform 0.3s ease-out;
    -o-transition: -o-transform 0.3s ease-out;
    transition: -webkit-transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
    transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out, -o-transform 0.3s ease-out;
}
.modal.in .modal-dialog {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
}
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
}
.modal-dialog {
    position: relative;
    width: auto;
    margin: 10px;
}
.modal-content {
    position: relative;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #999;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    outline: 0;
}
.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
}
.modal-backdrop.fade {
    filter: alpha(opacity=0);
    opacity: 0;
}
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: 0.5;
}
.modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
}
.modal-header .close {
    margin-top: -2px;
}
.modal-title {
    margin: 0;
    line-height: 1.42857143;
}
.modal-body {
    position: relative;
    padding: 15px;
}
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
}
.modal-footer .btn + .btn {
    margin-bottom: 0;
    margin-left: 5px;
}
.modal-footer .btn-group .btn + .btn {
    margin-left: -1px;
}
.modal-footer .btn-block + .btn-block {
    margin-left: 0;
}
.modal-scrollbar-measure {
    position: absolute;
    top: -9999px;
    width: 50px;
    height: 50px;
    overflow: scroll;
}
@media (min-width: 768px) {
    .modal-dialog {
        width: 600px;
        margin: 30px auto;
    }
    .modal-content {
        -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    }
    .modal-sm {
        width: 300px;
    }
}
@media (min-width: 992px) {
    .modal-lg {
        width: 900px;
    }
}

p {
  width: 140px; 
  border: 1px solid #000000;
}
p.c {
  word-break: break-all;
}
/*# sourceMappingURL=bootstrap.min.css.map */

</style>
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Product</h1>
                        </div>
                        <div>
                            <a href="{{url('product/create_product')}}" class="btn btn-link btn-soft-light">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-32">
                                    <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                Add Product
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
               <h4 class="card-title">View Product</h4>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive border rounded">
                <table id="datatable" class="table " data-toggle="data-table">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>HSN Code</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Change</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $j=1; @endphp
                        @foreach ($list as $item) 
                        <tr>
                            <td><i class="fa fa-hashtag" style="font-size:11px;"></i>{{$j}}</td>
                            <td><img src="productImage/{{ $item->itemimage }}" alt="" class="img-fluid" style="width:50px;border:2px solid #e9e9e9;border-radius:8px;"> </td>
                            <td style="text-wrap:wrap">{{$item->name}}</td>
                            <td>{{$item->hsn}}</td>
                            <td  style="word-wrap:break-word;">
                                <div>
                                <select class="form-control">
                                <?php 
                                    $cat=$item->category;
                                    $cate= explode(',', $cat); 
                                    foreach($cate as $crow){
                                        $dd= Helper::fatchCat($crow);
                                        foreach($dd as $dds){
                                        ?>
                                            <option><?php echo $dds['cname']; ?></option>
                                            
                                        <?php
                                        }
                                    }
                                ?>
                                </select>
                                </div>
                            </td>
                            <td><!--color:#7016d0;   ₹  -->
                                <del><b style="color:#c03221;"><i class="fa fa-rupee" style="font-size:12px;font-weight:bold;"></i>{{$item->mrp_price}}</b></del>&nbsp; 
                                <span style="color:green;"><i class="fa fa-rupee" style="font-size:12px;font-weight:bold;"></i>{{$item->selling_price}}</span>
                            </td>
                            <td>@if($item->pstock==1) 
                                <span class="mt-2 badge bg-success">Available</span> 
                                @else 
                                <span class="mt-2 badge bg-danger">Sold Out</span> @endif
                            </td>
                            <td>@if($item->pstatus==1) 
                                <span class="mt-2 badge bg-success">Active</span> 
                                @else 
                                <span class="mt-2 badge bg-danger">Inactive</span> @endif
                            </td>
                            <td style="text-align:center;padding-top:18px;">
                                <a href="javascript:void(0)">
                                    <span class="m2" data-toggle="modal" data-target="#myModal{{$item->pid}}"><i class="fa fa-edit" style="font-size:19px;"></i></span>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('product/edit/'.$item->pid)}}"> 
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <a href="{{url('product/delete/'.$item->pid)}}" onclick="return confirm('Are you sure to Delete Permanently?')"> 
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" style="color:indianred;" viewBox="0 0 24 24">
                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </td>
                         </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal{{$item->pid}}" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Update Status</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            @csrf
                                            <button value="1" onclick="updateById(`3`, `{{$item->pid}}`)" class="mt-2 badge" style="font-size:16px;background:#7728cb;border:1px solid #7728cb;width:130px;">Active</button>
                                            <button value="2" onclick="updateById(`4`, `{{$item->pid}}`)" class="mt-2 badge bg-danger" style="font-size:16px;border:1px solid green;width:130px;">In Active</button>
                                            <br><br>
                                            <button value="3" onclick="updateById(`1`, `{{$item->pid}}`)" class="mt-2 badge" style="font-size:16px;background:#7728cb;border:1px solid #7728cb;width:130px;">In Stock</button>
                                            <button value="4" onclick="updateById(`0`, `{{$item->pid}}`)" class="mt-2 badge bg-success" style="font-size:16px;border:1px solid green;width:130px;">Out of Stock</button>
                                            <!-- <input type="text" value="{{$item->pid}}" id="pid"> -->
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @php $j++; @endphp
                         @endforeach
                         
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    function updateById(id, pid) {
        var val = id;
        var pid = pid;
        $.ajax({
            url:"https://workshipapp.awd.world/product/updateStatus",
            type:"POST",
            data:{
                pid:pid,
                val:val,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result)
            {
                //console.log(result);
                location.reload();
            }
        });
    }
</script>

@endsection





