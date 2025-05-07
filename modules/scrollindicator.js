/** 
 * for this javascript works we need to 
 * 3 code 
 * one css style code and 1 html div code
 * and 1 javascript file (scrollindicator.js)
 * 
 * here all code are mention 
 * you just to use it in your project
 * 
 *   below code for css
 * 
 * .message-container {
    max-height: 37rem;
    overflow-y: auto;
 }
 .scroll-down-indicator {
    position: fixed;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    display: none;
 }
 * 
 *   Below code for html
 * 
 *  <div class="scroll-down-indicator">
    ⬇ Scroll to see more
  </div>
 *
 * 
 *   Below code for javascript
 *  
 *  const messagesContainer = document.querySelector(".messages-container");
const scrollIndicator = document.getElementById("scroll-indicator");

// Show the arrow when the content is not fully scrolled down
messagesContainer.addEventListener("scroll", function () {
  if (
    messagesContainer.scrollHeight - messagesContainer.scrollTop <=
    messagesContainer.clientHeight
  ) {
    scrollIndicator.style.display = "none"; // Hide arrow when scrolled to bottom
  } else {
    scrollIndicator.style.display = "block"; // Show arrow when not at the bottom
  }
});

// Scroll to bottom when arrow is clicked
scrollIndicator.addEventListener("click", function () {
  messagesContainer.scrollTop = messagesContainer.scrollHeight;
});

 * In order to wroking this code
 * you need to use scrollindicator.js
 * and css on the style section
 * and html on the div section
 * where the the div is scrolling the content
 * 
 * just keep in mind that you have set (max-height) of
 * scrolling div to fix it.
 * just see the code try to use it
 * 
/** logic behind the scroll indicator to show or hidden */
// const messagesContainer = document.querySelector(".messages-container");
// const scrollIndicator = document.getElementById("scroll-indicator");

// // Show the arrow when the content is not fully scrolled down
// messagesContainer.addEventListener("scroll", function () {
//   if (
//     messagesContainer.scrollHeight - messagesContainer.scrollTop <=
//     messagesContainer.clientHeight
//   ) {
//     scrollIndicator.style.display = "none"; // Hide arrow when scrolled to bottom
//   } else {
//     scrollIndicator.style.display = "block"; // Show arrow when not at the bottom
//   }
// });

// // Scroll to bottom when arrow is clicked
// scrollIndicator.addEventListener("click", function () {
//   messagesContainer.scrollTop = messagesContainer.scrollHeight;
// });
