@extends('AdminLayout.index')

@section('content')
<div class="position-relative  iq-banner ">
<div class="iq-navbar-header " style="height: 215px;">
                        <div class="container-fluid iq-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                                        <div>
                                            <h1>Edit Promocode</h1>
                                        </div>
                                        <div>
                                            <a href="{{url('promocode')}}" class="btn btn-link btn-soft-light">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z" fill="currentColor"></path>
                                                    <path opacity="0.4" d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z" fill="currentColor"></path>
                                                </svg>
                                                View Promocode
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
               <h4 class="card-title">Edit Promocode</h4>
            </div>
         </div>
            
        <div class="card-body">
        <form action="{{url('promocode/promoupdate/'.$list[0]->pcid)}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6 mt-3" >
                <label class="form-label" for="price">Promocode</label>
                <input type="text" class="form-control" name="promocode" value="{{$list[0]->promocode}}" placeholder="Oem Brand Name" required>
                @if($errors->has('promocode'))
                     <div class="form-error">{{ $errors->first('promocode') }}</div>
                @endif
            </div>
            <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">Message</label>
                    <input type="text" class="form-control" name="message" value="{{$list[0]->message}}" placeholder="">
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">Start Date</label>
                    <input type="date" class="form-control" name="start_date" value="{{$list[0]->start_date}}" placeholder="">
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">End Date</label>
                    <input type="date" class="form-control" name="end_date" value="{{$list[0]->end_date}}" placeholder="">
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">No. Of Users</label>
                    <input type="number" class="form-control" name="no_of_user" value="{{$list[0]->no_of_user}}" placeholder="">
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">Minimum Order Amount</label>
                    <input type="number" class="form-control" name="min_amount" value="{{$list[0]->min_amount}}" placeholder="">
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">Discount</label>
                    <input type="number" class="form-control" name="discount" value="{{$list[0]->discount}}"  placeholder="">
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">Discount Type</label>
                    <select name="discount_type" class="form-control" required>
                        <option value="">Select</option>
                        <option  @if($list[0]->discount_type== 'Percentage') selected @endif value="Percentage">Percentage</option>
                        <option  @if($list[0]->discount_type== 'Amount') selected @endif value="Amount">Amount</option>
                    </select>
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">Max Discount Amount</label>
                    <input type="text" class="form-control" name="max_dis_amount" value="{{$list[0]->max_dis_amount}}" placeholder="">
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">Repeat Usage</label>
                    <select name="repeat_usage" class="form-control" required  id="test" onchange="showDiv('hidden_div', this)">
                        <option value="">Select</option>
                        <option @if($list[0]->repeat_usage== 1) selected @endif value="1">Allowed</option>
                        <option @if($list[0]->repeat_usage== 0) selected @endif value="0">Not Allowed</option>
                    </select>
                </div>
                <div class="col-md-6 mt-3" >
                    <label class="form-label" for="price">Status</label>
                    <select name="status" class="form-control" required>
                        <option @if($list[0]->status== 1) selected @endif value="1">Active</option>
                        <option @if($list[0]->status== 0) selected @endif value="0">Inactive</option>
                    </select>
                    @if($errors->has('status'))
                        <div class="form-error">{{ $errors->first('status') }}</div>
                    @endif
                </div>
                
                <div class="col-md-6 mt-3"  id="hidden_div" @if($list[0]->repeat_usage==1) style="display: block;" @else style="display: none;" @endif>
                    <label class="form-label" for="price">No. Of Repeat Usage</label>
                    <input type="number" class="form-control" name="no_of_repeat_usage" value="{{$list[0]->no_of_repeat_usage}}">
                </div>
                
                <div style="clear:both"></div>
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

<script>
    document.getElementById('test').addEventListener('change', function () {
    var style = this.value == 1 ? 'block' : 'none';
    document.getElementById('hidden_div').style.display = style;
});
</script>


@endsection

