@if ($errors->any())
    <x-elements.alert type="danger" class="mt-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-elements.alert>
@endif
