// Task Variables
const editTask = document.querySelectorAll(".editTask");
const editTaskTitle = document.getElementById("editTaskTitle");
const editTaskDesc = document.getElementById("editTaskDesc");

// List Variables
const editList = document.querySelectorAll(".editList");
const editListTitle = document.getElementById("editListTitle");
const editListColor = document.getElementById("editListColor");

// Search Variable
const hiddenInput1 = document.getElementById("hidden1");
const hiddenInput2 = document.getElementById("hidden2");

// console.log("hiddenInput 1: ", hiddenInput1);
// console.log("hiddenInput 2: ", hiddenInput2);

// Update texts ----------------------------------------------------------------------------------------------------------------------------------------------

// Update texts for 'Title' and 'Descrition' from specifics HTML DOM paths
// This function allows to get only the HTML text values
editTask.forEach(element => {
    element.addEventListener("click", () => {

        // console.log(element.parentElement.parentElement.firstElementChild.innerText);
        // console.log(element.parentElement.firstElementChild.innerText);

        let titleText1 = element.parentElement.parentElement.firstElementChild.innerText;
        let descText = element.parentElement.firstElementChild.innerText;

        editTaskTitle.value = titleText1;
        editTaskDesc.value = descText;

        hiddenInput1.value = element.id;
    });
});

editList.forEach(element => {
    element.addEventListener("click", () => {

        // console.log(element.parentElement.parentElement.firstElementChild.innerText);
        // console.log(element.parentElement.childNodes[5].className.split(' ')[1]);

        let titleText2 = element.parentElement.parentElement.firstElementChild.innerText;
        let colorText = element.parentElement.childNodes[5].className.split(' ')[1];

        editListTitle.value = titleText2;
        editListColor.value = colorText;

        // console.log('titleText : ', titleText2);
        // console.log('colorText : ', colorText);

        hiddenInput2.value = element.id;
    });
});


// Search Function ----------------------------------------------------------------------------------------------------------------------------------------------
const search = document.getElementById("search");
search.addEventListener("input", () => {
    const value = search.value.toLowerCase();
    editTask.forEach(element => {
        const titleText = element.parentElement.parentElement.firstElementChild.innerText.toLowerCase();
        const descText = element.parentElement.firstElementChild.innerText.toLowerCase();

        if (titleText.includes(value) || descText.includes(value)) {
            element.parentElement.style.display = "block";
        } else {
            element.parentElement.style.display = "none";
        }
    });

    editList.forEach(element => {
        // console.log(element.children);
        const titleText = element.parentElement.parentElement.firstElementChild.innerText.toLowerCase();
        // const colorText = element.parentElement.firstElementChild.innerText.toLowerCase();

        if (titleText.includes(value)) {
            element.parentElement.style.display = "block";
        } else {
            element.parentElement.style.display = "none";
        }
    });

});


// RefreshPage Function ----------------------------------------------------------------------------------------------------------------------------------------------
function refreshPage() {
    setTimeout(() => {
        console.log("refresh page");
        window.location.reload();
    }, "8000")
}