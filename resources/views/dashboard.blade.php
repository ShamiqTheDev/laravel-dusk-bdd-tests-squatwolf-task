<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Testing') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-gray-800">Status of Unit Tests</h2>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Test Name</th>
                                <th>Test Description</th>
                                <th>Status</th>
                                <th>Tested</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($tests->count() > 0)
                                @foreach ($tests as $key => $test)
                                    @php
                                        $s_no = $key+1;
                                        $row_status_class = $test->test_status == 'Failed'? 'bg-red-200' : 'bg-green-200';
                                    @endphp

                                    <tr class="{{ $row_status_class }}">
                                        <td>{{ $s_no }}</td>
                                        <td>{{ $test->test_for }}</td>
                                        <td>{{ $test->test_description }}</td>
                                        <td>{{ $test->test_status }}</td>
                                        <td>{{ $test->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="5">
                                    There are no tests conducted yet !
                                </td></tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $tests->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
