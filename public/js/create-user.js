function acctClick(){
    var trial = document.getElementById("trys").innerHTML;
    document.getElementById("acct").innerHTML =  trial
}

function addAccount(){
    var add = document.getElementById("add").innerHTML;
    document.getElementById("acct").innerHTML = add;
}

function showEditForm(userId) {
    var editForm = document.getElementById("edit-user-form-" + userId);
    if (editForm) {
        editForm.style.display = "block";
    }
    console.log("showEditForm called for user ID: " + userId);
    //document.getElementById("edit-user-form-" + userId).style.display = "block";
    console.log(userId);
}

function hideEditForm(userId) {
    document.getElementById("edit-user-form-" + userId).style.display = "none";
}