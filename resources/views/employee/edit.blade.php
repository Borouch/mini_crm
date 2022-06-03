@php
use App\Models\Company;
@endphp
<x-app-layout>
    <div class="flex justify-center">
        <div class="form-card">
            <div class="text-xl pb-8 ">Edit employee</div>
            <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <label class='text-gray-500 block mt-6' for='employee-first-name'>First name</label>
                <input class="form-input" id='employee-first-name' value="{{ $employee->first_name }}" type="text"
                    name='first_name' />

                @error('first_name')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-6' for='employee-last-name'>First name</label>
                <input class="form-input" id='employee-last-name' value="{{ $employee->last_name }}" type="text"
                    name='last_name' />

                @error('last_name')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label for="companies" class="text-gray-500 block mt-6">Company</label>
                <select id="companies" name="company_id"
                style="background-color:#f9f7f7; border-color:#EDEDED"
                    class="bg-gray-50 border border-gray-200 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-black text dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{$employee->company->id}}" selected>{{$employee->company->name}}</option>
                    @foreach ( Company::all() as $company )
                    <option value={{$company->id}}>{{$company->name}}</option>
                    @endforeach
                </select>
                @error('company_id')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-4' for='employee-email'>Email</label>
                <input class="form-input" id='employee-email' value="{{ $employee->email }}" type='email'
                    name='email' />

                @error('email')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-4' for='employee-phone'>Phone</label>
                <input class="form-input" id='employee-phone' value="{{ $employee->phone }}" type='tel'
                    name='phone' />

                @error('phone')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <button type="submit" class="mt-8 primary-btn ">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
