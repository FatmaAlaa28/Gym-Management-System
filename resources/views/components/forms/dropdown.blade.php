@props(['name', 'collection', 'type', 'select']) {{-- type => radio or checkbox --}}

<div class="dropdown-center col-md-6">
    <label class="form-label">{{ $slot }}</label>
    <button class="dropdown-toggle form-control @error($name) is-invalid @enderror" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        {{ $slot }}
    </button>
    <div class="dropdown-menu px-2" style="width: 95%">
        <ul class="list-group">
            @forelse ($collection as $item)
                <li class="list-group-item list-group-item-action">
                    <x-forms.check type="{{ $type }}" name="{{ $name }}" value="{{ $item->id }}" :select="old($name, $select) == $item->id">{{ $item->name }}</x-forms.check>
                </li>
            @empty
                <p class="mb-0 text-success">This is empty up until now.</p>
            @endforelse
        </ul>
    </div>
    <x-forms.error :name="$name" />
</div>