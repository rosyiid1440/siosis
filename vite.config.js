import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'public/sbadmin/css/fontawesome-free/css/all.min.css',
                'public/sbadmin/css/sbadmin.min.css',
                'public/sbadmin/datatables/dataTables.bootstrap4.min.css',
                'resources/js/app.js',
                'public/sbadmin/js/jquery.min.js',
                'public/sbadmin/js/bootstrap-bundle.min.js',
                'public/sbadmin/js/jquery-easing.min.js',
                'public/sbadmin/js/sbadmin.min.js',
                'public/sbadmin/datatables/jquery.dataTables.min.js',
                'public/sbadmin/datatables/dataTables.bootstrap4.min.js',
                'public/sweetalert2.js',
            ],
            refresh: true,
        }),
    ],
});
