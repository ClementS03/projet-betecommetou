var app = {
  init: function() {
    console.log('init');

    let burgerMenuOpenButton = document.querySelector('.open-menu');
    let burgerMenuCloseButton = document.querySelector('.close-menu');
    burgerMenuCloseButton.addEventListener('click', app.handleCloseFrontPageMenu)
    burgerMenuOpenButton.addEventListener('click',app.handleOpenFrontPageMenu);
  },
  handleOpenFrontPageMenu: function () {
    document.querySelector('.open-menu').style.visibility = "hidden";
    document.querySelector('.main').style.filter = "blur(1.5rem)";
    document.querySelector('.header__menu').style.visibility = "visible";
  },
  handleCloseFrontPageMenu: function () {
    document.querySelector('.open-menu').style.visibility = "visible";
    document.querySelector('.main').style.filter = "";
    document.querySelector('.header__menu').style.visibility = "hidden";
  }
};

$(app.init);
