@extends('AdminLayout.index')

@section('content')
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Edit Social Media</h1>
                        </div>
                        <div>
                            <a href="{{url('social_media_link')}}" class="btn btn-link btn-soft-light">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="20" height="20" viewBox="0 0 24 24">
                                <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>
                                <path d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z" stroke="currentColor"></path>
                                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"></path>
                                <mask id="mask0_18_1038" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6"><path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" fill="currentColor"></path></mask>
                                <g mask="url(#mask0_18_1038)"><path opacity="0.89" d="M13.5 12C14.3284 12 15 11.3284 15 10.5C15 9.67157 14.3284 9 13.5 9C12.6716 9 12 9.67157 12 10.5C12 11.3284 12.6716 12 13.5 12Z" fill="white"></path></g>
                            </svg>
                                View Social Media Link
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
                        <h4 class="card-title">Edit Social Media Link</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('socailmedia/socialupdate/'.$list[0]->id)}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label class="form-label" for="price">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{$list[0]->facebook}}" placeholder="Enter Facebook Link" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label" for="price">Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{$list[0]->instagram}}" placeholder="Enter Instagram Link" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label" for="price">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="{{$list[0]->twitter}}" placeholder="Enter Twitter Link" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label" for="price">Whatsapp No</label>
                                <input type="text" class="form-control" name="whatsapp" value="{{$list[0]->whatsapp}}" placeholder="Enter Whatsapp No" required>
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



@endsection

