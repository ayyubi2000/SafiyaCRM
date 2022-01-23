<div class="card">
    <div class="card-body">
        <div class="card-widget">
            <h6 class="mb-2">{{ $title }}</h6>
            <h2 class="text-right">
                <i class="icon-size {{ $icon ?? 'typcn typcn-shopping-cart' }}
                    float-left text-{{ $type ?? 'primary' }} text-warning-shadow"></i>
                <span>{{ numberFormat($value) }}</span>
            </h2>
            <p class="mb-0">
                {{ $compareTitle }}
                <span class="float-right">
                    {{ numberFormat($compareValue) }}
                </span>
            </p>
        </div>
    </div>
</div>
