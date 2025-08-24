@php use App\Enums\Icon; @endphp
<div x-data="taskPopup()" class="relative">

    @livewire('icon-button', [
        'name' => 'task-btn',
        'label' => 'Start task',
        'icon_html' => \App\Enums\Icon::getIconHtml(\App\Enums\Icon::ADD),
    ])

    <template x-if="showModal">
        <div
            class="fixed inset-0 bg-opacity-50 z-50 bg-c-background"
        >
            <button @click="close()"
                    class="absolute top-2 right-2 w-12 h-12 flex items-center justify-center text-gray-600 hover:text-black text-4xl font-bold rounded-full hover:bg-gray-200 transition">
                &times;
            </button>

            <div class="absolute left-0 right-0 top-10">

                <div class="my-8 w-[90%] mx-auto">
                    <livewire:components.search/>
                    <br/>

                    @livewire('task.tasks-list')
                </div>
            </div>
        </div>
    </template>

    @script
    <script>
        Alpine.data('taskPopup', () => ({
            task: null,
            taskDetails: '',
            showModal: false,

            init() {
                $wire.on('button-clicked:task-btn', () => {
                    this.task = 'Task';
                    this.showModal = true;
                    this.fetchTaskDetails(this.task);
                });
            },

            close() {
                this.showModal = false;
                this.taskDetails = '';
            },

            fetchTaskDetails(label) {

            },
        }))

    </script>
    @endscript
</div>
