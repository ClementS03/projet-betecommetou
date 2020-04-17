var app = {
  init: function() {
    console.log('init');
    
    // Create h3 user in div
    // Create H3
    let titleUser = document.createElement('h3');
    titleUser.className = 'user_title';
    // Target the div
    let newTitleUserContainer = document.querySelector('.field-text');
    // Create text in H3
    titleUser.textContent = 'Moi';
    // Write title in div
    newTitleUserContainer.prepend(titleUser);
    
    //Create h3 animal in div
    //Create h3
    let titleAnimal = document.createElement('h3');
    titleAnimal.className = 'animal_title';
    // Target the div
    let newTitleAnimalContainer = document.querySelector('.user-registration ');
    // Create text in H3
    titleAnimal.textContent = 'Mon animal';
    // Write title in div
    newTitleAnimalContainer.prepend(titleAnimal);

    // For burger Menu on mobile page 
    let burgerMenuOpenButton = document.querySelector('.open-menu');
    let burgerMenuCloseButton = document.querySelector('.close-menu');
    burgerMenuCloseButton.addEventListener('click', app.handleCloseFrontPageMenu);
    burgerMenuOpenButton.addEventListener('click',app.handleOpenFrontPageMenu);
    
  },
  handleOpenFrontPageMenu: function () {
    document.querySelector('.open-menu').style.visibility = "hidden";
    document.querySelector('.wrapper').style.filter = "blur(1.5rem)";
    document.querySelector('.header__menu').style.visibility = "visible";
  },
  handleCloseFrontPageMenu: function () {
    document.querySelector('.open-menu').style.visibility = "visible";
    document.querySelector('.wrapper').style.filter = "";
    document.querySelector('.header__menu').style.visibility = "hidden";
  },
  
  


};

$(app.init);
