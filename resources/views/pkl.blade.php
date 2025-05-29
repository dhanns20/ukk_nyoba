<x-layouts.app :title="__('Lapor PKL')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl ">
        <div class="grid auto-rows-min gap-4 md:grid-cols-1">
            {{-- <livewire:frontend.siswapkl /> --}}
            @livewire('frontend\pkl.index')

        </div> 
    </div>
</x-layouts.app>