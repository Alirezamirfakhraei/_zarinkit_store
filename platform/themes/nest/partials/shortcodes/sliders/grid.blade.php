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
            <td class="disabled-flag">
                <a href="https://en.wikipedia.org/wiki/South_Korea" target="_blank">
                    <img src="https://flagcdn.com/w320/kr.png" alt="South Korea Flag" width="80">
                </a>
            </td>
            <td>
                <a href="https://en.wikipedia.org/wiki/Iran" target="_blank">
                    <img src="https://flagcdn.com/w320/de.png" alt="Germany Flag" width="80">
                </a>
            </td>
            <td class="disabled-flag">
                <img src="https://flagcdn.com/w320/jp.png" alt="Japan Flag" width="80">
            </td>
        </tr>
        <tr>
            <td class="disabled-flag title-flag">کره</td>
            <td class="title-flag">آلمان</td>
            <td class="disabled-flag title-flag">ژاپن</td>
        </tr>
        <tr>
            <td>
                <a href="https://en.wikipedia.org/wiki/China" target="_blank">
                    <img src="https://flagcdn.com/w320/cn.png" alt="China Flag" width="80">
                </a>
            </td>
            <td>
                <a href="https://en.wikipedia.org/wiki/Iran" target="_blank">
                    <img src="https://flagcdn.com/w320/fr.png" alt="France Flag" width="80">
                </a>
            </td>
            <td>
                <a href="https://en.wikipedia.org/wiki/Iran" target="_blank">
                    <img src="https://flagcdn.com/w320/ir.png" alt="Iran Flag" width="80">
                </a>
            </td>
        </tr>
        <tr>
            <td class="title-flag">چین</td>
            <td class="title-flag">فرانسه</td>
            <td class="title-flag">ایران</td>
        </tr>
        </tbody>
    </table>
</div>
