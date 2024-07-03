function startIntro() {
    introJs().setOptions({
        steps: [
            {
                element: '.floor',
                title: "Step 1",
                intro: "Welcome! To start booking your desk, let's select the floor where you'd like to work."
            },
            {
                element: '.date',
                title: "Step 2",
                intro: "Now, let's pick the date you need the desk for. Just tap on the calendar and select the date you have in mind."
            },
            {
                element: '.stime',
                title: "Step 3",
                intro: "Now, what time would you like to kick off your workday? Choose your preferred start time."
            },
            {
                element: '.desk',
                title: "Step 4",
                intro: "Now, let's find you the perfect spot. You'll see a list of available desks for your chosen time slot and floor."
            },
            {
                element: '.book',
                title: "Step 5",
                intro: "Lastly, book your chosen date, time, and desk."
            }
        ]
    }).oncomplete(function () {
       
    window.dispatchEvent(new Event('completeTutorial'));
    }).onexit(function () {
        Livewire.emit('completeTutorial');
    }).start();
}
