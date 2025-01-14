<select wire:model.defer="userAnswers.{{ $answerKey }}" class="form-select w-auto select2">
    <option value="">-- Select an answer --</option>
    @foreach ($options as $option)
        <option value="{{ $option }}">{{ $option }}</option>
    @endforeach
</select>
