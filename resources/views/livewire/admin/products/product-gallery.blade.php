<div class="grid grid-cols-1 gap-6 p-4">
    <div class="panel p-5">

        <div class="mb-5">
            <h1 class="my-4 text-xl font-semibold">ایجاد گالری محصول</h1>
            <form  class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="images">عکس محصول</label>
                        <input wire:model="images" multiple id="ctnFile" type="file" class="p-0 rtl:file-ml-5 form-input file:border-0 file:bg-primary/90 file:py-2 file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5">
                        @error('images')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <button wire:click.prevent="createRow" class="btn btn-success !mt-6">ذخیره عکس ها</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($images)
        <div class="panel">
            <div class="m-5">
                <div class="flex flex-wrap items-center justify-center gap-2 text-white">
                    @foreach($images as $image)
                        <div class="relative">
                            <img src="{{$image->temporaryUrl()}}" alt="image" class="object-cover w-24 h-24 rounded-full">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="panel">
        <div class="m-5">
            <div class="flex flex-wrap items-center justify-center gap-2 text-white">
               @foreach($this->gallerire as $gallery)
                    <div class="relative">
                        <img src="{{url('images/products/'.$gallery->name)}}" alt="image" class="object-cover w-24 h-24 rounded-full">
                        <span wire:click="removeImage({{$gallery->id}})" class="badge cursor-pointer  absolute -top-3 rounded-full bg-danger p-0.5 px-1.5 ltr:right-0 rtl:left-0">x</span>
                    </div>
               @endforeach
            </div>
        </div>
    </div>
</div>







