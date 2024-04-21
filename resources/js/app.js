import '../css/main.css';
import '@/Stores/style.js';
import '@/Stores/libs/jquery/dist/jquery.min.js';
import '@/Stores/libs/bootstrap/dist/js/bootstrap.bundle.min.js';
import '@/Stores/js/sidebarmenu.js';
import '@/Stores/js/app.min.js';
import '@/Stores/libs/apexcharts/dist/apexcharts.min.js';
import '@/Stores/libs/simplebar/dist/simplebar.js';
import '@/Stores/js/dashboard.js';

import { createPinia } from 'pinia'
import { useStyleStore } from '@/Stores/style.js'
import { useLayoutStore } from '@/Stores/layout.js'

import { darkModeKey, styleKey } from '@/config.js'

import { createApp, h } from 'vue';
import { createInertiaApp, router } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const pinia = createPinia()

createInertiaApp({
    progress: {
      color: '#4B5563',
    },
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(pinia)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

const styleStore = useStyleStore(pinia)
const layoutStore = useLayoutStore(pinia)

/* App style */
styleStore.setStyle(localStorage[styleKey] ?? 'basic')

/* Dark mode */
if ((!localStorage[darkModeKey] && window.matchMedia('(prefers-color-scheme: dark)').matches) || localStorage[darkModeKey] === '1') {
  styleStore.setDarkMode(true)
}

/* Collapse mobile aside menu on route change */
router.on('navigate', (event) => {
  layoutStore.isAsideMobileExpanded = false
  layoutStore.isAsideLgActive = false
})
