import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/customs/adminlte/plugins/fontawesome-free/css/all.min.css',
                'resources/customs/adminlte/dist/css/adminlte.min.css',
                'resources/customs/adminlte/plugins/summernote/summernote-bs4.min.css',
                'resources/customs/adminlte/plugins/codemirror/codemirror.css',
                'resources/customs/adminlte/plugins/codemirror/theme/monokai.css',
                'resources/customs/adminlte/plugins/simplemde/simplemde.min.css',
                'resources/customs/adminlte/plugins/jquery/jquery.min.js',
                'resources/customs/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
                'resources/customs/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js',
                'resources/customs/adminlte/dist/js/adminlte.min.js',
                'resources/customs/adminlte/dist/js/demo.js',
                'resources/customs/adminlte/plugins/summernote/summernote-bs4.min.js',
                'resources/customs/adminlte/plugins/codemirror/codemirror.js',
                'resources/customs/adminlte/plugins/codemirror/mode/css/css.js',
                'resources/customs/adminlte/plugins/codemirror/mode/xml/xml.js',
                'resources/customs/adminlte/plugins/codemirror/mode/htmlmixed/htmlmixed.js',
            ],
            refresh: true,
        }),
    ],
});
