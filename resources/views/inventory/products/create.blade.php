@extends('layouts.app', ['page' => 'New Product', 'pageSlug' => 'products', 'section' => 'inventory'])
@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{__('translation.New_Product')}}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{__('translation.Back_to_List')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{__('translation.Product_Information')}}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('product_category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{__('translation.Category')}}</label>
                                    <select name="product_category_id" data-toggle="tooltip" data-placement="top" title="{{__('translation.why_category')}}" id="input-category" class="form-select form-select-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" required>
                                        @foreach ($categories as $category)
                                            @if($category['id'] == old('document'))
                                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                            @else
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'product_category_id'])
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{__('translation.Product_Name')}}</label>
                                    <input data-toggle="tooltip" data-placement="top" title="{{__('translation.why_name')}}" type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           placeholder="{{__('translation.Product_Name')}}" value="{{ old('name') }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">{{__('translation.Description')}}</label>
                                    <input data-toggle="tooltip" data-placement="top" title="{{__('translation.why_description')}}" type="text" name="description" id="input-description" class="form-control form-control-alternative"
                                           placeholder="{{__('translation.Description')}}" value="{{ old('description') }}" required>
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>
                                {{--------------------------------Here Begins Countries--------------------------}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group{{ $errors->has('country') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">{{__('translation.OEM')}}</label>
                                            <select data-toggle="tooltip" data-placement="top" title="{{__('translation.why_country')}}" name="country" id="input-country"  class="form-select form-select-sm{{ $errors->has('country') ? ' is-invalid' : '' }}" required>
                                                @foreach ($countries as $country)
                                                    <option value="{{$country['name']}}" >{{$country['name']}}</option>
                                                @endforeach
                                            </select>
                                            @include('alerts.feedback', ['field' => 'country'])
                                        </div>
                                    </div>
                                    {{--------------------------------Here Ends Countries----------------------------}}
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('stock') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">{{__('translation.Stock')}}</label>
                                            <input data-toggle="tooltip" data-placement="top" title="{{__('translation.why_stock')}}" type="number" name="stock" id="input-stock" class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.Stock')}}" value="{{ old('stock') }}" required>
                                            @include('alerts.feedback', ['field' => 'stock'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('stock_defective') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock_defective">{{__('translation.Defective_Stock')}}</label>
                                            <input data-toggle="tooltip" data-placement="top" title="{{__('translation.why_defective')}}" type="number" step=".01" name="stock_defective" id="input-stock_defective" class="form-control form-control-alternative" placeholder="{{__('translation.Defective_Stock')}}" value="{{ old('stock_defective') }}" required>
                                            @include('alerts.feedback', ['field' => 'stock_defective'])
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{__('translation.Price')}}</label>
                                            <input data-toggle="tooltip" data-placement="top" title="{{__('translation.why_price')}}" type="number" step=".01" name="price" id="input-price" class="form-control form-control-alternative" placeholder="{{__('translation.Price')}}" value="{{ old('price') }}" required>
                                            @include('alerts.feedback', ['field' => 'price'])
                                        </div>
                                    </div>
                                    {{-------------------------------Here Weight Starts------------------------------------}}
                                    <div class="col-4">
                                        <div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{__('translation.Weight')}}</label>
                                            <input type="number" data-toggle="tooltip" data-placement="top" title="{{__('translation.why_weight')}}" step=".01" name="weight" id="input-weight" class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.Weight')}}" value="{{ old('weight') }}" required>
                                            @include('alerts.feedback', ['field' => 'weight'])
                                        </div>
                                    </div>
                                    {{--------------------------------Here Weight Ends-------------------------------------}}
                                    {{-------------------------------Here Product Code Starts------------------------------}}
                                    <div class="col-lg-4">
                                        <div class="form-group{{ $errors->has('product code') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{__('translation.product_code')}}</label>
                                            <input type="text" data-toggle="tooltip" data-placement="top" title="{{__('translation.why_product_code')}}" name="product_code" id="input-weight" class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.product_code')}}" value="{{ old('product code') }}" required>
                                            @include('alerts.feedback', ['field' => 'product code'])
                                        </div>
                                    </div>
                                    {{--------------------------------Here Product code Ends-------------------------------}}
                                    {{-------------------------------Here Product Usage Starts------------------------------}}
                                    <div class="col-lg-4">
                                        <div class="form-group{{ $errors->has('usage') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-price">{{__('translation.usage')}}</label>
                                            <input type="text" data-toggle="tooltip" data-placement="top" title="{{__('translation.why_usage')}}"
                                                   name="usage" id="input-usage"  class="form-control form-control-alternative"
                                                   placeholder="{{__('translation.usage')}}" value="{{ old('usage') }}" required>
                                            @include('alerts.feedback', ['field' => 'usage'])
                                        </div>
                                    </div>
                                    {{--------------------------------Here Product Usage Ends-------------------------------}}

                                    {{--------------------------------Here Goes Photo--------------------------------------}}
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-stock">{{__('translation.Photo')}}</label>
                                                <div id="dev-upload" data-toggle="tooltip" data-placement="top" title="{{__('translation.why_photo')}}" class="dropzone-wrapper">
                                                    <div class="dropzone-desc">
                                                        <p>{{__('translation.Choose_an_image')}}</p>
                                                        <input  id="input-image" type="file" name="image" class="dropzone" required>
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
                            </div> <!--Row tag-->

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{__('translation.Save')}}</button>
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
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var htmlPreview =
                        '<img width="200" src="' + e.target.result + '" />' +
                        '<p>' + input.files[0].name + '</p>';
                    var wrapperZone = $(input).parent();
                    var previewZone = $(input).parent().parent().find('.preview-zone');
                    var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                    wrapperZone.removeClass('dragover');
                    // previewZone.removeClass('hidden');
                    boxZone.empty();
                    boxZone.append(htmlPreview);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function reset(e) {
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
        }

        $(".dropzone").change(function() {
            readFile(this);
        });

        $('.dropzone-wrapper').on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });

        $('.dropzone-wrapper').on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });

        $('.remove-preview').on('click', function() {
            var boxZone = $(this).parents('.preview-zone').find('.box-body');
            var previewZone = $(this).parents('.preview-zone');
            var dropzone = $(this).parents('.form-group').find('.dropzone');
            boxZone.empty();
            previewZone.addClass('hidden');
            reset(dropzone);
        });
    </script>
@endpush

