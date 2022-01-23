@if(session('livewire-error'))
    <x-elements.alert type="danger" class="mt-4">
        {!! session('livewire-error') !!}
    </x-elements.alert>
@endif

@if(session('livewire-success'))
    <x-elements.alert type="success" class="mt-4">
        {!! session('livewire-success') !!}
    </x-elements.alert>
@endif
