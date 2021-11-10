@extends('layouts.app')

@section('title')
    View Contact | Portfolio9
@endsection

@section('mainsection')
    <h1 class="mt-4">Contact</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('contact.view')}}">Contact</a></li>
        <li class="breadcrumb-item active">Manage Contact info</li>
    </ol>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card" style="border: 1px solid #17a2b8 ";>
                <div class="card-header bg-info">
                    <h4>View Contact Info</h4>
                </div>
                <div class="card-body bg-secondary">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="color: #fff;">
                            <th>Sl No</th>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Client Phont</th>
                            <th>Client Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody >
                        @foreach($contacts as $key=>$contact)
                            <tr style="color: #fff">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ Str::limit($contact->message,50) }}</td>
                                <td>
                                    {{--                                    <a href="{{route('about.edit', ['id'=>$data->id])}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>--}}
                                    {{--                                    <a href="#" class="btn btn-sm btn-danger" onclick="deleteAbout({{$data->id}});"><i class="fa fa-trash"></i></a>--}}

                                    {{--                                    <form id="delete-about-{{$data->id}}" action="{{ route('about.delete',['id'=>$data->id]) }}" method="POST" style="display: none">--}}
                                    {{--                                        @csrf--}}
                                    {{--                                    </form>--}}



                                    <a href="{{ route('contact.details',['id'=>$contact->id]) }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="deleteContact({{ $contact->id }});"><i class="fa fa-trash"></i></a>

                                    <form id="delete-contact-{{$contact->id}}" action="{{ route('contact.delete',['id'=>$contact->id]) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <nav class="pagination justify-content-center">
                        {{ $contacts->links() }}
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
        function deleteContact(id) {
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
                    document.getElementById('delete-contact-'+id).submit();
                }
            })
        }
    </script>
@endsection
