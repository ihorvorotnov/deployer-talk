<?php
namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'deployer');

// Project repository
set('repository', 'git@github.com:ihorvorotnov/deployer-talk');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', [
	'wp-config.php',
]);
set('shared_dirs', [
	'wp-content/uploads',
]);

// Writable dirs by web server
set('writable_dirs', [
	'wp-content',
]);

// Remove unnecessary stuff
set('clear_paths', [
	'.git',
	'.github',
	'.gitignore',
	'deploy.php',
]);

// Hosts
host('production')
	->hostname('161.35.219.157')
	->port(22)
	->user('deployer')
	->identityFile('~/.ssh/id_rsa')
	->set('deploy_path', '/var/www/deployer')
	->set('keep_releases', 3);

// Tasks
desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// Install WordPress.
desc('Install WordPress');
task('deploy:wp', '
	wp core download;
');

after('deploy:writable', 'deploy:wp');

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
