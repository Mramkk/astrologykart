@php
    $dummy_image = '';
    $exist_image2 = '';
    if(!empty($image_dir)){
        $dummy_image = $image_dir.'dummy-image.png';
        if(!empty($data->image2)){
            $exist_image2 = $image_dir.$data->image2;
        }
    }
@endphp
<img src="{{ Hpx::image_src(!empty($exist_image2) ? $exist_image2 : '',!empty($dummy_image) ? $dummy_image : '') }}" id="showBanner2" class="show-banner img-hover" data-dummy-image="{{ !empty($dummy_image) ? asset($dummy_image) : '' }}">
<input accept="image/*" type="file" name="image2" id="inputBanner2" class="invisible" />
@if(!empty($img_wh))<br><small style="margin-top:5px;">Image Size ({{$img_wh}})</small>@endif
<script>
    $(document).ready(function(){
        @if(!empty($data->id))
		    image_edit('#showBanner2','{{route($route_name.".store")}}','DELETE_IMAGE',{{$data->id}},'image2');
        @else
            image_edit('#showBanner2');
        @endif
	});
</script>