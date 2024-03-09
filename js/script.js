// Selecting the element with the class 'menu' inside an element with class 'header' and storing it in the 'menu' variable
let menu = document.querySelector('.header .menu');

// Adding a click event listener to the element with the id 'menu-btn'
document.querySelector('#menu-btn').onclick = () => {
   // Toggling the 'active' class on the 'menu' element when the 'menu-btn' is clicked
   menu.classList.toggle('active');
}

// Adding a scroll event listener to the window object
window.onscroll = () => {
   // Removing the 'active' class from the 'menu' element when the window is scrolled
   menu.classList.remove('active');
}

// Selecting all input elements with type 'number' and iterating over them
document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
   // Adding an input event listener to each input element
   inputNumber.oninput = () => {
      // Truncating the input value if its length exceeds the maximum length defined by 'maxLength' attribute
      if(inputNumber.value.length > inputNumber.maxLength) inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
   };
});

// Selecting all elements matching the selector '.faq .box-container .box h3' and iterating over them
document.querySelectorAll('.faq .box-container .box h3').forEach(headings => {
   // Adding a click event listener to each heading element
   headings.onclick = () => {
      // Toggling the 'active' class on the parent element of the clicked heading
      headings.parentElement.classList.toggle('active');
   }
});
