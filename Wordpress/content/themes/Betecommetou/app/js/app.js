var app = {

  // URL and endpoints for request to API
  baseUri: "http://3.213.90.111/projet-betecommetou/Wordpress/",
  //baseUri: "http://localhost/Projet/projet-betecommetou/Wordpress/",
  jsonUrl:"wp-json/wp/v2/",
  jwtUrl: "wp-json/jwt-auth/v1/",

init: function() {
  app.initEventListener();      
},
// All selct and Events Listener
  initEventListener:function() {
    let burgerMenuOpenButton = document.querySelector('.open-menu');
    let burgerMenuCloseButton = document.querySelector('.close-menu');
    burgerMenuCloseButton.addEventListener('click', app.handleCloseFrontPageMenu);
    burgerMenuOpenButton.addEventListener('click',app.handleOpenFrontPageMenu);
    let loginForm = document.querySelector('#loginform');
    if (loginForm!=null) {loginForm.addEventListener('submit',app.handleSubmitLoginForm)};
    let userForm = document.querySelector('#userForm');
    if (userForm!=null) { userForm.addEventListener('submit', app.handleSubmitUserForm)};
    let animalForm = document.querySelector('#animalForm');
    if (animalForm!=null) { animalForm.addEventListener('submit', app.handleSubmitAnimalForm)};
    let healthBookSelect = document.querySelector('#pet-select');
    if(healthBookSelect!=null) {healthBookSelect.addEventListener('change', app.handleChangeSelection)};    
    let addButton = document.querySelector('#add');
    if(addButton != null) {addButton.addEventListener('click', app.handleShowModalOnButtonAddClick)};
    let formToAddanAnimal = document.querySelector('.account_contact_utils');
    if (formToAddanAnimal != null) {formToAddanAnimal.addEventListener('submit', app.handleModalFormToAdd)};
    let deleteButton = document.querySelector('#delete');
    if(deleteButton != null) {deleteButton.addEventListener('click', app.handleShowModalOnButtonDeleteClick)};
    let formToDeleteanAnimal = document.querySelector('#deleteForm');
    if (formToDeleteanAnimal != null) {formToDeleteanAnimal.addEventListener('submit', app.handleModalFormToDelete)};
    let selectInDeleteModal = document.querySelector('#pet-select-deletemodal');
    if (selectInDeleteModal!=null) {selectInDeleteModal.addEventListener('change', app.handleSelectInDeleteModal)};
    let closeAddModal = document.querySelector('.addSpan');
    if (closeAddModal !=null){closeAddModal.addEventListener('click', app.handleCloseAddModal)};  
    let closeDeleteModal = document.querySelector('.deleteSpan');
    if (closeDeleteModal != null){closeDeleteModal.addEventListener('click', app.handleCloseDeleteModal)};
  },
  // Display modal with click on Add button 
  handleShowModalOnButtonAddClick:function () {
    console.log('clicked');
    let modal = document.querySelector('.modal');
    modal.style.visibility="visible";
  
  },
//function to close add modal
  handleCloseAddModal: function() {
  console.log('span add');
  let modal = document.querySelector('.modal');
  
  modal.style.visibility = "hidden";
  
  },
  //function to close delete modal
  handleCloseDeleteModal: function() {
    console.log('deleteSpan');
    let modalDelete = document.querySelector('.modalDelete');
  
    modalDelete.style.visibility = "hidden";
  },
  // Axios request for add an animal
  handleModalFormToAdd: function(event) {
    // let modal = document.querySelector('.modal');
    // modal.style.display="none";
    const modalForm = event.currentTarget;
    const modalFormData = new FormData(modalForm);
    newAnimalName = {};
    newAnimalName.title = modalFormData.get('animalName');
    newAnimalName.nom_de_lanimal = modalFormData.get('animalName');
    newAnimalName.status = "publish";
    axios({
      method: 'post',
      url: app.baseUri + app.jsonUrl + 'healthbook',
      headers: { Authorization: 'Bearer ' + app.getToken() },
      params: newAnimalName
    })
    .then(function(){
      document.location.reload(true);
      document.querySelector('.account_contact_utils').reset();
    })
    .then(function(){
      document.location.reload(true);
    })


  },
  // Display Modal when click on Delete button
  handleShowModalOnButtonDeleteClick: function(){
    let modal = document.querySelector('.modalDelete');
    modal.style.visibility="visible";
  },
  // Request for delete an animal (get an ID to delete)
  handleSelectInDeleteModal:function(event) {
    const select = event.currentTarget;
    const optionID = select.options[select.selectedIndex].value;
    localStorage.setItem('ID to delete', optionID); 
  },
  //axios request for remove an animal
  handleModalFormToDelete: function (event) {
    let animaltoDelete = event.currentTarget;
    console.log(localStorage.getItem('ID to delete'))
      axios({
        method: 'delete',
        url: app.baseUri + app.jsonUrl + 'healthbook/' + localStorage.getItem('ID to delete'),
        headers: { Authorization: 'Bearer ' + app.getToken() },
        params: {
            force: true
        }
    })
    .then(function(){
      document.querySelector('.modalDelete').style.visibility="hidden";
      document.location.reload(true);
      localStorage.setItem('ID to delete'," ");
    })
  },
  // Open burger menu in header in mobile 
  handleOpenFrontPageMenu: function () {
    document.querySelector('.open-menu').style.visibility = "hidden";
    document.querySelector('.wrapper').style.filter = "blur(1.5rem)";
    document.querySelector('.header__menu').style.visibility = "visible";
  },
  //Close burger menu in header in mobile
  handleCloseFrontPageMenu: function () {
    document.querySelector('.open-menu').style.visibility = "visible";
    document.querySelector('.wrapper').style.filter = "";
    document.querySelector('.header__menu').style.visibility = "hidden";
  },
  // Axios request for submit login form
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
  // Request for modifying user infos
  handleSubmitUserForm:function(event) {  
    event.preventDefault();
    const userForm = event.currentTarget;
    const userFormData = new FormData(userForm);
    const userID = document.querySelector('#userForm');
    const userIdDataSet = userID.dataset.userId;
   // console.log(userIdDataSet);
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
  // Request for submit and modifying animals info 
  handleSubmitAnimalForm:function(event) {
    event.preventDefault();
    const animalForm = event.currentTarget;
    const animalFormData = new FormData(animalForm);
    let animalID = localStorage.getItem('ID of animal');
    animalInfos = {};
    animalInfos.nom_de_lanimal = animalFormData.get('animal_name');
    animalInfos.age_de_lanimal = animalFormData.get('DateofBirth');
    animalInfos.sexe = animalFormData.get('Sex');
    animalInfos.sterilise = animalFormData.get('sterilized');
    animalInfos.assurance = animalFormData.get('Insured');
    animalInfos.race = animalFormData.get('Breed');
    animalInfos.robe = animalFormData.get('Color');
    animalInfos.pedigree = animalFormData.get('LOF');
    animalInfos.numero_de_tatouage = animalFormData.get('tatoo');
    animalInfos.numero_didentification_electronique = animalFormData.get('identification');
    animalInfos.maladies_allergies = animalFormData.get('diseases');
    animalInfos.vaccins = animalFormData.get('vaccins');
    animalInfos.observations = animalFormData.get('observations');
    animalInfos.veterinaire = animalFormData.get('veterinary');
    axios({
      method: 'post',
      url: app.baseUri + app.jsonUrl + 'healthbook' + '/' + animalID,
      headers: { Authorization: 'Bearer ' + app.getToken() },
      params: animalInfos
    })
    .then(function() {

      document.location.reload(true);
      localStorage.setItem('ID of animal' , " ");
      

    })   
  },
  // Return token response 
  getResponseToken: function(response) {
    return response.data.token;
  },
  // Stock the token in local storage
  storeToken: function(token) {
    localStorage.setItem('token', token);
  },
  // return the token we get
  getToken: function () {
    return localStorage.getItem('token');
  },
  // Change animal information when selected
  handleChangeSelection: function(event) {
    const select = event.currentTarget;
    const optionID = select.options[select.selectedIndex].value;
    localStorage.setItem('ID of animal', optionID);
    axios({
      method: 'get',
      url: app.baseUri + app.jsonUrl + 'healthbook' + '/' + optionID,
      headers: { Authorization: 'Bearer ' + app.getToken() },
      params: {
        status: 'any'
      }
    })
    .then(function(response){
      let metas = response.data.meta;
      if (metas) {   
        let fields = document.querySelectorAll('.contact-form__input');
        fields.forEach(element => {
          element.value = "";
        });
        document.querySelector('input[name=animal_name]').value = metas.nom_de_lanimal;
        if(metas.age_de_lanimal)
        {document.querySelector('input[name=DateofBirth]').value = metas.age_de_lanimal;}
        else {metas.age_de_lanimal = " "};
        if(metas.sexe){document.querySelector('select[name=Sex]').value = metas.sexe;}
        else {metas.sexe = " "};
        if (metas.sterilise) {document.querySelector('select[name=sterilized').value = metas.sterilise;}
        else {metas.sterilise = " "};
        if(metas.assurance){document.querySelector('select[name=Insured]').value = metas.assurance;}
        else {metas.sexe = " "};
        if (metas.race) {document.querySelector('input[name=Breed]').value = metas.race;}
        else {metas.race = " "};
        if (metas.robe) {document.querySelector('input[name=Color]').value = metas.robe;}
        else{metas.robe = ""};
        if (metas.pedigree) {document.querySelector('select[name=LOF]').value = metas.pedigree;}
        else{metas.pedigree = " "};
        if (metas.numero_de_tatouage) {document.querySelector('input[name=tatoo]').value = metas.numero_de_tatouage;}
        else {metas.numero_de_tatouage = " "};
        if (metas.numero_didentification_electronique) {document.querySelector('input[name=identification]').value = metas.numero_didentification_electronique;}
        else{metas.numero_didentification_electronique = " "};
        if (metas.maladies_allergies) {document.querySelector('textarea[name=diseases]').value = metas.maladies_allergies;}
        else{metas.maladies_allergies = " "};
        if (metas.vaccins) {document.querySelector('textarea[name=vaccins]').value = metas.vaccins;}
        else{metas.vaccins = " "};
        if (metas.observations) {document.querySelector('textarea[name=observations]').value = metas.observations;}
        else{metas.observations = " "};
        if (metas.veterinaire) {document.querySelector('input[name=veterinary]').value = metas.veterinaire;}
        else{metas.veterinaire = " "};
      } else {
        console.log('il faut selectioner une valeur')
      }      
    })
    
    
  },
};

document.addEventListener("DOMContentLoaded", app.init);