@extends('vendor.layouts.master')
@section('content')
    <!--=============================
        DASHBOARD START
        ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.slidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Create Products</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="inputState">Category</label>
                                                <select name="category" id="inputState" class="form-control main-category">
                                                    <option value="">Select</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="inputState">Sub Category</label>
                                                <select name="sub_category" id="inputState"
                                                    class="form-control sub-category">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-3">
                                                <label for="inputState">Child Category</label>
                                                <select name="child_category" id="inputState"
                                                    class="form-control child-category">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputState">Brand</label>
                                        <select name="brand" id="inputState" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">SKU</label>
                                        <input type="text" class="form-control" name="sku"
                                            value="{{ old('sku') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Price</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Offer Price</label>
                                        <input type="text" class="form-control" name="offer_price"
                                            value="{{ old('offer_price') }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Offer Start Date</label>
                                                <input type="text" class="form-control datepicker"
                                                    name="offer_start_date" value="{{ old('offer_start_date') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="">Offer End Date</label>
                                                <input type="text" class="form-control datepicker" name="offer_end_date"
                                                    value="{{ old('offer_end_date') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Stock Quatity</label>
                                        <input type="number" min="0" class="form-control" name="qty"
                                            value="{{ old('qty') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Video Link</label>
                                        <input type="text" min="0" class="form-control" name="video_link"
                                            value="{{ old('video_link') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Short Description</label>
                                        <textarea name="short_description" class="form-control">{{ old('short_description') }}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Long Description</label>
                                        <textarea name="long_description" class="form-control summernote">{{ old('long_description') }}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputState">Product Type</label>
                                        <select name="product_type" id="inputState" class="form-control">
                                            <option value="">Select</option>
                                            <option value="new_arrival">New Arrival</option>
                                            <option value="featured_product">Featured</option>
                                            <option value="top_product">Top Product</option>
                                            <option value="best_product">Best Product</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Seo Title</label>
                                        <input type="text" class="form-control" name="seo_title"
                                            value="{{ old('seo_title') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="">Seo Description</label>
                                        <textarea name="seo_description" class="form-control">{{ old('seo_description') }}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputState">Status</label>
                                        <select name="status" id="inputState" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
    DASHBOARD START
    ==============================-->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.product.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.sub-category').html(
                            `<option value="">Select</option>`)
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)

                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
            /** get child category**/
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.product.get-child-categories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('.child-category').html(
                            `<option value="">Select</option>`)
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`)

                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush