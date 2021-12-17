<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            <b>Quotes</b>            
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ session('message') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <x-jet-button wire:click="create()" class="border border-gray-300 text-black font-bold py-2 px-4 rounded my-3">Add</x-jet-button>
                @if($isOpen)
                    @include('livewire.quotes.create-quotes')
                @endif
                <table class="table-fixed w-full mt-3">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Book Title</th>
                            <th class="px-4 py-2">Pages</th>
                            <th class="px-4 py-2">Quotes</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($the_quotes as $the_quote)
                            <tr>
                                <td class="border px-4 py-2">{{ $the_quote->id }}</td>
                                <td class="border px-4 py-2">{{ $the_quote->bookTitle }}</td>
                                <td class="border px-4 py-2">{{ $the_quote->pages }}</td>
                                <td class="border px-4 py-2">{{ $the_quote->quote }}</td>
                                <td class="border px-4 py-2">
                                <button wire:click="edit({{ $the_quote->id }})" class="border border-gray-300 bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Edit</button>
                                <button wire:click="delete({{ $the_quote->id }})" class="border border-gray-300 bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
