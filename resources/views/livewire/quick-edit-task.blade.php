<div class="p-0 w-full">
    <div x-show="!$wire.open">
        <button x-on:click="$wire.$js.start()" type="button" class="text-2lg w-full flex justify-between items-center bg-c-primary rounded px-2 py-3 gap-x-4 hover:bg-blue-600">
            <span class="text-lg">{{$button_content ?? 'Ustaw zadanie'}}</span>
            <span>
                {!! $icon_html !!}
            </span>
        </button>
    </div>

    <div x-show="$wire.open">
        <form wire:submit.prevent="save" class="w-full inline-flex items-center gap-2 relative flex-wrap md:flex-nowrap">
            <div class="relative m-1 w-full">
                @error('content')
                    <p class="text-red-500"> {{$message}} </p>
                @enderror
                <input
                    type="text"
                    wire:model.live.debounce.500ms="content"
                    x-on:focus="$wire.$js.loadSuggestions"
                    placeholder="Wpisz treść zadania..."
                    autocomplete="off"
                    spellcheck="false"
                    class="w-full rounded-xl px-4 py-4 text-sm bg-c-surface focus:ring-1 focus:ring-c-primary focus:outline-none
                        @error('content') border border-red-500 @enderror"
                />

                <!-- DROPDOWN -->
                <ul
                    x-show="$wire.suggestions.length > 0"
                    @click.outside="$wire.$js.clearSuggestions"
                    class="w-full absolute left-0 top-full mt-1 bg-c-surface rounded-xl shadow-lg z-50"
                >
                    <template x-for="(suggestion, index) in $wire.suggestions" :key="index">
                        <li
                            x-text="suggestion['name']"
                            x-on:click="$wire.$js.selectSuggestion(suggestion)"
                            class="px-3 py-2 text-sm cursor-pointer hover:bg-c-primary"
                        ></li>
                    </template>
                </ul>
            </div>

            <button type="submit" class="rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Zapisz
            </button>

            <button type="button" x-on:click="$wire.$js.cancel()" class="rounded-xl px-4 py-2 text-sm text-gray-500 hover:bg-gray-100">
                Anuluj
            </button>
        </form>
    </div>
</div>

@script
<script>

    $js('start', () => {
        $wire.open = true;
    });

    $js('cancel', () => {
        $wire.open = false;
    });

    $js('clearSuggestions', () => {
        $wire.suggestions = [];
    });

    $js('loadSuggestions', () => {
        $wire.loadSuggestions();
    });

    $js('selectSuggestion', (suggestion) => {
        $wire.content = suggestion['name'];
        $wire.selected_task_id = suggestion['id'];
        $wire.suggestions = [];
    });
</script>
@endscript
