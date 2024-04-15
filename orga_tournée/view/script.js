function PiscineClickEvent(picture) {

    let listPictureValue = picture.getAttribute("value").split("*");
    let otherPictures = document.getElementsByClassName("SwimmingPool--Img");

    let SwimmingPoolTitle = document.getElementById("FocusSwimmingPool--Title");
    let SwimmingPoolDescriptif = document.getElementById("FocusSwimmingPool--Descriptif");

    SwimmingPoolTitle.innerHTML = listPictureValue[0];
    SwimmingPoolDescriptif.innerHTML = listPictureValue[1];

    Array.from(otherPictures).forEach(element => {
        console.log(element)
        element.style.opacity = 0.5;
    });

    picture.style.opacity = 1.0;
}

function setNotClicked(element) {
    element.classList.add("btnNotClicked");
    element.classList.remove("btnClicked");
}

function setInvisible(element) {
    element.classList.add("divInvisible");
    element.classList.remove("divVisible");
}

function adminClickEvent(button) {
    let choix = button.getAttribute("name");
    let allChoiceBtn = null;
    let choiceDiv = null;
    let allChoiceDiv = null;
    allChoiceBtn = document.getElementsByClassName("btnAdminOption");
    choiceDiv = document.getElementById(choix);
    allChoiceDiv = document.getElementsByClassName("divAdminOption");


    for (let item of allChoiceDiv) {
        setInvisible(item);
    }
    choiceDiv.classList.remove("divInvisible");
    choiceDiv.classList.add("divVisible");

    for (let item of allChoiceBtn) {
        setNotClicked(item);
    }
    button.classList.remove("btnNotClicked");
    button.classList.add("btnClicked");
}