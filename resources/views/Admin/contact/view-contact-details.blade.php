@extends('layouts.app')

@section('title')
    View Contact | Portfolio9
@endsection

@section('mainsection')
    <h1 class="mt-4">Contact</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('contact.view')}}">Contact</a></li>
        <li class="breadcrumb-item active">View Contact Details</li>
    </ol>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card" style="border: 1px solid #28a745  ";>
                <div class="card-header bg-success">
                    <h4>View Contact Details</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th class="text-success" style="width: 140px;">Client Name</th>
                            <th class="text-success" style="width: 10px">:</th>
                            <td class="text-dark">{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th class="text-success" style="width: 150px;">Client Email</th>
                            <th class="text-success" style="width: 10px">:</th>
                            <td class="text-dark">{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-success" style="width: 150px;">Client Phone</th>
                            <th class="text-success" style="width: 10px">:</th>
                            <td class="text-dark">{{ $contact->phone }}</td>
                        </tr>
                        <tr>
                            <th class="text-success" style="width: 150px;">Client Message</th>
                            <th class="text-success" style="width: 10px">:</th>
                            <td class="text-dark">{{ $contact->message }}</td>
                        </tr>
                    </table>
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
