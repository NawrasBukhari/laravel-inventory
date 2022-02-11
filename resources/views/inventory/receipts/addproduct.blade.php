@extends('layouts.app', ['page' => 'Add Product', 'pageSlug' => 'receipt', 'section' => 'inventory'])

@section('content')
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{__('translation.Add_Product')}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('receipts.show', $receipt) }}" class="btn btn-sm btn-primary">{{__('translation.Back_to_List')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('receipts.product.store', $receipt) }}" autocomplete="off">
                            @csrf

                            <div class="pl-lg-4">
                                <input type="hidden" name="receipt_id" value="{{ $receipt->id }}">
                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-product">{{__('translation.Product')}}</label>
                                    <select name="product_id" id="input-product" class="form-select form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" required>
                                        @foreach ($products as $product)
                                            @if($product['id'] == old('product_id'))
                                                <option value="{{$product['id']}}" selected>[{{ $product->category->name }}] {{ $product->name }}</option>
                                            @else
                                                <option value="{{$product['id']}}">[{{ $product->category->name }}] {{ $product->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'product_id'])
                                </div>

                                <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock">{{__('translation.stock')}}</label>
                                    <input type="number" name="stock" id="input-stock" class="form-control form-control-alternative{{ $errors->has('stock') ? ' is-invalid' : '' }}" value="0" required>
                                    @include('alerts.feedback', ['field' => 'stock'])
                                </div>

                                <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-stock_defective">{{__('translation.Defective_Stock')}}</label>
                                    <input type="number" name="stock_defective" id="input-stock_defective" class="form-control form-control-alternative{{ $errors->has('stock_defective') ? ' is-invalid' : '' }}" value="0" required>
                                    @include('alerts.feedback', ['field' => 'stock_defective'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{__('translation.Continue')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        });
    </script>
@endpush