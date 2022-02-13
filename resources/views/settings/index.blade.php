@extends('layouts.app', ['pageSlug' => 'Search query', 'page' => 'Search query', 'section' => 'Search query'])

@section('content')
    <div class="card">
        <div class="card-header">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                @if(isset($details))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>
                                <p> это результат поиска по запросу:  <b class="text-danger"> {{ $query }}</b></p>
                            </strong>
                        <a href="{{ route('export3') }}" class="btn btn-sm btn-primary">{{__('translation.Download')}} <i class="tim-icons icon-cloud-download-93"></i></a>

                    </div>
                        @foreach($details as $product)
                            <table class="table tablesorter">
                                <tr>
                                    <th scope="col">{{__('translation.Category')}}</th>
                                    <td>{{$product->category->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.Product_Name')}}</th>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.Description')}}</th>
                                    <td>{{$product->description}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.OEM')}}</th>
                                    <td>{{$product->country}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.usage')}}</th>
                                    <td>{{$product->usage}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.stock')}}</th>
                                    <td>{{$product->stock}}</td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.Availability')}}</th>
                                        @if($product->availability == 1)
                                            <td>{{__('translation.available')}}</td>
                                        @else
                                            <td>{{__('translation.not_available')}}</td>
                                        @endif
                                </tr>

                                <tr>
                                    <th scope="col">{{__('translation.Photo')}}</th>
                                    <td>
                                        <img
                                            height="50px" width="50px"
                                            src="{{ url('public/images/products_images'.$product->image) }}"
                                            class="zoom"
                                            alt="{{ asset('storage/images'.$product->image) }}"
                                            title="Product image">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.product_code')}}</th>
                                    <td>{{ $product->product_code }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.Weight')}}</th>
                                    <td>{{ format_weight($product->weight) }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">{{__('translation.Price')}}</th>
                                    <td>{{format_money($product->price)}}</td>
                                </tr>

                        @endforeach
                            </table>
                @else
                    <form method="POST" action="/3559d7accf00360971961ca18989adc0614089c0">
                        @csrf
                        @method('POST')
                        <div class="input-group-md">
                            <div class="form-outline">
                                <label for="search-input">{{__('translation.search_for_product_code')}}</label>
                                <input id="search-input" name="q" type="search" class="form-control" />
                            </div>
                            <div style="text-align: center;">
                                <button type="submit" id="search-button" class="btn btn-primary">
                                    <i class="tim-icons icon-zoom-split"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
