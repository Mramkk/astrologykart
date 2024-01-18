<select class="form-select" name="category">
    <option value="">Select</option>
    @if (!empty($categories))
        @foreach ($categories as $category)
            <option value="{{ $category->name }}" @if(!empty($data->category) and $data->category == $category->name) selected @endif>
                {{ $category->name }}
            </option>
        @endforeach
    @endif
</select>
