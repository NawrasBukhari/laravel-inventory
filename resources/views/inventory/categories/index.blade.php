@extends('layouts.app', ['page' => 'List of Categories', 'pageSlug' => 'categories', 'section' => 'inventory'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{__('translation.Categories')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">{{__('translation.New_Category')}}</a>
                        </div>
                    </div>
                </div>
                <div style="max-width: 100%" class="card-body">
                    @include('alerts.success')
                    <div class="table-responsive">
                        <table style="max-height: 100%" class="table" id="">
                            <thead class=" text-primary">
                                <th scope="col">{{__('translation.Name')}}</th>
                                <th scope="col">{{__('translation.Products')}}</th>
                                <th scope="col">{{__('translation.Total_Stock')}}</th>
                                <th scope="col">{{__('translation.Defective_Stock')}}</th>
                                <th scope="col">{{__('translation.Average_Price_of_Product')}}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ count($category->products) + count($category->kenzhekhan) }}</td>
                                        <td>{{ $category->products->sum('stock') + $category->kenzhekhan->sum('stock') }}</td>
                                        <td>{{ $category->products->sum('stock_defective') + $category->kenzhekhan->sum('stock_defective') }}</td>
                                        <td>{{ format_money($category->products->avg('price') + ($category->kenzhekhan->avg('price')))  }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('categories.show', $category) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="More Details">
                                                <i class="tim-icons icon-zoom-split"></i>
                                            </a>
                                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Edit Category">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Delete Category" onclick="confirm('{{__('translation.Are_you_sure_you_want_to_delete_this_category?')}}') ? this.parentElement.submit() : ''" >
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $categories->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
