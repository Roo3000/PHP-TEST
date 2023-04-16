const form = document.getElementById('form');
const username = document.getElementById('usrname');
const number = document.getElementById('number');
const city = document.getElementById('city');

//use for internationale phone number fields
// const phoneInputField = document.querySelector("#number");
// const phoneInput = window.intlTelInput(phoneInputField, {
//   utilsScript:
//     "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
// });



const setSuccess = element =>{
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('err');
}

const setError = (element, message) =>{
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('err');
    inputControl.classList.remove('success');
}

const isValidNumber=()=>{
    const re =/^[0-9]+$/;
    return re.test(number);
}
const validateInputs=()=>{
    const nameValue = username.value.trim()
    const numberValue = number.value.trim();
    const cityValue = city.value.trim();
    let decision=false;
    

    if(nameValue===''){
        setError(usrname, "Your Name is required");
    } else {
        setSuccess(usrname);
    }

    if(numberValue===''){
        setError(number, "Your Number is required");
    }else if(isNaN(parseInt(numberValue))){
        setError(number, "Provide a valid Phone Number");
    } else {
        setSuccess(number);
    }

    if(cityValue===''){
        setError(city, "Your City is required");
    } else {
        setSuccess(city);
    }
    if(!(numberValue==='')&& !(nameValue==='')&& !(isNaN(parseInt(numberValue)))){
        decision=true;
    }
    return decision
}
form.addEventListener('submit', e=>{
    validateInputs();

    if(validateInputs()){
        document.getElementById("form").submit();
        $('form').submit();
        $('form').unbind('submit').submit();
        $('form').off('submit');
    }else{
        e.preventDefault();
    }
})