#Информация по конфигурации
>**Таблицы автоматически установятся если раскоментировать в файле index.php следующие строки:**
```php
use install\Installer;
$installer = new Installer();
$installer->run();
```
>**Настройки БД:**
```php
	private static $host = 'localhost';
	private static $dbname = 'flabers';
	private static $user = 'root';
	private static $pass = '';
```
>**Страницы будут доступны по url:**
>* _your-domain/_**order/create**
>* _your-domain/_**order/list**

путь | справка
-|-
**core/DBConnect.php** | _Настройки подключение к БД_ 
**install/tables.php** | _Генерируемые таблицы_
**externalAPI/Convertor.php** | _Реализована ковертация валют по курсу банка **Приват24**_