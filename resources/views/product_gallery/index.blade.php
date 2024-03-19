@extends('layouts.admin')
<style>
    .card-custom {
        min-height: 120px;
        border-radius: 1.5rem !important;
    }

</style>
@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Gallery {{$data->name}}</h1>

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
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addProduct">
                        <i class="fas fa-plus"></i> Tambah Foto
                    </button>

                    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Foto</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="" class="user">
                                        @csrf

                                        <div class="form-group">
                                            <label for="url">{{ __('Image') }}</label>
                                            <input type="file" class="form-control-file" name="url" id="url">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="is_featured">{{ __('Is Featured') }}</label>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="addImage()">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tblUser" class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Is Featured</th>
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
                    data: 'url'
                    , name: 'url'
                }
                , {
                    data: 'is_featured'
                    , name: 'is_featured'
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
        function addImage() {
            var url = document.getElementById('url').files[0];
            var is_featured = document.getElementById('is_featured').checked;

            var formData = new FormData();
            formData.append('product_id', '{{ $data->id }}');
            formData.append('url', url);
            formData.append('is_featured', is_featured);
            formData.append('_token', '{{ csrf_token() }}');

            axios.post('{{ route("product-galleries.store") }}', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    $('#addProduct').modal('hide');
                    dataTable.ajax.reload();
                    Swal.fire({
                        icon: 'success'
                        , title: 'Sukses'
                        , text: response.data.message
                    });
                })
                .catch(function(error) {
                    console.log(error);
                    Swal.fire({
                        icon: 'error'
                        , title: 'Oops...'
                        , text: 'Terjadi kesalahan! Silakan coba lagi.'
                    });
                });
        }

    </script>



    @endpush
