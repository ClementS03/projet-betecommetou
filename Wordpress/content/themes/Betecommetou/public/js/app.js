!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=9)}([function(e,t,n){"use strict";var r=n(1),o=Object.prototype.toString;function a(e){return"[object Array]"===o.call(e)}function i(e){return void 0===e}function s(e){return null!==e&&"object"==typeof e}function u(e){return"[object Function]"===o.call(e)}function c(e,t){if(null!=e)if("object"!=typeof e&&(e=[e]),a(e))for(var n=0,r=e.length;n<r;n++)t.call(null,e[n],n,e);else for(var o in e)Object.prototype.hasOwnProperty.call(e,o)&&t.call(null,e[o],o,e)}e.exports={isArray:a,isArrayBuffer:function(e){return"[object ArrayBuffer]"===o.call(e)},isBuffer:function(e){return null!==e&&!i(e)&&null!==e.constructor&&!i(e.constructor)&&"function"==typeof e.constructor.isBuffer&&e.constructor.isBuffer(e)},isFormData:function(e){return"undefined"!=typeof FormData&&e instanceof FormData},isArrayBufferView:function(e){return"undefined"!=typeof ArrayBuffer&&ArrayBuffer.isView?ArrayBuffer.isView(e):e&&e.buffer&&e.buffer instanceof ArrayBuffer},isString:function(e){return"string"==typeof e},isNumber:function(e){return"number"==typeof e},isObject:s,isUndefined:i,isDate:function(e){return"[object Date]"===o.call(e)},isFile:function(e){return"[object File]"===o.call(e)},isBlob:function(e){return"[object Blob]"===o.call(e)},isFunction:u,isStream:function(e){return s(e)&&u(e.pipe)},isURLSearchParams:function(e){return"undefined"!=typeof URLSearchParams&&e instanceof URLSearchParams},isStandardBrowserEnv:function(){return("undefined"==typeof navigator||"ReactNative"!==navigator.product&&"NativeScript"!==navigator.product&&"NS"!==navigator.product)&&("undefined"!=typeof window&&"undefined"!=typeof document)},forEach:c,merge:function e(){var t={};function n(n,r){"object"==typeof t[r]&&"object"==typeof n?t[r]=e(t[r],n):t[r]=n}for(var r=0,o=arguments.length;r<o;r++)c(arguments[r],n);return t},deepMerge:function e(){var t={};function n(n,r){"object"==typeof t[r]&&"object"==typeof n?t[r]=e(t[r],n):t[r]="object"==typeof n?e({},n):n}for(var r=0,o=arguments.length;r<o;r++)c(arguments[r],n);return t},extend:function(e,t,n){return c(t,(function(t,o){e[o]=n&&"function"==typeof t?r(t,n):t})),e},trim:function(e){return e.replace(/^\s*/,"").replace(/\s*$/,"")}}},function(e,t,n){"use strict";e.exports=function(e,t){return function(){for(var n=new Array(arguments.length),r=0;r<n.length;r++)n[r]=arguments[r];return e.apply(t,n)}}},function(e,t,n){"use strict";var r=n(0);function o(e){return encodeURIComponent(e).replace(/%40/gi,"@").replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+").replace(/%5B/gi,"[").replace(/%5D/gi,"]")}e.exports=function(e,t,n){if(!t)return e;var a;if(n)a=n(t);else if(r.isURLSearchParams(t))a=t.toString();else{var i=[];r.forEach(t,(function(e,t){null!=e&&(r.isArray(e)?t+="[]":e=[e],r.forEach(e,(function(e){r.isDate(e)?e=e.toISOString():r.isObject(e)&&(e=JSON.stringify(e)),i.push(o(t)+"="+o(e))})))})),a=i.join("&")}if(a){var s=e.indexOf("#");-1!==s&&(e=e.slice(0,s)),e+=(-1===e.indexOf("?")?"?":"&")+a}return e}},function(e,t,n){"use strict";e.exports=function(e){return!(!e||!e.__CANCEL__)}},function(e,t,n){"use strict";(function(t){var r=n(0),o=n(18),a={"Content-Type":"application/x-www-form-urlencoded"};function i(e,t){!r.isUndefined(e)&&r.isUndefined(e["Content-Type"])&&(e["Content-Type"]=t)}var s,u={adapter:(("undefined"!=typeof XMLHttpRequest||void 0!==t&&"[object process]"===Object.prototype.toString.call(t))&&(s=n(5)),s),transformRequest:[function(e,t){return o(t,"Accept"),o(t,"Content-Type"),r.isFormData(e)||r.isArrayBuffer(e)||r.isBuffer(e)||r.isStream(e)||r.isFile(e)||r.isBlob(e)?e:r.isArrayBufferView(e)?e.buffer:r.isURLSearchParams(e)?(i(t,"application/x-www-form-urlencoded;charset=utf-8"),e.toString()):r.isObject(e)?(i(t,"application/json;charset=utf-8"),JSON.stringify(e)):e}],transformResponse:[function(e){if("string"==typeof e)try{e=JSON.parse(e)}catch(e){}return e}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,validateStatus:function(e){return e>=200&&e<300}};u.headers={common:{Accept:"application/json, text/plain, */*"}},r.forEach(["delete","get","head"],(function(e){u.headers[e]={}})),r.forEach(["post","put","patch"],(function(e){u.headers[e]=r.merge(a)})),e.exports=u}).call(this,n(17))},function(e,t,n){"use strict";var r=n(0),o=n(19),a=n(2),i=n(21),s=n(24),u=n(25),c=n(6);e.exports=function(e){return new Promise((function(t,l){var d=e.data,f=e.headers;r.isFormData(d)&&delete f["Content-Type"];var m=new XMLHttpRequest;if(e.auth){var p=e.auth.username||"",h=e.auth.password||"";f.Authorization="Basic "+btoa(p+":"+h)}var g=i(e.baseURL,e.url);if(m.open(e.method.toUpperCase(),a(g,e.params,e.paramsSerializer),!0),m.timeout=e.timeout,m.onreadystatechange=function(){if(m&&4===m.readyState&&(0!==m.status||m.responseURL&&0===m.responseURL.indexOf("file:"))){var n="getAllResponseHeaders"in m?s(m.getAllResponseHeaders()):null,r={data:e.responseType&&"text"!==e.responseType?m.response:m.responseText,status:m.status,statusText:m.statusText,headers:n,config:e,request:m};o(t,l,r),m=null}},m.onabort=function(){m&&(l(c("Request aborted",e,"ECONNABORTED",m)),m=null)},m.onerror=function(){l(c("Network Error",e,null,m)),m=null},m.ontimeout=function(){var t="timeout of "+e.timeout+"ms exceeded";e.timeoutErrorMessage&&(t=e.timeoutErrorMessage),l(c(t,e,"ECONNABORTED",m)),m=null},r.isStandardBrowserEnv()){var v=n(26),y=(e.withCredentials||u(g))&&e.xsrfCookieName?v.read(e.xsrfCookieName):void 0;y&&(f[e.xsrfHeaderName]=y)}if("setRequestHeader"in m&&r.forEach(f,(function(e,t){void 0===d&&"content-type"===t.toLowerCase()?delete f[t]:m.setRequestHeader(t,e)})),r.isUndefined(e.withCredentials)||(m.withCredentials=!!e.withCredentials),e.responseType)try{m.responseType=e.responseType}catch(t){if("json"!==e.responseType)throw t}"function"==typeof e.onDownloadProgress&&m.addEventListener("progress",e.onDownloadProgress),"function"==typeof e.onUploadProgress&&m.upload&&m.upload.addEventListener("progress",e.onUploadProgress),e.cancelToken&&e.cancelToken.promise.then((function(e){m&&(m.abort(),l(e),m=null)})),void 0===d&&(d=null),m.send(d)}))}},function(e,t,n){"use strict";var r=n(20);e.exports=function(e,t,n,o,a){var i=new Error(e);return r(i,t,n,o,a)}},function(e,t,n){"use strict";var r=n(0);e.exports=function(e,t){t=t||{};var n={},o=["url","method","params","data"],a=["headers","auth","proxy"],i=["baseURL","url","transformRequest","transformResponse","paramsSerializer","timeout","withCredentials","adapter","responseType","xsrfCookieName","xsrfHeaderName","onUploadProgress","onDownloadProgress","maxContentLength","validateStatus","maxRedirects","httpAgent","httpsAgent","cancelToken","socketPath"];r.forEach(o,(function(e){void 0!==t[e]&&(n[e]=t[e])})),r.forEach(a,(function(o){r.isObject(t[o])?n[o]=r.deepMerge(e[o],t[o]):void 0!==t[o]?n[o]=t[o]:r.isObject(e[o])?n[o]=r.deepMerge(e[o]):void 0!==e[o]&&(n[o]=e[o])})),r.forEach(i,(function(r){void 0!==t[r]?n[r]=t[r]:void 0!==e[r]&&(n[r]=e[r])}));var s=o.concat(a).concat(i),u=Object.keys(t).filter((function(e){return-1===s.indexOf(e)}));return r.forEach(u,(function(r){void 0!==t[r]?n[r]=t[r]:void 0!==e[r]&&(n[r]=e[r])})),n}},function(e,t,n){"use strict";function r(e){this.message=e}r.prototype.toString=function(){return"Cancel"+(this.message?": "+this.message:"")},r.prototype.__CANCEL__=!0,e.exports=r},function(e,t,n){n(10),e.exports=n(29)},function(e,t,n){(function(e){var t={baseUri:"http://3.213.90.111/projet-betecommetou/Wordpress/",jsonUrl:"wp-json/wp/v2/",jwtUrl:"wp-json/jwt-auth/v1/",init:function(){t.initEventListener()},initEventListener:function(){let e=document.querySelector(".open-menu");document.querySelector(".close-menu").addEventListener("click",t.handleCloseFrontPageMenu),e.addEventListener("click",t.handleOpenFrontPageMenu);let n=document.querySelector("#loginform");null!=n&&n.addEventListener("submit",t.handleSubmitLoginForm);let r=document.querySelector("#userForm");null!=r&&r.addEventListener("submit",t.handleSubmitUserForm);let o=document.querySelector("#animalForm");null!=o&&o.addEventListener("submit",t.handleSubmitAnimalForm);let a=document.querySelector("#pet-select");null!=a&&a.addEventListener("change",t.handleChangeSelection);let i=document.querySelector("#add");null!=i&&i.addEventListener("click",t.handleShowModalOnButtonAddClick);let s=document.querySelector(".account_contact_utils");null!=s&&s.addEventListener("submit",t.handleModalFormToAdd);let u=document.querySelector("#delete");null!=u&&u.addEventListener("click",t.handleShowModalOnButtonDeleteClick);let c=document.querySelector("#deleteForm");null!=c&&c.addEventListener("submit",t.handleModalFormToDelete);let l=document.querySelector("#pet-select-deletemodal");null!=l&&l.addEventListener("change",t.handleSelectInDeleteModal);let d=document.querySelector(".addSpan");null!=d&&d.addEventListener("click",t.handleCloseAddModal);let f=document.querySelector(".deleteSpan");null!=f&&f.addEventListener("click",t.handleCloseDeleteModal)},handleShowModalOnButtonAddClick:function(){console.log("clicked"),document.querySelector(".modal").style.visibility="visible"},handleCloseAddModal:function(){console.log("span add"),document.querySelector(".modal").style.visibility="hidden"},handleCloseDeleteModal:function(){console.log("deleteSpan"),document.querySelector(".modalDelete").style.visibility="hidden"},handleModalFormToAdd:function(n){const r=n.currentTarget,o=new FormData(r);newAnimalName={},newAnimalName.title=o.get("animalName"),newAnimalName.nom_de_lanimal=o.get("animalName"),newAnimalName.status="publish",e({method:"post",url:t.baseUri+t.jsonUrl+"healthbook",headers:{Authorization:"Bearer "+t.getToken()},params:newAnimalName}).then((function(){document.location.reload(!0),document.querySelector(".account_contact_utils").reset()}))},handleShowModalOnButtonDeleteClick:function(){document.querySelector(".modalDelete").style.visibility="visible"},handleSelectInDeleteModal:function(e){const t=e.currentTarget,n=t.options[t.selectedIndex].value;localStorage.setItem("ID to delete",n)},handleModalFormToDelete:function(n){n.currentTarget;console.log(localStorage.getItem("ID to delete")),e({method:"delete",url:t.baseUri+t.jsonUrl+"healthbook/"+localStorage.getItem("ID to delete"),headers:{Authorization:"Bearer "+t.getToken()},params:{force:!0}}).then((function(){document.querySelector(".modalDelete").style.visibility="hidden",document.location.reload(!0),localStorage.setItem("ID to delete"," ")}))},handleOpenFrontPageMenu:function(){document.querySelector(".open-menu").style.visibility="hidden",document.querySelector(".wrapper").style.filter="blur(1.5rem)",document.querySelector(".header__menu").style.visibility="visible"},handleCloseFrontPageMenu:function(){document.querySelector(".open-menu").style.visibility="visible",document.querySelector(".wrapper").style.filter="",document.querySelector(".header__menu").style.visibility="hidden"},handleSubmitLoginForm:function(n){const r=n.currentTarget,o=new FormData(r),a={};a.username=o.get("log"),a.password=o.get("pwd"),e.post(t.baseUri+t.jwtUrl+"token",a).then(t.getResponseToken).then(t.storeToken)},handleSubmitUserForm:function(n){n.preventDefault();const r=n.currentTarget,o=new FormData(r),a=document.querySelector("#userForm").dataset.userId;userInfos={},userInfos.nickname=o.get("nickname"),userInfos.first_name=o.get("firstname"),userInfos.last_name=o.get("lastname"),userInfos.email=o.get("email"),userInfos.adress=o.get("adress"),userInfos.phone=o.get("phone"),e({method:"post",url:t.baseUri+t.jsonUrl+"users/"+a,headers:{Authorization:"Bearer "+t.getToken()},params:userInfos})},handleSubmitAnimalForm:function(n){n.preventDefault();const r=n.currentTarget,o=new FormData(r);let a=localStorage.getItem("ID of animal");animalInfos={},animalInfos.nom_de_lanimal=o.get("animal_name"),animalInfos.age_de_lanimal=o.get("DateofBirth"),animalInfos.sexe=o.get("Sex"),animalInfos.sterilise=o.get("sterilized"),animalInfos.assurance=o.get("Insured"),animalInfos.race=o.get("Breed"),animalInfos.robe=o.get("Color"),animalInfos.pedigree=o.get("LOF"),animalInfos.numero_de_tatouage=o.get("tatoo"),animalInfos.numero_didentification_electronique=o.get("identification"),animalInfos.maladies_allergies=o.get("diseases"),animalInfos.vaccins=o.get("vaccins"),animalInfos.observations=o.get("observations"),animalInfos.veterinaire=o.get("veterinary"),e({method:"post",url:t.baseUri+t.jsonUrl+"healthbook/"+a,headers:{Authorization:"Bearer "+t.getToken()},params:animalInfos}).then((function(){document.location.reload(),localStorage.setItem("ID of animal"," ")}))},getResponseToken:function(e){return e.data.token},storeToken:function(e){localStorage.setItem("token",e)},getToken:function(){return localStorage.getItem("token")},handleChangeSelection:function(n){const r=n.currentTarget,o=r.options[r.selectedIndex].value;localStorage.setItem("ID of animal",o),e({method:"get",url:t.baseUri+t.jsonUrl+"healthbook/"+o,headers:{Authorization:"Bearer "+t.getToken()},params:{status:"any"}}).then((function(e){let t=e.data.meta;if(t){document.querySelectorAll(".contact-form__input").forEach(e=>{e.value=""}),document.querySelector("input[name=animal_name]").value=t.nom_de_lanimal,t.age_de_lanimal?document.querySelector("input[name=DateofBirth]").value=t.age_de_lanimal:t.age_de_lanimal=" ",t.sexe?document.querySelector("select[name=Sex]").value=t.sexe:t.sexe=" ",t.sterilise?document.querySelector("select[name=sterilized").value=t.sterilise:t.sterilise=" ",t.assurance?document.querySelector("select[name=Insured]").value=t.assurance:t.sexe=" ",t.race?document.querySelector("input[name=Breed]").value=t.race:t.race=" ",t.robe?document.querySelector("input[name=Color]").value=t.robe:t.robe="",t.pedigree?document.querySelector("select[name=LOF]").value=t.pedigree:t.pedigree=" ",t.numero_de_tatouage?document.querySelector("input[name=tatoo]").value=t.numero_de_tatouage:t.numero_de_tatouage=" ",t.numero_didentification_electronique?document.querySelector("input[name=identification]").value=t.numero_didentification_electronique:t.numero_didentification_electronique=" ",t.maladies_allergies?document.querySelector("textarea[name=diseases]").value=t.maladies_allergies:t.maladies_allergies=" ",t.vaccins?document.querySelector("textarea[name=vaccins]").value=t.vaccins:t.vaccins=" ",t.observations?document.querySelector("textarea[name=observations]").value=t.observations:t.observations=" ",t.veterinaire?document.querySelector("input[name=veterinary]").value=t.veterinaire:t.veterinaire=" "}else console.log("il faut selectioner une valeur")}))}};document.addEventListener("DOMContentLoaded",t.init)}).call(this,n(11))},function(e,t,n){e.exports=n(12)},function(e,t,n){"use strict";var r=n(0),o=n(1),a=n(13),i=n(7);function s(e){var t=new a(e),n=o(a.prototype.request,t);return r.extend(n,a.prototype,t),r.extend(n,t),n}var u=s(n(4));u.Axios=a,u.create=function(e){return s(i(u.defaults,e))},u.Cancel=n(8),u.CancelToken=n(27),u.isCancel=n(3),u.all=function(e){return Promise.all(e)},u.spread=n(28),e.exports=u,e.exports.default=u},function(e,t,n){"use strict";var r=n(0),o=n(2),a=n(14),i=n(15),s=n(7);function u(e){this.defaults=e,this.interceptors={request:new a,response:new a}}u.prototype.request=function(e){"string"==typeof e?(e=arguments[1]||{}).url=arguments[0]:e=e||{},(e=s(this.defaults,e)).method?e.method=e.method.toLowerCase():this.defaults.method?e.method=this.defaults.method.toLowerCase():e.method="get";var t=[i,void 0],n=Promise.resolve(e);for(this.interceptors.request.forEach((function(e){t.unshift(e.fulfilled,e.rejected)})),this.interceptors.response.forEach((function(e){t.push(e.fulfilled,e.rejected)}));t.length;)n=n.then(t.shift(),t.shift());return n},u.prototype.getUri=function(e){return e=s(this.defaults,e),o(e.url,e.params,e.paramsSerializer).replace(/^\?/,"")},r.forEach(["delete","get","head","options"],(function(e){u.prototype[e]=function(t,n){return this.request(r.merge(n||{},{method:e,url:t}))}})),r.forEach(["post","put","patch"],(function(e){u.prototype[e]=function(t,n,o){return this.request(r.merge(o||{},{method:e,url:t,data:n}))}})),e.exports=u},function(e,t,n){"use strict";var r=n(0);function o(){this.handlers=[]}o.prototype.use=function(e,t){return this.handlers.push({fulfilled:e,rejected:t}),this.handlers.length-1},o.prototype.eject=function(e){this.handlers[e]&&(this.handlers[e]=null)},o.prototype.forEach=function(e){r.forEach(this.handlers,(function(t){null!==t&&e(t)}))},e.exports=o},function(e,t,n){"use strict";var r=n(0),o=n(16),a=n(3),i=n(4);function s(e){e.cancelToken&&e.cancelToken.throwIfRequested()}e.exports=function(e){return s(e),e.headers=e.headers||{},e.data=o(e.data,e.headers,e.transformRequest),e.headers=r.merge(e.headers.common||{},e.headers[e.method]||{},e.headers),r.forEach(["delete","get","head","post","put","patch","common"],(function(t){delete e.headers[t]})),(e.adapter||i.adapter)(e).then((function(t){return s(e),t.data=o(t.data,t.headers,e.transformResponse),t}),(function(t){return a(t)||(s(e),t&&t.response&&(t.response.data=o(t.response.data,t.response.headers,e.transformResponse))),Promise.reject(t)}))}},function(e,t,n){"use strict";var r=n(0);e.exports=function(e,t,n){return r.forEach(n,(function(n){e=n(e,t)})),e}},function(e,t){var n,r,o=e.exports={};function a(){throw new Error("setTimeout has not been defined")}function i(){throw new Error("clearTimeout has not been defined")}function s(e){if(n===setTimeout)return setTimeout(e,0);if((n===a||!n)&&setTimeout)return n=setTimeout,setTimeout(e,0);try{return n(e,0)}catch(t){try{return n.call(null,e,0)}catch(t){return n.call(this,e,0)}}}!function(){try{n="function"==typeof setTimeout?setTimeout:a}catch(e){n=a}try{r="function"==typeof clearTimeout?clearTimeout:i}catch(e){r=i}}();var u,c=[],l=!1,d=-1;function f(){l&&u&&(l=!1,u.length?c=u.concat(c):d=-1,c.length&&m())}function m(){if(!l){var e=s(f);l=!0;for(var t=c.length;t;){for(u=c,c=[];++d<t;)u&&u[d].run();d=-1,t=c.length}u=null,l=!1,function(e){if(r===clearTimeout)return clearTimeout(e);if((r===i||!r)&&clearTimeout)return r=clearTimeout,clearTimeout(e);try{r(e)}catch(t){try{return r.call(null,e)}catch(t){return r.call(this,e)}}}(e)}}function p(e,t){this.fun=e,this.array=t}function h(){}o.nextTick=function(e){var t=new Array(arguments.length-1);if(arguments.length>1)for(var n=1;n<arguments.length;n++)t[n-1]=arguments[n];c.push(new p(e,t)),1!==c.length||l||s(m)},p.prototype.run=function(){this.fun.apply(null,this.array)},o.title="browser",o.browser=!0,o.env={},o.argv=[],o.version="",o.versions={},o.on=h,o.addListener=h,o.once=h,o.off=h,o.removeListener=h,o.removeAllListeners=h,o.emit=h,o.prependListener=h,o.prependOnceListener=h,o.listeners=function(e){return[]},o.binding=function(e){throw new Error("process.binding is not supported")},o.cwd=function(){return"/"},o.chdir=function(e){throw new Error("process.chdir is not supported")},o.umask=function(){return 0}},function(e,t,n){"use strict";var r=n(0);e.exports=function(e,t){r.forEach(e,(function(n,r){r!==t&&r.toUpperCase()===t.toUpperCase()&&(e[t]=n,delete e[r])}))}},function(e,t,n){"use strict";var r=n(6);e.exports=function(e,t,n){var o=n.config.validateStatus;!o||o(n.status)?e(n):t(r("Request failed with status code "+n.status,n.config,null,n.request,n))}},function(e,t,n){"use strict";e.exports=function(e,t,n,r,o){return e.config=t,n&&(e.code=n),e.request=r,e.response=o,e.isAxiosError=!0,e.toJSON=function(){return{message:this.message,name:this.name,description:this.description,number:this.number,fileName:this.fileName,lineNumber:this.lineNumber,columnNumber:this.columnNumber,stack:this.stack,config:this.config,code:this.code}},e}},function(e,t,n){"use strict";var r=n(22),o=n(23);e.exports=function(e,t){return e&&!r(t)?o(e,t):t}},function(e,t,n){"use strict";e.exports=function(e){return/^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(e)}},function(e,t,n){"use strict";e.exports=function(e,t){return t?e.replace(/\/+$/,"")+"/"+t.replace(/^\/+/,""):e}},function(e,t,n){"use strict";var r=n(0),o=["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"];e.exports=function(e){var t,n,a,i={};return e?(r.forEach(e.split("\n"),(function(e){if(a=e.indexOf(":"),t=r.trim(e.substr(0,a)).toLowerCase(),n=r.trim(e.substr(a+1)),t){if(i[t]&&o.indexOf(t)>=0)return;i[t]="set-cookie"===t?(i[t]?i[t]:[]).concat([n]):i[t]?i[t]+", "+n:n}})),i):i}},function(e,t,n){"use strict";var r=n(0);e.exports=r.isStandardBrowserEnv()?function(){var e,t=/(msie|trident)/i.test(navigator.userAgent),n=document.createElement("a");function o(e){var r=e;return t&&(n.setAttribute("href",r),r=n.href),n.setAttribute("href",r),{href:n.href,protocol:n.protocol?n.protocol.replace(/:$/,""):"",host:n.host,search:n.search?n.search.replace(/^\?/,""):"",hash:n.hash?n.hash.replace(/^#/,""):"",hostname:n.hostname,port:n.port,pathname:"/"===n.pathname.charAt(0)?n.pathname:"/"+n.pathname}}return e=o(window.location.href),function(t){var n=r.isString(t)?o(t):t;return n.protocol===e.protocol&&n.host===e.host}}():function(){return!0}},function(e,t,n){"use strict";var r=n(0);e.exports=r.isStandardBrowserEnv()?{write:function(e,t,n,o,a,i){var s=[];s.push(e+"="+encodeURIComponent(t)),r.isNumber(n)&&s.push("expires="+new Date(n).toGMTString()),r.isString(o)&&s.push("path="+o),r.isString(a)&&s.push("domain="+a),!0===i&&s.push("secure"),document.cookie=s.join("; ")},read:function(e){var t=document.cookie.match(new RegExp("(^|;\\s*)("+e+")=([^;]*)"));return t?decodeURIComponent(t[3]):null},remove:function(e){this.write(e,"",Date.now()-864e5)}}:{write:function(){},read:function(){return null},remove:function(){}}},function(e,t,n){"use strict";var r=n(8);function o(e){if("function"!=typeof e)throw new TypeError("executor must be a function.");var t;this.promise=new Promise((function(e){t=e}));var n=this;e((function(e){n.reason||(n.reason=new r(e),t(n.reason))}))}o.prototype.throwIfRequested=function(){if(this.reason)throw this.reason},o.source=function(){var e;return{token:new o((function(t){e=t})),cancel:e}},e.exports=o},function(e,t,n){"use strict";e.exports=function(e){return function(t){return e.apply(null,t)}}},function(e,t,n){}]);