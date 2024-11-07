import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'

console.log('VITE CLIENT PORT: ', process.env.VITE_CLIENT_PORT);

var config = {
    // https://github.com/uikit/uikit/issues/3399
    resolve: {
        alias: {
            'uikit-util': path.resolve(__dirname, './node_modules/uikit/src/js/util/index.js'),
        },
    },
    server: { 
        hmr: {
            host: 'localhost',
            clientPort: process.env.VITE_CLIENT_PORT,
        }
    }, 
    plugins: [
        laravel({
            input: [
                
                /**
                 * api css
                 */
                'resources/sass/api.scss',

                /**
                 * api js
                 */
                'resources/js/menu.js',

            ],
            refresh: true,
        }),
    ],

};

export default defineConfig(({command, mode, ssrBuild}) => {

    // allow using assets loaded in public folder during development
    if (command === 'serve') {
        config.publicDir = 'public';
        config.build = {
            assetsDir: '',
            copyPublicDir: false,
            emptyOutDir: true,
        };
    }

    return config;
});

