function openNav() {
    document.getElementById("mySidebar").classList.add("open");
    document.querySelector(".main-content").classList.add("open");
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

// function showEditForm(userId) {
//     var editForm = document.getElementById("edit-user-form-" + userId);
//     if (editForm) {
//         editForm.style.display = "block";
//     }
//     console.log("showEditForm called for user ID: " + userId);
//     //document.getElementById("edit-user-form-" + userId).style.display = "block";
//     console.log(userId);
// }

// function hideEditForm(userId) {
//     document.getElementById("edit-user-form-" + userId).style.display = "none";
// }

function showEditForm(userId) {
    // hide all other edit forms
    const allForms = document.querySelectorAll(".edit-user-form");
    allForms.forEach((form) => {
        form.style.display = "none";
    });

    // show the edit form for the clicked user
    const form = document.querySelector(
        `.edit-user-form[data-user-id="${userId}"]`
    );
    form.style.display = "block";
    console.log(userId)
    // hide the container for the clicked user
    const container = document.querySelector(
        `.edit-user-container[data-user-id="${userId}"]`
    );
    container.style.display = "none";
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
