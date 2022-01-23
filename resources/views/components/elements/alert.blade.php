<div {{ $attributes->merge(['class' => "alert alert-$type"]) }} role="alert">
    <button aria-label="Close"  class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $slot }}
</div>
