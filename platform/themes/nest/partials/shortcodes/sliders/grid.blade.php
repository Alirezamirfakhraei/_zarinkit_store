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
<div class="container custom_cc_1 mt-5">
    <table class="table table-bordered text-center mt-20 mb-20">
        <tbody>
        <tr>
            <td>
                <a href="http://127.0.0.1:8000/product-categories/porsche" target="_blank">
                    <img class="svg-logo-car" src="{{asset('storage/SvgLogoCar/Porsche.svg')}}" alt="Porsche Logo"
                         width="150">
                </a>
            </td>
            <td>
                <a href="http://127.0.0.1:8000/product-categories/bmw"
                   target="_blank">
                    <img class="svg-logo-car" src="{{asset('storage/SvgLogoCar/Bmw.svg')}}" alt="BMW Logo" width="150">
                </a>
            </td>
            <td>
                <a href="http://127.0.0.1:8000/product-categories/benz"
                   target="_blank">
                    <img class="svg-logo-car" src="{{asset('storage/SvgLogoCar/BENZ.svg')}}" alt="Mercedes-Benz Logo"
                         width="150">
                </a>
            </td>
        </tr>
        </tbody>
    </table>
</div>


<div class="container-width">
    <div class="container-custom">
        <div class="img-wrapper-custom">
            <img src="{{ asset('storage/general/before.jpg') }}" alt="Old Image" class="img old">
            <img src="{{ asset('storage/general/after.jpg') }}" alt="New Image" class="img new">
            <div class="slider">
                <div class="slider-indicator"></div> <!-- اینجا عنصر قابل توجه اضافه شده -->
            </div>
            <div class="overlay overlay-after">
                <span class="text before-text">After</span>
            </div>
            <div class="overlay overlay-before">
                <span class="text after-text">Before</span>
            </div>
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.querySelector('.container-custom');
        const slider = document.querySelector('.slider');
        const newImage = document.querySelector('.img.new');

        let isDragging = false;

        slider.addEventListener('mousedown', (e) => {
            isDragging = true;
            document.body.style.cursor = 'ew-resize';
            e.preventDefault(); // جلوگیری از رفتار پیش‌فرض
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            document.body.style.cursor = 'default';
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;

            const containerRect = container.getBoundingClientRect();
            let xPos = e.clientX - containerRect.left;

            if (xPos < 0) xPos = 0;
            if (xPos > containerRect.width) xPos = containerRect.width;

            let percentage = (xPos / containerRect.width) * 100;

            // به‌روزرسانی موقعیت اسلایدر و clip-path تصویر جدید
            slider.style.left = `${percentage}%`;
            newImage.style.clipPath = `inset(0 ${100 - percentage}% 0 0)`;
        });
    });

</script>



