@props([
    'items' => [] // Array of array: [['label' => 'Home', 'url' => '/'], ['label' => 'Kegiatan', 'url' => '/kegiatan']]
])

<nav class="flex text-slate-500 dark:text-slate-400 text-sm font-medium py-3" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        <li class="inline-flex items-center">
            <a href="{{ route('home') }}" class="inline-flex items-center hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                Beranda
            </a>
        </li>
        @foreach($items as $item)
            <li>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-slate-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    @if(isset($item['url']) && !$loop->last)
                        <a href="{{ $item['url'] }}" class="ml-1 md:ml-2 hover:text-emerald-600 dark:hover:text-emerald-400 transition-colors">
                            {{ $item['label'] }}
                        </a>
                    @else
                        <span class="ml-1 md:ml-2 text-slate-700 dark:text-slate-200 select-none">
                            {{ $item['label'] }}
                        </span>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav>
