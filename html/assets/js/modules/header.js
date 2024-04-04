export const hamburger = (hamburgerButton, hamburgerNav) => {
   const button = document.querySelector(hamburgerButton),
      nav = document.querySelector(hamburgerNav);


      button.addEventListener("click", (e) => {
         button.classList.toggle("header__hamburger_active");
         nav.classList.toggle("header__list_active");

      });
};
// export function hamburger(hamburgerButton, hamburgerNav) {
//    const button = document.querySelector(hamburgerButton),
//       nav = document.querySelector(hamburgerNav);

//    button.addEventListener('click', (e) => {
//       button.classList.toggle('header__hamburger_active');
//       nav.classList.toggle('header__list_active');
//    });

// };


