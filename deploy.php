<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@gitlab.n2rtechnologies.com:nurulhasan/secretary.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('216.158.239.213')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/secretary')
    ->set('keep_releases', 2);

// Hooks

after('deploy:failed', 'deploy:unlock');
