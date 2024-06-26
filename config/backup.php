<?php

return [

    'backup' => [
        'name' => env('APP_NAME', 'laravel-backup'),

        'source' => [
            'files' => [
                'include' => [
                    base_path(),
                ],
                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                ],
                'follow_links' => false,
                'ignore_unreadable_directories' => false,
                'relative_path' => null,
            ],

            'databases' => [
                'mysql' => [
                    'dump_command_path' => env('DUMP_COMMAND_PATH', '/usr/bin/mysqldump'), // Ruta al comando mysqldump (opcional)
                    'dump_command_timeout' => 60 * 5, // Tiempo de espera en segundos (opcional)
                    'databases' => [
                        [
                            'name' => env('DB_DATABASE', 'app'), // Nombre de tu base de datos
                        ],
                    ],
                ],
            ],

        'database_dump_compressor' => null,

        'database_dump_file_extension' => '',

        'destination' => [
            'disks' => [
                'local' => [
                    'driver' => 'local',
                    'root' => storage_path('app/backups'),
                ],
            ],
        ],

        'temporary_directory' => storage_path('app/backup-temp'),

        'password' => env('BACKUP_ARCHIVE_PASSWORD'),

        'encryption' => 'default',
    ],

    'notifications' => [
        'notifications' => [
            // \Spatie\Backup\Notifications\Notifications\BackupHasFailedNotification::class => [],
            // \Spatie\Backup\Notifications\Notifications\UnhealthyBackupWasFoundNotification::class => [],
            // \Spatie\Backup\Notifications\Notifications\CleanupHasFailedNotification::class => [],
            // \Spatie\Backup\Notifications\Notifications\BackupWasSuccessfulNotification::class => [],
            // \Spatie\Backup\Notifications\Notifications\HealthyBackupWasFoundNotification::class => [],
            // \Spatie\Backup\Notifications\Notifications\CleanupWasSuccessfulNotification::class => [],
        ],

        'notifiable' => \Spatie\Backup\Notifications\Notifiable::class,

        'mail' => [
            'to' => 'your@example.com',
            'from' => [
                'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
                'name' => env('MAIL_FROM_NAME', 'Example'),
            ],
        ],

        'slack' => [
            'webhook_url' => '',
            'channel' => null,
            'username' => null,
            'icon' => null,
        ],

        'discord' => [
            'webhook_url' => '',
            'username' => '',
            'avatar_url' => '',
        ],
    ],

    'monitor_backups' => [
        [
            'name' => env('APP_NAME', 'laravel-backup'),
            'disks' => ['custom_backup_disk'],
            'health_checks' => [
                \Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumAgeInDays::class => 1,
                \Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumStorageInMegabytes::class => 5000,
            ],
        ],
    ],

    'cleanup' => [
        'strategy' => \Spatie\Backup\Tasks\Cleanup\Strategies\DefaultStrategy::class,

        'default_strategy' => [
            'keep_all_backups_for_days' => 7,
            'keep_daily_backups_for_days' => 16,
            'keep_weekly_backups_for_weeks' => 8,
            'keep_monthly_backups_for_months' => 4,
            'keep_yearly_backups_for_years' => 2,
            'delete_oldest_backups_when_using_more_megabytes_than' => 5000,
        ],
    ],
]
];
