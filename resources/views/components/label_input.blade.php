<div>
    <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $id }}">{{ $label }}</label>
    <input
        class="text-sm custom-input w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition duration-300 ease-in-out transform focus:-translate-y-1 focus:outline-blue-300 hover:shadow-lg hover:border-blue-300 bg-gray-100"
        placeholder="{{ $placeholder }}"
        type="{{ $type }}"
        id="{{ $id }}"
        name="{{ $id }}"
        value="{{ $value ?? '' }}"
    />
</div>