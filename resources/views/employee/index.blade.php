<x-app-layout>
    <div class="mx-12 mt-12">

        <a class="primary-btn float-right mb-4 pr-8" href="{{ route('employees.create') }}">Create</a>
        <div class="shadow-md sm:rounded-lg">
            <table class="table-fixed w-full text-sm  ">
                <thead style="text-align: left" class="w-3/4 text-sm  text-gray-500 ">
                    <tr class="border-b !text-lef bg-white border-gray-300">
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            First name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Last name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Edit
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            Show
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delete
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class=" text-gray-500 border-b bg-white border-gray-300 text-left">
                            <td class="px-6 py-4">{{ $employee->id }}</td>
                            <td class="px-6 py-4 break-words">{{ $employee->first_name }}</td>
                            <td class="px-6 py-4 break-words">{{ $employee->last_name }}</td>
                            <td class="px-6 py-4 break-words">{{ $employee->company->name }}</td>
                            <td class="px-6 py-4 break-words">{{ $employee->email }}</td>
                            <td class="px-6 py-4 break-words">{{ $employee->phone }}</td>

                            <td class="px-6 py-4 ">
                                <a class="primary-btn"
                                    href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Edit</a>
                            </td>
                            <td class="px-6 py-4 ">
                                <a class="primary-btn"
                                    href="{{ route('employees.show', ['employee' => $employee->id]) }}">Show</a>
                            </td>
                            <td class="px-6 py-4 ">
                                <form action={{ route('employees.destroy', ['employee' => $employee->id]) }}
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="primary-btn !bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>

        </div>
        <div class="mt-4">{!! $employees->links() !!}</div>
    </div>



    <div style="height:4rem"></div>

</x-app-layout>
