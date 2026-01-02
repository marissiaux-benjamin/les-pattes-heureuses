const enableJs = {
    enable() {
        const bodyElement = document.body;
        const formElement = document.getElementById('adoption-form');

        bodyElement.classList.remove('no-js');
        bodyElement.classList.add('js-enabled');

        formElement.classList.remove('displayed-form');
        formElement.classList.add('hidden-form');

    }
};

const displayedForm = {
    click() {
        const buttonElement = document.getElementById('button');
        const formElement = document.getElementById('adoption-form');
        const arrowElement = document.getElementById('button-arrow');

        buttonElement.addEventListener('click', (e) => {
                e.preventDefault();
                arrowElement.classList.toggle('icon-reversed');
                formElement.classList.toggle('displayed-form');
                formElement.classList.toggle('hidden-form');

            }
        );
    }
}

enableJs.enable();
displayedForm.click();
