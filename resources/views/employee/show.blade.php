@php
$fieldLabelStyle = 'text-gray-500 font-bold block mt-6 mb-2';
$fieldValueStyle = 'text-gray-500 block';
@endphp
<x-app-layout>
    <div class="flex justify-center">

        <div class="form-card">
            <div class="text-xl pb-8 ">Show employee</div>

            <div class="{{ $fieldLabelStyle }}">First name</div>
            <div class="{{ $fieldValueStyle }}">{{ $employee->first_name }}</div>

            <div class="{{ $fieldLabelStyle }}">First name</div>
            <div class="{{ $fieldValueStyle }}">{{ $employee->last_name }}</div>

            <div class="{{ $fieldLabelStyle }}">Company</div>
            <a href="{{ route('companies.show', ['company' => $employee->company->id]) }}"
                class="font-bold text-blue-600 ">{{ $employee->company->name }}</a>

            <div class="{{ $fieldLabelStyle }}">Email</div>
            <div class="{{ $fieldValueStyle }}">{{ $employee->email }}</div>

            <div class="{{ $fieldLabelStyle }}">Phone</div>
            <div class="{{ $fieldValueStyle }}">{{ $employee->phone }}</div>

            <div class="flex flex-row mt-8 ">

                <a class="primary-btn  w-min"
                    href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Edit</a>

                <form class="ml-4" action={{ route('employees.destroy', ['employee' => $employee->id]) }}
                    method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="primary-btn !bg-red-600">Delete</button>
                </form>
            </div>

        </div>
    </div>

</x-app-layout>
