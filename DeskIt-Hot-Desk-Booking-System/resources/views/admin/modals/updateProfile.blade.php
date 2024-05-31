{{-- {{route('')}} --}}

    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" >
                        <h5 class="modal-title ">{{ __('Edit Profile') }}</h5>
                        <button type="button" class="close text-xl" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>                    
                    </div>
                    <div class="modal-body">
                        <div class="form-group d-flex justify-content-center align-items-center flex-column"">
                            <img src="{{ asset('placeholder-image.jpg') }}" alt="Profile Picture" class="rounded-circle border" width="150" height="150">
                            <input type="file" name="profile_picture" class="mt-4">
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Name') }}:</strong>
                                <input type="text" name="name" placeholder="Name" class="form-control my-2" value="{{ old('name') }}" />

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Email') }}:</strong>
                                <input type="email" name="email" placeholder="Email" class="form-control my-2" value="{{ old('email') }}" />

                            </div>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Password') }}:</strong>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Confirm Password') }}:</strong>
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Role') }}:</strong>
                                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div> --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-4  d-flex justify-content-center">
                            {{-- <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">{{ __('Back') }}</button> --}}
                            <button type="submit" class="btn btn-outline-warning text-dark ">{{ __('Save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
