<div class=" bg-white ">
    <div class="flex justify-between">
        <h2 class=" text-xl mb-4">Personal Information</h2>
        <h2 class="text-xl mr-6 cursor-pointer"> Edit Details</h2>
    </div>
    
    <div class="flex">
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Full Name</h2>
            <div class="border p-2 rounded-lg"> {{ Auth::user()->name }}</div>
        </div>
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Email</h2>
            <div class="border p-2 rounded-lg"> {{ Auth::user()->email }}</div>
        </div>
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Phone</h2>
            <div class="border p-2 rounded-lg"> {{ Auth::user()->phone }}</div>
        </div>
    </div>
    <div class="flex">
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Gender</h2>
            <div class="border p-2 rounded-lg"> {{ Auth::user()->gender }}</div>
        </div>
        <div class=" max-w-xl w-60 mx-4">
            <h2 class="text-lg ml-2">Birthday</h2>
            <div class="border p-2 rounded-lg"> {{ Auth::user()->birthday }}</div>
        </div>
        <div class=" max-w-xl w-60 mx-4">
            <!-- User Information -->
            <h2 class="text-lg ml-2">Position</h2>
            <div class="border p-2 rounded-lg"> {{ Auth::user()->position }}</div>
        </div>
    </div>
</div>

