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

	//----------------------FORM-----------------------
	// const forms = (formsSelector) => {
	// 	const form = document.querySelectorAll(formsSelector);
	// 	let i = 1;
	// 	let img = 1;
	// 	let lebel = 1;
	// 	let prev = 1;

	// 	form.forEach(item => {
	// 		const elem = 'form--' + i++;
	// 		item.classList.add(elem);

	// 		let formId = item.id = (elem);
	// 		let formParent = document.querySelector('#' + formId);

	// 		formParent.addEventListener('submit', formSend);

	// 		async function formSend(e) {
	// 			e.preventDefault();

	// 			let error = formValidate(item);

	// 			let formData = new FormData(item);

	// 			if (error === 0) {
	// 				item.classList.add('_sending');
	// 				let response = await fetch('sendmail.php', {
	// 					method: 'POST',
	// 					body: formData
	// 				});

	// 				if (response.ok) {
	// 					let modalThanks = document.querySelector('#modal__thanks');
	// 					formParent.parentNode.style.display = 'none';

	// 					modalThanks.classList.add('active');
	// 					item.reset();
	// 					item.classList.remove('_sending');
	// 				} else {
	// 					alert('Ошибка при отправке');
	// 					item.classList.remove('_sending');
	// 				}

	// 			}
	// 		}

	// 		function formValidate(item) {
	// 			let error = 0;
	// 			let formReq = item.querySelectorAll('._req');
	// 			const formPhones = item.querySelectorAll('._phone');

	// 			formPhones.forEach(input => {
	// 				if (!phoneTest(input)) {
	// 					formAddErrorPhone(input);
	// 					error++;
	// 				}
	// 			});

	// 			for (let index = 0; index < formReq.length; index++) {
	// 				const input = formReq[index];

	// 				if (input.classList.contains('_email')) {
	// 					if (emailTest(input)) {
	// 						formAddErrorEmail(input);
	// 						error++;
	// 					}
	// 				} else if (input.classList.contains('_message')) {
	// 					if (!messageTest(input)) {
	// 						formAddErrorMessage(input);
	// 						error++;
	// 					}
	// 				} else if (input.getAttribute('type') === 'checkbox' && input.checked === false) {
	// 					formAddErrorCheck(input);
	// 					error++;
	// 				} else {
	// 					if (input.value === '') {
	// 						formAddError(input);
	// 						error++;
	// 					}
	// 				}
	// 			}

	// 			return error;
	// 		}

	// 		const formImgFile = formParent.querySelectorAll('.formImgFile');

	// 		formImgFile.forEach(item => {
	// 			const elem = 'formImgFile--' + i++;

	// 			let formId = item.id = (elem);
	// 			let formParent = document.querySelector('#' + formId);

	// 			const formImage = formParent.querySelector('.formImage');
	// 			const formLebel = formParent.querySelector('.formLebel');
	// 			const formPreview = formParent.querySelector('.formPreview');

	// 			//картинка в форме
	// 			let formImageNumber = 'formImage--' + img++;
	// 			let formPreviewNumber = 'formPreview--' + prev++;

	// 			formImage.id = (formImageNumber);
	// 			formLebel.htmlFor = ('formImage--' + lebel++);
	// 			formPreview.id = (formPreviewNumber);
	// 			const formImageAdd = document.querySelector('#' + formImageNumber);

	// 			// изменения в инпуте файл
	// 			formImageAdd.addEventListener('change', () => {
	// 				uploadFile(formImage.files[0]);
	// 			});

	// 			function uploadFile(file) {

	// 				if (!['image/jpeg', 'image/png', 'image/gif', 'image/ico', 'application/pdf'].includes(file.type)) {
	// 					alert('Только изображения');
	// 					formImage.value = '';
	// 					return;
	// 				}

	// 				if (file.size > 2 * 1024 * 1024) {
	// 					alert('Размер менее 2 мб.');
	// 					return;
	// 				}

	// 				var reader = new FileReader();
	// 				reader.onload = function (e) {
	// 					if (['application/pdf'].includes(file.type)) {
	// 						formPreview.innerHTML = `Файл выбран`;
	// 					} else {
	// 						formPreview.innerHTML = `<img src="${e.target.result}" alt="Фото">`;
	// 					}

	// 				};
	// 				reader.onerror = function (e) {
	// 					alert('Ошибка');
	// 				};
	// 				reader.readAsDataURL(file);
	// 			}
	// 		})

	// 		function formAddErrorPhone(input) {
	// 			if (!input.parentElement.querySelector('.form__error')) {
	// 				let div = document.createElement('div');
	// 				div.classList.add("form__error");
	// 				div.innerHTML = "Invalid phone number entered";

	// 				input.parentElement.append(div);
	// 				input.parentElement.classList.add('_error');
	// 				input.classList.add('_error');
	// 				updateButtonColor();
	// 			}
	// 		}

	// 		function formAddErrorMessage(input) {
	// 			if (!input.parentElement.querySelector('.form__error')) {
	// 				let div = document.createElement('div');
	// 				div.classList.add("form__error");
	// 				div.innerHTML = "message must be between 40 and 300 characters";

	// 				input.parentElement.appendChild(div);
	// 				input.parentElement.classList.add('_error');
	// 				input.classList.add('_error');
	// 				updateButtonColor();
	// 			}
	// 		}

	// 		function formAddError(input) {
	// 			if (!input.parentElement.querySelector('.form__error')) {
	// 				let div = document.createElement('div');
	// 				div.classList.add("form__error");
	// 				div.innerHTML = "Name must be between 2 and 20 characters";

	// 				input.parentElement.append(div);
	// 				input.parentElement.classList.add('_error');
	// 				input.classList.add('_error');
	// 				updateButtonColor();
	// 			}
	// 		}

	// 		function formAddErrorEmail(input) {
	// 			if (!input.parentElement.querySelector('.form__error')) {
	// 				let div = document.createElement('div');
	// 				div.classList.add("form__error");
	// 				div.innerHTML = "Invalid email entered";

	// 				input.parentElement.append(div);
	// 				input.parentElement.classList.add('_error');
	// 				input.classList.add('_error');
	// 				updateButtonColor();
	// 			}
	// 		}

	// 		function formAddErrorCheck(input) {
	// 			if (!input.parentElement.querySelector('.form__error')) {
	// 				let div = document.createElement('div');
	// 				div.classList.add("form__error");
	// 				div.innerHTML = "Согласие на обработку персональных данных";

	// 				input.parentElement.append(div);
	// 				input.parentElement.classList.add('_error');
	// 				input.classList.add('_error');
	// 				updateButtonColor();
	// 			}
	// 		}

	// 		function updateButtonColor() {
	// 			const submitButton = document.querySelector('.form__btn_button');
	// 			if (document.querySelector('.form__error')) {
	// 				submitButton.classList.add('_error');
	// 			} else {
	// 				submitButton.classList.remove('_error');
	// 			}
	// 		}

	// 		function phoneTest(input) {
	// 			// Допустимий формат: +380123456789
	// 			return /^\+\d{12}$/.test(input.value);
	// 		}

	// 		function messageTest(input) {
	// 			return input.value.length >= 40 && input.value.length <= 300;
	// 		}

	// 		function emailTest(input) {
	// 			return !/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/.test(input.value);
	// 		}

	// 	});
	// };
	// forms('.form');
});
