@extends('layouts.admin')
@section('content')
<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
</style>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Pages</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div id="addThisFormContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>New Pages
                        </div>
                        <div class="ermsg">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                  <div class="tile">
                                    <div class="row">
                                      <div class="col-lg-6">
                                        {!! Form::open(['url' => 'admin/master/create','id'=>'createThisForm']) !!}
                                        {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                        @csrf
                                        <div>
                                            <label for="code">Code</label>
                                            <input type="text" id="code" name="code" class="form-control" oninput="this.value = this.value.toUpperCase()">
                                        </div>

                                        <div>
                                            <label for="type">Type</label>
                                            <select name="type" id="type"  class="form-control">
                                                <option>Please Select</option>
                                                <option value="0">Discount By Percentage</option>
                                                <option value="1">Discount By Amount</option>
                                            </select>
                                        </div>

                                        <div id="showpercent">
                                            <label for="percent">Percentage</label>
                                            <input class="form-control" id="percent" name="percent" type="number">
                                        </div>

                                        <div id="showprice">
                                            <label for="price">Price</label>
                                            <input class="form-control" id="price" name="price" type="number">
                                        </div>

                                        

                                        <div style="display: none">
                                            <label for="value">Value</label>
                                            <input class="form-control" id="value" name="value" type="number">
                                        </div>

                                      </div>
                                      <div class="col-lg-6">
                                            
                                        <div>
                                            <label for="quantity">Quantity</label>
                                            
                                            <select name="quantity" id="quantity"  class="form-control">
                                                <option value="">Please Select</option>
                                                <option value="0">Unlimited</option>
                                                <option value="1">Limited</option>
                                            </select>
                                        </div>

                                        

                                        <div id="showTime">
                                            <label for="times">Times</label>
                                            <input class="form-control" id="times" name="times" type="number">
                                        </div>

                                        <div>
                                            <label for="start_date">Start Date</label>
                                            <input class="form-control" id="start_date" name="start_date" type="date">
                                        </div>
                                        
                                        <div>
                                            <label for="end_date">End Date</label>
                                            <input class="form-control" id="end_date" name="end_date" type="date">
                                        </div>
                                        

                                      </div>
                                    </div>
                                    <div class="tile-footer">
                                        <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                        <input type="button" id="FormCloseBtn" value="Close" class="btn btn-warning">
                                        {!! Form::close() !!}
                                    </div>
                                  </div>
                                </div>
                              </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <button id="newBtn" type="button" class="btn btn-info">Add New</button>
        <hr>
        <div id="contentContainer">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> All Data</h3>
                            <div class="ermsg"></div>
                        </div>
                        <div class="card-body">
                                <div class="container">
                                    <table class="table table-bordered table-hover" id="example">
                                        <thead>
                                        <tr>
                                          <th style="text-align: center">ID</th>
                                          <th style="text-align: center">Code</th>
                                          <th style="text-align: center">Type</th>
                                          <th style="text-align: center">Price</th>
                                          <th style="text-align: center">Start Date</th>
                                          <th style="text-align: center">End Date</th>
                                          <th style="text-align: center">Used</th>
                                          <th style="text-align: center">Status</th>
                                          <th style="text-align: center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($data as $key => $data)
                                            <tr>
                                              <td style="text-align: center">{{ $key + 1 }}</td>
                                              <td style="text-align: center">{{$data->code}}</td>
                                              <td style="text-align: center">
                                                @if ($data->type == 1)
                                                    Discount By Amount
                                                @else
                                                    Discount By Percentage
                                                @endif
                                              </td>
                                              <td style="text-align: center">{{$data->price}}{{$data->percent}}</td>
                                              <td style="text-align: center">{{$data->start_date}}</td>
                                              <td style="text-align: center">{{$data->end_date}}</td>
                                              <td style="text-align: center">{{$data->used}}</td>
                                              <td style="text-align: center">
                                                <div class="toggle-flip">
                                                    <label>
                                                        <input type="checkbox" class="toggle-class" data-id="{{$data->id}}" {{ $data->status ? 'checked' : '' }}><span class="flip-indecator" data-toggle-on="Active" data-toggle-off="Inactive"></span>
                                                    </label>
                                                </div>
                                                </td>
                                              <td style="text-align: center">
                                                <a id="EditBtn" rid="{{$data->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                                <a id="deleteBtn" rid="{{$data->id}}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a>
                                              </td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
@section('script')
<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
    $(function() {
      $('.toggle-class').change(function() {
        var url = "{{URL::to('/admin/activecoupon')}}";
          var status = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');
           console.log(status);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: url,
              data: {'status': status, 'id': id},
              success: function(d){
                // console.log(data.success)
                if (d.status == 303) {
                                $(".ermsg").html(d.message);
                            }else if(d.status == 300){
                                $(".ermsg").html(d.message);
                                // window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error: function (d) {
                            console.log(d);
                        }
          });
      })
    })
  </script>
    <script>
        $(document).ready(function () {
            $("#addThisFormContainer").hide();
            $("#newBtn").click(function(){
                
                clearform();
                $("#newBtn").hide(100);
                $("#addThisFormContainer").show(300);

            });
            $("#FormCloseBtn").click(function(){
                window.setTimeout(function(){location.reload()},100)
                $("#addThisFormContainer").hide(200);
                $("#newBtn").show(100);
                clearform();
            });
            //header for csrf-token is must in laravel
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //
            var url = "{{URL::to('/admin/coupon')}}";
            // console.log(url);
            $("#addBtn").click(function(){
            //   alert("#addBtn");
                if($(this).val() == 'Create') {
                    
                    
                    var form_data = new FormData();
                    form_data.append("code", $("#code").val());
                    form_data.append("price", $("#price").val());
                    form_data.append("percent", $("#percent").val());
                    form_data.append("quantity", $("#quantity").val());
                    form_data.append("value", $("#value").val());
                    form_data.append("type", $("#type").val());
                    form_data.append("times", $("#times").val());
                    form_data.append("start_date", $("#start_date").val());
                    form_data.append("end_date", $("#end_date").val());


                    $.ajax({
                      url: url,
                      method: "POST",
                      contentType: false,
                      processData: false,
                      data:form_data,
                      success: function (d) {
                          if (d.status == 303) {
                              $(".ermsg").html(d.message);
                          }else if(d.status == 300){
                            success("Data Insert Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                          }
                      },
                      error: function (d) {
                          console.log(d);
                      }
                  });
                }
                //create  end
                //Update
                if($(this).val() == 'Update'){
                    
                    var form_data = new FormData();
                    form_data.append("code", $("#code").val());
                    form_data.append("price", $("#price").val());
                    form_data.append("percent", $("#percent").val());
                    form_data.append("quantity", $("#quantity").val());
                    form_data.append("value", $("#value").val());
                    form_data.append("type", $("#type").val());
                    form_data.append("times", $("#times").val());
                    form_data.append("start_date", $("#start_date").val());
                    form_data.append("end_date", $("#end_date").val());
                    form_data.append('_method', 'put');
                    $.ajax({
                        url:url+'/'+$("#codeid").val(),
                        type: "POST",
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        data:form_data,
                        success: function(d){
                            console.log(d);
                            if (d.status == 303) {
                                $(".ermsg").html(d.message);
                                pagetop();
                            }else if(d.status == 300){
                                success("Data Update Successfully!!");
                                window.setTimeout(function(){location.reload()},2000)
                            }
                        },
                        error:function(d){
                            console.log(d);
                        }
                    });
                }
                //Update
            });
            //Edit
            $("#contentContainer").on('click','#EditBtn', function(){
                //alert("btn work");
                codeid = $(this).attr('rid');
                //console.log($codeid);
                info_url = url + '/'+codeid+'/edit';
                //console.log($info_url);
                $.get(info_url,{},function(d){
                    populateForm(d);
                    pagetop();
                });
            });
            //Edit  end
            //Delete 
            $("#contentContainer").on('click','#deleteBtn', function(){
                var dataid = $(this).attr('rid');
                var info_url = url + '/'+dataid;
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url:info_url,
                            method: "GET",
                            type: "DELETE",
                            data:{
                            },
                            success: function(d){
                                if(d.success) {
                                    swal("Deleted!", "Your imaginary file has been deleted.", "success");     
                                    location.reload();
                                }
                            },
                            error:function(d){
                                console.log(d);
                            }
                        });
                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            });
            //Delete  
            function populateForm(data){
                $("#code").val(data.code);
                $("#price").val(data.price);
                $("#percent").val(data.percent);
                $("#quantity").val(data.quantity);
                $("#value").val(data.value);
                $("#type").val(data.type);
                $("#times").val(data.times);
                $("#start_date").val(data.start_date);
                $("#end_date").val(data.end_date);
                $("#codeid").val(data.id);
                $("#addBtn").val('Update');
                $("#addThisFormContainer").show(300);
                $("#newBtn").hide(100);
            }
            function clearform(){
                $('#createThisForm')[0].reset();
                $("#addBtn").val('Create');
            }

           


            $("#showprice").hide();
            $("#showpercent").hide();

            $("#type").change(function(){
                $(this).find("option:selected").each(function(){
                    var val = $(this).val();

                    if( val == 1 ){
                        $("#showprice").show();
                        $("#showpercent").hide();
                    }else if(val == 0){
                        $("#showpercent").show();
                        $("#showprice").hide();
                    }else{
                        
                        $("#showpercent").hide();
                        $("#showprice").hide();
                    }
                });
            }).change();

            // quantity show hide

            $("#showTime").hide();

            $("#quantity").change(function(){
                $(this).find("option:selected").each(function(){
                    var val = $(this).val();

                    if( val == 1 ){
                        $("#showTime").show();
                    }else{
                        
                        $("#showTime").hide();
                    }
                });
            }).change();
            
        });

  
        
    </script>
      <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
            swal("Copied!");
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#coupon").addClass('active');
        });
    </script>
@endsection
