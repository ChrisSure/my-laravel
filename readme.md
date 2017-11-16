My-Laravel
============================
1. Встановлення пакету   composer create-project --prefer-dist --stability=dev snayper911/my-laravel name
	
2. Настройка даних db в файлі .env (перед тим створити бази name && name_test)

3. В файлі .env змінити APP_URL на свій

4. Ініціалізація міграцій    **php artisan migrate**

5. Скопіювати з папки files дамп тестової бази

5. Ініціалізація початкових даних в базу   
	**php artisan db:seed --class=SettingTableSeeder**</br>
	**php artisan db:seed --class=PermissionTableSeeder**</br>
	**php artisan db:seed --class=RolesTableSeeder**</br>
	**php artisan db:seed --class=UsersTableSeeder**

6. Настроюєм тестову роботу з поштою
	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=07723dbf4c3bff
	MAIL_PASSWORD=e270e670e5fc45
	MAIL_ENCRYPTION=null
	
