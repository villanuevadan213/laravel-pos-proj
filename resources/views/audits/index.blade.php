<x-layout>
    <x-slot:heading>
        Audit Page
    </x-slot:heading>

    <div class="space-y-4">
        <x-button href="/audits/create">Add Audit</x-button>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col">
                        Title
                    </th>
                    <th scope="col">
                        Product Control #
                    </th>
                    <th scope="col">
                        Basket #
                    </th>
                    <th scope="col">
                        Serial #
                    </th>
                    <th scope="col">
                        Tracking #
                    </th>
                    <th scope="col">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($audits as $audit)
                    <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-white' }} text-center">
                        <td class="text-gray-500">{{ $audit['title'] }}</td>
                        <td class="text-gray-500">{{ $audit['product_control_no'] }}</td>
                        <td class="text-gray-500">{{ $audit['basket_no'] }}</td>
                        <td class="text-gray-500">{{ $audit['serial_no'] }}</td>
                        <td class="text-gray-500">{{ $audit['tracking_no'] }}</td>
                        <td class="text-gray-500">
                            <x-button href="/audits/{{ $audit->id }}/edit">Edit</x-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>