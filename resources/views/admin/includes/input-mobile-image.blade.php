@php
    $dummy_image = '';
    $exist_image_m = '';
    if(!empty($image_dir)){
        $dummy_image = $image_dir.'dummy-image.png';
        if(!empty($data->mobile_image)){
            $exist_image_m = $image_dir.$data->mobile_image;
        }
    }
@endphp
<img src="{{ Hpx::image_src(!empty($exist_image_m) ? $exist_image_m : '',!empty($dummy_image) ? $dummy_image : '') }}" id="showBanner_m" class="show-banner img-hover" data-dummy-image="{{ !empty($dummy_image) ? asset($dummy_image) : '' }}">
<input accept="image/*" type="file" name="mobile_image" id="inputBanner_m" class="invisible" />
@if(!empty($img_wh))<br><small style="margin-top:5px;">Image Size ({{$img_wh}})</small>@endif
<script>
    $(document).ready(function(){
        @if(!empty($data->id))
		    image_edit('#showBanner_m','{{route($route_name.".store")}}','DELETE_IMAGE',{{$data->id}},'mobile_image');
        @else
            image_edit('#showBanner_m');
        @endif
	});
</script>