@php
    $dummy_image = '';
    $exist_image3 = '';
    if(!empty($image_dir)){
        $dummy_image = $image_dir.'dummy-image.png';
        if(!empty($data->image3)){
            $exist_image3 = $image_dir.$data->image3;
        }
    }
@endphp
<img src="{{ Hpx::image_src(!empty($exist_image3) ? $exist_image3 : '',!empty($dummy_image) ? $dummy_image : '') }}" id="showBanner3" class="show-banner img-hover" data-dummy-image="{{ !empty($dummy_image) ? asset($dummy_image) : '' }}">
<input accept="image/*" type="file" name="image3" id="inputBanner3" class="invisible" />
@if(!empty($img_wh))<br><small style="margin-top:5px;">Image Size ({{$img_wh}})</small>@endif
<script>
    $(document).ready(function(){
        @if(!empty($data->id))
		    image_edit('#showBanner3','{{route($route_name.".store")}}','DELETE_IMAGE',{{$data->id}},'image3');
        @else
            image_edit('#showBanner3');
        @endif
	});
</script>