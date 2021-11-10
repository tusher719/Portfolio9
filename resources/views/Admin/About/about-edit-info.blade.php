@extends('layouts.app')

@section('title')
    Edit About | Portfolio9
@endsection

@section('mainsection')
    <h1 class="mt-4">{{Auth::user()->name}}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('about.manage')}}">About</a></li>
        <li class="breadcrumb-item active">About Edit info</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card" style="border: 1px solid #17a2b8 ";>
                <div class="card-header bg-info">
                    <h4>About edit Information</h4>
                </div>
                <div class="card-body bg-secondary">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('about.update') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><h6 style="color: #fff">About Name</h6></label>
                            <div class="col-sm-9">
                                <input type="hidden" value="{{ $about->id }}" name="id">
                                <input type="text" class="form-control" value="{{$about->about_name}}" placeholder="About Name..." name="about_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 mt-4 col-form-label"><h6 style="color: #fff">About Description</h6></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" placeholder="About Description..." name="about_description" cols="70" rows="3">{{$about->about_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label"><h6 style="color: #fff">About Image</h6></label>
                            <div class="col-sm-9">
                                <img src="{{asset($about->about_image)}}" height="100" width="120" alt="" class="mb-3">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label"><h6 style="color: #fff">About Image</h6></label>
                            <div class="col-sm-9">
                                <input name="about_image" onchange="readURL(this)" accept="image/*" type="file" class="form-control-file" style="background: #17a2b8 ; color: #fff; border-radius: 5px">
                                <img src="#" id="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label mt-1"><h6 style="color: #fff">Status</h6></label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input {{ ($about->status==1)?"checked":"" }} class="form-check-input" type="radio" name="status" value="1">
                                    <label class="form-check-label">
                                        Published
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input {{ ($about->status==0)?"checked":"" }} class="form-check-input" type="radio" name="status" value="0">
                                    <label class="form-check-label">
                                        Unpublished
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-9 ml-auto">
                                <button type="submit" class="btn btn-block btn-info">Update About Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image').attr('src', e.target.result).width(120).height(90);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
