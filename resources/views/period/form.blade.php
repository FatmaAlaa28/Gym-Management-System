<x-forms action="{{ isset($period) ? route('period.update', $period->id) : route('period.store') }}" enctype="multipart/form-data">
    <x-forms.input type="text" name="name" :value="$period->name ?? null">Name</x-forms.input>

    <x-forms.input type="text" name="coach_name" :value="$period->coach_name ?? null">Coah Name</x-forms.input>

    <x-forms.input name="start_time" type="time" :value="isset($period) ? $period->start_time->format('H:i') : null">Start Time</x-forms.input>

    <x-forms.input name="end_time" type="time" :value="isset($period) ? $period->end_time->format('H:i') : null">End Time</x-forms.input>

    <x-forms.options name="day" :collection="App\Classes\WeekDays::get()" :value="old('day', $period->day ?? null)">Select Day</x-forms.options>

    <x-forms.textarea name="description" :value="$period->description ?? null">Description</x-forms.textarea>

    @isset($period)
        @method('PUT')
    @endisset

    <x-forms.submit>{{ isset($period) ? 'Update' : 'Create' }}</x-forms.submit>
</x-forms>