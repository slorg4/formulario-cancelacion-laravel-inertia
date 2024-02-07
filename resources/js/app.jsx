import "./bootstrap";
import "bootstrap-icons/font/bootstrap-icons.css";
import "../css/app.css";
import "../css/fixes.css";
import "../css/mc-cantu-bg.css";

import { createRoot } from "react-dom/client";
import { createInertiaApp } from "@inertiajs/react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { NextUIProvider } from "@nextui-org/react";
import { ConfigProvider } from "antd";
import es_ES from "antd/locale/es_ES";
import { Toaster } from "react-hot-toast";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) =>
    resolvePageComponent(
      `./Pages/${name}.jsx`,
      import.meta.glob("./Pages/**/*.jsx")
    ),
  setup({ el, App, props }) {
    const root = createRoot(el);

    root.render(
      <NextUIProvider>
        <ConfigProvider locale={es_ES}>
          <App {...props} />
          <Toaster position="top-center" reverseOrder />
        </ConfigProvider>
      </NextUIProvider>
    );
  },
  progress: {
    color: "#4B5563",
  },
});
