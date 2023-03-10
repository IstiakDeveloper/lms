<div>

    <form wire:submit.prevent="submitForm" class="mb-6">
        <div class="-mx-4 mb-4  flex">
            <div class="flex-1 px-4">
                <label for="" class="lms-label">Name</label>
                <input wire:model="name" type="text" class="lms-input">

                @error('name')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                @enderror
            </div>

            <div class="flex-1 px-4">
                <label for="" class="lms-label">Email</label>
                <input wire:model="email" type="email" class="lms-input">

                @error('email')
                    <div class="text-red-500 text-sm">{{$message}}</div>
                 @enderror
            </div>

            <div class="flex-1 px-4">
                <label for="" class="lms-label">Phone</label>
                <input wire:model="phone" type="text" class="lms-input">

                @error('phone')
                 <div class="text-red-500 text-sm mb-2">{{$message}}</div>
                @enderror
            </div>
        </div>


        {{-- @include('components.loading-animate'); --}}

        @include('components.loading-animate')

        <button wire:loading.remove class="lms-btn" type="submit">Submit    </button>
    </form >

    <h3 class="font-bold mb-2">Notes</h3>
    @foreach ($notes as $note)
        <div class="p-2 pl-5 mb-2 rounded bg-gray-200">{{$note->description}}</div>
    @endforeach

    <h4 class="font-bold mt-6 mb-2">Add Notes</h4>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea  wire:model.lazy="note" class="lms-input" placeholder="Type Note"></textarea>
        </div>
        <button class="lms-btn mt-4" type="submit">Save Note</button>
    </form>


</div>
