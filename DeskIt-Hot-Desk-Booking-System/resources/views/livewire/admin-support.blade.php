<div class="mt-16 ml-12">
   <div>
      <div class="pt-16">
         <h2 class="p-2 bg-white d-flex justify-center text-2xl">HOW CAN WE HELP?</h2>
      </div>
      
      <section>
         <!-- Search bar -->
         {{-- <div class="container m-4 text-center">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <form class="form-inline">
                     <div class="input-group">
                        <input class="form-control mr-sm-2 rounded" type="search" placeholder="Search"
                           aria-label="Search">
                     </div>
                  </form>
               </div>
            </div>
         </div> --}}


         <div class="flex justify-evenly items-center m-10 text-center">
            
            <!-- FACQ -->
            <div class="w-[20%]">
               <div class=" bg-grey rounded-t-xl shadow-md p-10">
                  <img src="{{ asset('images/facq.svg')}}">
               </div>
               <div class="bg-white rounded-b-xl shadow-md p-4 h-68">
                  <h2 class="text-2xl">FAQs</h2>
                  <p class="text-lg font-light py-2"> Explore Frequently-Asked-Questions for instant problem-solving
                     insights.</p>
                  <button wire:navigate href="{{ route('faq') }}" class=" btn-warning rounded-xl h-9 w-[80%]">View
                     FAQs</button>
               </div>
            </div>

            <!-- Privacy Policy -->
            <div class="w-[20%]">
               <div class=" bg-grey rounded-t-xl shadow-md p-10">
                  <img src="{{ asset('images/privacy.svg')}}">
               </div>
               <div class="bg-white rounded-b-xl shadow-md p-4 h-68">
                  <h2 class="text-2xl">Privacy Policy</h2>
                  <p class="text-lg font-light py-2 px-2"> Explore our commitment to safeguarding your privacy rights.</p>
                  <button wire:navigate href="{{ route('privacyPolicy') }}" class="btn-warning rounded-xl h-9 w-[80%]">View Privacy Policy</button>
               </div>
            </div>

            <!-- Guides -->
            <div class="w-[20%]">
               <div class=" bg-grey rounded-t-xl shadow-md p-10">
                  <img src="{{ asset('images/guides.svg')}}">
               </div>
               <div class="bg-white rounded-b-xl shadow-md p-4 h-68">
                  <h2 class="text-2xl">Guides</h2>
                  <p class="text-lg font-light py-2 px-3"> Efficiently use every feature with our user-friendly website
                     guide.</p>
                  <button wire:navigate href="{{ route('guides') }}" class=" btn-warning rounded-xl h-9 w-[80%]">View Guides</button>
               </div>
            </div>

            <!-- Feedback/report for Employees -->
            @if(Auth::user()->roles->contains('name', 'employee'))
               <div class="w-[20%]">
                  <div class=" bg-grey rounded-t-xl shadow-md p-10">
                     <img src="{{ asset('images/report.svg')}}">
                  </div>
                  <div class="bg-white rounded-b-xl shadow-md p-4 h-68">
                     <h2 class="text-2xl">Submit a Report or Feedback</h2>
                     <p class=" text-base font-light py-2">submit your report or feedback to help us improve our services.</p>
                     <button  href="#" data-toggle="modal" data-target="#ModalCreate" class="btn-warning rounded-xl h-9 w-[80%]">go to <i class="fa-solid fa-arrow-right"></i></button>
                  </div>
               </div>

            <!-- Feedback/report for Admins -->
            @else 
               <div class="w-[20%]">
                  <div class=" bg-grey rounded-t-xl shadow-md p-10">
                     <img src="{{ asset('images/report.svg')}}">
                  </div>
                  <div class="bg-white rounded-b-xl shadow-md p-3 h-68">
                     <h2 class="text-2xl">View Reports or Feedbacks</h2>
                     <p class=" text-base font-light p-2">submit your report or feedback to help us improve our services.</p>
                     <button wire:navigate href="{{ route('feedbacks-reports') }}" class="btn-warning rounded-xl h-9 w-[80%]">go to <i class="fa-solid fa-arrow-right"></i></button>
                  </div>
               </div>
            @endif
         </div>
      </section>

   </div>
   
   @include("admin.modals.newFeedbackandReport")
</div>