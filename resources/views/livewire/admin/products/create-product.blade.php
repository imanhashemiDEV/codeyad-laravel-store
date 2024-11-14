<div class="grid grid-cols-1 gap-6 p-4">
    <div class="panel p-5">

        @include('admin.layouts.alert')
        @include('admin.layouts.waiting')

        <div class="mb-5">
            <h1 class="my-4 text-xl font-semibold">ایجاد محصول</h1>
            <form  class="space-y-5">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="name">نام محصول</label>
                        <input wire:model="name" id="name" type="text" class="form-input">
                        @error('name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="e_name">نام انگلیسی محصول</label>
                        <input wire:model="e_name" id="e_name" type="text" class="form-input">
                        @error('e_name')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="price">قیمت</label>
                        <input wire:model="price" id="price" type="text" class="form-input">
                        @error('price')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="discount">درصد تخفیف</label>
                        <input wire:model="discount" id="discount" type="text" class="form-input">
                        @error('discount')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="count">تعداد</label>
                        <input wire:model="count" id="count" type="text" class="form-input">
                        @error('count')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="max_sell">حداکثر فروش</label>
                        <input wire:model="max_sell" id="max_sell" type="text" class="form-input">
                        @error('max_sell')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="category_id">دسته بندی</label>
                        <select  wire:model="category_id" id="category-select">
                            <option>انتخاب کنید</option>
                            @foreach($categories as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="brand_id">برند</label>
                        <select  wire:model="brand_id" id="brand-select">
                            <option>انتخاب کنید</option>
                            @foreach($brands as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="image">عکس محصول</label>
                        <input wire:model="image" id="ctnFile" type="file" class="p-0 rtl:file-ml-5 form-input file:border-0 file:bg-primary/90 file:py-2 file:px-4 file:font-semibold file:text-white file:hover:bg-primary ltr:file:mr-5" required="">
                        @error('image')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description">توضیحات محصول</label>
                        <textarea wire:model="description" id="editor" rows="3" class="form-textarea"></textarea>
                        @error('description')
                        <p class="text-danger mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div>
                            <button wire:click.prevent="createRow" class="btn btn-success !mt-6">ثبت</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@assets
<link rel="stylesheet" type="text/css" href="{{url('panel/css/nice-select2.css')}}" />
<script src="{{url('panel/js/nice-select2.js')}}"></script>
<script src="{{url('panel/js/ckeditor.js')}}"></script>
@endassets
@script
    <script>

            let els = document.querySelectorAll('.selectize');
            els.forEach(function (select) {
                NiceSelect.bind(select);
            });

            let options = {
                searchable: true,
            };
            NiceSelect.bind(document.getElementById('category-select'), options);
            NiceSelect.bind(document.getElementById('brand-select'), options);


            //Define an adapter to upload the files
            class MyUploadAdapter {
                constructor(loader) {
                    // The file loader instance to use during the upload. It sounds scary but do not
                    // worry — the loader will be passed into the adapter later on in this guide.
                    this.loader = loader;
                    // URL where to send files.
                    {{--this.url ="{{route('ckeditor.upload')}}";--}}
                }

                // Starts the upload process.
                upload() {
                    return this.loader.file.then(
                        (file) =>
                            new Promise((resolve, reject) => {
                                this._initRequest();
                                this._initListeners(resolve, reject, file);
                                this._sendRequest(file);
                            })
                    );
                }

                // Aborts the upload process.
                abort() {
                    if (this.xhr) {
                        this.xhr.abort();
                    }
                }

                // Initializes the XMLHttpRequest object using the URL passed to the constructor.
                _initRequest() {
                    const xhr = (this.xhr = new XMLHttpRequest());
                    // Note that your request may look different. It is up to you and your editor
                    // integration to choose the right communication channel. This example uses
                    // a POST request with JSON as a data structure but your configuration
                    // could be different.
                    // xhr.open('POST', this.url, true);
                    xhr.open("POST", this.url, true);
                    xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
                    xhr.responseType = "json";
                }

                // Initializes XMLHttpRequest listeners.
                _initListeners(resolve, reject, file) {
                    const xhr = this.xhr;
                    const loader = this.loader;
                    const genericErrorText = `Couldn't upload file: ${file.name}.`;
                    xhr.addEventListener("error", () => reject(genericErrorText));
                    xhr.addEventListener("abort", () => reject());
                    xhr.addEventListener("load", () => {
                        const response = xhr.response;
                        // This example assumes the XHR server's "response" object will come with
                        // an "error" which has its own "message" that can be passed to reject()
                        // in the upload promise.
                        //
                        // Your integration may handle upload errors in a different way so make sure
                        // it is done properly. The reject() function must be called when the upload fails.
                        if (!response || response.error) {
                            return reject(response && response.error ? response.error.message : genericErrorText);
                        }
                        // If the upload is successful, resolve the upload promise with an object containing
                        // at least the "default" URL, pointing to the image on the server.
                        // This URL will be used to display the image in the content. Learn more in the
                        // UploadAdapter#upload documentation.
                        resolve({
                            default: response.url,
                        });
                    });
                    // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                    // properties which are used e.g. to display the upload progress bar in the editor
                    // user interface.
                    if (xhr.upload) {
                        xhr.upload.addEventListener("progress", (evt) => {
                            if (evt.lengthComputable) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        });
                    }
                }

                // Prepares the data and sends the request.
                _sendRequest(file) {
                    // Prepare the form data.
                    const data = new FormData();
                    data.append("upload", file);
                    // Important note: This is the right place to implement security mechanisms
                    // like authentication and CSRF protection. For instance, you can use
                    // XMLHttpRequest.setRequestHeader() to set the request headers containing
                    // the CSRF token generated earlier by your application.
                    // Send the request.
                    this.xhr.send(data);
                }
            }

            function SimpleUploadAdapterPlugin(editor) {
                editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
                    // Configure the URL to the upload script in your back-end here!
                    return new MyUploadAdapter(loader);
                };
            }

            ClassicEditor
                .create(document.querySelector('#editor'), {
                    fontSize: {
                        options: [
                            9,
                            11,
                            13,
                            'default',
                            18,
                            20,
                            22
                        ]
                    },
                    fontFamily: {
                        options: [
                            'default',
                            'B Koodak',
                        ]
                    },
                    extraPlugins: [SimpleUploadAdapterPlugin],
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            '|',
                            'fontSize',
                            'fontFamily',
                            'fontColor',
                            '|',
                            'imageUpload',
                            'blockQuote',
                            'insertTable',
                            'undo',
                            'redo',
                            '|',
                            'bulletedList',
                            'numberedList',
                            'alignment'
                        ]
                    },
                    language: {
                        ui: 'fa',
                        content: 'fa'
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },

                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('description', editor.getData(), false);
                    })
                })
                .catch(error => {
                    console.error(error.stack);
                });


    </script>
@endscript







