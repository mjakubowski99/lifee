<ul class="list rounded-box p-1">
    @foreach($tasks as $task)
        <li wire:key="{{$task['id']}}" class="bg-c-surface list-row hover:bg-gray-800 mb-2">
            {{$task['name']}}
        </li>
    @endforeach
</ul>
