@extends('AdminLayout.index')

@section('content')
<style type="text/css">
.table-container {
    height: 600px; /* Set the desired height for the container */
    overflow-y: scroll; /* Enable vertical scrolling */
    border: 1px solid #ccc; /* Add a border for visual clarity */
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ccc; /* Add borders to table cells for better visibility */
    padding: 2px;
    font-size: 11px;
    text-align: center; /* Center-align text within cells */
}
.selected
{
    background-color: #666;
    color: #fff;
}
</style>


    <div class="position-relative  iq-banner ">
        <div class="iq-navbar-header " style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>Product Order</h1>
                            </div>
                            <div>
                                <a href="{{url('product')}}" class="btn btn-link btn-soft-light">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-32">
                                        <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
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
        </div>  <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>

    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Product Order</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('product/product_order')}}" method="get" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">All</option>
                                        @foreach($cate as $crow)
                                        <option value="{{$crow->sid}}">{{$crow->cname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label>Sub Category</label>
                                    <select name="subcategory" class="form-control">
                                        <option value="">All</option>
                                        @foreach($subcate as $scrow)
                                        <option value="{{$scrow->sid}}">{{$scrow->cname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12" style="margin-top:20px;margin-bottom:10px;">
                                    <center><button type="submit" class="btn btn-primary">Search</button></center>
                                </div>
                            </div>
                        </form>
                        <form action="{{url('product/changeposition')}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 mt-3">
                                    <div class="table-container tblContainer" style="overflow:auto;">
                                        <table id="tblLocations" cellpadding="0" cellspacing="0"  border="1">
                                            <tr style="background-color:#e8e8e8 !important;">
                                                <th style="width:10%;padding:6px;font-size:14px;"><b>ID</b></th>
                                                <th style="font-size:14px;"><b>Product Name</b></th>
                                                <th style="width:15%;font-size:14px;"><b>Position</b></th>
                                            </tr>
                                            @if($search=="")
                                            <?php $i=1 ?>
                                            @foreach ($list as $item)
                                            <tr>
                                                <input type="hidden" name="p[]" value="{{$item->pid}}">
                                                <td id="pid[]"><strong>{{$item->pid}}</strong></td>
                                                <td>
                                                <img src="{{asset('productImage/'.$item->itemimage)}}" alt="" class="img-fluid" style="width:22px;border:2px solid #e9e9e9;border-radius:8px;">
                                                &nbsp;<b>{{$item->name}}</b></td>
                                                <td id="position[]">{{$i}}</td>
                                            </tr>
                                            <?php $i++;?>
                                            @endforeach
                                            @else
                                            <?php $i=1 ?>
                                            @foreach ($search as $item)
                                            <tr>
                                                <input type="hidden" name="p[]" value="{{$item->pid}}">
                                                <td id="pid[]"><strong>{{$item->pid}}</strong></td>
                                                <td>
                                                <img src="{{asset('productImage/'.$item->itemimage)}}" alt="" class="img-fluid" style="width:22px;border:2px solid #e9e9e9;border-radius:8px;">
                                                &nbsp;<b>{{$item->name}}</b></td>
                                                <td id="position[]">{{$i}}</td>
                                            </tr>
                                            <?php $i++;?>
                                            @endforeach
                                            @endif
                                        </table>
                                    </div>
                                </div>
                                <div style="clear:both;"></div>
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
    
    <script></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#tblLocations").sortable({
                items: 'tr:not(tr:first-child)',  
                cursor: 'pointer',
                axis: 'y',
                dropOnEmpty: false,
                start: function (e, ui) {
                    ui.item.addClass("selected");
                },
                stop: function (e, ui) {
                    ui.item.removeClass("selected");
                    $(this).find("tr").each(function (index) {
                        if (index > 0) {
                            $(this).find("td").eq(2).html(index);
                        }
                    });
                },
                scroll: true,
                scrollSensitivity: 80,
                scrollSpeed: 3,
                sort: function(event, ui) {
                    var currentScrollTop = $(".tblContainer").scrollTop(),
                        topHelper = ui.position.top,
                        delta = topHelper - currentScrollTop;
                    setTimeout(function() {
                        $(".tblContainer").scrollTop(currentScrollTop + delta);
                    }, 5);
                }
            });
        });
    </script>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
    
    <script>
        //   $(document).ready(function () {
        //   $("form").submit(function (event) {
        //   pos[]= $("#pid").html();
        //   alert(pos);
        //   $.ajax({
        //       type: "POST",
        //       url: "process.php",
        //       data: formData,
        //       dataType: "json",
        //       encode: true,
        //    }).done(function (data) {
        //       console.log(data);
        //    });
        //     event.preventDefault();
        //   });
    // });
    </script>
@endsection

