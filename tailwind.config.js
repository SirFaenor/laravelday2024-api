// import { postcss } from 'tailwindcss';
// import defaultTheme from 'tailwindcss/defaultTheme';
import { scopedPreflightStyles, isolateInsideOfContainer } from 'tailwindcss-scoped-preflight';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {

            /**
             * Colori allineati con sito principale
             */
            colors: {
                'red' : '#DE5558',
                'gray' : '#F3F3F3',
                'blue' : 'rgb(78, 118, 164)',
                'yellow' : '#FECB00',
            },
            fontWeight: {
                '500' : '500',
                '600' : '600',
            },
            /**
             * Immagine di sfondo, replichiamo url che l'asset ha nel sito principale
             */
            backgroundImage: {
                'pattern-gray': "url('/imgs/layout/bg.png')",
            },
        },
        container: {
            padding: '2rem',
        },
    },
    plugins: [
        /**
         * Scope per gli stili Preflight, limitati a uno specifico selettore CSS
         * https://www.npmjs.com/package/tailwindcss-scoped-preflight
         */
        scopedPreflightStyles({
            isolationStrategy: isolateInsideOfContainer('.api-response'),
        }),
    ],
    /**
     * Aumenta specificità delle classi Tailwind all'interno del selettore .api-response
     * https://tailwindcss.com/docs/configuration#selector-strategy
     */
    important: '.api-response',
}


/**
 * NOTE:
 * - la classe .api-response è un wrapper per tutti i contenuti html che vengono generati dalle API.
 * - tailwindcss-scoped-preflight si occupa di applicare i reset CSS di Tailwind solo all'interno di .api-response
 * - important: '.api-response' aumenta la specificità delle classi Tailwind all'interno di .api-response
 */