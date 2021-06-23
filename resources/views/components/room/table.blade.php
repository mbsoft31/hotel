<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Type') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Description') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Number') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('phone') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Bed count') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ __('Floor number') }}
                        </th>
                        @can(["update room", "destroy room"])
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">{{ __('Actions') }}</span>
                        </th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($hotel->rooms as $room)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $room->type->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $room->description }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $room->number }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $room->phone }}
                            </td>
                            <td class="px-6 py-4">
                            {{ $room->bed_count }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $room->floor_number }}
                            </td>
                            @can(["update room", "destroy room"])
                            <td class="px-6 py-4 space-x-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route("room.edit", compact("room", "hotel"))}}" class="text-green-600 hover:text-green-900">Edit</a>
                                <a href="{{route("room.destroy", compact("room", "hotel"))}}" class="text-red-600 hover:text-red-900">Delete</a>
                            </td>
                            @endcan
                        </tr>
                    @endforeach

                    <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
