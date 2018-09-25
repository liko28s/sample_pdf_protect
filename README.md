Cluster PHP - IBM DB2 - Balanceo de Carga
==================================

# Instalación #

Simplemente clone este repositorio, esto creará un archivo `docker-compose.yml` en la raíz de la carpeta, adicionalmente se crean las carpetas `application` y `resources`  que contendrán los archivos de su aplicación y la configuración de los contenedores respectivamente.
 
# Despliegue #

Requisitos:

  * Docker engine v1.13 o superior.
  * Un buen SO - obviamente no lo he probado en Windows ;)
  * Recomendadisimo utilizar Portainer

Cuando esté listo solo ejecute `docker-compose up -d --build`. 

## Contenido ##

* Una red local rami-cluster (172.1.1.0/24)
* Un contenedor de Nginx con configuración básica para correr como balanceador de carga (proxy round-robin)
* Tres contenedores corriendo apache2, php7.2 y la configuración necesaria para trabajar con IBM DB2

| Servicio | Dirección |
| ------ | --------- |
| LoadBalancer | [172.1.1.2:8080](http://172.1.1.2:8080) |
| ApacheServerOne | [172.1.1.3:80](http://172.1.1.3) |
| ApacheServerTwo | [172.1.1.4:80](http://172.1.1.4) |
| ApacheServerThree | [172.1.1.5:80](http://172.1.1.5) |

## Configuraciones Extra ##

Siéntase libre de realizar cualquier cambio para que la configuración se ajuste a sus necesidades.
Mayor información:
* [DB2 PHP](http://php.net/manual/es/book.ibm-db2.php)
* [Nginx as Load Balancer](http://nginx.org/en/docs/http/load_balancing.html)

# Recomendaciones #

* Ya lo dije, [Portainer](https://portainer.io/)
* Utilizar [DotEnv](https://github.com/symfony/dotenv)
