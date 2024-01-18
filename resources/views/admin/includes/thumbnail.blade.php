@if (!empty($data->image))
    @if (is_dir($image_dir . 'thumbnail'))
        <img src="{{ Hpx::image_src($image_dir.'thumbnail/'.$data->image, $image_dir.'thumbnail/'.'dummy-image.png') }}" class="border-radius-5 bg-light border" alt="thumbnail">
    @else
        <img src="{{ Hpx::image_src($image_dir.$data->image, $image_dir.'dummy-image.png') }}" class="border-radius-5 bg-light border" alt="thumbnail">
    @endif
@elseif(!empty($data->image1))
    @if (is_dir($image_dir . 'thumbnail'))
        <img src="{{ Hpx::image_src($image_dir.'thumbnail/'.$data->image1, $image_dir.'thumbnail/'.'dummy-image.png') }}" class="border-radius-5 bg-light border" alt="thumbnail">
    @else
        <img src="{{ Hpx::image_src($image_dir.$data->image1, $image_dir.'dummy-image.png') }}" class="border-radius-5 bg-light border" alt="thumbnail">
    @endif
@elseif(is_dir($image_dir . 'thumbnail'))
    <img src="{{ asset($image_dir.'thumbnail/'.'dummy-image.png') }}" class="border-radius-5 bg-light border" alt="thumbnail">
@else
    <img src="{{ asset($image_dir.'dummy-image.png') }}" class="border-radius-5 bg-light border" alt="thumbnail">
@endif
