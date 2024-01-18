@php
    $dummy_image = '';
    $exist_image = '';
    if(!empty($image_dir)){
        $dummy_image = $image_dir.'dummy-image.png';
        if(!empty($data->image)){
            $exist_image = $image_dir.$data->image;
        }
    }
@endphp
<img src="{{ Hpx::image_src(!empty($exist_image) ? $exist_image : '',!empty($dummy_image) ? $dummy_image : '') }}" id="showBanner" class="show-banner img-hover" data-dummy-image="{{ !empty($dummy_image) ? asset($dummy_image) : '' }}">
<input accept="image/*" type="file" name="image" id="inputBanner" class="invisible" />
@if(!empty($img_wh))<br><small style="margin-top:5px;">Image Size ({{$img_wh}})</small>@endif
<script>
    $(document).ready(function(){
        @if(!empty($data->id))
		    image_edit('#showBanner','{{route($route_name.".store")}}','DELETE_IMAGE',{{$data->id}},'image');
        @else
            image_edit('#showBanner');
        @endif
	});
</script>
