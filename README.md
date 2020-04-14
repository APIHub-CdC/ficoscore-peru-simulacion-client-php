# ficoscore-peru-simulacion-client-php

Devuelve una calificación de acuerdo a los datos financieros basada en el modelo de FICO Score.

## Requisitos

PHP 7.1 ó superior

### Dependencias adicionales
- Se debe contar con las siguientes dependencias de PHP:
    - ext-curl
    - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos

```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```
- Composer [vea como instalar][1]

## Instalación

Ejecutar: `composer install`

## Guía de inicio

### Paso 1. Agregar el producto a la aplicación

Al iniciar sesión seguir los siguientes pasos:

 1. Dar clic en la sección "**Mis aplicaciones**".
 2. Seleccionar la aplicación.
 3. Ir a la pestaña de "**Editar '@tuApp**' ".
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/edit_applications.jpg" width="900">
    </p>
 4. Al abrirse la ventana emergente, seleccionar el producto.
 5. Dar clic en el botón "**Guardar App**":
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/selected_product.jpg" width="400">
    </p>

### Paso 2. Capturar los datos de la petición

Los siguientes datos a modificar se encuentran en ***test/Api/FicoScoreApiTest.php***

Es importante contar con el setUp() que se encargará de inicializar la url. Modificar la URL ***('the_url')*** de la petición del objeto ***$config***, como se muestra en el siguiente fragmento de código:

```php
<?php
public function setUp()
{
    $config = new \FicoscorePeruSandbox\Client\Configuration();
    $config->setHost('the_url');

    $client = new \GuzzleHttp\Client();
    $this->apiInstance = new \FicoscorePeruSandbox\Client\Api\FicoScoreApi($client, $config);
}    
```
```php

<?php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/FicoScoreApiTest.php
*/
public function testReportarEnLineaSimulacion()
{
    $x_api_key = "your_api_key";
    $request = new \FicoscorePeruSandbox\Client\Model\DatosConsulta();

    $request->setNumeroDocumento('xxxxx');
    $request->setTipoDocumento('x');
    $request->setFolioConsultaOtorgante(null);

    try {
        $result = $this->apiInstance->ficoScore($x_api_key, $request);
        $this->assertNotNull($result);
    } catch (Exception $e) {
        echo 'Exception when calling FicoScoreApi->ficoScore: ', $e->getMessage(), PHP_EOL;
    }
}
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
