function showPopup() {
    var confirmation = confirm("Join our Discord server to access the form. Click OK to join.");
    
    if (confirmation) {
        // Redirect users to your Discord server invite link
        window.location.href = "https://discord.gg/3tU7ZAW8KN";
    }
}
