window.addEventListener("DOMContentLoaded", (event) => {
  // Navbar shrink function
  var navbarShrink = function () {
    const navbarCollapsible = document.body.querySelector("#mainNav");
    if (!navbarCollapsible) {
      return;
    }
    if (window.scrollY === 0) {
      navbarCollapsible.classList.remove("navbar-shrink");
    } else {
      navbarCollapsible.classList.add("navbar-shrink");
    }
  };

  // Shrink the navbar
  navbarShrink();

  // Shrink the navbar when page is scrolled
  document.addEventListener("scroll", navbarShrink);

  //  Activate Bootstrap scrollspy on the main nav element
  const mainNav = document.body.querySelector("#mainNav");
  if (mainNav) {
    new bootstrap.ScrollSpy(document.body, {
      target: "#mainNav",
      rootMargin: "0px 0px -40%",
    });
  }

  // Collapse responsive navbar when toggler is visible
  const navbarToggler = document.body.querySelector(".navbar-toggler");
  const responsiveNavItems = [].slice.call(
    document.querySelectorAll("#navbarResponsive .nav-link")
  );
  responsiveNavItems.map(function (responsiveNavItem) {
    responsiveNavItem.addEventListener("click", () => {
      if (window.getComputedStyle(navbarToggler).display !== "none") {
        navbarToggler.click();
      }
    });
  });

  //Función para ingresar a la plataforma
  function registerOrLogin() {
    const usuario = document.getElementById("usuario").value;

    console.log(usuario);
    return;
    // Realiza la solicitud Fetch
    fetch("admin/validar_usuario.php", {
      method: "POST",
      body: new URLSearchParams({ usuario: usuario }),
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
    })
      .then((response) => response.text())
      .then((data) => {
        if (data === "Usuario encontrado") {
          // El usuario existe, realiza la lógica correspondiente
          console.log("Usuario encontrado");
        } else {
          // El usuario no existe, realiza la lógica correspondiente
          console.log("Usuario no encontrado");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
});
