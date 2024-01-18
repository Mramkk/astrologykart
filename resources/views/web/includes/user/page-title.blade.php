<h3 class="@if(empty($back_btn)) text-center @endif pb-5" style="color: #424242;">
    @if(!empty($back_btn))<a href="{{$back_btn}}"><i class="icofont-arrow-left"></i></a>@endif
    {{ $page_title ?? null }}
</h3>
