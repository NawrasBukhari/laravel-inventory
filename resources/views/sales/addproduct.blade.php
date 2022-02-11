@extends('layouts.app', ['page' => 'Add Product', 'pageSlug' => 'sales', 'section' => 'transactions'])
@section('content')
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{__('translation.Add_Product')}} {{__('translation.kazkan')}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('sales.show', [$sale->id]) }}" class="btn btn-sm btn-primary">
                                    {{__('translation.Back_to_List')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('sales.product.store', $sale) }}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <input type="hidden" name="sale_id" value="{{ $sale->id }}">
                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-product">{{__('translation.Products')}}</label>
                                    <select name="product_id" id="input-product" class="form-select form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" required>
                                        @foreach ($products as $product)

                                            @if($product['id'] == old('product_id'))
                                                <option value="{{$product['id']}}" selected>[{{ $product->category->name }}] {{ $product->name }} -
                                                    {{__('translation.Base_price')}}: {{ $product->price }}₸</option>
                                                @else
                                                <option value="{{$product['id']}}">[{{ $product->category->name }}] {{ $product->name }} -
                                                    {{__('translation.Base_price')}}: {{ $product->price }}₸</option>
                                                @endif
                                            @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'product_id'])
                                </div>

                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price">{{__('translation.Price_per_Unit')}}</label>
                                    <input type="number" name="price" id="input-price" step=".01" class="form-control form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" value="0" required>
                                    @include('alerts.feedback', ['field' => 'product_id'])
                                </div>

                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-qty">{{__('translation.Quantity')}}</label>
                                    <input type="number" name="qty" id="input-qty" class="form-control form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" value="0" required>
                                    @include('alerts.feedback', ['field' => 'product_id'])
                                </div>

                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-total">{{__('translation.Total_Amount')}}</label>
                                    <input type="text" name="total_amount" id="input-total" class="form-control form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" value="0 ₸" disabled>
                                    @include('alerts.feedback', ['field' => 'product_id'])
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{__('translation.Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Here goes Kenzhekhan -->
{{--            <div class="col-xl-12 order-xl-1">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-8">--}}
{{--                                <h3 class="mb-0">{{__('translation.Add_Product')}} {{__('translation.kenzhekhan')}}</h3>--}}
{{--                            </div>--}}
{{--                            <div class="col-4 text-right">--}}
{{--                                <a href="{{ route('sales.show', [$sale->id]) }}" class="btn btn-sm btn-primary">--}}
{{--                                    {{__('translation.Back_to_List')}}</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <form method="post" action="{{ route('sales.product.store', $sale) }}" autocomplete="off">--}}
{{--                            @csrf--}}

{{--                            <div class="pl-lg-4">--}}
{{--                                <input type="hidden" name="sale_id" value="{{ $sale->id }}">--}}
{{--                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">--}}
{{--                                    <label class="form-control-label" for="input-product">{{__('translation.Products')}}</label>--}}
{{--                                    <select name="kenzhekhan_id" id="input-product" class="form-select form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" required>--}}
{{--                                        @foreach ($kenzhekhan as $product)--}}
{{--                                            @if($product['id'] == old('kenzhekhan_id'))--}}
{{--                                                <option value="{{$product['id']}}" selected>[{{ $product->category->name }}] {{ $product->name }} ---}}
{{--                                                    {{__('translation.Base_price')}}: {{ $product->price }}₸</option>--}}
{{--                                            @else--}}
{{--                                                <option value="{{$product['id']}}">[{{ $product->category->name }}] {{ $product->name }} ---}}
{{--                                                    {{__('translation.Base_price')}}: {{ $product->price }}₸</option>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @include('alerts.feedback', ['field' => 'product_id'])--}}
{{--                                </div>--}}

{{--                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">--}}
{{--                                    <label class="form-control-label" for="input-price">{{__('translation.Price_per_Unit')}}</label>--}}
{{--                                    <input type="number" name="price" id="input-price_2" step=".01" class="form-control form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" value="0" required>--}}
{{--                                    @include('alerts.feedback', ['field' => 'product_id'])--}}
{{--                                </div>--}}

{{--                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">--}}
{{--                                    <label class="form-control-label" for="input-qty">{{__('translation.Quantity')}}</label>--}}
{{--                                    <input type="number" name="qty" id="input-qty_2"--}}
{{--                                           class="form-control form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" value="0" required>--}}
{{--                                    @include('alerts.feedback', ['field' => 'product_id'])--}}
{{--                                </div>--}}

{{--                                <div class="form-group{{ $errors->has('product_id') ? ' has-danger' : '' }}">--}}
{{--                                    <label class="form-control-label" for="input-total">{{__('translation.Total_Amount')}}</label>--}}
{{--                                    <input type="text" name="total_amount" id="input-total_2" class="form-control form-control-alternative{{ $errors->has('product_id') ? ' is-invalid' : '' }}" value="0 ₸" disabled>--}}
{{--                                    @include('alerts.feedback', ['field' => 'product_id'])--}}
{{--                                </div>--}}

{{--                                <div class="text-center">--}}
{{--                                    <button type="submit" class="btn btn-success mt-4">{{__('translation.Save')}}</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        });
    </script>
    <script>
        // const input_qty_2 = document.getElementById('input-qty_2');
        // const input_price_2 = document.getElementById('input-price_2');
        // const input_total_2 = document.getElementById('input-total_2');
        let input_qty = document.getElementById('input-qty');
        let input_price = document.getElementById('input-price');
        let input_total = document.getElementById('input-total');
        // input_qty_2.addEventListener('input', updateTotal);
        // input_price_2.addEventListener('input', updateTotal);
        input_qty.addEventListener('input', updateTotal);
        input_price.addEventListener('input', updateTotal);
        function updateTotal () {
            input_total.value = (parseInt(input_qty.value) * parseFloat(input_price.value))+" ₸";
            // input_total_2.value = (parseInt(input_qty_2.value) * parseFloat(input_price_2.value))+" ₸";
        }
        //-------------------------------------------------------------------------------------------//

    </script>
@endpush