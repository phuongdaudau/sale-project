@extends('layouts.backend.app')

@section('title','Bài viết')

@push('css')
    <style>
        .ck-editor__editable {
            min-height: 500px;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <form action="{{ route('master.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               CHỈNH SỬA BÀI VIẾT
                            </h2>
                        </div>
                        <div class="body">
                                <div class="m-t-15 form-line">
                                    <label class="form-label">Tên bài viết </label>
                                    <input type="text" id="name" class="form-control" name="name" maxlength="165" value="{{$product->name}}">
                                </div>
                                <div class="m-t-15 form-line">
                                    <label class="form-label">Mô tả ngắn</label>
                                    <textarea id="description" class="count-length form-control" name="description" maxlength="255" rows="3" data-name="description" data-length="165">{{$product->description}}</textarea>
                                </div>
                                <div class="m-t-15 form-line">
                                    <label class="form-label">Nội dung</label>
                                    <textarea id="tiny" name="about">{{$product->about}}</textarea>
                                </div>
                                <div class="m-t-15 form-line {{ $errors->has('category_id') ? 'focused error' : '' }}">
                                    <label for="category_id">Danh mục </label>
                                    <select name="category_id" id="category_id" class="form-control show-tick">
                                        @php
                                            $category= App\Helpers\Template::checkParentCat($product->categoryid, $categories);
                                        @endphp
                                        {!! $category!!}
                                    </select>
                                </div>
                                <div class="m-t-15 m-b-15 form-line">
                                    <label class="form-label">Tag bài viết </label>
                                    <input type="text" id="tags" class="form-control" name="tags" value="{{$tags}}">
                                </div>
                                <div class="form-group m-t-15">
                                    <label for="image">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="image[]" multiple>
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" id="status" class="filled-in" name="status" value="1"
                                        {{$product->status == true ? 'checked': ''}} >
                                    <label for="status">Bài viết nội bộ </label>
                                </div>

                            <a  class="btn btn-danger m-t-35 m-b-15 waves-effect" href="{{ route('master.product.index') }}">TRỞ LẠI</a>
                            <button type="submit" class="btn btn-primary m-t-35 m-b-15 waves-effect">CẬP NHẬT</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/backend/plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script>
        class MyUploadAdapter {
            constructor( loader ) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }

            // Aborts the upload process.
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open( 'POST', '{{ route('upload.image') }}', true );
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve( {
                        default: response.url
                    } );
                } );

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            // Prepares the data and sends the request.
            _sendRequest( file ) {
                // Prepare the form data.
                const data = new FormData();

                data.append( 'upload', file );

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send( data );
            }
        }

        function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter( loader );
            };
        }

        ClassicEditor
            .create( document.querySelector( '#tiny' ), {
                extraPlugins: [ MyCustomUploadAdapterPlugin ],

                // More configuration options.
                // ...
            } )
            .catch( error => {
                console.log( error );
            } );

    </script>
@endpush