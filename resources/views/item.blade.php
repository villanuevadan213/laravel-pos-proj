<x-layout>
    <x-slot:heading>
        Item
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $item['name'] }}</h2>

    <p>
        This is worth {{ $item['price'] }} per piece.
    </p>
</x-layout>