<div>

    <main class="mt-28 mx-20 text-lg">

        <div class="pt-10">
            @if($sectionNumber === 1)

            <button class="btn btn-warning text-white" onclick="goBack()">Go Back</button>
            <div class="text-center">
                <p class="font-bold">FREQUENTLY ASKED QUESTIONS</p>
            </div>
            <div>
                <p class="text-yellowB mt-4 font-semibold">General Functionality:</p>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(1)"
                        style="cursor: pointer">
                        What is Deskit and what does it offer?
                        <i
                            class="fas {{ isset($showDescriptions[1]) && $showDescriptions[1] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>

                    @if(isset($showDescriptions[1]) && $showDescriptions[1])
                    <div>
                        <p class="px-3 pb-2">
                            Deskit is a web platform designed to facilitate hotdesk bookings and management. It provides
                            functionalities for both end-users and administrators.
                        </p>
                    </div>
                    @endif
                </div>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(2)"
                        style="cursor: pointer">
                        What is a hotdesk?
                        <i
                            class="fas {{ isset($showDescriptions[2]) && $showDescriptions[2] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>

                    @if(isset($showDescriptions[2]) && $showDescriptions[2])
                    <div>
                        <p class="px-3 pb-2">
                            A hotdesk is a flexible workspace that can be booked by users for a specific date.
                        </p>
                    </div>
                    @endif
                </div>
                <!--  end of general functionality -->

                <!-- start of user interface -->

                <p class="text-yellowB mt-4 font-semibold">User Interface:</p>
                <div class="bg-pink shadow-md mt-2">
                    <!-- question -->
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(3)"
                        style="cursor: pointer">
                        How can end-users access Deskit?
                        <i
                            class="fas {{ isset($showDescriptions[3]) && $showDescriptions[3] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[3]) && $showDescriptions[3])
                    <div>
                        <p class="px-3 pb-2">
                            End-users can access the Deskit website through any web browser on their computer
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(4)"
                        style="cursor: pointer">
                        What actions can end-users perform on the platform?
                        <i
                            class="fas {{ isset($showDescriptions[4]) && $showDescriptions[4] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[4]) && $showDescriptions[4])
                    <div>
                        <p class="px-3 pb-2">
                            End-users can book a hotdesk, view available desks per date, cancel or view their hotdesk
                            bookings, and receive confirmation of their bookings.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(5)"
                        style="cursor: pointer">
                        How do I book a hotdesk as an end-user?
                        <i
                            class="fas {{ isset($showDescriptions[5]) && $showDescriptions[5] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[5]) && $showDescriptions[5])
                    <div>
                        <p class="px-3 pb-2">
                            Log in to your account, navigate to the booking section, select the desired date, and choose
                            an
                            available hotdesk.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>

                <p class="text-yellowB mt-4 font-semibold">End-User Interface:</p>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(6)"
                        style="cursor: pointer">
                        How can I view available desks for a specific date?
                        <i
                            class="fas {{ isset($showDescriptions[6]) && $showDescriptions[6] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[6]) && $showDescriptions[6])
                    <div>
                        <p class="px-3 pb-2">
                            Access the booking section, choose the date you're interested in, and Deskit will display
                            the
                            available hotdesks.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(7)"
                        style="cursor: pointer">
                        Can I cancel my hotdesk booking?
                        <i
                            class="fas {{ isset($showDescriptions[7]) && $showDescriptions[7] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[7]) && $showDescriptions[7])
                    <div>
                        <p class="px-3 pb-2">
                            Yes, users can cancel their hotdesk bookings through the platform.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(8)"
                        style="cursor: pointer">
                        Will I receive a confirmation for my hotdesk booking?
                        <i
                            class="fas {{ isset($showDescriptions[8]) && $showDescriptions[8] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[8]) && $showDescriptions[8])
                    <div>
                        <p class="px-3 pb-2">
                            Yes, users will receive a confirmation in their notification after successfully booking a
                            hotdesk.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <p class="text-yellowB mt-4 font-semibold">Admin Interface:</p>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(9)"
                        style="cursor: pointer">
                        Who are admin users, and what can they do?
                        <i
                            class="fas {{ isset($showDescriptions[9]) && $showDescriptions[9] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[9]) && $showDescriptions[9])
                    <div>
                        <p class="px-3 pb-2">
                            Admin users have elevated privileges and can perform tasks such as adding/deleting
                            users,
                            managing
                            hotdesks,
                            canceling hotdesk bookings, and delegating admin roles.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(10)"
                        style="cursor: pointer">
                        How can admin users add or delete a user?
                        <i
                            class="fas {{ isset($showDescriptions[10]) && $showDescriptions[10] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[10]) && $showDescriptions[10])
                    <div>
                        <p class="px-3 pb-2">
                            Admin users can access the user management section, where they can add new users or
                            remove
                            existing
                            ones.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(11)"
                        style="cursor: pointer">
                        Can admin users cancel hotdesk bookings?
                        <i
                            class="fas {{ isset($showDescriptions[11]) && $showDescriptions[11] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[11]) && $showDescriptions[11])
                    <div>
                        <p class="px-3 pb-2">
                            Yes, admin users have the authority to cancel hotdesk bookings when necessary.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <p class="text-yellowB mt-4 font-semibold">Floor Plan Updates:</p>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(12)"
                        style="cursor: pointer">
                        How can the floor plan be updated?
                        <i
                            class="fas {{ isset($showDescriptions[12]) && $showDescriptions[12] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[12]) && $showDescriptions[12])
                    <div>
                        <p class="px-3 pb-2">
                            Admin users can access the floor plan section to make updates such as
                            adding/deleting
                            hotdesks and
                            making
                            adjustments to the workspace layout.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
                <div class="bg-pink shadow-md mt-2">
                    <p class="flex items-center justify-between p-2 m-1" wire:click="toggleDescription(13)"
                        style="cursor: pointer">
                        Are floor plan updates immediately reflected for end-users?
                        <i
                            class="fas {{ isset($showDescriptions[13]) && $showDescriptions[13] ? 'fa-chevron-up' : 'fa-chevron-down' }}"></i>
                    </p>
                    <!-- end of question -->
                    <!-- answer - lalabas pag ni-click -->
                    @if(isset($showDescriptions[13]) && $showDescriptions[13])
                    <div>
                        <p class="px-3 pb-2">
                            Yes, changes to the floor plan are reflected in real-time, ensuring that end-users
                            always
                            have
                            access to
                            the
                            most up-to-date information.
                        </p>
                    </div>
                    @endif
                    <!-- end of answer -->
                </div>
            </div>
            <p class="my-5">
                This FAQ provides an overview of the Deskit website's functionalities for both end-users and
                administrators. If you
                have specific questions or encounter issues, please refer to the platform's help section or
                contact
                our
                support team
                for assistance.
            </p>


            @elseif($sectionNumber === 2)
            <button class="btn btn-warning text-white" onclick="goBack()">Go Back</button>
            <div class="text-center">
                <p class="font-bold">PRIVACY POLICY</p>
            </div>
            
            <p class="mt-2"> Deskit is committed to protecting the privacy of its users. This Privacy Policy outlines
                our practices
                concerning the collection, use, and disclosure of personal information provided by users through the
                Deskit website.
            </p>
            <div>
                <p class=" text-yellowB mt-4 font-bold">Information We Collect:</p>
                <p class="mt-2">To provide Deskit Website functionality, we collect the following information from
                    users:</p>

                <p class="font-semibold mt-3">End-User</p>
                <p>&#8226; Full Name</p>
                <p>&#8226; Email Address</p>
                <p>&#8226; Booking Preferences (date, time, hotdesk selection)</p>
                <p>&#8226; Booking History</p>

                <p class="font-semibold mt-3">Admin</p>
                <p>&#8226; Full Name</p>
                <p>&#8226; Email Address</p>
            </div>

            <div>
                <p class=" text-yellowB mt-4 font-semibold">How Do We Use Information?</p>
                <p>We use the collected information for the following purposes:</p>
                <p class="font-semibold mt-3">End-User Interface:</p>
                <p>&#8226; Facilitate hotdesk bookings</p>
                <p>&#8226; Display available desks per date</p>
                <p>&#8226; Confirm and manage hotdesk bookings</p>

                <p class="font-semibold mt-3">Admin Interface:</p>
                <p>&#8226; Manage user accounts (add/delete users)</p>
                <p>&#8226; Manage hotdesks (add/delete hotdesks)</p>
                <p>&#8226; Cancel hotdesk bookings when required</p>
                <p>&#8226; Delegate admin roles</p>

                <p class="font-semibold mt-3">Update Floor Plan:</p>
                <p>&#8226; Display and update floor plans</p>
            </div>

            <div>
                <p class=" text-yellowB mt-4 font-semibold">Information Sharing and Disclosure</p>
                <p>We do not sell, trade, or otherwise transfer your personal information to outside parties.</p>
            </div>

            <div>
                <p class=" text-yellowB mt-4 font-semibold">Security</p>
                <p>We implement a variety of security measures to maintain the safety of your personal information. All
                    information is stored on secure servers.</p>
            </div>

            <div>
                <p class=" text-yellowB mt-4 font-semibold">Consent</p>
                <p>By using the Deskit website, you consent to our privacy policy.</p>
            </div>

            <div>
                <p class=" text-yellowB mt-4 font-semibold">
                    Changes to this Privacy Policy</p>
                <p>We reserve the right to update or change our Privacy Policy at any time. Any changes will be posted
                    on this page.</p>
            </div>

            <div>
                <p class=" text-yellowB mt-4 font-semibold">Contact Information</p>
                <p>If there are any questions regarding this privacy policy, you may contact us at contact@deskit.com.
                </p>
            </div>

            <div>
                <p class="text-yellowB mt-4 font-semibold">Your Responsibilities</p>
                <p>As a user of the Deskit website, you are responsible for maintaining the confidentiality of your
                    account information and for restricting access to your computer or device. Ensure that you log out
                    of your account after each session to prevent unauthorized access.</p>
            </div>

            <p class="mt-3">By using Deskit, you agree to comply with all applicable laws and regulations.</p>
            <p class="mt-3">Thank you for choosing Deskit!</p>

            @elseif($sectionNumber === 3)
            <button class="btn btn-warning text-white" onclick="goBack()">Go Back</button>
            <div class="text-center">
                <p class="font-bold">GUIDES</p>
            </div>
            <p class="font-semibold mt-3">End-User Interface:</p>

            <p class="text-yellowB mt-1 font-semibold">Booking a Hotdesk</p>
            <p>&#8226; Navigate to the "Desk Booking" section.</p>
            <p>&#8226; Select the desired date for hotdesk booking.</p>
            <p>&#8226; Choose a floor from the displayed options.</p>
            <p>&#8226; Choose an available desk from the desk map.</p>
            <p>&#8226; Confirm the booking.</p>
            <p>&#8226; View Available Desks per Date at Landing Page.</p>

            <div>
                <p class="text-yellowB mt-4 font-semibold">Cancel or View Hotdesk Booking:</p>
                <p>&#8226; Go to the "Profile" section</p>
                <p>&#8226; View list of current bookings from “Your Bookings”</p>
                <p>&#8226; Cancel a booking if needed.</p>
                <p>&#8226;View the status of Booking</p>
            </div>

            <p>&#8226;
                After successfully booking a hotdesk, the user should receive a notification for confirmation.</p>

            <div>
                <p class="font-semibold mt-4">Admin Interface: </p>
                <p class="text-yellowB mt-1 font-semibold">Add/Delete User:</p>
                <p>&#8226; Navigate to the "Profile" section.</p>
                <p>&#8226; Add a new user by providing necessary details.</p>
                <p>&#8226; Delete a user if needed.</p>
            </div>

            <div>
                <p class="text-yellowB mt-4 font-semibold">Add/Delete Hotdesk and Update Floor Plan:</p>
                <p>&#8226; Access the "Desk Map" section.</p>
                <p>&#8226; Add a new hotdesk and change status into “Available”.</p>
                <p>&#8226; Delete a hotdesk and change status into “Not Available” due to maintenance.</p>
                <p>&#8226; Update the floor plan as needed, ensuring it reflects the current layout of hotdesks.</p>
            </div>

            <div>
                <p class="text-yellowB mt-4 font-semibold">Cancel Hotdesk Booking:</p>
                <p>&#8226; In the admin dashboard, find the list of current bookings.</p>
                <p>&#8226; Cancel a booking on behalf of a user when required.</p>
            </div>

            <div>
                <p class="text-yellowB mt-4 font-semibold">Delegate Admin Roles:</p>
                <p>&#8226; In the "Profile" section, delegate admin roles.</p>
                <p>&#8226; Specify roles such as Office Manager and assign appropriate permissions.</p>
            </div>

            <div>
                <p class="font-semibold mt-4">Note:</p>
                <p>&#8226; Ensure that the user interface is intuitive and user-friendly.</p>
                <p>&#8226; Implement proper authentication and authorization mechanisms for both end-users and admin
                    users.</p>
                <p>&#8226; Regularly update the floor plan to maintain accuracy.</p>
                <p>&#8226; Provide user and admin support through a helpdesk or FAQs for common issues and questions.
                </p>
                <p>&#8226; This guide assumes a web-based application, and the actual implementation might vary based on the technology stack and design choices made during development.</p>
            </div>
            @endif
        </div>
    </main>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</div>