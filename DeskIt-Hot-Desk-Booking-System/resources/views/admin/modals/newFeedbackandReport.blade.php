@php
    $formattedDate = now()->format('m-d-Y');
@endphp

<form action="{{ route('issue.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="modal fade text-left inverter" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close text-xl pt-1 pr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-header flex flex-col">
                    <p class="absolute left-5 top-5 text-base font-bold">{{$formattedDate}}</p>
                    <h5 class="modal-title text-xl font-bold p-0">{{ __('Share your thoughts') }}</h5>
                    <div class="bg-grey p-3 mt-3 rounded-md w-full">
                        <h6>Required fields are marked with an asterisk <span class="text-red inverter">*</span></h6>
                        <h6>Let us know how we can improve your experience.</h6>
                    </div>
                   
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group mb-2">
                        <Strong for="deskNumber">Desk Number <span class="text-red inverter">*</span></Strong>
                        <input type="number" id="deskNumber" name="deskNumber" class="form-control my-2 bground3" min="101" max="236" required>
                    </div>

                    <div class="form-group mb-2">
                        <Strong for="subject">Subject <span class="text-red inverter">*</span></Strong>
                        <input type="text" id="subject" name="subject" class="form-control my-2 bground3" required>
                    </div>
                    
                    <div class="form-group mb-2">
                        <strong class="text-start">Select Issue type <span class="text-red inverter">*</span></strong>
                        <select class="form-select text-center my-2 bground3" name="type" required>
                        <option value="">Choose one</option>
                        <option value="bug">Report a Bug</option>
                        <option value="feedback">Give Feedback</option>
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group m-2">
                            <strong>Describe your Experience <span class="text-red inverter">*</span></strong>
                            <textarea id="description" name="description" placeholder="description" class="bground3 border border-gray-300 rounded w-full my-2 px-3 p-2 text-gray-700 leading-tight focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500 h-20 resize-none" required></textarea>
                        </div>

                        </div>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox text-blue-600 border border-2 inverter">
                            <span class="text-sm px-3"> Deskit can contact me to learn about my experiences and to improve Deskit services. I acknowledge the Deskit Privacy Policy.</span>
                        </label>
                    </div>

                    <div class="mb-4 mt-1 d-flex justify-end">
                        <button type="button" class="inverter-text btn grey btn-outline-secondary mx-3" data-dismiss="modal">{{
                            __('Cancel') }}</button>
                        <button type="submit" class="inverter-text btn btn-outline-warning text-dark mr-8">{{ __('Submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>