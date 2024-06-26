@extends('layouts.frontend.app')

@section('title','Tài khoản')
@push('css')
    <style>
        .accout {
            box-shadow: 0 6px 22px 0 rgb(0 0 0 / 8%);
            border: 1px solid #fff;
            border-radius: 0.45rem;
            margin: 0 auto;
            margin-top: 100px;
            margin-bottom: 50px;
            background: #fff;
            padding: 20px;
            width: 700px;
        }
        .accout-title {
            text-align: center;
            font-family: "Merriweather";
            font-weight: 700;
            line-height: 33px;
            margin-bottom: 30px;
            color: #F7931A;
            font-size: 20px;
        }
        .wrap-img-News {
            position: relative;
            width: 150px;
            margin: 0 auto;
        }
        .wrap-img-News .avatarNews {
            width: 150px;
            height: 150px;
            border: 2px solid #d2d6de;
            border-radius: 50%;
            object-fit: cover;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }
        btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }
        .accout .btn {
            background-color: #F7931A;
            color: #fff;
        }
        .ck-editor__editable {
            height: 300px;
        }
    </style>
@endpush
@section('content')

    <div class="container">
        <div class="accout">
            <form id="w0" action="{{ route('customer.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4 class="accout-title">Thông tin tài khoản</h4>
                <div class="accout-content">
                    <div id="uploaded" class="wrap-img-News">
                        <img class=" img-responsive  avatarNews" src="{{ $user->image ? url($user->image) : asset('assets/frontend/img/default-ava.png') }}" alt="">
                        <div class="form-group field-uploadAvatar mt-2">
                            <input type="hidden" name="avatar" value=""><input type="file" id="uploadAvatar" name="avatar" value="uploads/avatar/2022/05/06/default-avatar-1651810836.png">
                            <div class="help-block"></div>
                        </div>
                    </div>
                    <div class="infouser">
                        <div class="form-group field-userweb-email">
                            <label class="control-label" for="userweb-email">Email</label>
                            <input type="text" id="userweb-email" class="form-control" name="UserWeb[email]" value="{{$user->email}}" disabled="disabled">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group field-userweb-full_name">
                            <label class="control-label" for="name">Họ và Tên</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{$user->name}}" maxlength="255">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group field-userweb-user_name">
                            <label class="control-label" for="username">Tên tài khoản</label>
                            <input type="text" id="username" class="form-control" name="username" value="{{$user->username}}" maxlength="255">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group field-userweb-id_card">
                            <label class="control-label" for="identify_no">Căn cước công dân</label>
                            <input type="text" id="identify_no" class="form-control" name="identify_no" value="{{$user->identify_no}}" maxlength="255">
                            <div class="help-block"></div>
                        </div>
                        <div class="form-group field-userweb-phone">
                            <label class="control-label" for="phone">Số điện thoại</label>
                            <input type="text" id="phone" class="form-control" name="phone" value="{{$user->phone}}" maxlength="255">
                            <div class="help-block"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group field-userweb-birthday">
                                    <label class="control-label" for="date_of_birth">Ngày sinh</label>
                                    <input type="date" id="date_of_birth" class="form-control" name="date_of_birth" value="{{$user->date_of_birth}}" maxlength="255">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group field-userweb-gender">
                                    <label class="control-label" for="gender">Giới tính</label>
                                    <select id="gender" class="form-control" name="gender">
                                        @php
                                            $category= App\Helpers\Template::gender($user->gender);
                                        @endphp
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group field-userweb-description">
                            <label class="control-label" for="about">Mô tả bản thân</label>
                            <textarea id="tiny" name="about">{{ $user->about }}</textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn ">Lưu thông tin</button>
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