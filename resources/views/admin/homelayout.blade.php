@extends('AdminLayout.index')

@section('content')


<div class="content-inner container-fluid pb-0" id="page_layout">
<div class="d-flex justify-content-between align-items-center flex-wrap mb-5 gap-3">
    <div class="d-flex flex-column">
        <h3>Home Layout</h3>
        <p class="mb-0">Home Page</p>
    </div>
    <div class="d-flex justify-content-between align-items-center rounded flex-wrap gap-3">
        
        <div class="form-group mb-0">
            <input type="text" name="start" class="form-control range_flatpicker flatpickr-input active" placeholder="24 Jan 2022 to 23 Feb 2022" readonly="readonly">
        </div>
        <button type="button" class="btn btn-primary">Analytics</button>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                    <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4>Section 1</h4>
                        </div>
                        
                    </div>
                   
                </div> 
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{url('homelayout/save')}}">
                    @csrf
                    <div class="row">
                        <?php 
                            if(sizeof($layout)==0){
                                $title = "";
                                $product_id = "";
                            }else{
                                $title = $layout[0]->title;
                                $product_id = $layout[0]->product_id;
                            }
                        ?>
                        <div class="col-md-12 mt-3">
                            <label class="form-label" for="price">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$title}}"  placeholder="Title" required>
                            @if($errors->has('title'))
                                <div class="form-error">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        @php  $sd = $product_id; @endphp
                        
                        @php $pcat= explode(',', $sd);  @endphp
                        @foreach($product as $item)
                      
                        <div class="col-md-4 mt-3">
                            @if(in_array($item['pid'], $pcat))
                            <input type="checkbox" name="pid[]" checked value="{{$item->pid}}" placeholder="Title"> 
                            @else
                            <input type="checkbox" name="pid[]" value="{{$item->pid}}" placeholder="Title"> 
                            @endif
                            <img src="productImage/{{ $item->itemimage }}" alt="" style="width:40px;height:40px;border-radius:8px;border:1px solid #e8e8e8;" class="img-fluid">
                            {{$item->name}}
                        </div>
                        @endforeach
                    
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-4 mt-3">
                            <input type="hidden" name="section" value="section1">
                            <button type="submit" class="btn btn-success">Save & Update</button>
                        </div>
                    
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                    <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4>Section 2</h4>
                        </div>
                        
                    </div>
                   
                </div> 
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{url('homelayout/save')}}">
                    @csrf
                <div class="row">
                    
                  <?php 
                    if(sizeof($layout1)==0){
                        $title = "";
                        $product_id = "";
                    }else{
                        $title = $layout1[0]->title;
                        $product_id = $layout1[0]->product_id;
                    }
                  ?>
                    <div class="col-md-12 mt-3">
                        <label class="form-label" for="price">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$title}}"  placeholder="Title" required>
                        @if($errors->has('title'))
                            <div class="form-error">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    
                    @php  $sd = $product_id; @endphp
                    @php $pcat= explode(',', $sd);  @endphp
                  
                    @foreach($product as $item)
                      
                        <div class="col-md-4 mt-3">
                            @if(in_array($item['pid'], $pcat))
                            <input type="checkbox" name="pid[]" checked value="{{$item->pid}}" placeholder="Title"> 
                            @else
                            <input type="checkbox" name="pid[]" value="{{$item->pid}}" placeholder="Title"> 
                            @endif
                            <img src="productImage/{{ $item->itemimage }}" alt="" style="width:40px;height:40px;border-radius:8px;border:1px solid #e8e8e8;" class="img-fluid">
                            {{$item->name}}
                        </div>
                    @endforeach
                    
                    <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-4 mt-3">
                        <input type="hidden" name="section" value="section2">
                        <button type="submit" class="btn btn-success">Save & Update</button>
                        </div>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    
   <!-- <div class="row">
    <div class="col-lg-12 col-xl-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                    <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4>Section 3</h4>
                        </div>
                        
                    </div>
                   
                </div> 
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{url('homelayout/save')}}">
                    @csrf
                    <div class="row">
                        <?php 
                            if(sizeof($layout2)==0){
                                $title = "";
                                $product_id = "";
                            }else{
                                $title = $layout2[0]->title;
                                $product_id = $layout2[0]->product_id;
                            }
                        ?>
                        <div class="col-md-12 mt-3">
                            <label class="form-label" for="price">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$title}}"  placeholder="Title" required>
                            @if($errors->has('title'))
                                <div class="form-error">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                        
                        @php  $sd = $product_id; @endphp
                        @php $pcat= explode(',', $sd);  @endphp
                      
                        @foreach($product as $item)
                            <div class="col-md-4 mt-3">
                                @if(in_array($item['pid'], $pcat))
                                <input type="checkbox" name="pid[]" checked value="{{$item->pid}}" placeholder="Title"> 
                                @else
                                <input type="checkbox" name="pid[]" value="{{$item->pid}}" placeholder="Title"> 
                                @endif
                                <img src="productImage/{{ $item->itemimage }}" alt="" style="width:40px;height:40px;border-radius:8px;border:1px solid #e8e8e8;" class="img-fluid">
                                {{$item->name}}
                            </div>
                        @endforeach
                        
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-4 mt-3">
                            <input type="hidden" name="section" value="section3">
                            <button type="submit" class="btn btn-success">Save & Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>-->
    
    
    
</div>
           
@endsection