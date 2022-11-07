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
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Delivery charge</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="ermsg">
                                </div>
                                <div class="container">

                                    {!! Form::open(['url' => 'admin/master/create','id'=>'createThisForm']) !!}
                                    {!! Form::hidden('codeid','', ['id' => 'codeid']) !!}
                                    @csrf
                                    

                                    <div>
                                        <label for="order_amount">Order Amount Limit</label>
                                        <input type="number" id="order_amount" name="order_amount" class="form-control">
                                    </div>
                                    <div>
                                        <label for="amount">Delivery Charge</label>
                                        <input class="form-control" id="amount" name="amount" type="number">
                                    </div>

                                    <hr>
                                    <input type="button" id="addBtn" value="Create" class="btn btn-primary">
                                    <input type="button" id="FormCloseBtn" value="Close" class="btn btn-warning">
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>

        </div>

        <button id="newBtn" type="button" class="btn btn-info" style="display: none">Add New</button>
        <hr>

        <div id="contentContainer">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3> Delivery Charge Details</h3>
                        </div>
                        <div class="card-body">
                                <div class="container"  style="overflow-x:auto;">


                                    <table class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                          <th>ID</th>
                                          <th>Order Amount Limit</th>
                                          <th>Delivery Charge</th>
                                          <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($data as $key => $data)
                                            <tr>
                                              <td>{{$key + 1 }}</td>
                                              <td>{{$data->order_amount}}</td>
                                              <td>{{$data->amount}}</td>
                                              <td>
                                                <a id="EditBtn" rid="{{$data->id}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                                                {{-- <a id="deleteBtn" rid="{{$data->id}}"><i class="fa fa-trash-o" style="color: red;font-size:16px;"></i></a> --}}
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
        $(document).ready(function () {

            $("#addThisFormContainer").hide();
            $("#newBtn").click(function(){
                $("#address").addClass("ckeditor");
                for ( instance in CKEDITOR.instances ) {
                    CKEDITOR.instances[instance].updateElement();
                    } 
                 CKEDITOR.replace( 'address' );
                clearform();
                $("#newBtn").hide(100);
                $("#addThisFormContainer").show(300);

            });
            $("#FormCloseBtn").click(function(){
                $("#addThisFormContainer").hide(200);
                $("#newBtn").show(100);
                window.setTimeout(function(){location.reload()},100)
                clearform();
            });


            //header for csrf-token is must in laravel
            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            //

            var url = "{{URL::to('/admin/delivery-charge')}}";
            // console.log(url);
            $("#addBtn").click(function(){
            //   alert("#addBtn");
                if($(this).val() == 'Create') {
                    var form_data = new FormData();
                    form_data.append("name", $("#name").val());
                    form_data.append("phone", $("#phone").val());
                    form_data.append('_method', 'put');

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
                // alert('update btn work');
                  
                  var form_data = new FormData();
                    form_data.append("order_amount", $("#order_amount").val());
                    form_data.append("amount", $("#amount").val());

                    // alert(name);
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


            function populateForm(data){
                
                $("#order_amount").val(data.order_amount);
                $("#amount").val(data.amount);
                $("#codeid").val(data.id);
                $("#addBtn").val('Update');
                $("#addThisFormContainer").show(300);
                $("#newBtn").hide(100);
            }
            function clearform(){
                $('#createThisForm')[0].reset();
                $("#addBtn").val('Create');
            }

            

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#deliverycharge").addClass('active');
        });
    </script>
   
@endsection
