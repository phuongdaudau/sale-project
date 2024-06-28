@extends('layouts.frontend.app')

@section('title','Tài khoản')
@push('css')
    <style>
        .wrap-img-News {
            position: relative;
            width: 200px;
        }
        .wrap-img-News .avatarNews {
            width: 200px;
            height: 150px;
        }
        img {
            vertical-align: middle;
            border-style: none;
        }
        .wrap-img-News #uploadAvatar {
            width: 200px;
            height: 150px;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
        }
        .ck-editor__editable {
            height: 500px;
        }
        .label span {
            float: right;
            background: #00c0ef;
            color: #fff;
            padding: 0 3px;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="wrap-send">
            <form action="{{ route('customer.product.updated', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="product-id" name="product-id" value="{{ $product->id }}">
                <div class="news-update">
                    <p class="title-send">Chỉnh sửa bài viết </p>
                    <div class="row form-group">
                        <label class="col-md-2 label" for="name">Tiêu đề bài viết</label>
                        <div class="col-md-10">
                            <div class="wrap-count field-news-title">
                                <input type="text" id="name" class="change-slug count-length form-control" name="name" maxlength="255" data-target="news-slug" data-name="name" data-length="70" value="{{ $product->name }}">
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 label" for="description">Mô tả ngắn</label>
                        <div class="col-md-10">
                            <div class="wrap-count field-news-description">
                                <textarea id="description" class="count-length form-control" name="description" maxlength="255" rows="3" data-name="description" data-length="165"> {{ $product->description }}</textarea>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 label">Nội dung</label>
                        <div class="col-md-10">
                            <div class="form-group field-news-content">
                                <textarea id="tiny" name="about"> {{ $product->about }} </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 label">Ảnh đại diện</label>
                        <div class="col-md-10">
                            <div id="uploaded" class="wrap-img-News">
                                <img class=" img-responsive avatarNews" src="{{ $product->image ? url($product->image) : asset('assets/frontend/img/default-thumb.jpg') }}" alt="User profile picture">
                                <div class="form-group field-uploadAvatar">
                                    <input type="hidden" name="image" value="{{ $product->image }}"><input type="file" id="uploadAvatar" name="image" accept="image/png, image/jpeg">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 label">Chủ đề</label>
                        <div class="col-md-10">
                            <div class="form-group field-news-category_id">
                                <select id="category_id" class="form-control" name="category_id">
                                    @php
                                        $category= App\Helpers\Template::checkParentCat($product->category_id, $category);
                                    @endphp
                                </select>
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 label">Tag</label>
                        <div class="col-md-10">
{{--                            @dd($tags)--}}
                            <div class="form-group field-news-pseudonym">
                                <input type="text" id="tags" class="form-control" name="tags" maxlength="50" placeholder="VCB, ngân hàng, cổ phiếu" value="{{$tags}}">
                                <div class="help-block"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center" style="margin-top: 20px;">
                        <!-- <a href="javascript: history.go(-1)" class="btn btn-danger" style="margin-right: 15px">Quay lại</a> -->
                        <button type="submit" class="btn btn-success">Gửi bài viết</button>
                    </div>
                </div>
            </form>
        </div>
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