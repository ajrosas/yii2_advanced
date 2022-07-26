<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Starter</h1>
    <br>
</p>

## Getting Started

1) Create database ``` yii2_advanced ``` or change database name, go to ``` common/config/main-local.php ``` change ``` dbname ``` value
2) Open CMD and navigation to project path
3) Type command ``` yii migrate ``` and enter
4) If you are using localhost 

    * [http://localhost/yii2_advanced/frontend/web/](http://localhost/yii2_advanced/frontend/web/)
    * [http://localhost/yii2_advanced/backend/web/](http://localhost/yii2_advanced/backend/web/)

5) Login using:

    ```
    username: super-admin
    password: 123456
    ````

### Other Settings

1) Accessing Gii
    * /backend/web/gii
    * /frontend/web/gii

2) Generate models for common folder
    * Access either backend or frontend gii
    * Click Model Generator
    * Change namespace to ``` common\models ```
        * Note: always checked ``` Use Table Prefix ``` to generate table prefix on models and to avoid errors
            * ``` {{%table}} ``` percentage means prefix table 
            * change table prefix in ``` common\config\main-local.php ``` tag name ``` tablePrefix ```