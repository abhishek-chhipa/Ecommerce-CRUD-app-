<div class="deal_wrap">
    @if ($product->isOutOfStock())
        <span class="pr_flash" style="background-color: #000">{{ __('Out Of Stock') }}</span>
    @else
        @if ($product->productLabels->count())
            @foreach ($product->productLabels as $label)
                <span class="pr_flash" @if ($label->color) style="background-color: {{ $label->color }}" @endif>{{ $label->name }}</span>
            @endforeach
        @endif
    @endif
    <div class="product_img">
        <a href="{{ $product->url }}">
            <img src="{{ RvMedia::getImageUrl($product->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $product->name }}">
        </a>
    </div>
    <div class="deal_content">
        <div class="product_info">
            <h5 class="product_title"><a href="{{ $product->url }}">{{ $product->name }}</a></h5>
            <div class="product_price">
                <span class="price">{{ format_price($product->front_sale_price_with_taxes) }}</span>
                @if ($product->front_sale_price !== $product->price)
                    <del>{{ format_price($product->price_with_taxes) }}</del>
                    <div class="on_sale">
                        <span>{{ __(':percentage Off', ['percentage' => get_sale_percentage($product->price, $product->front_sale_price)]) }}</span>
                    </div>
                @endif
            </div>
            @if (EcommerceHelper::isReviewEnabled())
                <div class="rating_wrap">
                    <div class="rating">
                        <div class="product_rate" style="width: {{ $product->reviews_avg * 20 }}%"></div>
                    </div>
                    <span class="rating_num">({{ $product->reviews_count }})</span>
                </div>
            @endif
        </div>
        <div class="deal_progress">
            <span class="stock-sold">{{ __('Already Sold') }}: <strong>{{ $product->pivot->sold }}</strong></span>
            <span class="stock-available">{{ __('Available') }}: <strong>{{ $product->pivot->quantity - $product->pivot->sold }}</strong></span>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $product->pivot->quantity > 0 ? ($product->pivot->sold / $product->pivot->quantity) * 100 : 0 }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $product->pivot->quantity > 0 ? ($product->pivot->sold / $product->pivot->quantity) * 100 : 0 }}%"> {{ $product->pivot->quantity > 0 ? ($product->pivot->sold / $product->pivot->quantity) * 100 : 0 }}% </div>
            </div>
        </div>
        <div class="countdown_time countdown_style4 mb-4" data-time="{{ $flashSale->end_date }}" data-days-text="{{ __('Days') }}" data-hours-text="{{ __('Hours') }}" data-minutes-text="{{ __('Minutes') }}" data-seconds-text="{{ __('Seconds') }}" ></div>
    </div>
</div>
