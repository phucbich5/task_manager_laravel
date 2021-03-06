<div class="relative" style="height:auto">

    <div class="container mx-auto py-5 pl-20">
        <div class="mx-auto w-full py-10">
            <h1 class="text-3xl font-bold">Task name: <span class="text-blue-500">{{ $task->name }}</span></h1>
        </div>

        <ol class="relative border-l border-blue-500 dark:border-gray-700">

            @if (count($task->steps) != 0)
                @foreach ($steps as $step)
                    {{-- {{dd($s)}} --}}
                    <li class="mb-10 ml-6 border-b">
                        <div
                            class="absolute w-3 h-3 bg-blue-500 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                        </div>
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $step->name }}
                            <span
                                class="text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3 flex">
                                @if ($step->status == 'review')
                                    <p class="p-1 text-xs text-white bg-purple-400 rounded-md px-10 border-0"
                                        name="status">review
                                    </p>

                                    <span class="ml-2 text-green-500"
                                        wire.click="mark_status_complete({{ $step->task_id, $step->id }})"><i
                                            class="fas fa-check"></i></span>
                                @elseif ($step->status == 'completed')
                                    <p class="p-1 text-xs text-white bg-blue-400 rounded-md px-10 border-0"
                                        name="status">complete
                                    </p>
                                @elseif($step->status == 'progress')
                                    <p class="p-1 text-xs text-white bg-yellow-500 rounded-md px-10 border-0"
                                        name="status">progress
                                    </p>
                                @elseif($step->status == 'cancelled')
                                    <p class="p-1 text-xs text-white bg-green-500 rounded-md px-10 border-0"
                                        name="status">complete
                                    </p>
                                @elseif($step->status == 'not started')
                                    <p class="p-1 text-xs text-white bg-red-400 rounded-md px-10 border-0"
                                        name="status">not started
                                    </p>
                                    <button class="ml-2 text-green-500" type="button"
                                        wire:click="changestatus({{ $step->id }})"><i
                                            class="fas fa-check"></i></button>
                                @endif
                            </span>
                        </h3>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400 ">
                            <div class="flex items-center mb-2">
                                <img src="/storage/{{ $step->assigned_user->image }}" alt="" style="width:30px;height:30px;border-radius:50%;">
                                
                                <p class="ml-2">{{ $step->assigned_user->name }}</p>
                            </div>
                                    

                        </p>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                            <i class="fa-solid fa-book text-blue-500 mr-2"></i>{{ $step->description }}
                        </p>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">
                            <i class="fas fa-clock text-blue-500 mr-2"></i>{{ $step->deadline }}
                        </p>
                    </li>
                @endforeach
            @else
                <h3 class="flex items-center mb-1 text-lg font-semibold text-red-500 dark:text-white pl-10">
                    Don't have step
                </h3>
            @endif

        </ol>
    </div>


</div>
