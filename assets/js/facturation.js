let menuOpen = true;
let menuOpen2 = true ;
let boutonswitch = document.getElementById("boutonswitch");
let dd = document.getElementById("dd");
let dd2 = document.getElementById("dd2");
let boutonswitch2 = document.getElementById("boutonswitch2");
let btn_creer = document.getElementById("button-creer");
let btn_modif = document.getElementById("button-modif");
let menufacture = false;
let menu_creer = document.getElementById("menu-creer");
let menu_modif = document.getElementById("menu-modif");
let modif_fac = document.getElementById("modif_fac");
let select_facture = document.getElementById("select_facture");
let drop_facture = document.getElementById("drop_facture");

let select_facturee = document.getElementById("select_facturee");
let drop_facturee = document.getElementById("drop_facturee");

let popupDetail = document.getElementById("popupDetail");
let popupDetailScreen = document.getElementById("popupDetailScreen");
let closePopup = document.getElementById("closePopup");

let dropdown_fac = false;
let dropdown_face = false;

let tous = document.getElementById("tous");
let paid = document.getElementById("paid");
let unpaid = document.getElementById("unpaid");

let tousBool = true;
let paidBool = false ;
let unpaidBool = false ;

let pdfpop = document.getElementById("pdfpop");

select_facture.addEventListener("click", function () {
afficherDropDownFac();
});

function updateClasses() {
  const urlParams = new URLSearchParams(window.location.search);
  const filterParam = urlParams.get('filter');
  if (filterParam === 'tous') {
      tous.classList.remove("bg-neutral-800");
      tous.classList.add("bg-neutral-700");
      paid.classList.remove("bg-neutral-700");
      unpaid.classList.remove("bg-neutral-700");
      afficherDropDownFac();
  } else if (filterParam === 'paid') {
      paid.classList.remove("bg-neutral-800");
      paid.classList.add("bg-neutral-700");
      tous.classList.remove("bg-neutral-700");
      unpaid.classList.remove("bg-neutral-700");
      afficherDropDownFac();

  } else if (filterParam === 'unpaid') {
      unpaid.classList.remove("bg-neutral-800");
      unpaid.classList.add("bg-neutral-700");
      paid.classList.remove("bg-neutral-700");
      tous.classList.remove("bg-neutral-700");
      afficherDropDownFac();

  }
}

updateClasses();

function afficherDropDownFac(){
  if(dropdown_fac){
    drop_facture.style.display="none";
    dropdown_fac = false;
  }else{
    drop_facture.style.display="flex";
    dropdown_fac = true;
  }
}

function afficherDropDownFace(){
  if(dropdown_face){
    drop_facturee.style.display="none";
    dropdown_face = false;
  }else{
    drop_facturee.style.display="flex";
    dropdown_face = true;

  }
}

select_facturee.addEventListener("click", function () {
  afficherDropDownFace();

});

document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has("create")) {
    afficherMenuCreation();
;
  }
});

boutonswitch.addEventListener("click", function () {
  if (menuOpen) {
    dd.style.animation = "switch 200ms ease-in forwards";
    boutonswitch.style.backgroundColor = "#8DEB50";
    menuOpen = false;
    valeurBooleenne.value = 1;
  } else {
    dd.style.animation = "switch-reverserd 200ms ease-in forwards";
    boutonswitch.style.backgroundColor = "rgb(212, 212, 212)";
    menuOpen = true;
    valeurBooleenne.value = 0;
  }
});

btn_creer.addEventListener("click", function () {
  if (menufacture) {
    menu_creer.style.display = "flex";

    if (window.innerWidth >= 768) {
      btn_creer.style.borderRight = "solid";
      btn_creer.style.borderColor = "black";

      btn_modif.style.borderRight = "solid";
      btn_modif.style.borderColor = "white";
    } else {
      btn_creer.style.borderColor = "black";
      btn_creer.style.borderBottom = "solid";

      btn_modif.style.borderBottom = "solid";
      btn_modif.style.borderColor = "white";
    }

    menu_modif.style.display = "none";
    menufacture = false;
  }
});

btn_modif.addEventListener("click", function () {
  if (!menufacture) {
    menu_creer.style.display = "none";

    if (window.innerWidth >= 768) {
      btn_creer.style.borderRight = "solid";
      btn_creer.style.borderColor = "white";
      btn_modif.style.borderColor = "black";

      btn_modif.style.borderRight = "solid";
    } else {
      btn_creer.style.borderBottom = "solid";
      btn_creer.style.borderColor = "white";
      btn_modif.style.borderColor = "black";
      btn_modif.style.borderBottom = "solid";
    }

    menu_modif.style.display = "flex";
    menufacture = true;
  }
});

boutonswitch2.addEventListener("click", function () {
  if (menuOpen2) {
    dd2.style.animation = "switch 200ms ease-in forwards";
    boutonswitch2.style.backgroundColor = "#8DEB50";
    menuOpen2 = false;
    valeurBooleenne2.value = 1;
  } else {
    dd2.style.animation = "switch-reverserd 200ms ease-in forwards";
    boutonswitch2.style.backgroundColor = "rgb(212, 212, 212)";
    menuOpen2 = true;
    valeurBooleenne2.value = 0;
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has("create")) {
    afficherMenuCreation();
  } else  {
    afficherMenuModification();
};
});

function afficherMenuCreation() {
  if (!menufacture) {
    menu_creer.style.display = "none";

    if (window.innerWidth >= 768) {
      btn_creer.style.borderRight = "solid";
      btn_creer.style.borderColor = "white";
      btn_modif.style.borderColor = "black";

      btn_modif.style.borderRight = "solid";
    } else {
      btn_creer.style.borderBottom = "solid";
      btn_creer.style.borderColor = "white";
      btn_modif.style.borderColor = "black";
      btn_modif.style.borderBottom = "solid";
    }

    menu_modif.style.display = "flex";
    menufacture = true;
  }
}


function afficherMenuModification() {
  if (menufacture) {
    menu_creer.style.display = "flex";

    if (window.innerWidth >= 768) {
      btn_creer.style.borderRight = "solid";
      btn_creer.style.borderColor = "black";

      btn_modif.style.borderRight = "solid";
      btn_modif.style.borderColor = "white";
    } else {
      btn_creer.style.borderColor = "black";
      btn_creer.style.borderBottom = "solid";

      btn_modif.style.borderBottom = "solid";
      btn_modif.style.borderColor = "white";
    }

    menu_modif.style.display = "none";
    menufacture = false;
  }
}


function boolSwitchId(bool) {
  if (bool == 1 || bool == "1") {
    dd2.style.animation = "switch 200ms ease-in forwards";
    boutonswitch2.style.backgroundColor = "#8DEB50";
    menuOpen2 = false;
    valeurBooleenne2.value = 1;
  } else if (bool == 0 || bool == "0") {
    dd2.style.animation = "switch-reverserd 200ms ease-in forwards";
    boutonswitch2.style.backgroundColor = "rgb(212, 212, 212)";
    menuOpen2 = true;
    valeurBooleenne2.value = 0;
  }
}

popupDetail.addEventListener("click", function () {
  popupDetailScreen.style.display = "flex";
});

closePopup.addEventListener("click", function () {
  popupDetailScreen.style.display = "none";
});

function pdfOpen(nom) {
  let pdfUrl = 'facture/' + nom + 'detail_facture.pdf';
    window.open(pdfUrl, '_blank');
}


