@extends('admin.layouts.master')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Coupon</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Coupon</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $coupon->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" class="form-control" name="code" value="{{ $coupon->code }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="text" class="form-control" name="quantity"
                                        value="{{ $coupon->quantity }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Max Use Per Person</label>
                                    <input type="text" class="form-control" name="max_use"
                                        value="{{ $coupon->max_use }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Start Date</label>
                                            <input type="text" class="form-control datepicker" name="start_date"
                                                value="{{ $coupon->start_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">End Date</label>
                                            <input type="text" class="form-control datepicker" name="end_date"
                                                value="{{ $coupon->end_date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputState">Discount Type</label>
                                            <select name="discount_type" id="inputState" class="form-control sub-category">
                                                <option {{ $coupon->discount_type == 'percent' ? 'selected' : '' }}
                                                    value="percent">
                                                    Percentage (%)</option>
                                                <option {{ $coupon->discount_type == 'amount' ? 'selected' : '' }}
                                                    value="amount">
                                                    Amount ({{ $settings->currency_icon }})</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Discount Value</label>
                                            <input type="text" class="form-control" name="discount"
                                                value="{{ $coupon->discount }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select name="status" id="inputState" class="form-control">
                                        <option {{ $coupon->status == 1 ? 'selected' : '' }} value="1">Active
                                        </option>
                                        <option {{ $coupon->status == 0 ? 'selected' : '' }} value="0">Inactive
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection