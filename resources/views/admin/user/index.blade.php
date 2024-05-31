@extends('AdminLayout.index')

@section('content')
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h1>Users</h1>
                        </div>
                        <div>
                            <a href="javascript:void()" class="btn btn-link btn-soft-light">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-32">
                                    <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                Users
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
    </div>      <!-- Nav Header Component End -->
    <!--Nav End-->
</div>

<div class="content-inner container-fluid pb-0" id="page_layout">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header d-flex justify-content-between">
            <div class="header-title">
               <h4 class="card-title">View Users</h4>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive border rounded">
               <table id="datatable" class="table " data-toggle="data-table">
                  <thead>
                     <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    @php $i=1; @endphp
                    @foreach ($list as $row)
                        <tr>
                            <td>{{$i}} </td>
                            <td>{{$row->name}}</td> 
                            <td>{{$row->email}}</td>
                            <td>{{$row->mobile}}</td>
                            <td>@if($row->status==1) <span class="mt-2 badge bg-success">Active</span> @else <span class="mt-2 badge bg-danger">Inactive</span>@endif</td>
                            <td>
                                <a href="{{url('users/useredit/'.$row->id)}}"> 
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                                <a href="{{url('users/detail/'.$row->id)}}" style="font-size:18px;">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{url('users/delete/'.$row->id)}}" style="font-size:18px;" onclick="return confirm('Are you sure to Delete Permanently?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        
                            @php $i++; @endphp
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



@endsection

