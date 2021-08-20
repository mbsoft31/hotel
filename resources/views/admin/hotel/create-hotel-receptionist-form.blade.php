<div>

    <div class="flex items-center space-x-4">
        <label for="receptionist_id">{{ __("Receptionist") }}</label>
        <select wire:model="state.receptionist_id" name="receptionist_id" id="receptionist_id" class="w-64 form-input border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm rounded-md">
            @foreach($receptionists as $receptionist)
                <option value="{{ $receptionist->id }}">{{ $receptionist->name }}</option>
            @endforeach
        </select>
        <button wire:click="save" type="button" class="border px-4 py-2">save</button>
    </div>

</div>
