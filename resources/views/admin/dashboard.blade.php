@extends('AdminLayout.index')

@section('content')

<style>
    .mycc{
        background: #7016d0;
        /*width: 40px;*/
        border-radius: 50%;
        /*height: 40px;*/
        color: #ffffff;
        padding: 10px;
    }
</style>

<div class="content-inner container-fluid pb-0" id="page_layout">
<div class="d-flex justify-content-between align-items-center flex-wrap mb-5 gap-3">
    <div class="d-flex flex-column">
        <h3>Pujakart</h3>
        <p class="mb-0">Dashboard</p>
    </div>
    <div class="d-flex justify-content-between align-items-center rounded flex-wrap gap-3">
        <!--<div class="form-group mb-0">
            <select class="select2-basic-single js-states form-control" name="state" style="width: 100%;">
                <option >Past 30 Days</option>
                <option >Past 90 Days</option>
                <option >Past 1 year</option>
                <option >Past 2 year</option>
            </select>
        </div>
        <div class="form-group mb-0">
            <input type="text" name="start" class="form-control range_flatpicker flatpickr-input active" placeholder="24 Jan 2022 to 23 Feb 2022" readonly="readonly">
        </div>
        <button type="button" class="btn btn-primary">Analytics</button>-->
    </div>
</div>
<div class="row">
    
    <div class="col-lg-2">
        <div class="card card-block card-stretch text-center" style="padding-top:10px;">
            <strong>Users</strong>
            <br>
            <center><span class="mycc">{{ count($user)}}</span></center>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card card-block card-stretch text-center" style="padding-top:10px;">
            <strong>Enquiry</strong><br>
            <center><span class="mycc">{{ count($help)}}</span></center>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card card-block card-stretch text-center" style="padding-top:10px;">
            <strong>Products</strong><br>
            <center><span class="mycc">{{ count($product)}}</span></center>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card card-block card-stretch text-center" style="padding-top:10px;">
            <strong>Slider</strong><br>
            <center><span class="mycc">{{ count($slider)}}</span></center>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card card-block card-stretch text-center" style="padding-top:10px;">
            <strong>Category</strong><br>
            <center><span class="mycc">{{ count($category)}}</span></center>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card card-block card-stretch text-center" style="padding-top:10px;">
            <strong>Orders</strong><br>
            <center><span class="mycc">{{ count($order)}}</span></center>
        </div>
    </div>
    
    <div class="col-lg-8 col-xl-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                    <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4>Sales Stastics</h4>
                        </div>
                         <div class="d-flex">
                            <div class="mx-3">
                                <p class="mb-0"><svg class="text-primary" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="5" cy="5" r="5" fill="currentColor"/>
                                    </svg>  Total Sales </p>
                            </div>
                            <div class="mx-3">
                                <p class="mb-0"><svg class="text-secondary" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="5" cy="5" r="5" fill="currentColor"/>
                                    </svg> Total Expense</p>
                            </div>
                            <div class="">
                                <p class="mb-0"><svg  class="text-tertiray" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="5" cy="5" r="5" fill="currentColor"/>
                                    </svg>  Total Profit</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sales-chart-02"  class="sales-chart-02"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                    <h4 class=" card-title">Date</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="course-picker">
                    <input type="hidden" name="inline" class="d-none inline_flatpickr">
                </div>
            </div>
        </div>
    </div>
    <!--<div class="col-lg-4">-->
    <!--    <div class="card card-block card-stretch card-height">-->
    <!--        <div class="card-body">-->
    <!--            <div class="mb-5">-->
    <!--                <div class="mb-2 d-flex justify-content-between align-items-center">-->
    <!--                    <span class="text-dark">Last Transaction</span>-->
    <!--                    <a class="badge rounded-pill bg-soft-primary" href="javascript:void(0);">-->
    <!--                        View Report-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--                <div class="">-->
    <!--                    <h2 class="counter mb-2" style="visibility: visible;">$46,996</h2>-->
    <!--                    <p>This Month</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div>-->
    <!--                <div class="d-flex gap flex-column">-->
    <!--                <div class="d-flex align-items-center gap-3">-->
    <!--                    <div class="bg-soft-primary avatar-60 rounded">-->
    <!--                        <svg class="icon-35" width="35" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>-->
    <!--                            <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>-->
    <!--                            <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>-->
    <!--                        </svg>-->
    <!--                    </div>-->
    <!--                    <div style="width: 100%;">-->
    <!--                        <div class="d-flex justify-content-between  ">-->
    <!--                            <h6 class="mb-2">Balance</h6>-->
    <!--                            <h6 class="text-body">$2,386</h6>-->
    <!--                        </div>-->
    <!--                        <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="23" aria-valuemin="0" aria-valuemax="100" style="width: 23%;transition: width 2s ease 0s;"></div>-->
    <!--                        </div>-->
    <!--                    </div> -->
    <!--                </div>-->
    <!--                <div class="d-flex align-items-center gap-3">-->
    <!--                    <div class="bg-soft-info avatar-60 rounded">                            -->
    <!--                            <svg class="icon-35" width="35" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                            <path opacity="0.4" d="M6.447 22C3.996 22 2 19.9698 2 17.4755V12.5144C2 10.0252 3.99 8 6.437 8L17.553 8C20.005 8 22 10.0302 22 12.5256V17.4846C22 19.9748 20.01 22 17.563 22H16.623H6.447Z" fill="currentColor"></path>-->
    <!--                            <path d="M11.455 2.22103L8.54604 5.06682C8.24604 5.36094 8.24604 5.83427 8.54804 6.12742C8.85004 6.41959 9.33704 6.41862 9.63704 6.12547L11.23 4.56623V6.06119V14.4515C11.23 14.8654 11.575 15.2014 12 15.2014C12.426 15.2014 12.77 14.8654 12.77 14.4515V4.56623L14.363 6.12547C14.663 6.41862 15.15 6.41959 15.452 6.12742C15.603 5.98036 15.679 5.78849 15.679 5.59566C15.679 5.40477 15.603 5.21291 15.454 5.06682L12.546 2.22103C12.401 2.07981 12.205 1.99995 12 1.99995C11.796 1.99995 11.6 2.07981 11.455 2.22103Z" fill="currentColor"></path>-->
    <!--                            </svg>                            -->
    <!--                    </div>-->
    <!--                    <div style="width: 100%;">-->
    <!--                        <div class="d-flex justify-content-between  ">-->
    <!--                            <h6 class="mb-2">Transfer</h6>-->
    <!--                            <h6 class="text-body">$4,765</h6>-->
    <!--                        </div>-->
    <!--                        <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-info" data-toggle="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;transition: width 2s ease 0s;"></div>-->
    <!--                        </div>-->
    <!--                    </div> -->
    <!--                </div><div class="d-flex align-items-center gap-3">-->
    <!--                    <div class="bg-soft-success avatar-60 rounded">     -->
    <!--                        <svg class="icon-35" width="35" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                            <path opacity="0.4" d="M17.554 7.29614C20.005 7.29614 22 9.35594 22 11.8876V16.9199C22 19.4453 20.01 21.5 17.564 21.5L6.448 21.5C3.996 21.5 2 19.4412 2 16.9096V11.8773C2 9.35181 3.991 7.29614 6.438 7.29614H7.378L17.554 7.29614Z" fill="currentColor"></path>-->
    <!--                            <path d="M12.5464 16.0374L15.4554 13.0695C15.7554 12.7627 15.7554 12.2691 15.4534 11.9634C15.1514 11.6587 14.6644 11.6597 14.3644 11.9654L12.7714 13.5905L12.7714 3.2821C12.7714 2.85042 12.4264 2.5 12.0004 2.5C11.5754 2.5 11.2314 2.85042 11.2314 3.2821L11.2314 13.5905L9.63742 11.9654C9.33742 11.6597 8.85043 11.6587 8.54843 11.9634C8.39743 12.1168 8.32142 12.3168 8.32142 12.518C8.32142 12.717 8.39743 12.9171 8.54643 13.0695L11.4554 16.0374C11.6004 16.1847 11.7964 16.268 12.0004 16.268C12.2054 16.268 12.4014 16.1847 12.5464 16.0374Z" fill="currentColor"></path>-->
    <!--                        </svg>-->
    <!--                    </div>-->
    <!--                    <div style="width: 100%;">-->
    <!--                        <div class="d-flex justify-content-between  ">-->
    <!--                            <h6 class="mb-2">Recived</h6>-->
    <!--                            <h6 class="text-body">$8,224</h6>-->
    <!--                        </div>-->
    <!--                        <div class="progress bg-soft-success shadow-none w-100" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100" style="width: 82%;transition: width 2s ease 0s;"></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            <div class="d-flex align-items-center gap-3">-->
    <!--                    <div class="bg-soft-danger avatar-60 rounded">     -->
    <!--                        <svg class="icon-35" width="35" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>-->
    <!--                            <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>-->
    <!--                            <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>-->
    <!--                        </svg>-->
    <!--                    </div>-->
    <!--                    <div style="width: 100%;">-->
    <!--                        <div class="d-flex justify-content-between  ">-->
    <!--                            <h6 class="mb-2">Outstanding</h6>-->
    <!--                            <h6 class="text-body">$1,224</h6>-->
    <!--                        </div>-->
    <!--                        <div class="progress bg-soft-danger shadow-none w-100" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-danger" data-toggle="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 10%;transition: width 2s ease 0s;"></div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div></div>-->
    <!--            </div>-->
    <!--        </div>-->
            
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="col-lg-8">-->
    <!--    <div class="card card-block card-stretch card-height">-->
    <!--        <div class="flex-wrap card-header d-flex justify-content-between border-0">-->
    <!--            <div class="header-title">-->
    <!--                <h4 class=" card-title">Sales Order</h4>           -->
    <!--            </div>-->
    <!--            <div class="dropdown">-->
    <!--                <span class="dropdown-toggle" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false" role="button"> Monthly-->
    <!--                </span>-->
    <!--                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton7">-->
    <!--                <a class="dropdown-item " href="javascript:void(0);">This Week</a>-->
    <!--                <a class="dropdown-item " href="javascript:void(0);">This Month</a>-->
    <!--                <a class="dropdown-item " href="javascript:void(0);">This Year</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="card-body pt-0">-->
    <!--            <div class=" table-responsive border rounded">-->
    <!--                <table id="basic-table" class="table mb-0 table-striped" role="grid">-->
    <!--                <thead>-->
    <!--                    <tr>-->
    <!--                        <th>COMPANIES</th>-->
    <!--                        <th>CONTACTS</th>-->
    <!--                        <th>ORDER</th>-->
    <!--                        <th>COMPLETION</th>-->
    <!--                    </tr>-->
    <!--                </thead>-->
    <!--                <tbody>-->
    <!--                    <tr>-->
    <!--                        <td>-->
    <!--                            <div class="d-flex align-items-center">-->
    <!--                            <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="../assets/images/shapes/01.png" alt="profile">-->
    <!--                            <h6>Addidis Sportwear</h6>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>-->
    <!--                            <div class="iq-media-group iq-media-group-1">-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">SP</div>-->
    <!--                            </a>-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">PP</div>-->
    <!--                            </a>-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">MM</div>-->
    <!--                            </a>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>$14,000</td>-->
    <!--                        <td>-->
    <!--                            <div class="mb-2 d-flex align-items-center">-->
    <!--                            <h6>60%</h6>-->
    <!--                            </div>-->
    <!--                            <div class="shadow-none progress bg-soft-primary w-100" style="height: 4px">-->
    <!--                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                    </tr>-->
    <!--                    <tr>-->
    <!--                        <td>-->
    <!--                            <div class="d-flex align-items-center">-->
    <!--                            <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="../assets/images/shapes/05.png" alt="profile">-->
    <!--                            <h6>Netflixer Platforms</h6>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>-->
    <!--                            <div class="iq-media-group iq-media-group-1">-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">SP</div>-->
    <!--                            </a>-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">PP</div>-->
    <!--                            </a>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>$30,000</td>-->
    <!--                        <td>-->
    <!--                            <div class="mb-2 d-flex align-items-center">-->
    <!--                            <h6>25%</h6>-->
    <!--                            </div>-->
    <!--                            <div class="shadow-none progress bg-soft-primary w-100" style="height: 4px">-->
    <!--                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                    </tr>-->
    <!--                    <tr>-->
    <!--                        <td>-->
    <!--                            <div class="d-flex align-items-center">-->
    <!--                            <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="../assets/images/shapes/02.png" alt="profile">-->
    <!--                            <h6>Shopifi Stores</h6>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>                                 -->
    <!--                            <div class="iq-media-group iq-media-group-1">-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">PP</div>-->
    <!--                            </a>-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">TP</div>-->
    <!--                            </a>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>$8,500</td>-->
    <!--                        <td>-->
    <!--                            <div class="mb-2 d-flex align-items-center">-->
    <!--                            <h6>100%</h6>-->
    <!--                            </div>-->
    <!--                            <div class="shadow-none progress bg-soft-success w-100" style="height: 4px">-->
    <!--                            <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                    </tr>-->
    <!--                    <tr>-->
    <!--                        <td>-->
    <!--                            <div class="d-flex align-items-center">-->
    <!--                            <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="../assets/images/shapes/03.png" alt="profile">-->
    <!--                            <h6>Bootstrap Technologies</h6>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>-->
    <!--                            <div class="iq-media-group iq-media-group-1">-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">SP</div>-->
    <!--                            </a>-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">PP</div>-->
    <!--                            </a>-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">MM</div>-->
    <!--                            </a>-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">TP</div>-->
    <!--                            </a>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>$20,500</td>-->
    <!--                        <td>-->
    <!--                            <div class="mb-2 d-flex align-items-center">-->
    <!--                            <h6>100%</h6>-->
    <!--                            </div>-->
    <!--                            <div class="shadow-none progress bg-soft-success w-100" style="height: 4px">-->
    <!--                            <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                    </tr>-->
    <!--                    <tr>-->
    <!--                        <td>-->
    <!--                            <div class="d-flex align-items-center">-->
    <!--                            <img class="rounded bg-soft-primary img-fluid avatar-40 me-3" src="../assets/images/shapes/04.png" alt="profile">-->
    <!--                            <h6>Community First</h6>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>-->
    <!--                            <div class="iq-media-group iq-media-group-1">-->
    <!--                            <a href="#" class="iq-media-1">-->
    <!--                                <div class="icon iq-icon-box-3 rounded-pill">MM</div>-->
    <!--                            </a>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                        <td>$9,800</td>-->
    <!--                        <td>-->
    <!--                            <div class="mb-2 d-flex align-items-center">-->
    <!--                            <h6>75%</h6>-->
    <!--                            </div>-->
    <!--                            <div class="shadow-none progress bg-soft-primary w-100" style="height: 4px">-->
    <!--                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                            </div>-->
    <!--                        </td>-->
    <!--                    </tr>-->
    <!--                </tbody>-->
    <!--                </table>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="col-lg-4 col-md-6 col-sm-12">-->
    <!--    <div class="card card-block card-stretch card-height">-->
    <!--        <div class="flex-wrap card-header d-flex justify-content-between align-items-center">-->
    <!--            <div class="header-title">-->
    <!--                <h4>Sales Anylsis</h4>-->
    <!--            </div>-->
    <!--            <div class="dropdown">-->
    <!--                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton29" data-bs-toggle="dropdown" aria-expanded="false">All Tasks</a>-->
    <!--                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton29" style="">-->
    <!--                <li><a class="dropdown-item" href="#">This Week</a></li>-->
    <!--                <li><a class="dropdown-item" href="#">This Month</a></li>-->
    <!--                <li><a class="dropdown-item" href="#">This Year</a></li>-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="card-body">-->
    <!--            <div id="sales-chart-04" class="sales-chart-04"></div>-->
    <!--        </div>-->
    <!--    </div> -->
    <!--</div>-->
    <!--<div class="col-lg-4 col-md-6 col-sm-12">-->
    <!--    <div class="card card-block card-stretch card-height">-->
    <!--        <div class="flex-wrap card-header d-flex justify-content-between align-items-center">-->
    <!--            <div class="header-title">-->
    <!--                <h4>To-Do List</h4>-->
    <!--            </div>-->
    <!--            <div class="dropdown">-->
    <!--                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton24" data-bs-toggle="dropdown" aria-expanded="false">All Tasks</a>-->
    <!--                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton24" style="">-->
    <!--                <li><a class="dropdown-item" href="#">This Week</a></li>-->
    <!--                <li><a class="dropdown-item" href="#">This Month</a></li>-->
    <!--                <li><a class="dropdown-item" href="#">This Year</a></li>-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="card-body">-->
    <!--            <div class="d-flex justify-content-between  mb-3">-->
    <!--                <div class="w-100">-->
    <!--                    <h6>School Dashboard</h6>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                        <div class="progress bg-soft-success shadow-none w-50" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                        </div>-->
    <!--                            <small class="ms-2">80% completed</small>-->
    <!--                        </div>-->
    <!--                        <small>Due in 3 Days</small>-->
    <!--                    </div>-->
    <!--                    <div class="dropdown">-->
    <!--                        <a href="#" class="text-gray" id="dropdownMenuButton25" data-bs-toggle="dropdown" aria-expanded="false"><svg width="22" height="5" viewBox="0 0 22 5" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z" fill="currentColor"/>-->
    <!--                            </svg>-->
    <!--                        </a>-->
    <!--                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton25" style="">-->
    <!--                        <li><a class="dropdown-item" href="#">This Week</a></li>-->
    <!--                        <li><a class="dropdown-item" href="#">This Month</a></li>-->
    <!--                        <li><a class="dropdown-item" href="#">This Year</a></li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex justify-content-between  mb-3">-->
    <!--                <div class="w-100">-->
    <!--                    <h6>Fashion Theme</h6>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                        <div class="progress bg-soft-danger shadow-none w-50" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-danger" data-toggle="progress-bar" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                        </div>-->
    <!--                        <small class="ms-2">15% completed</small>-->
    <!--                    </div>-->
    <!--                    <small>Due in 4 Days</small>-->
    <!--                </div>-->
    <!--                <div class="dropdown">-->
    <!--                    <a href="#" class="text-gray" id="dropdownMenuButton61" data-bs-toggle="dropdown" aria-expanded="false"><svg width="22" height="5" viewBox="0 0 22 5" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z" fill="currentColor"/>-->
    <!--                        </svg>-->
    <!--                    </a>-->
    <!--                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton61" style="">-->
    <!--                    <li><a class="dropdown-item" href="#">This Week</a></li>-->
    <!--                    <li><a class="dropdown-item" href="#">This Month</a></li>-->
    <!--                    <li><a class="dropdown-item" href="#">This Year</a></li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex justify-content-between  mb-3">-->
    <!--                <div class="w-100">-->
    <!--                    <h6>Sidebar Patterns</h6>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                        <div class="progress bg-soft-primary shadow-none w-50" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                        </div>-->
    <!--                        <small class="ms-2">50% completed</small>-->
    <!--                    </div>-->
    <!--                    <small>Due in 2 Days</small>-->
    <!--                </div>-->
    <!--                <div class="dropdown">-->
    <!--                    <a href="#" class="text-gray" id="dropdownMenuButton62" data-bs-toggle="dropdown" aria-expanded="false"><svg width="22" height="5" viewBox="0 0 22 5" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z" fill="currentColor"/>-->
    <!--                        </svg>-->
    <!--                    </a>-->
    <!--                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton62" style="">-->
    <!--                    <li><a class="dropdown-item" href="#">This Week</a></li>-->
    <!--                    <li><a class="dropdown-item" href="#">This Month</a></li>-->
    <!--                    <li><a class="dropdown-item" href="#">This Year</a></li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex justify-content-between  mb-3">-->
    <!--                <div class="w-100">-->
    <!--                    <h6>Menu Bar Update</h6>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                        <div class="progress bg-soft-gray shadow-none w-50" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-secondary" data-toggle="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                        </div>-->
    <!--                        <small class="ms-2">35% completed</small>-->
    <!--                    </div>-->
    <!--                    <small>Due in 5 Days</small>-->
    <!--                </div>-->
    <!--                <div class="dropdown">-->
    <!--                    <a href="#" class="text-gray" id="dropdownMenuButton63" data-bs-toggle="dropdown" aria-expanded="false"><svg width="22" height="5" viewBox="0 0 22 5" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z" fill="currentColor"/>-->
    <!--                        </svg>-->
    <!--                    </a>-->
    <!--                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton63" style="">-->
    <!--                    <li><a class="dropdown-item" href="#">This Week</a></li>-->
    <!--                    <li><a class="dropdown-item" href="#">This Month</a></li>-->
    <!--                    <li><a class="dropdown-item" href="#">This Year</a></li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex justify-content-between">-->
    <!--                <div class="w-100">-->
    <!--                    <h6>Blog Theme</h6>-->
    <!--                    <div class="d-flex align-items-center">-->
    <!--                        <div class="progress bg-soft-success shadow-none w-50" style="height: 6px">-->
    <!--                            <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>-->
    <!--                        </div>-->
    <!--                        <small class="ms-2">100% completed</small>-->
    <!--                    </div>-->
    <!--                    <small>Due in 1 Days</small>-->
    <!--                </div>-->
    <!--                <div class="dropdown">-->
    <!--                    <a href="#" class="text-gray" id="dropdownMenuButton64" data-bs-toggle="dropdown" aria-expanded="false"><svg width="22" height="5" viewBox="0 0 22 5" fill="none" xmlns="http://www.w3.org/2000/svg">-->
    <!--                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6788 5C20.9595 5 22 3.96222 22 2.68866C22 1.41318 20.9595 0.373465 19.6788 0.373465C18.3981 0.373465 17.3576 1.41318 17.3576 2.68866C17.3576 3.96222 18.3981 5 19.6788 5ZM11.0005 5C12.2812 5 13.3217 3.96222 13.3217 2.68866C13.3217 1.41318 12.2812 0.373465 11.0005 0.373465C9.71976 0.373465 8.67929 1.41318 8.67929 2.68866C8.67929 3.96222 9.71976 5 11.0005 5ZM4.64239 2.68866C4.64239 3.96222 3.60192 5 2.3212 5C1.04047 5 0 3.96222 0 2.68866C0 1.41318 1.04047 0.373465 2.3212 0.373465C3.60192 0.373465 4.64239 1.41318 4.64239 2.68866Z" fill="currentColor"/>-->
    <!--                        </svg>-->
    <!--                    </a>-->
    <!--                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton64" style="">-->
    <!--                    <li><a class="dropdown-item" href="#">This Week</a></li>-->
    <!--                    <li><a class="dropdown-item" href="#">This Month</a></li>-->
    <!--                    <li><a class="dropdown-item" href="#">This Year</a></li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div> -->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="col-lg-4 col-md-12 col-sm-12">-->
    <!--    <div class="card">-->
    <!--        <div class="flex-wrap card-header d-flex justify-content-between">-->
    <!--            <div class="header-title">-->
    <!--                <h4>Actvity Overview</h4>-->
                    
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="card-body">-->
    <!--            <p class=" text-success mb-4">-->
    <!--                <svg class ="me-2" width="24" height="24" viewBox="0 0 24 24">-->
    <!--                <path fill="#17904b" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />-->
    <!--                </svg>-->
    <!--                16% this month-->
    <!--            </p>-->
    <!--            <div class="d-flex align-items-top">-->
    <!--                <h6 class="mb-0 text-left">07:45</h6>-->
    <!--                <div class="profile-media ms-3 d-flex">-->
    <!--                    <div class="profile-dots-pills border-success"></div>-->
    <!--                    <div class="ms-3">-->
    <!--                        <h6 class="mb-0">$2400, Purchased a Wordpress Theme</h6>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex align-items-top">-->
    <!--                <h6 class="mb-0 text-left">08:50</h6>-->
    <!--                <div class="profile-media ms-3 d-flex">-->
    <!--                    <div class="profile-dots-pills border-warning"></div>-->
    <!--                    <div class="ms-3">-->
    <!--                        <h6 class="mb-0">New order placed #8744152 of 3D Icons</h6>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex align-items-top">-->
    <!--                <h6 class="mb-0 text-left">10:00</h6>-->
    <!--                <div class="profile-media ms-3 d-flex">-->
    <!--                    <div class="profile-dots-pills border-info"></div>-->
    <!--                    <div class="ms-3">-->
    <!--                        <h6 class="mb-0">Affilate Payout</h6>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex align-items-top">-->
    <!--                <h6 class="mb-0 text-left">13:15</h6>-->
    <!--                <div class="profile-media ms-3 d-flex">-->
    <!--                    <div class="profile-dots-pills border-dark"></div>-->
    <!--                    <div class="ms-3">-->
    <!--                        <h6 class="mb-0">New user added in Qompac UI</h6>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex align-items-top">-->
    <!--                <h6 class="mb-0 text-left">15:30</h6>-->
    <!--                <div class="profile-media ms-3 d-flex">-->
    <!--                    <div class="profile-dots-pills border-success"></div>-->
    <!--                    <div class="ms-3">-->
    <!--                        <h6 class="mb-0">Product added in Wish List</h6>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="d-flex align-items-top">-->
    <!--                <h6 class="mb-0 text-left">18:40</h6>-->
    <!--                <div class="profile-media ms-3 d-flex pb-0">-->
    <!--                    <div class="profile-dots-pills border-warning"></div>-->
    <!--                    <div class="ms-3">-->
    <!--                        <h6 class="mb-0">New order Placed <span class="text-primary">#87444892</span> of Dashboard</h6>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div> -->
</div>
</div>
           
@endsection