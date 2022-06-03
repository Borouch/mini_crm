<x-app-layout>
    <div class="mx-12 mt-12">

        <a class="primary-btn float-right mb-4 pr-8" href="{{ route('companies.create') }}">Create</a>
        <div class="shadow-md sm:rounded-lg">
            <table class="table-fixed w-full text-sm  ">
                <thead style="text-align: left" class="w-3/4 text-sm  text-gray-500 ">
                    <tr class="border-b !text-lef bg-white border-gray-300">
                        <th scope="col" class="px-6  py-3">
                            Logo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Website
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
                    @foreach ($companies as $company)
                        <tr class=" text-gray-500 border-b bg-white border-gray-300 text-left">
                            <td class="px-2 py-2">
                                <img class="{{ $company->logo == null ? 'invisible' : '' }}" width="100px"
                                    height="100px" src="{{ asset($company->logo) }}" />
                            </td>
                            <td class="px-6 py-4 break-words">{{ $company->id }}</td>
                            <td class="px-6 py-4 break-words">{{ $company->name }}</td>
                            <td class="px-6 py-4 break-words">{{ $company->email }}</td>
                            <td class="px-6 py-4">
                                <a class="font-bold text-blue-600 w-fit"
                                    href="{{ $company->website }}">{{ $company->domain }}</a>
                            </td>

                            <td class="px-6 py-4 ">
                                <a class="primary-btn"
                                    href="{{ route('companies.edit', ['company' => $company->id]) }}">Edit</a>
                            </td>

                            <td class="px-6 py-4 ">
                                <a class="primary-btn"
                                    href="{{ route('companies.show', ['company' => $company->id]) }}">Show</a>
                            </td>

                            <td class="px-6 py-4 ">
                                <form action={{ route('companies.destroy', ['company' => $company->id]) }}
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
        <div class="mt-4">{!! $companies->links() !!}</div>
    </div>

    <div style="height:4rem"></div>

</x-app-layout>
