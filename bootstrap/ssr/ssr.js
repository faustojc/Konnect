import { jsxs, jsx } from "react/jsx-runtime";
import { createInertiaApp } from "@inertiajs/react";
import createServer from "@inertiajs/react/server";
import { Suspense } from "react";
import { renderToString } from "react-dom/server";
createServer(
  (page) => createInertiaApp({
    page,
    render: renderToString,
    resolve: (name) => {
      const pages = /* @__PURE__ */ Object.assign({ "./Pages/Auth/Login.jsx": () => import("./assets/Login-f0b4fec3.js") });
      return pages[`./Pages/${name}.jsx`]();
    },
    setup: ({ App, props }) => /* @__PURE__ */ jsxs(Suspense, { fallback: /* @__PURE__ */ jsx("div", { children: "Loading..." }), children: [
      " ",
      /* @__PURE__ */ jsx(App, { ...props }),
      " "
    ] })
  })
);
