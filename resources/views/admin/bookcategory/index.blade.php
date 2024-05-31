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
    padding: 8px;
    text-align: center; /* Center-align text within cells */
}
.selected
{
    background-color: #666;
    color: #fff;
}
</style>

<style>
 .draggable-table {
  position: relative;

}
.draggable-table .draggable-table__drag {
  position: absolute;
  border: 1px solid #f1f1f1;
  z-index: 10;
  cursor: grabbing;
  opacity: 1;
}

.draggable-table tbody tr {
  cursor: grabbing;
}

.draggable-table tbody tr:nth-child(even) {
  background-color: #f7f7f7;
}
.draggable-table tbody tr:nth-child(odd) {
  background-color: #ffffff;
}
.draggable-table tbody tr.is-dragging {
  background: #f1c40f;
}
.draggable-table tbody tr.is-dragging td {
  color: #ffe683;
}
</style>
<div class="position-relative  iq-banner ">
    <div class="iq-navbar-header " style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h1>Book Category</h1>
                            </div>
                            <div>
                                <a href="{{url('bookcategory/create_bookcategory')}}" class="btn btn-link btn-soft-light">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-32">
                                        <path d="M12 4V20M20 12H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    Add Book Category
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
        </div>    <!-- Nav Header Component End -->
    <!--Nav End-->
</div>
<div class="content-inner container-fluid pb-0" id="page_layout">
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header d-flex justify-content-between">
            <div class="header-title">
               <h4 class="card-title">View Book Category</h4>
            </div>
         </div>
         <div class="card-body">
             <form action="{{url('bookcategory/bookcat_order')}}" method="post" enctype="multipart/form-data">
                    @csrf
            <!--<div class="table-responsive border rounded">-->
             <div class="table-container tblContainer" style="overflow:auto;">
               <!--<table id="datatable" class="table " data-toggle="data-table">-->
                <table id="table" class="draggable-table tblContainer">
                  <thead>
                     <tr>
                        <th>Sno</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Hide/Unhide</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                    @php $i=1 @endphp 
                    @foreach ($list as $item)
                    <tr id="{{$item->id}}">
                        <input type="hidden" name="p[]" value="{{$item->id}}">
                        <td  id="pid[]">#{{$i}}</td>
                        
                        <td>
                            <a href="bookImage/{{$item->image}}" target="_blank">
                                <img src="bookImage/{{$item->image}}" alt="" style="width:45px;">
                            </a>
                        </td>
                        <td>{{$item->bookname}}</td>
                        <td>
                            @if($item->status==1) <span class="mt-2 badge bg-success"  onclick="test({{$item->id}})">Unhide</span> 
                            @else <span class="mt-2 badge bg-danger"  onclick="test({{$item->id}})">Hide</span>  @endif 
                        </td>
                        <td id="position[]">{{$i}}</td>
                         <td>
                                    @if($item->status==1) 
                                        <span class="mt-2 badge bg-success">Active</span> 
                                    @else 
                                        <span class="mt-2 badge bg-danger">Inactive</span>  
                                    @endif 
                                </td>
                        <td>
                            <a href="{{url('bookcategory/edit/'.$item->id)}}"> 
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="{{url('bookcategory/delete/'.$item->id)}}"  onclick="return confirm('Are you sure to Delete Permanently?')"> 
                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" style="color:indianred;" viewBox="0 0 24 24">
                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
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
                <div class="col-md-6 mt-3">
                    <button type="submit" class="btn btn-primary">Change position</button>
                </div>
            
            </form>
         </div>
      </div>
   </div>
</div>
</div>

<!--popup start-->
    <script>
        function hide(obj, rowid) {
        
        var rowId = event.target.parentNode.parentNode.id;
        $.get("https://shripujansamagri.com/category/statushide", {
          rowid: rowId,
          status: obj
        }, function(resp) {
            if(resp){
            location.reload();
          }
        });
        
      }
    </script>
    <div class="modal fade" id="add_contact" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            {{-- @csrf --}}
            <div class="modal-header">
                <h5 class="modal-title">UPDATE BOOK CATEGORY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-12">
                      <label class="form-label">CHANGE STATUS</label>
                      <select  class="form-control" id="status" name="cat_status" required>
                          <option value="0">Hide</option>
                          <option value="1">Unhide</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateResult()">Update</button>
            </div>
          </div>
        </div>
    </div>
