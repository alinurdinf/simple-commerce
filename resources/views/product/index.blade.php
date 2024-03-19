@extends('layouts.admin')
<style>
    .card-custom {
        min-height: 120px;
        border-radius: 1.5rem !important;
    }

</style>
@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Manajemen Products') }}</h1>

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
                        <i class="fas fa-plus"></i> Tambah Product
                    </button>

                    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="" class="user">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description" id="description" placeholder="{{ __('Description') }}" required>{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">{{ __('Price') }}</label>
                                            <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder="{{ __('Price') }}" value="{{ old('price') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="stock">{{ __('Stock') }}</label>
                                            <input type="number" class="form-control" name="stock" id="stock" placeholder="{{ __('Stock') }}" value="{{ old('stock') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }}</label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="addProduct()">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form method="POST" action="" class="user">
                                        @csrf
                                        <input type="hidden" id="product_id" name="product_id">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input type="text" class="form-control" name="name" id="edit_name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description" id="edit_description" placeholder="{{ __('Description') }}" required>{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">{{ __('Price') }}</label>
                                            <input type="number" step="0.01" class="form-control" name="price" id="edit_price" placeholder="{{ __('Price') }}" value="{{ old('price') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="stock">{{ __('Stock') }}</label>
                                            <input type="number" class="form-control" name="stock" id="edit_stock" placeholder="{{ __('Stock') }}" value="{{ old('stock') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }}</label>
                                            <select class="form-control" name="status" id="edit_status" required>
                                                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                                <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="updateProduct()">Simpan</button>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stock</th>
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
        $(document).on('click', '.edit-product', function() {
            var id = $(this).data('id');
            var id = btoa(id);
            var url = "{{ route('products.edit', ['product' => ':product']) }}";

            url = url.replace(':product', id);

            axios.get(url)
                .then(function(response) {
                    var data = response.data;
                    console.log(data);
                    $('#product_id').val(data.id);
                    $('#edit_name').val(data.name);
                    $('#edit_description').val(data.description);
                    $('#edit_price').val(data.price);
                    $('#edit_stock').val(data.stock);
                    $('#edit_status').val(data.status);
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
                    data: 'description'
                    , name: 'description'
                }
                , {
                    data: 'price'
                    , name: 'price'
                }
                , {
                    data: 'stock'
                    , name: 'stock'
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
        function deleteProduct(id) {
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
                    axios.delete("{{ route('products.destroy', ['product' => ':id']) }}".replace(':id', id))
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

        function addProduct() {
            var name = document.getElementById('name').value;
            var description = document.getElementById('description').value;
            var price = document.getElementById('price').value;
            var stock = document.getElementById('stock').value;
            var status = document.getElementById('status').value;

            axios.post('{{ route("products.store") }}', {
                    product_id: null
                    , name: name
                    , description: description
                    , price: price
                    , stock: stock
                    , status: status
                    , _token: '{{ csrf_token() }}'
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

        function updateProduct() {
            var name = document.getElementById('edit_name').value;
            var description = document.getElementById('edit_description').value;
            var price = document.getElementById('edit_price').value;
            var stock = document.getElementById('edit_stock').value;
            var status = document.getElementById('edit_status').value;
            var product_id = document.getElementById('product_id').value;

            axios.post('{{ route("products.store") }}', {
                    product_id: product_id
                    , name: name
                    , description: description
                    , price: price
                    , stock: stock
                    , status: status
                    , _token: '{{ csrf_token() }}'
                })
                .then(function(response) {
                    $('#editProduct').modal('hide');
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
