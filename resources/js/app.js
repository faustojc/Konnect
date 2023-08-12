import {createInertiaApp} from '@inertiajs/react';
import {hydrateRoot} from 'react-dom/client';

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.jsx');
        return pages[`./Pages/${name}.jsx`]();
    },
    setup({el, App, props}) {
        hydrateRoot(el, <App {...props} />);
    },
}).then(r => console.log(r));
