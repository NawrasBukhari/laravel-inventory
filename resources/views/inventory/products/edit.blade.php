@extends('layouts.app', ['page' => 'Edit Product', 'pageSlug' => 'products', 'section' => 'inventory'])

@section('content')
    <style>
        select option {
            margin: 40px;
            background-color: #a4508b;
            background-image: linear-gradient(90deg, #a4508b 9%, #5f0a87 74%);
            color: #ece0e0;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
        }
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{__('translation.edit_product')}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{__('translation.Back_to_List')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{__('translation.Product_Information')}}</h6>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('product_category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{__('translation.Category')}}</label>
                                    <select name="product_category_id" id="input-category" class="form-select form-select-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($categories as $category)
                                            @if($category['id'] == old('document') or $category['id'] == $product->product_category_id)
                                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                            @else
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'product_category_id'])
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('translation.Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="{{ __('translation.Name') }}" value="{{ old('name', $product->name) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{__('translation.Description')}}</label>
                                    <input type="text" name="description" id="input-description" class="form-control form-control-alternative"
                                           placeholder="{{__('translation.Description')}}" value="{{ old('description', $product->description) }}" required>
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>
                                {{--------------------------------Here goes country-----------------------------------}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">{{__('translation.OEM')}}</label>
                                            <select name="country" id="input-country" class="form-select form-select-sm{{ $errors->has('country') ? ' is-invalid' : '' }}" required>
                                                @foreach($countries as $country)
                                                    <option value="{{$country['name']}}">{{$country['name']}}</option>
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'country'])
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">{{__('translation.stock')}}</label>
                                            <input type="number" name="stock" id="input-stock" class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.stock')}}" value="{{ old('stock', $product->stock) }}" required>
                                            @include('alerts.feedback', ['field' => 'stock'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock_defective">{{__('translation.Defective_Stock')}}</label>
                                            <input type="number" name="stock_defective" id="input-stock_defective" class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.Defective_Stock')}}" value="{{ old('stock_defective', $product->stock_defective) }}" required>
                                            @include('alerts.feedback', ['field' => 'stock_defective'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{__('translation.Price')}}</label>
                                            <input type="number" step=".01" name="price" id="input-price" class="form-control form-control-alternative"
                                                   placeholder="Price" value="{{ old('price', $product->price) }}" required>
                                            @include('alerts.feedback', ['field' => 'price'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{__('translation.Weight')}}</label>
                                            <input type="number" step=".01" name="weight" id="input-weight" class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.Weight')}}" value="{{ old('weight', $product->weight) }}" required>
                                            @include('alerts.feedback', ['field' => 'weight'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('product code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{__('translation.product_code')}}</label>
                                            <input type="text" name="product_code" id="input-product_code" class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.product_code')}}" value="{{ old('product_code', $product->product_code) }}" required>
                                            @include('alerts.feedback', ['field' => 'product_code'])
                                        </div>
                                    </div>
                                    {{-------------------------------Here Product Usage Starts------------------------------}}
                                    <div class="col-lg-4">
                                        <div class="form-group{{ $errors->has('usage') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{__('translation.usage')}}</label>
                                            <input type="text" data-toggle="tooltip" data-placement="top" title="{{__('translation.why_usage')}}"
                                                   name="usage" id="input-usage"  class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.usage')}}" value="{{ old('usage'), $product->usage }}" required>
                                            @include('alerts.feedback', ['field' => 'usage'])
                                        </div>
                                    </div>
                                    {{--------------------------------Here Product Usage Ends-------------------------------}}

                                </div><!--row-->

                                {{--------------------------------Here Goes Photo--------------------------------}}

                                    <div class="col-lg-12">
                                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">{{__('translation.Photo')}}</label>
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <p>{{__('translation.Choose_an_image')}}</p>
                                                        <input id="input-image" type="file" name="image" class="dropzone" required>
                                                    @include('alerts.feedback', ['field' => 'image'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--------------------------------Here Ends Photo--------------------------------}}
                                {{--------------------------------Here Begins Avalibilty-------------------------}}
                                    <div class="col-lg-4">
                                        <label class="form-control-label" for="input-stock">{{__('translation.Availability')}}</label>
                                        <div class="radio-tile-group">
                                            <div class="input-container">
                                                <input data-toggle="tooltip" data-placement="top" title="{{__('translation.why_available')}}" id="walk"
                                                       class="radio-button" type="radio" value="1" name="availability" required autocomplete="off" />
                                                <div class="radio-tile">
                                                    <div class="icon walk-icon">
                                                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.88"><defs><style>.cls-1{fill:#0cb018;}.cls-1,.cls-2{fill-rule:evenodd;}.cls-2{fill:#252525;}</style></defs><title>confirm</title><path class="cls-1" d="M61.44,0A61.44,61.44,0,1,1,0,61.44,61.44,61.44,0,0,1,61.44,0Z"/><path class="cls-2" d="M42.37,51.68,53.26,62,79,35.87c2.13-2.16,3.47-3.9,6.1-1.19l8.53,8.74c2.8,2.77,2.66,4.4,0,7L58.14,85.34c-5.58,5.46-4.61,5.79-10.26.19L28,65.77c-1.18-1.28-1.05-2.57.24-3.84l9.9-10.27c1.5-1.58,2.7-1.44,4.22,0Z"/></svg>
                                                    </div>
                                                    <label for="walk" class="radio-tile-label">{{__('translation.available')}}</label>
                                                </div>
                                            </div>

                                            <div class="input-container">
                                                <input data-toggle="tooltip" data-placement="top" title="{{__('translation.why_not_available')}}" id="bike" class="radio-button" type="radio" checked value="0" name="availability" required autocomplete="off" />
                                                <div class="radio-tile">
                                                    <div class="icon bike-icon">
                                                        <svg id="Layer_1"  data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.88"><defs><style>.cls-1{fill: #d2257c;fill-rule:evenodd;}</style></defs><title>cross</title><path class="cls-1" d="M6,6H6a20.53,20.53,0,0,1,29,0l26.5,26.49L87.93,6a20.54,20.54,0,0,1,29,0h0a20.53,20.53,0,0,1,0,29L90.41,61.44,116.9,87.93a20.54,20.54,0,0,1,0,29h0a20.54,20.54,0,0,1-29,0L61.44,90.41,35,116.9a20.54,20.54,0,0,1-29,0H6a20.54,20.54,0,0,1,0-29L32.47,61.44,6,34.94A20.53,20.53,0,0,1,6,6Z"/></svg>
                                                    </div>
                                                    <label for="bike" class="radio-tile-label">{{__('translation.not_available')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{--------------------------------Here Ends Avalibilty----------------------------}}

                                </div>
                                <div class="text-center">
                                    <button data-toggle="tooltip" data-placement="top" title="{{__('translation.Save')}}" type="submit" class="btn btn-success mt-4">{{__('translation.Save')}}</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        new SlimSelect({
            select: '.form-select'
        })
    </script>
@endpush
