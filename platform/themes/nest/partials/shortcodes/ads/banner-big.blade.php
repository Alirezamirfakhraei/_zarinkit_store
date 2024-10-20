<div class="banner-img style-3 animated animated" @if ($ads->image) style="background-image: url({{ RvMedia::getImageUrl($ads->image) }})" @endif>
    <div class="banner-text  mt-50">
        <h2 class="mb-50">{!! BaseHelper::clean(nl2br($ads->getMetaData('subtitle', true))) !!}</h2>
        <a href="{{ route('public.ads-click', $ads->key) }}"  class="btn btn-xs">
            {{ $ads->getMetaData('button_text', true) ?: __('Shop Now') }} <i class="fi-rs-arrow-small-left"></i>
        </a>
    </div>
</div>