<script>
    var catid=null;
    function test(val){
        $('#add_contact').modal('show');
        catid= val;
    }
    function updateResult(){
        var status= document.getElementById("status").value;
        
        $.get("https://shripujansamagri.com/bookcategory/statushide", {
          status: status,
          catid: catid
        }, function(resp) {
            if(resp){
                alert('Book Category Changed');
                location.reload();
          }
        });
   }
</script>
<!--popup close-->

<script>
    (function() {
  "use strict";
  
  const table = document.getElementById('table');
  const tbody = table.querySelector('tbody');
  
  var currRow = null,
      dragElem = null,
      mouseDownX = 0,
      mouseDownY = 0,         
      mouseX = 0,
      mouseY = 0,      
      mouseDrag = false;  
  
  function init() {
    bindMouse();
  }
  
  function bindMouse() {
    document.addEventListener('mousedown', (event) => {
      if(event.button != 0) return true;
      
      let target = getTargetRow(event.target);
      if(target) {
        currRow = target;
        addDraggableRow(target);
        currRow.classList.add('is-dragging');


        let coords = getMouseCoords(event);
        mouseDownX = coords.x;
        mouseDownY = coords.y;      

        mouseDrag = true;   
      }
    });
    
    document.addEventListener('mousemove', (event) => {
      if(!mouseDrag) return;
      
      let coords = getMouseCoords(event);
      mouseX = coords.x - mouseDownX;
      mouseY = coords.y - mouseDownY;  
      
      moveRow(mouseX, mouseY);
    });
    
    document.addEventListener('mouseup', (event) => {
      if(!mouseDrag) return;
      
      currRow.classList.remove('is-dragging');
      table.removeChild(dragElem);
      
      dragElem = null;
      mouseDrag = false;
    });    
  }
  
  
  function swapRow(row, index) {
     let currIndex = Array.from(tbody.children).indexOf(currRow),
         row1 = currIndex > index ? currRow : row,
         row2 = currIndex > index ? row : currRow;
         
     tbody.insertBefore(row1, row2);
  }
    
  function moveRow(x, y) {
    dragElem.style.transform = "translate3d(" + x + "px, " + y + "px, 0)";
    
    let	dPos = dragElem.getBoundingClientRect(),
        currStartY = dPos.y, currEndY = currStartY + dPos.height,
        rows = getRows();

    for(var i = 0; i < rows.length; i++) {
      let rowElem = rows[i],
          rowSize = rowElem.getBoundingClientRect(),
          rowStartY = rowSize.y, rowEndY = rowStartY + rowSize.height;

      if(currRow !== rowElem && isIntersecting(currStartY, currEndY, rowStartY, rowEndY)) {
        if(Math.abs(currStartY - rowStartY) < rowSize.height / 2)
          swapRow(rowElem, i);
      }
    }    
  }
  
  function addDraggableRow(target) {    
      dragElem = target.cloneNode(true);
      dragElem.classList.add('draggable-table__drag');
      dragElem.style.height = getStyle(target, 'height');
      dragElem.style.background = getStyle(target, 'backgroundColor');     
      for(var i = 0; i < target.children.length; i++) {
        let oldTD = target.children[i],
            newTD = dragElem.children[i];
        newTD.style.width = getStyle(oldTD, 'width');
        newTD.style.height = getStyle(oldTD, 'height');
        newTD.style.padding = getStyle(oldTD, 'padding');
        newTD.style.margin = getStyle(oldTD, 'margin');
      }      
      
      table.appendChild(dragElem);

    
      let tPos = target.getBoundingClientRect(),
          dPos = dragElem.getBoundingClientRect();
      dragElem.style.bottom = ((dPos.y - tPos.y) - tPos.height) + "px";
      dragElem.style.left = "-1px";    
    
      document.dispatchEvent(new MouseEvent('mousemove',
        { view: window, cancelable: true, bubbles: true }
      ));    
  }  
  
  function getRows() {
    return table.querySelectorAll('tbody tr');
  }    
  
  function getTargetRow(target) {
      let elemName = target.tagName.toLowerCase();

      if(elemName == 'tr') return target;
      if(elemName == 'td') return target.closest('tr');     
  }
  
  function getMouseCoords(event) {
    return {
        x: event.clientX,
        y: event.clientY
    };    
  }  
  
  function getStyle(target, styleName) {
    let compStyle = getComputedStyle(target),
        style = compStyle[styleName];

    return style ? style : null;
  }  
  
  function isIntersecting(min0, max0, min1, max1) {
      return Math.max(min0, max0) >= Math.min(min1, max1) &&
             Math.min(min0, max0) <= Math.max(min1, max1);
  }  
  
  init();
  
})();
</script>

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

@endsection

