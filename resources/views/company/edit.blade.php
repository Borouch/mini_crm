<x-app-layout>
    <div class="flex justify-center">
        <div class="form-card">
            <div class="text-xl pb-8 ">Edit company</div>
            <form action="{{ route('companies.update', ['company' => $company->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label class='text-gray-500 block' for='company-name'>Logo</label>
                <img class="py-2 {{ $company->logo == null ? 'invisible' : '' }}" width="100px" height="100px" src="{{ asset($company->logo) }}" />
                <input value="{{ $company->logo }}" class="file-input" placeholder="image" type="file" name="logo" />

                @error('logo')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-6' for='company-name'>Company name</label>
                <input class="form-input" id='company-name' value="{{ $company->name }}" name='name' />

                @error('name')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-4' for='company-email'>Email</label>
                <input class="form-input" id='company-email' value="{{ $company->email }}" type='email'
                    name='email' />

                @error('email')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-4' for='company-url'>Website url</label>
                <input class="form-input" id='company-url' value="{{ $company->website }}" type='url' name='website' />

                @error('website')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <button type="submit" class="mt-8 primary-btn ">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
