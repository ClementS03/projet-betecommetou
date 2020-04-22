var app = {

  baseUri: "http://localhost/projet-betecommetou/Wordpress/",
  jsonUrl:"wp-json/wp/v2/",
  jwtUrl: "wp-json/jwt-auth/v1/",

init: function() {
  app.initEventListener();      
},

  initEventListener:function() {
    let burgerMenuOpenButton = document.querySelector('.open-menu');
    let burgerMenuCloseButton = document.querySelector('.close-menu');
    burgerMenuCloseButton.addEventListener('click', app.handleCloseFrontPageMenu);
    burgerMenuOpenButton.addEventListener('click',app.handleOpenFrontPageMenu);

    let loginForm = document.querySelector('#loginform');
    if (loginForm!=null) {loginForm.addEventListener('submit',app.handleSubmitLoginForm)};
    let userForm = document.querySelector('#userForm');
    if (userForm!=null) { userForm.addEventListener('submit', app.handleSubmitUserForm)};
    let healthBookSelect = document.querySelector('#pet-select');
    if(healthBookSelect!=null) {healthBookSelect.addEventListener('change', app.handleChangeSelection);
  }  

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
  handleSubmitLoginForm:function(event) {
    const loginForm = event.currentTarget;
    const loginFormData = new FormData(loginForm);
    const loginInfos = {};
    loginInfos.username = loginFormData.get('log');
    loginInfos.password = loginFormData.get('pwd');
    //console.log(loginInfos);
    axios.post(
      app.baseUri+app.jwtUrl+'token',
      loginInfos
    )
    .then(app.getResponseToken)
    .then(app.storeToken)
  },
  handleSubmitUserForm:function(event) {  
    event.preventDefault();
    const userForm = event.currentTarget;
    const userFormData = new FormData(userForm);
    const userID = document.querySelector('#userForm');
    const userIdDataSet = userID.dataset.userId;
    console.log(userIdDataSet);
    userInfos = {};
    userInfos.nickname = userFormData.get('nickname');
    userInfos.first_name = userFormData.get('firstname');
    userInfos.last_name = userFormData.get('lastname');
    userInfos.email = userFormData.get('email');
    userInfos.adress = userFormData.get('adress');
    userInfos.phone = userFormData.get('phone');
    axios({
      method: 'post',
      url: app.baseUri + app.jsonUrl + 'users' + '/' + userIdDataSet,
      headers: { Authorization: 'Bearer ' + app.getToken() },
      params: userInfos
    })
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
  handleChangeSelection: function(event) {
    const select = event.currentTarget;
    const optionID = select.options[select.selectedIndex].value;
    console.log(optionID);
    axios({
      method: 'get',
      url: app.baseUri + app.jsonUrl + 'healthbook' + '/' + optionID,
      headers: { Authorization: 'Bearer ' + app.getToken() },
      params: {
        status: 'any'
      }
    })
    .then(function(response){
      console.log(response.data.meta);
      document.querySelector('input[name=animal_name]').placeholder = response.data.meta.nom_de_lanimal;
      document.querySelector('input[name=DateofBirth]').placeholder = response.data.meta.age_de_lanimal;
      document.querySelector('input[name=Sex]').placeholder = response.data.meta.sexe;
      document.querySelector('input[name=Sterilize').placeholder = "champ non present , a corriger";
      document.querySelector('input[name=Insured]').placeholder = response.data.meta.assurance;
      document.querySelector('input[name=Breed]').placeholder = response.data.meta.race;
      document.querySelector('input[name=Color]').placeholder = response.data.meta.robe;
      document.querySelector('input[name=LOF]').placeholder = response.data.meta.pedigree;
      document.querySelector('input[name=tatoo]').placeholder = response.data.meta.numero_de_tatouage;
      document.querySelector('input[name=identification]').placeholder = response.data.meta.numero_didentification_electronique;
    })


  },
};

document.addEventListener("DOMContentLoaded", app.init);
