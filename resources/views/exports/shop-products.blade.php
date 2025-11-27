<!-- resources/views/exports/houseware-products.blade.php -->
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Product Title</th>
            <th>Warehouse Stock</th>
            <th>Shop Stock</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $index => $record)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $record->product->title ?? 'N/A' }}</td>
                <td>{{ $record->warehouse_stock }}</td>
                <td>{{ $record->shop_stock }}</td>
                <td>{{ $record->created_at->format('Y-m-d') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
