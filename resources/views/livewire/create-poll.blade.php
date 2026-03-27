<div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-xl border">

    <!-- Title -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">🗳️ Create a New Poll</h2>

    <form wire:submit.prevent="createPoll" class="space-y-6">

        <!-- Poll Title -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Poll Title
            </label>

            <input type="text"
                   wire:model="title"
                   class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">

            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Add Option Button -->
        <div>
            <button type="button"
                    wire:click.prevent="addOption"
                    class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                ➕ Add Option
            </button>
        </div>

        <!-- Poll Options -->
        <div class="space-y-4">
            @foreach ($options as $index => $option)
                <div class="bg-gray-50 p-4 rounded-lg border shadow-sm">

                    <label class="block text-sm font-semibold text-gray-600 mb-2">
                        Option {{ $index + 1 }}
                    </label>

                    <div class="flex gap-2">
                        <input type="text"
                               wire:model="options.{{ $index }}"
                               class="flex-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">

                        <button type="button"
                                wire:click.prevent="removeOption({{ $index }})"
                                class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            ❌
                        </button>
                    </div>

                    @error("options.$index")
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>
            @endforeach
        </div>

        <!-- Submit Button -->
        <div class="text-right">
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow-md">
                Create Poll 🚀
            </button>
        </div>

    </form>

    <!-- Poll List -->
    <div class="mt-10 border-t pt-6">
        @livewire('polls')
    </div>

</div>
