// Singleton for handling the login/signup behavior
class LoginSignupHandler {
    // This static instance will hold the unique instance of the class
    static instance = null;

    // Private constructor ensures that it cannot be instantiated multiple times
    constructor() {
        if (LoginSignupHandler.instance) {
            return LoginSignupHandler.instance;
        }
        
        // Cache the DOM elements
        this.container = document.getElementById("container");
        this.signUpButton = document.getElementById('signUp');
        this.signInButton = document.getElementById('signIn');
        
        // Call the initialization method to set up event listeners
        this.init();

        // Make this instance the singleton instance
        LoginSignupHandler.instance = this;
    }

    // Method to initialize event listeners
    init() {
        // Function to show the login/signup container
        const showLoginSignup = () => {
            this.container.style.display = "block"; // Show the container
        };

        // Set a timeout to call the function after 5 seconds
        setTimeout(showLoginSignup.bind(this), 5000); // 5000 milliseconds = 5 seconds

        // Toggling between login/signup panels
        this.signUpButton.addEventListener('click', () => {
            this.container.classList.add('right-panel-active');
        });

        this.signInButton.addEventListener('click', () => {
            this.container.classList.remove('right-panel-active');
        });
    }
}

// Ensure the Singleton is instantiated only once
document.addEventListener("DOMContentLoaded", function () {
    // Creating or getting the Singleton instance
    const loginSignupHandler = new LoginSignupHandler();
});
