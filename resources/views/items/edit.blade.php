@extends('dashboard')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
        <a href="{{ route('items.index') }}" style="color: #6b7280; text-decoration: none;">Back to Items</a>
        <h2 style="margin: 0; color: #0b2a5a;">Edit Item</h2>
    </div>

    <form method="POST" action="{{ route('items.update', $item) }}" style="background: white; padding: 24px; border-radius: 12px; border: 1px solid #d8e2f2; box-shadow: 0 4px 6px -1px rgba(16, 34, 62, 0.1);">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; margin-bottom: 8px; font-weight: 600; color: #374151;">Item Name *</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $item->name) }}"
                placeholder="Enter item name"
                required
                style="width: 100%; border: 1px solid #c9d6ea; border-radius: 8px; padding: 12px; font-size: 14px; outline: none; transition: border-color .2s; background: #fbfdff;"
                onfocus="this.style.borderColor='#0f62fe'; this.style.boxShadow='0 0 0 3px rgba(15, 98, 254, 0.14)';"
                onblur="this.style.borderColor='#c9d6ea'; this.style.boxShadow='none';"
            >
            @error('name')
                <p style="color: #dc2626; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 20px;">
            <label for="description" style="display: block; margin-bottom: 8px; font-weight: 600; color: #374151;">Description</label>
            <textarea
                id="description"
                name="description"
                placeholder="Enter item description (optional)"
                rows="4"
                style="width: 100%; border: 1px solid #c9d6ea; border-radius: 8px; padding: 12px; font-size: 14px; outline: none; transition: border-color .2s; background: #fbfdff; resize: vertical;"
                onfocus="this.style.borderColor='#0f62fe'; this.style.boxShadow='0 0 0 3px rgba(15, 98, 254, 0.14)';"
                onblur="this.style.borderColor='#c9d6ea'; this.style.boxShadow='none';"
            >{{ old('description', $item->description) }}</textarea>
            @error('description')
                <p style="color: #dc2626; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 24px;">
            <label for="price" style="display: block; margin-bottom: 8px; font-weight: 600; color: #374151;">Price *</label>
            <div style="position: relative;">
                <span style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #6b7280; font-weight: 500;">$</span>
                <input
                    id="price"
                    name="price"
                    type="number"
                    step="0.01"
                    min="0"
                    value="{{ old('price', $item->price) }}"
                    placeholder="0.00"
                    required
                    style="width: 100%; border: 1px solid #c9d6ea; border-radius: 8px; padding: 12px 12px 12px 28px; font-size: 14px; outline: none; transition: border-color .2s; background: #fbfdff;"
                    onfocus="this.style.borderColor='#0f62fe'; this.style.boxShadow='0 0 0 3px rgba(15, 98, 254, 0.14)';"
                    onblur="this.style.borderColor='#c9d6ea'; this.style.boxShadow='none';"
                >
            </div>
            @error('price')
                <p style="color: #dc2626; font-size: 14px; margin-top: 4px;">{{ $message }}</p>
            @enderror
        </div>

        <div style="display: flex; gap: 12px;">
            <button type="submit" class="btn">Update Item</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
