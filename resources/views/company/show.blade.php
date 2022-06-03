@php
$fieldLabelStyle = 'text-gray-500 font-bold block mt-6 mb-2';
$fieldValueStyle = 'text-gray-500 block';
$isHidden = $company->logo == null ? 'hidden' : '';
@endphp
<x-app-layout>
    <div class="flex justify-center">

        <div class="form-card">
            <div class="text-xl pb-8 ">Show company</div>

            <div class="{{ $fieldLabelStyle }} {{ $isHidden }}">Logo</div>
            <img class="py-2 {{ $isHidden }}" width="100px" height="100px" src="{{ asset($company->logo) }}" />

            <div class="{{ $fieldLabelStyle }}">Name</div>
            <div class="{{ $fieldValueStyle }}">{{ $company->name }}</div>

            <div class="{{ $fieldLabelStyle }}">Email</div>
            <div class="{{ $fieldValueStyle }}">{{ $company->email }}</div>

            <div class="{{ $fieldLabelStyle }}">Website</div>
            <a class="font-bold text-blue-600 " href="{{ $company->website }}">{{ $company->domain }}</a>

            <div class="flex flex-row mt-8 ">

                <a class="primary-btn  w-min"
                    href="{{ route('companies.edit', ['company' => $company->id]) }}">Edit</a>

                <form class="ml-4" action={{ route('companies.destroy', ['company' => $company->id]) }}
                    method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="primary-btn !bg-red-600">Delete</button>
                </form>
            </div>

        </div>

        <div class="form-card ml-8">
            <div class="text-xl pb-8 ">Employees</div>

            @foreach ($company->employees as $employee)
                {{-- {{var_dump($company->employees[0]->name)}} --}}
                <a href="{{ route('employees.show', ['employee' => $employee->id]) }}"
                    class="font-bold text-blue-600 w-fit mb-2">{{ $employee->first_name }}
                    {{ $employee->last_name }}</a>
            @endforeach
        </div>

    </div>

</x-app-layout>
