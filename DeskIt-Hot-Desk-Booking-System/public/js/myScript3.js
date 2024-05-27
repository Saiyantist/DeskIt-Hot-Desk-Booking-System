function startIntro() {
    introJs().setOptions({
        steps:[
    {
            element:document.querySelector('.floor'),
            title: "Step 1",
            intro:"Welcome! To start booking your desk, let's select the floor where you'd like to work."
    },
    {
            element:document.querySelector('.date'),
            title: "Step 2",
            intro:"Now, let's pick the date you need the desk for. Just tap on the calendar and select the date you have in mind."
    }, 
    {
        element:document.querySelector('.stime'),
        title: "Step 3",
        intro:"Now, what time would you like to kick off your workday? Choose your preferred start time"
    }, 
    {
        element:document.querySelector('.etime'),
        title: "Step 4",
        intro:"Now, let's decide when you'll wrap up. How long will you need the desk for? Just select the end time that suits your schedule."
    }, 
    {
            element:document.querySelector('.desk'),
            title: "Step 5",
            intro:"Now, let's find you the perfect spot. You'll see a list of available desks for your chosen time slot and floor."
    },
    {
            element:document.querySelector('.book'),
            title: "Step 6",
            intro:"lastly, book your chosen date, time and desk."
    },
    ]
        
    }).start();

}

// Onboarding on load
window.onload = startIntro();

//onboarding on click
document.addEventListener('DOMContentLoaded', function() {
    const helpIcon = document.querySelector('.helpIcon');
    if (helpIcon) {
        helpIcon.addEventListener('click', function() {
            startIntro();
        });
    }
});