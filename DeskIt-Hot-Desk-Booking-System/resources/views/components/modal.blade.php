@props(['name', 'title', ])
<div
    x-data = "{ show : false , name : '{{ $name }}'}"
    {{-- x-data = "{ show : true , name : 'warning-booking-modal'}" --}}
    x-show = "show"
    x-on:open-modal.window = "show = ($event.detail.name === name)"
    x-on:close-modal.window = "show = false"
    x-on:keydown.escape.window = "show = false"
    style="display: none;"
    x-transition.delay.350ms

    class="fixed z-50 inset-0 bg-white-500 inverter backdrop">

    {{-- <div x-on:click="$dispatch('close-modal')" class="fixed inset-0 backdrop-blur-[2px]" --}}
    <div x-on:click="$dispatch('close-modal')" class="fixed inset-0 backdrop-blur-[2px] backdrop-brightness-[0.60]"
        wire:click='resetEditData'></div>

    {{-- Modal Dynamic Sizes according to modal type --}}

    {{-- EditModal --}}
    @if($name === 'edit-modal')
        <div class="fixed inset-0 border-solid border-blue-800 border-1 bg-blue-300 rounded-4 m-auto w-7/12 max-h-[400px]">

            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-semibold text-2xl text-blue-50">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkBlue m-0 p-0">
            <div class="flex h-[85.7%] items-center justify-center bg-white rounded-bottom-4 p-0">
                {{ $body }}
            </div>

    {{-- Accept Modal --}}
    @elseif($name === 'activate-modal')
        <div class="fixed inset-0 border-solid border-green-500 border-1 bg-green-300 rounded-4 m-auto w-1/4 max-h-[250px]">

                @if(isset($title))
                <div class="flex justify-between m-3 mb-2 ">
                    <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                    <span class=" font-medium text-xl text-green-50">{{ $title }}</span>
                    <button class="mr-6 font-bold text-white text-2xl"
                            x-on:click="$dispatch('close-modal')"
                            wire:click='resetEditData'
                            >x
                    </button>
                </div>
                @endif
                <hr class="bg-darkergray m-0 p-0">
                <div class="flex h-[76.7%] items-center justify-center bg-white rounded-bottom-4 ">
                    {{ $body }}
                </div>
    
    {{-- Deact Modal --}}
    @elseif($name === 'deact-modal')
        <div class="fixed inset-0 border-solid border-slate-500 border-1 bg-slate-300 rounded-4 m-auto w-1/4 max-h-[250px]">

                @if(isset($title))
                <div class="flex justify-between m-3 mb-2 ">
                    <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                    <span class=" font-medium text-xl text-white">{{ $title }}</span>
                    <button class="mr-6 font-bold text-white text-2xl"
                            x-on:click="$dispatch('close-modal')"
                            wire:click='resetEditData'
                            >x
                    </button>
                </div>
                @endif
                <hr class="bg-darkergray m-0 p-0">
                <div class="flex h-[76.7%] items-center justify-center bg-white rounded-bottom-4 ">
                    {{ $body }}
                </div>

    {{-- Delete Modal --}}
    @elseif($name === 'delete-modal')
        <div class="fixed inset-0 border-solid border-red-800 border-1 bg-red-300 rounded-4 m-auto w-1/4 max-h-[250px]">

            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-medium text-xl text-red-50">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkRed m-0 p-0">
            <div class="flex h-[76.7%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>
    {{-- Make Emp/OM/Admin MODALS --}}
    @elseif($name === 'makeEmp-modal' || $name == 'makeOM-modal' || $name == 'makeAdmin-modal')
        <div class="fixed inset-0 border-solid border-yellowBdarker border-1 bg-yellowLight rounded-4 m-auto w-1/4 max-h-[250px]">

            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-medium text-xl text-yellowBdarker">{{ $title }}</span>
                <button class="mr-6 font-light text-yellowBdarker text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkRed m-0 p-0">
            <div class="flex h-[76.7%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>

    {{-- Approve Booking Modal  --}}
    @elseif($name === 'accept-modal')
        <div class="fixed inset-0 border-solid border-green-500 border-1 bg-green-300 rounded-4 m-auto w-1/4 max-h-[300px]">

                @if(isset($title))
                <div class="flex justify-between m-3 mb-2 ">
                    <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                    <span class=" font-medium text-xl text-green-50">{{ $title }}</span>
                    <button class="mr-6 font-bold text-white text-2xl"
                            x-on:click="$dispatch('close-modal')"
                            wire:click='resetEditData'
                            >x
                    </button>
                </div>
                @endif
                <hr class="bg-darkergray m-0 p-0">
                <div class="flex h-[81%] items-center justify-center bg-white rounded-bottom-4 ">
                    {{ $body }}
                </div>
    {{-- Decline Booking Modal  --}}
    @elseif($name === 'decline-modal')
        <div class="fixed inset-0 border-solid border-red-500 border-1 bg-red-300 rounded-4 m-auto w-1/4 max-h-[300px]">

                @if(isset($title))
                <div class="flex justify-between m-3 mb-2 ">
                    <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                    <span class=" font-medium text-xl text-red-50">{{ $title }}</span>
                    <button class="mr-6 font-bold text-white text-2xl"
                            x-on:click="$dispatch('close-modal')"
                            wire:click='resetEditData'
                            >x
                    </button>
                </div>
                @endif
                <hr class="bg-darkergray m-0 p-0">
                <div class="flex h-[81%] items-center justify-center bg-white rounded-bottom-4 ">
                    {{ $body }}
                </div>
    {{-- Disable Desk Modal --}}
    @elseif($name === 'disable-desk-modal')
        <div class="fixed inset-0 border-solid border-red-500 border-1 bg-red-300 rounded-4 m-auto w-1/4 max-h-[300px]">

                @if(isset($title))
                <div class="flex justify-between m-3 mb-2 ">
                    <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                    <span class=" font-medium text-xl text-red-50">{{ $title }}</span>
                    <button class="mr-6 font-bold text-white text-2xl"
                            x-on:click="$dispatch('close-modal')"
                            wire:click='resetEditData'
                            >x
                    </button>
                </div>
                @endif
                <hr class="bg-darkergray m-0 p-0">
                <div class="flex h-[81%] items-center justify-center bg-white rounded-bottom-4 ">
                    {{ $body }}
                </div>
    {{--Enable Desk Modal  --}}
    @elseif($name === 'enable-desk-modal')
        <div class="fixed inset-0 border-solid border-green-500 border-1 bg-green-300 rounded-4 m-auto w-1/4 max-h-[300px]">

                @if(isset($title))
                <div class="flex justify-between m-3 mb-2 ">
                    <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                    <span class=" font-medium text-xl text-green-50">{{ $title }}</span>
                    <button class="mr-6 font-bold text-white text-2xl"
                            x-on:click="$dispatch('close-modal')"
                            wire:click='resetEditData'
                            >x
                    </button>
                </div>
                @endif
                <hr class="bg-darkergray m-0 p-0">
                <div class="flex h-[81%] items-center justify-center bg-white rounded-bottom-4 ">
                    {{ $body }}
                </div>

    {{-- Confirm Booking Modal  --}}
    @elseif($name === 'confirm-booking-modal')
        <div class="fixed inset-0 border-solid border-green-500 border-1 bg-green-300 rounded-4 m-auto w-1/4 max-h-[375px]">
            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-medium text-xl text-green-50">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkergray m-0 p-0">
            <div class="flex h-[85%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>

      {{-- Logout Modal  --}}
      @elseif($name === 'logout-modal')
      <div class="fixed inset-0 border-solid border-red-500 border-1 bg-red-300 rounded-4 m-auto w-4/12 max-h-[280px]">
          @if(isset($title))
          <div class="flex justify-between m-3 mb-2 ">
              <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
              <span class=" font-medium text-xl text-white">{{ $title }}</span>
              <button class="mr-6 font-bold text-white text-2xl"
                      x-on:click="$dispatch('close-modal')"
                      wire:click='resetEditData'
                      >x
              </button>
          </div>
          @endif
          <hr class="bg-darkergray m-0 p-0">
          <div class="flex h-[85%] items-center justify-center bg-white rounded-bottom-4 ">
              {{ $body }}
          </div>

    {{-- Desk Booking Modal  --}}
    @elseif($name === 'desk-booking-modal')
        <div class="fixed inset-0 border-solid border-yellowLight border-1 bg-yellowB rounded-4 m-auto w-1/4 max-h-[250px]">
            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-medium text-xl text-white">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkergray m-0 p-0">
            <div class="flex h-[78%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>
    
    {{-- Warning Booking Modal  --}}
    @elseif($name === 'warning-booking-modal')
        <div class="fixed inset-0 border-solid border-yellowLight border-1 bg-danger rounded-4 m-auto w-1/4 max-h-[300px]">
            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-medium text-xl text-white">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkergray m-0 p-0">
            <div class="flex h-[82%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>
    {{-- Warning 2 Booking Modal  --}}
    @elseif($name === 'warning-2-booking-modal')
        <div class="fixed inset-0 border-solid border-yellowLight border-1 bg-danger rounded-4 m-auto w-1/4 max-h-[200px]">

            @if(isset($title))
            <div class="flex justify-between m-3 mb-2 ">
                <span class="ml-6 font-thin text-2xl text-yellowA"> </span>
                <span class=" font-medium text-xl text-white">{{ $title }}</span>
                <button class="mr-6 font-bold text-white text-2xl"
                        x-on:click="$dispatch('close-modal')"
                        wire:click='resetEditData'
                        >x
                </button>
            </div>
            @endif
            <hr class="bg-darkergray m-0 p-0">
            <div class="flex h-[72%] items-center justify-center bg-white rounded-bottom-4 ">
                {{ $body }}
            </div>
    @endif
    </div>

</div>