jQuery(document).ready(function ($) {
// 	menu mobile	
	$('.list__item').each(function() {
		if($(this).find('ul.sub-menu').length > 0) {
			$(this).addClass('has-child');
		}
	});
	
	$(document).on('click', '.header__list .list__item.has-child > a', function(e) {
		// e.preventDefault();
		if(window.innerWidth < 1000) {
			let wrapper = $(this).closest('.list__item.has-child');
			$(wrapper).toggleClass('active');
		}
	});
// 	/menu mobile

  console.log("test");

  $("input[type=tel]").inputmask({ mask: "+7 999 999-99-99" }); //specifying options

  window.formPhoneValidator = function (input) {
    let tempInput = input.toString().replaceAll(/[^0-9]+/g, "");
    return tempInput.length > 10;
  };

  // $(document).scroll(function() {
  //     if ($(this).scrollTop() >= 50) {
  //     $('#header').addClass('painted');
  //     // console.log('scroll')
  //     }else{
  //     $('#header').removeClass('painted');
  //     }
  // });
  //

  // $("li.nav-menu-element a").click(function() { // ID откуда кливаем
  // 	let hash = $(this).attr('href');
  // 	if(hash.length > 1) {
  // 		$(this).parent().addClass('active');
  // 		$(this).parent().siblings().removeClass('active');
  // 		$('html, body').animate({
  //             scrollTop: $(hash).offset().top - 120 // класс объекта к которому приезжаем
  //         }, 1000); // Скорость прокрутки
  // 	}
  // });

  /*============ FUNCTIONS ===========*/

  // function getCallbackForm(modal, props) {
  //     const id = props['data-modal'].value;
  //     const targetBtn = props[0].ownerElement;

  //     if($(modal).find('.form__holder').html() == '') {
  //         $.ajax({
  //             url: `/wp-admin/admin-ajax.php?action=get_modal_form&modal=${id}`,
  //             method: 'GET',
  //             success: function (data){
  //                 $(modal).find('.form__holder').html(data);
  //                 let form = $(modal).find('form').get(0);

  //                 ThemeModal.reinitForms(form);
  //                 ThemeModal.getInstance().openModal(id);
  //             },
  //             error: function (data) {
  //                 ThemeModal.getInstance().openModal('error');
  //             }
  //         });
  //     }else{
  //         ThemeModal.getInstance().openModal(id);
  //     }
  // }

  const header = document.querySelector("#header");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 20) {
      // Сработает после 50px прокрутки
      header.classList.add("scrolled");
    } else {
      header.classList.remove("scrolled");
    }
  });

  let mobileMenu = new MobileMenu(); // Вызов объекта класса мобильного меню
  mobileMenu.init(); // Инициализация мобильного меню

  let readMoreBtns = document.querySelectorAll(".reviews__btn-more");
  readMoreBtns.forEach((elem) => {
    elem.addEventListener("click", () => {
      elem.previousElementSibling.classList.add("full");
      elem.parentElement.classList.add("full");
      elem.style.display = "none";
    });
  });

  let readMoreBtns2 = document.querySelectorAll(".cars__btn-more");
  readMoreBtns.forEach((elem) => {
    elem.addEventListener("click", () => {
      elem.previousElementSibling.classList.add("full");
      elem.parentElement.classList.add("full");
      elem.style.display = "none";
    });
  });

  let reviewsInners = document.querySelectorAll(".reviews__content");
  reviewsInners.forEach((elem) => {
    if (elem.innerHTML.length < 500) {
      elem.nextElementSibling.style.display = "none";
    }
  });

  $(".form input[type=file]").on("change", function (e) {
    if (e.target.files[0] !== undefined && e.target.files[0].name) {
      let fileName = "";
      [...e.target.files].forEach((e) => (fileName += e.name + "\n"));
      $(this).parents("label").find("span.file__title").text(fileName);
    } else {
      $(this).parents("label").find("span.file__title").text("Прикрепить файл");
    }
  });

  let inputs = document.querySelectorAll(".input__wrapper");
  let indexInput = 1;

  inputs.forEach((item) => {
    let input = item.querySelector("textarea") || item.querySelector("input");
    input.id = `input-${indexInput}`;

    if (!input) return;

    $(item).append(
      `<label for='input-${indexInput}' class="input__placeholder">${input.getAttribute(
        "placeholder"
      )}</label>`
    );

    if (input.getAttribute("name") == "your-name") {
      input.placeholder = "Имя";
    }

    item.addEventListener("focusin", (env) => {
      item.classList.add("focus");
    });

    item.addEventListener("focus", (env) => {
      item.classList.add("focus");
    });

    item.addEventListener("focusout", (env) => {
      if (input.value) return;
      item.classList.remove("focus");
    });

    item.addEventListener("mouseover", (env) => {
      item.classList.add("focus");
    });

    item.addEventListener("mouseout", (env) => {
      if (input.value) return;
      if (document.activeElement === input) return;
      item.classList.remove("focus");
    });

    input.addEventListener("input", (env) => {
      if (!input.value) {
        item.classList.remove("write");
      } else {
        item.classList.add("write");
      }
    });

    indexInput++;
  });
	$(document).on('ajaxformsent', function(){
ym(103266444,'reachGoal','forma_otpravlena')
});
});
