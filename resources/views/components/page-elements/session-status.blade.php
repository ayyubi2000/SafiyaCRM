@if(session('status') && session('message'))
    <x-elements.alert :type="session('status')" class="mt-4">
        {!! session('message') !!}
    </x-elements.alert>
@endif
