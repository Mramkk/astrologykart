<style>
    .overlay-loader {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        position: fixed;
        background: #2222229c;
    }

    .overlay__inner {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        position: absolute;
    }

    .overlay__content {
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .spinner-2 {
        width: 75px;
        height: 75px;
        display: inline-block;
        border-width: 2px;
        border-color: rgba(255, 255, 255, 0.05);
        border-top-color: #fff;
        animation: spin 1s infinite linear;
        border-radius: 100%;
        border-style: solid;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="overlay-loader" id="overlay__loader" style="display: none;">
    <div class="overlay__inner">
        <div class="overlay__content"><span class="spinner-2"></span></div>
    </div>
</div>
