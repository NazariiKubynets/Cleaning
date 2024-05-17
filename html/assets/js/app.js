// 'use strict';
import { hamburger } from "./modules/header.js";
// import {mein} from "./modules/mein.js";




document.addEventListener("DOMContentLoaded", function () {
	//------------------------------ACCORDIONS---------------------------
	const accordions = (accordionSelector) => {
		const accordion = document.querySelectorAll(accordionSelector);

		accordion.forEach(item => {
			const accordionClick = item.querySelector('.accordion__header'),
				accordionContent = item.querySelector('.accordion__content');

			accordionClick.addEventListener('click', (e) => {
				if (!item.classList.contains('accordion__item--active')) {

					item.classList.add('accordion__item--active')
					accordionContent.style.height = "auto"
					var height = accordionContent.clientHeight + "px"
					accordionContent.style.height = "0px"

					setTimeout(() => {
						accordionContent.style.height = height
					}, 0)

				} else {
					accordionContent.style.height = "0px"
					item.classList.remove('accordion__item--active')
				}

			});
		});

	};
	accordions('.accordion__item');

	//----------------------HAMBURGER-----------------------
	const hamburger = (hamburgerButton, hamburgerNav) => {
		const button = document.querySelector(hamburgerButton),
			nav = document.querySelector(hamburgerNav);


		button.addEventListener('click', (e) => {
			button.classList.toggle('header__hamburger_active');
			nav.classList.toggle('header__list_active');
		});

	};
	hamburger('.header__hamburger', '.header__list');

	//header menu show btn

	const showElements = document.querySelectorAll('.show');
	const listElements = document.querySelectorAll('.sub-menu');

	document.addEventListener('click', (e) => {
		const isClickInsideList = Array.from(listElements).some(listElement => listElement.contains(e.target));
		const isClickInsideShow = Array.from(showElements).some(showElement => showElement.contains(e.target));

		if (!isClickInsideList && !isClickInsideShow) {
			listElements.forEach(listElement => {
				listElement.classList.remove('active');
			});
			showElements.forEach(showElement => {
				showElement.classList.remove('show--active');
			});
		}
	});

	showElements.forEach(showElement => {
		showElement.addEventListener('click', (e) => {
			const subMenu = showElement.querySelector('.sub-menu');
			if (subMenu) {
				const isActive = subMenu.classList.contains('active');

				listElements.forEach(listElement => {
					listElement.classList.remove('active');
				});
				showElements.forEach(otherShowElement => {
					if (otherShowElement !== showElement) {
						otherShowElement.classList.remove('show--active');
					}
				});

				if (!isActive) {
					subMenu.classList.add('active');
					showElement.classList.toggle('show--active');
				} else {
					showElement.classList.remove('show--active');
				}
			}
			e.stopPropagation();
		});
	});





	//----------------------MODAL-----------------------
	const modals = (modalSelector) => {
		const modal = document.querySelectorAll(modalSelector);

		if (modal) {
			let i = 1;

			modal.forEach(item => {
				const wrap = item.id;
				const link = document.querySelectorAll('.' + wrap);

				link.forEach(linkItem => {
					let close = item.querySelector('.close');
					if (linkItem) {
						linkItem.addEventListener('click', (e) => {
							if (e.target) {
								e.preventDefault();
							}
							item.classList.add('active');
						});
					}

					if (close) {
						close.addEventListener('click', () => {
							item.classList.remove('active');
						});
					}

					item.addEventListener('click', (e) => {
						if (e.target === item) {
							item.classList.remove('active');
						}
					});
				});
			});
		}

	};
	modals('.modal');


	//-----------------------404btn-------------------------
	const goBackButtons = document.querySelectorAll('.goBack');

	goBackButtons.forEach(button => {
		button.addEventListener('click', () => {
			window.history.back();
		});
	});

});


