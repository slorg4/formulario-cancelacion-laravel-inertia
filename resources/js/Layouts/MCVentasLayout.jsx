import "@/../css/navbar.css";
import "@/../css/animations.css";
import React from "react";
import {
  Navbar,
  NavbarBrand,
  NavbarContent,
  NavbarMenuToggle,
  NavbarMenu,
  NavbarMenuItem,
  NavbarItem,
} from "@nextui-org/react";

export default function MCVentasLayout({ children }) {
  const [isMenuOpen, setIsMenuOpen] = React.useState(false);

  const menuItems = [
    {
      title: "Inicio",
      link: "front-section",
    },
    {
      title: "Acerca de",
      link: "about-section",
    },
    {
      title: "Productos",
      link: "product-section",
    },
    {
      title: "Contacto",
      link: "phone-section",
    },
  ];

  return (
    <>
      <Navbar
        height="4rem"
        maxWidth="xl"
        onMenuOpenChange={setIsMenuOpen}
        shouldHideOnScroll={!isMenuOpen}
      >
        <NavbarContent>
          <NavbarBrand className="justify-center sm:justify-start h-full">
            <img
              className="logo object-scale-down"
              src="/images/logo-nobg.webp"
              alt="Logo de Materiales Cantú"
            />
            <h1 className="font-bold text-2xl sm:text-4xl text-wrap">
              Departamento de Ventas
            </h1>
          </NavbarBrand>
        </NavbarContent>
      </Navbar>
      <main>{children}</main>
    </>
  );
}
