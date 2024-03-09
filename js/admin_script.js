// Selecting the element with the class 'header' and storing it in the 'header' variable
let header = document.querySelector('.header');

// Adding a click event listener to the element with the id 'menu-btn'
document.querySelector('#menu-btn').onclick = () => {
   // Adding the 'active' class to the 'header' element when the 'menu-btn' is clicked
   header.classList.add('active');
}

// Adding a click event listener to the element with the id 'close-btn'
document.querySelector('#close-btn').onclick = () => {
   // Removing the 'active' class from the 'header' element when the 'close-btn' is clicked
   header.classList.remove('active');
}

// Adding a scroll event listener to the window object
window.onscroll = () => {
   // Removing the 'active' class from the 'header' element when the window is scrolled
   header.classList.remove('active');
}

// Selecting all input elements with type 'number' and iterating over them
document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
   // Adding an input event listener to each input element
   inputNumber.oninput = () => {
      // Truncating the input value if its length exceeds the maximum length defined by 'maxLength' attribute
      if (inputNumber.value.length > inputNumber.maxLength) inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
   }
});
