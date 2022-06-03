<x-app-layout>
    <div class="flex justify-center">
        <div class="form-card">
            <div class="text-xl pb-8 ">Create company</div>
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class='text-gray-500 block mb-4' for=' company-name'>Logo</label>
                <input class="file-input" placeholder="image" type="file" name="logo" />

                @error('logo')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-6' for='company-name'>Company name</label>
                <input class="form-input" id='company-name' name='name' />

                @error('name')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-4' for='company-email'>Email</label>
                <input class="form-input" id='company-email' type='email' name='email' />

                @error('email')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <label class='text-gray-500 block mt-4' for='company-website'>Website url</label>
                <input class="form-input" id='company-website' type='url' name='website' />

                @error('website')
                    <div class='error-text'>{{ $message }}</div>
                @enderror

                <button type="submit" class="mt-8 primary-btn ">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>
