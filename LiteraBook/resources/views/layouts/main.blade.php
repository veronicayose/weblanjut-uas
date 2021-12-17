<x-app-layout>
    <div class="py-12">
        <div class="grid grid-cols-4 gap-4 sm:px-6 lg:px-8">
            <div class="col-start-1 col-span-2 bg-white shadow-xl sm:rounded-lg">
                @yield('content1')
            </div>
            <div class="col-end-4 col-span-2 bg-white shadow-xl sm:rounded-lg">
                @yield('content1')
            </div>
        </div>
        <div class="row sm:px-6 lg:px-8">
            {{-- <x-jet-button class="border border-gray-300 text-black font-bold py-2 px-4 my-2 rounded">{{ __('Notes') }}</x-jet-button>
            <x-jet-button class="border border-gray-300 text-black font-bold py-2 px-4 my-2 rounded">{{ __('Quote') }}</x-jet-button> --}}
        </div>
    </div>
</x-app-layout>
