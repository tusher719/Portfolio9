@extends('layouts.app')

@section('title')
    Manage About | Portfolio9
@endsection

@section('mainsection')
    <h1 class="mt-4">Manage Info</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('about.add')}}">About</a></li>
        <li class="breadcrumb-item active">About Manage info</li>
    </ol>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card" style="border: 1px solid #17a2b8 ";>
                <div class="card-header bg-info">
                    <h4>About Manage Information</h4>
                </div>
                <div class="card-body bg-secondary">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="color: #fff;">
                                <th>Sl No</th>
                                <th>About Name</th>
                                <th>About Description</th>
                                <th>About Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody >
                        @foreach($abouts as $key=>$data)
                            <tr style="color: #fff">
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{ $data->about_name }}
                                </td>
                                <td>
                                    {{ Str::limit ($data->about_description, 50) }}
                                </td>
                                <td>
                                    <img src="{{asset($data->about_image)}}" height="100" width="120" alt="">
                                </td>
                                <td>
                                    @if($data->status== 1)
                                    <span class="badge badge-success">
                                        <strong>Published</strong>
                                    </span>
                                    @else
                                    <span class="badge badge-warning">
                                        <strong>Unpublished</strong>
                                    </span>
                                    @endif
                                </td>
                                <td>
{{--                                    <a href="{{route('about.edit', ['id'=>$data->id])}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>--}}
{{--                                    <a href="#" class="btn btn-sm btn-danger" onclick="deleteAbout({{$data->id}});"><i class="fa fa-trash"></i></a>--}}

{{--                                    <form id="delete-about-{{$data->id}}" action="{{ route('about.delete',['id'=>$data->id]) }}" method="POST" style="display: none">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}



                                    <a href="{{route('about.edit', ['id'=>$data->id])}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteAbout({{$data->id}});"><i class="fa fa-trash"></i></a>

                                    <form id="delete-about-{{$data->id}}" action="{{ route('about.delete',['id'=>$data->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <nav class="pagination justify-content-center">
                        {{ $abouts->links() }}
                    </nav>
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


{{--delete alert--}}
    <script type="text/javascript">
        function deleteAbout(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will be delete permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#27ae60',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-about-'+id).submit();
                }
            })
        }
    </script>
@endsection
