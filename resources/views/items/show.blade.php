@extends('dashboard')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
        <a href="{{ route('items.index') }}" style="color: #6b7280; text-decoration: none;">Back to Items</a>
        <h2 style="margin: 0; color: #0b2a5a;">Item Details</h2>
    </div>

    <div style="background: white; padding: 24px; border-radius: 12px; border: 1px solid #d8e2f2; box-shadow: 0 4px 6px -1px rgba(16, 34, 62, 0.1);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
            <div>
                <h3 style="margin: 0 0 8px 0; font-size: 24px; color: #0b2a5a;">{{ $item->name }}</h3>
                <p style="margin: 0; color: #6b7280; font-size: 14px;">
                    Created on {{ $item->created_at->format('F j, Y \a\t g:i A') }}
                </p>
            </div>
            <div style="text-align: right;">
                <div style="font-size: 28px; font-weight: 700; color: #059669; margin-bottom: 4px;">
                    ${{ number_format($item->price, 2) }}
                </div>
                <div style="color: #6b7280; font-size: 12px;">Price</div>
            </div>
        </div>

        @if($item->description)
        <div style="margin-bottom: 24px;">
            <h4 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #374151;">Description</h4>
            <p style="margin: 0; color: #4b5563; line-height: 1.6; white-space: pre-wrap;">{{ $item->description }}</p>
        </div>
        @endif

        <div style="border-top: 1px solid #e5e7eb; padding-top: 24px;">
            <div style="display: flex; gap: 12px;">
                <a href="{{ route('items.edit', $item) }}" class="btn" style="background: #f59e0b;">Edit Item</a>
                <form method="POST" action="{{ route('items.destroy', $item) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this item? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary" style="background: #dc2626;">Delete Item</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
