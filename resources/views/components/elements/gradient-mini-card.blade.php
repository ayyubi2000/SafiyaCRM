<div class="card bg-{{ $type ?? 'primary' }}-gradient text-{{ $text ?? 'white' }}">
    <div class="card-body">
        <div class="row">
            <div class="col-6">
                <div class="icon1 mt-2 text-center">
                    {!! $icon ?? '<i class="fe fe-users tx-40"></i>' !!}
                </div>
            </div>
            <div class="col-6">
                <div class="mt-0 text-center">
                    <span class="text-{{ $text ?? 'white' }}">{{ $title }}</span>
                    <h2 class="text-{{ $text ?? 'white' }} mb-0">{{ numberFormat($value) }}{{ $afterValue ?? '' }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
