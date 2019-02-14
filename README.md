#Информация по конфигурации
>**Таблицы автоматически установятся если раскоментировать в файле index.php следующие строки:**
```php
use install\Installer;
$installer = new Installer();
$installer->run();

private static $host = 'localhost';
	private static $dbname = 'flabers';
	private static $user = 'root';
	private static $pass = '';
```

путь | справка
-|-
**core/DBConnect.php** | _Настройки подключение к БД_ 
**install/tables.php** | _Генерируемые таблицы_
**externalAPI/Convertor.php** | _Реализована ковертация валют по курсу банка **Приват24**_