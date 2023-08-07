@props(['removable' => false, 'media' => null])
<div class="relative group h-[3.875rem] w-[3.875rem]"
      x-data="{
         remove() {
            $dispatch('remove', {id: {{$media->id}}})
         }
      }"
   {{$attributes}}
>
   
   @if($removable)
   <a href="" @click.prevent="remove" class="invisible group-hover:visible block rounded-full p-1 w-6 h-6 absolute bg-slate-100 hover:bg-blue-500 hover:text-white 
            -right-1 -top-1 cursor-pointer mouse focus:ring-1">
      <x-tabler-x class="w-4 h-4"/>
   </a>
   @endif

   @if($media->type === 'image')
   <div class=" h-[3.875rem] w-[3.875rem]  rounded-md ring-2 ring-white dark:ring-gray-800 overflow-hidden">
      <img src="{{$media->getFullUrl()}}" class="object-scale-down ">
   </div>
   @endif

   @if($media->type === 'pdf')
   <div class=" h-[3.875rem] w-[3.875rem]  rounded-md ring-2 ring-white dark:ring-gray-800 overflow-hidden">
      <x-icomoon-file-pdf />
   </div>
   @endif

</div>
