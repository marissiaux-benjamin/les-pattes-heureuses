const buttonElement = document.getElementById('adoption-button');
const adoptionElement = document.getElementById('adoption-form');

const displayedForm = {
    displayForm(){
        buttonElement.addEventListener(
            'click',
            () => {
                if (adoptionElement.classList)
                    adoptionElement.classList.add('displayed-form');
            }
        );
    }
}
displayedForm.displayForm();
