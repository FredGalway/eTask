// Task Variables
const editTask = document.querySelectorAll(".editTask");
// console.log("editTask : ", editTask);
const editTaskTitle = document.getElementById("editTaskTitle");
// console.log("editTaskTitle : ", editTaskTitle);
const editTaskDesc = document.getElementById("editTaskDesc");
// console.log("editTaskDesc : ", editTaskDesc);

// List Variables
const editList = document.querySelectorAll(".editList");
// console.log("ediList : ", editList);
const editListTitle = document.getElementById("editListTitle");
// console.log("editListTitle : ", editListTitle);
const editListColor = document.getElementById("editListColor");
// console.log("editListColor : ", editListColor);


// Search Variable
const hiddenInput = document.getElementById("hidden");
// console.log("hiddenInput : ", hiddenInput);

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

        console.log('titleText : ', titleText1);
        console.log('descText : ', descText);

        hiddenInput.value = element.id;

        // console.log(hiddenInput);
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

        console.log('titleText : ', titleText2);
        console.log('colorText : ', colorText);

        hiddenInput.value = element.id;

        // console.log(hiddenInput);
    });
});




// Search Function ----------------------------------------------------------------------------------------------------------------------------------------------
const search = document.getElementById("search");
search.addEventListener("input", () => {
    const value = search.value.toLowerCase();
    editTask.forEach(element => {
        // console.log(element.children);
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