# How to Run
## Installation

- install php 8.* , apache
- git clone https://github.com/raiyan24r/website-subscriber-test.git
- rename example.env to .env [root folder]
- change database connection value from env file: DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- change email configuration value from env file: MAIL_MAILER, MAIL_HOST, MAIL_PORT, MAIL_USERNAME, MAIL_PASSWORD, MAIL_ENCRYPTION
- set QUEUE_CONNECTION=database if you want to run job from cron or supervisor. 
- run command: composer install
- run command: php artisan migrate --seed
- run command: php artisan serve --port=8090 
- run command: php artisan queue:work --queue=emails

## Test Project

- postman collection JSON link : https://www.getpostman.com/collections/bf790cbc17ba54b4ef81
- command to send email to website's new subscribers
```sh

php artisan email:subscribers

```
 
 