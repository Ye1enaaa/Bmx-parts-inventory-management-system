function openNav() {
    const sidebar = document.getElementById("mySidebar");
    const mainContent = document.querySelector(".main-content");
    if (sidebar.classList.contains("open")) {
        sidebar.classList.remove("open");
        mainContent.classList.remove("open");
    } else {
        sidebar.classList.add("open");
        mainContent.classList.add("open");
    }
}

function closeNav() {
    document.getElementById("mySidebar").classList.remove("open");
    document.querySelector(".main-content").classList.remove("open");
}

function showAccounts() {
    document.getElementById("content-accounts").style.display = "block";
    document.getElementById("content-add-accounts").style.display = "none";
}

function showAddAccounts() {
    document.getElementById("content-accounts").style.display = "none";
    document.getElementById("content-add-accounts").style.display = "block";
}

function showSales() {
    document.getElementById("content-accounts").style.display = "none";
    document.getElementById("content-add-accounts").style.display = "block";
}

function showEditForm(userId) {
    // hide all other edit forms
    const allForms = document.querySelectorAll(".edit-user-form");
    allForms.forEach((form) => {
        form.style.display = "none";
    });

    // show the edit form for the clicked user
    const editElement = document.querySelector(
        `.edit-user-form[data-user-id="${userId}"]`
    );
    if (editElement) {
        // Check if editElement exists before accessing its properties
        editElement.style.display = "block";
    }
    console.log(userId);

    // hide the container for the clicked user
    const container = document.querySelector(
        `.edit-user-container[data-user-id="${userId}"]`
    );
    if (container) {
        // Check if container exists before accessing its properties
        container.style.display = "none";
    }
}

function hideEditForm(userId) {
    const form = document.querySelector(
        `.edit-user-form[data-user-id="${userId}"]`
    );
    form.style.display = "none";

    const container = document.querySelector(
        `.edit-user-container[data-user-id="${userId}"]`
    );
    container.style.display = "block";
}

const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");
const passwordError = document.getElementById("password-error");

function validatePassword() {
    if (passwordInput.value !== confirmPasswordInput.value) {
        passwordError.textContent = "Passwords do not match";
    } else {
        passwordError.textContent = "";
    }
}

passwordInput.addEventListener("input", validatePassword);
confirmPasswordInput.addEventListener("input", validatePassword);
