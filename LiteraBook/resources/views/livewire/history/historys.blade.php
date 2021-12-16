<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" align="center">
            <b>History</b>            
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <table class="table-fixed w-full mt-3">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2">Book Title</th>
                            <th class="px-4 py-2">Release Year</th>
                            <th class="px-4 py-2">Total Pages</th>
                            <th class="px-4 py-2">Author</th>
                            <th class="px-4 py-2">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($the_history as $history)
                            <tr>
                                <td class="border px-4 py-2">{{ $history->id }}</td>
                                <td class="border px-4 py-2">{{ $history->bookTitle }}</td>
                                <td class="border px-4 py-2">{{ $history->releaseYear }}</td>
                                <td class="border px-4 py-2">{{ $history->totalPages }}</td>
                                <td class="border px-4 py-2">{{ $history->author }}</td>
                                <td class="border px-4 py-2">{{ $history->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
