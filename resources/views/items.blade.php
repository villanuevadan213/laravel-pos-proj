<x-layout>
    <x-slot:heading>
        Inventory Page
    </x-slot:heading>

    <ul>
        @foreach ($items as $item)
            <li>
                <a href="/items/{{ $item['id'] }}" class="text-blue-500 hover:underline">
                    <strong>{{ $item['name'] }}:</strong> Price {{ $item['price'] }} per piece.
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>