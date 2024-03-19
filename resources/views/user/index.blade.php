@extends('layouts.admin')
<style>
    .card-custom {
        min-height: 120px;
        border-radius: 1.5rem !important;
    }

</style>
@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Manajemen User') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('status'))
<div class="alert alert-success border-left-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right mb-5">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addUser">
                        <i class="fas fa-plus"></i> Tambah User
                    </button>

                    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="{{ route('users.store') }}" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">{{ __('Phone Number') }}</label>
                                            <input type="number" class="form-control" name="phone" id="phone" placeholder="{{ __('Phone Number') }}" value="{{ old('phone') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                        </div>

                                        <div class="form-group">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="addUser()">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="{{ route('users.store') }}" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="user_id" id="user_id" value="">

                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">{{ __('Phone Number') }}</label>
                                            <input type="number" class="form-control" name="edit_phone" id="edit_phone" placeholder="{{ __('Phone Number') }}" value="{{ old('phone') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                            <input type="email" class="form-control" name="edit_email" id="edit_email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }}</label>
                                            <select class="form-control" name="edit_status" id="edit_status">
                                                <option value="true">Aktif</option>
                                                <option value="false">Tidak Aktif</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="updateUser()">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table id="tblUser" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
    @endsection

    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).on('click', '.edit-user', function() {
            var id = $(this).data('id');
            var id = btoa(id);
            var url = "{{ route('users.edit', ['user' => ':user']) }}";

            url = url.replace(':user', id);

            axios.get(url)
                .then(function(response) {
                    var data = response.data;
                    console.log(data);
                    $('#user_id').val(data.id);
                    $('#edit_name').val(data.name);
                    $('#edit_phone').val(data.phone);
                    $('#edit_email').val(data.email);
                    $('#edit_status').val(data.is_active ? 'true' : 'false');
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
        });


        var dataTable = $('#tblUser').DataTable({
            processing: true
            , serverSide: true
            , ajax: {
                url: "{!! url()->current() !!}"
            }
            , columns: [{
                    data: null
                    , sortable: false
                    , searchable: false
                    , width: '5%'
                    , render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                }
                , {
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'email'
                    , name: 'email'
                }
                , {
                    data: 'is_active'
                    , name: 'is_active'
                }
                , {
                    data: 'action'
                    , name: 'action'
                    , orderable: false
                    , searchable: false
                    , width: '15%'
                }
            ]
        });

    </script>

    <script>
        function addUser() {
            var name = document.getElementById('name').value;
            var phone = document.getElementById('phone').value;
            var email = document.getElementById('email').value;

            axios.post('{{ route("users.store") }}', {
                    name: name
                    , phone: phone
                    , email: email
                    , user_id: null
                    , _token: '{{ csrf_token() }}'
                })
                .then(function(response) {
                    $('#addUser').modal('hide');
                    dataTable.ajax.reload();
                    Swal.fire({
                        icon: 'success'
                        , title: 'Sukses'
                        , text: response.data.message
                    });
                })
                .catch(function(error) {
                    Swal.fire({
                        icon: 'error'
                        , title: 'Oops...'
                        , text: 'Terjadi kesalahan! Silakan coba lagi.'
                    });
                });
        }

        function updateUser() {
            var name = document.getElementById('edit_name').value;
            var phone = document.getElementById('edit_phone').value;
            var email = document.getElementById('edit_email').value;
            var user_id = document.getElementById('user_id').value;
            var is_active = document.getElementById('edit_status').value;

            axios.post('{{ route("users.store") }}', {
                    name: name
                    , phone: phone
                    , email: email
                    , user_id: user_id
                    , is_active: is_active
                    , _token: '{{ csrf_token() }}'
                })
                .then(function(response) {
                    $('#editUser').modal('hide');
                    dataTable.ajax.reload();
                    Swal.fire({
                        icon: 'success'
                        , title: 'Sukses'
                        , text: response.data.message
                    });
                })
                .catch(function(error) {
                    Swal.fire({
                        icon: 'error'
                        , title: 'Oops...'
                        , text: 'Terjadi kesalahan! Silakan coba lagi.'
                    });
                });
        }

        function deleteUser(id) {
            Swal.fire({
                title: 'Are you sure?'
                , text: "You won't be able to revert this!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#d33'
                , cancelButtonColor: '#3085d6'
                , confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    id = btoa(id);
                    axios.delete("{{ route('users.destroy', ['user' => ':id']) }}".replace(':id', id))
                        .then(function(response) {
                            Swal.fire(
                                'Deleted!'
                                , 'Your data has been deleted.'
                                , 'success'
                            );
                            dataTable.ajax.reload();
                        })
                        .catch(function(error) {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!'
                                , 'Something went wrong while deleting data.'
                                , 'error'
                            );
                        });
                }
            });
        }

    </script>


    @endpush
