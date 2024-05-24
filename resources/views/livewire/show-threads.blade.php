<div class="max-w-7xl mx-auto px-4 sm:px6 lg:px-8 flex gap-20 py-12">
    <div class="w-64">
        <a href="{{ route('threads.create') }}"
            class="block w-full py-4 mb-10 bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 font-bold text-xs text-center rounded-md  ">Preguntar</a>
        <ul>
            @foreach ($categories as $category)
                <li class="mb-2">
                    <a href="#" wire:click.prevent="filterByCategory('{{ $category->id }}')"
                        class="p-2 rounded-md flex bg-slate-800 items-center gap-2 text-white/60 hover:text-white font-semibold text-xs capitalize">
                        <span class="w-2 h-2 rounded-full" style="background-color:  {{ $category->color }};"></span>
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach


            <li>
                <a href="#" wire:click.prevent="filterByCategory('')"
                    class="p-2 rounded-md flex bg-slate-800 items-center gap-2 text-white/60 hover:text-white font-semibold text-xs">
                    <span class="w-2 h-2 rounded-full" style="background-color: #000;"></span>
                    Todos los resultados
                </a>
            </li>


        </ul>
    </div>
    <div class="w-full">
        {{-- formulario --}}
        <form action="" class="mb-4">
            <input type="text" placeholder="//..."
                class="bg-slate-800 border-0 rounded-md w-1/3 p-3 text-white/60 text-xs" wire:model.live="search">
        </form>
        @foreach ($threads as $thread)
            <div class="rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">
                <div class="p-4 flex gap-4">
                    <div>
                        <img src="{{ $thread->user->avatar() }}" alt="{{ $thread->user->name }}" class="rounded-md">
                    </div>
                    <div class="w-full">
                        <h2 class="mb-4 flex items-start justify-between">
                            <a href="{{ route('thread', $thread) }}"
                                class="text-xl font-semibold text-white/90">{{ $thread->title }}</a>
                            <span class="rounded-full text-xs py-2 px-4 capitalize"
                                style="color: {{ $thread->category->color }}; border: 1px solid {{ $thread->category->color }};">{{ $thread->category->name }}</span>
                        </h2>
                        <p class="flex items-center justify-between w-full text-xs ">
                            <span class="text-blue-600 font-semibold">{{ $thread->category->name }}
                                <span class="text-white/90">{{ $thread->created_at->diffForHumans() }}</span>
                            </span>
                            <span class="flex items-center gap-1 text-slate-700">{{ $thread->replies_count }}
                                Respuesta{{ $thread->replies_count !== 1 ? 's' : '' }}
                                

                                <svg fill="currentColor" class="h-4 " viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z">
                                    </path>
                                    <path
                                        d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z">
                                    </path>
                                </svg>
                                |@can('update', $thread)
                                    <a href="{{ route('threads.edit', $thread) }}" class="hover:text-white">Editar</a>

                                @endcan

                            </span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>
