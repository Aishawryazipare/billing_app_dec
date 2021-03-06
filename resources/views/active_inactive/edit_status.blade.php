@extends('layouts.app')
@section('title', 'Edit Status')
@section('content')
<style>
    .error{
        color:red;
    }
</style>
<section class="content-header">
    <h1>
        Edit Status
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('user_mgt')}}"><i class="fa fa-dashboard"></i>Status</a></li>
        <li class="active">Edit Status</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="border-top: 3px solid #ffffff;">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                {!! Form::model($status,[
                'method' => 'PUT',
                'url' => ['update-active-inactive',$status->id],
                'class'=> 'form-horizontal',
                'id'=>'orderForm'
                ]) !!}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                       <div class="form-group">
                            <label for="company" class="col-sm-2 control-label"> Status Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="status" placeholder="Status Name" value="{{$status->status}}" name="status" required >
                            </div>
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{url('active-inactive')}}" class="btn btn-danger" >Cancel</a>
            </div>
            </form>
        </div>
    </div>   
</div>
</section> 
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.validate.js'></script>
<script type="text/javascript">
//            $("#btnsubmit").on("click",function(){

            var jvalidate = $("#orderForm").validate({
                rules: {   
                        email: {required: true},
                        password : {required: true},
                    },
                     messages: {
                         email: "Please Enter Email Address",
                         password: "Please Enter Password"
                       }  
                });
                
                $('#btnsubmit').on('click', function() {
                    $("#orderForm").valid();
                });
                
                
        </script>
@endsection
