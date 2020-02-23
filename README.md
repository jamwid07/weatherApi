# Weather API usage example

## Installation

install composer dependencies via

`composer install`

configure database in _@app\config\db.php_

apply migration in console

`yii migrate --migrationPath=@app/modules/weather/migrations --interactive=0`

add **openweathermap.org** api token to `weatherApiToken` in _@app\config\params.php_

## Console command

`yii weather/api/get`

get weather updates from source

## Web page

`http://domain.com/weather`
