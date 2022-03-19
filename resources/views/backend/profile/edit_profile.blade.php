@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Manage Profile</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post"  enctype="multipart/form-data" action="{{route('profile.store')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Name <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" value="{{$editData->name}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Email <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="email" name="email" class="form-control" value="{{$editData->email}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                                    </div>
                                                </div>
                                            </div>

{{--                                            new row--}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Mobile <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="mobile" class="form-control" value="{{$editData->mobile}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>User Address <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="address" class="form-control" value="{{$editData->address}}" required="" data-validation-required-message="This field is required"> <div class="help-block"></div></div>
                                                    </div>
                                                </div>
                                            </div>
{{--                                            end row--}}

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Gender <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="gender" id="select" required="" class="form-control">
                                                                <option value="" selected="" disabled="">Select Gender</option>
                                                                <option value="Male" {{($editData->gender=="Male" ? "selected":"")}}>Male</option>
                                                                <option value="Female"{{($editData->gender=="female" ? "selected":"")}} >Female</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Profile Image<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" id="image" class="form-control"   > </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <div class="controls">
                                                        <img id="showImage" src="{{(!empty($user->image)) ? url('upload/user_images/'.$user->image):url('upload/no_image.jpg')}}"
                                                             style="width: 100px; height: 100px;border: 1px solid #000000;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-xs-right">
                                                <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                                            </div>

                                        </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
        </div>
    </div>
<script>
    $(document).ready(function(){
        $('#image').change(function (e){
            var reader= new FileReader();
            reader.onload=function (e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
