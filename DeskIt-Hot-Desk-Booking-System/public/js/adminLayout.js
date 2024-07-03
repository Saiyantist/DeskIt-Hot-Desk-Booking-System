function darkModeToggle() {
    return {
        darkmode: null,
        isDarkMode: false,
        init() {
            // Initialize darkmode instance
            this.darkmode = new Darkmode({ 
                time: '0.5s',
                mixColor: '#ffffff', 
                backgroundColor: '#FCF8F8',
                buttonColorDark: '#333333',
                buttonColorLight: '#ffffff', 
                label: '🌓',
                saveInCookies: true,
                autoMatchOsTheme: false,
                
            });
            this.darkmode.showWidget();

            // Apply dark mode on load if saved
            if (this.darkmode.isActivated()) {
                this.isDarkMode = true;
            }
        },
        toggleDarkMode() {
            this.darkmode.toggle();
            this.isDarkMode = this.darkmode.isActivated();
            
        },
    };
}

document.addEventListener('alpine:init', () => {
    Alpine.data('darkModeToggle', darkModeToggle());
});