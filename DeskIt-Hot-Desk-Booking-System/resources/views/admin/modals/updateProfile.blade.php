{{-- {{route('')}} --}}

<form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="modal fade text-left inverter" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mx-auto">{{ __('Choose profile picture') }}</h5>
                    <button type="button" class="close text-xl" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
                <div class="modal-body">
                    <div class="form-group d-flex justify-content-center align-items-center flex-column">
                        <img src="{{ asset('/images/anonymous.jpg') }}" alt="Profile Picture" class="inverter rounded-circle border" width="150" height="150">
                        <div class="mt-4 inverter">
                            <label for="avatar" class="cursor-pointer inline-flex items-center px-4 py-2 bg-amber-100 text-gray-700 border border-gray-300 rounded-lg shadow-sm">
                                <img src="{{ asset('images/addphoto.svg')}}" class="pr-3">
                                <span>Upload Photo</span>
                                <input type="file" name="avatar" id="avatar" class="hidden">
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-4 d-flex justify-content-center">
                        <button type="submit" class="lift btn btn-outline-warning text-dark py-24">{{ __('Save') }}</button>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</form>
