<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/php-fpm.php';
require 'contrib/npm.php';

// Config

set('repository', 'git@github.com:rubanokk/patapum.git');
set('git_tty', true); 
set('use_relative_symlinks', true);
set('ssh_multiplexing', false);
set('deploy_path', 'production');
set('update_code_strategy', 'clone');
set('keep_releases', 3);

set('forward_agent', false);
set('writable_mode', 'acl');


// ProcessWire shared dirs
set('shared_dirs', ['storage']);
set('shared_files', ['.env', './public/sitemap.xml']);
add('writable_dirs', ['vendor', 'storage']);

// Hosts
// r*wZBrs5
host('155.212.187.157')
    ->set('remote_user', 'deploy')
    ->set('port', 2002)
    ->set('http_user', 'www-data')
    ->setIdentityFile('../ssh/id_rsa')
    ->set('deploy_path', '/var/www/patapum');

    task('deploy', [
        'deploy:prepare',
        'deploy:vendors',
        'artisan:cache:clear',
        'artisan:view:clear',
        'npm:install',
        'npm:run:build',
        'artisan:storage:link',
        'artisan:view:cache',
        'artisan:config:cache',
        'artisan:migrate',
        'deploy:publish',
    ]);
    
    task('npm:run:build', function () {
        cd('{{release_or_current_path}}');
        run('npm run build');
    });

after('deploy:failed', 'deploy:unlock');
