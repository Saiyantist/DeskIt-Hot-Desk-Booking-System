@php
    $formattedDate = now()->format('m-d-Y');
@endphp

<form action="" method="post" enctype="multipart/form-data">
    @csrf

    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close text-xl pt-1 pr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header flex flex-col">
                    <p class="absolute left-5 top-5 text-base font-bold">{{$formattedDate}}</p>
                    <h5 class="modal-title text-xl font-bold p-0">{{ __('Share your thoughts') }}</h5>
                    <div class="bg-grey p-3 mt-3 rounded-md w-full">
                        <h6>Required fields are marked with an asterisk <span class="text-red">*</span></h6>
                        <h6>Let us know how we can improve your experience.</h6>
                    </div>
                   
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="email">Email <span class="text-red">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" required>

                        
                    </div>
                    <div class="form-group mb-4">
                        <strong class="text-start">Select Feedback <span class="text-red">*</span></strong>
                        <select class="form-select text-center my-2" required>
                        <option value="">Choose one</option>
                        <option value="1">Report a Bug</option>
                        <option value="2">Give Feedback</option>
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group m-2">
                            <strong>Describe the Issue <span class="text-red">*</span></strong>
                            <textarea id="desc" name="desc" placeholder="description" class="border border-gray-300 rounded w-full my-2 px-3 p-2 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 h-32 resize-none" required></textarea>
                        </div>

                        </div>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-blue-600 border" checked>
                            <span class="text-base px-3 py-2"> Deskit can contact me to learn about my experiences and to improve Deskit services. I acknowledge the Deskit Privacy Policy.</span>
                        </label>
                    </div>

                    <div class="mb-4 mt-2 d-flex justify-end">
                        <button type="button" class="btn grey btn-outline-secondary mx-3" data-dismiss="modal">{{
                            __('Cancel') }}</button>
                        <button type="submit" class="btn btn-outline-warning text-dark mr-8">{{ __('Submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>