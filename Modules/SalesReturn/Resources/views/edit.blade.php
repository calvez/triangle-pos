@extends('layouts.app')

@section('title', 'Edit Sale Return')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('triangle.Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('sale-returns.index') }}">Sale Returns</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid mb-4">
        <div class="row">
            <div class="col-12">
                <livewire:search-product/>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @include('utils.alerts')
                        <form id="sale-return-form" action="{{ route('sale-returns.update', $sale_return) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="reference">Referencia <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="reference" required value="{{ $sale_return->reference }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="customer_id">Vásárló  <span class="text-danger">*</span></label>
                                            <select class="form-control" name="customer_id" id="customer_id" required>
                                                @foreach(\Modules\People\Entities\Customer::all() as $customer)
                                                    <option {{ $sale_return->customer_id == $customer->id ? 'selected' : '' }} value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="date">Dátum <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="date" required value="{{ $sale_return->date }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <livewire:product-cart :cartInstance="'sale_return'" :data="$sale_return"/>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="status">Státusz <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option {{ $sale_return->status == '{{ __('triangle.Pending')}}' ? 'selected' : '' }} value="{{ __('triangle.Pending')}}">{{ __('triangle.Pending')}}</option>
                                            <option {{ $sale_return->status == 'Shipped' ? 'selected' : '' }} value="Shipped">Shipped</option>
                                            <option {{ $sale_return->status == 'Completed' ? 'selected' : '' }} value="Completed">Teljesítve</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="payment_method">{{ __('triangle.Payment Method')}} <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="payment_method" required value="{{ $sale_return->payment_method }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="paid_amount">{{ __('triangle.Amount Paid')}} <span class="text-danger">*</span></label>
                                        <input id="paid_amount" type="text" class="form-control" name="paid_amount" required value="{{ $sale_return->paid_amount }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note">Megjegyzés (ha szükséges)</label>
                                <textarea name="note" id="note" rows="5" class="form-control">{{ $sale_return->note }}</textarea>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Update Sale Return <i class="bi bi-check"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
