var app = {

    baseUri: "http://localhost/projet-betecommetou/Wordpress/",
    jsonUrl:"wp-json/wp/v2",
    jwtUrl: "wp-json/jwt-auth/v1/",

  init: function() {

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
    console.log('init');
    app.verifyIfUserIsLoggedIn()
    app.initEventListener();      
  },
  verifyIfUserIsLoggedIn: function () {

    const verifyIfUserIsLoggedInPromise = new Promise((resolve, reject) => {
        const token = app.getToken();
        if (token) {
            //console.log('j\'ai trouvé un token !!');
            axios({
                method: 'post',
                url: app.baseUri + app.jwtUrl + 'token/validate',
                headers: { Authorization: 'Bearer ' + token }
            })
                .then(resolve)
                .catch(reject);
        }
        else {
            reject();
        }
    });
    return verifyIfUserIsLoggedInPromise;
  },

  initEventListener:function() {
    let burgerMenuOpenButton = document.querySelector('.open-menu');
    let burgerMenuCloseButton = document.querySelector('.close-menu');
    burgerMenuCloseButton.addEventListener('click', app.handleCloseFrontPageMenu);
    burgerMenuOpenButton.addEventListener('click',app.handleOpenFrontPageMenu);
    let loginForm = document.querySelector('#loginform');
    loginForm.addEventListener('submit',app.handleSubmitLoginForm);

  },
  createH3TitleOnregistrationForm: function() {
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
  handleEditUserFormSubmit:function (event) {
    event.preventDefault();    
  },
  handleSubmitLoginForm:function(event) {
    const loginForm = event.currentTarget;
    const loginFormData = new FormData(loginForm);
    const loginInfos = {};
    loginInfos.username = loginFormData.get('log');
    loginInfos.password = loginFormData.get('pwd');
    axios.post(
      app.baseUri+app.jwtUrl+'token',
      loginInfos
    )
    .then(app.getResponseToken)
    .then(app.storeToken)
  },
  getResponseToken: function(response) {
    return response.data.token;
  },
  storeToken: function(token) {
    localStorage.setItem('token', token);
  },
  getToken: function () {
    return localStorage.getItem('token');
  },



  //on se basera la dessus pour updater les données de l'utilisateur
  
//   handleCreateRecipeFormSubmit: function (event) {

//     // on annule le comportement par défaut (soumission du formulaire)
//     event.preventDefault();

//     // on cible le formulaire
//     const createRecipeForm = event.target;

//     // on utilise FormData pour faciliter la manipulation des données du formulaire
//     const createRecipeFormData = new FormData(createRecipeForm);

//     // on créé un objet qui contient les données du formulaire
//     const recipe = {};

//     // on le rempli
//     recipe.title = createRecipeFormData.get('title');
//     recipe.content = createRecipeFormData.get('content');
//     recipe.preparation = createRecipeFormData.get('preparation-time');
//     recipe.temps_de_cuisson = createRecipeFormData.get('cooking-time');
//     recipe.prix = createRecipeFormData.get('cost-per-person');

//     // recipe.status = 'publish'

//     axios({
//         method: 'post',
//         url: app.baseUri + app.jsonUrl + 'recipe',
//         headers: { Authorization: 'Bearer ' + app.getToken() },
//         params: recipe
//     })
//         // fermer la modal
//         .then(app.closeCreateRecipeModal)
//         // vider les champs du formulaire
//         .then(app.emptyCreateRecipeForm)
//         // recharger la liste des recettes
//         .then(app.loadRecipeList);
// },


};

$(app.init);
