
<div class="hero-slider-1 dot-style-1 dot-style-1-position-1 {{ $class ?? ''}}">
    @foreach($sliders as $slider)
        @if ($slider->link && !($shortcode->show_newsletter_form == 'yes' && is_plugin_active('newsletter')))
            <a href="{{ url($slider->link) }}">
                @endif

                @php
                    $tabletImage = $slider->getMetaData('tablet_image', true) ?: $slider->image;
                    $mobileImage = $slider->getMetaData('mobile_image', true) ?: $tabletImage;
                @endphp

                <div class="single-hero-slider single-animation-wrap {{ $itemClass ?? ''}}"
                     style="@if (!$loop->first) display: none; @endif"
                     data-original-image="{{ RvMedia::getImageUrl($slider->image, null, false, RvMedia::getDefaultImage()) }}"
                     @if ($tabletImage) data-tablet-image="{{ RvMedia::getImageUrl($tabletImage, null, false, RvMedia::getDefaultImage()) }}"
                     @endif
                     @if ($mobileImage) data-mobile-image="{{ RvMedia::getImageUrl($mobileImage, null, false, RvMedia::getDefaultImage()) }}" @endif
                >
                    {!! Theme::partial('shortcodes.sliders.content', compact('slider', 'shortcode')) !!}
                </div>

                @if ($slider->link && !($shortcode->show_newsletter_form == 'yes' && is_plugin_active('newsletter')))
            </a>
        @endif
    @endforeach
</div>





<br>
<div class="slider-arrow hero-slider-1-arrow"></div>
<div class="container mt-5">
    <table class="table table-bordered text-center">
        <tbody>
        <tr>
            <td>
                <a href="https://www.mercedes-benz.com" target="_blank">
                    <img class="svg-logo-car" src="{{asset('storage/SvgLogoCar/Porsche.svg')}}" alt="Porsche Logo"
                         width="200">
                </a>
            </td>
            <td>
                <a href="https://www.bmw.com" target="_blank">
                    <img class="svg-logo-car" src="{{asset('storage/SvgLogoCar/Bmw.svg')}}" alt="BMW Logo" width="200">
                </a>
            </td>
            <td>
                <a href="https://www.porsche.com" target="_blank">
                    <img class="svg-logo-car" src="{{asset('storage/SvgLogoCar/BENZ.svg')}}" alt="Mercedes-Benz Logo"
                         width="200">

                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>










<div class="container">
    <h1>نمایش فرمان جدید و قدیم</h1>

    <div class="slider-container">
        <div class="img-wrapper">
            <img src="{{ asset('storage/general/before.jpg') }}" alt="فرمان قدیمی" class="img-old">
            <div class="img-overlay" id="overlay">
                <img src="{{ asset('storage/general/after.jpg') }}" alt="فرمان قدیمی" class="img-old">
            </div>
            <div class="slider-handle" id="slider-handle"></div>
        </div>
    </div>
</div>







<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const slider = document.getElementById('slider-handle');
        const overlay = document.getElementById('overlay');
        const imgWrapper = document.querySelector('.img-wrapper');

        let isSliding = false;

        // شروع کشیدن اسلایدر
        slider.addEventListener('mousedown', function () {
            isSliding = true;
        });

        // توقف کشیدن اسلایدر
        document.addEventListener('mouseup', function () {
            isSliding = false;
        });

        // حرکت موس برای تنظیم اسلایدر
        document.addEventListener('mousemove', function (event) {
            if (!isSliding) return;
            const { width, left } = imgWrapper.getBoundingClientRect();
            let offsetX = event.clientX - left;

            // جلوگیری از خروج از محدوده
            if (offsetX < 0) offsetX = 0;
            if (offsetX > width) offsetX = width;

            const percentage = (offsetX / width) * 100;

            overlay.style.width = `${percentage}%`;
            slider.style.left = `${percentage}%`;
        });
    });
</script>

