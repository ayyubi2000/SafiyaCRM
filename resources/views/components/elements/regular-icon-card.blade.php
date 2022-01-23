<div class="card text-center">
    <div class="card-body">
        <div class="feature widget-2 text-center mt-0 mb-3">
            <i class="{{ $icon ??  'ti-bar-chart'}} project
                bg-{{ $type ?? 'primary' }}-transparent mx-auto
                text-{{ $type ?? 'primary' }}"></i>
        </div>
        <h6 class="mb-1 text-muted">{{ $title }}</h6>
        <h3 class="font-weight-semibold">{{ numberFormat($value) }}</h3>
    </div>
</div>
