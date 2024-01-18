@if (!empty($popups))
    @php  $modal_i = 1; @endphp
    @foreach ($popups as $data)
        <div class="modal" id="popup-modal-{{ $modal_i }}" data-animation="slideInUp">
            <div class="modal-dialog quickview__main--wrapper">
                <header class="modal-header quickview__header">
                    <button class="close-modal quickview__close--btn" aria-label="close modal" data-close="">✕ </button>
                </header>
                <div class="modal-body p-0">
                    {!! $data->html_content !!}
                </div>
            </div>
        </div>
        <div style="height: 0; width:0; opacity:0; position:absolute; overflow:hidden;">
            <button data-open="popup-modal-{{ $modal_i }}">Open Modal</button>
        </div>
        <script>
            $(document).ready(function() {
                setTimeout(() => {
                    $('[data-open="popup-modal-{{ $modal_i }}"]').click();
                }, {{ $data->delay }});
            });
        </script>
        @php  $modal_i += 1; @endphp
    @endforeach
@endif
