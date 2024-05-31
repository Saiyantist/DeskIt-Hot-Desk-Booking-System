<div class="mt-16 ml-20">
   <div>
      <h1 class=" pt-16 d-flex justify-center text-xl">HOW CAN WE HELP?</h1>

      <!-- Search bar -->
      <section>
         <div class="container m-4 text-center">
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
         </div>

         <!-- FACQ -->
         <div class="container">
            <div class="row justify-content-center m-5">

               <div class="col-md-3 mx-2">
                  <div class="box p-5">
                     <img src="{{ asset('images/facq.svg')}}" class="pt-10">
                     <h1 class="mt-32 text-xl">FAQs</h1>
                     <p class="text-base font-light mt-3"> Explore FAQs for instant problem-solving insights.</p>
                     <button wire:navigate href="{{ route('faq') }}" class="btn btn-warning rounded w-100 mt-4">View FAQs</button>
                  </div>
               </div>

               <!-- Privacy Policy -->
               <div class="col-md-3 mx-2">
                  <div class="box p-5 ">
                     <img src="{{ asset('images/privacy.svg')}}" class="pt-10">
                     <h1 class="mt-32 text-xl">Privacy Policy</h1>
                     <p class="text-base font-light mt-3"> Explore our commitment to safeguarding your privacy rights.</p>
                     <button wire:navigate href="{{ route('privacyPolicy') }}" class="btn btn-warning rounded w-100 mt-4">View Privacy Policy</button>
                  </div>
               </div>

               <!-- Guides -->
               <div class="col-md-3 mx-2">
                  <div class="box p-5">
                     <img src="{{ asset('images/guides.svg')}}" class="pt-10">
                     <h1 class="mt-32 text-xl">Guides</h1>
                     <p class="text-base font-light mt-3"> Efficiently use every feature with our user-friendly website guide.</p>
                     <button wire:navigate href="{{ route('guides') }}" class="btn btn-warning rounded w-100 mt-4">View Guides</button>
                  </div>
               </div>
            </div>
         </div>
      </section>
      
   </div>
</div>