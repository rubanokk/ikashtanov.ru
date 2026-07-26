<?php

return [
    'token' => env('TINYMCE_TOKEN', 'a2tugagn6donmxv7bacbu4bylmreak3ee7hnchodpz961lu0'),
    'plugins' => [
        'anchor', 'autolink', 'autoresize', 'charmap', 'codesample', 'code', 'image', 'link',
        'lists', 'advlist', 'media', 'searchreplace', 'wordcount', 'directionality',
        'fullscreen', 'help', 'nonbreaking', 'pagebreak', 'preview', 'visualblocks', 'visualchars'
    ],
    'menubar' => 'file edit insert view format tools',
    'toolbar' => 'undo redo | blocks fontfamily fontsize | bold italic strikethrough | '
        . 'link image media hr nonbreaking pagebreak | align lineheight | '
        . 'numlist bullist indent outdent | removeformat | codesample '
        . 'fullscreen preview visualblocks visualchars code',
    'options' => [
        'file_manager' => 'laravel-filemanager'
    ],
    'callbacks' => [],
];
