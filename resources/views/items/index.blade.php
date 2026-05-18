@extends('dashboard')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <h2 style="margin: 0; color: #0b2a5a;">Your Items</h2>
    <a href="{{ route('items.create') }}" class="btn">Add New Item</a>
</div>

@if($items->isEmpty())
    <div class="empty-state">
        <h3>No items yet</h3>
        <p>You haven't added any items yet. Click "Add New Item" to get started.</p>
        <a href="{{ route('items.create') }}" class="btn" style="margin-top: 16px;">Add Your First Item</a>
    </div>
@else
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <thead style="background: #f8fafc;">
                <tr>
                    <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; border-bottom: 1px solid #e5e7eb;">Name</th>
                    <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; border-bottom: 1px solid #e5e7eb;">Description</th>
                    <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; border-bottom: 1px solid #e5e7eb;">Price</th>
                    <th style="padding: 16px; text-align: left; font-weight: 600; color: #374151; border-bottom: 1px solid #e5e7eb;">Created</th>
                    <th style="padding: 16px; text-align: center; font-weight: 600; color: #374151; border-bottom: 1px solid #e5e7eb;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr style="border-bottom: 1px solid #f3f4f6;">
                    <td style="padding: 16px; font-weight: 500;">{{ $item->name }}</td>
                    <td style="padding: 16px; color: #6b7280; max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $item->description ?: 'No description' }}
                    </td>
                    <td style="padding: 16px; font-weight: 600; color: #059669;">
                        ${{ number_format($item->price, 2) }}
                    </td>
                    <td style="padding: 16px; color: #6b7280;">
                        {{ $item->created_at->format('M d, Y') }}
                    </td>
                    <td style="padding: 16px; text-align: center;">
                        <div style="display: flex; gap: 8px; justify-content: center;">
                            <a href="{{ route('items.show', $item) }}" style="background: #3b82f6; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px;">View</a>
                            <a href="{{ route('items.edit', $item) }}" style="background: #f59e0b; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px;">Edit</a>
                            <form method="POST" action="{{ route('items.destroy', $item) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #dc2626; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px; text-align: center; color: #6b7280;">
        Total items: {{ $items->total() }}
    </div>

    <div style="margin-top: 16px; display: flex; justify-content: center;">
        {{ $items->links() }}
    </div>
@endif
@endsection
