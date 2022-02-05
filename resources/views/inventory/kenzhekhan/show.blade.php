@extends('layouts.app', ['page' => 'Product Information', 'pageSlug' => 'kenzhekhan', 'section' => 'inventory'])

@section('content')
    <style>
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Information</h4>
                </div>
                <div class="card-body">

                    <table class="table table-responsive-sm">
                        <thead>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Country</th>
                        <th>Stock</th>
                        <th>Product code</th>
                        <th>Weight</th>
                        <th>Defective Stock</th>
                        <th>Base price</th>
                        <th>Average Price</th>
                        <th>Total sales</th>
                        <th>Income Produced</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td><a href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a></td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <img
                                        height="50px" width="50px"
                                        src="{{ url('public/images/products_images'.$product->image) }}"
                                        class="zoom"
                                        alt="{{ asset('storage/images'.$product->image) }}"
                                        title="Product image">
                            </td>
                            <td>{{ $product->country }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->weight }}</td>
                            <td>{{ $product->stock_defective }}</td>
                            <td>{{ format_money($product->price) }}</td>
                            <td>{{ format_money($product->solds->avg('price')) }}</td>
                            <td>{{ $product->solds->sum('qty') }}</td>
                            <td>{{ format_money($product->solds->sum('total_amount')) }}</td>

                        </tr>
                        </tbody>
                    </table><!--Here ends-->
                </div>
            </div>
        </div>
    </div><!--ends-->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Sales</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Date</th>
                        <th>Sale ID</th>
                        <th>Quantity</th>
                        <th>Price Unit</th>
                        <th>Total Amount</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($solds as $sold)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($sold->created_at)) }}</td>
                                <td><a href="{{ route('sales.show', $sold->sale_id) }}">{{ $sold->sale_id }}</a></td>
                                <td>{{ $sold->qty }}</td>
                                <td>{{ format_money($sold->price) }}</td>
                                <td>{{ format_money($sold->total_amount) }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('sales.show', $sold->sale_id) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="View Sale">
                                        <i class="tim-icons icon-zoom-split"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Latest Receipts</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <th>Date</th>
                        <th>Receipt ID</th>
                        <th>Title</th>
                        <th>Stock</th>
                        <th>Defective Stock</th>
                        <th>Total Stock</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach ($receiveds as $received)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($received->created_at)) }}</td>
                                <td><a href="{{ route('receipts.show', $received->receipt) }}">{{ $received->receipt_id }}</a></td>
                                <td style="max-width:150px;">{{ $received->receipt->title }}</td>
                                <td>{{ $received->stock }}</td>
                                <td>{{ $received->stock_defective }}</td>
                                <td>{{ $received->stock + $received->stock_defective }}</td>
                                <td class="td-actions text-right">
                                    <a href="{{ route('receipts.show', $received->receipt) }}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Ver Receipt">
                                        <i class="tim-icons icon-zoom-split"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showPicture() {
            var sourceOfPicture = "http://img.tesco.com/Groceries/pi/118/5000175411118/IDShot_90x90.jpg";
            var img = document.getElementById('bigpic')
            img.src = sourceOfPicture.replace('90x90', '225x225');
            img.style.display = "block";
        }
    </script>
@endsection
