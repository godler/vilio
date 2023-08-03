@props(['name' => 'file_upload'])


<div class="mx-auto w-full mb-3">
    <div class="border rounded-md @error($name) border-red-500 @enderror">
        <label class="s block text-sm font-medium text-gray-700 " for="{{ $name }}">


            <input {{ $attributes }}
                class="block w-full text-sm 
                        file:mr-4 file:rounded-md 
                        file:border-0 file:bg-blue-500 
                        file:py-2.5 
                        file:px-4 
                        file:text-sm 
                        file:font-semibold 
                        file:text-white 
                        hover:file:bg-primary-700 focus:outline-none 
                        disabled:pointer-events-none disabled:opacity-60"
                id="{{ $name }}" type="file">
        </label>
    </div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->


    @error($name)
        <span class="text-xs text-red-500 px-2">
            {{ $message }}
        </span>
    @enderror
</div>
